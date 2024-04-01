<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'budget_id',
        'total_amount',
        'net_amount',
        'vat_amount',
        'vat',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // public function budget()
    // {
    //     return $this->hasOne('App\Models\Budget', 'id', 'budget_id');
    // }
}
