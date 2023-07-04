<?php

require_once('src/lib/database.php');

class Suggestion
{
    public string $id;
    public string $message;
    public string $user_id;
    public string $book_id;
}

class SuggestionRepository
{
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function createSuggestion(string $message, string $userId, string $bookId): void
    {
        $statement = $this->connection->getConnection()->prepare("INSERT INTO suggestion (message, user_id, book_id) VALUES (:message, :user_id, :book_id)");
        $statement->execute(['message' => $message, 'user_id' => $userId, 'book_id' => $bookId]);
    }

    public function getSuggestions(): array
    {
        $query = "SELECT suggestion.id, suggestion.message, user.fullname, book.title
                  FROM suggestion
                  INNER JOIN user ON suggestion.user_id = user.id
                  INNER JOIN book ON suggestion.book_id = book.id";

        $statement = $this->connection->getConnection()->query($query);
        $suggestions = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $suggestions;
    }

    public function deleteSuggestion(string $suggestionId): void
    {
        $query = "DELETE FROM suggestion WHERE id = ?";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute([$suggestionId]);
    }
}
