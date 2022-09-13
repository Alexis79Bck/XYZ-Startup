<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model{
    protected $table = "salas";

    protected $fillable = [
        'Name', 'Description', 'predio_id', 'photogallery_id', 'tipagemsala_id'
    ];

    // public $timestamps = false;
}
