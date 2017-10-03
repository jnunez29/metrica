<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 4/19/17
 * Time: 10:06 AM
 */
class ChangeString
{
    public function __construct()
    {
        header('Content-Type: text/html; charset=iso-8859-1');
    }
    public function build($string){
        $cadena = utf8_decode($string);
        for($index = 0; $index < strlen($cadena); $index++)
        {
            if(ctype_alpha($cadena[$index]))
            {
                if($cadena[$index] == 'Z'){
                    $cadena[$index] = 'A';
                }elseif($cadena[$index] == 'z'){
                    $cadena[$index] = 'a';
                }elseif($cadena[$index] == 'n'){
                    $cadena[$index] = chr(241);;
                }elseif($cadena[$index] == 'N'){
                    $cadena[$index] = chr(209);
                }else{
                    $cadena[$index] = chr(ord($cadena[$index])+1);
                }

            }else{

                if(ord($cadena[$index]) == 241){
                    $cadena[$index] = 'o';
                }elseif(ord($cadena[$index]) == 209){
                    $cadena[$index] = 'O';
                }

            }

        }
        return $cadena;
    }

}