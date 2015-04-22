<?php
class Products{
    
    public $products = array();
    
    //mysql connection parameter
    public $user = 'sweetscomplete';
    public $dbname = 'sweetscomplete';
    public $pass = 'password';
    public $host = 'localhost';
    public $dsn = '';
    public $pdo = '';
    public $testMode = TRUE;
    
    
    public function __construct(){
      $this->dsn = sprintf('mysql:dbaname=%s;host=%s', $this->dbname, $this->host);
      $this->pdo = new PDO($this->dsn,$this->user,$this->pass);
        
    }
    
    public function getProductsFromCsv(){
        return $this->products;
    }
    
    public function getTitles(){
        $titles = array();
        foreach($this->products as $row){
            $titles[] = $row['title'];
        }
        return $titles;
        
    }
}