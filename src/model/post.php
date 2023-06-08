<?php
namespace App\Model\Post;

require_once('src/lib/database.php');


class Post
{
    public int $id;
    public string $title;
    public string $content;
    public string $creationDate;
    public string $creationBy;
    public string $leadSentence;
    public string $slug;
}

class PostRepository
{
    public \DatabaseConnection $connection;

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
        // $statement = $this->connection->getConnection()->query(
        //     "SELECT id, title, content, DATE_FORMAT(created_at, '%d/%m/%Y à %Hh%imin%ss') AS
        //     created_at, created_by, lead_sentence 
        //     FROM post  ORDER BY created_at ASC ");
        $statement = $this->connection->getConnection()->query(
            "SELECT post.id, post.title, post.content, post.created_at, post.created_by, user.username, post.lead_sentence 
            FROM `post` 
            INNER JOIN user ON post.created_by = user.id
            ORDER BY created_at ASC ");
    
        $posts = [];
        while (($row = $statement->fetch()))
        {
                $post = new Post();
                $post->title = $row['title'];
                $post->content = $row['content'];
                $post->creationDate = $row['created_at'];
                $post->creationBy = $row['username'];
                $post->leadSentence = $row['lead_sentence'];
                $post->id = $row['id'];
            
    
            $posts[] = $post;
        }
        return $posts;
    }

    public function createArticle($title, $leadSentence, $content)
    {
        $creationDate = date('Y-m-d H:i:s');
        $creationBy = $_SESSION['id'];
        $slug = '';
        $updateDate = date('Y-m-d H:i:s');
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `post`( `title`, `content`, `created_at`, `created_by`, `slug`, `lead_sentence`, `updated_at`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)"
        );
        // $affectedLines = $statement->execute([
        //     ':title' => $title,
        //     ':content' => $content,
        //     ':created_at' => $creationDate,
        //     ':created_by' => $creationBy,
        //     ':slug' => $slug,
        //     ':lead_sentence' => $leadSentence, 
        //     ':updated_at' => $updateDate,
        // ]);
            $affectedLines = $statement->execute([$title, $content, $creationDate, $creationBy, $slug, $leadSentence, $updateDate]);
            
            return ($affectedLines > 0);
        }
        
        public function updateArticle($title, $leadSentence, $content,$id)
        {   
            $creationDate = date('Y-m-d H:i:s');
            $creationBy = $_SESSION['id'];
            $slug = '';
            $updateDate = date('Y-m-d H:i:s');
            $statement = $this->connection->getconnection()->prepare("
            UPDATE `post` 
            SET `title` = ?, `content` = ?, `created_at` = ?, `created_by` = ?, `slug`= ?, `lead_sentence` = ?, `updated_at` = ?  
            WHERE id = ?
            ");
            $affectedLines = $statement->execute([$title, $content, $creationDate, $creationBy, $slug, $leadSentence, $updateDate, $id]);
            // $affectedLines = $statement->execute([$title, $leadSentence, $content, $id]);

        return ($affectedLines > 0);
    }

    public function deleteArticle(int $id)
    {
        $statement = $this->connection->getConnection()->prepare("
            DELETE FROM `post` 
            WHERE id = ?
        ");

        $affectedLines = $statement->execute([$id]);
        return ($affectedLines > 0);
    }
}




?>