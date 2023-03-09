<?php
require_once 'provider.php';

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css?v=2.0">>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
    <form class="new-cheb">
        <label for="newN"></label>
        <input type="text" id="newN" placeholder="Новое имя чебурека">
        <label for="newP"></label>
        <input type="number" id="newP" placeholder="Новая цена">
        <label for="newID"></label>
        <input type="number" id="newID" placeholder="Новый ID">
        <button type="submit" class="new-item-btn">Добавить новый чебурек</button>
    </form>
    <main class="box-item">
        <?php foreach ($menuBurgers as $key => $item): ?>
        <div class="item">
            <form class="item-form">
                <div class="item-info">
                    <h1 class="item-name"><?= $item['name']?></h1>
                    <h2 class="item-price"><?= $item['price']?></h2>
                    <span class="item-id"><?= $item['id']?></span>
                    <button type="submit" class="item-button">Delete</button>
                </div>
            </form>
            <button type="submit" class="item-edit" id="<?= $item['id']?>">Edit</button>
        </div>
        <?php endforeach; ?>
        <form class="modal">
            <label for="input1">Название</label>
            <input id="input1" type="text">
            <label for="input2">Цена</label>
            <input id="input2" type="number">
            <button type="submit" id="btn-form">Edit</button>
        </form>
    </main>
</div>
</body>
<script src="main.js?v=2.0"></script>




