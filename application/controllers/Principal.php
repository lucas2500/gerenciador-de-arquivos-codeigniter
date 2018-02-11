<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct(){
		
		parent::__construct();
		$this->load->model('arquivo_model', 'file');
		$this->load->library('session');
	}

	public function index(){

		$data['msg'] = $this->session->flashdata('msg');
		$data['arquivos'] = $this->file->getArquivos();

		$this->load->view('home', $data);

	}

	public function salvarArquivo(){

		$path = "./uploads/";
		if ( ! is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		$configUpload['upload_path']   = $path;
		$configUpload['allowed_types'] = 'pptx|docx|pdf|zip|rar|doc|jpg|png';
			// $configUpload['remove_spaces'] = TRUE;
			// $config['overwrite'] = TRUE;
		$configUpload['encrypt_name']  = FALSE;
		$this->upload->initialize($configUpload);
		if ($this->upload->do_upload('arquivo')){

			$file = $this->upload->data();

			$data2['nome'] = $file['raw_name'].$file['file_ext'];

			$this->file->insertArquivo($data2);

			$this->session->set_flashdata('msg', 'Arquivo salvo com sucesso!!');
			redirect("principal/index");

		} else{

			$this->session->set_flashdata('msg', 'Erro ao salvar o arquivo!!');
			redirect("principal/index");

		}
	}

	public function baixar($ID=NULL){

		if($ID == NULL){

			redirect('principal/index');
		}

		$data = $this->file->getArquivo($ID);

		if($data != NULL){

			$file = $data->nome;

			force_download('./uploads/'.$file, NULL);

		}

	}

	public function excluir($ID=NULL){

		if($ID == NULL){

			redirect('principal/index');
		}

		$data = $this->file->getArquivo($ID);

		if($data != NULL){

			$this->file->deleteArquivo($ID);

			$file = $data->nome;

			unlink('./uploads/'.$file);

			$this->session->set_flashdata('msg', 'Arquivo excluído com sucesso!!');
			redirect("principal/index");
		}

	}
}
