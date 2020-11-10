<?php

class CardValidator
{
    public static function check($array)
    {
        //подсчитываем контрольную сумму
        $sum = 0;
        for ($i = 1;$i < count($array);$i++)
        {
            if ($i % 2 == 1)
            {
                $double = $array[$i] * 2;
                if ($double > 9) $double -= 9;
                $sum += $double;
            }
            else
            {
                $sum += $array[$i];
            }
        }
        //прибавляем последнюю цифру
        $sum += $array[count($array)];
        echo 'Control Sum = '.$sum.'<br>';
        
        if ($sum % 10 == 0) //карта валидная
        {
            return true;
        }
        else //карта невалидная
        {
            return false;
        }
    }
}