<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\WebController;
use App\Plan;

class CalcTest extends TestCase
{


    /**
     * PROVIDERS
     */

    public function withPlanProvider(){

        $plan1 = 1;

        $array = array(
            array(20, $plan1, 2, 0 ),
            array(40, $plan1, 6,  66 ),
            array(60, $plan1, 3.2, 105.6 ),
            array(5, $plan1, 3, 0 ),
            array(200, $plan1, 8.2, 1533.4  ),
            array(100, $plan1, -1, -77 ),
        );

        return $array;

    }


    public function withOutPlanProvider(){

        $plan = 2;

        $array = array(
            array(50, 2, 100 ),
            array(10, 6,  60 ),
            array(5, 3.2, 16 ),
            array(53,  3, 159 ),
            array(11,  8.2, 90.2  ),
            array(200, -1, -200 ),
        );

        return $array;

    }




    /**
     * FUNTIONS THAT USE PROVIDERS
     */


    /**
     * @dataProvider withOutPlanProvider
     */
    public function testIfWithOutPlanIsWorking(int $time,  float $valueMinute, float $expect){


        $this->assertEquals(
            $expect,
            (new WebController)->withOutFaleMais($time, $valueMinute)
        );

    }



    /**
     * @dataProvider withPlanProvider
     */
    public function testIfWithPlanIsWorking(int $time, int $plan, float $valueMinute, float $expect){

        $plan = Plan::find($plan);

        $this->assertEquals(
            $expect,
            (new WebController)->withFaleMais($time, $plan , $valueMinute)
        );

    }



}
