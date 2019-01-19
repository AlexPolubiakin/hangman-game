<?php 

$russianAlphabet = array();
foreach (range(chr(0xC0), chr(0xDF)) as $a) {
    $russianAlphabet[] = iconv('CP1251', 'UTF-8', $a);
}  


$hidden = 'тест';
echo strlen(utf8_decode($hidden));
echo $hidden;

$hidden = str_replace($russianAlphabet,'_',$hidden);
echo strlen(utf8_decode($hidden));
echo $hidden;


    // for($i = 0; $i < strlen(utf8_decode($hidden)); $i++) {
    //     if($hidden[$i] != '_'){
    //         $hidden = str_replace($hidden[$i],'_',$hidden);
    //     }
    // }
 
