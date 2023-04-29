<?php
namespace App\Model\User;

require_once('./src/lib/database.php');
//use App\Lib\Database\DatabaseConnection;

class User{
    public int $id;
    public string $username;
    public string $email;
    public string $firstname;
    public string $lastname;
    public string $password;
    public string $role;
}

class UserRepository{
    public \DatabaseConnection $connection;

    public function getUser(string $id)
    {
        $statement =  $this->connection->getConnection()->prepare(
            "SELECT id, username, email, first_name, last_name, password, role, deleted FROM user WHERE id = ?"
        );
        $statement->execute([$id]);

        $row = $statement->fetch();
        if ($row === false)
        {
            return null;
        }
        $user = new User();
        $user->id = $row['id'];
        $user->username = $row['username'];
        $user->email = $row['email'];
        $user->firstname = $row['first_name'];
        $user->lastname = $row['last_name'];
        $user->password = $row['password'];
        $user->role = $row['role'];

        return $user;
    }

    public function getUsers(): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT `id`, `username`, `email`, `first_name`, `last_name`, `password`, `role` FROM user ORDER BY `role`"
        );

        $statement->execute();

        $users = [];
        while (($row = $statement->fetch()))
        {
            $user = new User();
            $user->id = $row['id'];
            $user->username = $row['username'];
            $user->email = $row['email'];
            $user->firstname = $row['first_name'];
            $user->lastname = $row['last_name'];
            $user->password = $row['password'];
            $user->role = $row['role'];

            $users[] = $user;
        }
        return $users;
    }

    public function createUser($username, $email, $firstname, $lastname, $password)
    {
        if ($role = 2)
        {
            $role = "user";
        }else if ($role = 1){
            $role = "admin";
        }
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `user`( `username`, `email`, `first_name`, `last_name`, `password`, `role`) 
                VALUES (:username, :email, :first_name, :last_name, :password, :role )"
        );
        $affectedLines = $statement->execute([
            ':username' => $username, 
            ':email' => $email, 
            ':first_name' => $firstname, 
            ':last_name' => $lastname,
            ':password' => $password, 
            ':role' => $role, // if {role == 2 == user} else if{role == 1 == Admin};
        ]);
        $_SESSION['accountCreated'] = $firstname;

        return ($affectedLines > 0);
    }

    public function passAdmin($id)
    {
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE user SET `role` = "1" WHERE id = ?'
        );
        $affectedLines = $statement->execute([$id]);
        return ($affectedLines > 0);

    }

    public function loginUser(string $email)
	{
		$statement = $this->connection->getConnection()->prepare(
			"SELECT * FROM `user` WHERE `email` = :email"
		);
		$statement->bindValue(":email", $email);
		$statement->execute();
		$user = $statement->fetch();
    
        echo "<br>";
        if ($user)
        {
             $_SESSION['username'] = $user['username'];
             $_SESSION['id'] = $user['id'];
             $_SESSION['user_role'] = $user['role'];
             
            return true;
        }
        else{
            return false;
        }
		// if ($user) {	
		// 	if (password_verify($_POST["password"], $user["password"])) {
		// 		session_start();
		// 		$_SESSION['username'] = $user["username"];
		// 		$_SESSION['id'] = $user["id"];
		// 		$_SESSION['role'] = $user['role'];
		// 		return true;
		// 	} else {
		// 		return false;
		// 	}
		// } else {
		// 	return false;
		// }
		//$statement->close();
	}

}