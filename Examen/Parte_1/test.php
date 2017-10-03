<?php
header('Content-Type: text/html; charset=iso-8859-1');
require('ChangeString.php');
require('CompleteRange.php');
require('ClearPar.php');
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 10/02/17
 * Time: 10:05 PM
 */
//PROBLEMA 1
$change_string = new ChangeString();
echo 'Problema 1 <br/>';
echo $change_string->build("aañnNzZ 12212ddd");
//
////PROBLEMA 2
$complete_range = new CompleteRange();
echo '<br/>Problema 2 <br/>';
echo '<pre>';
print_r($complete_range->build(array(1,4,6,10)));
echo '</pre>';
//
////PROBLEMA 3
echo '<br/>Problema 3 <br/>';
$clear_par = new ClearPar();
echo $clear_par->build('(((()()()(()(()))');





