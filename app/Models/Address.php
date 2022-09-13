<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model{
    protected $table = "addresses";

    protected $fillable = [
        'CEP', 'State', 'UF', 'City', 'StreetAddress', 'Number', 'Complement'
    ];

    // public $timestamps = false;
}
