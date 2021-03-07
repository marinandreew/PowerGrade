<?php
include "db.php";
if (isset($_POST["action"])) {
    if ($_POST["action"] == "login") {
        $userData = array(
            "username" => $_POST["username"],
            "password" => $_POST["password"]
        );
        //check if user exists
        if (userExistsByUsername($userData["username"])) {
            $databaseUser = getUserByUsername($userData["username"]);

            if($databaseUser["user_type"] == 3){
                //login
                if (password_verify($userData["password"], $databaseUser["password"])) {
                    $userKey = md5(uniqid());
                    setUserKey($databaseUser["id"], $userKey);
                    setcookie("user_key", $userKey, time() + (86400*30), "/");
                    header("Location: ../student/main.php");
                } else {
                    echo "Wrong password!";
                }
            }
            else{
                echo "There isn't such student in the database!";
            }
        }
        //register
    } else if($_POST["action"] == "register") {
        $userData = array(
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "confirmPassword" => $_POST["confirmPassword"],
            "first_name" => $_POST["first_name"],
            "middle_name" => $_POST["middle_name"],
            "last_name" => $_POST["last_name"],
            "class" => $_POST["class"]
        );
        if(validateRegister($userData)) {
            //check if user exists
            if(!userExistsByUsername($userData["username"])) {
                //add student
                if(addStudent($userData)) {
                    $databaseUser = getUserByUsername($userData["username"]);
                    $userKey = md5(uniqid());
                    setUserKey($databaseUser["id"], $userKey);
                    $user_id = $databaseUser["id"];
                    $first_name = $databaseUser["first_name"];
                    $middle_name = $databaseUser["middle_name"];
                    $last_name = $databaseUser["last_name"];
                    $class = $databaseUser["class"];
                    $username = $databaseUser["username"];
                    $db->query("INSERT INTO `students` (`user_id`, `first_name`, `middle_name`, `last_name`, `class`, `username`) VALUES ('$user_id', '$first_name', '$middle_name', '$last_name', '$class', '$username')");
                    if ($db->error) {
                        printf("Errormessage: %s\n", $db->error);
                    }

                    header("Location: ../admin/main.php");
                } else {
                    echo "There was problem with adding the user to the database.";
                }
            } else {
                echo "The username is already taken.";
            }
        }
    }
} else {
    die("Invalid request.");
}
?>