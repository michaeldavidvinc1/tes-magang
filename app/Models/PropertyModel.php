<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyModel extends Model
{
    protected $table = 'property';
    protected $fillable = ['name', 'image', 'price'];
    use HasFactory;
}
