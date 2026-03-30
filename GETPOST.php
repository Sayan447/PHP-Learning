





<?php
// Handle GET data
$getOutput = '';
if (isset($_GET['name_get'])) {
    $getOutput = "GET says: Hello " . $_GET['name_get'];
}

// Handle POST data
$postOutput = '';
if (isset($_POST['name_post'])) {
    $postOutput = "POST says: Hello " . $_POST['name_post'];
}
?>
























<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>GET Method Form</h2>
<form method="get" action="">
    Name: <input type="text" name="name_get">
    <input type="submit" value="Submit GET">
</form>
<p style="color:blue;"><?php echo $getOutput; ?></p>

<hr>

<h2>POST Method Form</h2>
<form method="post" action="">
    Name: <input type="text" name="name_post">
    <input type="submit" value="Submit POST">
</form>
<p style="color:green;"><?php echo $postOutput; ?></p>


    
</body>
</html>


