<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Job_title extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title'
    ];
    public function getusers(){
        return $this->hasMany(User::class, 'job_title_id');
    }
}
