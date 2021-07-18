<?php


namespace School\Validator;

use School\Dto\RegisterUserDto;

class EmailValidator implements ValidatorInterface
{
    public function validate(RegisterUserDto $dto): bool
    {
        $config = include 'config/config.php';

        if ($dto->isTeacher) {
            $regX = '/[a-zA-Z0-9]{0,}([.]?[a-zA-Z0-9]{1,})[@]('.$config['SCHOOL_PROVIDER_REGEX'].')/';
            return preg_match($regX, $dto->email);
        }

        $regX = '/[a-zA-Z0-9]{0,}([.]?[a-zA-Z0-9]{1,})[@](gmail.com|yahoo.com|'.$config['SCHOOL_PROVIDER_REGEX'].')/';
        return preg_match($regX, $dto->email);
    }
}