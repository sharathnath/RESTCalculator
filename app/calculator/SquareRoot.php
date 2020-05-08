<?php

namespace App\calculator;

use App\calculator\OperationInterface;
use Illuminate\Support\Facades\Validator;



class SquareRoot implements OperationInterface
{
    public $result;

    public function doOperation($a, $b = null)
    {
        return $this->result = sqrt($a);
    }

    public function dovalidation($a, $b = null)
    {
        $input = array(
            'firstvalue' => $a
        );

        $rules = [
            'firstvalue' => 'required|numeric|min:0',
        ];

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return ['status' => false, 'message' => $validator->errors()->first()];
        }
        return ['status' => true];
    }
}
