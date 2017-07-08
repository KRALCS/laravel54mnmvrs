<?php

namespace App\Http\Controllers;

use App\ModelsModel;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display the specified or all models.
     *
     * @param  int  $id (Models id)
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return ModelsModel::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Display the specified models.
     *
     * @param  int  $id (Models id)
     * @return Response
     */
    public function show($id) {
        return ModelsModel::find($id);
    }
}
