<?php
class Personnage_model extends CI_Model {	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
    public function creer($perso) {
        // insérer les infos de base
        $personnage['id_joueur'] = $perso['id_utilisateur'];
        $personnage['nom']       = $perso['nom'];
        $this->db->insert('Personnage', $personnage);
        
        $id_perso = $this->db->insert_id();
        
        // insérer la description
        $descr['id_perso']   = $id_perso;
        $descr['sexe']       = $perso['sexe'];
        $descr['age']        = $perso['age'];
        $descr['taille']     = $perso['taille'];
        $descr['peau']       = $perso['peau'];
        $descr['corpulence'] = $perso['corpulence'];
        $descr['cheveux']    = $perso['cheveux' ];
        $descr['yeux']       = $perso['yeux'];
        $descr['signes']     = $perso['signes'];
        $this->db->insert('Description', $descr);
        
        // insérer les attributs
        $attr['id_perso'] = $id_perso;
        $attr['for']      = $perso['for'];
        $attr['con']      = $perso['con'];
        $attr['coo']      = $perso['coo'];
        $attr['ada']      = $perso['ada'];
        $attr['per']      = $perso['per'];
        $attr['int']      = $perso['int'];
        $attr['vol']      = $perso['vol'];
        $attr['pre']      = $perso['pre'];
        $attr['chance']   = $perso['chance'];
        $attr['rea']      = $perso['rea'];
        $attr['dom']      = $perso['dom'];
        $attr['choc']     = $perso['choc'];
        $attr['res_dom']  = $perso['res_dom'];
        $attr['res_poi']  = $perso['res_poi'];
        $attr['res_mal']  = $perso['res_mal'];
        $attr['res_rad']  = $perso['res_rad'];
        $attr['res_dro']  = $perso['res_dro'];
        $attr['souffle']  = $perso['souffle'];
        $this->db->insert('Attribut', $attr);
        
        // insérer les propriétés de développement
        $developpement['id_perso']    = $id_perso;
        $developpement['id_origine_geo'] = $perso['origine_geographique'];
        $developpement['id_origine_soc'] = $perso['origine_sociale'];
        $developpement['id_formation']   = $perso['formation'];
        if (strcmp($perso['etudes_superieures'], 'none') != 0) {
            $developpement['id_etudes_sup'] = $perso['etudes_superieures'];
        }
        $this->db->insert('Developpement', $developpement);
            
            
        // insérer les mutations   
        if (isset($perso['mutation_alea']) && strcmp($perso['mutation_alea'], 'true') == 0) {
            $random_mutation = $this->personnage_model->get_random_mutation();
            $id_mutation     = $random_mutation['id'];
            $mutations = array(
                array(
                    "id_perso"    => $id_perso,
                    "id_mutation" => $id_mutation,
                )
            );
        } else {
            if (isset($perso['mutations'])) {
                foreach ($perso['mutations'] as $index => $id_mutation) {
                    $mutations[$index]['id_perso']    = $id_perso;
                    $mutations[$index]['id_mutation'] = $id_mutation;
                }
                $this->db->insert_batch('Mutations_Perso', $mutations);
            }
        }
            
        // insérer les avantages
        if (isset($perso['avantages'])) {
            foreach ($perso['avantages'] as $index => $id_avantage) {
                $avantages[$index]['id_perso']    = $id_perso;
                $avantages[$index]['id_avantage'] = $id_avantage;
            }
            $this->db->insert_batch('Avantages_Perso', $avantages);   
        }
        
        if (isset($perso['desavantages'])) {
            foreach ($perso['desavantages'] as $index => $id_desavantage) {
                $desavantages[$index]['id_perso']       = $id_perso;
                $desavantages[$index]['id_desavantage'] = $id_desavantage;

            }
            $this->db->insert_batch('Desavantages_Perso', $desavantages);
        }
        
        if (isset($perso['professions'])) {
            $i = 0;
            foreach ($perso['professions'] as $id_profession => $annees) {
                $professions[$i]['id_perso']       = $id_perso;
                $professions[$i]['id_profession']  = $id_profession;
                $professions[$i]['annees']         = $annees;
                $i++;
            }
            if ($i > 0) {
                $this->db->insert_batch('Professions_Perso', $professions);      
            }
        }
        
        return $id_perso;
    }
    
