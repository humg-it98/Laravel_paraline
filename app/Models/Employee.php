<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Node\Attribute;

class Employee extends Model
{
//    use SoftDeletes;
    public $timestamps = true; //set time to false
    protected $fillable = [
        'email', 'avatar', 'image_path','team_id', 'first_name','last_name','gender','birth_day','address','salary','position_id','type_work','ins_id','upd_id','status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'employee';
    protected $appends = ['full_name'];
    /**
     * @var mixed
     */
    private $first_name;
    private $last_name;
    /**
     * @var mixed
     */
    private $attribute;

    public function getFullNameAttribute(): string
    {
        return $this->attribute['fist_name ']. ' ' . $this->attribute['last_name'];
    }

    public function team(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Team','team_id');
    }
}
