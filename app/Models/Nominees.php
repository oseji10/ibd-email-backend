<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominees extends Model
{
    use HasFactory;
    public $table = 'nominees';
    protected $fillable = ['title', 'induction_id', 'first_name', 'othernames', 'email', 'phone_number', 'address', 'nominated_by', 'nomination_date', 'accepted_date', 'inducted_date', 'status'];
}
