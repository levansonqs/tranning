<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ["*"];
    public $timestamps = true;

    public function orderDetail() {
        return $this->belongTo('App\Model\OrderDetail');
    }
    public function category() {
        return $this->hasMany('App\Model\Category', 'cate_id');
    } 	
    public function user() {
        return $this->belongTo('App\Model\User');
    }

    public function getItems(){
        return $this->orderBy('id','DESC')->get();
    }
    public function addItem($request){
        $this->name = $request->name;
        $this->price = $request->price;
        $this->description = $request->description;
        $this->discount = $request->discount;
        $this->total = $request->total;
        $this->user_id = 1;
        $this->cate_id = $request->cate_id;
        $this->images = $request->fileName;
        $this->status = 1;
        return $this->save();
    }
    public function getItem($id){    
        return $this->findOrFail($id);
    }

    public function editItem($request,$id){
        $objProject = $this->find($id);
        $objProject->name = $request->name;
        $objProject->link = $request->link;
        $objProject->preview_text = $request->preview_text;
        $objProject->pcat_id = $request->pcat_id;
        if(!empty($request->file('picture'))){
            $objProject->picture = $request->picture;
        }
        return $objProject->save();
    }

    public function del($id)
    {
        $objItem = $this->findOrFail($id);
        return $objItem->delete();
    }


}
