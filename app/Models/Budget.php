<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'total_amount',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function lines()
    {
        return $this->hasMany('App\Models\BudgetLine');
    }
}
