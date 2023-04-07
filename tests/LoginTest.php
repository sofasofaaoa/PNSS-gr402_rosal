<?php
use PHPUnit\Framework\TestCase;
use Controller\Site;
use Src\Application;
use Src\Request;
use Model\User;
use Src\Settings;


class LoginTest extends TestCase
{
    /**
     * @dataProvider additionProviderLogin
     */

    public function testLogin(string $httpMethod, array $userData, string $message): void
    {
        $auth = new Site();
        $auth->logout();
        //Выбираем занятый логин из базы данных

        // Создаем заглушку для класса Request.
        $request = $this->createMock(Request::class);
        // Переопределяем метод all() и свойство method
        $request->expects($this->any())
            ->method('all')
            ->willReturn($userData);
        $request->method = $httpMethod;

        //Сохраняем результат работы метода в переменную
        $result = $auth->login($request);

        if (!$userData['login'] && !$userData['password']) {
            $message = '/' . preg_quote($message, '/') . '/';
            $this->expectOutputRegex($message);
            return;
        }

        $this->assertTrue((bool)app()->auth::user()->login);
        $this->assertContains($message, xdebug_get_headers());
        $auth->logout();
    }



    public static function additionProviderLogin(): array
    {
        return [
            ['POST', ['login' => 'admin', 'password' => 'admin'],
                'Location: /PNSS-gr402_rosal-master/hello'
            ],
            ['POST', ['username' => '', 'password' => ''],
                '<h3>Неправильные логин или пароль</h3>'
            ],
        ];
    }

    protected function setUp(): void
    {
        //Установка переменной среды
        $_SERVER['DOCUMENT_ROOT'] = 'C:\xampp\htdocs';
        //Создаем экземпляр приложения
        $GLOBALS['app'] = new Application(new Settings([
            'app' => include $_SERVER['DOCUMENT_ROOT'] . '\PNSS-gr402_rosa\config\app.php',
            'db' => include $_SERVER['DOCUMENT_ROOT'] . '\PNSS-gr402_rosa\config\db.php',
            'path' => include $_SERVER['DOCUMENT_ROOT'] . '\PNSS-gr402_rosa\config\path.php',
        ]));

        //Глобальная функция для доступа к объекту приложения
        if (!function_exists('app')) {
            function app()
            {
                return $GLOBALS['app'];
            }
        }

    }
}