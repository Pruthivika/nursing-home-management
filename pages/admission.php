<?php include "../api/admission/view-admission.php";
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
    <title>Hospital Admission</title>
</head>

<body style="background-image: url('../img/main-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    <h1>Add Admission</h1> <a href="./home.php">back</a>
    <form style="margin-top: 20px;" action="../api/admission/add-admission.php" method="POST">
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
                <td> <select name="doctor_id" id="doctor_id" required>
                        <?php
                        $i = 0;
                        while ($rows = mysqli_fetch_assoc($doctor_res)) {
                            $i++;
                        ?>

                            <option value="<?php echo $rows['doctor_id'] ?>"><?php echo "Dr. " . $rows['doctor_name'] ?></option>

                        <?php } ?>

                    </select></td>

            </tr>
            <tr>
                <td><label for="room_id">Room : </label></td>
                <td><select name="room_id" id="room_id" required>
                        <?php
                        $i = 0;
                        while ($rows = mysqli_fetch_assoc($room_res)) {
                            $i++;
                        ?>

                            <option value="<?php echo $rows['room_id'] ?>"><?php echo "Room " . $rows['room_id'] ?></option>

                        <?php } ?>

                    </select></td>

            </tr>
            <tr>
                <td><label for="admission_fee">Admission fee : </label></td>
                <td><input type="number" id="admission_fee" name="admission_fee" required /></td>
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
    <h1>Upcoming Admissions</h1>
    <?php if (mysqli_num_rows($res)) { ?>
        <div id="viewTable">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Admission id</th>
                        <th scope="col">Patient name</th>
                        <th scope="col">Mobile number</th>
                        <th scope="col">Email</th>
                        <th scope="col">Doctor name</th>
                        <th scope="col">Room number</th>
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
                            <td><?php echo $rows['admission_id'] ?></td>
                            <td><?php echo $rows['patient_name'] ?></td>
                            <td><?php echo $rows['mobile_number'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td><?php echo $rows['doctor_name'] ?></td>
                            <td><?php echo $rows['room_id'] ?></td>
                            <td><?php echo $rows['is_paid'] == 1 ? 'Paid' : 'Not paid'; ?></td>
                            <td><a href="./edit-admission.php?id=<?= $rows['admission_id'] ?>" class="btn btn-success">Update</a>

                                <a href="../api/admission/delete-admission.php?id=<?= $rows['admission_id'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php } ?>
</body>

</html>