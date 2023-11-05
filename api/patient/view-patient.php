
<?php include "../api/db/db_conn.php";

$sql = "SELECT r.file_path, r.report_type, p.patient_id, p.patient_name,  p.patient_address,  p.dob, p.gender, p.mobile_number, p.email, d.doctor_name
        FROM report AS r 
        LEFT JOIN patient AS p  
        ON r.patient_id=p.patient_id  
        LEFT JOIN doctor AS d  
        ON r.doctor_id = d.doctor_id";

$res = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
