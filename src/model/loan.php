<?php

require_once('src/lib/database.php');

class Loan
{
    public string $id;
    public string $loan_date;
    public string $return_date;
    public string $loan_status;
    public string $user_id;
    public string $book_id;
}

class LoanRepository
{
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function createLoan(string $userId, string $bookId): void
    {
        $loanDate = date('Y-m-d');
        $returnDate = date('Y-m-d', strtotime('+14 days'));
        $status = 'En attente';

        $statement = $this->connection->getConnection()->prepare("INSERT INTO loan (loan_date, return_date, loan_status, user_id, book_id) VALUES (:loan_date, :return_date, :loan_status, :user_id, :book_id)");
        $statement->execute([
            'loan_date' => $loanDate,
            'return_date' => $returnDate,
            'loan_status' => $status,
            'user_id' => $userId,
            'book_id' => $bookId
        ]);
    }

    public function getLoans(): array
    {
        $query = "SELECT loan.id, loan.loan_date, loan.return_date, loan.loan_status, book.title AS book_title, user.fullname AS user_name
              FROM loan
              INNER JOIN book ON loan.book_id = book.id
              INNER JOIN user ON loan.user_id = user.id";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute();
        $loans = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $loans;
    }

    public function getLoan(string $memberId): array
    {
        $statement = $this->connection->getConnection()->prepare("SELECT loan.*, book.title AS book_title
                              FROM loan
                              INNER JOIN book ON loan.book_id = book.id
                              WHERE loan.user_id = :memberId");
        $statement->bindParam(':memberId', $memberId);
        $statement->execute();
        $loans = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $loans;
    }

    public function updateLoan(string $loanId, string $loanDate, string $returnDate, string $loanStatus): void
    {
        $query = "UPDATE loan SET loan_date = :loanDate, return_date = :returnDate, loan_status = :loanStatus WHERE id = :loanId";
        $statement = $this->connection->getConnection()->prepare($query);
        $statement->execute(['loanDate' => $loanDate, 'returnDate' => $returnDate, 'loanStatus' => $loanStatus, 'loanId' => $loanId]);
    }

    public function deleteLoan(string $loanId): void
    {
        $statement = $this->connection->getConnection()->prepare('DELETE FROM loan WHERE id = :loanId');
        $statement->execute(['loanId' => $loanId]);
    }
}
