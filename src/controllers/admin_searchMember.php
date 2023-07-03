<?php

require_once('src/model/member.php');

function admin_searchMember()
{
    if (isset($_POST['search_query'])) {
        $searchQuery = $_POST['search_query'];
        $members = searchMember($searchQuery);
    }

    require('templates/admin_searchMember.php');
}
