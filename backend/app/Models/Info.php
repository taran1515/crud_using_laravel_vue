<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'infos';

    protected $fillable = ['name', 'username','email'];
    use HasFactory;
}
