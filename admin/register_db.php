<?php
    session_start();
    include('condb.php');

    $errors = array();
    if(isset($_POST['reg_user'])) {
        $fullname = mysqli_real_escape_string($conn, $_POST['m_name']);
        $username = mysqli_real_escape_string($conn, $_POST['m_user']);
        $email = mysqli_real_escape_string($conn, $_POST['m_email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['m_pass']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['m_pass2']);
    
        if(empty($fullname)) {
            array_push($errors, "Name is required");
        }
        if(empty($username)) {
            array_push($errors, "Username is required");
        }
        if(empty($email)) {
            array_push($errors, "Email is required");
        }
        if(empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if($password_1 != $password_2) {
            array_push($errors, "Password do not match!");
        }

        //Check user from database
        $user_check_query = "SELECT * FROM tbl_member WHERE m_user = '$username' OR '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if($result) {
            if($result['m_user'] === $username ) {
                array_push($errors, "Username already exist");
            }
            if($result['m_email'] === $email ) {
                array_push($errors, "Email already exist");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);
            $m_level = 'member';

            $sql = "INSERT INTO tbl_member (m_name, m_user, m_email, m_pass, m_level) VALUES ('$fullname','$username', '$email', '$password', '$m_level')";
            mysqli_query($conn, $sql);

            $_SESSION['m_user'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: ../');

        } else{
            array_push($errors, "Your Username/Email already exist");
            $_SESSION['error'] = "Your Username/Email already exist try again!";
            header('location: register.php');
        }
    }
?>