<?php
// class Identification extends CI_Controller {
//  public function __construct() {
//          parent::__construct();
//          $this->load->model('utilisateur_model');
//  }
//  
//  public function index() {
//      $this->load->library('form_validation');
//      $this->load->helper(array('email', 'form'));
//      $this->form_validation->set_rules('identifiant', 'Identifiant', 
//          'trim|required|xss_clean|callback_identifiant_valide');
//      $this->form_validation->set_rules('mot_de_passe', 'Mot de passe',
//          'trim|required|xss_clean');
//      $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
//          
//      if ($this->form_validation->run() == FALSE) {
//          $data['title'] = 'Identifiez-vous';
//          $this->load->view('templates/header', $data);
//          $this->load->view('identification', $data);
//          $this->load->view('templates/footer', $data);
//      }
//      else {
//          $id = $this->input->post('identifiant');
//          $mdp = $this->input->post('mot_de_passe');
//          $utilisateur = $this->get_utilisateur($id);
//          if ($this->utilisateur_model->mdp_valide($utilisateur['id'], $mdp)) {
//                 $id    = intval($utilisateur['id']);
//                 $nom   = $utilisateur['nom'];
//                 $email = $utilisateur['email'];
//                 $newdata = array(
//                     'id'              => $id,
//                     'nom_utilisateur' => $nom,
//                     'email'           => $email,
//                     'connecté'        => TRUE
//                 );
//                 $this->session->set_userdata($newdata);
//                 redirect('/creation/index');
//          } else {
//              $data['error'] = 'Le mot de passe ne correspond pas';
//              $data['title'] = 'Identifiez-vous';
//              $this->load->view('templates/header', $data);
//              $this->load->view('identification', $data);
//              $this->load->view('templates/footer', $data);
//          }
//      }
//  }
//  
//  public function deconnexion() {
//      $this->session->set_userdata(array('connecté' => FALSE));
//      redirect('identification');
//  }
//  
//  public function identifiant_valide($id) {
//      if (valid_email($id)) {
//          // un email a été donné
//          $this->form_validation->set_message(
//              'identifiant_valide', 
//              'Cet email n\'appartient à aucun membre.'
//          );
//          return $this->utilisateur_model->existe_email($id);
//      } else {
//          // un nom a été donné
//          $this->form_validation->set_message(
//              'identifiant_valide', 
//              'Cet nom n\'appartient à aucun membre.'
//          );
//          return $this->utilisateur_model->existe_nom($id);
//      }
//  }
//  
//  public function get_utilisateur($id) {
//      if (valid_email($id)) {
//          return $this->utilisateur_model->get_by_email($id);
//      } else {
//          return $this->utilisateur_model->get_by_nom($id);
//      }
//  }
// }
// 
// ?>