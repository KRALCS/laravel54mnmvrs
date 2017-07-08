<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelsModel extends Model
{
    protected $table = "models";
    protected $fillable = ["id", "name"];
}
