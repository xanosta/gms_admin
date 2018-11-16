<?php

    class Blog{

        private $db;

        public function __construct(){

            $this->db = new Database;
        }

        public function getBlogs($language, $country){
           
            $this->db->query('SELECT * FROM posts 
                                WHERE language = :language && country = :country 
                                ORDER BY id DESC'
                            );

            $this->db->bind(':language', $language);
            $this->db->bind(':country', $country);
               
            $results = $this->db->resultSet();
            return $results;
        }
        
        public function addBlog($data){

            $this->db->query('INSERT INTO 
                                posts (title, user_id, body, caption, image, url, color, country, language)
                                VALUES(:title, :user_id, :body, :caption, :image, :url, :color, :country, :language);
                            ');

            //Bind values
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':user_id', $data['user_id']); 
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':caption', $data['caption']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':url', $data['url']);
            $this->db->bind(':color', $data['color']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':language', $data['language']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function editBlog($data){

            $this->db->query('UPDATE posts 
                                SET title = :title, body = :body, caption = :caption, image = :image, url = :url, color = :color 
                                WHERE id = :id'
                            );

            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':body', $data['body']);
            $this->db->bind(':caption', $data['caption']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':url', $data['url']);
            $this->db->bind(':color', $data['color']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteBlog($id){

            $this->db->query('DELETE FROM posts 
                                WHERE id = :id'
                            );

            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getBlogById($id){

            $this->db->query('SELECT * FROM posts 
                                WHERE id = :id'
                            );

            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }
    }