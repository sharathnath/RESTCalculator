<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Helpers\ApiResponse;




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
                'operation' => ['required', Rule::in(['add', 'substract', 'multiply', 'divide', 'squareroot'])]
            ];

            $validator = Validator::make($input, $rules);

            if ($validator->fails()) {
                return ApiResponse::unprocessableEntity(1, $validator->errors()->first());
            }
            switch ($input['operation']) {

                case 'add':

                    $strategyContext = new StrategyController('add');
                    $validate = $strategyContext->validateInputs($input['firstvalue'], $input['secondvalue']);
                    if (!$validate['status']) {
                        return ApiResponse::unprocessableEntity(0, $validate['message']);
                    }
                    $output = $strategyContext->operation($input['firstvalue'], $input['secondvalue']);
                    break;
                case 'substract':

                    $strategyContext = new StrategyController('substarct');
                    $validate = $strategyContext->validateInputs($input['firstvalue'], $input['secondvalue']);
                    if (!$validate['status']) {
                        return ApiResponse::unprocessableEntity(0, $validate['message']);
                    }
                    $output = $strategyContext->operation($input['firstvalue'], $input['secondvalue']);
                    break;
                case 'multiply':

                    $strategyContext = new StrategyController('multiply');
                    $validate = $strategyContext->validateInputs($input['firstvalue'], $input['secondvalue']);
                    if (!$validate['status']) {
                        return ApiResponse::unprocessableEntity(0, $validate['message']);
                    }
                    $output = $strategyContext->operation($input['firstvalue'], $input['secondvalue']);
                    break;
                case 'divide':

                    $strategyContext = new StrategyController('divide');
                    $validate = $strategyContext->validateInputs($input['firstvalue'], $input['secondvalue']);
                    if (!$validate['status']) {
                        return ApiResponse::unprocessableEntity(0, $validate['message']);
                    }
                    $output = $strategyContext->operation($input['firstvalue'], $input['secondvalue']);
                    break;
                case 'squareroot':

                    $strategyContext = new StrategyController('squareroot');
                    $validate = $strategyContext->validateInputs($input['firstvalue'], $input['secondvalue']);
                    if (!$validate['status']) {
                        return ApiResponse::unprocessableEntity(0, $validate['message']);
                    }
                    $output = $strategyContext->operation($input['firstvalue']);
                    break;
            }


            return ApiResponse::ok('1', $output, 'operation successful');
        } catch (Exception $e) {
            return ApiResponse::unprocessableEntity(4, "Internal Server Error");
        }
    }
}
