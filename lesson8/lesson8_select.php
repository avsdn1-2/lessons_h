<?php

try {
    $dbh = new PDO('mysql:host=localhost;dbname=student', 'root', '');
    //запрос на SELECT
    $data = $dbh->query('SELECT * FROM clients');
    echo 'Список всех клиентов'.'<br>';
    echo 'SELECT * FROM clients'.'<br>';
    while ($row = $data->fetch(PDO::FETCH_ASSOC))
    {
        var_dump($row);
    }
    $data = $dbh->query('SELECT * FROM clients WHERE is_active=1');
    echo 'Список клиентов которые активны (поле is_active)'.'<br>';
    echo 'SELECT * FROM clients WHERE is_active=1'.'<br>';
    while ($row = $data->fetch(PDO::FETCH_ASSOC))
    {
        var_dump($row);
    }
    $data = $dbh->query('SELECT * FROM clients WHERE age>=30');
    echo 'Список клиентов возраст которых больше или равно 30'.'<br>';
    echo 'SELECT * FROM clients WHERE age>=30'.'<br>';
    while ($row = $data->fetch(PDO::FETCH_ASSOC))
    {
        var_dump($row);
    }

    $data = $dbh->query("SELECT * FROM clients WHERE name LIKE 'J%'");
    echo 'Список клиентов имя которых начинается на J'.'<br>';
    echo 'SELECT * FROM clients WHERE name LIKE \'J%\''.'<br>';
    while ($row = $data->fetch(PDO::FETCH_ASSOC))
    {
        var_dump($row);
    }

    $data = $dbh->query("SELECT count(*) FROM clients");
    echo 'Сколько клиентов у вас в базе всего'.'<br>';
    echo 'SELECT count(*) FROM clients'.'<br>';
    $row = $data->fetch(PDO::FETCH_ASSOC);
    var_dump($row);

    $data = $dbh->query("SELECT * FROM clients ORDER BY age DESC LIMIT 1");
    echo 'Самого старого (по возрасту клиента)'.'<br>';
    echo 'SELECT * FROM clients ORDER BY age DESC LIMIT 1'.'<br>';
    $row = $data->fetch(PDO::FETCH_ASSOC);
    var_dump($row);

    $data = $dbh->query("SELECT count(*) FROM clients WHERE is_active=1");
    echo 'Сколько у вас активных клиентов'.'<br>';
    echo 'SELECT count(*) FROM clients  WHERE is_active=1'.'<br>';
    $row = $data->fetch(PDO::FETCH_ASSOC);
    var_dump($row);

    $data = $dbh->query("SELECT * FROM clients ORDER BY age DESC");
    echo 'Получить и отсортировать всех клиентов по возрасту'.'<br>';
    echo 'SELECT * FROM clients ORDER BY age DESC'.'<br>';
    while ($row = $data->fetch(PDO::FETCH_ASSOC))
    {
        var_dump($row);
    }

    $data = $dbh->query("SELECT * FROM clients ORDER BY name");
    echo 'Получить и отсортировать всех клиентов по имени'.'<br>';
    echo 'SELECT * FROM clients ORDER BY name'.'<br>';
    while ($row = $data->fetch(PDO::FETCH_ASSOC))
    {
        var_dump($row);
    }

    $data = $dbh->query("SELECT count(*) FROM clients WHERE is_active=1 AND age>25");
    echo 'Посчитать сколько у вас активных клиентов старше 25'.'<br>';
    echo 'SELECT count(*) FROM clients  WHERE is_active=1 AND age>25'.'<br>';
    $row = $data->fetch(PDO::FETCH_ASSOC);
    var_dump($row);

}
catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}








