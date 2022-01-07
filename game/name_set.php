<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=DotGothic16&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="big-name">
        <div class="name-top">
            <h1 class="name-title">名前を入力して下さい。</h1>
            <form action="game.php" method="post">
                <input class="name_set" type="text" name="name" maxlength='12'><br>
                <input type="hidden" name="hp">
                <input class="but" type="submit" value="対戦開始">
            </form>
        </div>
    </div>
</body>

</html>