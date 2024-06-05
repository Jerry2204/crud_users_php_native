<?php 
    $conn = mysqli_connect("localhost", "root", "root", "users");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    header('Content-Type: application/json');

    $data = json_decode(file_get_contents('php://input'), true);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($data["action"])) {
            switch ($data["action"]) {
                case 'create':
                    if(isset($data["name"]) && isset($data["address"]) && isset($data["email"])) {
                        $name = $data["name"];
                        $address = $data["address"];
                        $email = $data["email"];
                        create($name, $email, $address);
                    } else {
                        echo json_encode(array("status" => "error", "message" => "Invalid request data"));
                        return;
                    }
                    break;
                case 'update':
                    if(isset($data["action"]) && isset($data["name"]) && isset($data["address"]) && isset($data["email"]) && isset($data["id"])) {
                        $name = $data["name"];
                        $address = $data["address"];
                        $email = $data["email"];
                        $id = $data["id"];
                        update($name, $email, $address, $id);
                    } else {
                        echo json_encode(array("status" => "error", "message" => "Invalid request data"));
                        return;
                    }
                    break;
                case 'delete':
                    if(isset($data["id"])) {
                        delete($id);
                    } else {
                        echo json_encode(array("status" => "error", "message" => "Invalid request data"));
                        return;
                    }
                    break;
            }
        }
    } else if($_SERVER['REQUEST_METHOD'] === 'GET') {
        read();
    }


    // Create user function
    function create($name, $email, $address) {
        global $conn;

        if(!$name || !$email || !$address) {
            echo json_encode(array("status" => "error", "message" => "Invalid request data"));
            return;
        }

        $insert = mysqli_query($conn, "INSERT INTO users (name, email, address) VALUES ('$name', '$email', '$address')");

        if($insert) {
            echo json_encode(array("status" => "created", "message" => "User created successfully!"));
            return;
        } else {
            echo json_encode(array("status" => "error", "message" => "Error creating user!"));
            return;
        }
    }

    // read user function
    function read() {
        global $conn;

        $result = mysqli_query($conn, "SELECT * FROM users");

        if($result) {
            $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode(array("status" => "OK", "message" => "Get users data successfully!", "users" => $users));
            return;
        } else {
            echo json_encode(array("status" => "error", "message" => "Error Get user data!"));
            return;
        }
    }

    // update user function
    function update($name, $email, $address, $id) {
        global $conn;

        $update = mysqli_query($conn, "UPDATE users SET name='$name', email='$email', address='$address' WHERE id=$id");

        if($update) {
            echo json_encode(array("status" => "updated", "message" => "User updated successfully!"));
            return;
        } else {
            echo json_encode(array("status" => "error", "message" => "Error updating user!"));
            return;
        }
    }

    // delete user function
    function delete($id) {
        global $conn;

        $delete = mysqli_query($conn, "DELETE FROM users WHERE id=$id");

        if($delete) {
            echo json_encode(array("status" => "deleted", "message" => "User deleted successfully!"));
            return;
        } else {
            echo json_encode(array("status" => "error", "message" => "Error deleting user!"));
            return;
        }
    }

?>