<?php

require_once('src/lib/database.php');
require_once('src/model/user.php');

function admin_searchMember()
{
    $userRepository = new UserRepository(new DatabaseConnection());
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        $members = $userRepository->searchMember($searchQuery);
    }

    require('templates/admin_searchMember.php');
}
