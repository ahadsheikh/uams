<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Work;

class Office extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function works(){
        return $this->hasMany(Work::class);
    }
}
