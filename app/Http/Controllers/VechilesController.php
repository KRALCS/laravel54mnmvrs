<?php

namespace App\Http\Controllers;

use App\VechilesModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class VechilesController extends Controller
{

    /**
     * Display the specified or all vechiles.
     *
     * @param  int  $id (Vechile id)
     * @return Response
     */
	public function index($id = null) {
        if ($id == null) {
            return DB::table('vechiles')
                ->join('brands', 'vechiles.brands_id', '=', 'brands.id')
                ->join('models', 'vechiles.models_id', '=', 'models.id')
                ->join('vtypes', 'vechiles.vtypes_id', '=', 'vtypes.id')
                ->join('colors', 'vechiles.colors_id', '=', 'colors.id')
                ->select('vechiles.id as id', 'vechiles.plate as plate', 'vechiles.nickname as nickname', 'brands.name as brands_id', 'models.name as models_id', 'vechiles.modelyear as modelyear', 'vtypes.name as vtypes_id', 'colors.name as colors_id', 'vechiles.status as status')
                ->orderBy('id', 'asc')
                ->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created vechile in storage.
     *
     * @param  Request  $request
     * @return String
     */
    public function store(Request $request) {
        $token                  = $request->input('token');
        $getuser                = file_get_contents("http://localhost/laravel54mnmvrs/public/user?token=".$token);
        $userid                 = json_decode($getuser, true);
        $plate                  = trim($request->input('plate'));
        $nickname               = trim($request->input('nickname'));
        $brands_id              = substr($request->input('brands_id'), strpos($request->input('brands_id'), ':')+1);
        $models_id              = substr($request->input('models_id'), strpos($request->input('models_id'), ':')+1);
        $modelyear              = trim($request->input('modelyear'));
        $vtypes_id              = substr($request->input('vtypes_id'), strpos($request->input('vtypes_id'), ':')+1);
        $colors_id              = substr($request->input('colors_id'), strpos($request->input('colors_id'), ':')+1);
        $status                 = trim($request->input('status'));

        if((strlen($plate) < 10) && (strlen($nickname) < 100) && (strlen($modelyear) < 11) && (ctype_digit($modelyear)) && ($plate != null) && ($nickname != null) && ($modelyear != null) && ($brands_id != null) && ($models_id != null) && ($vtypes_id != null) && ($colors_id != null)) {
            $platecount             = DB::table('vechiles')->where('plate', $plate)->count();
            if($platecount == 0) {
                $vechile            = new VechilesModel;
                $vechile->plate     = $plate;
                $vechile->nickname  = $nickname;
                $vechile->brands_id = $brands_id;
                $vechile->models_id = $models_id;
                $vechile->modelyear = $modelyear;
                $vechile->vtypes_id = $vtypes_id;
                $vechile->colors_id = $colors_id;
                $vechile->status    = $status;
                $vechile->users_id  = $userid['result']['id'];
                $vechile->save();
            } else {
                return "<script>alert('Plate no already using!'); location.href='".URL::to('/vechile?token='.$token)."';</script>";
            }
        } else {
            return "<script>alert('Please check all columns!'); location.href='".URL::to('/vechile?token='.$token)."';</script>";
        }

        return "<script>alert('Vechile registration successful.'); location.href='".URL::to('/vechile?token='.$token)."';</script>";

    }

    /**
     * Display the specified vechile.
     *
     * @param  int  $id (Vechile id)
     * @return Response
     */
    public function show($id) {
        return VechilesModel::where('id', $id)->first();
    }


    /**
     * Remove the specified vechile from storage.
     *
     * @param  Request $request (Request)
     * @param  int $id (Vechile id)
     * @param  string $token (JWT Token)
     * @return string
     */
    public function destroy(Request $request, $id, $token) {
        $getuser                = file_get_contents("http://localhost/laravel54mnmvrs/public/user?token=".$token);
        $userid                 = json_decode($getuser, true);
        if($userid['result']['id']) {
            $vechile = VechilesModel::find($id);
            $vechile->delete();
            return "Vechile record successfully deleted #" . $request->input('id');
        }

    }

    /**
     * Display the add vechile form.
     *
     * @param
     * @return View
     */
    public function vechileAdd() {
        return view('vechileadd');
    }

    /**
     * Display the add vechile form.
     *
     * @param
     * @return View
     */
    public function vechileList() {
        return view('vechiles');
    }
}
