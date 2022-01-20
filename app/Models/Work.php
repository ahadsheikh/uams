<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Office;
use App\Models\File;

class Work extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function office(){
        return $this->belongsTo(Office::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}
