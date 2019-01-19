<?php

//connect to db
$dbserver 	= "localhost";
$dbuser 	= "root";
$dbpwd 		= "";
$db 		= "wordgame";

$link = mysqli_connect($dbserver, $dbuser, $dbpwd, $db);
if(mysqli_connect_errno() > 0){
echo mysqli_connect_error();
die;
}
mysqli_query($link,"SET NAMES UTF8");
//



// <!-- <input type="text" class="form-control" name="userAnswer" maxlength="1" placeholder="введите 1 букву">
// <input type="submit" class="btn btn-success"> -->
// if(isset($_POST['userAnswer'])){
//     // то что постит человек в форму
//     echo $_POST['userAnswer'];
// }