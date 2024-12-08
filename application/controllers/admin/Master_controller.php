<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_controller extends MY_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Master_model','master');  
    }

    public function company_master(){
        $current_url = $_SERVER['REQUEST_URI']; // Get the current URL
    
    // Parse the URL to extract the path
    $url_parts = parse_url($current_url);
    $path_segments = explode('/', trim($url_parts['path'], '/')); // Trim leading/trailing slashes

    // Initialize data array
    $data = array();

    // Get the last segment of the path if available
    if (!empty($path_segments)) {
        $last_segment = end($path_segments);
        $data['title'] = $last_segment; // Add the last segment to the data array
    } else {
        $data['title'] = 'default_segment'; // Set a default segment if the path is empty
    }

    // Render the page with the extracted data
    $this->render_page('admin/master/mas_comp', $data);
    }
    public function expense_master(){
        $current_url = $_SERVER['REQUEST_URI']; // Get the current URL
    
    // Parse the URL to extract the path
    $url_parts = parse_url($current_url);
    $path_segments = explode('/', trim($url_parts['path'], '/')); // Trim leading/trailing slashes

    // Initialize data array
    $data = array();

    // Get the last segment of the path if available
    if (!empty($path_segments)) {
        $last_segment = end($path_segments);
        $data['title'] = $last_segment; // Add the last segment to the data array
    } else {
        $data['title'] = 'default_segment'; // Set a default segment if the path is empty
    }

       // Render the page with the extracted data
       $this->render_page('admin/master/mas_expense',$data);
    }
    public function role_master(){
        $current_url = $_SERVER['REQUEST_URI']; // Get the current URL
    
    // Parse the URL to extract the path
    $url_parts = parse_url($current_url);
    $path_segments = explode('/', trim($url_parts['path'], '/')); // Trim leading/trailing slashes

    // Initialize data array
    $data = array();

    // Get the last segment of the path if available
    if (!empty($path_segments)) {
        $last_segment = end($path_segments);
        $data['title'] = $last_segment; // Add the last segment to the data array
    } else {
        $data['title'] = 'default_segment'; // Set a default segment if the path is empty
    }

       // Render the page with the extracted data
       $this->render_page('admin/master/mas_role',$data);
    }

    public function seq_master(){
        $current_url = $_SERVER['REQUEST_URI']; // Get the current URL
    
    // Parse the URL to extract the path
    $url_parts = parse_url($current_url);
    $path_segments = explode('/', trim($url_parts['path'], '/')); // Trim leading/trailing slashes

    // Initialize data array
    $data = array();

    // Get the last segment of the path if available
    if (!empty($path_segments)) {
        $last_segment = end($path_segments);
        $data['title'] = $last_segment; // Add the last segment to the data array
    } else {
        $data['title'] = 'default_segment'; // Set a default segment if the path is empty
    }

       // Render the page with the extracted data
       $this->render_page('admin/master/autonumber',$data);
    }
   

}