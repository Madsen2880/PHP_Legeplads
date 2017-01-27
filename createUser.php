<?php
if ($_POST) {
    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email    = $_POST['email'];

        $options = array('cost' => 9);

        $hash = password_hash($password, PASSWORD_BCRYPT,
            $options);


        $conn = mysqli_connect('localhost', 'root', '',
            'phpintro');

        if ($stmt = mysqli_prepare($conn, "INSERT INTO users (username, password, email) VALUES (?, '$hash', ?)")) {
            mysqli_stmt_bind_param($stmt, 'ss', $username, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            header('location: ./users.php');
        } else {
            mysqli_close($conn);
            $erroMsg = "Brugeren Kunne ikke oprettes.";

        }
    } else {
        $errorMsg = "Du mangler at udfylde et eller flere felter.";
    }
}




?>

<h1>Opret Bruger</h1>

<form action="createUser.php" method="post">
    <input type="text" name="username" placeholder="Brugernavn">
    <input type="password" name="password" placeholder="Adgangskode">
    <input type="email" name="email" placeholder="Email">
    <button type="submit">Opret Bruger</button>
    <p style="color:red"><?=@$errorMsg;?></p>
</form>

