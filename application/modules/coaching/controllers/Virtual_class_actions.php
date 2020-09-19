 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Virtual_class_actions extends MX_Controller {	

	var $toolbar_buttons = [];

	public function __construct () {		
	    // Load Config and Model files required throughout Users sub-module
	    $config = ['config_coaching', 'config_virtual_class'];
	    $models = ['virtual_class_model', 'users_model', 'coaching_model', 'enrolment_model'];
	    $this->common_model->autoload_resources ($config, $models);
	    $this->load->helper ('string');

	    $cid = $this->uri->segment (4);
	}


	/*-----===== VC Categories =====-----*/
	public function add_category ($coaching_id=0, $category_id=0) {

		$this->form_validation->set_rules ('title', 'Title', 'required');

		if ($this->form_validation->run () == true) {
			$id = $this->virtual_class_model->create_category ($coaching_id, $category_id);
			if ($category_id > 0) {
				$message = 'Category updated successfully';
				$redirect = 'coaching/virtual_class/categories/'.$coaching_id;
			} else {
				$message = 'Category created successfully';
				$redirect = 'coaching/virtual_class/categories/'.$coaching_id;
			}
			$this->message->set ($message, 'success', true);
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>true, 'message'=>$message, 'redirect'=>site_url ($redirect) )));
		} else {
			$this->output->set_content_type("application/json");
			$this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}	    
	}
	
	// Delete VC Category
	public function remove_category ($coaching_id=0, $category_id=0) {
		// Check if this plan is given to any coaching
		$this->virtual_class_model->remove_category ($coaching_id, $category_id);
		$this->message->set ('Category deleted successfully', 'success', true);
		redirect ('coaching/virtual_class/categories/'.$coaching_id);
	}

	/* Virtual Class */
	public function create_classroom ($coaching_id=0, $class_id=0, $course_id=0, $batch_id=0) {
		$this->form_validation->set_rules ('class_name', 'Virtual Classroom Name', 'required|max_length[250]|trim', ['alpha_numeric'=>'Class name can contain only alphabets and numbers without spaces']);
		$this->form_validation->set_rules ('description', 'Description', 'max_length[500]|trim');
		$this->form_validation->set_rules ('welcome_message', 'Welcome Message', 'max_length[100]|trim');

		$batch = $this->enrolment_model->get_batch ($coaching_id, $course_id, $batch_id);

		$start_date = strtotime($this->input->post ('start_date'));
		$end_date = $batch['end_date'];

		if ($this->form_validation->run () == true) {
			if ($start_date < $batch['start_date'] || $start_date > $batch['end_date']) {
				$this->output->set_content_type("application/json");
		        $this->output->set_output(json_encode(array('status'=>false, 'error'=>'Out of range value for start date' )));
			} else if ($end_date < $batch['start_date'] || $end_date > $batch['end_date']) {
				$this->output->set_content_type("application/json");
		        $this->output->set_output(json_encode(array('status'=>false, 'error'=>'Out of range value for end date' )));
			} else {
				$id = $this->virtual_class_model->create_classroom ($coaching_id, $class_id, $course_id, $batch_id);
				
				$this->virtual_class_model->add_participants($coaching_id, $id, $course_id, $batch_id);

				if ($class_id > 0) {
					$message = 'Classroom updated successfully';
				} else {
					$message = 'Classroom created successfully';
				}
				if (isset ($_GET['page']) && $_GET['page'] == 'schedule') {
					$redirect = 'coaching/enrolments/schedule/'.$coaching_id.'/'.$course_id.'/'.$batch_id;
				} else {
					$redirect = 'coaching/virtual_class/index/'.$coaching_id.'/'.$course_id.'/'.$batch_id;
				}
				$this->message->set ($message, 'success', true);
				$this->output->set_content_type("application/json");
		        $this->output->set_output(json_encode(array('status'=>true, 'message'=>'Virtual classroom created successfully', 'redirect'=>site_url ($redirect) )));
			}
		} else {
			$this->output->set_content_type("application/json");
	        $this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}

	public function delete_class ($coaching_id=0, $class_id=0, $course_id=0, $batch_id=0) {
		$this->virtual_class_model->delete_class ($coaching_id, $class_id);
		$this->message->set ('Classroom deleted successfully', 'success', true);
		redirect ('coaching/virtual_class/index/'.$coaching_id.'/'.$course_id.'/'.$batch_id);
	}


	public function add_participants ($coaching_id=0, $class_id=0, $course_id=0, $batch_id=0) {
		$this->form_validation->set_rules ('users[]', 'User', 'required', ['required'=>'You have not selected any %s']);

		if ($this->form_validation->run () == true) {
			$role_id = $this->input->post ('role_id');

			if ($role_id == USER_ROLE_TEACHER) {
				$this->virtual_class_model->add_instructors ($coaching_id, $class_id, $course_id, $batch_id);
			} else {
				$this->virtual_class_model->add_participants ($coaching_id, $class_id, $course_id, $batch_id);
			}
			$this->message->set ('Participants added successfully', 'success', true);
			$this->output->set_content_type("application/json");
	        $this->output->set_output(json_encode(array('status'=>true, 'message'=>'Participants added successfully', 'redirect'=>site_url ('coaching/virtual_class/participants/'.$coaching_id.'/'.$class_id.'/'.$course_id.'/'.$batch_id ) )));
		} else {
			$this->output->set_content_type("application/json");
	        $this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}

	public function remove_participants ($coaching_id=0, $class_id=0, $course_id=0, $batch_id=0) {
		$this->form_validation->set_rules ('users[]', 'User', 'required', ['required'=>'You have not selected any %s']);

		if ($this->form_validation->run () == true) {
			$this->virtual_class_model->remove_participants ($coaching_id, $class_id);
			$this->message->set ('Participants removed successfully', 'success', true);
			$this->output->set_content_type("application/json");
	        $this->output->set_output(json_encode(array('status'=>true, 'message'=>'Participants removed successfully', 'redirect'=>site_url ('coaching/virtual_class/participants/'.$coaching_id.'/'.$class_id.'/'.$course_id.'/'.$batch_id ) )));
		} else {
			$this->output->set_content_type("application/json");
	        $this->output->set_output(json_encode(array('status'=>false, 'error'=>validation_errors() )));
		}
	}

	public function get_running_meetings ($coaching_id=0) {
		$meetings = $this->virtual_class_model->get_running_meetings ($coaching_id);
		$this->output->set_content_type("application/json");
        $this->output->set_output(json_encode(array('status'=>true, 'data'=>$meetings )));
	}

	public function participant_actions ($coaching_id=0, $class_id=0, $course_id=0, $batch_id=0)	{
		
		$action = $this->input->post ('action');
		$users = $this->input->post ('users');

		if ( empty ($users)) {
			$this->output->set_content_type("application/json");
	        $this->output->set_output(json_encode(array('status'=>false, 'error'=>'Select some users before performing this action' )));
		} else if ($action == "0") {
			$this->output->set_content_type("application/json");
	        $this->output->set_output(json_encode(array('status'=>false, 'error'=>'Select an action' )));	
		} else {
			if ($action == 'remove') {
				$this->remove_participants ($coaching_id, $class_id, $course_id, $batch_id);
			} else if ($action == 'send_sms') {
				$this->send_join_sms ($coaching_id, $class_id, $course_id, $batch_id);
				$this->output->set_content_type("application/json");
		        $this->output->set_output(json_encode(array('status'=>true, 'message'=>'SMS sent successfully')));
			}
		}
	}

	public function send_join_sms ($coaching_id=0, $class_id=0, $course_id=0, $batch_id=0) {
		$api_setting = $this->virtual_class_model->get_api_settings ('join_url');
		$class = $this->virtual_class_model->get_class ($coaching_id, $class_id);
		$coaching = $this->coaching_model->get_coaching ($coaching_id);
		$participants = $this->input->post ('users');

		if (! empty ($participants)) {
			foreach ($participants as $member_id) {
				$join = $this->virtual_class_model->join_class ($coaching_id, $class_id, $member_id);
				$user = $this->users_model->get_user ($member_id);
				if ($join) {
					// User is a participant in this classroom
					$meeting_url = $join['meeting_url'];
					$api_join_url = $api_setting['join_url'];
					$join_url = $api_join_url . $meeting_url;

					$contact = $user['primary_contact'];
					$data['name'] = $user['first_name'];
					$data['coaching_name'] = $coaching['coaching_name'];
					$data['class_name'] = $class['class_name'];
					$data['start_date'] = $class['start_date'];
					$data['join_url'] = $join_url;

					$message = $this->load->view (SMS_TEMPLATE . 'vc_add_participant', $data, true);
					$this->sms_model->send_sms ($contact, $message);
				}
			}
		}
		$this->output->set_content_type("application/json");
        $this->output->set_output(json_encode(array('status'=>true, 'message'=>'Link sent to selected participants', 'redirect'=>site_url ('coaching/virtual_class/participants/'.$coaching_id.'/'.$class_id.'/'.$course_id.'/'.$batch_id ) )));
    }

}