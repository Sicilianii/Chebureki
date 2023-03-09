<?php

$pdo = new PDO('sqlite:database.db', null, null, [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

$pdo->exec('CREATE TABLE chebureki (
    id INTEGER PRIMARY KEY NOT NULL,
    name VARCHAR(100) NOT NULL,
    price INTEGER NOT NULL
)');

$pdo->query('INSERT INTO chebureki (id, name, price) VALUES (null, "cheburek1", 120)');
$pdo->query('INSERT INTO chebureki (id, name, price) VALUES (null, "cheburek2", 140)');
$pdo->query('INSERT INTO chebureki (id, name, price) VALUES (null, "cheburek3", 150)');
$pdo->query('INSERT INTO chebureki (id, name, price) VALUES (null, "cheburek4", 130)');
$pdo->query('INSERT INTO chebureki (id, name, price) VALUES (null, "cheburek5", 110)');
$pdo->query('INSERT INTO chebureki (id, name, price) VALUES (null, "cheburek6", 170)');
$pdo->query('INSERT INTO chebureki (id, name, price) VALUES (null, "cheburek7", 200)');