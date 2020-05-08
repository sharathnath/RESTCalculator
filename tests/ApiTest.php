<?php



class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddition()
    {
        $data = [
            'operation' => "add",
            'firstvalue' => "1",
            'secondvalue' => "2"
        ];
        $this->json('GET', '/calculate', $data)
            ->seeJson([
                'message' => "operation successful",
            ]);
    }


    public function testSubstract()
    {
        $data = [
            'operation' => "substract",
            'firstvalue' => "1",
            'secondvalue' => "2"
        ];
        $this->json('GET', '/calculate', $data)
            ->seeJson([
                'message' => "operation successful",
            ]);
    }



    public function testMultiply()
    {
        $data = [
            'operation' => "multiply",
            'firstvalue' => "1",
            'secondvalue' => "2"
        ];
        $this->json('GET', '/calculate', $data)
            ->seeJson([
                'message' => "operation successful",
            ]);
    }



    public function testDivide()
    {
        $data = [
            'operation' => "divide",
            'firstvalue' => "1",
            'secondvalue' => "1"
        ];
        $this->json('GET', '/calculate', $data)
            ->seeJson([
                'message' => "operation successful",
            ]);
    }


    public function testSquareRoot()
    {
        $data = [
            'operation' => "squareroot",
            'firstvalue' => "1"
        ];
        $this->json('GET', '/calculate', $data)
            ->seeJson([
                'message' => "operation successful",
            ]);
    }
}
