<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VtypesModel extends Model
{
    protected $table = "vtypes";
    protected $fillable = ["id", "name"];
}
