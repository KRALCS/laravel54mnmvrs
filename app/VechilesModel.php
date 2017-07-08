<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VechilesModel extends Model
{
    protected $table = "vechiles";
    protected $fillable = ["plate", "nickname", "brands_id", "models_id", "modelyear", "vtypes_id", "colors_id", "status", "users_id"];
}
