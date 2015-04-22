<?php
class Members{
    
    public $members = array();
    
    //mysql connection parameter
    public $user = 'sweetscomplete';
    public $dbname = 'sweetscomplete';
    public $pass = 'password';
    public $host = 'localhost';
    public $dsn = '';
    public $pdo = '';
    public $testMode = TRUE;
    
    
    public function __construct(){
        $this->dsn = sprintf('mysql:dbname=%s;host=%s', $this->dbname, $this->host);
        if($this->testMode){
              $this->pdo = new PDO($this->dsn,$this->user,$this->pass,
                                   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
        } else{
              $this->pdo = new PDO($this->dsn,$this->user,$this->pass);
        } //end of if else....
        
        $sql = 'SELECT * FROM `members`'; // sql statement assigned the the variable $sql
        $stmt = $this->pdo->prepare($sql); //the pdo prepare statement for preparing the sql statement.
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $this->members[] = $row;
        }

    }

    public function getMembers(){
        return $this->members;
    }
    
 
}