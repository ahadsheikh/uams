<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'file', 'upload_date'];

    public function work(){
        return $this->belongsTo(Work::class);
    }
}
