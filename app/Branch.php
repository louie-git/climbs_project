<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    public $primaryKey = 'branch_id';
    public function user(){
        return $this->belongsToMany(User::class,'branch_user','branch_id','user_id');
    }
}
