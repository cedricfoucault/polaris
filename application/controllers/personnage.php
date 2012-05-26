<?php

class Personnage extends CI_Controller {
	
	public function __construct() {
			parent::__construct();
			$this->load->model('personnage_model');
			$this->load->model('utilisateur_model');
	}
	
    public function index() {
        $this->chercher();
    }
    
    public function chercher() {
        $this->load->helper('form');
        $nom_perso = $this->input->post('nom_perso');
        $nom_utilisateur = $this->input->post('nom_utilisateur');
        $nb = $this->input->post('nb');
        if ($nom_perso) {
            $persos_temp = $this->personnage_model->get_all_by_nom($nom_perso);
            $persos = array();
            foreach ($persos_temp as $perso) {
                $utilisateur = $this->utilisateur_model->get_by_id($perso['id_joueur']);
                $perso['nom_joueur'] = $utilisateur['nom'];
                $persos[] = $perso;
            }
        }
        if ($nom_utilisateur) {
            if ($this->utilisateur_model->existe_nom($nom_utilisateur)) {
                $utilisateur = $this->utilisateur_model->get_by_nom($nom_utilisateur);
                $persos_temp = $this->personnage_model->get_all_by_utilisateur($utilisateur['id']);
                foreach ($persos_temp as $perso) {
                   $perso['nom_joueur'] = $utilisateur['nom'];
                   $persos[] = $perso;
                }   
            } else {
                $persos = array();
            }
        }
        if ($nb) {
            $persos_temp = $this->personnage_model->get_last_persos($nb);
            $persos = array();
            foreach ($persos_temp as $perso) {
                $utilisateur = $this->utilisateur_model->get_by_id($perso['id_joueur']);
                $perso['nom_joueur'] = $utilisateur['nom'];
                $persos[] = $perso;
            }
        }
        
        $data['title'] = "Recherche de personnages";
        $this->load->view('templates/header', $data);
        $this->load->view('chercher', $data);
        if (isset($persos)) {
            $data['persos'] = $persos;
            $this->load->view('resultats', $data);
        }
        $this->load->view('templates/footer', $data);
    }
	
