<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButtonClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_name',
        'selected_date',
        'hall',
        'purpose',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
