<?php
class crud
{
    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "latihanphp";

    function __construct()
    {
        $koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$koneksi) {
            echo "Koneksi db gagal.";
        }
    }

    // function
    function connect()
    {
        $conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        return $conn;
    }

    function insertUser($username, $password)
    {
        $conn = $this->connect();
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $isSuccess = false;
        if ($stmt->affected_rows >= 0) {
            echo "New record created successfully";
            $isSuccess = true;
        } else {
            echo "Error: " . $stmt->error; // Handle errors!
        }
        $stmt->close();
        $conn->close();

        return $isSuccess;
    }

    function showUsers()
    {
        $conn = $this->connect();
        $sql = "SELECT username FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "result found" . "<br>";
        } else {
            echo "no result";
        }

        $conn->close();

        return $result;
    }


    function checkLogin($username, $password)
    {
        $conn = $this->connect();
        $sql = "SELECT id FROM users WHERE username = ? and password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        $checkResult = false;
        if ($result->num_rows >= 1) { // Check for row result
            $row = $result->fetch_assoc(); // No loop needed
            echo "ID: " . $row["id"] . "<br>";
            $checkResult = true;
        } else if ($result->num_rows == 0) {
            echo "No results found.";
            $checkResult = false;
        }
        $stmt->close();
        $conn->close();

        //id, username, password
        // $arrUser = [$id_user, $username, $password];
        return $checkResult;
    }
}