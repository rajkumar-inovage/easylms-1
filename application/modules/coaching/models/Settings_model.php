<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {
    
	// Save account
	public function update_account ($coaching_id=0) {
		$data = array (
						'address'=>			$this->input->post ('address'), 
						'city'=>			$this->input->post ('city'), 
						'state'=>			$this->input->post ('state'), 
						'pin'=>				$this->input->post ('pin'), 
						'coaching_name'=>	$this->input->post ('coaching_name'), 
						'website'=>			$this->input->post ('website'), 
					);

		// update account
		$this->db->where ('id', $coaching_id);
		$this->db->update ('coachings', $data);
	}

	// Save user account
	public function user_account ($coaching_id=0) {
			$data = array (
						'approve_student'=> intval($this->input->post ('approve_student')), 
						'approve_teacher'=> intval($this->input->post ('approve_teacher')), 
					);
			if ($this->get_settings ($coaching_id)) {
				// update account
				$this->db->where ('coaching_id', $coaching_id);
				$this->db->update ('coaching_settings', $data);
			} else {
				// insert account
				$data['coaching_id'] = $coaching_id;
				$this->db->insert ('coaching_settings', $data);
			}
	}

	// Save user account
	public function get_settings ($coaching_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$sql = $this->db->get ('coaching_settings');
		return $sql->row_array();
	}

	// Upload LOGO
	public function upload_logo ($coaching_id=0) {
		
		$this->load->helper('directory');
		$this->load->helper('file');
		
		$coaching = $this->coaching_model->get_coaching ($coaching_id);
		$coaching_dir = 'contents/coachings/' . $coaching_id . '/';
		$file_name = $this->config->item ('coaching_logo');
		$file_path =  $coaching_dir . $file_name;
		
		if ( ! is_dir ($coaching_dir) ) {
			mkdir ($coaching_dir, 0755, true);
		}
		
		// upload parameters
		$options['upload_path'] = $coaching_dir;
		$options['allowed_types'] = 'gif|jpg|png';
		$options['max_size']	= MAX_FILE_SIZE;
		$options['file_name']	= $file_name;
		$options['overwrite']	= true;
		
		// load upload library
		$this->load->library ('upload', $options); 		
		
		if ( ! $this->upload->do_upload ('userfile') ) {
			$response = $this->upload->display_errors ();
		} else {   
			$upload_data = $this->upload->data();			
			$config['image_library'] = 'gd2';
			$config['source_image']	= $file_path;
			$config['create_thumb'] = false; 
			$config['maintain_ratio'] = false;
			$config['width']	 	= 220;
			$config['height']		= 70;
			$config['master_dim']	= 'auto';
			
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$response = false;
		}		
		return $response;;
	}

	public function get_logo ($coaching_id=0) {
		$coaching_dir = 'contents/coachings/' . $coaching_id . '/';
		$coaching_logo = $this->config->item ('coaching_logo');
		$logo_path =  $coaching_dir . $coaching_logo;
		$logo = base_url ($logo_path);
		if (read_file ($logo)) {
			return $logo;
		} else {
			return false;
		}
	}
	
	// Classrooms
	public function get_classrooms ($coaching_id=0, $limit=0) {
		$this->db->where ('coaching_id', $coaching_id);
		if ($limit > 0) {
			$this->db->limit ($limit);
		}
		$sql = $this->db->get ('coaching_classrooms');
		return $sql->result_array ();
	}

	public function create_classroom ($coaching_id=0, $id=0) {
		$data['title'] = $this->input->post ('title');
		if ($id > 0) {
			$this->db->set ($data);
			$this->db->where ('id', $id);
			$this->db->where ('coaching_id', $coaching_id);
			$this->db->update ('coaching_classrooms');
		} else {
			$data['coaching_id'] = $coaching_id;
			$data['created_on'] = time ();
			$data['created_by'] = $this->session->userdata ('member_id');
			$sql = $this->db->insert ('coaching_classrooms', $data);
		}
	}

	public function delete_classroom ($coaching_id=0, $id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('id', $id);
		$sql = $this->db->delete ('coaching_classrooms');

		$this->db->set ('id', 0);
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('id', $id);
		$sql = $this->db->update ('coaching_course_schedules');
	}

	public function save_eula ($coaching_id=0) {

		$eula_text = $this->input->post ('eula_text');

		$this->db->set ('eula_text', $eula_text);
		$this->db->where ('coaching_id', $coaching_id);
		$sql = $this->db->update ('coaching_settings');
		return true;
	}

	public function save_custom_text ($coaching_id=0) {

		$custom_text_login = $this->input->post ('custom_text_login');
		$custom_text_register = $this->input->post ('custom_text_register');

		$this->db->set ('custom_text_login', $custom_text_login);
		$this->db->set ('custom_text_register', $custom_text_register);
		$this->db->where ('coaching_id', $coaching_id);
		$sql = $this->db->update ('coaching_settings');
		return true;
	}
} 