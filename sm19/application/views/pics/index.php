<?php
//application/views/news/index.php

$this->load->view($this->config->item('theme') . 'header');

echo "<h2>$title</h2>";

echo "<ul>";
foreach($tags as $tag_item) {
    echo "<li><a href='" . site_url("/pics/view/" . $tag_item) . "'>" . $tag_item . "</a></li>";
}
echo "</ul>";

?>

<br/><br/>

<?php echo validation_errors(); ?>
<?php echo form_open('pics/search'); ?>
    <label for="search_tag">Search tag:</label>
    <input type="input" name="search_tag" /><br />

    <input type="submit" name="submit" value="Search" />
</form>

<?php

$this->load->view($this->config->item('theme') . 'footer');

?>