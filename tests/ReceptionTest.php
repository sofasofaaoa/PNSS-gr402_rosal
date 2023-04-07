<?php
use PHPUnit\Framework\TestCase;
use Controller\Site;
use Src\Application;
use Src\Request;
use Model\Reception;
use Src\Settings;


class ReceptionTest extends TestCase
{
    /**
     * @dataProvider additionProviderLogin
     */

    public function testNewReception(string $httpMethod, array $receptionData, string $message): void
    {
        $reception = new Reception();

        // Создаем заглушку для класса Request.
        $request = $this->createMock(Request::class);
        // Переопределяем метод all() и свойство method
        $request->expects($this->any())
            ->method('all')
            ->willReturn($receptionData);
        $request->method = $httpMethod;

        //Сохраняем результат работы метода в переменную
        $result = Reception::create($request);

        if (!empty($result)) {
            $message = '/' . preg_quote($message, '/') . '/';
            $this->expectOutputRegex($message);
            return;
        }

        $this->assertTrue((bool)Reception::where('reception_id', $receptionData['reception_id'])->count());
        Reception::where('reception_id', $receptionData['reception_id'])->delete();
    }


    public static function additionProviderLogin(): array
    {
        return [
            ['POST', ['patient_id' => '9', 'id' => '69', 'cabinet_id' => '8', 'date' => '2023-10-02', 'time' => '00:00:00', 'diagnosis' => ''],
                '<h3>Запись добавлена</h3>'
            ],
            ['POST', ['patient_id' => '', 'id' => '', 'cabinet_id' => '', 'date' => '2023-01-02', 'time' => '00:00:00', 'diagnosis' => ''],
                '<h3>{"patient_id":["Поле patient_id пусто"],"id":["Поле id пусто"],"date":["Поле date пусто","Дата должна быть больше или равна сегодняшней"],"time":["Поле time пусто"]}</h3>'
            ],
        ];
    }

    protected function setUp(): void
    {
        //Установка переменной среды
        $_SERVER['DOCUMENT_ROOT'] = '/var/www/html';
        //Создаем экземпляр приложения
        $GLOBALS['app'] = new Application(new Settings([
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
