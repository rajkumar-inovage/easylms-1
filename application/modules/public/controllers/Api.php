<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MX_Controller {

	public function __construct() {
		// Load Config and Model files required throughout Users sub-module
		$config = ['config_api'];
		$models = ['api_model'];
		$this->common_model->autoload_resources($config, $models);
    }
    public function get_coaching_id($access_code){
        $coaching 		= $this->api_model->get_coaching_by_access_code ($access_code);
        if ($coaching != false){
            return $coaching['id'];
        }else{
            return null;
        }
    }
	public function courses ($access_code, $cat_id='-1') {
        if(isset($access_code)){
    		$coaching_id = $this->get_coaching_id($access_code);
            if($coaching_id !== null){
                $courses = $this->api_model->courses ($coaching_id, $cat_id);
                $this->output->set_content_type("application/json");
                if(!empty($courses)){
                    $this->output->set_output(
                        json_encode(
                            array(
                                'status'=>true,
                                'courses'=> $courses
                            )
                        )
                    );
                }else{
                    $this->output->set_output(
                        json_encode(
                            array(
                                'status'=>false,
                                'message'=> '0 Courses found.'
                            )
                        )
                    );
                }
            }else{
                $this->output->set_content_type("application/json");
                $this->output->set_output(
                    json_encode(
                        array(
                            'status'=>false,
                            'message'=> 'Invalid Access Code.'
                        )
                    )
                );
            }
        }else{
            $this->output->set_content_type("application/json");
            $this->output->set_output(
                json_encode(
                    array(
                        'status'=>false,
                        'message'=> 'Access Code is Required.'
                    )
                )
            );
        }
    }
    public function course ($access_code, $course_id=0) {
        if(isset($access_code)){
            $coaching_id = $this->get_coaching_id($access_code);
            if($coaching_id !== null){
                if($course_id>0){
                    $course = $this->api_model->course ($coaching_id, $course_id);
                    $this->output->set_content_type("application/json");
                    if($course != false){
                        $this->output->set_output(
                            json_encode(
                                array(
                                    'status'=>true,
                                    'course'=> $this->api_model->course ($coaching_id, $course_id)
                                )
                            )
                        );
                    }else{
                        $this->output->set_output(
                            json_encode(
                                array(
                                    'status'=>false,
                                    'message'=> 'Course not found.'
                                )
                            )
                        );
                    }
                }else{
                    $this->output->set_content_type("application/json");
                    $this->output->set_output(
                        json_encode(
                            array(
                                'status'=>false,
                                'message'=> 'Course not found, Invalid Course ID Provided.'
                            )
                        )
                    );
                }
            }else{
                $this->output->set_content_type("application/json");
                $this->output->set_output(
                    json_encode(
                        array(
                            'status'=>false,
                            'message'=> 'Invalid Access Code.'
                        )
                    )
                );
            }
        }else{
            $this->output->set_content_type("application/json");
            $this->output->set_output(
                json_encode(
                    array(
                        'status'=>false,
                        'message'=> 'Access Code is Required.'
                    )
                )
            );
        }
	}
}