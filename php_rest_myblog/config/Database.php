<?php 

    class Database {
        // DB Params
        private $host = 'locahost';
        private $db_name = 'myblog';
        private $username = 'root';
        private $password = '';
        private $conn;

        // DB Connect method
        public function connect() {
            $this->conn = null;

            try{
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname' . $this->db_name, 
                $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRORMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connect Error: ' . $e->getMessage();
            }

            return $this->conn;
        }
    }
    