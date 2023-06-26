<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table="languages";

    protected $fillable =['name','abbr','local','direction','active','created_at','updated_at'];

    protected $hidden = ['password','remember_token',];

    public function scopeActive($query){
        return $query->where('active',1);
    }

    public function scopeSelection($query){
        return $query->select('id','abbr','name','direction','active');
    }

    // public function getActiveAttribute($val){
    //     return $val==1?'On':'Off';
    // }
    //we can do this to show ative value 1 or 0

    public function getActive(){
        return $this->active ==1 ?'On':'Off';
    }

}
