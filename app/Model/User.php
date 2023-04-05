<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'login',
        'password',
        'name',
        'surname',
        'patronymic',
        'sex',
        'date_of_birth',
        'job_title_id',
        'specialization',
        'filename'
    ];

    protected static function booted()
    {
        static::created(function ($user) {
            $user->password = md5($user->password);
            $user->save();
        });
    }

    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where(['login' => $credentials['login'],
            'password' => md5($credentials['password'])])->first();
    }
    public function is_admin(): bool
    {
        if(app()->auth::user()->job_title_id === 1){return true;}
        else {return false;}
    }
    public function is_doctor(): bool
    {
        if(app()->auth::user()->job_title_id === 2){return true;}
        else {return false;}
    }
    public function is_reg(): bool
    {
        if(app()->auth::user()->job_title_id === 3){return true;}
        else {return false;}
    }
    public function photo($img)
    {
        $imgname = md5(time()). '.'. explode('/', $img['type'])[1];
        $this->filename = $imgname;
        move_uploaded_file($img['tmp_name'], __DIR__ . '/../../public/img/' . $imgname);
    }
}
