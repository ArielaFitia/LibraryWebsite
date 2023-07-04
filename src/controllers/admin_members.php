<?php

require_once('src/lib/database.php');
require_once('src/model/user.php');

function admin_members()
{
    $userRepository = new UserRepository(new DatabaseConnection());
    $members = $userRepository->getMembers();

    require('templates/admin_members.php');
}
