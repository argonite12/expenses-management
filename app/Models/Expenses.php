<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expenses extends Model
{
    use HasFactory, Softdeletes;

    protected $table = 'expenses';

     protected $fillable = [
         'user_id',
         'category_id',
         'amount',
         'date_entry'
    ];

}
