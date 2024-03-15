<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'school_year'];

    /**
     * Get all of the grades for the Subject
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function averageGrade()
    {
        if ($this->grades->isEmpty()) {
            return 'This subject has no grades yet.';
        } else {
            $average = $this->grades->avg('grade');
            $roundedAverage = round($average, 2);
            return $roundedAverage;
        }
    }
}