    public function get_perso($id_perso) {
        $this->db->where('id', $id_perso);
        $query = $this->db->get('Personnage');
        $row = $query->row_array();
        if (!$row) {
            return -1;
        }
        $perso['nom'] = $row['nom'];
        
        $this->db->where('id', $row['id_joueur']);
        $query = $this->db->get('Utilisateurs');
        $row = $query->row_array();
        $perso['utilisateur'] = $row['nom'];
        
        $this->db->where('id_perso', $id_perso);
        $query = $this->db->get('Description');
        $row = $query->row_array();
        $perso['sexe'] = $row['sexe'];
        $perso['age'] = $row['age'];
        $perso['taille'] = $row['taille'];
        $perso['peau'] = $row['peau'];
        $perso['corpulence'] = $row['corpulence'];
        $perso['cheveux'] = $row['cheveux'];
        $perso['yeux'] = $row['yeux'];
        $perso['signes'] = $row['signes'];
        
        $this->db->where('id_perso', $id_perso);
        $query = $this->db->get('Attribut');
        $row = $query->row_array();
        $perso['for']     = $row['for'];
        $perso['con']     = $row['con'];
        $perso['coo']     = $row['coo'];
        $perso['ada']     = $row['ada'];
        $perso['per']     = $row['per'];
        $perso['int']     = $row['int'];
        $perso['vol']     = $row['vol'];
        $perso['pre']     = $row['pre'];
        $perso['chance']  = $row['chance'];
        $perso['rea']     = $row['rea'];
        $perso['dom']     = $row['dom'];
        $perso['choc']    = $row['choc'];
        $perso['res_dom'] = $row['res_dom'];
        $perso['res_poi'] = $row['res_poi'];
        $perso['res_mal'] = $row['res_mal'];
        $perso['res_rad'] = $row['res_rad'];
        $perso['res_dro'] = $row['res_dro'];
        $perso['souffle'] = $row['souffle'];

        $origines_geo = $this->get_origines_geographiques();
        $origines_soc = $this->get_origines_sociales();
        $formations   = $this->get_formations();
        $etudes_sup   = $this->get_etudes_superieures();
        $mutations    = $this->get_mutations();
        $avantages    = $this->get_avantages();
        $desavantages = $this->get_desavantages();
        $professions  = $this->get_professions();
 
        $this->db->where('id_perso', $id_perso);
        $query = $this->db->get('Developpement');
        $row = $query->row_array();
        $id_geo    = $row['id_origine_geo'];
        $id_soc    = $row['id_origine_soc'];
        $id_form   = $row['id_formation'];
        $id_etudes = $row['id_etudes_sup'];
        $perso['origine_geo'] = $origines_geo[$id_geo];
        $perso['origine_soc'] = $origines_soc[$id_soc];
        $perso['formation']   = $formations[$id_form];
        if ($id_etudes) {
            $perso['etudes_sup']  = $etudes_sup[$id_etudes];
        } else {
            $perso['etudes_sup'] = "Pas d'études supérieures";
        }
        
        $this->db->where('id_perso', $id_perso);
        $query = $this->db->get('Mutations_Perso');
        $perso['mutations'] = array();
        foreach ($query->result_array() as $row) {
            $id_mutation = $row['id_mutation'];
            $perso['mutations'][] = $mutations[$id_mutation];
        }
        
        $this->db->where('id_perso', $id_perso);
        $query = $this->db->get('Avantages_Perso');
        $perso['avantages'] = array();
        foreach ($query->result_array() as $row) {
            $id_avantage = $row['id_avantage'];
            $perso['avantages'][] = $avantages[$id_avantage];
        }
        
        $this->db->where('id_perso', $id_perso);
        $query = $this->db->get('Desavantages_Perso');
        $perso['desavantages'] = array();
        foreach ($query->result_array() as $row) {
            $id_desavantage = $row['id_desavantage'];
            $perso['desavantages'][] = $desavantages[$id_desavantage];
        }
        
        $this->db->where('id_perso', $id_perso);
        $query = $this->db->get('Professions_Perso');
        $perso['professions'] = array();
        foreach ($query->result_array() as $row) {
            $id_profession = $row['id_profession'];
            $annees = $row['annees'];
            $perso['professions'][] = array(
                'nom'    => $professions[$id_profession],
                'annees' => $annees
            );
        }
        
        return $perso;
    }
    
    public function supprimer($id) {
        $this->db->where('id', $id);
        $this->db->delete('Personnage');
	}
	
	public function get_last_persos($n) {
	    $this->db->order_by('id', 'desc');
	    $this->db->limit($n);
	    $query = $this->db->get('Personnage');
	    return $query->result_array();
	}
	
	public function get_proprietaire($id) {
        $this->db->select('id_joueur');
        $this->db->where('id', $id);
        $query = $this->db->get('Personnage');
        $row = $query->row_array();
        return $row['id_joueur'];
    }
    
