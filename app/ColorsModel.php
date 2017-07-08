<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorsModel extends Model
{
    protected $table = "colors";
    protected $fillable = ["id", "name"];
}
