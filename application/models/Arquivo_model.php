<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arquivo_model extends CI_Model{

	public function insertArquivo($nome=NULL){

		if($nome != NULL):

			$this->db->insert('arquivo', $nome);
		endif;

	}


	public function getArquivos(){

		$this->db->order_by('ID', 'DESC');
		$query = $this->db->get('arquivo');

		return $query->result();

	}


	public function getArquivo($ID=NULL){

		if($ID != NULL):

			$this->db->select('nome');
			$this->db->where('ID', $ID);
			$query = $this->db->get('arquivo');

			return $query->row();
		endif;

	}


	public function deleteArquivo($ID=NULL){

		if($ID != NULL):

			$this->db->where('ID', $ID);
			$this->db->delete('arquivo');
		endif;

	}

}
