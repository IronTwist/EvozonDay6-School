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


echo json_encode($result);