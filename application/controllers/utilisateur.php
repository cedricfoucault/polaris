<?php

class Utilisateur extends CI_Controller {
	
	public function __construct() {
			parent::__construct();
			$this->load->model('utilisateur_model');
	}
	
	public function index() {
	    redirect('/utilisateur/identification');
	}
	
	public function voir($id) {
	    $this->load->model('personnage_model');
	    $utilisateur = $this->utilisateur_model->get_by_id($id);
	    if (!$utilisateur) {
	        show_404();
	    } else {
	        $persos = $this->personnage_model->get_all_by_utilisateur($id);
	        
	        $data['title'] = 'Page utilisateur';
	        $data['utilisateur'] = $utilisateur;
	        $data['persos'] = $persos;
	        $this->load->view('templates/header', $data);
    	    if ($this->session->userdata('connecté') && ($this->session->userdata('id') == $id)) {
                // page personnelle de l'utilisateur, droits privés
                $this->load->view('page_privee');
    	    } else {
    	        // page publique de l'utilisateur, "lecture uniquement"
                $this->load->view('page_publique');
    	    }   
    	    $this->load->view('templates/footer', $data);
	    }
	}
	
	public function identification() {
		$this->load->library('form_validation');
		$this->load->helper(array('email', 'form'));
		$this->form_validation->set_rules('identifiant', 'Identifiant', 
			'trim|required|xss_clean|callback_identifiant_valide');
		$this->form_validation->set_rules('mot_de_passe', 'Mot de passe',
		    'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
			
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Identifiez-vous';
			$this->load->view('templates/header', $data);
			$this->load->view('identification', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
		    $id = $this->input->post('identifiant');
		    $mdp = $this->input->post('mot_de_passe');
	        $utilisateur = $this->get_utilisateur($id);
	        if ($this->utilisateur_model->mdp_valide($utilisateur['id'], $mdp)) {
                $id    = intval($utilisateur['id']);
                $nom   = $utilisateur['nom'];
                $email = $utilisateur['email'];
                $newdata = array(
                    'id'              => $id,
                    'nom_utilisateur' => $nom,
                    'email'           => $email,
                    'connecté'        => TRUE
                );
                $this->session->set_userdata($newdata);
                redirect('/utilisateur/voir/'.$id);
		    } else {
		        $data['error'] = 'Le mot de passe ne correspond pas';
		        $data['title'] = 'Identifiez-vous';
    			$this->load->view('templates/header', $data);
    			$this->load->view('identification', $data);
    			$this->load->view('templates/footer', $data);
		    }
		}
	}

	function inscription() {
		if( ! ini_get('date.timezone') ) {
		   date_default_timezone_set('Europe/Paris');
		}
		
		$this->load->helper('form');
		$this->load->library(array('form_validation', 'encrypt'));
		
		$data['nom_utilisateur'] = 'Nom utilisateur';
		$data['mot_de_passe']    = 'Mot de passe';
		$data['confirmation']    = 'Confirmation';
		$data['email']           = 'Email';

		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		$this->form_validation->set_rules('nom_utilisateur', $data['nom_utilisateur'], 
			'trim|required|min_length[2]|max_length[24]|xss_clean|callback_nom_unique');
		$this->form_validation->set_rules('mot_de_passe', $data['mot_de_passe'], 
			'trim|required|min_length[5]');
		$this->form_validation->set_rules('confirmation', $data['confirmation'],
			'trim|required|matches[mot_de_passe]');
		$this->form_validation->set_rules('email', $data['email'],
			'trim|required|valid_email|callback_email_unique');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Inscription';
			$this->load->view('templates/header', $data);
			$this->load->view('inscription', $data);
			$this->load->view('templates/footer', $data);
		}
		else {
            $this->utilisateur_model->creer();
            $data['title'] = 'Inscription - Succès';
            $this->load->view('templates/header', $data);
            $this->load->view('inscription_succes', $data);
            $this->load->view('templates/footer', $data);
		}
	}
	
	public function deconnexion() {
	    $this->session->set_userdata(array('connecté' => FALSE));
        redirect('/utilisateur/identification', 'location');
        // $this->identification();
	}
	
	public function identifiant_valide($id) {
		if (valid_email($id)) {
			// un email a été donné
			$this->form_validation->set_message(
    			'identifiant_valide', 
    			'Cet email n\'appartient à aucun membre.'
			);
			return $this->utilisateur_model->existe_email($id);
		} else {
			// un nom a été donné
			$this->form_validation->set_message(
				'identifiant_valide', 
				'Cet nom n\'appartient à aucun membre.'
			);
			return $this->utilisateur_model->existe_nom($id);
		}
	}
	
	public function get_utilisateur($id) {
		if (valid_email($id)) {
			return $this->utilisateur_model->get_by_email($id);
		} else {
			return $this->utilisateur_model->get_by_nom($id);
		}
	}
	
	public function nom_unique($nom) {
		if ($this->utilisateur_model->existe_nom($nom)) {
			$this->form_validation->set_message('nom_unique', 'Ce nom est déjà pris :(');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	public function ajax_nom_valide() {
		$nom = $this->input->post('nom');
		if ($this->utilisateur_model->existe_nom($nom)) {
			echo "false";
		} else {
			echo "true";
		}
	}
	
	public function email_unique($email) {
		if ($this->utilisateur_model->existe_email($email)) {
			$this->form_validation->set_message('email_unique', 'Cet email existe déjà !');
			return FALSE;
		}
		else {
			return TRUE;
		}
	}
	
	public function ajax_email_valide() {
		$this->load->helper('email');
		$email = $this->input->post('email');
		if ($this->utilisateur_model->existe_email($email) || (!valid_email($email))) {
			echo "false";
		} else {
			echo "true";
		}
	}
}
?>