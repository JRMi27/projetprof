<?php
require_once '/../models/Database.php';

class AuthController {
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
    }

    public function login() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $stmt = $this->db->prepare("SELECT * FROM clients WHERE identifiantClient=? AND mdpClient=?");
            $stmt->bind_param("ss", $user, $pass);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $_SESSION['username'] = $user;
                header("Location: ../../index.php");
                exit();
            } else {
                echo "Invalid username or password";
            }

            $stmt->close();
        }

        $this->db->closeConnection();
    }
}
?>