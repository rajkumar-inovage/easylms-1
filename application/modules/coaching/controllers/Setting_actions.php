<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Setting_actions extends MX_Controller {
	
	public function __construct () { 
	    $config = ['config_coaching'];
	    $models = ['coaching_model', 'settings_model'];
	    $this->common_model->autoload_resources ($config, $models);
	    $this->load->helper ('file');
	}

	public function update_account ($coaching_id=0) {
		$this->form_validation->set_rules ('coaching_name', 'Coaching Name ', 'required');
		$this->form_validation->set_rules ('address', 'Address ', 'required');
		$this->form_validation->set_rules ('city', 'City ', 'required');
		$this->form_validation->set_rules ('state', 'State ', 'required');
		$this->form_validation->set_rules ('pin', 'Pin ', 'required');
		$this->form_validation->set_rules ('website', 'Website', 'valid_url');
		
		if ($this->form_validation->run () == true) {				
			$id = $this->settings_model->update_account ($coaching_id);
			$message = 'Information updated successfully';
			$redirect = site_url('coaching/settings/index/'.$coaching_id);
			$this->message->set ($message, 'success', true) ;
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message, 'redirect'=>$redirect)));		
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}

	public function upload_logo ($coaching_id=0) {
		$response = $this->settings_model->upload_logo ($coaching_id);
		if ($response == false) {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>'Logo uploaded successfully', 'redirect'=>site_url('coaching/settings/index') )));
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>$response )));		
		}
	}

	public function remove_logo ($coaching_id=0) {
		$coaching_dir = 'contents/coachings/' . $coaching_id . '/';
		$coaching_logo = $this->config->item ('coaching_logo');
		$logo_path =  $coaching_dir . $coaching_logo;
		unlink($logo_path);
		redirect ('coaching/settings/index/'.$coaching_id);
	}

	public function user_account ($coaching_id=0) {
		
		$this->settings_model->user_account ($coaching_id);
		$this->output->set_content_type("application/json");
		$this->output->set_output(json_encode(array('status'=>true, 'message'=>'Settings updated', 'redirect'=>'')));
	}

	public function create_classroom ($coaching_id=0, $room_id=0) {
		$this->form_validation->set_rules ('title', 'Room Title ', 'required');

		if ($this->input->post ('room_id')) {
			$room_id = $this->input->post ('room_id');
		}

		if ($this->form_validation->run () == true) {				
			$id = $this->settings_model->create_classroom ($coaching_id, $room_id);
			$message = 'Classroom created successfully';
			$redirect = site_url('coaching/settings/classrooms/'.$coaching_id);
			$this->message->set ($message, 'success', true) ;
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message, 'redirect'=>$redirect)));		
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}

	public function delete_classroom ($coaching_id=0, $room_id=0) {		
		$this->settings_model->delete_classroom ($coaching_id, $room_id);
		$this->message->set ("Classroom deleted successfully", 'success', true);
		redirect('coaching/settings/classrooms/'.$coaching_id);
	}

	public function save_eula ($coaching_id=0) {
		$response = $this->settings_model->save_eula ($coaching_id);
		if ($response == true) {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>'EULA saved successfully', 'redirect'=>'')));
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>'There was an error saving EULA' )));
		}
	}

	public function save_custom_text ($coaching_id=0) {
		$this->form_validation->set_rules ('custom_text_login', 'Login message', 'max_length[250]|trim');
		$this->form_validation->set_rules ('custom_text_register', 'Register message', 'max_length[250]|trim');
		
		if ($this->form_validation->run () == true) {				
			$response = $this->settings_model->save_custom_text ($coaching_id);
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>'Message(s) saved successfully', 'redirect'=>'')));
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>'There was an error saving message(s)' )));		
		}
	}
}
