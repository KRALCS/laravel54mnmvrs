<?php

namespace App\Http\Controllers;

use App\ColorsModel;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    /**
     * Display the specified or all colors.
     *
     * @param  int  $id (Colors id)
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return ColorsModel::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Display the specified colors.
     *
     * @param  int  $id (Colors id)
     * @return Response
     */
    public function show($id) {
        return ColorsModel::find($id);
    }
}
