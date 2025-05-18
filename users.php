<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Тестовое задание: cities</title>
        <style>
            td{
                border: solid 1px silver;
            }
        </style>
    </head>
<body>

<table align='center'>
        <thead>
                <tr>
                        <th>ID</th>
                        <th>Полное имя пользователя</th>
                        <th>Название страны</th>
                        <th>Название города</th>
        </thead>
        <tbody>
    

<?php

include 'db.php';

$db = new Database();


$sql = "USE bolgovaDB";
    $db->execute($sql);

$db->print_users();

?>

</body>
</html>