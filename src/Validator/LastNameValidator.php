<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class LastNameValidator implements ValidatorInterface
{
    public function validate(RegisterUserDto $dto): bool
    {
        $regX = '/\p{L}{3,25}/';
        return preg_match($regX, $dto->lastName);
    }
}