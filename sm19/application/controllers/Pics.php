<?php
//application/controller/Pics.php

class Pics extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pics_model');
    }

    public function index()
    {
        $this->config->set_item('title','Pictures (from Flickr)');

        $nav1 = $this->config->item('nav1');

        $data['title'] = 'Pics (sourced from Flickr)';
        $data['tags'] = ['Sounders', 'Mariners', 'Seattle', 'SeaHawks', 'Amazon', 'Amazon Spheres', 'Space Needle'];

        $this->load->view('pics/index', $data);
    }

    public function view($tag = NULL)
    {
        $this->config->set_item('title', 'Pictures of ' . $tag);

        $data['title'] = 'Pictures of ' . utf8_decode(urldecode($tag));
        $data['pics'] = $this->pics_model->get_pics($tag);

        //var_dump($data);
        //die;

        if (empty($data['pics']))
        {
            show_404();
        }

        $this->load->view('pics/view', $data);
    }
    
}
?>