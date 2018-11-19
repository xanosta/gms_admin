<?php 

    class Blogs extends Controller {

        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->blogModel = $this->model('Blog');
        }

        public function index(){

            //Set the default language
            $language = 'es';
            $country = 'ES';

            // Get blogs
            $blogs = $this->blogModel->getBlogs($language, $country);
                    
            $data = [
                'blogs' => $blogs
            ];

            $this->view('blogs/index', $data);
        }

        public function add(){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $data = [
                    'title' => trim($_POST['title']),
                    'user_id' => (int)$_SESSION['user_id'],
                    'color' => trim($_POST['color']),
                    'body' => trim($_POST['body']),
                    'image' => trim($_POST['image']),
                    'caption' => trim($_POST['caption']),
                    'url' => trim($_POST['url']),
                    'country' => trim($_COOKIE['country']),
                    'language' => trim($_COOKIE['lang']) 
                ];

                if($this->blogModel->addBlog($data)){
                    
                    redirect('blogs');
                } else {

                    die('Something went wrong');
                }
            } else {

                $data = [
                    'title' => '',
                    'body' => '',
                    'image' => '',
                    'caption' => '',
                    'url' => '',
                    'country' => '',
                    'language' => '' 
                ];
    
                $this->view('blogs/add', $data);
            }     
        }
        /**
         * Function that takes the id param and edit the blog attached to the id.
         */
        public function edit($id){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $blogId = $this->blogModel->getBlogById($id);


                $data = [
                    //'id' => trim($_POST['id']),
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'user_id' => (int)$_SESSION['user_id'],
                    'color' => trim($_POST['color']),
                    'body' => trim($_POST['body']),
                    'image' => trim($_POST['image']),
                    'caption' => trim($_POST['caption']),
                    'url' => trim($_POST['url']),
                    'country' => trim($_COOKIE['country']),
                    'language' => trim($_COOKIE['lang']) 
                ];

                if($this->blogModel->editBlog($data)){
                    //die(var_dump($data));
                    redirect('blogs');
                } else {

                    die('Something went wrong');
                }

            } else {
                $blog = $this->blogModel->getBlogById($id);

                $data = [
                    'id' => $id,
                    'title' => $blog->title,
                    'color' => $blog->color,
                    'body' => $blog->body,
                    'image' => $blog->image,
                    'caption' => $blog->caption,
                    'url' => $blog->url,
                    'country' => $blog->country,
                    'language' => $blog->language 
                ];
    
                $this->view('blogs/edit', $data);
            } 
        }

        public function delete($id){
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
                if($this->blogModel->deleteBlog($id)){

                    redirect('blogs');
                } else {

                    die('Something went wrong');
                }
            } else {

                redirect('blogs');
            }
        }

        
    }