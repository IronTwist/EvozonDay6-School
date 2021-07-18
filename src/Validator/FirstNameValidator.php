<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class FirstNameValidator implements ValidatorInterface
{
    public function validate(RegisterUserDto $dto): bool
    {
        $regX = '/\p{L}{3,25}/';
        return preg_match($regX, $dto->firstName);
    }
}