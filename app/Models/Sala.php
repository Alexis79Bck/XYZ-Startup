<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model{
    protected $table = "salas";

    protected $fillable = [
        'Name', 'Description', 'predio_id', 'photogallery_id', 'tipagemsala_id'
    ];

    public function gallery()
    {
        return $this->morphOne(PhotoGallery::class, 'galleryAvailable');
    }

    public function typeSala(){
        return $this->hasOne(TypeSala::class);
    }

    public function predio()
    {
        return $this->belongsTo(Predio::class);
    }
}
