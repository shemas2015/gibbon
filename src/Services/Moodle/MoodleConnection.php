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

            if ($httpCode !== 200) {
                $this->lastError = 'HTTP error: ' . $httpCode;
                return false;
            }

            $result = json_decode($response, true);
            
            if ($result === null) {
                $this->lastError = 'Invalid JSON response from Moodle';
                return false;
            }

            // Check for Moodle errors
            if (isset($result['exception'])) {
                $this->lastError = 'Moodle error: ' . ($result['message'] ?? $result['exception']);
                return false;
            }

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
            'criteria[0][key]' => 'shortname',
            'criteria[0][value]' => $shortname
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
     * Check if Moodle is configured
     *
     * @return bool
     */
    public function isConfigured(): bool
    {
        return !empty($this->moodleUrl) && !empty($this->moodleToken);
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
}