<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'products';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'description',
        'categories_id',
        'sub_categories_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categories()
    {
        return $this->belongsTo(ProductCategory::class, 'categories_id');
    }

    public function sub_categories()
    {
        return $this->belongsTo(ProductTag::class, 'sub_categories_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
