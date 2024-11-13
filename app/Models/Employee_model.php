<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee_model extends Model
{
    use HasFactory;
     // Specify the table name
    protected $table = 'employees';

     // Define table fields
     protected $fillable = [
         'name',
         'email',
         'password',
         'phone'
     ];
 
     // If you don't want to use timestamps, you can disable them
     public $timestamps = false;
}
