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
		$this->data['url'] = 'about';
		$this->data['services'] = $this->db->get_where('services',array('status =' => '0'))->result_array();
        $this->data['clients'] = $this->db->get_where('clients',array('status =' => '0'))->result_array();
       	$this->load->view('about',$this->data);
	}

	public function aboutCompany()
	{
		$this->data['url'] = 'about';
		$this->data['clients'] = $this->db->get_where('clients',array('status =' => '0'))->result_array();
       	$this->load->view('about',$this->data);
	}

	public function mission_vision()
	{
		$this->data['url'] = 'about';
		$this->load->view('missionvision',$this->data);
	}

	public function why_bit_institute()
	{
		$this->data['url'] = 'about';
		$this->data['clients'] = $this->db->get_where('clients',array('status =' => '0'))->result_array();
       	$this->load->view('why_bit_institute',$this->data);
	}

	public function message_from_chairman()
	{
		$this->data['url'] = 'about';
		$this->load->view('message_from_chairman',$this->data);
	}

	public function message_from_ceo()
	{
		$this->data['url'] = 'about';
		$this->load->view('message_from_ceo',$this->data);
	}

	public function partnership_affiliation()
	{
		$this->data['url'] = 'partner';
		$this->load->view('partnership_affiliation',$this->data);
	}
}
