<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller 
{
	public function index()
	{	
		$view_data['courses'] = $this->course->get_all_courses();
		$this->load->view('courses_index_view', $view_data);
		$this->output->enable_profiler(TRUE);
	}

	public function add()
	{
		$this->load->library('form_validation');
		#this method takes 3 arguments:
		# 1. the name of the form element to validate
		# 2. the name you would like to go in the error message
		# 3. what to validate
		$this->form_validation->set_rules('name','course name','required|callback_filter_stuff');
		$this->form_validation->set_rules('description', 'course description', 'required|callback_filter_stuff');
		if($this->form_validation->run())
		{
			#we autoloaded the course model because we have huge swag
			#run the model method using the attribute $this->course->add_course
			$id = $this->course->add_course($this->input->post());
			$this->session->set_flashdata('success', "you just added a course!  It has an id of {$id}");
		}
		else
		{
			$this->session->set_flashdata('errors', validation_errors());
		}
		redirect('/courses/index');
		
	}

	public function confirm($id)
	{
		$view_data['course'] = $this->course->get_course_by_id($id);
		$this->load->view('courses_confirm_view', $view_data);
	}	

	public function delete($id)
	{
		$this->course->delete_course($id);
		$this->session->set_flashdata('success', "you deleted a course, don't forget to study!");
		redirect(base_url('/courses/index'));	
	}

	public function filter_stuff($string)
	{
		if(preg_match("/[\^\!@#%&\(\)\\_\-\[\]\*\+=]/", $string))
		{
			$this->form_validation->set_message('filter_stuff', "The %s field must contain only numbers, letters, and spaces...we worked hard for this!");
			return false;
		}
		else
		{
			return true;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */