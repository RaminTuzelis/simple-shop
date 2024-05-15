<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products_with_logo';
    protected $fillable = [
        'paper_cups',
        'paper_bags_no_handle',
        'paper_bags',
        'plastic_cups',
        'transparent_cups',
        'reusable_cups',
        'pizza_box',
        'other',
        'comment',
        'contact',
        'company_name',
        'phone',
        'email',
        'terms'
    ];
}
