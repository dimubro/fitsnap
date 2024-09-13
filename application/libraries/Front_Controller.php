<?php

class Front_Controller extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        if (!defined('IMG')) define('IMG', base_url('images') . "/");
        if (!defined('UP')) define('UP', base_url('uploads') . "/");
        if (!defined('UPT')) define('UPT', base_url('uploads/thumbs') . "/");
    }



    function view($page, $data = [])
    {
        
        $this->load->view($page, $data);
    }

    function check_session(){
        if(!$this->session->patient){
            redirect(base_url().'login');
        }
    }

    
}
