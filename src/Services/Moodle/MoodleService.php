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
 * Moodle Service
 *
 * Main service class for Moodle LMS integration
 *
 * @version v25
 * @since   v25
 */
class MoodleService
{
    private $connection;

    public function __construct(MoodleConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Test the Moodle connection
     *
     * @return array Connection test results
     */
    public function testConnection(): array
    {
        $moodleConfigStatus = $this->connection->getConfigStatus();

        if (!$this->connection->isConfigured()) {
            return [
                'success' => false,
                'message' => 'Moodle is not properly configured',
                'details' => $moodleConfigStatus
            ];
        }

        $success = $this->connection->testConnection();
        
        if ($success) {
            $siteInfo = $this->connection->getSiteInfo();
            return [
                'success' => true,
                'message' => 'Successfully connected to Moodle',
                'site_info' => $siteInfo
            ];
        } else {
            return [
                'success' => false,
                'message' => 'Failed to connect to Moodle',
                'error' => $this->connection->getLastError()
            ];
        }
    }

    /**
     * Get Moodle site information
     *
     * @return array|false Site information or false on error
     */
    public function getSiteInfo()
    {
        return $this->connection->getSiteInfo();
    }

    /**
     * Synchronize user from Gibbon to Moodle
     *
     * @param array $gibbonUser Gibbon user data
     * @return array Sync result
     */
    public function syncUser(array $gibbonUser): array
    {
        try {
            // Check if user exists in Moodle
            $criteria = [
                [
                    'key' => 'username',
                    'value' => $gibbonUser['username'] ?? ''
                ]
            ];

            $moodleUsers = $this->connection->getUsers($criteria);

            if ($moodleUsers === false) {
                return [
                    'success' => false,
                    'message' => 'Failed to query Moodle users',
                    'error' => $this->connection->getLastError()
                ];
            }

            if (isset($moodleUsers['users']) && !empty($moodleUsers['users'])) {
                // User exists, update if needed
                return [
                    'success' => true,
                    'message' => 'User already exists in Moodle',
                    'action' => 'exists',
                    'moodle_user_id' => $moodleUsers['users'][0]['id']
                ];
            } else {
                // User doesn't exist, would need create user capability
                // This requires additional Moodle permissions
                return [
                    'success' => false,
                    'message' => 'User does not exist in Moodle and creation not implemented',
                    'action' => 'create_needed'
                ];
            }

        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Exception during user sync',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get available Moodle courses
     *
     * @return array|false Courses or false on error
     */
    public function getCourses()
    {
        return $this->connection->getCourses();
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
        return $this->connection->createCourse($fullname, $shortname, $categoryid);
    }

    /**
     * Update an existing course in Moodle
     *
     * @param string $oldShortname Current course shortname
     * @param string $newFullname New course full name
     * @param string $newShortname New course short name
     * @return array Update result
     */
    public function updateCourse(string $oldShortname, string $newFullname, string $newShortname): array
    {
        return $this->connection->updateCourse($oldShortname, $newFullname, $newShortname);
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
        return $this->connection->createUser($username, $firstname, $lastname, $email, $password);
    }

    /**
     * Get connection status
     *
     * @return array Connection status
     */
    public function getConnectionStatus(): array
    {
        $configStatus = $this->connection->getConfigStatus();
        
        
        if (!$configStatus['fully_configured']) {
            return array_merge($configStatus, [
                'connected' => false,
                'message' => 'Moodle not fully configured'
            ]);
        }

        $testResult = $this->testConnection();
        
        return array_merge($configStatus, [
            'connected' => $testResult['success'],
            'message' => $testResult['message'],
            'error' => $testResult['error'] ?? null,
            'site_info' => $testResult['site_info'] ?? null
        ]);
    }

    /**
     * Initialize Moodle connection check
     * This is the main method you requested - checks endpoint and token
     *
     * @return array Initialization result
     */
    public function initializeMoodle(): array
    {
        $result = [
            'initialized' => false,
            'configured' => false,
            'connected' => false,
            'message' => '',
            'errors' => []
        ];

        // Check if Moodle is configured
        $configStatus = $this->connection->getConfigStatus();
        
        if (!$configStatus['url_configured']) {
            $result['errors'][] = 'Moodle URL not configured';
        }
        
        if (!$configStatus['token_configured']) {
            $result['errors'][] = 'Moodle token not configured';
        }

        if (!empty($result['errors'])) {
            $result['message'] = 'Moodle configuration incomplete: ' . implode(', ', $result['errors']);
            return $result;
        }

        $result['configured'] = true;

        // Test the connection
        $connectionTest = $this->testConnection();
        
        if ($connectionTest['success']) {
            $result['connected'] = true;
            $result['initialized'] = true;
            $result['message'] = 'Moodle integration initialized successfully';
            $result['site_info'] = $connectionTest['site_info'];
        } else {
            $result['message'] = 'Moodle configuration valid but connection failed: ' . $connectionTest['message'];
            $result['errors'][] = $connectionTest['error'] ?? 'Unknown connection error';
        }

        return $result;
    }

    /**
     * Enroll user in a Moodle course
     *
     * @param string $username Username to enroll
     * @param string $courseShortname Course short name
     * @param string $roleName Role name (student, teacher, etc.)
     * @return array Enrollment result
     */
    public function enrollUserInCourse(string $username, string $courseShortname, string $roleName = 'student'): array
    {
        try {
            return $this->connection->enrollUserInCourse($username, $courseShortname, $roleName);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Exception during user enrollment',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Unenroll user from a Moodle course
     *
     * @param string $username Username to unenroll
     * @param string $courseShortname Course short name
     * @return array Unenrollment result
     */
    public function unenrollUserFromCourse(string $username, string $courseShortname): array
    {
        try {
            return $this->connection->unenrollUserFromCourse($username, $courseShortname);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Exception during user unenrollment',
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * Get future activities (calendar events) from Moodle courses
     *
     * @param array $courseIds Array of Moodle course IDs
     * @param int $timeStart Unix timestamp for start time (default: now)
     * @param int $timeEnd Unix timestamp for end time (default: 1 year from now)
     * @return array Future activities result
     */
    public function getFutureActivities(array $courseIds, int $timeStart = null, int $timeEnd = null): array
    {
        try {
            $result = $this->connection->getCalendarEvents($courseIds, $timeStart, $timeEnd);
            
            if (!$result['success']) {
                return $result;
            }

            return [
                'success' => true,
                'message' => 'Future activities retrieved successfully',
                'activities' => $result['events'],
                'warnings' => $result['warnings'] ?? []
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Exception during future activities retrieval',
                'error' => $e->getMessage(),
                'activities' => []
            ];
        }
    }

    /**
     * Transform Moodle calendar events to Gibbon planner format
     *
     * @param array $moodleEvents Array of Moodle calendar events
     * @param int $gibbonCourseClassID Gibbon course class ID to associate with
     * @param string $role User role (Student, Teacher, etc.)
     * @return array Array of events in Gibbon format
     */
    public function transformEventsToGibbonFormat(array $moodleEvents,  string $role = 'Student'): array
    {
        $gibbonEvents = [];

        foreach ($moodleEvents as $event) {
            // Convert Unix timestamp to date and time
            $eventDate = date('Y-m-d', $event['timestart']);
            $eventTime = date('H:i:s', $event['timestart']);
            
            // Calculate end time (if duration is provided)
            $endTime = $event['timeduration'] > 0 
                ? date('H:i:s', $event['timestart'] + $event['timeduration']) 
                : date('H:i:s', $event['timestart'] + 3600); // Default 1 hour duration

            // Map Moodle event to Gibbon format
            $gibbonEvents[] = [
                'gibbonPlannerEntryID' => 'moodle_' . $event['id'], // Prefix to avoid conflicts
                'summary' => $event['description'] ?: 'FROM MOODLE: ' . $event['name'],
                'gibbonUnitID' => null,
                'unit' => null,
                'gibbonCourseClassID' => null,
                'course' => $event['courseid'] ?? null,
                'class' => 'MOODLE',
                'lesson' => $event['name'],
                'timeStart' => $eventTime,
                'timeEnd' => $endTime,
                'viewableStudents' => 'Y',
                'viewableParents' => 'Y',
                'homework' => $this->determineHomeworkStatus($event),
                'homeworkSubmission' => $this->determineSubmissionStatus($event),
                'homeworkCrowdAssess' => 'N',
                'date' => $eventDate,
                'teacherIDs' => null,
                'role' => $role,
                'myHomeworkDueDateTime' => $event['timeduration'] > 0 ? date('Y-m-d H:i:s', $event['timestart'] + $event['timeduration']) : null,
                'gibbonTTDayRowClassID' => null
            ];
        }

        return $gibbonEvents;
    }

    /**
     * Determine if Moodle event should be considered homework
     *
     * @param array $event Moodle event data
     * @return string 'Y' or 'N'
     */
    private function determineHomeworkStatus(array $event): string
    {
        $homeworkTypes = ['assign', 'quiz', 'workshop', 'forum'];
        $eventType = $event['modulename'] ?? '';
        
        return in_array($eventType, $homeworkTypes) ? 'Y' : 'N';
    }

    /**
     * Determine if Moodle event requires submission
     *
     * @param array $event Moodle event data
     * @return string 'Y' or 'N'
     */
    private function determineSubmissionStatus(array $event): string
    {
        $submissionTypes = ['assign', 'workshop'];
        $eventType = $event['modulename'] ?? '';
        
        return in_array($eventType, $submissionTypes) ? 'Y' : 'N';
    }

    /**
     * Request a login URL from Moodle for a specific user
     *
     * @param string $username Username to generate login URL for
     * @return array Login URL result
     */
    public function requestLoginUrl(string $username): array
    {
        try {
            return $this->connection->requestLoginUrl($username);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Exception during login URL request',
                'error' => $e->getMessage()
            ];
        }
    }
}