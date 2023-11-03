<html>

<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "nursing_home_db");
    if (mysqli_connect_errno()) {
        die('Could not connect: ' . mysqli_error($con));
    } else {
        // insert patient record first
        $sql1 = "INSERT INTO patient (patient_name, patient_address, mobile_number, dob, gender, email) VALUES ('$_POST[patient_name]', '$_POST[patient_address]', '$_POST[mobile_number]', '$_POST[dob]', '$_POST[gender]', '$_POST[email]')";
        $res = mysqli_query($con, $sql1);
        $patient_id = mysqli_insert_id($con);
        if (!$res) {
            echo "";
            die('Error: ' . mysqli_error($con));
        } else {
            // insert admission
            $sql2 = "INSERT INTO admission (patient_id, doctor_id, room_id, admission_fee, is_paid) VALUES ('$patient_id', '$_POST[doctor_id]', '$_POST[room_id]', '$_POST[admission_fee]', '$_POST[is_paid]')";
            if (!mysqli_query($con, $sql2)) {
                echo "";
                die('Error: ' . mysqli_error($con));
            } else {
                echo "1 record added";
            }
        }
    }
    mysqli_close($con);
    ?>
</body>

</html>