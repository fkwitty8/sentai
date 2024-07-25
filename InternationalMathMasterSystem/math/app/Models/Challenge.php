<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'number_of_questions',
        'start_date',
        'end_date',
        'duration',
    ];
}
