<?php

require_once('src/lib/database.php');
require_once('src/model/suggestion.php');

function adminSuggestions()
{
    $suggestionRepository = new SuggestionRepository(new DatabaseConnection());
    $suggestions = $suggestionRepository->getSuggestions();

    require('templates/admin_suggestions.php');
}
