<?php include '../api/admission/update-admission.php';
include "../api/common/get-data.php" ?>

<html>

<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
    <title>Hospital Admission</title>
</head>

<body style="background-image: url('../img/main-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <h1>Edit Admission</h1> <a href="./admission.php">back</a>
    <?php if ($row) { ?>
        <form style="margin-top: 20px;" action="../api/admission/update-admission.php" method="POST">
            <table>
                <input type="hidden" id="admission_id" name="admission_id" value="<?php echo $row['admission_id'] ?>">
                <tr>
                    <td><label for="patient_name">Patient name :</label></td>
                    <td><input type="text" id="patient_name" name="patient_name" value="<?php echo $row['patient_name']; ?>" disabled /></td>
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
                    <td><label for="doctor_id">Doctor : </label></td>
                    <td><input type="text" id="doctor_name" name="doctor_name" value="<?php echo $row['doctor_name'] ?>" disabled /></td>

                </tr>
                <tr>
                    <input type="hidden" id="old_room_id" name="old_room_id" value="<?php echo $row['room_id'] ?>" />
                    <td><label for="room_id">Room : </label></td>
                    <td><select name="room_id" id="room_id" required>
                            <?php
                            $i = 0;
                            while ($rows = mysqli_fetch_assoc($all_room_res)) {
                                $i++;
                            ?>

                                <option value="<?php echo $rows['room_id'] ?>" <?php echo ($rows['room_id'] == $row['room_id']) ? 'selected' : '' ?>><?php echo "Room " . $rows['room_id'] ?></option>

                            <?php } ?>

                        </select></td>

                </tr>
                <tr>
                    <td><label for="admission_fee">Admission fee : </label></td>
                    <td><input type="number" id="admission_fee" name="admission_fee" value="<?php echo $row['admission_fee'] ?>" disabled /></td>
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
    <?php } ?>
</body>

</html>