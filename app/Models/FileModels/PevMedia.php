<?php

namespace App\Models\FileModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevMedia extends Model
{
    use HasFactory;

    protected $table = 'pev_media';

    protected $fillable = [
        'pev_image_zone_id',
        'url',
        'url_amigable',
        'alt',
        'title',
        'description',
        'deleted',
    ];

    public function ImageZone()
    {
        return $this->belongsTo(PevImageZone::class, 'pev_image_zone_id');
    }
}
