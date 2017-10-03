<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 4/19/17
 * Time: 11:03 AM
 */

class CompleteRange
{
    public function __construct()
    {
    }

    public function build($range){
        $new_range = array();
        for($i=0;$i<count($range);$i++){
           if($i+1!= count($range)){
               foreach (range($range[$i], $range[$i+1]) as $número) {
                   array_push($new_range,$número);
               }
           }
        }
        return $new_range;
    }
}