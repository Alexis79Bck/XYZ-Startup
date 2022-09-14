<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model{
    protected $table = "undefined";

    protected $fillable = [
        'Title', 'ImagePath'
    ];

    public function galleryAvailable()
    {
        return $this->morphTo();
    }

    public function imagesCollection()
    {
        return $this->hasMany(Image::class);
    }

}
