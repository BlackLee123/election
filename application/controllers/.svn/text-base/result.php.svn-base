<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Result extends CI_Controller {

	public function __construct() {
	    parent::__construct();

		$this->load->model('Results');
		$this->load->model('Candidaturas');

		$this->load->helper('url');
    }


	public function index() {
		$this->load->view('index');
	}

	public function detail($source=2,$candidatura=1) {

		// source == 1 | source == 2  1,2 are result source 3,4 are projections
        //$this->output->cache(10);
		$subtitle=array('','RESULTADO','RESULTADO','PROYECCION','PROYECCION',' RESULTADO PREVIO');


        $candidatos=$this->Results->get_total_candidatos($source,$candidatura);
        $total=$this->Results->get_total_votos($source,$candidatura);
		$escrutado=$this->Results->get_tally_escrutado($source,$candidatura);


		foreach ($candidatos as $row){
            $row->porciento=round($total->total_votos == 0 ? 0 : $row->total/$total->total_votos*100,2);
            $row->total=number_format($row->total);
        }

		if ($source == 1 | $source == 2 | $source == 5)
		{
			$cargo = $this->Results->get_tally_cargo($source,$candidatura);
			$tally_porciento = round($cargo->unidades == 0 ? 0 : $escrutado->unidades/$cargo->unidades*100,2);
			$participacion_porciento=round($escrutado->total_inscritos == 0 ? 0 : $total->total_votos/$escrutado->total_inscritos*100,2);
			$escrutado->unidades = number_format($escrutado->unidades);

			$data['date']= date('l dS F Y');
		}
		else
		{
			$cargo = $this->Results->get_tally_cargo($source-2,$candidatura);
			$tally_porciento = round(100,2);
			$participacion_porciento=round($cargo->total_inscritos == 0 ? 0 : $total->total_votos/$cargo->total_inscritos*100,2);
			$escrutado->unidades = number_format($cargo->unidades);

			$data['date']= '<br>';
		}

		$total->total_votos=number_format($total->total_votos);
		$escrutado->total_inscritos=number_format($escrutado->total_inscritos);
		$cargo->unidades=number_format($cargo->unidades);
		$cargo->total_inscritos=number_format($cargo->total_inscritos);

		$data['title']=$this->Candidaturas->get_candidatura($candidatura);
        $data['subtitle']= $subtitle[$source];
		$data['candidatos']=$candidatos;
        $data['total']=$total;
		$data['escrutado']=$escrutado;
		$data['cargo']=$cargo;
		$data['tally_porciento']=$tally_porciento;
		$data['participacion_porciento']=$participacion_porciento;

	    $this->load->view('main',$data);
    }

	public function map($source=2,$candidatura='ALCALDE') {

        $title = array('ALCALDE'=>'ALCALDIAS','SENADOR_DISTRITO'=>'SENADORES POR DISTRITO',
                       'REPRESENTANTE_DISTRITO'=>'REPRESENTANTES POR DISTRITO');

		$candidaturas=$this->Candidaturas->get_list($candidatura);

		$data['candidaturas']=$candidaturas;
        $data['title']=$title[$candidatura];


		$this->load->view('map',$data);

	}

    public function tendencia_menu($source=2) {

        $candidaturas=$this->Candidaturas->get_all();

        $data['title']='TENDENCIAS';
        $data['candidaturas']=$candidaturas;
        $this->load->view('tendencia_menu',$data);


    }

    public function json($source=2,$candidatura=1) {

		echo json_encode($this->Results->get_total_candidatos($source,$candidatura));
        echo '<br>'.'--------------------------------------------------------------------------'.'<br>';
        echo json_encode($this->Results->get_total_votos($source,$candidatura));
        echo json_encode($this->Results->get_tally_escrutado($source,$candidatura));
        echo '<br>'.'--------------------------------------------------------------------------'.'<br>';
        echo json_encode($this->Results->get_graph_totals($source,$candidatura));
        echo '<br>'.'--------------------------------------------------------------------------'.'<br>';
        echo json_encode($this->Results->get_total_candidatos($source+2,$candidatura));
        echo '<br>'.'--------------------------------------------------------------------------'.'<br>';
        echo json_encode($this->Results->get_total_votos($source+2,$candidatura));
        echo json_encode($this->Results->get_tally_cargo($source,$candidatura));
        echo '<br>'.'--------------------------------------------------------------------------'.'<br>';
        echo json_encode($this->Results->get_graph_totals($source+2,$candidatura));
		echo '<br>'.'--------------------------------------------------------------------------'.'<br>';


    }

}
