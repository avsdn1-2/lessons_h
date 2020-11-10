
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

    //валидируем данные формы, бросаем и ловим исключение
    try {
        CardValidator::check($arr);
    }catch (InvalidCardNumberException $e){
        echo $e->getMessage();
        die;
    }
    echo '<br>'.'Card number is good!';

}
