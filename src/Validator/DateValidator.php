<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class DateValidator implements ValidatorInterface
{
    public function validate(RegisterUserDto $dto): bool
    {
        $config = include 'config/config.php';

        $startDate = new \DateTime($dto->startDate);
        $entryDate = new \DateTime($dto->entryDate);

        $interval= date_diff($startDate, $entryDate);

        return $interval->days > $config['DATE_DIFFERENCE_IN_DAYS'];
    }
}