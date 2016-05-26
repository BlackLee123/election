<?php

class Candidaturas extends CI_model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_candidatura($candidatura) {
		$query = $this->db->query('select descripcion from candidatura where id = ?',$candidatura);
		$result=$query->row();

		return $result->descripcion;
	}

    public function get_all() {
        $query = $this->db->query('select id,descripcion from candidatura');
        $result=$query->result();

        return $result;
    }


	public function get_list($candidatura='ALCALDE') {

		if ($candidatura == 'ALCALDE')
			$query = $this->db->query('select id,descripcion from candidatura where id between 7 and 84');

		if ($candidatura == 'SENADOR_DISTRITO')
			$query = $this->db->query('select id,descripcion from candidatura where id between 85 and 92');

		if ($candidatura == 'REPRESENTANTE_DISTRITO')
			$query = $this->db->query('select id,descripcion from candidatura where id between 93 and 132');

		$result=$query->result();

		return $result;
	}

}

