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
use Gibbon\Data\Validator;
use Gibbon\Services\Moodle\MoodleService;

include '../../gibbon.php';

$_POST = $container->get(Validator::class)->sanitize($_POST);

$gibbonCourseClassID = $_GET['gibbonCourseClassID'] ?? '';
$gibbonCourseID = $_GET['gibbonCourseID'] ?? '';
$gibbonSchoolYearID = $_GET['gibbonSchoolYearID'] ?? '';
$search = $_GET['search'] ?? '';

if ($gibbonCourseID == '' or $gibbonSchoolYearID == '' or $gibbonCourseClassID == '') { echo 'Fatal error loading this page!';
} else {
    $URL = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address'])."/courseEnrolment_manage_class_edit.php&gibbonCourseClassID=$gibbonCourseClassID&gibbonCourseID=$gibbonCourseID&gibbonSchoolYearID=$gibbonSchoolYearID&search=$search";

    if (isActionAccessible($guid, $connection2, '/modules/Timetable Admin/courseEnrolment_manage_class_edit.php') == false) {
        $URL .= '&return=error0';
        header("Location: {$URL}");
    } else {
        //Proceed!
        //Run through each of the selected participants.
        $update = true;
        $choices = $_POST['Members'] ?? [];
        $role = $_POST['role'] ?? '';

        if (count($choices) < 1 or $role == '') {
            $URL .= '&return=error1';
            header("Location: {$URL}");
        } else {
            // Get course and class information for Moodle enrollment
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
                // Continue without Moodle enrollment if course info can't be retrieved
            }

            foreach ($choices as $t) {
                //Check to see if student is already registered in this class
                try {
                    $data = array('gibbonPersonID' => $t, 'gibbonCourseClassID' => $gibbonCourseClassID);
                    $sql = 'SELECT * FROM gibbonCourseClassPerson WHERE gibbonPersonID=:gibbonPersonID AND gibbonCourseClassID=:gibbonCourseClassID';
                    $result = $connection2->prepare($sql);
                    $result->execute($data);
                } catch (PDOException $e) {
                    $update = false;
                }

                $enrolledInGibbon = false;
                
                //If student not in course, add them
                if ($result->rowCount() == 0) {
                    try {
                        $data = array('gibbonPersonID' => $t, 'gibbonCourseClassID' => $gibbonCourseClassID, 'role' => $role, 'dateEnrolled' => date('Y-m-d'));
                        $sql = 'INSERT INTO gibbonCourseClassPerson SET gibbonPersonID=:gibbonPersonID, gibbonCourseClassID=:gibbonCourseClassID, role=:role, dateEnrolled=:dateEnrolled';
                        $result = $connection2->prepare($sql);
                        $result->execute($data);
                        $enrolledInGibbon = true;
                    } catch (PDOException $e) {
                        $update = false;
                    }
                } else {
                    $values = $result->fetch();
                    $dateEnrolled = $values['role'] != $role || empty($values['dateEnrolled']) ? date('Y-m-d') : $values['dateEnrolled'];
                    try {
                        $data = array('gibbonPersonID' => $t, 'gibbonCourseClassID' => $gibbonCourseClassID, 'role' => $role, 'dateEnrolled' => $dateEnrolled);
                        $sql = 'UPDATE gibbonCourseClassPerson SET role=:role, dateEnrolled=:dateEnrolled, dateUnenrolled=NULL WHERE gibbonPersonID=:gibbonPersonID AND gibbonCourseClassID=:gibbonCourseClassID';
                        $result = $connection2->prepare($sql);
                        $result->execute($data);
                        $enrolledInGibbon = true;
                    } catch (PDOException $e) {
                        $update = false;
                    }
                }

                // If successfully enrolled in Gibbon and we have course info, try to enroll in Moodle
                if ($enrolledInGibbon && $courseInfo) {
                    try {
                        // Get user information for Moodle enrollment
                        $userData = array('gibbonPersonID' => $t);
                        $userSql = 'SELECT username FROM gibbonPerson WHERE gibbonPersonID = :gibbonPersonID';
                        $userResult = $connection2->prepare($userSql);
                        $userResult->execute($userData);
                        $user = $userResult->fetch();

                        if ($user && !empty($user['username'])) {
                            // Construct Moodle course shortname (same format as created in class creation)
                            $moodleCourseShort = $courseInfo['courseShort'] . '_' . $courseInfo['classShort'];
                            
                            // Convert Gibbon role to Moodle role
                            $moodleRole = ($role === 'Teacher') ? 'teacher' : 'student';

                            // Try to enroll in Moodle
                            $moodleService = $container->get(MoodleService::class);
                            $enrollmentResult = $moodleService->enrollUserInCourse($user['username'], $moodleCourseShort, $moodleRole);
                            
                            // If enrollment fails, we continue silently as requested
                            // (do nothing if user doesn't exist in Moodle)
                        }
                    } catch (Exception $e) {
                        // Silently continue if Moodle enrollment fails
                        // This covers cases where user doesn't exist in Moodle or Moodle is unavailable
                    }
                }
            }
            //Write to database
            if ($update == false) {
                $URL .= '&return=error2';
                header("Location: {$URL}");
            } else {
                $URL .= '&return=success0';
                header("Location: {$URL}");
            }
        }
    }
}
