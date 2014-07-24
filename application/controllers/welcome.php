<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function awesome()
	{
		$this->load->view('awesome_view');
	}

	public function process()
	{
		
		//add to the db here
		//or validate
		//or whatever
		echo 'this sucks';
		echo json_encode($this->input->post());
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */