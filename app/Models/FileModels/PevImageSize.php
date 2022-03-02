<?php

namespace App\Models\FileModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevImageSize extends Model
{
    use HasFactory;

    protected $table = 'pev_image_sizes';

    protected $fillable = [
        'pev_image_zone_id',
        'folder',
        'width',
        'height',
        'deleted',
    ];

    public function ImageZone()
    {
        return $this->belongsTo(PevImageZone::class, 'pev_image_zone_id');
    }

    public function ImageMedia()
    {
        return $this->hasMany(PevMedia::class, 'pev_image_size_id');
    }
}
