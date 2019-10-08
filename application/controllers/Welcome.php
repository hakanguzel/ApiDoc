<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

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
		$this->load->view('documentationview');
	}

	public function giris()
	{

		if (get_cookie('giris') == "112121") {
			redirect('');
		}
		$this->load->view('giris');
	}
	public function login()
	{
		$sifre = $this->input->post('sifre');
		if ($sifre == "112121") {
			set_cookie('giris', '112121', '3600');
			redirect('');
		}
		$this->load->view('welcome_message');
	}
}
