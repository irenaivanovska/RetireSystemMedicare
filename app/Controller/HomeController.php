<?php

class HomeController extends AppController {

    public function index(){
        $this->set('title_for_layout', 'Home');
    }
    public function about(){

    }
    public function faq()
    {
        $this->layout = 'FAQ';
    }
}


?>