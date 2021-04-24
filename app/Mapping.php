<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapping extends Model
{

    protected $table = "mappings";
    protected $fillable = ["origin", "destiny", "value"];


}
