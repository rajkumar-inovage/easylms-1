<?php defined('BASEPATH') or exit ('No direct script access allowed');

class Lessons_model extends CI_Model {

	public function __construct () {
		parent:: __construct ();
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
	public function get_lesson ($coaching_id=0, $course_id=0, $lesson_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$sql = $this->db->get ('coaching_course_lessons');
		return $sql->row_array ();
	}
	public function get_top_pages ($coaching_id=0, $course_id=0, $lesson_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$where = '(parent_id=0 OR parent_id="NULL")';
		$this->db->where ($where);
		$this->db->order_by ('position', 'ASC');
		$sql = $this->db->get ('coaching_course_lesson_pages');
		return $sql->result_array ();
	}

	public function get_all_pages ($coaching_id=0, $course_id=0, $lesson_id=0) {
		$output = [];
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$this->db->order_by ('position', 'ASC');
		$sql = $this->db->get ('coaching_course_lesson_pages');
		$result = $sql->result_array ();
		return $result;
	}
	
	public function get_child_pages ($coaching_id=0, $course_id=0, $lesson_id=0, $parent_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$this->db->where ('parent_id', $parent_id);
		$this->db->order_by ('position', 'ASC');
		$sql = $this->db->get ('coaching_course_lesson_pages');
		return $sql->result_array ();
	}
	public function get_last_page ($coaching_id=0, $course_id=0, $lesson_id=0) {
		$this->db->select_max ('position');
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$sql = $this->db->get ('coaching_course_lesson_pages');
		$row = $sql->row_array ();
		$position = $row['position'];
		return $position;
	}
	public function get_next_page ($coaching_id=0, $course_id=0, $lesson_id=0, $page_id=0) {
		$this->db->select ('page_id');
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$this->db->where ('page_id', $page_id);
		$sql = $this->db->get ('coaching_course_lesson_pages');
		$row = $sql->row_array ();
		$position = $row['position'];
		return $position;
	}
	public function get_full_progress($member_id=0, $coaching_id=0, $course_id=0){
		$this->db->where ('member_id', $member_id);
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$sql = $this->db->get ('coaching_course_progress');
		return $sql->result_array();
	}


	public function get_progress ($coaching_id=0, $member_id=0, $course_id=0) {
		return 0;
	}

	public function mark_progress ($coaching_id=0, $member_id=0, $course_id=0, $lesson_id=0, $page_id=0) {
		if ($page_id > 0) {

			$data['coaching_id']	 	= $coaching_id;
			$data['member_id']	 		= $member_id;
			$data['course_id']	 		= $course_id;
			$data['lesson_id']	 		= $lesson_id;
			$data['page_id']	 		= $page_id;

			$this->db->where ('coaching_id', $coaching_id);
			$this->db->where ('member_id', $member_id);
			$this->db->where ('course_id', $course_id);
			$this->db->where ('lesson_id', $lesson_id);
			$this->db->where ('page_id', $page_id);
			$sql = $this->db->get ('coaching_course_progress');

			if ($sql->num_rows() > 0) {
				$this->db->set ('created_on', time ());
				$this->db->where ($data);
				$this->db->update ('coaching_course_progress');
			} else {
				$data['created_on']	  		= time ();
				$this->db->insert ('coaching_course_progress', $data);
			}
		}
	}

	public function is_page_viewed ($coaching_id=0, $member_id=0, $course_id=0, $lesson_id=0, $page_id=0) {

		$data['coaching_id']	 	= $coaching_id;
		$data['member_id']	 		= $member_id;
		$data['course_id']	 		= $course_id;
		$data['lesson_id']	 		= $lesson_id;
		$data['page_id']	 		= $page_id;

		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('member_id', $member_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$this->db->where ('page_id', $page_id);
		$sql = $this->db->get ('coaching_course_progress');

		if ($sql->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function get_page ($coaching_id=0, $course_id=0, $lesson_id=0, $page_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$this->db->where ('page_id', $page_id);
		$this->db->order_by ('position', 'ASC');
		$sql = $this->db->get ('coaching_course_lesson_pages');
		return $sql->row_array ();
	}
	public function get_attachments ($coaching_id=0, $course_id=0, $lesson_id=0, $page_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$this->db->where ('page_id', $page_id);
		$sql = $this->db->get ('coaching_course_lesson_attachments');
		return $sql->result_array ();
	}
	public function get_attachment ($coaching_id=0, $course_id=0, $lesson_id=0, $page_id=0, $att_id=0) {
		$this->db->where ('coaching_id', $coaching_id);
		$this->db->where ('course_id', $course_id);
		$this->db->where ('lesson_id', $lesson_id);
		$this->db->where ('page_id', $page_id);
		$this->db->where ('att_id', $att_id);
		$sql = $this->db->get ('coaching_course_lesson_attachments');
		return $sql->row_array ();
	}	
}