<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 22.01.18
 * Time: 18:37
 */

function echoUnitParams ($unit)
{
    echo 'ID: ' . $unit->id . '<br>';
    echo 'Name: ' . $unit->name . '<br>';
    echo 'Health Points: ' . $unit->hp . '<br>'; //Healt Points
    echo 'Armor Points: ' . $unit->ap . '<br>'; //Armor Points
    echo 'Mana Points: ' . $unit->mp . '<br>'; //Mana Points
    echo 'Armor Type: ' . $unit->armor_type . '<br>';
    echo 'Speed: ' . $unit->speed . '<br><br>';
}

function showUnitParams ($unit)
{
    return 'ID: ' . $unit->id . '<br>'
    . 'Name: ' . $unit->name . '<br>'
    . 'Health Points: ' . $unit->hp . '<br>' //Healt Points
    . 'Armor Points: ' . $unit->ap . '<br>' //Armor Points
    . 'Mana Points: ' . $unit->mp . '<br>' //Mana Points
    . 'Armor Type: ' . $unit->armor_type . '<br>'
    . 'Speed: ' . $unit->speed . '<br><br>';
}

function salt($length = 32) {
    $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'h', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
    $salt = '';
    for ($i = 0; $i < $length; $i++) {

        if (mt_rand(0, 1)) {
            $salt .= strtoupper($alphabet[mt_rand(0, count($alphabet) - 1)]);
        } else {
            $salt .= $alphabet[mt_rand(0, count($alphabet) - 1)];
        }

    }
    return $salt;
}
function capitalizeString($str) {
    if (strlen($str) > 0) {
        $first_letter = strtoupper($str[0]);
        $other_letters = substr($str, 1, strlen($str));
        return $first_letter . $other_letters;
    } else {
        return $str;
    }
}
function checkDebug(\GameSystem\Request $request) {
    //php storm local web server routine
    if (isset($request->get['_ijt'])) {
        return $request->get['_ijt'];
    } else {
        return false;
    }
}