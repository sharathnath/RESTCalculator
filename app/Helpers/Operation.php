<?php

namespace App\Helpers;

class Operation
{
    public  function add($a, $b)
    {

        return   $result = $a + $b;
    }


    public  function substract($a, $b)
    {
        return $result = $a - $b;
    }


    public  function multiply($a, $b)
    {
        return $result = $a * $b;
    }


    public  function divide($a, $b)
    {
        return $result = $a / $b;
    }



    public  function squareroot($a)
    {
        return $result = sqrt($a);
    }
}
