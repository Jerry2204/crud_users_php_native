# Project for manage users (CRUD) using PHP Native

This project is a PHP application to manage a list of users. Implement CRUD operations (Create, Read, Update, Delete) for user records in a MySQL database.

## Prerequisites

Make sure you have the following installed on your machine:

- [PHP](https://www.php.net/downloads)
- [MySQL](https://www.mysql.com/downloads/)

## Getting Started

1. Clone the repository:

   ```bash
   git clone https://github.com/Jerry2204/crud_users_php_native

1. Create database called "users"

1. Create table users using this query:

    ```bash
    CREATE TABLE `users` ( `id` int NOT NULL AUTO_INCREMENT, `name` varchar(255) CHARACTER SET utf8mb4 COLLAT utf8mb4_general_ci NOT NULL, `email` varchar(255) CHARACTER SET utf8mb4 COLLAT utf8mb4_general_ci NOT NULL, `address` text CHARACTER SET utf8mb4 COLLAT utf8mb4_general_ci NOT NULL, PRIMARY KEY (`id` ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb COLLATE=utf8mb4_general_ci;

1. update the database connection settings in index.php line 2 based on your local credentials.

    ```bash
    $conn = mysqli_connect("localhost", "root", "root", "users");

1. Start your PHP server.

## Usage

1. Open your API testing tools such as postman.

1. Add a request for creating a user:
    + Endpoint : ``http://your-server-url/folder-name``
    + HTTP Method : ``POST``
    + Request Body :
    ```json
    {
        "action": "create",
        "name": "Jerry",
        "email": "jerry@example.com",
        "address": "Bekasi, jawa barat"
    }
    ```

1. Add a request for reading all user:
    + Endpoint : ``http://your-server-url/folder-name``
    + HTTP Method : ``GET``

1. Add a request for updating a user:
    + Endpoint : ``http://your-server-url/folder-name``
    + HTTP Method : ``POST``
    + Request Body :
    ```json
    {
        "action": "update",
        "name": "Jerry A Pangaribuan",
        "email": "jerry@example.com",
        "address": "Bekasi, jawa barat",
        "id": 1
    }
    ```

1. Add a request for updating a user:
    + Endpoint : ``http://your-server-url/folder-name``
    + HTTP Method : ``POST``
    + Request Body :
    ```json
    {
        "action": "delete",
        "id": 1
    }
    ```