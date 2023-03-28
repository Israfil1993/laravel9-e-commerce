<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    use HasFactory, Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $guarded = [ ];

    protected $appends = ['parent'];

    public function parent()

    {

        return $this->belongsTo(Category::class,'parent_id');

    }

    public function children()
    {

        return $this->hasMany(Category::class, 'parent_id');
    }


    public function parentCategory():HasOne
    {
        return $this->hasOne(Category::class, "id", "parent_id");
    }



    public function products()
    {

        return $this->hasMany(Product::class);
    }


}
