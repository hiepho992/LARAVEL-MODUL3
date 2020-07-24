<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manager extends Model
{
    public $guarded = [];

    use SoftDeletes;
    protected $fillable = [
        'name',
        'phone',
        'email'
    ];
    protected $dates = ['deleted_at'];
}
