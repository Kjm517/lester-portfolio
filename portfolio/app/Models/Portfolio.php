<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_name',
        'project_description', 
        'programming_language',
        'link',
        'project_image'
    ];

    // Convert programming languages to array
    public function getProgrammingLanguageAttribute($value)
    {
        return $value ? explode(',', $value) : [];
    }

    // Convert programming languages array to string
    public function setProgrammingLanguageAttribute($value)
    {
        $this->attributes['programming_language'] = is_array($value) ? implode(',', $value) : $value;
    }

    // Get full image URL
    public function getImageUrlAttribute()
    {
        return $this->project_image ? asset('storage/' . $this->project_image) : null;
    }
}