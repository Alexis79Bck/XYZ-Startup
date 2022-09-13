<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Address;

class CustomerController extends Controller
{

    public function index() {
        $customers = Customer::all();

        return response()->json($customers, 200);
    }

    public function store(Request $request) {

        $address = new Address;
        $address->CEP = $request->CEP;
        $address->State = $request->State;
        $address->UF = $request->UF;
        $address->City = $request->City;
        $address->StreetAddress = $request->StreetAddress;
        $address->Number = $request->Number;
        $address->Complement = $request->Complement;
        $address->save();

        $customer = new Customer;
        $customer->CompanyName = $request->CompanyName;
        $customer->FancyName = $request->FancyName;
        $customer->CNPJ = $request->CNPJ;
        $customer->Phone = $request->Phone;
        $customer->email = $request->email;
        $customer->Birthday = $request->Birthday;
        $customer->address_id = $address->id;
        $customer->save();


    }

}
