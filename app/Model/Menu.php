<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable= ['id','name','url','order','parent_id'];



    public function children()
    {
        return $this->hasMany('App\Model\Menu','parent_id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function scopeParent()
    {
        return $this->where('parent_id',null);
    }

    public function scopeStatus()
    {
        return $this->where('status',true);
    }
}
