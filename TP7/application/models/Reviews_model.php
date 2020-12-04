<?php
class Reviews_model extends CI_Model {

	public function __construct() {
		$this->load->database();

	}

	public function get_reviews($id) {
		if ($id != FALSE) {
			$query = $this->db->get_where('TP7_Tests', array('id' => $id));
			return $query->row_array();
		} else {
			return FALSE;
		}
	}

	public function get_index($start) {

		$query = $this->db->order_by('grade','DESC')->limit(10, $start)->get('TP7_Tests');
		return $query->result();

	}

	public function get_nb_reviews() {

		return $this->db->count_all('TP7_Tests');

	}

	public function do_add($values) {

		$title = $values['title'];
		$grade = $values['grade'];

		return $this->db->query("INSERT INTO TP7_Tests VALUES (0, '$title', $grade)");
	}
}
