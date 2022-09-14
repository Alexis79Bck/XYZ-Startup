<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model{
    protected $table = "Images";

    protected $fillable = [
        'Title', 'ImagePath'
    ];

    public function gallery()
    {
        return $this->BelongsTo(PhotoGallery::class);
    }


}
