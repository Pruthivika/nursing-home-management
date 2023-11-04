<?php
session_start();
include "../db/db_conn.php";
echo isset($_POST['uname']);
if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    if (empty($uname)) {
        header("Location: ../../pages/index.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: ../../pages/index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE user_name='$uname'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $uname && password_verify($pass, $row['password'])) {
                echo "Logged in!";
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['id'] = $row['user_id'];
                header("Location: ../../pages/home.php");
                exit();
            } else {
                header("Location: ../../pages/index.php?error=Incorect User name or password");
                exit();
            }
        } else {
            header("Location: ../../pages/index.php?error=Incorect User name or password");
            exit();
        }
    }
} else {
    header("Location: ../../pages/index.php");
    exit();
}
