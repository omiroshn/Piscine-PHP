#!/usr/bin/php
<?php

function ft_compare($str1, $str2) {
    $string = "abcdefghijklmnoprstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
    $i = 0;
    $sorted1 = strtolower($str1);
    $sorted2 = strtolower($str2);
    while ($sorted1[$i] && $sorted2[$i]) {
        $pos1 = strpos($string, $sorted1[$i]);
        $pos2 = strpos($string, $sorted2[$i]);
        if ($pos1 < $pos2) {
            return (-1);
        } else if ($pos1 > $pos2) {
            return (1);
        }
        $i++;
    }
    if ($sorted1[$i])
        return (1);
    if ($sorted2[$i])
        return (-1);
    return (0);
}
if ($argc > 1) {
    $array = array();
    for ($i = 1; $i < $argc; $i++)
        $array = array_merge($array, explode(' ', preg_replace('/\s\s+/', ' ', trim($argv[$i]))));
    foreach ($array as $item) {
        if (ctype_digit($item[0])) {
            $numbers[] = $item;
        } else if (ctype_alpha($item[0])) {
            $strings[] = $item;
        } else if (ctype_punct($item[0])) {
            $specials[] = $item;
        }
    }
    if ($numbers)
        uasort($numbers, 'ft_compare');
    if ($strings)
        uasort($strings, 'ft_compare');
    if ($specials)
        uasort($specials, 'ft_compare');
    if ($strings)
        foreach ($strings as $item)
            echo $item."\n";
    if ($numbers)
        foreach ($numbers as $item)
            echo $item."\n";
    if ($specials)
        foreach ($specials as $item)
            echo $item."\n";
}
?>