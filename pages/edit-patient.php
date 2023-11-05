<?php include '../api/patient/update-patient.php'; ?>

<html>

<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
    <title>Patient</title>
</head>

<body style="background-image: url('../img/main-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <h1>Edit Patient</h1>
    <a href="./patients.php">back</a>
    <?php if ($row) { ?>
        <form style="margin-top: 20px;" action="../api/patient/update-patient.php" method="POST">
            <table>
                <input type="hidden" id="patient_id" name="patient_id" value="<?php echo $row['patient_id'] ?>">
                <tr>
                    <td><label for="patient_name">Patient name :</label></td>
                    <td><input type="text" id="patient_name" name="patient_name" value="<?php echo $row['patient_name']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="patient_address">Address :</label></td>
                    <td><textarea id="patient_address" name="patient_address" style="resize: none"><?php echo $row['patient_address'] ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="mobile_number">Mobile number :</label></td>
                    <td><input type="number" id="mobile_number" name="mobile_number" value="<?php echo $row['mobile_number'] ?>" /></td>
                </tr>
                <tr>
                    <td><label for="dob">Date of birth :</label></td>
                    <td><input type="date" id="dob" name="dob" value="<?php echo $row['dob'] ?>" /></td>
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
                    <td><input type="text" id="email" name="email" value="<?php echo $row['email'] ?>" /></td>
                </tr>
            </table>
            <br></br>
            <input type="submit" value="Update">
        </form>
    <?php } ?>
</body>

</html>