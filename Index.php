<?php

try {
    $conn=new PDO("mysql:host=localhost; dbname=upwork_jobs", "root", "" );
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo"Connected!";
} catch (PDOException $e ) {
    //throw $th;
    die($e->getMessage());
}

// prepare SQL query
$statement = $conn -> prepare('select * from jobs');
// after preparing the statement, we need to execute our statement
$statement -> execute();
// after execution, we need to fetch all data/jobs from the table
$jobs = $statement -> fetchAll(PDO::FETCH_OBJ);  

require 'index.view.php';
