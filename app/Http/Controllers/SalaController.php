<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Predio;
use App\Models\PhotoGallery;

class SalaController extends Controller{
    public function index()
    {
        $salas = Sala::all();

        return response()->json($salas, 200);
    }

    public function store(Request $request)
    {

        $sala = new Sala;
        $sala->Name = $request->Name;
        $sala->Description = $request->Description;
        $sala->predio_id = $request->predio_id;
        $sala->tipagemsala_id = $request->tipagemsala_id;
        $sala->photogallery_id = $request->photogallery_id; 
        $sala->save();
    }
}
