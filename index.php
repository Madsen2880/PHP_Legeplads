<?php

/*$conn = mysqli_connect('localhost', 'root', '', 'phpintro');

$result = mysqli_query("SELECT * FROM pages WHERE isHome = 1")

$row = mysqli_fetch_array($result, MYSQLI_ASSOC);*/




/*if ($_GET):
    $page = $_GET['page'] . '.php';

    else:
        $page = 'index.php';
    endif;

require './pages/head.php';
require './pages/primaryMenu.php';



    if (file_exists("pages/$page")):
        require "pages/$page";
    else:
       require 'pages/404.php';
    endif;

    require './pages/footer.php';*/

if ($_GET) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

$conn = mysqli_connect('localhost', 'root', '', 'phpintro');

if ($page === 'home') {
    $result = mysqli_query($conn, "SELECT id, title, content FROM pages WHERE isHome = 1");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['content'];
    mysqli_free_result($result);
} else {
    $stmt = mysqli_prepare($conn, "SELECT id, title, content FROM pages WHERE title = ?");
    mysqli_stmt_bind_param($stmt, 's', $page);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $title, $content);
}









