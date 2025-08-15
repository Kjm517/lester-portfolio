<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
        'company',
        'start_month',
        'start_year',
        'end_month',
        'end_year'
    ];

    // Accessor to get formatted date range
    public function getDateRangeAttribute()
    {
        $months = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug',
            9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
        ];

        $start = $months[$this->start_month] . ' ' . $this->start_year;
        $end = $this->end_month ? $months[$this->end_month] . ' ' . $this->end_year : 'Present';

        return $start . ' - ' . $end;
    }
}