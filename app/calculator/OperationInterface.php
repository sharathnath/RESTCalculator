<?php

namespace App\calculator;

interface OperationInterface
{
    public function doOperation($a, $b = null);


    public function dovalidation($a, $b = null);
}
