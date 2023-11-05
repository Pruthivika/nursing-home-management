
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

    $sql = "SELECT patient_name, patient_id, patient_address, mobile_number, dob, gender, email FROM patient WHERE patient_id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ../../pages/patients.php");
    }
} else {
    // runs when we click on update button
    include "../db/db_conn.php";

    $patient_id = $_POST['patient_id'];
    $sql = "UPDATE patient
               SET patient_name='$_POST[patient_name]', patient_address='$_POST[patient_address]', mobile_number='$_POST[mobile_number]',
               dob='$_POST[dob]', email='$_POST[email]'
               WHERE patient_id=$patient_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../../pages/patients.php");
    } else {
        echo "";
        die('Error: ' . mysqli_error($conn));
    }
}
