<html>

<body>
    <?php
    include "../db/db_conn.php";
    // save patient details first then create appointment
    $sql1 = "INSERT INTO patient (patient_name, patient_address, mobile_number, dob, gender, email) VALUES ('$_POST[patient_name]', '$_POST[patient_address]', '$_POST[mobile_number]', '$_POST[dob]', '$_POST[gender]', '$_POST[email]')";
    $res = mysqli_query($conn, $sql1);
    $patient_id = mysqli_insert_id($conn);
    if (!$res) {
        echo "";
        die('Error: ' . mysqli_error($conn));
    } else {
        $sql2 = "INSERT INTO appointment (patient_id, doctor_id, appointment_date, appointment_fee, is_paid) VALUES ('$patient_id', '$_POST[doctor_id]', '$_POST[appointment_date]', '$_POST[appointment_fee]', '$_POST[is_paid]')";
        if (!mysqli_query($conn, $sql2)) {
            echo "";
            die('Error: ' . mysqli_error($conn));
        } else {
            header("Location: ../../pages/appointment.php");
        }
    }
    ?>
</body>

</html>