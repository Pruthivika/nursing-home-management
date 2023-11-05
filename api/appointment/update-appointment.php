<?php
// read data from database and show it in edit screen
if (isset($_GET['id'])) {
    include "../api/db/db_conn.php";
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $id = validate($_GET['id']);
    $sql = "SELECT p.patient_name,a.appointment_id, p.patient_address, p.mobile_number, p.email, p.dob, p.gender, d.doctor_name, a.appointment_date, a.is_paid, a.appointment_fee 
    FROM appointment AS a 
    LEFT JOIN patient AS p  
    ON a.patient_id=p.patient_id  
    LEFT JOIN doctor AS d  
    ON a.doctor_id = d.doctor_id
    WHERE a.appointment_id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ../../pages/appointment.php");
    }
} else {
    // runs when we click on update button
    include "../db/db_conn.php";
    $appointment_id = $_POST['appointment_id'];
    $sql = "UPDATE appointment
               SET appointment_date='$_POST[appointment_date]', is_paid='$_POST[is_paid]'
               WHERE appointment_id=$appointment_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../../pages/appointment.php");
    }
}
