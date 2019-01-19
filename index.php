<?php
/**
 * Я остановился на том что нужно спрятать слово $_SESSION['secret'] в ______ в подчеркивания 
 * и вывести его на страницу игры.
 * Написать обработку ввода данных.
 * Если совпадает ввод пользователя с загаданной буквой , открывать буквы в слове.
 * Кондиции победы или поражения
 */
session_start();
include 'func.php';

// вытаскиваем алфавит
$russianAlphabet = array();
foreach (range(chr(0xC0), chr(0xDF)) as $a) {
    $russianAlphabet[] = iconv('CP1251', 'UTF-8', $a);
}  

// Количество возможных ошибок
$mistake = 5;
$_SESSION['mistake'] = 0;
// Массив слов из базы данных
if(empty($_SESSION['secret'])){
    $secretWord = getWords();
    $_SESSION['secret'] = $secretWord;
}

echo $_SESSION['secret'];
echo strlen($_SESSION['secret']);
echo strlen(utf8_decode($_SESSION['secret']));

// Перезапуск игры
if(isset($_GET['reset'])){
    session_destroy();
    header('Location: /hangman');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>

    </style>
</head>
<body>

<div class='row'>
    <div class="col-6">
        <h2>Угадай слово</h2>
        
        <h3>Правила игры:</h3>
        <ul>
        <li>Вам необходимо угать загаданное слово.</li>
        <li>У вас есть право на 3 ошибки.</li>
        <li>Вы можете ввести новые слова в общую базу.</li>
        <li>Минимальная длинна слова 5 букв</li>
        <li>Слово, которое необходимо угадать выводится случайным образом из базы данных.</li>
        </ul>
    </div>
    <div class="col-6">
        
        
        <h3>Добавить слова</h3>
        <p>Если вы хотите добавить новые слова в базу данных. Это можно сделать нажав на кнопку:</p>
        <a href="addwords.php" class="btn btn-success">Нажми меня</a>
    </div>


</div>
    <div class="row"> 
        <div class='col-10'>
            <h4>Количество раз которые вы можете ошибится: <?php echo ($mistake - $_SESSION['mistake']); ?> </h4>
            
                <form method="POST">
                    <div class="form-group col-3">
                               <?php 
                                foreach($russianAlphabet as $id => $value){ ?>
                                    <a href="?letter=<?php echo $id; ?>" class="btn btn-outline-success"> <?php echo $value; ?> </a>
                                <?php } ?>
                    </div>  
                </form>
                    <?php
                        if(isset($_GET['letter'])){
                            $_SESSION['used'][] = $russianAlphabet[$_GET['letter']];
                            echo "Вы считаете что это буква: " . $russianAlphabet[$_GET['letter']] . "<br>";
                    ?>
                    <p>Вы использовали буквы: </p>
                    <?php
                            foreach($_SESSION['used'] as $key => $value){
                                // $str = $str . " " . $value;
                                echo $value . " ";
                            }
                            // print_r($_SESSION['used']);
                            // echo $str;
                        }
                    ?>
                    <div>
                        <a href="?reset" class="btn btn-success">Перезапустить</a>
                    </div>
        </div>
    </div>







</body>
</html>


<?php 

// // these both must be stored (see php session)
// $letters_guessed_correct = array('g', 's', 'a');
// $word = "giants"; // the current word which is searched for

// foreach(str_split($word) as $char) {
//     if (in_array($char, $letters_guessed_correct, true)) {
//         echo $char;
//     } else {
//         echo '_';
//     }
// } 