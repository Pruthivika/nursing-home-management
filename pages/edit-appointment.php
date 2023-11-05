<?php include "../api/appointment/update-appointment.php"; ?>
<html>

<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
    <title>Hospital Appointment</title>
</head>

<body style="background-image: url('../img/main-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <h1>Edit Appointment</h1> <a href="./appointment.php">back</a>
    <form style="margin-top: 20px;" action="../api/appointment/update-appointment.php" method="POST">
        <table>
            <input type="hidden" id="appointment_id" name="appointment_id" value="<?php echo $row['appointment_id'] ?>">
            <tr>
                <td><label for="patient_name">Patient name :</label></td>
                <td><input type="text" id="patient_name" name="patient_name" value="<?php echo $row['patient_name'] ?>" disabled /></td>
            </tr>
            <tr>
                <td><label for="patient_address">Address :</label></td>
                <td><textarea id="patient_address" name="patient_address" style="resize: none" disabled><?php echo $row['patient_address'] ?></textarea></td>
            </tr>
            <tr>
                <td><label for="mobile_number">Mobile number :</label></td>
                <td><input type="number" id="mobile_number" name="mobile_number" value="<?php echo $row['mobile_number'] ?>" disabled /></td>
            </tr>
            <tr>
                <td><label for="dob">Date of birth :</label></td>
                <td><input type="date" id="dob" name="dob" disabled value="<?php echo $row['dob'] ?>" /></td>
            </tr>
            <tr>
                <td><label for="">Gender :</label></td>
                <td> <input type="radio" id="male" name="gender" value="M" <?php echo ($row['gender'] == 'M') ? 'checked' : '' ?> disabled>
                    <label for="male">Male</label>

                    <input type="radio" id="female" name="gender" value="F" <?php echo ($row['gender'] == 'F') ? 'checked' : '' ?> disabled>
                    <label for="female">Female</label>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email : </label></td>
                <td><input type="text" id="email" name="email" value="<?php echo $row['email'] ?>" disabled /></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><label for="doctor_name">Doctor : </label></td>
                <td><input type="text" id="doctor_name" name="doctor_name" value="<?php echo $row['doctor_name'] ?>" disabled /></td>

            </tr>
            <tr>
                <td><label for="appointment_date">Appointment date : </label></td>
                <td><input type="date" id="appointment_date" name="appointment_date" value="<?php echo $row['appointment_date'] ?>" /></td>

            </tr>
            <tr>
                <td><label for="appointment_fee">Appointment fee : </label></td>
                <td><input type="number" id="appointment_fee" name="appointment_fee" value="<?php echo $row['appointment_fee'] ?>" disabled /></td>
            </tr>
            <tr>
                <td><label for="is_paid">Paid</label></td>
                <td><input type="hidden" id="is_paid" name="is_paid" value="0" />
                    <input type="checkbox" id="is_paid" name="is_paid" value="1" <?php echo ($row['is_paid'] == '1') ? 'checked' : '' ?> />
                </td>

            </tr>
        </table>
        <br></br>
        <input type="submit" value="Update">
    </form>
</body>

</html>