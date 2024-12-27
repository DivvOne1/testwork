<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VerificationCodeService;

class SettingController extends Controller
{
    /**
     * Логика разнесена по слоям.
     * Контроллер занимается только обработкой запросов и ответов
     * Сервис содержит бизнес-логику
     * Репозиторий — взаимодействие с базой данных. Этот подход улучшает структуру кода, облегчает тестирование и повторное использование
     * Очень хотел запихнуть все в один контроллер, но за это можно получить по  голове 
     * @var VerificationCodeService
     */
    protected $verificationCodeService;

    /**
     * @param VerificationCodeService $verificationCodeService
     */
    public function __construct(VerificationCodeService $verificationCodeService)
    {
        $this->verificationCodeService = $verificationCodeService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeSetting(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'new_code' => 'required|string',
            'method' => 'required|string|in:sms,email,telegram',
        ]);

        try {
            $this->verificationCodeService->createVerificationCode([
                'user_id' => $request->user_id,
                'code' => $request->new_code,
                'method' => $request->method,
            ]);

            $responseData = [
                'message' => 'Код успешно обновлён.',
                'data' => [
                    'method' => $request->method,
                    'new_code' => $request->new_code,
                ]
            ];

            return response()->json($responseData);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Ошибка при создании записи: ' . $e->getMessage()], 500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function confirmSetting(Request $request)
    {
        $request->validate([
            'setting_key' => 'required|string',
            'code' => 'required|integer|digits:6',

        ]);

        $isConfirmed = $this->verificationCodeService->confirmVerificationCode($request->user()->id, $request->code);

        if ($isConfirmed) {
            return response()->json(['message' => 'Настройка успешно изменена.']);
        }

        return response()->json(['message' => 'Неверный код подтверждения'], 400);
    }
}
