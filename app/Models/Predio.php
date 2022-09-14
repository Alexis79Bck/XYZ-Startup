<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Predio extends Model{
    protected $table = "predios";

    protected $fillable = [
        'Name', 'Description', 'URLGoogleMap',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class);
    }

    public function salas()
    {
        return $this->hasMany(Sala::class);
    }

    public function gallery()
    {
        return $this->morphOne(PhotoGallery::class, 'galleryAvailable');
    }

}
