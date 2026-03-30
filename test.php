
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Enter Your Name</h2>
    <form method="get" action="test.php">
    Name: <input type="text" name="name"><br>
    Age: <input type="text" name="age"><br>
    <input type="submit" value="Submit">
</form>

    
</body>
</html>


<br>


<!-- fir GET method -->
<?php
// echo 'your name is ', $_GET['name'];
// Check if 'name' and 'age' exists in the URL
// if (isset($_GET['name']) && isset($_GET['age'])) {
//     echo "Hello " . $_GET['name'].' and age is ' . $_GET['age'];
// } else {
//     echo "No name entered";
// }











// for POST Method
if (isset($_POST['name']) && isset($_POST['age'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    echo "Hello " . $name . " and your age is " . $age;
} else {
    echo "No data submitted";
}

// print_r($_POST);
?>