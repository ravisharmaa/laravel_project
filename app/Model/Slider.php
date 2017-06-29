<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';

    protected $fillable = [
            'id',
            'slider_image',
            'slider_text',
            'order',
            'status'
    ];


    public function scopeStatus($query)
    {
        return $query->where('status',true);
    }
}
