<?php

    class Pick {

        private $db;

        public function __construct() {

            $this->db = new Database;
        }

        public function getPicks($language, $country) {

            $this->db->query('SELECT * FROM staffpicks
                                WHERE language = :language AND country = :country
                                ORDER BY id DESC
                            ');

            $this->db->bind(':language', $language);
            $this->db->bind(':country', $country);        

            $result = $this->db->resultSet();

            return $result;
        }

        public function addPick($data) {

            $this->db->query('INSERT INTO
                                staffpicks (giftDescription, image, url, language, country)
                                VALUES(:giftDescription, :image, :url, :language, :country)
                            ');

            $this->db->bind(':giftDescription', $data['giftDescription']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':url', $data['url']);
            $this->db->bind(':language', $data['language']);
            $this->db->bind(':country', $data['country']);

            if($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function deletePick($id) {

            $this->db->query('DELETE FROM staffpicks
                                WHERE id = :id'
                            );

            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getPickById($id) {

            $this->db->query('SELECT * FROM staffpicks
                                WHERE id = :id'
                            );

            $this->db->bind(':id', $id);

            $row = $this->db->single();

            return $row;
        }

        public function editPick($data) {

            $this->db->query('UPDATE staffpicks
                                SET giftDescription = :giftDescription, image = :image, url = :url
                                WHERE id = :id'
                                );

            //Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':giftDescription', $data['giftDescription']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':url', $data['url']);
            
            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }