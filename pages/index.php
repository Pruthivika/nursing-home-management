<!DOCTYPE html>

<html>

<head>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 90vh;
            justify-content: center;
        }
    </style>

    <title>LOGIN</title>

</head>

<body style="background-image: url('../img/login-bg.png'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">

    <form autocomplete="off" action="../api/auth/login.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p style="color: white; background-color: red;"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <table style="margin-bottom: 30px;">
            <tr style="margin-bottom: 50px;">
                <td>
                    <label>User Name</label>
                </td>
                <td> <input type="text" name="uname" placeholder="User Name"><br></td>
            </tr>
            <tr>
                <td> <label>Password</label></td>
                <td>
                    <input type="password" name="password" placeholder="Password"><br>
                </td>
            </tr>
        </table>







        <button type="submit">Login</button>

    </form>

</body>

</html>