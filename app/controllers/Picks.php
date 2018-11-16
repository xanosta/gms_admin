<?php

    class Picks extends Controller {

        public function __construct() {
            if (!isLoggedIn()) {

                redirect('users/login');
            }
            $this->pickModel = $this->model('Pick');
        }

        public function index() {

            //Set the default language
            $language = 'es';
            $country = 'ES';

            //todo: make select form with country and language options and set the selection as cookies

            //Get picks
            $picks = $this->pickModel->getPicks($language, $country);

            $data = [
                'picks' => $picks
            ];

            $this->view('picks/index', $data);
        }

        public function add() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $data = [
                    'giftDescription' => trim($_POST['giftDescription']),
                    'image' => trim($_POST['image']),
                    'url' => trim($_POST['url']),
                    'country' => trim($_COOKIE['country']),
                    'language' => trim($_COOKIE['lang'])
                ];

                if ($this->pickModel->addPick($data)) {
                    redirect('picks');
                } else {
                    die('Something went wrong');
                }

            } else {

                $data = [
                    'giftDescription' => '',
                    'image' => '',
                    'url' => '',
                    'country' => '',
                    'language' => ''
                ];

                $this->view('picks/add', $data);
            }
        }

        public function delete($id){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                if($this->pickModel->deletePick($id)){
                    redirect('picks');
                } else {
                    die('Something went wrong');
                }
            } else {

                redirect('picks');
            }
        }

        public function edit($id) {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $pickId = $this->pickModel->getPickById($id);

                $data = [
                    'id' => $id,
                    'giftDescription' => trim($_POST['giftDescription']),
                    'image' => trim($_POST['image']),
                    'url' => trim($_POST['url']),
                    'country' => trim($_COOKIE['country']),
                    'language' => trim($_COOKIE['lang'])
                ];

                if ($this->pickModel->editPick($data)) {
                    redirect('picks');
                } else {
                    die('Something went wrong');
                }
            } else {

                $pick = $this->pickModel->getPickById($id);

                $data = [
                    'id' => $id,
                    'giftDescription' => $pick->giftDescription,
                    'image' => $pick->image,
                    'url' => $pick->url,
                    'country' => $pick->country,
                    'language' => $pick->language
                ];

                $this->view('picks/edit', $data);
            }
        }

        
    }