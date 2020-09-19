<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_model extends CI_Model {
    public function get_coaching_by_access_code($access_code){
		$this->db->where ('coaching_url', $access_code);
		$this->db->or_where ('reg_no', $access_code);
		$this->db->from ('coachings');
		$sql = $this->db->get ();
		if  ($sql->num_rows () > 0 ) {
			$result = $sql->row_array ();
			return $result;
		} else {
			return false;
		}
    }
    public function courses ($coaching_id=0, $cat_id='-1', $status=COURSE_STATUS_ACTIVE) {
		$this->db->select ('CONCAT(M.first_name, " ", M.last_name) AS user_name, CC.*');
		$this->db->from ('coaching_courses CC');
		$this->db->join ('members M', 'CC.created_by=M.member_id');
		$this->db->where ('CC.coaching_id', $coaching_id);
		if ($cat_id == '-1') {
			
		} else if ($cat_id == 0) {
			$this->db->where ('CC.cat_id', 0);
			$this->db->or_where ('CC.cat_id', NULL);
		} else {
			$this->db->where ('CC.cat_id', $cat_id);
		}
		if ($status > COURSE_STATUS_ALL) {
			$this->db->where('CC.status', $status);
		}
		$this->db->order_by ('CC.created_on', 'DESC');
		$sql = $this->db->get();
		$courses = $sql->result_array();
		$result  = [];
		if (! empty($courses)) {
			foreach ($courses as $i => $course) {
				$cat_id = intval ($course['cat_id']);
				$cat = $this->get_course_category_by_id ($cat_id);
				if ($cat) {
					$course['cat_title'] = $cat['title'];
				}
				$course['feat_img'] = ($course['feat_img']!='')?site_url($course['feat_img']):site_url('contents/system/default_course.jpg');
				$course['created_on'] = date('d-m-Y', $course['created_on']);
				$lessons = $this->get_lessons ($coaching_id, $course['course_id']);
				$course['total_lessons'] = count($lessons);
				$tests = $this->get_course_tests ($coaching_id, $course['course_id'], TEST_TYPE_PRACTICE);
				$course['total_tests'] = count($tests);
				$result[] = $course;
			}
		}
		return $result;
    }
    public function get_course_category_by_id ($category_id=0) {
		$this->db->where('cat_id', $category_id);
		$sql = $this->db->get('coaching_course_category');
		return $sql->row_array();
    }
    public function course ($coaching_id, $course_id) {
    	$this->db->select ('CONCAT(M.first_name, " ", M.last_name) AS user_name, CC.*');
		$this->db->from ('coaching_courses CC');
		$this->db->join ('members M', 'CC.created_by=M.member_id');
		$this->db->where ('CC.coaching_id', $coaching_id);
        $this->db->where('CC.course_id', $course_id);
		$this->db->order_by ('CC.created_on', 'DESC');
        $sql = $this->db->get();
        $result = $sql->row_array();
        if(!empty($result)){
        	$result['feat_img'] = site_url($result['feat_img']);
			$result['created_on'] = date('d-m-Y', $result['created_on']);
	        $result['lessons'] = $this->get_lessons ($coaching_id, $course_id);
			$result['tests'] = $this->get_course_tests ($coaching_id, $course_id, TEST_TYPE_PRACTICE);
			if(COURSE_ENROLMENT_BATCH == $result['enrolment_type']){
				$result['batches'] = $this->get_batches ($coaching_id, $course_id);
			}
			$result['teachers'] = $this->get_teachers_assigned ($coaching_id, $course_id);
			return $result;
        }else{
        	return false;
        }
    }
    public function get_lessons ($coaching_id=0, $course_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->order_by ('position', 'ASC');
		$sql = $this->db->get ('coaching_course_lessons');
		$lessons = $sql->result_array();
		foreach ($lessons as $i => $lesson) {
			$this->db->where ('coaching_id', $coaching_id);
			$this->db->where ('course_id', $course_id);
			$this->db->where ('lesson_id', $lesson['lesson_id']);
			$sql = $this->db->get ('coaching_course_progress');
			$progress = $sql->result_array();
			$lessons[$i]['progress'] = empty($progress)?false:true;
		}
		return $lessons;
    }
    public function get_course_tests ($coaching_id=0, $course_id=0, $status='-1', $type=0) {
		if ( $course_id > 0 ) {
			$this->db->where ('course_id', $course_id);
		}
		if ( $type > 0 ) {
			$this->db->where ('test_type', $type);
		}
		$this->db->where ('finalized', 1);
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->order_by ('creation_date', 'DESC');
		
		$query = $this->db->get ("coaching_tests");
		$results = $query->result_array();	
		return $results;
    }
    public function get_batches ($coaching_id=0, $course_id=0) {
		$today = time ();
	    $this->db->select ('CB.*');
	    $this->db->from ('coaching_course_batches CB');
	    $this->db->where ('CB.coaching_id', $coaching_id);
    	$this->db->where ('CB.course_id', $course_id);
    	$this->db->where ('CB.end_date >', $today);
	    $sql = $this->db->get ();
	    $batches = $sql->result_array ();

	    $result = [];
	    if (! empty ($batches)) {
	    	foreach ($batches as $batch) {
			    $this->db->select ('COUNT(BU.member_id) AS num_users');
			    $this->db->from ('coaching_course_batch_users BU');
			    $this->db->where ('BU.coaching_id', $coaching_id);
		    	$this->db->where ('BU.course_id', $course_id);
		    	$this->db->where ('BU.batch_id', $batch['batch_id']);
			    $sql = $this->db->get ();
			    $row = $sql->row_array ();
			    $num_users = $row['num_users'];
			    $batch['num_users'] = $num_users;
			    $result[] = $batch;
	    	}
	    }

	    return $result;
	}
    public function get_teachers_assigned ($coaching_id=0, $course_id=0, $status=1) {
		$this->db->select('member_id');
		$this->db->from('coaching_course_teachers');
		$this->db->where ('course_id', $course_id);
		$sub_query = $this->db->get_compiled_select();

		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('status', $status);
		$this->db->where ('role_id', USER_ROLE_TEACHER);
		$this->db->where ("member_id IN ($sub_query)");
		$sql = $this->db->get ('members');
		return $sql->result_array();
	}
}