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
                    
            } catch(PDOException $e) {

            }
        }
    }
    