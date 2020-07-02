<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Department
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Department query()
 * @mixin \Eloquent
 */
class Department extends Model
{
    protected $fillable = ['name'];
}
