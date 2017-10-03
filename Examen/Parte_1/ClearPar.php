<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 4/19/17
 * Time: 11:23 AM
 */
class ClearPar
{
    public function __construct()
    {
    }
    public function build($parentesis){
        $parentesis_limpios = '';
        for($index = 0; $index < strlen($parentesis); $index++)
        {
            if($parentesis[$index].$parentesis[$index+1] == '()'){
                $parentesis_limpios.= $parentesis[$index].$parentesis[$index+1];
            }
        }
        return $parentesis_limpios;
    }
}