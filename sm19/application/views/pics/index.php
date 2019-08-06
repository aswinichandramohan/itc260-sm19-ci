<?php
//application/views/news/index.php

$this->load->view($this->config->item('theme') . 'header');

echo "<h2>$title</h2>";

echo "<ul>";
foreach($tags as $tag_item) {
    echo "<li><a href='" . site_url("/pics/view/" . $tag_item) . "'>" . $tag_item . "</a></li>";
}
echo "</ul>";

$this->load->view($this->config->item('theme') . 'footer');

?>