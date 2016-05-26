<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Chart extends CI_Controller {

	public function __construct() {
	    parent::__construct();

		$this->load->model('Tendencias');
		$this->load->model('Candidaturas');

		$this->load->helper('url');

    }

	public function display($source=2,$candidatura=1) {

        $data['source']=$source;
        $data['candidatura']=$candidatura;

		$this->load->view('chart_frame',$data);

	}


	public function tendency($source=2,$candidatura=1) {

		$color=array('PNP'=>'#0000FF','PPD'=>'#FF0000','PIP'=>'#009933','PPR'=>'#FF9900','OTR'=>'#5D5D5D',
					'MUS'=>'#4eb6af','PPT'=>'#68318f','SI'=>'FF0000','NO'=>'0000FF','ESTAD'=>'#0000FF',
					'INDEP'=>'#009933','ELAS'=>'#FF0000','IND'=>'#CCCCCC','MAP'=>'#CCCCCC');

		$title=$this->Candidaturas->get_candidatura($candidatura);



		echo '<chart canvasPadding="10" caption="Tendencia '.$title.'" yAxisName="Porciento" bgColor="F7F7F7, E9E9E9" numVDivLines="10" divLineAlpha="30"  labelPadding ="10" yAxisValuesPadding ="10" showValues="1" rotateValues="1" valuePosition="auto">';
		echo '<categories>';

		$categories = $this->Tendencias->get_categories($source,$candidatura);
		foreach ($categories as $row){
			echo '<category label="'.$row->generated.'" />' ;
		}
        echo '</categories>';

		$totals = $this->Tendencias->get_totals($source,$candidatura);
		$partidos = $this->Tendencias->get_partidos($source,$candidatura);
		foreach ($partidos as $row){
			echo '<dataset seriesName="'.$row->partido.'" color="'.$color[$row->partido].'" >';
				foreach ($totals as $row2){
					if ($row->partido == $row2->partido) echo '<set value="'.$row2->porciento.'" />';
				}
			echo '</dataset>';

		}

		echo '</chart>';
		//$this->load->view('chart_data');


    }

	public function test($source=2,$candidatura=1) {

		echo json_encode($this->Tendencias->get_totals($source,$candidatura));

	}



}
