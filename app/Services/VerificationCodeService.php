<?php
namespace App\Services;

use App\Repositories\VerificationCodeRepository;

class VerificationCodeService
{
    /**
     * @var VerificationCodeRepository
     */
    protected $verificationCodeRepository;

    /**
     * @param VerificationCodeRepository $verificationCodeRepository
     */
    public function __construct(VerificationCodeRepository $verificationCodeRepository)
    {
        $this->verificationCodeRepository = $verificationCodeRepository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function createVerificationCode($data)
    {
        return $this->verificationCodeRepository->create($data);
    }

    /**
     * @param $userId
     * @param $code
     * @return bool
     */
    public function confirmVerificationCode($userId, $code)
    {
        $verificationCode = $this->verificationCodeRepository->findByUserIdAndCode($userId, $code);
        if ($verificationCode) {
            $this->verificationCodeRepository->delete($verificationCode);
            return true;
        }
        return false;
    }
}
