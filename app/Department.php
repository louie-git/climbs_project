<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    public $primaryKey = 'department_id';
    public function user(){
        return $this->belongsToMany(User::class,'department_user','department_id','user_id');
    }
}
