<?php
class Pages extends Controller{
    public function __construct()
    {
       // echo 'pages loaded';
    //    $this->postModel = $this->model('Post');
        
    }
    public function index(){
    //    $posts = $this->postModel->getPosts();
    if(isLoggedIn()){
        redirect('posts');
    }
       $data = [
           'title' => 'SharePosts',
           'description' => 'Simple social network built on the TraversyMVC PHP framework'
       ];
      // $this->view('index');
       $this->view('pages/index', $data);

    }

    public function about(){
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];
        $this->view('pages/about', $data);
      
    }
}
 ?>