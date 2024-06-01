<?php

namespace App\Models;

use App\Models\videoCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','details', 'file_path', 'type',
    ];

    public function videoCategory ()
    {
        return $this->belongsTo(videoCategory::class);
    }
}
