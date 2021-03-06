<?php

namespace School\Service;

use School\Validator\ConfirmPasswordValidator;
use School\Validator\DateValidator;
use School\Validator\EmailValidator;
use School\Validator\FirstNameValidator;
use School\Validator\LastNameValidator;
use School\Validator\PasswordValidator;
use School\Validator\SchoolIdentifierValidator;
use School\Validator\ValidatorCollection;
use School\Dto\RegisterUserDto;
use School\Repository\UserRepository;

class RegisterUser
{
    private ValidatorCollection $validators;
    private UserRepository $userRepository;
    private array $validationsPassed = [];

    public function __construct(
        ValidatorCollection $validators,
        UserRepository $userRepository
    ) {
        $this->validators = $validators;
        $this->userRepository = $userRepository;
    }

    /**
     * Returns a success array or an error message array. Also saves in the database.
     */
    public function registerUser(RegisterUserDto $dto): array
    {
        $validationPassed = true;

        $this->validators->addValidator(new FirstNameValidator());
        $this->validators->addValidator(new LastNameValidator());
        $this->validators->addValidator(new PasswordValidator());
        $this->validators->addValidator(new ConfirmPasswordValidator());
        $this->validators->addValidator(new SchoolIdentifierValidator());
        $this->validators->addValidator(new EmailValidator());
        $this->validators->addValidator(new DateValidator());

        foreach ($this->validators as $validator){
            $validatorName = substr(get_class($validator), 17);
            $this->validationsPassed[$validatorName] = $validator->validate($dto);
        }

        foreach ($this->validationsPassed as $validation){
            //Check if all validations passed
            if($validation === false){
                $validationPassed = false;
            }
        }

        if($validationPassed === true){
            $this->userRepository->save($dto);
        }

        return $this->validationsPassed;
    }
}