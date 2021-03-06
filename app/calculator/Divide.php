<?php

namespace App\calculator;

use App\calculator\OperationInterface;
use Illuminate\Support\Facades\Validator;



class Divide implements OperationInterface
{
    public $result;

    public function doOperation($a, $b = null)
    {
        return $this->result = $a / $b;
    }



    public function dovalidation($a, $b = null)
    {
        $input = array(
            'firstvalue' => $a,
            'secondvalue' => $b
        );

        $rules = [
            'firstvalue' => 'required|numeric',
            'secondvalue' => 'required|integer|gt:0',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return ['status' => false, 'message' => $validator->errors()->first()];
        }
        return ['status' => true];
    }
}
