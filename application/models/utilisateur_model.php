<?php
class Utilisateur_model extends CI_Model {	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->library('encrypt');
	}
	
    public function creer() {
        $this->load->helper('date');
        $utilisateur = array(
            'nom'          => $this->input->post('nom_utilisateur'),
            'mot_de_passe' => $this->encrypt->encode($this->input->post('mot_de_passe')),
            'email'        => $this->input->post('email'),
            'date'         => mdate("%Y-%m-%d %h:%i:%a", now())
        );
        $query = $this->db->insert('Utilisateurs', $utilisateur);
        // return $query->result();
    }
	
	public function existe_nom($nom) {
		$this->db->where('nom', $nom);
		$query = $this->db->get('Utilisateurs');
		return ($query->num_rows() > 0);
	}
	
	public function existe_email($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('Utilisateurs');
		return ($query->num_rows() > 0);
	}
	
	public function mdp_valide($id, $mdp) {
	    $this->db->where('id', $id);
	    $query = $this->db->get('Utilisateurs');
	    $row   = $query->row_array();
	    return (strcmp($mdp, $this->encrypt->decode($row['mot_de_passe'])) == 0);
	}
	
	public function get_by_id($id) {
	    $this->db->select('id, nom, email, date');
		$this->db->where('id', $id);
		$query = $this->db->get('Utilisateurs');
		return $query->row_array();
	}
	
	public function get_by_nom($nom) {
		$this->db->select('id, nom, email');
		$this->db->where('nom', $nom);
		$query = $this->db->get('Utilisateurs');
		return $query->row_array();
	}
	
	public function get_by_email($email) {
		$this->db->select('id, nom, email');
		$this->db->where('email', $email);
		$query = $this->db->get('Utilisateurs');
		return $query->row_array();
	}
}

/* End of file utilisateur_model.php */
/* Location: ./application/models/personnage_model.php */
