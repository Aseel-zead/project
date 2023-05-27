<?php
class User
{
    private $conn;
    public function __construct()
    {
        include('DataBase/connect.php');
        $this->conn = $con;
    }

    public function register($name, $email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);
        if ($stmt->execute()) {
            $stmt->close();
            header("Location: login.php");
            exit();
        } else {
            die('Error: ' . mysqli_connect_error());
        }
    }

    public function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die('Error Executing query  !  ' . mysqli_error($this->conn));
        }
        if ($result->num_rows > 0) {
            $row[] = $result->fetch_assoc();
            $id = $row[0]['id'];
            return $id;
            exit();
        }
        return false;
    }

    public function getUserByID($id)
    {
        $query = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $password = $row['password'];
            }
        } else {
            return 'Erorr Massage ';
        }
        return ['id' => $id, 'name' => $name, 'email' => $email, 'password' => $password];
    }

    public function getAllUser()
    {
        $query = "SELECT * FROM users";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo 'Erorr Massage ';
        }
    }

    public function UpdateUser($id, $name, $email)
    {
        $sql = "UPDATE users SET  name = '$name' , email = '$email' WHERE id = '$id'";
        if ($this->conn->query($sql) === true) {
            return true;
        } else
            return false;
    }

    public function EditPassword($id, $password)
    {
        $sql = "UPDATE users SET  password = '$password' WHERE id = '$id'";
        if ($this->conn->query($sql) === true) {
            return true;
        } else
            return false;
    }
    
    public function deleteUser($id)
    {
        $sql = "DELETE FROM users WHERE  id = '$id' ";
        if ($this->conn->query($sql) === true) {
            header("Location: alluser.php");
        } else
            return false;
    }
}
