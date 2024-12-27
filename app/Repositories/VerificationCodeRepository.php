<?php

namespace App\Repositories;

use App\Models\VerificationCode;

class VerificationCodeRepository
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return VerificationCode::create($data);
    }

    /**
     * @param $userId
     * @param $code
     * @return mixed
     */
    public function findByUserIdAndCode($userId, $code)
    {
        return VerificationCode::where('user_id', $userId)
            ->where('code', $code)
            ->first();
    }

    /**
     * @param $verificationCode
     * @return mixed
     */
    public function delete($verificationCode)
    {
        return $verificationCode->delete();
    }
}
