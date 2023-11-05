<?php include "../api/patient/view-patient.php"; ?>
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
    <title>Patients</title>
</head>

<body style="background-image: url('../img/main-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">


    <h1>Patient List</h1> <a href="./home.php">back</a>
    <?php if (mysqli_num_rows($res)) { ?>
        <div id="viewTable" style="width: 95%;">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Patient Id</th>
                        <th scope="col">Patient name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile number</th>
                        <th scope="col">DOB</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Email</th>
                        <th scope="col">Report path</th>
                        <th scope="col">Report type</th>
                        <th scope="col">Doctor name</th>
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
                            <td><?php echo $rows['patient_id'] ?></td>
                            <td><?php echo $rows['patient_name'] ?></td>
                            <td><?php echo $rows['patient_address'] ?></td>
                            <td><?php echo $rows['mobile_number'] ?></td>
                            <td><?php echo $rows['dob'] ?></td>
                            <td><?php echo $rows['gender'] ?></td>
                            <td><?php echo $rows['email'] ?></td>
                            <td><?php echo $rows['file_path'] ?></td>
                            <td><?php echo $rows['report_type'] ?></td>
                            <td><?php echo $rows['doctor_name'] ?></td>

                            <td><a href="./edit-patient.php?id=<?= $rows['patient_id'] ?>">Update</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    <?php } ?>
</body>

</html>