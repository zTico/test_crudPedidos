<?php

class Conexao {

	private $host = 'localhost';
	private $dbname = 'pizz';
	private $user = 'root';
	private $pass = '';

	public function conectar(){

		try {
            $conexao = new PDO( 
                "mysql:host=$this->host;dbname=$this->dbname", //passar sempre o host= e o dbname=
                "$this->user",
                "$this->pass"
            );
            return $conexao;

        } catch (PDOException $e) {
            echo '<p> O erro é: '.$e.'</p>';
        }
	

	}
}
    
