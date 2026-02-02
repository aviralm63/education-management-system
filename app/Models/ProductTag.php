<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductTag extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'product_tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'categories_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subCategoriesProducts()
    {
        return $this->hasMany(Product::class, 'sub_categories_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(ProductCategory::class, 'categories_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
