<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeSala;

class TypeSalaController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $typesSalas = TypeSala::all();

        return response()->json($typesSalas, 200);
    }

    public function store(Request $request)
    {
        $typeSala = new TypeSala;
        if ($request->input('Name')) {
            $typeSala->Name = $request->Name;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('Description')) {
            $typeSala->Description = $request->Description;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('CostPerMinute')) {
            if (is_numeric($request->input('CostPerMinute'))) {
                $typeSala->CostPerMinute = $request->CostPerMinute;
            }else{
                return response("* This field must be numeric.");
            }
        } else {
            return response("* This field is required.");
        }

        $typeSala->save();

        $data = [
            'record' => $typeSala,
            'message' => 'The type sala has been saved successfully.',
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
        $typeSala = TypeSala::where('id', '=', $id)->first();
        if ($typeSala) {
            return response()->json($typeSala, 200);
        } else {
            return response("The type sala don't exist in our records.");
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
        $typeSala = TypeSala::where('id', '=', $id)->first();

        if ($request->input('Name')) {
            $typeSala->Name = $request->Name;
        }

        if ($request->input('Description')) {
            $typeSala->Description = $request->Description;
        }
        if ($request->input('CostPerMinute')) {
            if (is_numeric($request->input('CostPerMinute'))) {
                $typeSala->CostPerMinute = $request->CostPerMinute;
            } else {
                return response("* This field must be numeric.");
            }
        }

        $typeSala->save();

        $data = [
            'record' => $typeSala,
            'message' => 'The type sala has been updated successfully.',
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
        $typeSala = TypeSala::where('id', '=', $id)->first();
        $typeSala->delete();
        return response('The type sala has been deleted successfully.');
    }


}
