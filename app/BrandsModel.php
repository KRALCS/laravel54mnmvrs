<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandsModel extends Model
{
    protected $table = "brands";
    protected $fillable = ["id", "name"];
}
