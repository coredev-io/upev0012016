<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vinculacion extends CI_Controller {

        public function index(){
                $data['main_cont']             = 'vinculacion/index';
                $this->load->view('includes/template_principal',$data);
        }
}