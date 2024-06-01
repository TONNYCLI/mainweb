<?php

namespace App\Models;

use App\Models\video;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videoCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'videoscategory',
    ];


    public function video ()
    {
        return $this->belongsToMany(video::class);
    }
}
