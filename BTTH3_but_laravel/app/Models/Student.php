<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    public $timestamps=false;
    protected $table="sinhvien";
    use HasFactory;
    protected $fillable=[
        "tensinhvien",
        "email",
        "ngaysinh",
        "idlop",
    ];
}
