<?php

function highlight_nicknames(string $text) 
{
    $array = preg_split("/[\s]+/", $text); //разбить строку по словам и перевести в массив

    for ($i = 0; $i < count($array); $i++ ) // цикл проверки каждого отдельного слова
    {
        $str = $array[$i]; // перенос слова в строку

        if (mb_substr($str, 0, 1) == '@' && preg_match('/[a-zA-Z]/',mb_substr($str, 1, 1)) && preg_match('/^[@A-Za-z0-9]+$/', $str)) // проверка на символы
        {
            $str1 = "<b>$str</b>";  // если проверка прошла, добавляет тег <b> к нику
            $replacements = array($i => $str1); // берём индекс массива и новую строку с тегом <b>
            $array = array_replace($array, $replacements); // подменяет элемент массива на новый с тегом <b>
        }
        else{}
    }
    echo implode(" ", $array); // переводим массив в строку и выводим
}