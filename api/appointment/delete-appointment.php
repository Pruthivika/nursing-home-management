<?php include "../db/db_conn.php";

if (isset($_GET['id'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $id = validate($_GET['id']);

    $sql = "DELETE FROM appointment WHERE appointment_id=$id;";
    $res = mysqli_query($conn, $sql);
    if (!$res) {
        echo "";
        die('Error: ' . mysqli_error($conn));
    } else {
        header("Location: ../../pages/appointment.php");
    }
    mysqli_close($conn);
}
