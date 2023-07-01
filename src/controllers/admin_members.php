<?php

require_once('src/model/member.php');

function admin_members()
{

    $members = getMembers();

    require('templates/admin_members.php');
}
