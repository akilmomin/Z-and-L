<?php
	class db
    {   
        public $isConnected;
        protected $database;

        public function __construct($username, $password,$db_name)
        {
			$host='127.0.0.1';
			$options = [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			];
            $this->isConnected = true;
            try { 
                $this->database= new PDO("mysql:host={$host};dbname={$db_name};charset=utf8", $username, $password, $options); 
                $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                $this->database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } 
            catch(PDOException $e) { 
                $this->isConnected = false;
                throw new Exception($e->getMessage());
            }
        }       

		public function select($query, $params=array()){
            try{ 
				$tbl_return=array();
                $stmt = $this->database->prepare($query); 
                $stmt->execute($params);
				while($record=$stmt->fetch())
					array_push($tbl_return,$record);
                return $tbl_return;
                }
			catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
		public function insert($query, $params=array()){
            try{ 
                $this->database->prepare($query)->execute($params);
                }
			catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function update($query, $params=array()){
            try{
                $this->database->prepare($query)->execute($params);
                }
            catch(PDOException $e){
                throw new Exception($e->getMessage());
            }

        }
 
    }

?>