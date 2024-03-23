<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'descriptionlong',
        'category_id',
        'price',
        'Estado'
        
    ];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }


}
