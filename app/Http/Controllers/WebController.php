<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Mapping;
use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Response as FacadesResponse;
use PhpParser\Node\Expr\FuncCall;

class WebController extends Controller
{




    private $plan;
    private $mapping;

    public function __construct(Plan $plan, Mapping $mapping)
    {

        $this->plan = $plan;
        $this->mapping = $mapping;
    }


    /**
     * Rendezira a página principal
     *
     * @return void
     */
    public function index()
    {


        $plans = $this->plan->all();
        $control = $this->mapping->all();


        return view('web.index')->with([
            'plans' => $plans,
            'control' => $control

        ]);
    }


    /**
     * Recebe os dados do formulário da página inicial
     *
     * @param Request $data
     * @return void
     */
    public function post(PostRequest $data)
    {

        /**@var Plan */
        $plan = Plan::find($data->plan);
        $time = $data->time;

        $mapping = Mapping::where("origin", $data->origin)
            ->where("destiny", $data->destiny)
            ->first();


        if (!$mapping) {

            echo $this->ajaxResponse("message", [
                "type" => "error",
                "message" => "Rota ainda não mapeada!"
            ]);

            return;
        }

        $withPlan = $plan->getValueWithPlan($time, $mapping->value_per_minute);
        $withOutPlan = $plan->getValueWithoutPlan($time, $mapping->value_per_minute);


        $data = [

            "data" => [
                "withPlan" => $withPlan,
                "withOutPlan" => $withOutPlan,
                "plan" => $plan->name
            ]
        ];


        return FacadesResponse::json($data);
    }
}
