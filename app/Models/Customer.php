<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model{
    protected $table = "customers";
    protected $primaryKey = "CNPJ";
    protected $keyType = 'string';

    protected $fillable = [
        'CompanyName', 'FancyName', 'CNPJ', 'Phone', 'email', 'Birthday'
    ];

    public function predio()
    {
        return $this->hasMany(Predio::class);
    }
}
