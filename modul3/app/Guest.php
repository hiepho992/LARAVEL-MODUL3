<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    protected $guarded = [];

    use SoftDeletes;
    protected $fillable = [
        'name',
        'email'
    ];
    protected $data = ['delete_at'];
}
