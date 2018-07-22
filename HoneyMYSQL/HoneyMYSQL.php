<?php
/**
 * Description of HoneyMYSQL - for PHP 7.0
 * This project was made to turn the reuse of code in the future projects most useful.
 * @author Bruno Garcia - Rio de Janeiro - Brazil
 */
//The connection.php file should be in the same folder as this file.
require_once 'Connection.php';
class HoneyMYSQL{

    private $connect;

    //Constructor
    /**
     * Constructor Method of HoneyMYSQL
     * 
     * Here the connection with DataBase are made.
     */
    public function __construct(){
        $this->connect = new Connection();    
        if(!$this->connect){
            die('<br/>Erro em conexao com banco de dados.<br/>');
            return false;
        }else{
            return true;
        }
    }    

    
    /**
     * This functions insert data into a MYSQL database
     * 
     * Insert - Should pass ($tablename, $attributes, $values)  
     * 
     * $tablename - Name of the table.
     * 
     * $attributes - Array with the attributes name.
     * 
     * $values - Array with values of the attributes.    
     * 
     * Return TRUE = Success
     * 
     * Return FALSE = Failure on query  
     * 
     * * The values should be in the same sequence of the attributes name  
     */ 
    public function insert(String $tablename,array $attributes,array $values):bool{        
        if ($this->connect->conectar()) {   
            //Here the query are made
            $sql = "INSERT INTO `".$tablename."` ( ";
            foreach ($attributes as $key => $value) {                
                if($key == count($attributes) - 1){
                    $value = $this->connect->getConn()->real_escape_string(htmlentities($value));  
                    $sql = $sql."`".$value."`";
                }else{
                    $value = $this->connect->getConn()->real_escape_string(htmlentities($value));                    
                    $sql = $sql."`".$value."`, ";
                }                
            }      
            $sql = $sql." ) VALUES ( ";     
            foreach ($values as $key => $value) {
                if($key == count($attributes) - 1){
                    $value = $this->connect->getConn()->real_escape_string(htmlentities($value));  
                    $sql = $sql." '".$value."'";
                }else{
                    $value = $this->connect->getConn()->real_escape_string(htmlentities($value));  
                    $sql = $sql."'".$value."', ";
                } 
            }
            
            $sql = $sql." )";            
            //Try to realize the query
            if ($this->connect->getConn()->query($sql) === TRUE) {
                //Query was made with success                
                $this->connect->fechar();
                return true;
            }else{
                //Error in query
                echo "<br/>Error in query : <b>". $this->connect->getConn()->error."</b><br/>";
                $this->connect->fechar();
                return false;
            }            
        }else{
            return false;
        }
    }


    /**
     * This functions insert a not repeat data into a MYSQL database
     * 
     * Insert_nr - Should pass ($tablename, $attributes, $values)  
     * 
     * $tablename - Name of the table.
     * 
     * $attributes - Array with the attributes name.
     * 
     * $values - Array with values of the attributes.    
     * 
     * Return TRUE = Success
     * 
     * Return FALSE = Failure on query or The data are already in database
     * 
     * * The values should be in the same sequence of the attributes name  
     */ 
    public function insert_nr(String $tablename,array $attributes,array $values):bool{        
        if ($this->connect->conectar()) {
            //Connected with database   
            //Here the SELECT query are made
            $sql = "SELECT ";
            //Mount the attributes
            foreach ($attributes as $key => $value) {                
                if($key == count($attributes) - 1){
                    $sql = $sql."`".$value."`";
                }else{
                    $sql = $sql."`".$value."`, ";
                }                
            }      
            $sql = $sql." FROM `".$tablename."` WHERE ";     
            //Mount the values of the attributes
            foreach ($values as $key => $value) {                
                if($key == count($attributes) - 1){
                    $sql = $sql." `".$attributes[$key]."` = '".$value."'";
                }else{
                    $sql = $sql." `".$attributes[$key]."` = '".$value."' and";
                } 
            }
            $sql = $sql." ";       
            //Verify with exist this data on database 
            $result = $this->connect->getConn()->query($sql);
            if ($result->num_rows <= 0) {    
                //The data do not exist on database
                //Here the INSERT query are made
                $sql = "INSERT INTO ".$tablename." ( ";
                //Mount the attributes
                foreach ($attributes as $key => $value) {                
                    if($key == count($attributes) - 1){
                        $sql = $sql."".$value."";
                    }else{
                        $sql = $sql."".$value.", ";
                    }                
                }                      
                $sql = $sql." ) VALUES ( ";     
                //Mount the values of the attributes
                foreach ($values as $key => $value) {
                    if($key == count($attributes) - 1){
                        $sql = $sql." '".$value."'";
                    }else{
                        $sql = $sql."'".$value."', ";
                    } 
                }
                $sql = $sql." )";                      
                //Try to realize the query
                if ($this->connect->getConn()->query($sql) === TRUE) {
                    //Query was made with success                
                    $this->connect->fechar();
                    return true;
                }else{
                    //Error in query
                    echo "<br/>Error in query : <b>". $this->connect->getConn()->error."</b><br/>";
                    $this->connect->fechar();
                    return false;
                }               
            }else{
                //Data exist on database
                return false;
            }
            
        }else{
            return false;
        }
    }



}