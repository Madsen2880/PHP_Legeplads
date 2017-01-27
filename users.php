<?php
session_start();

if (!$_SESSION['isLoggedIn']) {
    header('location: ./login.php');
    die();
}
?>
<h1>Brugere</h1>

<table>
    <thead>
            <tr>
                <th>Bryger</th>
                <th colspan="2">Email</th>

            </tr>
    </thead>
    <tbody>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'phpintro');
$result = mysqli_query($conn, "SELECT id, username, email FROM users ORDER BY username ASC");

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td><button>slet</button></td>";
    echo "</tr>";
}

mysqli_free_result($result);
mysqli_close($conn);

?>
    </tbody>
</table>