<?php

class Category{
    // DB Stuff
    private $conn;
    private $table = "categories";

    // Category properties
    public $id;
    public $category_name;
    public $created_at;

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get categories
    public function read(){
        // Create query
        $query = 'SELECT 
            id,
            name,
            created_at
                FROM ' 
            . $this->table . '
            ORDER BY
                created_at DESC';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }
    
    public function read_one(){
        // Create query
        $query = 'SELECT 
            id,
            name,
            created_at
                FROM ' 
            . $this->table . '
            WHERE
                id = ?';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute Statement
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // Set properties
        $this->name = $row['name'];
    }
}