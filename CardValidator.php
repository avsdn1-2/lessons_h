<?php

class InvalidCardNumberException extends Exception
{
    public function __construct()
    {
        $message = '<br>'.'ERROR! Invalid card number';
        parent::__construct($message);
    }
}

class CardValidator
{
    public static function check($array)
    {
        $sum = 0;
        for ($i = 1;$i < count($array);$i++) {
            if ($i % 2 == 1) {
                $double = $array[$i] * 2;
                if ($double > 9) $double -= 9;
                $sum += $double;
            } else {
                $sum += $array[$i];
            }
        }
        $sum += $array[count($array)]; //прибавляем последнюю цифру
        echo 'Control Summ = '.$sum.'<br>';
        
        if ($sum % 10 !== 0) throw new InvalidCardNumberException();
    }
}