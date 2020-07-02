<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Employer
 *
 * @property int $id
 * @property int $department_id
 * @property string $name
 * @property string $surname
 * @property string|null $middle_name
 * @property string|null $gender
 * @property int $salary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Department[] $departments
 * @property-read int|null $departments_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Employer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Employer extends Model
{
    protected $fillable = [
        'name', 'surname', 'middle_name', 'gender', 'salary'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }
}
