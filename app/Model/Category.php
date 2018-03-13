<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    // protected $fillable = ['name', 'description'];
    protected $fillable = ["*"];
    public $timestamps = false;

    public function users() {
        return $this->belongTo('App\Model\users');
    }
    public function product() {
        return $this->hasMany('App\Model\Product', 'cate_id');
    }

    public function getItems(){
        return $this->all();
    }
    public function getParent(){
        return $this->where('parent_id','=',0)->get();
    }

    public function addItem($request){
        $this->name = $request->name;
        $this->parent_id = $request->parent_id;
        $this->description= $request->description;
        return $this->save();
    }

    public function getItem($id){
        return $this->find($id);

    }
    public function editItem($id,$request){
        $objItem = $this->find($id);
        $objItem->name = $request->name;
        $objItem->parent_id = $request->parent_id;
        $objItem->description = $request->description;
        return $this->save();
    }

    public function delItem($id){
        $objItem = $this->findOrFail($id);
        return $objItem->delete();
    }
}
