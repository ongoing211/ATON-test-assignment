<!DOCTYPE hmml>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <title>Тестовое задание</title>
        <style>
            td{
                border: solid 1px silver;
            }
        </style>
    </head>
<body>

<?php
$username = "root";
$passwordname = "";
$dsn = "mysql:host=localhost";


try {
    $pdo = new pdo($dsn, $username, $passwordname);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Подключение к MySQL прошло успешно!";
}
catch(PDOException $e) {
    echo "Подключение не произведено: " . $e->getMessage();
};


if ($sql = "CREATE DATABASE IF NOT EXISTS bolgovaDB") {
    $pdo->exec($sql);
    $sql = "USE bolgovaDB";
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS Countries (ID integer auto_increment primary key, COUNTRY varchar(30))";
    $pdo->exec($sql);

    $sql = "INSERT INTO Countries (ID, COUNTRY)
              VALUES
                (1, 'Германия'),
                (2, 'Австрия'),
                (3, 'Франция');";
    $pdo->exec($sql);
    
    $sql = "CREATE TABLE IF NOT EXISTS Cities (
                    ID integer auto_increment primary key, 
                    CITY varchar(30), 
                    COUNTRY_ID integer,
                    FOREIGN  KEY (COUNTRY_ID) REFERENCES Countries(ID))";
    $pdo->exec($sql);
    $sql = "INSERT INTO Cities (ID, CITY, COUNTRY_ID)
              VALUES
                (1, 'Штутгард', 1),
                (2, 'Кёльн', 1),
                (3, 'Грац', 2),
                (4, 'Анже', 3),
                (5, 'Пуатье', 3),
                (6, 'Ля-Рошель', 3),
                (7, 'Тулуза', 3),
                (8, 'Инсбрук', 2),
                (9, 'Гамбург', 1);";
    $pdo->exec($sql);

    $sql = "CREATE TABLE IF NOT EXISTS Users (
                ID integer auto_increment primary key, 
                FIRST_NAME varchar(30), 
                LAST_NAME varchar(30), 
                CITY_ID integer,
                FOREIGN KEY CITY_ID REFERENCES Cities(ID))";
    $pdo->exec($sql);
    $sql = "INSERT INTO Users (ID, FIRST_NAME, LAST_NAME, CITY_ID)
              VALUES
                (1, 'Cristian', 'Clovie', 6),
                (2, 'Yan', 'Sommer', 7),
                (3, 'Ivar', 'Meller', 1),
                (4, 'Ludvig', 'Perl', 7),
                (5, 'Gans', 'Rogge', 1),
                (6, 'Ulrih', 'Till', 2),
                (7, 'Stepan', 'Segal', 8),
                (8, 'Milosh', 'Pay', 5),
                (9, 'Matie', 'Rohau', 5),
                (10, 'Jan', 'Fogel', 4),
                (11, 'Phillip', 'Lips', 9),
                (12, 'Sebastian', 'Sommer', 7),
                (13, 'Karl', 'Merc', 8),
                (14, 'Gans', 'Horn', 3);";
    $pdo->exec($sql);
}
?>


</body>
</html>