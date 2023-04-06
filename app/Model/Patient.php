<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Patient extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'date_of_birth'
    ];

    public function getreceptions(){
        return $this->hasMany(Reception::class, 'patient_id', 'patient_id');
    }
}
