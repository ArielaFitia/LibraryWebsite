<?php

require_once('src/lib/database.php');
require_once('src/model/user.php');

function registerMember()
{
    $userRepository = new UserRepository(new DatabaseConnection());
    $userRepository->addMember();

    require('templates/admin_registerMember.php');
}
