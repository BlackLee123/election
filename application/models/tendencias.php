<?php

class Tendencias extends CI_model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_totals($source,$candidatura) {
		$query = $this->db->query('
		select t.generated,partido,ifnull(round(votos/total*100,2),0) porciento
		from tendencia t inner join candidato on t.candidato=candidato.id
		inner join (
			select generated,sum(votos) total
			from tendencia inner join candidato on tendencia.candidato=candidato.id
			where source=? and candidatura=?
			group by generated ) s
		on t.generated=s.generated
		where source=? and candidatura=?
		group by generated,partido',array($source,$candidatura,$source,$candidatura));

		$result=$query->result();

		return $result;
	}

	public function get_categories($source,$candidatura) {
		$query = $this->db->query('
		select distinct time(generated) generated
		from tendencia t inner join candidato on t.candidato=candidato.id
		where source=? and candidatura=? order by date(generated),time(generated)',array($source,$candidatura));

		$result=$query->result();

		return $result;
	}

	public function get_partidos($source,$candidatura) {
		$query = $this->db->query('
		select distinct partido
		from tendencia t inner join candidato on t.candidato=candidato.id
		where source=? and candidatura=? order by partido',array($source,$candidatura));

		$result=$query->result();

		return $result;
	}


}

