<?php include "../api/db/db_conn.php";
// getting preloaded data such as doctor, room details
$sql1 = "SELECT doctor_name, doctor_id FROM doctor";
$sql2 = "SELECT room_id FROM room WHERE is_available=1";
$sql3 = "SELECT room_id FROM room";

$doctor_res = mysqli_query($conn, $sql1);
$room_res = mysqli_query($conn, $sql2);
$all_room_res = mysqli_query($conn, $sql3);

mysqli_close($conn);
