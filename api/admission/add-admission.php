<html>

<body>
    <?php
    // save patient details first then create admission, once it's done then have to lock the room ( making it unavailable)
    include "../db/db_conn.php";
    $sql1 = "INSERT INTO patient (patient_name, patient_address, mobile_number, dob, gender, email) VALUES ('$_POST[patient_name]', '$_POST[patient_address]', '$_POST[mobile_number]', '$_POST[dob]', '$_POST[gender]', '$_POST[email]')";
    $res = mysqli_query($conn, $sql1);
    $patient_id = mysqli_insert_id($conn);
    if (!$res) {
        echo "";
        die('Error: ' . mysqli_error($conn));
    } else {
        $sql2 = "INSERT INTO admission (patient_id, doctor_id, room_id, admission_fee, is_paid) VALUES ('$patient_id', '$_POST[doctor_id]', '$_POST[room_id]', '$_POST[admission_fee]', '$_POST[is_paid]')";
        if (!mysqli_query($conn, $sql2)) {
            echo "";
            die('Error: ' . mysqli_error($conn));
        } else {
            $sql3 = "UPDATE room SET is_available=0 WHERE room_id='$_POST[room_id]'";
            if (!mysqli_query($conn, $sql3)) {
                echo "";
                die('Error: ' . mysqli_error($conn));
            } else {
                header("Location: ../../pages/admission.php");
            }
        }
    }

    ?>
</body>

</html>