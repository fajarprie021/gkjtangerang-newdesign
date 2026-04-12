<?php
$this->load->view('layout/header');

if (isset($content)) {
    $this->load->view($content);
}

$this->load->view('layout/footer');
?>
