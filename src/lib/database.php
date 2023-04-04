<?php

class DatabaseConnection
{
    public ?PDO $database = null;
    
    public string $dns = 'mysql:host=localhost; dbname=blog';
    public string $user = 'root';
    public string $password = 'root';

    public function getConnection(): PDO
    {
        if ($this->database === null){
            $this->database = new PDO($this->dns, $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO ::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return $this->database;

    }
}