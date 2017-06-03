<?php
    include ('db.php');
    $firstName        = trim($_POST['firstName']);
    $lastName         = trim($_POST['lastName']);
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirmPassword  = $_POST['confirm_password'];
    $day              = $_POST['birthday_day'];
    $month            = $_POST['birthday_month'];
    $year             = $_POST['birthday_year'];

    if (strlen($month) == 1) {
        $month = '0'.$month;
    }
    if (strlen($day) == 1) {
        $day = '0'.$day;
    }
    $days =$year.'-'.$month.'-'.$day;

    $errors = [];
    session_start();
    if ($password != $confirmPassword){
        $errors['confirm_password']['errorMessage'] = 'Password does not match';
        $_SESSION['errors'] = $errors;
        $_SESSION['is_registering'] = true;
        header('Location: http://localhost/registration/');
    }
    if (!$firstName) {
        $errors['firstName']['errorMessage'] = 'Field first name is required!';
        $_SESSION['errors'] = $errors;
        $_SESSION['is_registering'] = true;
        header('Location: http://localhost/registration/');
    }
    if (!$lastName) {
        $errors['lastName']['errorMessage'] = 'Field last name is required!';
        $_SESSION['errors'] = $errors;
        $_SESSION['is_registering'] = true;
        header('Location: http://localhost/registration/');
    }
    $select = "SELECT `email` FROM `users` WHERE `email` = '".$_POST['email']."'";
    $query = $db->prepare($select);
    $query->execute();
    if($query->rowCount() > 0) {
        $errors['email']['errorMessage'] = 'Field email already use!';
        $_SESSION['errors'] = $errors;
        $_SESSION['is_registering'] = true;
        header('Location: http://localhost/registration');
    } else if ($firstName && $lastName && $email && $password) {
        if ($password == $confirmPassword) {
            $password = sha1($password);

            $sql = "INSERT INTO users (first_name, last_name, email, password, birthday_day) VALUES ('$firstName', '$lastName', '$email', '$password','$days')";
            $db->query($sql);
            header('Location: http://localhost/login.php');
        }
        unset($db);
    }

?>