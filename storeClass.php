<?php

    require_once("dbClass.php");
    require_once("TextileClass.php");

    class store{ 
        private $id;
        private $store_name;

		/*get's functions*/
        public function getId(){
            return $this->id;
        }
        
        public function getStoreName(){
            return $this->store_name;
        }
        /*set's functions*/
        public function setID($id){
            $this->id = $id;
        }
        
        public function setStoreName($store_name){
            $this->store_name = $store_name;
        }
  

         /*Echo data about same product*/
        public function getInfoById($id){
            $conn = new dbClass();
            $conn->connect();
            
            $sql  = "SELECT * FROM `Textile`, `store` 
                    WHERE '$id'=`store`.`id`&&`store`.`id`=`Textile`.`id`";
            $result = $conn->getConnection()->query($sql);
            
            if($row = $result->fetchObject(__CLASS__)){
                echo "<b>".$row->getId().",&#160;&#160; &#160;&#160;&#160; &#160;&#160;&#160;".$row->model.", &#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;"
                    .$row->getStoreName().", &#160;&#160;&#160;&#160;&#160; &#160;&#160;&#160;".$row->price."</b><br>";
            }
            $conn->disconnect();
        }

       /*Echo info of all products in data base*/
        public function getAllInfo(){
            $conn = new dbClass();
            $conn->connect();

            $sql = "SELECT `Textile`.`id`, `Textile`.`model`, `Textile`.`price` ,
                  `store`.`store_name` 
                    FROM `Textile` INNER JOIN `store` ON `Textile`.`id`=`store`.`id`";
            $result = $conn->getConnection()->query($sql);
            
            while($row = $result->fetchObject(__CLASS__)){
                echo "<b>".$row->getId().", &#160;&#160;&#160;&#160;&#160; ".$row->model.", &#160;&#160;&#160;&#160;&#160;".
                    $row->getStoreName().", &#160;&#160;&#160;&#160;&#160; ".$row->price."</b><br>";
            }
            $conn->disconnect();
        }
        
      /*open file and save all data of item in dat base */   
        public function createFile(){
            $conn = new dbClass();
            $conn->connect();

            $f = fopen("Textile.txt","wb") or die("error to open file");

            if($f != false)
			{
                $sql = "SELECT `Textile`.`id`,`Textile`.`model`,`Textile`.`price` ,`store`.`store_name` 
                FROM `Textile` 
                INNER JOIN `store` ON `Textile`.`id`=`store`.`id`";
                $result = $conn->getConnection()->query($sql);
                
                fwrite($f," Id\t |\t ModeL\t |\t Store Name\t |\t Price\n\n");
        
                 while($row = $result->fetchObject(__CLASS__)){
                    fwrite($f,"\t\t".$row->getId().",  ".$row->model.",\t\t  ".$row->getStoreName().",\t\t  ".$row->price."\n");
                 }
                fclose($f);
            }
        $conn->disconnect();			
    }
	
        /*insert into Data Base to store table id and store_name*/
        public function insert($id , $store_name){
            $conn = new dbClass();
            $conn->connect();
            
            $sql = "INSERT INTO `store` (`id`, `store_name`) VALUES ('$id', '$store_name')";
            
            $conn->getConnection()->exec($sql);
            
            $sql = "";
            $conn->disconnect();
        }
                
        public function myEcho(){
            echo "<pre>Id|Model|Store|Price</pre>";

        }
    }
?>