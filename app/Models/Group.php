<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
//    use SoftDeletes;
    public $timestamps = true; //set time to false
    protected $fillable = [
        'name', 'del_flag','ins_id','uod_id','del_flag'
    ];
    protected $primaryKey = 'group_id';
    protected $table = 'groups';

    public function teams(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Team');
    }
}
