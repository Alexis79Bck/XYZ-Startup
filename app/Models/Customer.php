<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    protected $table = "customers";
    protected $fillable = [
        'CNPJ',  'CompanyName', 'FancyName',  'Phone', 'email', 'Birthday',
        'CEP', 'State', 'UF', 'City', 'StreetAddress', 'Number','Complement'
    ];

    public function predio()
    {
        return $this->hasMany(Predio::class);
    }
}
