<?php
require __DIR__ . '/vendor/autoload.php';
use School\Dto\RegisterUserDto;
use School\Repository\UserRepository;
use School\Service\RegisterUser;
use School\Validator\ValidatorCollection;

//Construct the dto
//Instantiate all needed validators based on configuration
//Instantiate the repo
//Instantiate the register user service and call it
//Send back the error/succes response in JSON format

$configuration = require __DIR__ . '/config/config.php';

$userRegister = RegisterUserDto::createFromGlobals();

$validator = new ValidatorCollection();
$repository = new UserRepository();

$registerUser = new RegisterUser($validator, $repository);
$result = $registerUser->registerUser($userRegister);


try {
    echo json_encode($result, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo 'Json exception: '.$e->getMessage();
}

/**
 * Response example:
 */
//  User saved{
//        "FirstNameValidator": true,
//        "LastNameValidator": true,
//        "PasswordValidator": true,
//        "ConfirmPasswordValidator": true,
//        "SchoolIdentifierValidator": true,
//        "EmailValidator": true,
//        "DateValidator": true
//   }