	public function voir($id_perso = '0') {
        $data['title'] = "Voir un personnage";
        $perso = $this->personnage_model->get_perso($id_perso);
        
        if ($perso == -1) {
            show_404();
        } else {
            $data['perso'] = $perso;
            $this->load->view('templates/header', $data);
            $this->load->view('voir_perso', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    
    public function supprimer($id_perso) {
        $id_proprietaire = $this->personnage_model->get_proprietaire($id_perso);
        
        if ($this->session->userdata('connecté') && ($this->session->userdata('id') == $id_proprietaire)) {
            $this->personnage_model->supprimer($id_perso);
            redirect('utilisateur/voir/'.$this->session->userdata('id'));
        } else {
            show_error("Vous n'avez pas l'autorisation de supprimer le personnage d'un autre utilisateur.");
        }
    }
	
	public function creation() {
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('nom', 'Nom', 
			'trim|required|min_length[2]|max_length[32]|xss_clean|callback_nom_unique');
		$this->form_validation->set_rules('sexe', 'Sexe', 'required');
		
		$this->form_validation->set_rules('taille', 'Taille', 'trim|required|max_length[3]');
		$this->form_validation->set_rules('peau', 'Peau', 'trim|required|max_length[64]');
		$this->form_validation->set_rules('corpulence', 'Corpulence', 'trim|required|max_length[64]');
		$this->form_validation->set_rules('cheveux', 'Cheveux', 'trim|required|max_length[64]');
		$this->form_validation->set_rules('yeux', 'Yeux', 'trim|required|max_length[64]');
		$this->form_validation->set_rules('signes', 'Signes Particuliers', 'trim');
		
		$this->form_validation->set_rules('for', 'Force', 'required|max_length[2]');
		$this->form_validation->set_rules('con', 'Constitution', 'required|max_length[2]');
		$this->form_validation->set_rules('coo', 'Coordination', 'required|max_length[2]');
		$this->form_validation->set_rules('ada', 'Adaptation', 'required|max_length[2]');
		$this->form_validation->set_rules('per', 'Perception', 'required|max_length[2]');
		$this->form_validation->set_rules('int', 'Intelligence', 'required|max_length[2]');
		$this->form_validation->set_rules('vol', 'Volonté', 'required|max_length[2]');
		$this->form_validation->set_rules('pre', 'Présence', 'required|max_length[2]');
		$this->form_validation->set_rules('pc_depense_attributs', 
		    'Points de création convertis en points d\'attributs', 'required|max_length[2]');
		    
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		if ($this->form_validation->run() == FALSE) {
    		$data['title']                  = 'Création de personnage';
    		$data['cout_attributs']         = $this->personnage_model->get_cout_attributs();
    		$data['mutations']              = $this->personnage_model->get_mutations();
    		$data['cout_mutations']         = $this->personnage_model->get_cout_mutations();
    		$data['avantages']              = $this->personnage_model->get_avantages();
    		$data['cout_avantages']         = $this->personnage_model->get_cout_avantages();
    		$data['desavantages']           = $this->personnage_model->get_desavantages();
    		$data['cout_desavantages']      = $this->personnage_model->get_cout_desavantages();
    		$data['origines_geographiques'] = $this->personnage_model->get_origines_geographiques();
    		$data['origines_sociales']      = $this->personnage_model->get_origines_sociales();
    		$data['formations']             = $this->personnage_model->get_formations();
    		$data['etudes_superieures']     = $this->personnage_model->get_etudes_superieures();
    		$data['professions']            = $this->personnage_model->get_professions();
    		$this->load->view('templates/header', $data);
    		$this->load->view('creation', $data);
    		$this->load->view('templates/footer', $data);
	    } else {
	        $id_perso = $this->creer();
	        if ($id_perso != -1) {
	            $data['title'] = 'Création - Succès';
	            $data['id_perso'] = $id_perso;
	            $this->load->view('templates/header', $data);
        		$this->load->view('creation_succes', $data);
        		$this->load->view('templates/footer', $data);
	        } else {
	            $data['title'] = 'Création - Échec';
	            $this->load->view('templates/header', $data);
        		$this->load->view('creation_echec', $data);
        		$this->load->view('templates/footer', $data);
	        }
	    }
	}
	
	public function cout_attributs() {
		$data['title'] = 'Coût de points d\'attributs par niveau';
		$data['cout_attributs'] = $this->personnage_model->get_cout_attributs();
		$this->load->view('templates/header', $data);
		$this->load->view('cout_attributs', $data);
		$this->load->view('templates/footer', $data);
	}
	
    public function creer() {
        $perso = $this->input->post(NULL, TRUE);
        $perso['id_utilisateur'] = $this->session->userdata('id');
        // $perso['nom'] = $this->input->post('nom', TRUE);
        
        $perso['chance'] = 13;
        // calcul du modificateur de dommages
        if ($perso['for'] <= 2) {
            $perso['dom'] = -6;
        } else if ($perso['for'] <= 4) {
            $perso['dom'] = -4;
        } else {
            $perso['dom'] = ($perso['for'] - 10) / 2;
        }
        // calcul de la résistance aux dommages
        if (($perso['for'] + $perso['con']) <= 2) {
            $perso['res_dom'] = 6;
        } else if (($perso['for'] + $perso['con']) <= 4) {
            $perso['res_dom'] = 4;
        } else {
            $perso['res_dom'] = (10 - ($perso['for'] + $perso['con'])) / 2;
        }
        // calcul de la résistance aux poisons, maladies et radiations
        if ($perso['con'] <= 2) {
            $perso['res_poi'] = 6;
        } else if ($perso['con'] <= 4) {
            $perso['res_poi'] = 4;
        } else {
            $perso['res_poi'] = (10 - $perso['con']) / 2;
        }
        $perso['res_mal'] = $perso['res_poi'];
        $perso['res_rad'] = $perso['res_poi'];
        // calcul de la résistance aux drogues
        if (($perso['con'] + $perso['vol']) / 2 <= 2) {
            $perso['res_poi'] = 6;
        } else if (($perso['con'] + $perso['vol']) / 2 <= 4) {
            $perso['res_poi'] = 4;
        } else {
            $perso['res_poi'] = (10 - (($perso['con'] + $perso['vol']) / 2)) / 2;
        }
        // calcul de la réaction
        $perso['rea'] = ($perso['ada'] + $perso['per']) / 2;
        // calcul du souffle
        $perso['souffle'] = ($perso['con'] + $perso['vol']) / 2;
        // attributs inconnus
        $perso['choc'] = 0; //!!
        $perso['res_dro'] = 0; //!!
        
        
        
        $age = 16;
        $annees = $perso['professions_annees'];
        $post_professions = $perso['professions'];
        $professions = array();
        foreach ($post_professions as $index => $id) {
            $professions[$id] = $annees[$index];
            $age += $annees[$index];
        }
        $perso['professions'] = $professions;
        $perso['age'] = $age;
        
        return $this->personnage_model->creer($perso);
    }
    
    public function nom_unique($nom) {
        $id_utilisateur = $this->session->userdata('id');
        if ($this->personnage_model->existe($id_utilisateur, $nom)) {
			$this->form_validation->set_message('nom_unique', 'Vous avez déjà crée un perso avec ce nom :(');
			return FALSE;
		}
		else {
			return TRUE;
		}
    }
    
    public function id() {
        $data['title'] = 'View id';
        $this->load->view('templates/header', $data);
        echo $this->session->userdata('id');
        $this->load->view('templates/footer', $data);
    }
}

/* End of file personnage.php */
/* Location: ./application/controllers/personnage.php */
