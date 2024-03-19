<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id',
    ];
    
    protected $hidden = [
        'deleted_at',
    ];

    protected $appends = [
        'image_formated',
     ];
  

    public function getImageFormatedAttribute()
    {
        return $this->getShowfile('image');
    }

    public function getShowfile($name)
    {
        if ($this->attributes[$name]) {
            return globalShowFile($this->attributes[$name]);
        }
    }
}
