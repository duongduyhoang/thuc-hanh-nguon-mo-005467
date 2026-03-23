<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'category_id',
        'image',

    ];

    /**
     * Thiết lập mối quan hệ: Một sản phẩm thuộc về một danh mục
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
