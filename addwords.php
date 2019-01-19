
<?php 
include 'func.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="col-6">
        <?php
        if(isset($_POST['wordSubmit'])){
            $newWord = $_POST['name'];
            // $newWord = strtolower($newWord);
            $newWord = mb_convert_case($newWord, MB_CASE_LOWER, "UTF-8"); 
            $newWord = strip_tags($newWord);
            echo $newWord;
            if(mb_strlen($newWord) >= 5){
                if(addWord($newWord)){
                    echo '<div class="col-md-2 alert alert-success" role="alert">Слово добавлено!</div>';
                }
            } else {
                echo '<div class="col-md-2 alert alert-danger" role="alert">Введите слово из 5 букв</div>';
            }
        } ?>
        <h4>Добавить слово в базу данных:</h4>
        <a href="/hangman" class="btn btn-success">Обратно к игре</a>
        <ul>
            <li>Слово должно быть на русском языке</li>
            <li>Максимальная длинна слова 20 букв</li>
            <li>Минимальная длинна слова 5 букв</li>
        </ul>
            <div class="col-4">
                <form method="POST">
                    <div class="form-group">
                        <label>Введите слово</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="row">
                        <input type="submit" class="btn btn-success" name="wordSubmit"> 
                    </div>
                </form>
                
            </div>
    </div>
</body>
</html>
