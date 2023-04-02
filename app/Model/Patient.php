<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Patient extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'date_of_birth'
    ];
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    public function getId(): int
    {
        // TODO: Implement getId() method.
    }

    public function attemptIdentity(array $credentials)
    {
        // TODO: Implement attemptIdentity() method.
    }
}
