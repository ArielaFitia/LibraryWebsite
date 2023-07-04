<?php

require_once('src/lib/database.php');
require_once('src/model/user.php');

function logged()
{
    $userRepository = new UserRepository(new DatabaseConnection());
    $userRepository->login();

    require('templates/login.php');
}
