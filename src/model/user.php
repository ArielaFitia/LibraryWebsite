<?php

require_once('src/lib/database.php');

class User
{
    public string $id;
    public string $fullname;
    public string $password;
    public string $email;
    public string $status;
}

class UserRepository
{
    private DatabaseConnection $connection;

    public function __construct(DatabaseConnection $connection)
    {
        $this->connection = $connection;
    }

    public function getMembers(): array
    {
        $statement = $this->connection->getConnection()->prepare("SELECT u.id, u.fullname, u.email, c.payment_date, c.expiration_date, c.payment_option FROM `user` AS u LEFT JOIN contribution AS c ON u.id = c.user_id WHERE u.status = 'membre'");
        $statement->execute();

        $members = [];
        while (($row = $statement->fetch())) {
            $member = [
                'id' => $row['id'],
                'fullname' => $row['fullname'],
                'email' => $row['email'],
                'payment_date' => $row['payment_date'],
                'expiration_date' => $row['expiration_date'],
                'payment_option' => $row['payment_option']
            ];
            $members[] = $member;
        }
        return $members;
    }

    public function deleteMember(string $memberId): void
    {
        $statement = $this->connection->getConnection()->prepare("DELETE FROM `user` WHERE id = :memberId");
        $statement->bindValue(':memberId', $memberId, PDO::PARAM_INT);
        $statement->execute();
    }

    public function searchMember(string $searchQuery): array
    {
        $searchParam = "%$searchQuery%";
        $statement = $this->connection->getConnection()->prepare("SELECT u.*, c.payment_date, c.expiration_date, c.payment_option 
                              FROM user u 
                              LEFT JOIN contribution c ON u.id = c.user_id
                              WHERE u.id LIKE :query AND u.status = 'membre'");
        $statement->bindParam(':query', $searchParam);
        $statement->execute();
        $members = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $members;
    }

    public function updateMember(string $memberId, string $newPassword, string $paymentDate, string $expirationDate, string $paymentOption): void
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $statement = $this->connection->getConnection()->prepare("UPDATE `user` SET password = :password WHERE id = :memberId");
        $statement->bindParam(':password', $hashedPassword);
        $statement->bindParam(':memberId', $memberId);
        $statement->execute();

        $statement = $this->connection->getConnection()->prepare("UPDATE contribution SET payment_date = :paymentDate, expiration_date = :expirationDate, payment_option = :paymentOption WHERE user_id = :memberId");
        $statement->bindParam(':paymentDate', $paymentDate);
        $statement->bindParam(':expirationDate', $expirationDate);
        $statement->bindParam(':paymentOption', $paymentOption);
        $statement->bindParam(':memberId', $memberId);
        $statement->execute();
    }

    public function addMember(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $payment_date = $_POST['payment_date'];
            $expiration_date = $_POST['expiration_date'];
            $payment_option = $_POST['payment_option'];

            $statement = $this->connection->getConnection()->prepare('INSERT INTO user (fullname, email, password, status) VALUES (?, ?, ?, ?)');
            $statement->execute([$fullname, $email, $hashedPassword, 'membre']);

            $user_id = $this->connection->getConnection()->lastInsertId();

            $statement = $this->connection->getConnection()->prepare('INSERT INTO contribution (payment_date, expiration_date, payment_option, user_id) VALUES (?, ?, ?, ?)');
            $statement->execute([$payment_date, $expiration_date, $payment_option, $user_id]);

            echo "Inscription réussie !";
        }
    }

    public function addAdmin(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $statement = $this->connection->getConnection()->prepare('INSERT INTO user (fullname, email, password, status) VALUES (?, ?, ?, ?)');
            $statement->execute([$fullname, $email, $hashedPassword, 'admin']);

            echo "Inscription réussie !";
        }
    }

    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $password = $_POST['password'];
            $status = $_POST['status'];

            $statement = $this->connection->getConnection()->prepare("SELECT * FROM user WHERE id = :id AND status = :status");
            $statement->execute(['id' => $id, 'status' => $status]);
            $user = $statement->fetch();

            if ($user && password_verify($password, $user['password'])) {
                if ($status === 'membre') {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['fullname'] = $user['fullname'];
                    header('Location: index.php?action=member_dashboard');
                    exit();
                } elseif ($status === 'admin') {
                    $_SESSION['user_id'] = $user['id'];
                    header('Location: index.php?action=admin_dashboard');
                    exit();
                }
            } else {
                throw new Exception("Identifiants incorrects. Veuillez réessayer.");
            }
        }
    }
}
