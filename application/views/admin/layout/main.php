<?php
$this->load->view('admin/layout/header');

if (isset($content)) {
    $this->load->view($content);
}

$this->load->view('admin/layout/footer');
?>
