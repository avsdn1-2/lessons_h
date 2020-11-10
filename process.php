
<?php
//обработчик формы

//подключаем класс-валидатор
include 'CardValidator.php';

if (isset($_POST['submit']))
{
    $data = (string)$_POST['card_number'];
    $data = str_replace(' ','',$data);
    //превращаем строку в массив, состоящий из цифр, составляющих номер карты
    $arr = [];
    for ($i = 0;$i < strlen($data);$i++)
    {
        $arr[$i+1] = (int)substr($data,$i,1);
    }
    echo 'card number = '.$data.'<br>';

    //валидируем номер карты
    if (CardValidator::check($arr) == true)
    {
        echo 'Card number is valid!';
    }
    else
    {
        echo 'Card number is invalid!';
    }


}
