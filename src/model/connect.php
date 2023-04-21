<?php

require_once('src/lib/database.php');
// require_once "/lib/database.php";

class Post
{
    public string $title;
    public string $content;
    public string $creationDate;
    public string $creationBy;
    public string $leadSentence;
    public int $id;
}

class PostRepository
{
    public DatabaseConnection $connection;

    public function getPost(/*PostRepository $this, */ string $id): Post
    {
    
        $statement = $this->connection->getConnection()->prepare("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
        created_at, created_by, lead_sentence FROM post WHERE id = ?");
    
        $statement->execute([$id]);
    
        $row = $statement->fetch();
        $post = new Post();
        $post->title = $row['title'];
        $post->content = $row['content'];
        $post->creationDate = $row['created_at'];
        $post->creationBy = $row['created_by'];
        $post->leadSentence = $row['lead_sentence'];
        $post->id = $row['id'];
        
    
        return $post;
    }

    public function getPosts(): array
    {
        
        //We retrieve the last blog posts
        $statement = $this->connection->getConnection()->query("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
        created_at, created_by, lead_sentence FROM post ORDER BY created_at DESC LIMIT 0,5");
    
        $posts = [];
        while (($row = $statement->fetch()))
        {
                $post = new Post();
                $post->title = $row['title'];
                $post->content = $row['content'];
                $post->creationDate = $row['created_at'];
                $post->creationBy = $row['created_by'];
                $post->leadSentence = $row['lead_sentence'];
                $post->id = $row['id'];
            
    
            $posts[] = $post;
        }
        return $posts;
    }

    // We connect to the database
    
    // public function dbConnect()
    // {
    //     $dns = 'mysql:host=localhost; dbname=blog';
    //     $user = 'root';
    //     $password = 'root';
    
    //     if ($this->database === null)
    //     {
    //         $this->database = new PDO($dns, $user, $password, [
    //             PDO::ATTR_ERRMODE => PDO ::ERRMODE_EXCEPTION,
    //             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    //         ]);
    //     }
    // }
}




?>