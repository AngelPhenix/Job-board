<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {
    use HasFactory;

    protected $table = "job_listings";

    // protected $guarded = []; TO DISABLE NOT NULL CONSTRAINT, DELETE $fillable AND ADD EMPTY ARRAY TO $guarded
    protected $fillable = ['title', 'salary', 'description', 'location', 'employment_type', 'employer_id'];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey:'job_listings_id');
    }

    public function getFormattedSalaryAttribute(): string
    {
        $value = trim(str_replace('€', '', $this->salary));

        return $value === '' ? '' : $value . ' €';
    }
}