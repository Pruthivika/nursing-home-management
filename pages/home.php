<?php

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
    <html>

    <head>
        <style>
            .card {
                /* Add shadows to create the "card" effect */
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                transition: 0.3s;
                background-color: white;
                height: 200px;
                width: 200px;
                display: flex;
                justify-content: center;
                flex-direction: column;
                text-decoration: none;
                color: black;
            }

            .container {
                padding: 2px 16px;
            }

            body {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
        </style>
        <title>Home</title>
    </head>

    <body style="background-image: url('../img/main-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
        <h1>Welcome to CareMate</h1> <a href="../api/auth/logout.php">logout</a>
        <div style="display: flex; flex-direction: row; gap: 20px; margin-top: 70px;">

            <a href="./appointment.php" class="card">
                <img src="../img/calendar-check-regular.svg" style="height: 50px;">
                <div class="container">
                    <h4 style="text-align: center;"><b>Manage Appointments</b></h4>
                </div>
            </a>
            <a href="./admission.php" class="card">
                <img src="../img/bed-solid.svg" style="height: 50px;">
                <div class="container">
                    <h4 style="text-align: center;"><b>Manage Admissions</b></h4>
                </div>
            </a>
            <a href="./patients.php" class="card">
                <img src="../img/hospital-user-solid.svg" style="height: 50px;">
                <div class="container">
                    <h4 style="text-align: center;"><b>Patients</b></h4>
                </div>
            </a>
        </div>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}

?>