<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model{
    protected $table = "predios";

    protected $fillable = [
        'Name', 'Description', 'URLGoogleMap', 'address_id', 'photogallery_id', 'customer_id'
    ];

    // public $timestamps = false;
}
