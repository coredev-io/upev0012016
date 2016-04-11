<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class Oferta extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('evaluacion', '', TRUE);
		$this->load->model('niveles', '', TRUE);
		$this->load->model('programas', '', TRUE);
		$this->load->model('infraestructura', '', TRUE);
	}

	//update apartado de programas academicos
	public function updateProgramasAcademicos() {
		if ($this->session->userdata('logged_in')) {
			$data['datos'] = $this->session->userdata('logged_in');
			// print_r(array_keys($this->input->post()));
			$keys = array_keys($this->input->post());
			$eval = $this->evaluacion->getLastEvaluacion($data['datos']['idUnidad']);

			//Se obtienen valores del primer nivel
			$dataNivel1 = array(
				'TotalProgramas' => $this->input->post('b9'),
				'idEvaluacion'   => $eval[0]->idEvaluacion,
			);
			$this->programas->update($dataNivel1);

			// a  BProgramasAcademicos
			foreach ($keys as $row) {
				if (strlen($row) <= 8) {
					if (strpos($row, '-') !== false) {
						if (strpos($row, 'a') !== false) {
							$datos = array(
								"BProgramasAcademicos" => $this->input->post($row),
								"idUnidad"             => $data['datos']['idUnidad'],
								"idBloque"             => substr($row, 0, 3),
								"idEvaluacion"         => $eval[0]->idEvaluacion,

							);
							$this->evaluacion->update_BProgramasAcademicos($datos);

						}
					}
				}
			}

			redirect('oferta/reg/'.$eval[0]->idEvaluacion, 'refresh');

		} else {
			redirect('login', 'refresh');
		}

	}

	//update laboratorios
	public function update_Laboratorios() {
		if ($this->session->userdata('logged_in')) {
			$data['datos'] = $this->session->userdata('logged_in');
			// print_r(array_keys($this->input->post()));
			$keys = array_keys($this->input->post());
			$eval = $this->evaluacion->getLastEvaluacion($data['datos']['idUnidad']);

			//Se obtienen valores del primer nivel
			$dataNivel1 = array(
				'AlumnosInscritos'   => $this->input->post('a10'),
				'CapacidadInstalada' => $this->input->post('b10'),
				'AulasEquipadas'     => $this->input->post('a11'),
				'TotalAulas'         => $this->input->post('b11'),
				'TotalLaboratorios'  => $this->input->post('b12'),
				'idEvaluacion'       => $eval[0]->idEvaluacion,
			);
			$this->infraestructura->update($dataNivel1);

			// a  BProgramasAcademicos
			foreach ($keys as $row) {
				if (strlen($row) <= 8) {
					if (strpos($row, '-') !== false) {
						if (strpos($row, 'b') !== false) {
							$datos = array(
								"BLaboratoriosEquipados" => $this->input->post($row),
								"idUnidad"               => $data['datos']['idUnidad'],
								"idBloque"               => substr($row, 0, 3),
								"idEvaluacion"           => $eval[0]->idEvaluacion,

							);
							$this->evaluacion->update_BLaboratoriosEquipados($datos);

						}
					}
				}
			}

			redirect('oferta/reg/'.$eval[0]->idEvaluacion, 'refresh');

		} else {
			redirect('login', 'refresh');
		}

	}

	public function reg() {
		if ($this->session->userdata('logged_in')) {
			$data['datos'] = $this->session->userdata('logged_in');
			if ($data['datos']['idRoles'] == 1) {
				//Admin
				echo "Permiso denegado";

			} else {
				//Escuela
				//Se obtiene id de la url
				$idUrl         = $this->uri->segment(3);
				$data['idUrl'] = $idUrl;

				//Se valida si el registro pertenece a la unidad
				$result = $this->evaluacion->getEvaluacionId($idUrl, $data['datos']['idUnidad']);

				//Si existe lo deja continuar
				if ($result) {
					// Obtener informacion de las tablas
					$data['ProgramasAcademicos'] = $this->evaluacion->getProgramasAcademicos($idUrl);
					$data['Infraestructura']     = $this->evaluacion->getInfraestructura($idUrl);

					//Obtiene informacion de los titulos
					// Nivel 1
					if ($this->niveles->nivel1(2)) {
						$nivel = $this->niveles->nivel1(2);
						foreach ($nivel as $row) {
							$array = array(
								'Nombre' => $row->Nombre,
								'Valor'  => $row->Valor,
							);
							$data["nivel1"] = $array;
						}
					}

					//Nivel 2
					if ($this->niveles->nivel2(2)) {
						$nivel = $this->niveles->nivel2(2);
						$a     = array();
						foreach ($nivel as $row) {
							$array = array(
								'Nombre' => $row->Nombre,
								'Valor'  => $row->Valor,
							);
							array_push($a, $array);
							$data["nivel2"] = $a;
						}
					}

					//Nivel 3 ProgramasAcademicos
					if ($this->niveles->nivel3(2, 3)) {
						$nivel = $this->niveles->nivel3(2, 3);
						$a     = array();
						foreach ($nivel as $row) {
							$array = array(
								'Nombre'      => $row->Nombre,
								'Indicadores' => $row->Indicadores,
								'Descripcion' => $row->Descripcion,
								'Valor'       => $row->Valor,
								'campo1'      => $row->campo1,
								'campo1id'    => $row->campo1id,
								'campo2'      => $row->campo2,
								'campo2id'    => $row->campo2id,
								'Despegable'  => $row->Despegable
							);
							array_push($a, $array);
							$data["nivelProgramasAcademicos"] = $a;
						}
					}

					//Nivel 3 Infraestructura
					if ($this->niveles->nivel3(2, 4)) {
						$nivel = $this->niveles->nivel3(2, 4);
						$a     = array();
						foreach ($nivel as $row) {
							$array = array(
								'Nombre'      => $row->Nombre,
								'Indicadores' => $row->Indicadores,
								'Descripcion' => $row->Descripcion,
								'Valor'       => $row->Valor,
								'campo1'      => $row->campo1,
								'campo1id'    => $row->campo1id,
								'campo2'      => $row->campo2,
								'campo2id'    => $row->campo2id,
								'Despegable'  => $row->Despegable
							);
							array_push($a, $array);
							$data["nivelInfraestructura"] = $a;
						}
					}
					//Bloque
					if ($this->evaluacion->getBloque($data['datos']['idUnidad'])) {
						$bloque = $this->evaluacion->getBloque($data['datos']['idUnidad']);
						$a      = array();
						foreach ($bloque as $row) {
							$array = array(
								'idBloques' => $row->idBloques,
								'Nombre'    => $row->Nombre,
							);
							array_push($a, $array);
							$data["bloques"] = $a;
						}
					}
					//Se obtine el registro de los valores del subnivel
					$data['IndicadorMs'] = $this->evaluacion->getEvaluacionSubnivelFiltro($data['datos']['idUnidad'], $idUrl);

					$data['main_cont'] = 'oferta/index';
					$this->load->view('includes/template_principal', $data);
				} else {
					redirect('login', 'refresh');
				}
			}
		} else {
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}

	}

}
