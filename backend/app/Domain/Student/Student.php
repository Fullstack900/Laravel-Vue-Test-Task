<?php
namespace App\Domain\Student;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['username', 'email'];
}
