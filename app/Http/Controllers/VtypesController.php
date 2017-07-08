<?php

namespace App\Http\Controllers;

use App\VtypesModel;
use Illuminate\Http\Request;

class VtypesController extends Controller
{
    /**
     * Display the specified or all vechiletypes.
     *
     * @param  int  $id (Vechiletypes id)
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return VtypesModel::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Display the specified vechiletypes.
     *
     * @param  int  $id (Vechiletypes id)
     * @return Response
     */
    public function show($id) {
        return VtypesModel::find($id);
    }
}
