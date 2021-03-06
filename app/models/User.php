<?php

    class User{

        private $db;

        public function __construct(){

            $this->db = new Database;
        }

        // User register
        public function register($data){
            $this->db->query('INSERT INTO users (name, email, pwhash) VALUES(:name, :email, :password)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
    
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
  
        // Find an user by email
        public function findUserByEmail($email){

            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }

        // User login
        public function login($email, $password){
            
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->pwhash;
            if(password_verify($password, $hashed_password)){
                return $row;
            }else{
                return false;
            }
        }
    }