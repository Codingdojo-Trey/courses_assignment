<?php  
	class Course extends CI_Model
	{
		public function add_course($array)
		{
			$query = "INSERT INTO courses (name, description, updated_at, created_at)
					  VALUES (?, ?, NOW(), NOW())";
			$this->db->query($query, $array);
			return $this->db->insert_id();
		}

		public function get_all_courses()
		{
			$query = "SELECT * FROM courses";
			return $this->db->query($query)->result_array();
		}

		public function get_course_by_id($id)
		{
			$query = "SELECT * FROM courses WHERE id = {$id}";
			return $this->db->query($query)->row_array();
		}

		public function delete_course($id)
		{
			$query = "DELETE FROM courses WHERE id = '{$id}'";
			return $this->db->query($query);
		}
	}

?>