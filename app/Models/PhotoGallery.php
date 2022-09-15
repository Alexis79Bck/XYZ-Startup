<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model{
    protected $table = "PhotoGalleries";

    protected $fillable = [
        'Name', 'Type'
    ];

    public function galleryAvailable()
    {
        return $this->morphTo();
    }

    public function imagesCollection()
    {
        return $this->hasMany(Image::class, 'photogallery_id');
    }

}
