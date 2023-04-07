<?php

use Model\User;
use PHPUnit\Framework\TestCase;

class SiteTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     * @runInSeparateProcess
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    public function testSignup(string $httpMethod, array $userData, string $message): void
    {
        //Выбираем занятый логин из базы данных
        if ($userData['login'] === 'login is busy') {
            $userData['login'] = User::get()->first()->login;;
        }

        // Создаем заглушку для класса Request.
        $request = $this->createMock(\Src\Request::class);
        // Переопределяем метод all() и свойство method
        $request->expects($this->any())
            ->method('all')
            ->willReturn($userData);
        $request->method = $httpMethod;

        //Сохраняем результат работы метода в переменную
        $result = (new \Controller\Site())->signup($request);

        if (!empty($result)) {
            //Проверяем варианты с ошибками валидации
            $message = '/' . preg_quote($message, '/') . '/';
            $this->expectOutputRegex($message);
            return;
        }

        //Проверяем добавился ли пользователь в базу данных
        $this->assertTrue((bool)User::where('login', $userData['login'])->count());
        //Удаляем созданного пользователя из базы данных
        User::where('login', $userData['login'])->delete();

        //Проверяем редирект при успешной регистрации
        $this->assertContains($message, xdebug_get_headers());
    }


//Метод, возвращающий набор тестовых данных
    public static function additionProvider(): array
    {
        return [
            ['POST', ['login' => '', 'password' => '', 'surname' => '', 'name' => '', 'patronymic' => '', 'sex' => '', 'date_of_birth' => '',
                'job_title_id' => '', 'specialization' => ''],
                '<h3>{"login":["Поле login пусто","Не менее 6 символов в поле login"],"password":["Поле password пусто","Не менее 6 символов в поле password"],"name":["Поле name пусто","Только русский алфавит в поле name"],"surname":["Поле surname пусто","Только русский алфавит в поле surname"],"sex":["Поле sex пусто"],"date_of_birth":["Поле date_of_birth пусто"],"job_title_id":["Поле job_title_id пусто"]}</h3>',
            ],
            ['POST', ['login' => 'login is busy', 'password' => 'АБВабв', 'surname' => 'QWE', 'name' => 'QWE', 'patronymic' => 'QWE', 'sex' => 'М', 'date_of_birth' => '2023-04-20',
                'job_title_id' => '2', 'specialization' => 'QWE'],
                '<h3>{"login":["Поле login должно быть уникально","Не менее 6 символов в поле login"],"password":["Только латиница, цифры и -_ в поле password"],"name":["Только русский алфавит в поле name"],"surname":["Только русский алфавит в поле surname"],"date_of_birth":["Дата должна быть меньше или равна сегодняшней"]}</h3>',
            ],
            ['POST', ['login' => 'dfdfhfbvfb', 'password' => 'QWEasd123', 'surname' => 'АБВабв', 'name' => 'АБВабв', 'patronymic' => 'АБВабв', 'sex' => 'М', 'date_of_birth' => '2019-12-12',
                'job_title_id' => '2', 'specialization' => 'АБВабв'],
                '<h3>Сотрудник успешно добавлен, фото тоже</h3>',
            ],
        ];
    }

    //Настройка конфигурации окружения
    protected function setUp(): void
    {
        //Установка переменной среды
        $_SERVER['DOCUMENT_ROOT'] = '/var/www/html';

       //Создаем экземпляр приложения
       $GLOBALS['app'] = new Src\Application(new Src\Settings([
           'app' => include $_SERVER['DOCUMENT_ROOT'] . '/PNSS-gr402_rosal-master/config/app.php',
           'db' => include $_SERVER['DOCUMENT_ROOT'] . '/PNSS-gr402_rosal-master/config/db.php',
           'path' => include $_SERVER['DOCUMENT_ROOT'] . '/PNSS-gr402_rosal-master/config/path.php',
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
