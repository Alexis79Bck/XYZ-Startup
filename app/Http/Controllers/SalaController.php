<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Predio;
use App\Models\PhotoGallery;

class SalaController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $salas = Sala::all();

        return response()->json($salas, 200);
    }

     /**
      * Summary of store
      * @param Request $request
      * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
      */
    public function store(Request $request)
    {
        $sala = new Sala;
        if ($request->input('Name')) {
            $sala->Name = $request->Name;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('Description')) {
            $sala->Description = $request->Description;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('predio_id')) {
            $sala->predio_id = $request->predio_id;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('typesala_id')) {
            $sala->typesala_id = $request->typesala_id;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('photogallery_id')) {
            $sala->photogallery_id = $request->photogallery_id;
        } else {
            return response("* This field is required.");
        }

        $sala->save();

        $data = [
            'record' => $sala,
            'message' => 'The sala has been saved successfully.',
        ];

        return response()->json($data, 200);

    }

    /**
     * Summary of show
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function show($id)
    {
        $sala = Sala::where('id', '=', $id)->first();
        if ($sala) {
            return response()->json($sala, 200);
        } else {
            return response("The site don't exist in our records.");
        }
    }

    /**
     * Summary of update
     * @param Request $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function update(Request $request, $id)
    {
        $sala = Sala::where('id', '=', $id)->first();

        if ($request->input('Name')) {
            $sala->Name = $request->Name;
        }

        if ($request->input('Description')) {
            $sala->Description = $request->Description;
        }

        if ($request->input('predio_id')) {
            $sala->predio_id = $request->predio_id;
        }

        if ($request->input('typesala_id')) {
            $sala->typesala_id = $request->typesala_id;
        }

        if ($request->input('photogallery_id')) {
            $sala->photogallery_id = $request->photogallery_id;
        }

        $sala->save();

        $data = [
            'record' => $sala,
            'message' => 'The sala has been updated successfully.',
        ];
        return response()->json($data, 200);
    }

    /**
     * Summary of destroy
     * @param mixed $id
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function destroy($id)
    {
        $sala = Sala::where('id', '=', $id)->first();
        $sala->destroy();
        return response('The sala has been deleted successfully.');
    }



}
