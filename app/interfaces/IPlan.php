<?php
namespace App\interfaces;


interface IPlan{



    public function getName() : string;

    public function getValueWithoutPlan(int $time, float $valuePerMinute): float;

    public function getValueWithPlan(int $time, float $valuePerMinute): float;





}
