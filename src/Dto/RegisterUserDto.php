<?php
namespace School\Dto;

class RegisterUserDto
{
    public string $schoolIdentifier;
    public string $email;
    public string $firstName;
    public string $lastName;
    public string $confirmPassword;
    public string $password;
    public string $entryDate;
    public string $startDate;
    public bool  $isTeacher;

    public function __construct()
    {

    }

    public static function createFromGlobals(): RegisterUserDto
    {
        //implement the creation from globals

        $dto = new self();

        $dto->schoolIdentifier = $_POST['school_identifier'];
        $dto->email = $_POST['email'];
        $dto->firstName = $_POST['firstName'];
        $dto->lastName = $_POST['lastName'];
        $dto->confirmPassword = $_POST['confirmPassword'];
        $dto->password = $_POST['password'];
        $dto->entryDate = $_POST['entryDate'];
        $dto->startDate = $_POST['startDate'];
        $dto->isTeacher = $_POST['is_teacher'];

        return $dto;
    }

}
