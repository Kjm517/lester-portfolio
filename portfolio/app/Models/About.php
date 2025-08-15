<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'skills'
    ];

    // Convert skills from comma-separated string to array
    public function getSkillsAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    // Convert skills array to comma-separated string for storage
    public function setSkillsAttribute($value)
    {
        $this->attributes['skills'] = is_array($value) ? implode(',', $value) : $value;
    }
}