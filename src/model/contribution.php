<?php

require_once('src/lib/database.php');

class Contribution
{
    public string $id;
    public string $payment_date;
    public string $expiration_date;
    public string $payment_option;
    public string $user_id;
}

class ContributionRepository
{
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function getContribution(string $userId): array
    {
        $statement = $this->connection->getConnection()->prepare("SELECT * FROM contribution WHERE user_id = :userId");
        $statement->bindParam(':userId', $userId);
        $statement->execute();
        $contribution = $statement->fetch(PDO::FETCH_ASSOC);
        return $contribution;
    }
}
