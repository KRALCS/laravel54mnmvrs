<?php

namespace App\Http\Controllers;

use App\BrandsModel;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;

class BrandsController extends Controller
{
    /**
     * Display the specified or all brands.
     *
     * @param  int  $id (Brands id)
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return BrandsModel::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Display the specified brands.
     *
     * @param  int  $id (Brands id)
     * @return Response
     */
    public function show($id) {
        return BrandsModel::find($id);
    }
}
