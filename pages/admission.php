<?php include "../api/admission/view-admission.php"; ?>
<html>

<head>
    <title>Add Record Admission</title>
</head>

<body>
    <form action="../api/admission/add-admission.php" method="POST">
        <table>
            <tr>
                <td>
                    <h1>Add patient Record</h1>
                </td>
            </tr>

            <tr>
                <td><label for="patient_name">patient_name </label></td>
                <td><input type="text" id="patient_name" name="patient_name" /></td>
            </tr>
            <tr>
                <td><label for="patient_address">patient_address </label></td>
                <td><input type="text" id="patient_address" name="patient_address" /></td>
            </tr>
            <tr>
                <td><label for="mobile_number">mobile_number </label></td>
                <td><input type="number" id="mobile_number" name="mobile_number" /></td>
            </tr>
            <tr>
                <td><label for="dob">dob </label></td>
                <td><input type="date" id="dob" name="dob" /></td>
            </tr>
            <tr>
                <td><label for="gender">gender</label></td>
                <td><input type="text" id="gender" name="gender" /></td>
            </tr>
            <tr>
                <td><label for="email">email</label></td>
                <td><input type="text" id="email" name="email" /></td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <h1>Add admission Record</h1>
                </td>
            </tr>
            <tr>
                <td><label for="doctor_id">Doctor: </label></td>
                <td> <select name="doctor_id" id="doctor_id">
                        <option value="1">Dr. John Dorian</option>
                        <option value="2">Dr. Mayurathan</option>
                        <option value="3">Dr. Elliot Reid</option>
                        <option value="4">Dr. Christopher Turk</option>
                        <option value="5">Dr. Molly Clock </option>
                        <option value="6">Dr. John Wen</option>

                    </select></td>

            </tr>
            <tr>
                <td><label for="room_id">room_id: </label></td>
                <td><select name="room_id" id="room_id">
                        <option value="1">Volvo</option>
                        <option value="2">Saab</option>
                        <option value="3">Mercedes</option>
                        <option value="4">Audi</option>
                        <option value="5">Volvo</option>
                        <option value="6">Saab</option>
                        <option value="7">Mercedes</option>
                        <option value="8">Audi</option>
                        <option value="9">Volvo</option>
                        <option value="10">Saab</option>

                    </select></td>

            </tr>
            <tr>
                <td><label for="admission_fee">admission_fee: </label></td>
                <td><input type="number" id="admission_fee" name="admission_fee" /></td>
            </tr>
            <tr>
                <td><input type="checkbox" id="is_paid" name="is_paid" value="1" /></td>
                <td><label for="is_paid">is_paid </label></td>
            </tr>
        </table>
        <br></br>
        <input type="submit" value="submit">
    </form>

    <?php if (mysqli_num_rows($res)) { ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">admission id</th>
                    <th scope="col">patient name</th>
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
                        <th scope="row"><?= $i ?></th>
                        <td><?= $rows['admission_id'] ?></td>
                        <td><?php echo $rows['patient_name']; ?></td>
                        <td><a href="../api/admission/update-admission.php?$rows['admission_id'] ?>" class="btn btn-success">Update</a>

                            <a href="../api/admission/delete-admission.php?id=<?= $rows['admission_id'] ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>
</body>

</html>