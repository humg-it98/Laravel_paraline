<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestamps = true; //set time to false
    protected $fillable = [
        'team_id','name', 'group_id', 'del_flag'
    ];
    protected $primaryKey = 'team_id';
    protected $table = 'teams';

    public function employees(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Model\Employee');
    }
    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Group','group_id');
    }

}
