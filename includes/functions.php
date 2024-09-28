<?php

function connectToDatabase()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=students', 'root', ''); // Update DB name
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}

function dd($var)
{
    var_dump($var);
    exit;
}

function selectAll($table)
{
    $pdo = connectToDatabase();
    
    $query = 'SELECT * FROM ' . $table;
    
    $statement = $pdo->prepare($query);
    
    $statement->execute();
    
    return $statement->fetchAll(PDO::FETCH_CLASS); // Fetching as objects
}

function insertContact($name, $email, $phone)
{
    $pdo = connectToDatabase();
    
    $query = "INSERT INTO contacts (name, email, phone) VALUES (?, ?, ?)";
    $statement = $pdo->prepare($query);
    return $statement->execute([$name, $email, $phone]);
}

function deleteContact($id)
{
    $pdo = connectToDatabase();
    
    $query = "DELETE FROM contacts WHERE id = ?";
    $statement = $pdo->prepare($query);
    return $statement->execute([$id]);
}
?>
