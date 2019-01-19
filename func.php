<?php
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

function addWord($word){
    global $link;
    $flag = false;
    $sql = "INSERT INTO words VALUES(NULL,?,NULL)";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_bind_param($stmt, 's', $word);
    $flag = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $flag;
}

function getWords(){
    global $link;
    $sql = "SELECT word FROM words";
    $result = mysqli_query($link,$sql);
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($link);
    $resultData = [];
    // Обрабатываем данные
    foreach ($data as $key)
        $resultData[] = $key['word'];
    $num= array_rand($resultData, 1);
    $secretWord = $resultData[$num];
    return $secretWord;
}
// частично
function hideSome($word){
    $num = floor((count($word)/2)+1);
    $count = 0;
    $hidden = $word;
    while($count < $numOfHidden){
        $rand_el = rand(0,sizeof($word)-2);
        if($hidden[$rand_el] != '_'){
            $hidden = str_replace($hidden[$rand_el],'_',$hidden,$replace_count);
            $count = $count + $replace_count;
        }
        return $hidden;
    }
}
// function hideAll($word){
//     $hidden = $word;
//     for ($i = 0 , $i < strlen(utf8_decode($word)),$i++){
//         if($hidden[i] != '_'){
//             $hidden = str_replace($hidden[i],'_');
//         }
//     }
    
//     }




function check($input,$hidden,$answer){
  
    
    return $hidden;
}