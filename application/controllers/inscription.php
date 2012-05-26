<?php
// 
// class Inscription extends CI_Controller {
//  
//  public function __construct() {
//          parent::__construct();
//          $this->load->model('utilisateur_model');
//  }
// 
//  function index() {
//      if( ! ini_get('date.timezone') ) {
//         date_default_timezone_set('Europe/Paris');
//      }
//      
//      $this->load->helper('form');
//      $this->load->library(array('form_validation', 'encrypt'));
//      
//      $data['nom_utilisateur'] = 'Nom utilisateur';
//      $data['mot_de_passe']    = 'Mot de passe';
//      $data['confirmation']    = 'Confirmation';
//      $data['email']           = 'Email';
// 
//      $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
//      $this->form_validation->set_rules('nom_utilisateur', $data['nom_utilisateur'], 
//          'trim|required|min_length[2]|max_length[24]|xss_clean|callback_nom_unique');
//      $this->form_validation->set_rules('mot_de_passe', $data['mot_de_passe'], 
//          'trim|required|min_length[5]');
//      $this->form_validation->set_rules('confirmation', $data['confirmation'],
//          'trim|required|matches[mot_de_passe]');
//      $this->form_validation->set_rules('email', $data['email'],
//          'trim|required|valid_email|callback_email_unique');
// 
//      if ($this->form_validation->run() == FALSE) {
//          $data['title'] = 'Inscription';
//          $this->load->view('templates/header', $data);
//          $this->load->view('inscription', $data);
//          $this->load->view('templates/footer', $data);
//      }
//      else {
//             $this->utilisateur_model->creer();
//             $data['title'] = 'Inscription - Succès';
//             $this->load->view('templates/header', $data);
//             $this->load->view('inscription_succes', $data);
//             $this->load->view('templates/footer', $data);
//      }
//  }
//  
//  public function nom_unique($nom) {
//      if ($this->utilisateur_model->existe_nom($nom)) {
//          $this->form_validation->set_message('nom_unique', 'Ce nom est déjà pris :(');
//          return FALSE;
//      }
//      else {
//          return TRUE;
//      }
//  }
//  
//  public function ajax_nom_valide() {
//      $nom = $this->input->post('nom');
//      if ($this->utilisateur_model->existe_nom($nom)) {
//          echo "false";
//      } else {
//          echo "true";
//      }
//  }
//  
//  public function email_unique($email) {
//      if ($this->utilisateur_model->existe_email($email)) {
//          $this->form_validation->set_message('email_unique', 'Cet email existe déjà !');
//          return FALSE;
//      }
//      else {
//          return TRUE;
//      }
//  }
//  
//  public function ajax_email_valide() {
//      $this->load->helper('email');
//      $email = $this->input->post('email');
//      if ($this->utilisateur_model->existe_email($email) || (!valid_email($email))) {
//          echo "false";
//      } else {
//          echo "true";
//      }
//  }
// }
// ?>