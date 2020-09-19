<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Coaching extends MX_Controller {
    public function __construct () {
	}
	public function data($coaching_id,$fileName=null) {
		if($fileName == null){
			$fileName = $this->config->item ('coaching_logo');
			redirect ('public/coaching/data/'.$coaching_id.'/'.$fileName);
		}
		if(isset($coaching_id)&&isset($fileName)){
			$coaching_dir = 'contents/coachings/' . $coaching_id . '/';
			$logo_path =  $coaching_dir . $fileName;
			$logo = base_url ($logo_path);
			if (@file_get_contents($logo)) {
				$file_info = new finfo(FILEINFO_MIME_TYPE);
				$type = $file_info->buffer(file_get_contents($logo));
				$this->output->set_content_type($type);
				$this->output->set_output(file_get_contents($logo));
			}
		}
	}
	public function upload($coaching_id) {
		$upload_dir = $this->config->item ('upload_dir'). "coachings/$coaching_id/";
		if(isset($_FILES['file'])){
			/*
			$data = file_get_contents($_FILES['file']['tmp_name']);
			$base64 = 'data:' . $_FILES['file']['type'] . ';base64,' . base64_encode($data);
			$this->output->set_content_type("application/json");
			$this->output->set_output(
				json_encode(
					array(
						'status' => true,
						'location' => $base64,
						'alt' => $_FILES['file']['name']
					)
				)
			);
			*/
			$this->load->helper ('directory');
			$this->load->helper ('file');
			$map = directory_map ('./' . $upload_dir);
			if ( ! is_array ($map)) {
				@mkdir ($upload_dir, 0755, true);
			}

			$config['upload_path'] = './' . $upload_dir; 
			$config['allowed_types'] = 'gif|jpg|png';
			$config['overwrite'] = true;

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('file')) {
				$upload_data = $this->upload->data();
			}
			if(!empty($upload_data)){
				$this->output->set_content_type("application/json");
				$this->output->set_output(
					json_encode(
						array(
							'status' => true,
							'location' => site_url( $upload_dir . $upload_data['file_name']),
							'alt' => $upload_data['orig_name'],
							'width' => $upload_data['image_width'],
							'height' => $upload_data['image_height'],
						)
					)
				);
			}
		}
	}
}