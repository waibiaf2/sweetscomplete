<?php
class Products{
    
    public $products = array();
    
    public function __construct(){
        //"00000001","F1000","Fudge","Invenire percipitur eum ea, in saepe persequeris has, meis dicta albucius an vix. Utinam nonumes necessitatibus vel ne. Ad mea tacimates temporibus. Duo dicam timeam integre in. Ius an libris latine, ludus inimicus quo te, ridens scripta placerat in pri. Nec ex feugiat abhorreant.","0.10","1","95_2542284"
        
        $lables = array('id','sku','title','description','price','special','link');
        $fh = fopen('./Model/products.csv','r');
        if($fh){
            while(!feof($fh)){
                $row = fgetcsv($fh);
                $tempRow = array();

                if(isset($row) && is_array($row) && count($row) > 0){
                    foreach($row as $key => $value){
                    $tempRow[$lables[$key]] = $value;
                     }
                    $this->products[] = $tempRow;
                }
                
            }
        }
        
    }
    
    public function getProducts(){
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