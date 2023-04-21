<?php
//  src/model/comment.php

use App\src\model\User\UserRepository;

class comment
{   
    public int $id;
    public string $created_by;
    public string $creationDate;
    public string $comment;
    public int $post;
    public string $title;
}

function getComments(string $post): array
{
    $database = commentDbConnect(); 

    $statement = $database->prepare("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
    created_at, created_by FROM comment WHERE id = ? ORDER BY created_at DESC");

    $statement->execute([$post]);

    $comments = [];

    while (($row = $statement->fetch()))
    {
        $comment = new Comment();
        $comment->created_by = $row['created_by'];
        $comment->creationDate = $row['created_at'];
        $comment->comment = $row['content'];
    
        $comments[] = $comment;
    }

    return $comments;
}

function createComment($post, $created_by, $comment)
{
    $title = '';
    $creationDate = date('Y-m-d H:i:s');
    $status = 'PENDING';

    $database = commentDbConnect();
    $statement = $database->prepare(
        "INSERT INTO `comment` (`content`, `title`, `created_at`, `created_by`, `post_id`, `status`) 
        VALUES ('?', '?', '?', '?', '?', '?')"
    );
    var_dump($title);
    echo '<br>';
    var_dump($comment);
    echo '<br>';
    var_dump($creationDate);
    echo '<br>';
    var_dump($created_by);
    echo '<br>';
    var_dump($post);
    echo '<br>';
    var_dump($status);
    echo '<br>';
    $affectedLines = $statement->execute([
     $comment, $title, $creationDate, $created_by, $post, $status
    ]);

    return ($affectedLines > 0);
}

function commentDbConnect()
{
    $dns = 'mysql:host=localhost; dbname=blog';
    $user = 'root';
    $password = 'root';

    $pdo = new PDO($dns, $user, $password, [
        PDO::ATTR_ERRMODE => PDO ::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}