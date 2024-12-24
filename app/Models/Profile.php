<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'first_name', 'middle_name', 'last_name', 'email',
        'phone_number', 'dob', 'age', 'gender', 'caste', 'district',
        'state', 'family_income', 'course_level', 'course_name',
        'total_marks', 'obtain_marks', 'percentage', 'passing_year','profile_pic',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

