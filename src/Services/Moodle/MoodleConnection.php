<?php
/*
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

namespace Gibbon\Services\Moodle;

/**
 * Moodle Connection
 *
 * Handles connection to Moodle LMS instance via web services API
 *
 * @version v25
 * @since   v25
 */
class MoodleConnection
{
    private $moodleUrl;
    private $moodleToken;
    private $timeout;
    private $lastError;

    public function __construct(array $config = [])
    {
        $this->moodleUrl = rtrim($config['moodleUrl'] ?? '', '/');
        $this->moodleToken = $config['moodleToken'] ?? '';
        $this->timeout = $config['moodleTimeout'] ?? 30;
        $this->lastError = null;
    }

    /**
     * Test the connection to Moodle
     *
     * @return bool True if connection successful, false otherwise
     */
    public function testConnection(): bool
    {
        if (empty($this->moodleUrl) || empty($this->moodleToken)) {
            $this->lastError = 'Moodle URL or token not configured';
            return false;
        }

        try {
            // Test with core_webservice_get_site_info function
            $result = $this->callWebService('core_webservice_get_site_info');
            
            if ($result === false) {
                return false;
            }

            // Check if we got valid site info
            if (!isset($result['sitename'])) {
                $this->lastError = 'Invalid response from Moodle web service';
                return false;
            }

            return true;
        } catch (\Exception $e) {
            $this->lastError = $e->getMessage();
            return false;
        }
    }

    /**
     * Call a Moodle web service function
     *
     * @param string $function The web service function name
     * @param array $params Parameters to pass to the function
     * @return mixed Response from Moodle or false on error
     */
    public function callWebService(string $function, array $params = [])
    {
        if (empty($this->moodleUrl) || empty($this->moodleToken)) {
            $this->lastError = 'Moodle URL or token not configured';
            return false;
        }

        $serverUrl = $this->moodleUrl . '/webservice/rest/server.php';
        
        $postData = [
            'wstoken' => $this->moodleToken,
            'wsfunction' => $function,
            'moodlewsrestformat' => 'json'
        ];

        // Add function parameters
        foreach ($params as $key => $value) {
            $postData[$key] = $value;
        }

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $serverUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/x-www-form-urlencoded',
                'Accept: application/json'
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);


            $error = curl_error($ch);
            curl_close($ch);

            if ($response === false || !empty($error)) {
                $this->lastError = 'cURL error: ' . $error;
                return false;
            }

            /*
            if ($httpCode !== 200) {
                $this->lastError = 'HTTP error: ' . $httpCode;
                return false;
            }
            */

            $result = json_decode($response, true);
            
            if ($result === null) {
                $this->lastError = 'Invalid JSON response from Moodle';
                return false;
            }

            /*
            // Check for Moodle errors
            if (isset($result['exception'])) {
                $this->lastError = 'Moodle error: ' . ($result['message'] ?? $result['exception']);
                return false;
            }
            */

