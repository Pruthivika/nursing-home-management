<?php include "../api/db/db_conn.php";

$sql = "SELECT a.appointment_id, p.patient_name, p.mobile_number, p.email, d.doctor_name, a.appointment_date, a.is_paid 
        FROM appointment AS a 
        LEFT JOIN patient AS p  
        ON a.patient_id=p.patient_id  
        LEFT JOIN doctor AS d  
        ON a.doctor_id = d.doctor_id";
$res = mysqli_query($conn, $sql);

mysqli_close($conn);
