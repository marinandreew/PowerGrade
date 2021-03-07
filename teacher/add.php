<?php
include "../functions/db.php";
if (!$loggedIn){
    header("Location: ../pages/login.php");
}
$title = $_POST['title'];
$grade = $_POST['grade'];

$teacher_id = $userinfo["id"];
$studentId = $_GET["studentId"];
if (isset($_POST['upload'])){
    if($teacher_id == 8){
        $db->query("INSERT INTO `grades` (`title`, `grade`, `studentId`, `subjectId`, `teacherId_Users`) VALUES ('$title', '$grade', '$studentId', 1, '$teacher_id')");
    }
    if($teacher_id == 27){
        $db->query("INSERT INTO `grades` (`title`, `grade`, `studentId`, `subjectId`, `teacherId_Users`) VALUES ('$title', '$grade', '$studentId', 2, '$teacher_id')");
    }
    if ($db->error) {
        printf("Errormessage: %s\n", $db->error);
    }
}
header("Location: main.php");
?>