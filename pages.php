<?php
session_start();

if (!$_SESSION['isLoggedIn']) {
    header('location: ./login.php');
    die();
}
?>
<h1>Sider</h1>

<table>
    <thead>
            <tr>
                <th>title</th>
                <th colspan="2">Oprettet</th>

            </tr>
    </thead>
    <tbody>
<?php
$conn = mysqli_connect('localhost', 'root', '', 'phpintro');
$result = mysqli_query($conn, "SELECT id, title, content, createdAt, updatedAt, isHome FROM pages ORDER BY createdAT DESC");

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['createdAT'] . "</td>";
    echo "<td><a href='editPage.php?id=". $row['id'] ."'>Rediger</a></td>";
    echo "</tr>";
}

mysqli_free_result($result);
mysqli_close($conn);

?>
    </tbody>
</table>