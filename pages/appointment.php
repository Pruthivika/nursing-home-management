<?php include "../api/appointment/view-appointment.php";
include "../api/common/get-data.php" ?>
<html>

<head>
    <style>
        #viewTable table,
        #viewTable th,
        #viewTable td {
            border: 1px solid;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
    <title>Hospital Appointment</title>
</head>

<body style="background-image: url('../img/main-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <h1>Add Appointment</h1> <a href="./home.php">back</a>
    <form style="margin-top: 20px;" action="../api/appointment/add-appointment.php" method="POST">
        <table>


            <tr>
                <td><label for="patient_name">Patient name :</label></td>
                <td><input type="text" id="patient_name" name="patient_name" required /></td>
            </tr>
            <tr>
                <td><label for="patient_address">Address :</label></td>
                <td><input type="text" id="patient_address" name="patient_address" required /></td>
            </tr>
            <tr>
                <td><label for="mobile_number">Mobile number :</label></td>
                <td><input type="number" id="mobile_number" name="mobile_number" required /></td>
            </tr>
            <tr>
                <td><label for="dob">Date of birth :</label></td>
                <td><input type="date" id="dob" name="dob" required /></td>
            </tr>
            <tr>
                <td><label for="">Gender :</label></td>
                <td> <input type="radio" id="male" name="gender" value="M">
                    <label for="male">Male</label>

                    <input type="radio" id="female" name="gender" value="F">
                    <label for="female">Female</label>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email : </label></td>
                <td><input type="text" id="email" name="email" required /></td>
            </tr>
        </table>
        <table>
            <tr>
                <td><label for="doctor_id">Doctor : </label></td>
                <td>
                    <select name="doctor_id" id="doctor_id" required>
                        <?php
                        $i = 0;
                        while ($rows = mysqli_fetch_assoc($doctor_res)) {
                            $i++;
                        ?>

                            <option value="<?php echo $rows['doctor_id'] ?>"><?php echo "Dr. " . $rows['doctor_name'] ?></option>

                        <?php } ?>
                    </select>
                </td>

            </tr>
            <tr>
                <td><label for="appointment_date">Appointment date : </label></td>
                <td><input type="date" id="appointment_date" name="appointment_date" required /></td>

            </tr>
            <tr>
                <td><label for="appointment_fee">Appointment fee : </label></td>
                <td><input type="number" id="appointment_fee" name="appointment_fee" required /></td>
            </tr>
            <tr>
                <td><label for="is_paid">Paid</label></td>
                <td><input type="hidden" id="is_paid" name="is_paid" value="0" />
                    <input type="checkbox" id="is_paid" name="is_paid" value="1" />
                </td>

            </tr>
        </table>
        <br></br>
        <input type="submit" value="submit">
    </form>
    <h1>Upcoming Appointments</h1>
    <?php if (mysqli_num_rows($res)) { ?>
        <div id="viewTable">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Appointment id</th>
                        <th scope="col">Patient name</th>
                        <th scope="col">Mobile number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Doctor name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Paid/Not Paid</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $rows['appointment_id'] ?></td>
                            <td><?php echo $rows['patient_name'] ?></td>
                            <td><?php echo $rows['mobile_number'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td><?php echo $rows['doctor_name'] ?></td>
                            <td><?php echo $rows['appointment_date'] ?></td>
                            <td><?php echo $rows['is_paid'] == 1 ? 'Paid' : 'Not paid'; ?></td>
                            <td><a href="./edit-appointment.php?id=<?= $rows['appointment_id'] ?>">Update</a>

                                <a href="../api/appointment/delete-appointment.php?id=<?= $rows['appointment_id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php } ?>
</body>

</html>