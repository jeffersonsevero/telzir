<?php

namespace App\Http\Controllers;

use App\Mapping;
use App\Plan;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class WebController extends Controller
{


    public function index()
    {


        $plans = Plan::all();
        $control = Mapping::all();


        return view('web.index')->with([
            'plans' => $plans,
            'control' => $control

        ]);
    }


    public function post(Request $data): void
    {


        if (in_array("", $data->all())) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Oops, preencha todos os dados!"
            ]);
            return;
        }

        if (!filter_var($data->time, FILTER_VALIDATE_INT)) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Oops, tipo de dado incorreto! Verifique novamente!"
            ]);
            return;
        }

        if (!$data->plan) {
            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Oops, selecione um plano!"
            ]);
            return;
        }

        $plan = Plan::find($data->plan);
        $time = $data->time;

        $mapping = Mapping::where("origin", $data->origin)
            ->where("destiny", $data->destiny)
            ->first();


        if(!$mapping){

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Rota ainda não mapeada!"
            ]);

            return;

        }

        $withFaleMais = $this->withFaleMais($time, $plan, $mapping->value_per_minute);
        $withOutFaleMais = $this->withOutFaleMais($time, $mapping->value_per_minute);


        echo $this->ajaxResponse("data", [
            "withPlan" => $withFaleMais,
            "withOutPlan" => $withOutFaleMais,
            "plan" => $plan->name
        ]);

        return;


    }







    public  function withFaleMais(int $time, Plan $plan, float $valuePerMinute): float
    {

        if ($time <= $plan->minutes) {
            return 0;
        }

        $diff = $time - $plan->minutes;

        $result = 0;

        for($i = 1; $i <= $diff; $i++){

            $result += $valuePerMinute * 1.10;

        }

        return $result;

    }


    public function withOutFaleMais(int $time,  float $valuePerMinute): float
    {
        return $time * $valuePerMinute;

    }




    private function validate(Request $request): voidtrue {

        return true;

    }



    private function ajaxResponse(string $param, array $values): string
    {
        return json_encode([$param => $values]);
    }
}
