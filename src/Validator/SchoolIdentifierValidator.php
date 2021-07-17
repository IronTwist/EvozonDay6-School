<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class SchoolIdentifierValidator implements ValidatorInterface
{
    public string $name = 'SchoolIdentifierValidator';

    public function validate(RegisterUserDto $dto): bool
    {
        if($dto->isTeacher) {
            $regx = '/^(TEACH|TEACHER|TEA)-(\d{4})-[a-z0-9]{1,3}$/';

            return preg_match($regx, $dto->schoolIdentifier);
        }

        $regx = '/^(ST|STUD|STUDENT)-(\d{4})-[a-z0-9]{2,6}$/';

        return preg_match($regx, $dto->schoolIdentifier);
    }
}