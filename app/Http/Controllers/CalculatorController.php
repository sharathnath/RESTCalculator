<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Helpers\ApiResponse;
use App\Helpers\Operation;




class CalculatorController extends Controller
{

    public function calculate(Request $request)
    {
        try {
            $input = array(
                'operation' => $request->input('operation'),
                'firstvalue' => $request->input('firstvalue'),
                'secondvalue' => $request->input('secondvalue')
            );

            $rules = [
                'operation' => ['required', Rule::in(['add', 'substract', 'multiply', 'divide', 'squareroot'])],
                'firstvalue' => 'required|numeric',
                'secondvalue' => 'required|numeric',
            ];

            if ($input['operation'] == 'squareroot') {
                $rules['firstvalue'] = 'required|numeric|min:0';
                unset($rules['secondvalue']);
            }

            if ($input['operation'] == 'divide')
                $rules['secondvalue'] = 'required|integer|gt:0';

            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return ApiResponse::unprocessableEntity(1, $validator->errors()->first());
            }
            $operation = new Operation();

            switch ($input['operation']) {

                case 'add':

                    $output = $operation->add($input['firstvalue'], $input['secondvalue']);
                    break;
                case 'substract':

                    $output = $operation->substract($input['firstvalue'], $input['secondvalue']);
                    break;


                case 'multiply':
                    $output = $operation->multiply($input['firstvalue'], $input['secondvalue']);
                    break;

                case 'divide':
                    $output = $operation->divide($input['firstvalue'], $input['secondvalue']);
                    break;

                case 'squareroot':
                    $output = $operation->squareroot($input['firstvalue']);
                    break;
            }


            return ApiResponse::ok('1', $output, 'operation successful');
        } catch (Exception $e) {
            return ApiResponse::unprocessableEntity(4, "Internal Server Error");
        }
    }
}
