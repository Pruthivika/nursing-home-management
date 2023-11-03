<html>

<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "nursing_home_db");
    if (mysqli_connect_errno()) {
        die('Could not connect: ' . mysqli_error($con));
    } else {
        $sql = "SELECT a.admission_id, p.patient_name, p.patient_address, p.mobile_number, p.email, d.doctor_name, a.room_id 
        FROM admission AS a 
LEFT JOIN patient AS p  
ON a.patient_id=p.patient_id  
LEFT JOIN doctor AS d  
ON a.doctor_id = d.doctor_id";
        // $sql = "SELECT * FROM admission ORDER BY admission_id DESC";
        $res = mysqli_query($con, $sql);
    }
    mysqli_close($con);
    ?>
</body>

</html>