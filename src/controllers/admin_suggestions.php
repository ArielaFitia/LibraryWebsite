<?php

require_once('src/model/suggestion.php');

function adminSuggestions()
{

    $suggestions = getSuggestions();

    require('templates/admin_suggestions.php');
}
