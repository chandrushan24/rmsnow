<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Settings_model','set');
    }

    public function is_logged_in()
    {
        $user = $this->session->userdata('userid');
        return isset($user);
    }
    
    protected function render_page($view,$data='')
    {
        $this->load->view('header', $data);
        $this->load->view($view, $data);
        $this->load->view('footer', $data);
    } 

}

?>