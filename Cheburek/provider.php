<?php
$pdo = require_once 'db.php';

$pdo->exec('CREATE TABLE chebureki (
    id INTEGER PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    price INTEGER NOT NULL
)');


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

