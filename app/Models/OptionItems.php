<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionItems extends Model
{
    use HasFactory;

    protected $table = 'option_items';
    protected $guarded = [''];
}
