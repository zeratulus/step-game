<?php
/**
 * Created by PhpStorm.
 * User: ailus
 * Date: 09.02.18
 * Time: 18:18

 *
 */

require_once 'helper.php';

$results = explode(',', '1997,Ford,E350,"ac, abs, moon",3000.00');
foreach ($results as $result) {
    echo $result . '<br>';
}


$route = explode('/', 'map/battle');
$path = $route[0];
$path2 = $route[1];

//var_dump($route);

echo $path;
echo '<br>';
echo $path2;
echo '<br>';
echo salt(10);