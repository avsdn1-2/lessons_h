<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=student', 'root', '');

    //запросы на добавление, измененение, удаление
    //добавление 3-х новых клиентов
    $preparedQuery = $dbh->prepare("INSERT INTO clients (age,name,is_active) VALUES (:age,:name,:is_active)");
    $preparedQuery->bindParam(':age',$age);
    $preparedQuery->bindParam(':name',$name);
    $preparedQuery->bindParam(':is_active',$is_active);
    $age = 20;
    $name = 'Marco Van Basten';
    $is_active = 1;
    $preparedQuery->execute();

    $age = 34;
    $name = 'Dan Mitchel';
    $is_active = 1;
    $preparedQuery->execute();

    $age = 37;
    $name = 'Kevin Costner';
    $is_active = 1;
    $preparedQuery->execute();

    //изменение возраста клиенту с id=2
    $preparedQuery = $dbh->prepare("UPDATE clients SET age=:age WHERE id=2");
    $preparedQuery->bindParam(':age',$age);
    $age = 45;
    $preparedQuery->execute();

    //изменение имени клиенту с id=1
    $preparedQuery = $dbh->prepare("UPDATE clients SET name=:name WHERE id=1");
    $preparedQuery->bindParam(':name',$name);
    $name = 'Donald Trump';
    $preparedQuery->execute();

    //деактивация клиента с id=3
    $preparedQuery = $dbh->prepare("UPDATE clients SET is_active=:is_active WHERE id=3");
    $preparedQuery->bindParam(':is_active',$is_active);
    $is_active = 0;
    $preparedQuery->execute();

    //удаление всех неактивных клиентов
    $preparedQuery = $dbh->prepare("DELETE FROM clients WHERE is_active=0");
    $preparedQuery->execute();

    //удаление новых созданных клиентов
    $preparedQuery = $dbh->prepare("DELETE FROM clients WHERE id>6");
    $preparedQuery->execute();

}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}




