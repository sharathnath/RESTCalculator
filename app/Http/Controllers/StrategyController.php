<?php

namespace App\Http\Controllers;

use App\calculator\Addition;
use App\calculator\Divide;
use App\calculator\Multiply;
use App\calculator\SquareRoot;
use App\calculator\Substraction;

class StrategyController
{
    private $strategy = NULL;
    //bookList is not instantiated at construct time
    public function __construct($strategy_ind_id)
    {
        switch ($strategy_ind_id) {
            case "add":
                $this->strategy = new Addition();
                break;
            case "substarct":
                $this->strategy = new Substraction();
                break;

            case "multiply":
                $this->strategy = new Multiply();
                break;
            case "divide":
                $this->strategy = new Divide();
                break;
            case "squareroot":
                $this->strategy = new SquareRoot();
                break;
        }
    }
    public function operation($a, $b = null)
    {
        return $this->strategy->doOperation($a, $b);
    }

    public function validateInputs($a, $b = null)
    {
        return $this->strategy->dovalidation($a, $b);
    }
}
