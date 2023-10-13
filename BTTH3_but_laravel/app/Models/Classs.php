<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Classs extends Model
{
    public $timestamps=false;
    protected $table="lop";
    use HasFactory;
    protected $fillable = [
        'tenlop',
    ];
}
