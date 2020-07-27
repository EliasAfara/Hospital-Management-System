<?php
session_start();
require "db.php";

$errors = array();
$username = "";
$email = "";

//if user clicks on login
if(isset($_POST['login-btn'])){
    $username=$_POST['username'];
    $email=$_POST['username'];
    $password=$_POST['password'];
    
    //validation
    if(empty($username) || empty($email)){
        $errors['user'] = "Username or E-mail Required";
    }
    if(empty($password)){
        $errors['password'] = "Password Required"; 
    }

    $emailQuery = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
    $stmt = $con->prepare($emailQuery);
    $stmt->bind_param('ss',$email, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    $valid = false;

    if($userCount > 0){
        $password = sha1($password);
        $passwordQuery = "SELECT * FROM users WHERE password=? LIMIT 1";
        $stmt = $con->prepare($passwordQuery);
        $stmt->bind_param('s', $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result->num_rows > 0){
            $valid = true;
        }
        $stmt->close();
    }

    if($valid){
        $sql = "SELECT * FROM users WHERE username='$email'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['lname'] = $row['lname'];
        $_SESSION['username']=$username;
        $_SESSION['email']=$email;
        $_SESSION['loggedIn'] = true;
        header("Location: ../index.php");
    }

    else{
        $_SESSION['loggedIn'] = false;
        $errors['valid'] = "Email or Password incorrect";
    }

}

//if user clicks on signup
if(isset($_POST['signup-btn'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $passwordConf=$_POST['passwordConf'];
    
    //validation
    if(empty($firstname)){
        $errors['fname'] = "First Name Required";
    }
    if(empty($lastname)){
        $errors['lname'] = "Family Name Required";
    }
    if(empty($username)){
        $errors['username'] = "Username Required";
    }
    if(empty($email)){
    $errors['email'] = "Email Required"; 
    }
    if(empty($password)){
        $errors['password'] = "Password Required"; 
    }
    if($password!==$passwordConf){
        $errors['passwordConf'] = "Passwords don't match!"; 
    }

    if(count($errors)==0){
        $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
        $stmt = $con->prepare($emailQuery);
        $stmt ->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $userCount = $result->num_rows;
        $stmt->close();

        if($userCount>0){
            $errors['email']="Email already exists";
        }
        $password = sha1($password);
        try {
            $token = bin2hex(random_bytes(50));
        } catch (Exception $e) {
        }
        $verified = false;

        $sql = "INSERT INTO users (username, fname, lname, email, password, token, verified) VALUES (?,?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt ->bind_param('ssssssb', $username, $firstname, $lastname, $email, $password, $token, $verified);
        if ($stmt->execute()){
            $user_id = $con->insert_id;
            $_SESSION['id']=$user_id;
            $_SESSION['fname']=$firstname;
            $_SESSION['lname']=$lastname;
            $_SESSION['username']=$username;
            $_SESSION['email']=$email;
            $_SESSION['verified']=$verified;
            $_SESSION['loggedIn'] = true;
            header('Location: ../index.php');
            exit();
        }
        else{
            $_SESSION['loggedIn'] = false;
            $errors['db_error']="Database error: failed to register";
        }
    }
}