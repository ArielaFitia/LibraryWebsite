<?php

require_once('src/lib/database.php');

class Book
{
    public string $id;
    public string $title;
    public string $author;
    public string $synopsis;
    public string $availability;
    public string $cover_image;
}

class BookRepository
{
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function getBooks(): array
    {
        $statement = $this->connection->getConnection()->query("SELECT * FROM book ORDER BY id DESC LIMIT 3");
        $books = [];

        while (($row = $statement->fetch())) {
            $book = new Book();
            $book->id = $row['id'];
            $book->title = $row['title'];
            $book->author = $row['author'];
            $book->synopsis = $row['synopsis'];
            $book->availability = $row['availability'];
            $book->cover_image = $row['cover_image'];

            $books[] = $book;
        }

        return $books;
    }

    public function getAllBooks(): array
    {
        $statement = $this->connection->getConnection()->query("SELECT * FROM book");
        $books = [];

        while (($row = $statement->fetch())) {
            $book = new Book();
            $book->id = $row['id'];
            $book->title = $row['title'];
            $book->author = $row['author'];
            $book->synopsis = $row['synopsis'];
            $book->availability = $row['availability'];
            $book->cover_image = $row['cover_image'];

            $books[] = $book;
        }

        return $books;
    }

    public function searchBook(string $searchQuery): array
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM book WHERE LOWER(title) LIKE LOWER(:query) OR LOWER(author) LIKE LOWER(:query)");
        $searchParam = "%$searchQuery%";
        $statement->bindParam(':query', $searchParam);
        $statement->execute();
        $books = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $books;
    }

    public function updateBook(string $bookId, string $title, string $author, string $synopsis, string $availability): void
    {
        $statement = $this->connection->getConnection()->prepare("UPDATE book SET title = :title, author = :author, synopsis = :synopsis, availability = :availability WHERE id = :bookId");
        $statement->bindParam(':title', $title);
        $statement->bindParam(':author', $author);
        $statement->bindParam(':synopsis', $synopsis);
        $statement->bindParam(':availability', $availability);
        $statement->bindParam(':bookId', $bookId);
        $statement->execute();
    }

    public function addBook(string $title, string $author, string $synopsis, string $availability, array $coverImage): void
    {
        // Préparation de la requête SQL pour l'insertion du livre
        $statement = $this->connection->getConnection()->prepare('INSERT INTO book (title, author, synopsis, availability, cover_image) VALUES (?, ?, ?, ?, ?)');

        // Déplacement et stockage de l'image de couverture dans un dossier spécifique
        $coverImageName = $this->moveUploadedCoverImage($coverImage);

        // Exécution de la requête avec les valeurs fournies
        $statement->execute([$title, $author, $synopsis, $availability, $coverImageName]);
    }

    private function moveUploadedCoverImage(array $coverImage): string
    {
        $uploadDirectory = 'cover_images/';
        $coverImageName = $this->generateUniqueFileName($coverImage['name']);
        $targetPath = $uploadDirectory . $coverImageName;

        // Déplacement du fichier temporaire vers l'emplacement final
        move_uploaded_file($coverImage['tmp_name'], $targetPath);

        return $coverImageName;
    }

    private function generateUniqueFileName(string $originalFileName): string
    {
        $uniqueName = uniqid() . '_' . $originalFileName;
        return $uniqueName;
    }
}
