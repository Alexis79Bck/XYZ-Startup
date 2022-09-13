<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    protected $table = "customers";

    protected $fillable = [
        'CompanyName', 'FancyName', 'CNPJ', 'Phone', 'email', 'Birthday', 'address_id'
    ];

    // public $timestamps = false;
}
