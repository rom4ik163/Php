<?php

class DataBase
{
    private static ?mysqli $instance = null;

    public function __construct()
    {
        if (self::$instance === null)
            self::$instance = new mysqli('flutter-cource.zzz.com.ua', 'rootLabka2021', 'Router4876');
        return self::$instance;
    }

    public function findUser($email): User|bool
    {
        $query = "SELECT * FROM bobka229.userdata;";
        $queryResult = self::$instance->query($query);
        if ($queryResult->num_rows > 0)
            while ($row = $queryResult->fetch_assoc())
                if ($email == $row['email']) {
                   $user = new User($row['name'], $row['email'], $row['password'], $row['rating']);
                   $user->setId($row['id']);
                   return $user;
                }
        return false;
    }

    public function saveUser($user, $password): bool
    {
        $name = $user->getName();
        $email = $user->getEmail();
        $rating = $user->getRating();
        $query = "INSERT INTO bobka229.userdata (name, email,  password, rating)VALUES ('$name', '$email', '$password', '$rating')";
        if (self::$instance->query($query) === TRUE) {
            self::$instance->close();
            return true;
        } else {
            echo "Error: " . $query . "<br>" . self::$instance->error;
        }
        return false;
    }

    public function updateUser(User $user): bool
    {
        $rating = $user->getRating();
        $id = $user->getId();
        $query = "UPDATE bobka229.userdata SET rating='$rating' WHERE id='$id';";
        if (self::$instance->query($query) === TRUE) {
            self::$instance->close();
            return true;
        } else {
            self::$instance->close();
            return false;
        }
    }

    public function getAllUsers(): array
    {
        $query = "SELECT * FROM bobka229.userdata;";
        $queryResult = self::$instance->query($query);
        $users = [];
        if ($queryResult->num_rows > 0) {
            while ($row = $queryResult->fetch_assoc()) {
                $user = new User($row['name'], $row['email'], $row['password'], $row['rating']);
                $user->setId($row['id']);
                array_push($users, $user);
            }
        }
        return $users;
    }

    private function __clone()
    {
    }
}
