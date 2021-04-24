<?php

namespace App;

use App\interfaces\IPlan;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model implements IPlan
{


    protected $table = "plans";
    protected $fillable = ["name", "minutes"];



    public function getName(): string
    {
        return $this->name;
    }

    public function getValueWithoutPlan(int $time, float $valuePerMinute): float
    {
        return $time * $valuePerMinute;
    }



    public function getValueWithPlan(int $time, float $valuePerMinute): float
    {

        if($time <= $this->minutes){
            return 0;
        }


        $diff = $time - $this->minutes;
        $result = 0;


        for ($i = 1; $i <= $diff; $i++) {

            $result += $valuePerMinute * ($this->percentage / 100 );
        }

        return $result;

    }



}
