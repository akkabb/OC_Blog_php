<?php
//  src/model/comment.php

class comment
{
    public string $author;
    public string $creationDate;
    public string $comment;
}

function getComments(string $post): array
{
    $database = commentDbConnect(); 

    $statement = $database->prepare("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
    created_at, created_by, FROM comment WHERE id = ? ORDER BY created_at DESC");

    $statement->execute([$post]);

    $comments = [];

    while (($row = $statement->fetch()))
    {
        $comment = new Comment();
        $comment->author = $row['created_by'];
        $comment->creationDate = $row['created_at'];
        $comment->comment = $row['content'];
    
        $comments[] = $comment;
    }

    return $comments;
}

function createComment(string $post, string $author, string $comment)
{
    $database = commentDbConnect();
    $statement = $database->prepare(
        'INSERT INTO comments(id, created_by, content, created_at) VALUES(?, ?, ?, NOW())'
    );
    $affectedLines = $statement->execute([$post, $author, $comment]);

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