<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeSala extends Model{
    protected $table = "TipagemSalas";

    protected $fillable = [
        'Name','Description','CostPerMinute'
    ];

    public function sala()
    {
        return $this->belongsTo(TypeSala::class);
    }
}
