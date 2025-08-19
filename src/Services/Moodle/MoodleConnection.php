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