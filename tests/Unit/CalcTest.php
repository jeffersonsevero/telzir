<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\WebController;
use App\Plan;

class CalcTest extends TestCase
{



    //Esses ids são referentes aos Ids no banco de dados
    protected $plan30 = 1;
    protected $plan60 = 2;
    protected $plan120 = 3;

    /**
     * PROVIDERS
     */



    /**
     * Essa função de provider dá o set de testes para a função testIfWithPlanIsWorking
     *
     * @return array
     */
    public function withPlanProvider(): array
    {


        $array = array(
            array(20, $this->plan30, 2, 0),
            array(40, $this->plan30, 6,  66),
            array(60, $this->plan30, 3.2, 105.6),
            array(5, $this->plan30, 3, 0),
            array(200, $this->plan30, 8.2, 1533.4),
            array(100, $this->plan30, -1, -77),
            array(32, $this->plan30, 4, 8.8),
            array(45, $this->plan30, 2.3, 37.95),
            array(12, $this->plan30, 7.8, 0),
            array(78, $this->plan30, 4.8, 253.44),
            array(1, $this->plan30, 0.8, 0),


            array(20, $this->plan60, 2, 0),
            array(40, $this->plan60, 6,  0),
            array(60, $this->plan60, 3.2, 0),
            array(5,  $this->plan60, 3, 0),
            array(200,$this->plan60, 8.2, 1262.8),
            array(100,$this->plan60, -1, -44),
            array(32, $this->plan60, 4, 0),
            array(45, $this->plan60, 2.3, 0),
            array(12, $this->plan60, 7.8, 0),
            array(78, $this->plan60, 4.8, 95.04),
            array(1,  $this->plan60, 0.8, 0),



            array(20, $this->plan120, 2, 0),
            array(40, $this->plan120, 6,  0),
            array(60, $this->plan120, 3.2, 0),
            array(5,  $this->plan120, 3, 0),
            array(200,$this->plan120, 8.2, 721.6),
            array(100,$this->plan120, -1, 0),
            array(32, $this->plan120, 4, 0),
            array(45, $this->plan120, 2.3, 0),
            array(12, $this->plan120, 7.8, 0),
            array(78, $this->plan120, 4.8, 0),
            array(1,  $this->plan120, 0.8, 0),




        );

        return $array;
    }

    /**
     * Essa função de provider dá o set de testes para a função testIfWithOutPlanIsWorking
     *
     * @return array
     */
    public function withOutPlanProvider(): array
    {



        $array = array(
            array(50, 2, 100),
            array(10, 6,  60),
            array(5, 3.2, 16),
            array(53,  3, 159),
            array(11,  8.2, 90.2),
            array(45, -1, -45),
            array(12, 23, 276),
            array(98, 9.3, 911.4),
            array(1, 5.2, 5.2),
            array(20, 9.0, 180),
            array(2, 1.4, 2.8),
        );

        return $array;
    }




    /**
     * FUNTIONS THAT USE PROVIDERS
     */


    /** Função que faz os testes dos cálculos sem o plano
     * @dataProvider withOutPlanProvider
     */
    public function testIfWithOutPlanIsWorking(int $time,  float $valueMinute, float $expect)
    {


        $this->assertEquals(
            $expect,
            (new WebController)->withOutFaleMais($time, $valueMinute)
        );
    }


    /** Função que faz os testes dos cálculos com o plano
     * @dataProvider withPlanProvider
     */
    public function testIfWithPlanIsWorking(int $time, int $plan, float $valueMinute, float $expect)
    {

        $plan = Plan::find($plan);

        $this->assertEquals(
            $expect,
            (new WebController)->withFaleMais($time, $plan, $valueMinute)
        );
    }
}
