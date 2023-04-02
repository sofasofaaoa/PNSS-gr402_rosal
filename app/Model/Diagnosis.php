<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Diagnosis extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title'
    ];

    public function findIdentity(int $id)
    {
        // TODO: Implement findIdentity() method.
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
