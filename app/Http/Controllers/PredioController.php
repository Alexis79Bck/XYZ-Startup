<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predio;
use App\Models\Address;

class PredioController extends Controller{
    public function index()
    {
        $predios = Predio::all();

        return response()->json($predios, 200);
    }

    public function store(Request $request)
    {

        $address = new Address;
        $address->CEP = $request->CEP;
        $address->State = $request->State;
        $address->UF = $request->UF;
        $address->City = $request->City;
        $address->StreetAddress = $request->StreetAddress;
        $address->Number = $request->Number;
        $address->Complement = $request->Complement;
        $address->save();

        $predio = new Predio;
        $predio->Name = $request->Name;
        $predio->Description = $request->Description;
        $predio->URLGoogleMap = $request->URLGoogleMap;
        $predio->address_id = $address->id;
        $predio->photogallery_id = $request->photogallery_id;
        $predio->customer_id = $request->customer_id;
        $predio->save();
    }

}
