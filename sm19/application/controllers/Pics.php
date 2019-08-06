<?php
//application/controller/Pics.php
class Pics extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('pics_model');
            
                /*
                $this->config->set_item('banner','News Section');
                $this->load->model('news_model');
                $this->load->helper('url_helper');
                
                */
        }
        
        public function index()
        {
            $this->config->set_item('title','Pictures (from Flickr)');
           
            $nav1 = $this->config->item('nav1');
           
            $data['title'] = 'Pics (sourced from Flickr)';
            $data['tags'] = ['Sounders', 'Mariners', 'Seattle', 'SeaHawks', 'Amazon', 'Amazon Spheres', 'Space Needle'];

            $this->load->view('pics/index', $data);
        }
        
        public function index1()
        {
           
           // $api_key = $this->config->item('flickrKey');
           /*
            $tags = 'bears,polar';

            $perPage = 25;
            $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
            $url.= '&api_key=' . $api_key;
            $url.= '&tags=' . $tags;
            $url.= '&per_page=' . $perPage;
            $url.= '&format=json';
            $url.= '&nojsoncallback=1';
 
            $response = json_decode(file_get_contents($url));
            $pics = $response->photos->photo;
            */
 
            /*
            echo "<pre>";
            echo var_dump($response);
            echo "</pre>";
            die;
            */
 
            $tags = 'sounders'; 
            $pics = $this->pics_model->get_pics($tags);
           
            /*
            echo "<pre>";
            var_dump($pics);
            echo "</pre>";
            die;
            */
           
           
            foreach($pics as $pic){

                $size = 'm';
                $photo_url = '
                http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';

                echo "<img title='" . $pic->title . "' src='" . $photo_url . "' />";
 
        }

           
           
           /*
            $this->config->set_item('title','Seattle Sports News');
           
            $nav1 = $this->config->item('nav1');
           
            //var_dump($nav1);
            //die;
           
            $data['news'] = $this->news_model->get_news();
            $data['title'] = 'News archive';

            //$this->load->view('templates/header', $data);
            $this->load->view('news/index', $data);
            //$this->load->view('templates/footer', $data);
            
            */
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