            //echo "<pre>";
            return $result;

        } catch (\Exception $e) {
            $this->lastError = 'Exception: ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Get the last error message
     *
     * @return string|null
     */
    public function getLastError(): ?string
    {
        return $this->lastError;
    }

    /**
     * Get Moodle site information
     *
     * @return array|false Site info or false on error
     */
    public function getSiteInfo()
    {
        return $this->callWebService('core_webservice_get_site_info');
    }

    /**
     * Get Moodle users
     *
     * @param array $criteria Search criteria
     * @return array|false Users data or false on error
     */
    public function getUsers(array $criteria = [])
    {
        $params = [];
        if (!empty($criteria)) {
            $params['criteria'] = $criteria;
        }

        return $this->callWebService('core_user_get_users', $params);
    }

    /**
     * Get Moodle courses
     *
     * @param array $options Options for course retrieval
     * @return array|false Courses data or false on error
     */
    public function getCourses(array $options = [])
    {
        return $this->callWebService('core_course_get_courses', $options);
    }

    /**
     * Create a new course in Moodle
     *
     * @param string $fullname Course full name
     * @param string $shortname Course short name
     * @param int $categoryid Category ID (defaults to 1)
     * @return array Creation result
     */
    public function createCourse(string $fullname, string $shortname, int $categoryid = 1): array
    {
        $params = [
            'courses[0][fullname]' => $fullname,
            'courses[0][shortname]' => $shortname,
            'courses[0][categoryid]' => $categoryid
        ];

        $result = $this->callWebService('core_course_create_courses', $params);
        
        if ($result === false) {
            return [
                'success' => false,
                'message' => 'Failed to create course in Moodle',
                'error' => $this->getLastError()
            ];
        }

        // Check if course was created successfully
        if (isset($result[0]['id'])) {
            return [
                'success' => true,
                'message' => 'Course created successfully in Moodle',
                'course_id' => $result[0]['id'],
                'shortname' => $result[0]['shortname'] ?? $shortname
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Unexpected response from Moodle course creation',
                'response' => $result
            ];
        }
    }

    /**
     * Update an existing course in Moodle
     *
     * @param string $oldShortname Current course shortname to find the course
     * @param string $newFullname New course full name
     * @param string $newShortname New course short name
     * @return array Update result
     */
    public function updateCourse(string $oldShortname, string $newFullname, string $newShortname): array
    {
        // First, find the course by shortname
        $courseInfo = $this->getCourseByShortname($oldShortname);
        
        if (!$courseInfo['success']) {
            return [
                'success' => false,
                'message' => 'Course not found in Moodle',
                'error' => $courseInfo['error'] ?? 'Course lookup failed'
            ];
        }

        $courseId = $courseInfo['course_id'];

        // Update the course
        $params = [
            'courses[0][id]' => $courseId,
            'courses[0][fullname]' => $newFullname,
            'courses[0][shortname]' => $newShortname
        ];

        $result = $this->callWebService('core_course_update_courses', $params);

        if ($result === false) {
            return [
                'success' => false,
                'message' => 'Failed to update course in Moodle',
                'error' => $this->getLastError()
            ];
        }

        // Check if update was successful
        if (isset($result['warnings']) && empty($result['warnings'])) {
            return [
                'success' => true,
                'message' => 'Course updated successfully in Moodle',
                'course_id' => $courseId
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Course update failed',
                'warnings' => $result['warnings'] ?? []
            ];
        }
    }

    /**
     * Get course by shortname
     *
     * @param string $shortname Course shortname
     * @return array Course information
     */
    public function getCourseByShortname(string $shortname): array
    {
        $params = [
            'field' => 'shortname',
            'value' => $shortname
        ];

        $result = $this->callWebService('core_course_get_courses_by_field', $params);

        if ($result === false) {
            return [
                'success' => false,
                'error' => $this->getLastError()
            ];
        }

        if (isset($result['courses']) && !empty($result['courses'])) {
            return [
                'success' => true,
                'course_id' => $result['courses'][0]['id'],
                'course_data' => $result['courses'][0]
            ];
        } else {
            return [
                'success' => false,
                'error' => 'Course not found'
            ];
        }
    }

    /**
     * Create a new user in Moodle
     *
     * @param string $username Username
     * @param string $firstname First name
     * @param string $lastname Last name
     * @param string $email Email address
     * @param string $password Password
     * @return array Creation result
     */
    public function createUser(string $username, string $firstname, string $lastname, string $email, string $password): array
    {
        $params = [
            'users[0][username]' => $username,
            'users[0][firstname]' => $firstname,
            'users[0][lastname]' => $lastname,
            'users[0][email]' => $email,
            'users[0][password]' => $password
        ];

        $result = $this->callWebService('core_user_create_users', $params);


        if ($result === false) {
            return [
                'success' => false,
                'message' => 'Failed to create user in Moodle',
                'error' => $this->getLastError(),
                'error_code' => 'user_creation_failed'
            ];
        }

        // Check for specific Moodle errors
        
        

        if (isset($result['debuginfo'])) {
            $debugInfo = $result['debuginfo'];
            $errorCode = $this->detectUserErrorType($debugInfo);
            
            return [
                'success' => false,
                'message' => 'Moodle user creation error',
                'error' => $debugInfo,
                'error_code' => $errorCode
            ];
        }

        // Check for error code responses
        if (isset($result['errorcode'])) {
            $errorCode = $this->detectUserErrorType($result['errorcode']);
            
            return [
                'success' => false,
                'message' => 'Moodle user creation error',
                'error' => $result['errorcode'],
                'error_code' => $errorCode
            ];
        }

        // Check if user was created successfully
        if (isset($result[0]['id'])) {
            return [
                'success' => true,
                'message' => 'User created successfully in Moodle',
                'user_id' => $result[0]['id'],
                'username' => $result[0]['username'] ?? $username
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Unexpected response from Moodle user creation',
                'response' => $result,
                'error_code' => 'user_creation_failed'
            ];
        }
    }

    /**
     * Detect specific Moodle user error types from error messages
     *
     * @param string $error The error message from Moodle
     * @return string Specific error code
     */
    private function detectUserErrorType(?string $error): string
    {
        if (empty($error)) {
            return 'user_creation_failed';
        }

        $error = strtolower($error);


        // Check for username already exists
        if (stripos($error, 'username already exists') !== false) {
            return 'user_already_exists';
        }

        // Check for email already exists
        if (stripos($error, 'email address already exists') !== false) {
            return 'user_already_exists';
        }

        // Check for invalid email address
        if (stripos($error, 'email address is invalid') !== false) {
            return 'user_invalid_data';
        }

        // Check for missing required email
        if (stripos($error, 'missing required key in single structure: email') !== false) {
            return 'user_invalid_data';
        }

        // Check for missing required email
        if (stripos($error, 'invalid parameter value detected') !== false) {
            return 'user_invalid_data';
        }
        

        // Check for password validation errors
        if (stripos($error, 'password must have') !== false || 
            stripos($error, 'special character') !== false) {
            return 'user_invalid_password';
        }

        return 'user_creation_failed';
    }

    /**
     * Check if Moodle is configured
     *
     * @return bool
     */
    public function isConfigured(): bool
    {
        return !empty($this->moodleUrl) && !empty($this->moodleToken);
    }

    /**
     * Enroll user in a course
     *
     * @param string $username Username to enroll
     * @param string $courseShortname Course short name
     * @param string $roleName Role name (student, teacher, etc.)
     * @return array Enrollment result
     */
    public function enrollUserInCourse(string $username, string $courseShortname, string $roleName = 'student'): array
    {
        // First, get the user ID by username
        $userResult = $this->getUserByUsername($username);
        if (!$userResult['success']) {
            return [
                'success' => false,
                'message' => 'User not found in Moodle',
                'error' => $userResult['error'] ?? 'User lookup failed'
            ];
        }

        // Get the course ID by shortname
        $courseResult = $this->getCourseByShortname($courseShortname);
        if (!$courseResult['success']) {
            return [
                'success' => false,
                'message' => 'Course not found in Moodle',
                'error' => $courseResult['error'] ?? 'Course lookup failed'
            ];
        }

        // Get role ID by role name
        $roleResult = $this->getRoleByShortname($roleName);


        if (!$roleResult['success']) {
            return [
                'success' => false,
                'message' => 'Role not found in Moodle',
                'error' => $roleResult['error'] ?? 'Role lookup failed'
            ];
        }

        // Enroll user in course
        $params = [
            'enrolments[0][roleid]' => $roleResult['role_id'],
            'enrolments[0][userid]' => $userResult['user_id'],
            'enrolments[0][courseid]' => $courseResult['course_id']
        ];

        $result = $this->callWebService('enrol_manual_enrol_users', $params);

        if ($result === false) {
            return [
                'success' => false,
                'message' => 'Failed to enroll user in course',
                'error' => $this->getLastError()
            ];
        }

        return [
            'success' => true,
            'message' => 'User enrolled successfully in course',
            'user_id' => $userResult['user_id'],
            'course_id' => $courseResult['course_id'],
            'role_id' => $roleResult['role_id']
        ];
    }

    /**
     * Unenroll user from a course
     *
     * @param string $username Username to unenroll
     * @param string $courseShortname Course short name
     * @return array Unenrollment result
     */
    public function unenrollUserFromCourse(string $username, string $courseShortname): array
    {
        // First, get the user ID by username
        $userResult = $this->getUserByUsername($username);
        if (!$userResult['success']) {
            return [
                'success' => false,
                'message' => 'User not found in Moodle',
                'error' => $userResult['error'] ?? 'User lookup failed'
            ];
        }

        // Get the course ID by shortname
        $courseResult = $this->getCourseByShortname($courseShortname);
        if (!$courseResult['success']) {
            return [
                'success' => false,
                'message' => 'Course not found in Moodle',
                'error' => $courseResult['error'] ?? 'Course lookup failed'
            ];
        }

        // Unenroll user from course
        $params = [
            'enrolments[0][userid]' => $userResult['user_id'],
            'enrolments[0][courseid]' => $courseResult['course_id']
        ];

        $result = $this->callWebService('enrol_manual_unenrol_users', $params);

        if ($result === false) {
            return [
                'success' => false,
                'message' => 'Failed to unenroll user from course',
                'error' => $this->getLastError()
            ];
        }

        return [
            'success' => true,
            'message' => 'User unenrolled successfully from course',
            'user_id' => $userResult['user_id'],
            'course_id' => $courseResult['course_id']
        ];
    }

    /**
     * Get user by username
     *
     * @param string $username Username to look up
     * @return array User lookup result
     */
    public function getUserByUsername(string $username): array
    {
        $criteria = [
            [
                'key' => 'username',
                'value' => $username
            ]
        ];

        $users = $this->getUsers($criteria);

        if ($users === false) {
            return [
                'success' => false,
                'error' => $this->getLastError()
            ];
        }

        if (isset($users['users']) && !empty($users['users'])) {
            return [
                'success' => true,
                'user_id' => $users['users'][0]['id'],
                'user_data' => $users['users'][0]
            ];
        }

        return [
            'success' => false,
            'error' => 'User not found'
        ];
    }

    /**
     * Get role by shortname
     *
     * @param string $roleName Role shortname (student, teacher, etc.)
     * @return array Role lookup result
     */
    public function getRoleByShortname(string $roleName): array
    {
        // Use standard Moodle role IDs since core_role_get_all_roles doesn't exist
        // These are the default role IDs in most Moodle installations
        $standardRoles = [
            'manager' => 1,
            'coursecreator' => 2,
            'editingteacher' => 3,
            'teacher' => 4,
            'student' => 5,
            'guest' => 6,
            'user' => 7,
            'frontpage' => 8
        ];

        $roleName = strtolower($roleName);

        if (isset($standardRoles[$roleName])) {
            return [
                'success' => true,
                'role_id' => $standardRoles[$roleName],
                'role_shortname' => $roleName
            ];
        }

        // If not found in standard roles, try to get assignable roles for system context
        // This is a fallback that may work in some Moodle configurations
        try {
            $params = [
                'contextlevel' => 'system',
                'contextinstanceid' => 0
            ];
            
            $result = $this->callWebService('core_role_get_assignable_roles', $params);
            
            if ($result !== false && is_array($result)) {
                foreach ($result as $roleId => $roleData) {
                    if (isset($roleData['shortname']) && strtolower($roleData['shortname']) === $roleName) {
                        return [
                            'success' => true,
                            'role_id' => $roleId,
                            'role_data' => $roleData
                        ];
                    }
                }
            }
        } catch (Exception $e) {
            // Fallback failed, continue to error return
        }

        return [
            'success' => false,
            'error' => "Role '$roleName' not found. Supported standard roles: " . implode(', ', array_keys($standardRoles))
        ];
    }

    /**
     * Get configuration status
     *
     * @return array Configuration status details
     */
    public function getConfigStatus(): array
    {
        return [
            'url_configured' => !empty($this->moodleUrl),
            'token_configured' => !empty($this->moodleToken),
            'fully_configured' => $this->isConfigured(),
            'url' => $this->moodleUrl,
        ];
    }

    /**
     * Get future calendar events for specific courses
     *
     * @param array $courseIds Array of course IDs
     * @param int $timeStart Unix timestamp for start time (default: now)
     * @param int $timeEnd Unix timestamp for end time (default: 1 year from now)
     * @return array Calendar events result
     */
    public function getCalendarEvents(array $courseIds, int $timeStart = null, int $timeEnd = null): array
    {
        if ($timeStart === null) {
            $timeStart = time();
        }
        if ($timeEnd === null) {
            $timeEnd = strtotime('+1 year');
        }

        $params = [
            'options[timestart]' => $timeStart,
            'options[timeend]' => $timeEnd,
            'options[userevents]' => 0,
            'options[siteevents]' => 0,
        ];

        // Add course IDs to the parameters
        foreach ($courseIds as $index => $courseId) {
            $params["events[courseids][$index]"] = $courseId;
        }

        $result = $this->callWebService('core_calendar_get_calendar_events', $params);

        if ($result === false) {
            return [
                'success' => false,
                'message' => 'Failed to retrieve calendar events',
                'error' => $this->getLastError(),
                'events' => []
            ];
        }

        return [
            'success' => true,
            'message' => 'Calendar events retrieved successfully',
            'events' => $result['events'] ?? [],
            'warnings' => $result['warnings'] ?? []
        ];
    }

    /**
     * Request a login URL for automatic user login to Moodle
     *
     * @param string $username Username for login URL
     * @return array Login URL result
     */
    public function requestLoginUrl(string $username): array
    {
        if (!$this->isConfigured()) {
            return [
                'success' => false,
                'message' => 'Moodle connection not configured',
                'loginurl' => null
            ];
        }

        $params = [
            'user[username]' => $username
        ];

        $result = $this->callWebService('auth_userkey_request_login_url', $params);
        
        if ($result === false) {
            return [
                'success' => false,
                'message' => 'Failed to request login URL',
                'error' => $this->getLastError(),
                'loginurl' => null
            ];
        }

        return [
            'success' => true,
            'message' => 'Login URL requested successfully',
            'loginurl' => $result['loginurl'] ?? null
        ];
    }
}