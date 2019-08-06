<?php
//application/views/pics/view.php

$this->load->view($this->config->item('theme') . 'header');

echo '<h2>' . $title. '</h2>';

foreach($pics as $pic){
    $size = 'm';
    $photo_url = 'http://farm'. $pic->farm . '.staticflickr.com/' . $pic->server . '/' . $pic->id . '_' . $pic->secret . '_' . $size . '.jpg';
    
    echo '<div style="margin:0px 50px 20px 50px; display:inline-block; width:200px; font-size:80%; text-align:center;">';
    echo '<img src="' . $photo_url . '" alt="' . $pic->title . '" style="padding-bottom:0.5em;" />';
    echo '<div>' . $pic->title . '</div>';
    echo '</div>';
}

$this->load->view($this->config->item('theme') . 'footer');

?>