    public function existe($id_utilisateur, $nom) {
        $this->db->where('id_joueur', $id_utilisateur);
		$this->db->where('nom', $nom);
		$query = $this->db->get('Personnage');
		return ($query->num_rows() > 0);
    }
	
	public function get_all_by_nom($nom) {
	    $this->db->select('id, id_joueur, nom');
		$this->db->where('nom', $nom);
		$query = $this->db->get('Personnage');
		return $query->result_array();
	}
	
	public function get_all_by_utilisateur($id_utilisateur) {
	    $this->db->select('id, id_joueur, nom');
		$this->db->where('id_joueur', $id_utilisateur);
		$query = $this->db->get('Personnage');
		return $query->result_array();
	}
	
	public function get_random_mutation() {
	    srand();
	    $dice = rand(1, 1800);
        $this->db->select('id');
        $this->db->where('min <=', $dice);
        $this->db->where('max >=', $dice);
        $query = $this->db->get('Mutation');
        $row = $query->row_array();
        return $query->row_array();
	}

	public function get_cout_attributs() {
		$query = $this->db->get('Cout_attributs');
		return $query->result();
	}
	
	public function get_mutations() {
		$this->db->select('id, nom');
		$query = $this->db->get('Mutation');
		$mutations = $query->result();
		$result = array();
		foreach($mutations as $mutation) {
			$result["$mutation->id"] = $mutation->nom;
		}
		return $result;
	}
	
	public function get_cout_mutations() {
		$this->db->select('id, cout');
		$query = $this->db->get('Mutation');
		$cout_mutations = $query->result();
		// $result = array();
		// foreach($mutations as $mutation) {
		// 	$result["$mutation->id"] = $mutation->cout;
		// }
		return $cout_mutations;
	}
	
	public function get_avantages() {
		$this->db->select('id, nom');
		$query = $this->db->get('Avantages');
		$avantages = $query->result();
		$result = array();
		foreach($avantages as $avantage) {
			$result["$avantage->id"] = $avantage->nom;
		}
		return $result;
	}
	
	public function get_cout_avantages() {
		$this->db->select('id, cout');
		$query = $this->db->get('Avantages');
		$cout_avantages = $query->result();
		// $result = array();
		// foreach($avantages as $avantage) {
		// 	$result["$avantage->id"] = $avantage->cout;
		// }
		return $cout_avantages;
	}
	
	public function get_desavantages() {
		$this->db->select('id, nom');
		$query = $this->db->get('Desavantages');
		$desavantages = $query->result();
		$result = array();
		foreach($desavantages as $desavantage) {
			$result["$desavantage->id"] = $desavantage->nom;
		}
		return $result;
	}
	
	public function get_cout_desavantages() {
		$this->db->select('id, cout');
		$query = $this->db->get('Desavantages');
		$cout_desavantages = $query->result();
		// $result = array();
		// foreach($desavantages as $desavantage) {
		// 	$result["$desavantage->id"] = $desavantage->cout;
		// }
		return $cout_desavantages;
	}
	
	public function get_origines_geographiques() {
		$this->db->select('id, nom');
		$query = $this->db->get('Origines_Geographiques');
		$origines = $query->result();
		$result = array();
		foreach($origines as $origine) {
			$result["$origine->id"] = $origine->nom;
		}
		return $result;
	}
	
	public function get_origines_sociales() {
		$this->db->select('id, nom');
		$query = $this->db->get('Origines_Sociales');
		$origines = $query->result();
		$result = array();
		foreach($origines as $origine) {
			$result["$origine->id"] = $origine->nom;
		}
		return $result;
	}
	
	public function get_formations() {
		$this->db->select('id, nom');
		$query = $this->db->get('Formations');
		$formations = $query->result();
		$result = array();
		foreach($formations as $formation) {
			$result["$formation->id"] = $formation->nom;
		}
		return $result;
	}
	
	public function get_etudes_superieures() {
		$this->db->select('id, nom');
		$query = $this->db->get('Etudes_Superieures');
		$etudes = $query->result();
		$result = array();
		foreach($etudes as $etude) {
			$result["$etude->id"] = $etude->nom;
		}
		return $result;
	}
	
	public function get_professions() {
		$this->db->select('id, nom');
		$query = $this->db->get('Professions');
		$professions = $query->result();
		$result = array();
		foreach($professions as $profession) {
			$result["$profession->id"] = $profession->nom;
		}
		return $result;
	}
}

/* End of file personnage_model.php */
/* Location: ./application/models/personnage_model.php */
