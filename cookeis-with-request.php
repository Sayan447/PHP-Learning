 
<form action="" method='post'>
    <input type="text" name = "user" placeholder='enter the name'>
    <br>
    <br>
    <button name='button'  value='set'>Set Cookies</button>
    <br>
    <br>
    <button name='button'  value='display'>Display Cookies</button>
    <br>
    <br>
    <button name='button'  value='delete'>Delete Cookies</button>
</form>


<?php
if(isset($_POST['button'])){
    if($_POST['button'] == 'set'){
        $val = $_POST['user'];
        setcookie('user', $val);
        echo "cookie is set";
    }
}