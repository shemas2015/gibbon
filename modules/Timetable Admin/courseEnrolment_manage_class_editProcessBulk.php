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

use Gibbon\Services\Moodle\MoodleService;

include '../../gibbon.php';

$gibbonCourseClassID = $_POST['gibbonCourseClassID'] ?? '';
$gibbonCourseID = $_POST['gibbonCourseID'] ?? '';
$gibbonSchoolYearID = $_POST['gibbonSchoolYearID'] ?? '';
$action = $_POST['action'] ?? '';
$search = $_POST['search'] ?? '';

$URL = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address'])."/courseEnrolment_manage_class_edit.php&gibbonCourseID=$gibbonCourseID&gibbonSchoolYearID=$gibbonSchoolYearID&gibbonCourseClassID=$gibbonCourseClassID&search=$search";

if (isActionAccessible($guid, $connection2, '/modules/Timetable Admin/courseEnrolment_manage_class_edit.php') == false) {
    $URL .= '&return=error0';
    header("Location: {$URL}");
} else if ($gibbonCourseClassID == '' or $gibbonCourseID == '' or $gibbonSchoolYearID == '' or $action == '') {
    $URL .= '&return=error1';
    header("Location: {$URL}");
} else {
    $people = isset($_POST['gibbonCourseClassPersonID']) ? $_POST['gibbonCourseClassPersonID'] : array();

    //Proceed!
    //Check if person specified
    if (count($people) < 1) {
        $URL .= '&return=error3';
        header("Location: {$URL}");
    } else {
        // Get course information for Moodle operations
        $courseInfo = null;
        try {
            $courseData = array('gibbonCourseClassID' => $gibbonCourseClassID);
            $courseSql = 'SELECT gc.name as courseName, gc.nameShort as courseShort, gcc.name as className, gcc.nameShort as classShort 
                         FROM gibbonCourseClass gcc 
                         JOIN gibbonCourse gc ON gcc.gibbonCourseID = gc.gibbonCourseID 
                         WHERE gcc.gibbonCourseClassID = :gibbonCourseClassID';
            $courseResult = $connection2->prepare($courseSql);
            $courseResult->execute($courseData);
            $courseInfo = $courseResult->fetch();
        } catch (PDOException $e) {
            // Continue without Moodle operations if course info can't be retrieved
        }

        $partialFail = false;
        if ($action == 'Delete') {
            foreach ($people as $gibbonCourseClassPersonID) {
                // Get user information before deletion for Moodle unenrollment
                $userInfo = null;
                if ($courseInfo) {
                    try {
                        $userData = array('gibbonCourseClassPersonID' => $gibbonCourseClassPersonID);
                        $userSql = 'SELECT gp.username, gp.gibbonPersonID 
                                   FROM gibbonCourseClassPerson gccp 
                                   JOIN gibbonPerson gp ON gccp.gibbonPersonID = gp.gibbonPersonID 
                                   WHERE gccp.gibbonCourseClassPersonID = :gibbonCourseClassPersonID';
                        $userResult = $connection2->prepare($userSql);
                        $userResult->execute($userData);
                        $userInfo = $userResult->fetch();
                    } catch (PDOException $e) {
                        // Continue without user info if query fails
                    }
                }

                // Try to unenroll from Moodle before deleting from Gibbon
                if ($courseInfo && $userInfo && !empty($userInfo['username'])) {
                    try {
                        $moodleCourseShort = $courseInfo['courseShort'] . '_' . $courseInfo['classShort'];
                        $moodleService = $container->get(MoodleService::class);
                        $unenrollmentResult = $moodleService->unenrollUserFromCourse($userInfo['username'], $moodleCourseShort);
                        // Continue silently regardless of Moodle unenrollment success/failure
                    } catch (Exception $e) {
                        // Silently continue if Moodle unenrollment fails
                    }
                }

                try {
                    $data = array('gibbonCourseClassID' => $gibbonCourseClassID, 'gibbonCourseClassPersonID' => $gibbonCourseClassPersonID);
                    $sql = 'DELETE FROM gibbonCourseClassPerson WHERE gibbonCourseClassID=:gibbonCourseClassID AND gibbonCourseClassPersonID=:gibbonCourseClassPersonID';
                    $result = $connection2->prepare($sql);
                    $result->execute($data);
                } catch (PDOException $e) {
                    $partialFail == true;
                }
            }
        }
        else if ($action == 'Copy to class') {
            $gibbonCourseClassIDCopyTo = (isset($_POST['gibbonCourseClassIDCopyTo']))? $_POST['gibbonCourseClassIDCopyTo'] : NULL;
            if (!empty($gibbonCourseClassIDCopyTo)) {

                foreach ($people as $gibbonCourseClassPersonID) {
                    // Check for duplicates
                    try {
                        $dataCheck = array('gibbonCourseClassIDCopyTo' => $gibbonCourseClassIDCopyTo, 'gibbonCourseClassPersonID' => $gibbonCourseClassPersonID);
                        $sqlCheck = 'SELECT gibbonPersonID FROM gibbonCourseClassPerson WHERE gibbonCourseClassID=:gibbonCourseClassIDCopyTo AND gibbonCourseClassPersonID=:gibbonCourseClassPersonID';
                        $resultCheck = $connection2->prepare($sqlCheck);
                        $resultCheck->execute($dataCheck);
                    } catch (PDOException $e) {
                        $partialFail == true;
                    }

                    // Insert new course participants
                    if ($resultCheck->rowCount() == 0) {
                        try {
                            $data = array('gibbonCourseClassID' => $gibbonCourseClassID, 'gibbonCourseClassPersonID' => $gibbonCourseClassPersonID, 'gibbonCourseClassIDCopyTo' => $gibbonCourseClassIDCopyTo, 'dateEnrolled' => date('Y-m-d'));
                            $sql = 'INSERT INTO gibbonCourseClassPerson (gibbonCourseClassID, gibbonPersonID, role, dateEnrolled, reportable) SELECT :gibbonCourseClassIDCopyTo, gibbonPersonID, role, :dateEnrolled, reportable FROM gibbonCourseClassPerson WHERE gibbonCourseClassID=:gibbonCourseClassID AND gibbonCourseClassPersonID=:gibbonCourseClassPersonID';
                            $result = $connection2->prepare($sql);
                            $result->execute($data);
                        } catch (PDOException $e) {
                            $partialFail == true;
                        }
                    }


                }
            } else {
                $URL .= '&return=error3';
                header("Location: {$URL}");
            }
        } else if ($action == 'Mark as left') {
            foreach ($people as $gibbonCourseClassPersonID) {
                // Get user information for Moodle unenrollment
                $userInfo = null;
                if ($courseInfo) {
                    try {
                        $userData = array('gibbonCourseClassPersonID' => $gibbonCourseClassPersonID);
                        $userSql = 'SELECT gp.username, gp.gibbonPersonID 
                                   FROM gibbonCourseClassPerson gccp 
                                   JOIN gibbonPerson gp ON gccp.gibbonPersonID = gp.gibbonPersonID 
                                   WHERE gccp.gibbonCourseClassPersonID = :gibbonCourseClassPersonID';
                        $userResult = $connection2->prepare($userSql);
                        $userResult->execute($userData);
                        $userInfo = $userResult->fetch();
                    } catch (PDOException $e) {
                        // Continue without user info if query fails
                    }
                }

                // Try to unenroll from Moodle before marking as left in Gibbon
                if ($courseInfo && $userInfo && !empty($userInfo['username'])) {
                    try {
                        $moodleCourseShort = $courseInfo['courseShort'] . '_' . $courseInfo['classShort'];
                        $moodleService = $container->get(MoodleService::class);
                        $unenrollmentResult = $moodleService->unenrollUserFromCourse($userInfo['username'], $moodleCourseShort);
                        // Continue silently regardless of Moodle unenrollment success/failure
                    } catch (Exception $e) {
                        // Silently continue if Moodle unenrollment fails
                    }
                }

                try {
                    $data = array('gibbonCourseClassID' => $gibbonCourseClassID, 'gibbonCourseClassPersonID' => $gibbonCourseClassPersonID, 'dateUnenrolled' => date('Y-m-d'));
                    $sql = "UPDATE gibbonCourseClassPerson SET role=CONCAT(role, ' - Left '), dateUnenrolled=:dateUnenrolled WHERE gibbonCourseClassID=:gibbonCourseClassID AND gibbonCourseClassPersonID=:gibbonCourseClassPersonID AND (role = 'Student' OR role = 'Teacher')";
                    $result = $connection2->prepare($sql);
                    $result->execute($data);
                } catch (PDOException $e) {
                    $partialFail == true;
                }
            }
        }

        if ($partialFail == true) {
            $URL .= '&return=warning1';
            header("Location: {$URL}");
        } else {
            $URL .= '&return=success0';
            header("Location: {$URL}");
        }
    }

}
