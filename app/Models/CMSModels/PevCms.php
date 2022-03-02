<?php

namespace App\Models\CMSModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PevCms extends Model
{
    use HasFactory;

    protected $table = 'pev_cms';

    protected $fillable = [
        'active',
        'position',
        'deleted',
    ];

    public function CmsLang()
    {
        return $this->hasMany(PevCmsLang::class, 'pev_cms_id');
    }
}
