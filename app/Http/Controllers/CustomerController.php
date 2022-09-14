<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() {
        $customers = Customer::all();

        return response()->json($customers, 200);
    }

    /**
     * Summary of store
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function store(Request $request) {

        $customer = new Customer;

        if ($request->input('CNPJ')) {
            if ($this->validatePatternCNPJ($request->input('CNPJ'))) {
                if ($this->checkCNPJ($request->input('CNPJ'))) {
                    return response("* The CNPJ " . $request->input('CNPJ') . " is already registered.");
                } else {
                    $customer->CNPJ = $request->CNPJ;
                }
            }else{
                return response("* The CNPJ " . $request->input('CNPJ') . " format does not match. Correct format is ##.###.###/###-##");
            }
        }else{
            return response("* This field is required.");
        }

        if ($request->input('CompanyName')) {
            $customer->CompanyName = $request->CompanyName;
        }else{
            return response("* This field is required.");
        }

        if ($request->input('FancyName')) {
            $customer->FancyName = $request->FancyName;
        } else {
            return response("* This field is required.");
        }

        $customer->Phone = $request->Phone;
        $customer->email = $request->email;
        $customer->Birthday = $request->Birthday;

        if ($request->input('CEP')) {
            if ($this->validatePatternCEP($request->input('CEP'))) {
                $customer->CEP = $request->CEP;
            } else {
                return response("* The CEP " . $request->input('CEP') . " format does not match. Correct format is #####-###.");
            }
        } else {
            return response("* This field is required.");
        }

        if ($request->input('State')) {
            $customer->State = $request->State;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('UF')) {
            $customer->UF = $request->UF;
        } else {
            return response("* This field is required.");
        }

        if ($request->input('City')) {
            $customer->City = $request->City;
        } else {
            return response("* This field is required.");
        }

        $customer->StreetAddress = $request->StreetAddress;

        if ($request->input('Number')) {
            $customer->Number = $request->Number;
        } else {
            return response("* This field is required.");
        }

        $customer->Complement = $request->Complement;
        $customer->save();

        $data = [
            'record' => $customer,
            'message' => 'The customer has been saved successfully.',
        ];

        return response()->json($data, 200);
    }

     /**
      * Summary of show
      * @param mixed $cnpj
      * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
      */

    public function show($cnpj)
    {
        if ($this->checkCNPJ($cnpj)) {
            $customer = Customer::where('CNPJ', '=', $cnpj)->first();
            return response()->json($customer, 200);
        }else{
            return response("The customer don't exist in our records.");
        }
    }

    /**
     * Summary of update
     * @param Request $request
     * @param mixed $cnpj
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function update (Request $request, $cnpj) {
        if ($this->checkCNPJ($cnpj)) {
            $customer = Customer::where('CNPJ', '=', $cnpj)->first();
            if ($request->input('CompanyName')) {
                $customer->CompanyName = $request->CompanyName;
            }

            if ($request->input('FancyName')) {
                $customer->FancyName = $request->FancyName;
            }

            if ($request->input('Phone')) {
                $customer->Phone = $request->Phone;
            }
            if ($request->input('email')) {
                $customer->email = $request->email;
            }
            if ($request->input('Birthday')) {
                $customer->Birthday = $request->Birthday;
            }

            if ($request->input('CEP')) {
                if ($this->validatePatternCEP($request->input('CEP'))) {
                    $customer->CEP = $request->CEP;
                } else {
                    return response("* The CEP " . $request->input('CEP') . " format does not match. Correct format is #####-###.");
                }
            }

            if ($request->input('State')) {
                $customer->State = $request->State;
            }

            if ($request->input('UF')) {
                $customer->UF = $request->UF;
            }

            if ($request->input('City')) {
                $customer->City = $request->City;
            }

            if ($request->input('StreetAddress')) {
                $customer->StreetAddress = $request->StreetAddress;
            }

            if ($request->input('Number')) {
                $customer->Number = $request->Number;
            }

            if ($request->input('Complement')) {
                $customer->Complement = $request->Complement;
            }

            $customer->save();

            $data = [
                'record' => $customer,
                'message' => 'The customer has been updated successfully.',
            ];
            return response()->json($data, 200);
        } else {
            return response("The customer don't exist in our records.");
        }
    }

    /**
     * Summary of destroy
     * @param mixed $cnpj
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function destroy($cnpj)
    {
        if ($this->checkCNPJ($cnpj)) {
            $customer = Customer::where('CNPJ', '=', $cnpj)->first();
            $customer->destroy();
            return response('The customer has been deleted successfully.');
        }
    }

    /**
     * Summary of checkCNPJ
     * @param mixed $value
     * @return bool
     */
    private function checkCNPJ($value){
        $customer= Customer::where('CNPJ', '=', $value)->first();
        if($customer){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Summary of validatePatternCNPJ
     * @param mixed $value
     * @return bool
     */
    private function validatePatternCNPJ($value)
    {
        if (preg_match('/[0-9]{2}.[0-9]{3}.[0-9]{3}\/[0-9]{4}-[0-9]{2}/', $value)) {
            return true;
        } else {
            return false;
        }
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
