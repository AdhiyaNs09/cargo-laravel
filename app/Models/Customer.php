<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'phone',
    //     'address'
    // ];
    protected $guarded = ['id'];
    use HasFactory;
}
