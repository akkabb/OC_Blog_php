<?php
//  src/model/comment.php
namespace App\Model\Comment;

require_once './src/lib/database.php';
use PDO;

//use App\Lib\Database\DatabaseConnection;

class Comment
{   
    public int $id;
    public string $created_by;
    public string $creationDate;
    public string $comment;
    public int $post;
    public string $title;
    public string $status;
}

class CommentRepository
{
    public \DatabaseConnection $connection;
    
    /**
     * It is used to retrieve a comment
     *
     * @param  mixed $id
     * @return void
     */
    function getComment($id)
    {
        $statement = $this->connection->getConnection()->prepare("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
        created_at, created_by, post_id 
        FROM `comment`  
        WHERE id = ?"
        );

        $statement->execute([$id]);

        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }

        $comment = new Comment();
        $comment->created_by = $row['created_by'];
        $comment->creationDate = $row['created_at'];
        $comment->comment = $row['content'];
        $comment->title = $row['title'];
        $comment->post = $row['post_id'];
        $comment->id = $row['id'];

        return $comment;
    }
    
    /**
     *  Displays comments that have been validated
     *
     * @param  mixed $post
     * @return array
     */
    function getComments(string $post): array
    {
        
        // $statement = $this->connection->getConnection()->prepare("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
        // created_at, first_name, post_id 
        // FROM comment 
        // INNER JOIN user ON user.id = comment.id 
        // WHERE post_id = ? 
        // ORDER BY created_at DESC"
        // );
        $statement = $this->connection->getConnection()->prepare("SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
        created_at, created_by, post_id 
        FROM `comment` 
        WHERE post_id = ?  
        AND `status` = 'APPROVED'
        ORDER BY created_at DESC"
        );

        $statement->execute([$post]);

        $comments = [];

        while (($row = $statement->fetch()))
        {
            $comment = new Comment();
            $comment->id = $row['id'];
            $comment->created_by = $row['created_by'];
            $comment->creationDate = $row['created_at'];
            $comment->comment = $row['content'];
            $comment->title = $row['title'];
            $comment->post = $row['post_id'];
         
            $comments[] = $comment;
        }

        return $comments;
    }
        
    /**
     * Get All Comments
     *
     * @return [] of comments
     */
    function getAllComments()
    {
        $comments = [];
        $sql = "SELECT comment.content, comment.title , comment.created_at, comment.post_id, comment.created_by, comment.status, comment.id, user.username, post.title AS post_title 
                FROM comment 
                INNER JOIN user ON comment.created_by = user.id 
                INNER JOIN post ON comment.post_id = post.id";
        $query = $this->connection->getConnection()->prepare($sql);
        $query->execute();
        while ($row = $query->fetch()){
            $comment = new Comment();
            $comment->created_by = $row['username'];
            $comment->creationDate = $row['created_at'];
            $comment->comment = $row['content'];
            $comment->title = $row['title'];
            $comment->post = $row['post_id'];
            $comment->id = $row['id'];
        
            $comments[] = $comment;
        }
        return $comments;
    }

        
    /**
     * It allows you to create a comment
     *
     * @param  mixed $post
     * @param  mixed $created_by
     * @param  mixed $comment
     * @return void
     */
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
        $affectedLines = $statement->execute([
        $comment, $title, $creationDate, $created_by, $post, $status
        ]);

        return ($affectedLines > 0);
    }
    
    /**
     * It is used to validate a comment
     *
     * @param  mixed $id
     * @return void
     */
    function submitComment($id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `comment` SET `status` = 'APPROVED' WHERE id = ?"
        );

        $affectedLines = $statement->execute([$id]);
        return ($affectedLines > 0);
    }
    
    /**
     * It allows you to delete a comment
     *
     * @param  mixed $id
     * @return void
     */
    function deleteComment($id)
    {
        $statement = $this->connection->getConnection()->prepare("
        DELETE FROM `comment` WHERE id = ?");
        $affectedLines = $statement->execute([$id]);

        return ($affectedLines > 0);
    }

}

