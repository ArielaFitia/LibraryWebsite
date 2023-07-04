<?php

require_once('src/lib/database.php');
require_once('src/model/user.php');

function registerAdmin()
{
    $userRepository = new UserRepository(new DatabaseConnection());
    $userRepository->addAdmin();

    require('templates/admin_registerAdmin.php');
}
