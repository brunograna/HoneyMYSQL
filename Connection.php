<?php
/**
 * Description of HoneyMYSQL - for PHP 7.0
 * This project was made for reuse in future projects.
 * @author Bruno Garcia
 */
class Connection {
    //Declarando variaveis
    private $servername;
    private $username;
    private $password;
    private $database;  
    private $conn;

    //Construtor
    public function __construct() {
        //Config your server settings here
        $this->setServername("localhost");
        $this->setUsername("root");
        $this->setPassword("");
        $this->setDatabase("testando");
    }   
   
    /**
     * Create the connection with database
     */ 
    //Funcao de conectar ao database
    public function conectar():bool{
        $servername = $this->getServername();
        $username = $this->getUsername();
        $password = $this->getPassword();
        $dbname = $this->getDatabase();

        // Criar conexao
        $this->setConn(new mysqli($servername, $username, $password, $dbname));
        // Fazer Conexao
        if ($this->getConn()->connect_error) {
            //die("Connection failed: " . $this->conn->connect_error);
            return false;
        }else{
            return true;
        } 
    }         

    //Fechar conexao
    /**
     * Close the connection with database
     */ 
    public function fechar(){        
        $this->getConn()->close();
    }
    
    //Getters and Setters
    /**
     * Set the value of conn
     */ 
    public function setConn($value){
        $this->conn = $value;
    }
    /**
     * Get the value of conn
     */ 
    public function getConn(){
        return $this->conn;
    }
    /**
     * Get the value of database
     */ 
    private function getDatabase()
    {
        return $this->database;
    }

    /**
     * Set the value of database
     *
     * @return  self
     */ 
    private function setDatabase($database)
    {
        $this->database = $database;      
    }

    /**
     * Get the value of password
     */ 
    private function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    private function setPassword($password)
    {
        $this->password = $password;       
    }

    /**
     * Get the value of username
     */ 
    private function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    private function setUsername($username)
    {
        $this->username = $username;        
    }

    /**
     * Get the value of servername
     */ 
    private function getServername()
    {
        return $this->servername;
    }

    /**
     * Set the value of servername
     *
     * @return  self
     */ 
    private function setServername($servername)
    {
        $this->servername = $servername;      
    }
}