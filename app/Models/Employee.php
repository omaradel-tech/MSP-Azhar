<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['email','name','address','status','Marital_status'];
    protected $table ='employees';
    protected $hidden=[];
}
