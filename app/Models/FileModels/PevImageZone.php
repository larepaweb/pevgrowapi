<?php

namespace App\Models\FileModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevImageZone extends Model
{
    use HasFactory;

    protected $table = 'pev_image_zones';

    protected $fillable = [
        'name',
        'folder',
        'deleted',
    ];

    public function ImageSize()
    {
        return $this->hasMany(PevImageSize::class, 'pev_image_zone_id');
    }
}
