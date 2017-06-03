<?php
    include ('db.php');
    $userName = trim($_POST['username']);
    $password = sha1(trim($_POST['password']));
    $sql = "SELECT first_name, last_name, email FROM users WHERE email = '$userName' AND password = '$password'";
    $result = $db->query($sql);
    $result -> execute();
    $row_count = $result -> fetchColumn();
    if ($row_count) {
        header('Location: http://localhost/registration/auth/my-page.php');
        $data = $result->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: http://localhost/registration/');
    }
    unset($db);
?>