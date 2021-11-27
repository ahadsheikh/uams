<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParadeState extends Model
{
    use HasFactory;
    protected $fillable = ['company', 'date', 'table_type', 'officer', 'master_warent_officer', 
                            'senior_warent_officer', 'warent_officer', 'sergent', 'corporal', 
                            'lance_corporal', 'soldier', 'clerk', 'cook_u', 'cook_mess', 
                            'trademan', 'nc_e', 'nc_u', 'songjukto', 'rt'];
}
