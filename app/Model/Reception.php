<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Reception extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'patient_id',
        'id',
        'cabinet_id',
        'date',
        'time',
        'diagnosis_id'
    ];
    public function getpatients(){
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }

    public function getdoctors(){
        return $this->belongsTo(User::class, 'id', 'id');
    }
    public function getcabinets(){
        return $this->belongsTo(Cabinet::class, 'cabinet_id', 'cabinet_id');
    }
    public function getdiagnoses(){
        return $this->belongsTo(Diagnosis::class, 'diagnosis_id', 'diagnosis_id');
    }
}
