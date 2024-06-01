<?php

namespace App\Models;

use App\Models\photosCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','details', 'file_path', 'type',
    ];

    public function photosCategory ()
    {
        return $this->belongsTo(photosCategory::class, 'photosCategories_id');
    }
}
