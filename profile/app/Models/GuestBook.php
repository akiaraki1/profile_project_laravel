<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestBook extends Model
{
    protected $table = 'guest_book';
    protected $guarded = false; // позволяет менять таблицу
    public $timestamps = false;
}
