<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

function validateRegister($userData) {
    if($userData["username"] == "" || $userData["password"] == "" || $userData["email"] == "") {
        return false;
    } 
    if($userData["password"] != $userData["confirmPassword"]) {
        return false;
    } return true; 
}

function userExistsByUsername($username) {
    global $db;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return ($result->num_rows > 0); 
}

function userExistsByEmail($email) {
    global $db;
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();   
    return ($result->num_rows > 0); 
}

function addTeacher($userData) {
    global $db;
    $sql = "INSERT INTO users (username, password, email, user_type, time, user_key, first_name, middle_name, last_name, class) VALUES(?, ?, ?, 2, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $encryptedPassword = password_hash($userData["password"], PASSWORD_DEFAULT);
    $time = time();
    $userKey = "";
    $stmt->bind_param("ssssisssi",
        $userData["username"], 
        $encryptedPassword,
        $userData["email"],
        $time,
        $userKey,
        $userData["first_name"],
        $userData["middle_name"],
        $userData["last_name"],
        $userData["class"]
    );
    return $stmt->execute(); 
}

function addStudent($userData) {
    global $db;
    $sql = "INSERT INTO users (username, password, email, user_type, time, user_key, first_name, middle_name, last_name, class) VALUES(?, ?, ?, 3, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $encryptedPassword = password_hash($userData["password"], PASSWORD_DEFAULT);
    $time = time();
    $userKey = "";
    $stmt->bind_param("ssssisssi",
        $userData["username"], 
        $encryptedPassword,
        $userData["email"],
        $time,
        $userKey,
        $userData["first_name"],
        $userData["middle_name"],
        $userData["last_name"],
        $userData["class"]
    );
    return $stmt->execute(); 
}

function getUserByUsername($username) {
    global $db;
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    } 
}

function getStudentByUsername($username) {
    global $db;
    $sql = "SELECT * FROM students WHERE username = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    } 
}

function getSubjectById($id) {
    global $db;
    $sql = "SELECT * FROM subjects WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    } 
}

function getUserByKey($userKey) {
    global $db;
    $sql = "SELECT * FROM users WHERE user_key = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $userKey);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return NULL;
    } 
}

function setUserKey($user_id, $key) {
    global $db;
    $sql = "UPDATE users SET user_key = ? WHERE id = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("si", $key, $user_id);
    return $stmt->execute(); 
}

?>