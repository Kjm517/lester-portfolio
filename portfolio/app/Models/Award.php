<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use HasFactory;

    protected $fillable = [
        'award_name',
        'company',
        'expiration',
        'cert_link',
        'photo'
    ];

    protected $casts = [
        'expiration' => 'date'
    ];

    // Get full photo URL
    public function getPhotoUrlAttribute()
    {
        return $this->photo ? asset('storage/' . $this->photo) : null;
    }
}