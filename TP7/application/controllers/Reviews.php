<?php

class Reviews extends CI_Controller {

	public function show($id) {

		$this->load->model('reviews_model');
		$reviews = $this->reviews_model->get_reviews($id);
		$data['title'] = $reviews['title'];
		$data['grade'] = $reviews['grade'];
		$this->load->view('movie_review', $data);

	}

	public function index($start = 0) {

		$this->load->helper('url');
		$this->load->model('reviews_model');
		$reviews = $this->reviews_model->get_index($start);
		$data['result'] = $reviews;
		$data['start'] = $start;
		$data['max'] = $this->reviews_model->get_nb_reviews();
		$this->load->view('index_review', $data);

	}

	public function add() {

		$this->load->helper('form');

		$this->load->view('add_review');

	}

	public function do_add() {

		// NB : Les données du formulaire sont récupérées en POST

		$this->load->model('reviews_model');
		if ($this->reviews_model->do_add($_POST)) {
			$this->index ();
		} else {
			$this->load->view('errors/html/error_db');
		}

	}

}
