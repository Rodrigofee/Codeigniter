<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here


		$this->load->model('welcome_model');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function insert()
	{
		$configuracao = array(
			'upload_path'   => './uploads/',
			'allowed_types' => 'jpg',
			'file_name'     => '.jpg',
			'max_size'      => '5000'
		);
		$this->load->library('upload');
		$this->upload->initialize($configuracao);
		if ($this->upload->do_upload('imagem')) {

			//$this->image_lib->initialize($config);
			//$this->upload->resize();
			$data = $this->upload->data();
			$dados['imagem'] = $data['file_name'];
			$dados['evento_id'] = $this->input->post("evento_id");
			$dados['nome_evento'] = $this->input->post("nome_evento");
			$this->welcome_model->cadastrar($dados);
			echo 'Arquivo salvo com sucesso.';
			$this->load->view('welcome_message');
		} else {
			echo $this->upload->display_errors();
		}
	}

	public function insert1()
	{
		//print_r($_FILES['imagem']);
		//die;

		try {
			foreach ($_FILES as $field => $file) {
				if ($file['error'] == 0) {
					$this->load->library('upload');
					$config['upload_path']           =  './uploads/';
					$config['allowed_types']         =  'gif | jpg | png';
					$config['max_size']              =  100;
					$config['max_width']             =  1024;
					$config['max_height']            =  768;
					if ($this->upload->do_upload($field)) {

						$data = $this->upload->data();
						$dados['imagem'] = $data['file_name'];

						#GERANDO IMAGENS THUMBS
						/*	$config['source_image'] = $data['full_path'];
							$config['new_image'] = PATH_FRONT_END_UPLOAD . 'configuracoes/thumbs/';
							$config['create_thumb'] = false;
							$config['maintain_ratio'] = true;
							$config['width'] = 75;
							$config['height'] = 50;
							$this->image_lib->initialize($config);
							$this->image_lib->resize();*/
						#GERANDO IMAGENS MEDIUM
						/*$config['upload_path' ]  =  './uploads/' ; 
						$config['source_image'] = $data['full_path'];
						$config['new_image'] = PATH_FRONT_END_UPLOAD . './uploads/';
						$config['create_thumb'] = false;
						$config['maintain_ratio'] = true;
						$config['width'] = 320;
						$config['height'] = 240;*/

						$this->image_lib->initialize($config);
						$this->image_lib->resize();
					} else {
						$errors = $this->upload->display_errors();
						die($errors);
					}
				}
			}
			$this->db->insert('insert_arquivo', $dados);

			//$this->session->set_userdata('is_added', true);

			redirect('welcome_message');

			//return $this->db->insert_id();
		} catch (Exception $e) {
			throw $e;
		}
	}
}
