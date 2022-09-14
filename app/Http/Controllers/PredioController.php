<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Predio;
class PredioController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $predios = Predio::all();

        return response()->json($predios, 200);
    }

    /**
     * Summary of store
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function store(Request $request)
    {
        $predio = new Predio;

        if ($request->input('Name')) {
            $predio->Name = $request->Name;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('Description')) {
            $predio->Description = $request->Description;
        } else {
            return response("* This field is required.");
        }

        $predio->URLGoogleMap = $request->URLGoogleMap;

        if ($request->input('CEP')) {
            if ($this->validatePatternCEP($request->input('CEP'))) {
                $predio->CEP = $request->CEP;
            } else {
                return response("* The CEP " . $request->input('CEP') . " format does not match. Correct format is #####-###.");
            }
        } else {
            return response("* This field is required.");
        }

        if ($request->input('State')) {
            $predio->State = $request->State;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('UF')) {
            $predio->UF = $request->UF;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('City')) {
            $predio->City = $request->City;
        } else {
            return response("* This field is required.");
        }

        $predio->StreetAddress = $request->StreetAddress;

        if ($request->input('Number')) {
            $predio->Number = $request->Number;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('photogallery_id')) {
            $predio->photogallery_id = $request->photogallery_id;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('customer_id')) {
            $predio->customer_id = $request->customer_id;
        } else {
            return response("* This field is required.");
        }

        $predio->save();

        $data = [
            'record' => $predio,
            'message' => 'The site has been saved successfully.',
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
        $predio = Predio::where('id', '=', $id)->first();
        if ($predio) {
            return response()->json($predio, 200);
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
    public function update(Request $request, $id) {
        $predio = Predio::where('id', '=', $id)->first();

        if ($request->input('Name')) {
            $predio->Name = $request->Name;
        }

        if ($request->input('Description')) {
            $predio->Description = $request->Description;
        }

        if ($request->input('CEP')) {
            if ($this->validatePatternCEP($request->input('CEP'))) {
                $predio->CEP = $request->CEP;
            } else {
                return response("* The CEP " . $request->input('CEP') . " format does not match. Correct format is #####-###.");
            }
        }

        if ($request->input('State')) {
            $predio->State = $request->State;
        }

        if ($request->input('UF')) {
            $predio->UF = $request->UF;
        }

        if ($request->input('City')) {
            $predio->City = $request->City;
        }

        if ($request->input('StreetAddress')) {
            $predio->StreetAddress = $request->StreetAddress;
        }

        if ($request->input('Number')) {
            $predio->Number = $request->Number;
        }

        if ($request->input('Complement')) {
            $predio->Complement = $request->Complement;
        }

        $predio->save();

        $data = [
            'record' => $predio,
            'message' => 'The site has been updated successfully.',
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
        $predio = Predio::where('id', '=', $id)->first();
        $predio->destroy();
        return response('The site has been deleted successfully.');

    }

    /**
     * Summary of validatePatternCEP
     * @param mixed $value
     * @return bool
     */
    private function validatePatternCEP($value)
    {
        if (preg_match('/[0-9]{5}-[0-9]{3}/', $value)) {
            return true;
        } else {
            return false;
        }
    }

}
