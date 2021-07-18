<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class ConfirmPassword implements ValidatorInterface
{

    public function validate(RegisterUserDto $dto): bool
    {
        $config = include 'config/config.php';

        if($config['PASSWORD_STRENGTH'] === 'WEAK'){
            $regX = '/^.{6,}$/';
            return preg_match($regX, $dto->password);
        }

        if($config['PASSWORD_STRENGTH'] === 'MEDIUM'){
            $regX = '/^(?=.*[A-Z]).{8,}$/';
            return preg_match($regX, $dto->password);
        }

        if($config['PASSWORD_STRENGTH'] === 'STRONG'){
            $regX = '/^(?=.*\W).(?=.*[0-9])(?=.*[A-Z]).{8,}$/';
            return preg_match($regX, $dto->password);
        }

        if($config['PASSWORD_STRENGTH'] === 'RIDICULOUS'){
            $regX = '/^(?=.*'.$dto->firstName.')(?=.*\W).(?=.*[0-9])(?=.*[A-Z]).{8,}$/';
            return preg_match($regX, $dto->password);
        }

        return false;
    }
}