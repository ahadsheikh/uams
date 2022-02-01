<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daakfile extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'file', 'upload_date', 'message', 'owner'];
}
