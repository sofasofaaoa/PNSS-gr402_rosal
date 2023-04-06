<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Cabinet extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title'
    ];
    public function getreceptions(){
        return $this->hasMany(Reception::class, 'id');
    }
}
