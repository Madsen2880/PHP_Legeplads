<?php
session_start();

if (isset($_SESSION['isLoggedIn'])) {
    session_destroy();
}

if ($_POST) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $conn = mysqli_connect('localhost', 'root', '', 'phpintro');
        $stmt = mysqli_prepare($conn, "SELECT id, password, FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, 's', $_POST['username']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $password);

        while (mysqli_stmt_fetch($stmt)) {
            if (password_verify($_POST['password'], $password)) {
                $_SESSION['user'] = $id;
                $_SESSION['isLoggedIn'] = true;
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                header('Location: users.php');
            } else {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                $errorMSg = "Du har indtastet forkert adgangskode.";
                }
            }
        }
    else {
            $errorMSg = "Du mangler at udfylde brugernavn eller adgangskode";
        }
    }



?>
<h1>Log Ind</h1>
<form action="login.php" method="post">
    <input type="text" name="username" placeholder="Brugernavn">
    <input type="password" name="password" placeholder="Adgangskode">
    <button type="submit">Log ind</button>
    <p style="color:red"><?=@$errorMsg;?></p>

</form>


