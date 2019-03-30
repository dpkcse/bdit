<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('about');
	}

	public function aboutCompany()
	{
		$this->load->view('about');
	}

	public function mission_vision()
	{
		$this->load->view('missionvision');
	}

	public function why_bit_institute()
	{
		$this->load->view('why_bit_institute');
	}

	public function message_from_chairman()
	{
		$this->load->view('message_from_chairman');
	}

	public function message_from_ceo()
	{
		$this->load->view('message_from_ceo');
	}

	public function partnership_affiliation()
	{
		$this->load->view('partnership_affiliation');
	}
}
