<?php
//  src/model/comment.php
namespace App\Model\Comment;

require_once './src/lib/database.php';


//use App\Lib\Database\DatabaseConnection;

class Comment
{   
    public int $id;
    public string $created_by;
    public string $creationDate;
    public string $comment;
    public int $post;
    public string $title;
}

class CommentRepository
{
    public \DatabaseConnection $connection;

    function getComments(string $post): array
    {
        
        $statement = $this->connection->getConnection()->prepare("SELECT title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
        created_at, first_name, post_id 
        FROM comment 
        INNER JOIN user ON user.id = comment.id 
        WHERE post_id = ? 
        ORDER BY created_at DESC"
        );

        $statement->execute([$post]);

        $comments = [];

        while (($row = $statement->fetch()))
        {
            $comment = new Comment();
            // $comment->id = $row['id'];
            $comment->created_by = $row['first_name'];
            $comment->creationDate = $row['created_at'];
            $comment->comment = $row['content'];
            $comment->title = $row['title'];
            $comment->post = $row['post_id'];
         
            $comments[] = $comment;
        }

        return $comments;
    }

    function getAllComments(): array
    {
        $statement = $this->connection->getConnection()->prepare("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
        created_at, created_by, post_id FROM comment ORDER BY created_at DESC");

        $statement->execute();

        $comments = [];

        while (($row = $statement->fetch()))
        {
            $comment = new Comment();
            $comment->created_by = $row['created_by'];
            $comment->creationDate = $row['created_at'];
            $comment->comment = $row['content'];
            $comment->title = $row['title'];
            $comment->post = $row['post_id'];
            $comment->id = $row['id'];
        
            $comments[] = $comment;
        }

        return $comments;
    }

    function createComment($post, $created_by, $comment)
    {
        $title = '';
        $creationDate = date('Y-m-d H:i:s');
        $created_by = $_SESSION['id'];
        $status = 'PENDING';

        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `comment` (`content`, `title`, `created_at`, `created_by`, `post_id`, `status`) 
            VALUES (?, ?, ?, ?, ?, ?)"
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

    function submitComment()
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE comments SET "
        );

    }

}

/*
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
*/