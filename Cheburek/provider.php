<?php

$pdo = require_once 'db.php';



$statement = $pdo->query('SELECT * FROM chebureki');

$menuBurgers = $statement->fetchAll();


if (isset($_POST['action_del'])) {
    $statement = $pdo->prepare('DELETE FROM chebureki WHERE id = :id');
    $statement->execute([
        'id' => $_POST['action_del']
    ]);
}

if (isset($_POST['action_edit'])) {
    $statement = $pdo->prepare('UPDATE chebureki SET name = :name, price = :price WHERE id = :id');
    $statement->execute([
        'id' => $_POST['action_edit'],
        'name' => strip_tags($_POST['newName']),
        'price' => strip_tags($_POST['newPrice'])
    ]);
}

if (isset($_POST['action_new'])) {
    $statement = $pdo->prepare(' INSERT INTO chebureki (id, name, price) VALUES (:id, :name, :price)');
    $statement->execute([
        'id' => $_POST['action_new'],
        'name' => strip_tags($_POST['newName']),
        'price' => strip_tags($_POST['newPrice'])
    ]);
}


