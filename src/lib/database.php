<?php

class DatabaseConnection
{
    public ?PDO $database = null;

    public function getConnection(): PDO
    {
        if ($this->database === null) {
            $this->database = new PDO('mysql:host=localhost;dbname=library_website;charset=utf8', 'root', 'root');
        }

        return $this->database;
    }
}
