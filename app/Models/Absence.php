<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = ['company','date', 'table_type', 'yearly','temporary', 'entertainment', 
                            'doctoral', 'joining', 'weekly', 'course', 'cadre', 'join', 'command',
                            'hospital', 'osl', 'awl', 'dimb', 'accommodation'];
}
