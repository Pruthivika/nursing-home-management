
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

    $sql = "SELECT p.patient_name,a.admission_id, p.patient_address, p.mobile_number, p.email, p.dob, p.gender, d.doctor_name, a.room_id, a.is_paid, a.admission_fee 
    FROM admission AS a 
    LEFT JOIN patient AS p  
    ON a.patient_id=p.patient_id  
    LEFT JOIN doctor AS d  
    ON a.doctor_id = d.doctor_id
    WHERE a.admission_id=$id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        header("Location: ../../pages/admission.php");
    }
} else {
    // runs when we click on update button
    include "../db/db_conn.php";
    $admission_id = $_POST['admission_id'];

    $sql = "UPDATE admission
        SET room_id='$_POST[room_id]', is_paid='$_POST[is_paid]'
        WHERE admission_id=$admission_id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // if user changes room, old room will be changed to available status and new room will be locked
        $sql1 = "UPDATE room SET is_available=0 WHERE room_id='$_POST[room_id]'";
        $sql2 = "UPDATE room SET is_available=1 WHERE room_id='$_POST[old_room_id]'";
        $result1 = mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);
        if ($result1 && $result2) {
            header("Location: ../../pages/admission.php");
        } else {
            echo "";
            die('Error: ' . mysqli_error($conn));
        }
    }
}
