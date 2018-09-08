<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notedby extends MY_Controller {
    
    public function __construct() {
		parent:: __construct();
        $this->load->model('etudiant_model');
        $this->load->model('filiere_model');
        $this->load->model('matiere_model');
                $this->load->model('enseignant_model');

        $this->load->model('notedby_model');
        $this->load->model('inscrit_model');	


	} 


	public function index()
	{if( $this->require_role('admin') )
{   
        
		$data = array(
            'metaTitle' => 'Liste des notes | MadrassApp App',
            'listnotes'=> $this->notedby_model->getALL()

		);
		$this->load->view('template/header', $data);
		$this->load->view('notedby/index', $data);
		$this->load->view('template/footer', $data);
        }

else{ redirect('examples/optional_login_test'); }  
	}
    
    	
    	public function addnote($idEtudiant = null)
	{if( $this->require_role('admin') )
{   
            $this->is_logged_in();

            		$data = array(
            'metaTitle' => 'Ajouter une note Etudiant | MadrassApp App',
            'lesetudiants' => $this->etudiant_model->give_all(),
            'lesenseignants' => $this->enseignant_model->give_all(),
            'lesmatieres' => $this->matiere_model->give_all(),
            'lesannees' => $this->inscrit_model->give_AnneeScolaire(),

		);
             $data['chkoun'] = $idEtudiant;
            //$data['monID'] = $this->inscrit_model->switchInfoAdmin($this->auth_user_id);

		$this->load->view('template/header', $data);
		$this->load->view('notedby/add', $data);
		$this->load->view('template/footer', $data);
            }

else{ redirect('examples/optional_login_test'); }  
            
	}
    

    public function addnoteAdmin()
    {if( $this->require_role('admin, teacher') )
{   
            $this->is_logged_in();

                    $data = array(
            'metaTitle' => 'Ajouter une note Etudiant | MadrassApp App',
            'lesetudiants' => $this->etudiant_model->give_all(),
            'lesenseignants' => $this->enseignant_model->give_all(),
            'lesmatieres' => $this->matiere_model->give_all(),
            'lesannees' => $this->inscrit_model->give_AnneeScolaire(),

        );
             $data['chkoun'] = $idEtudiant;
            //$data['monID'] = $this->inscrit_model->switchInfoAdmin($this->auth_user_id);

        $this->load->view('template/header', $data);
        $this->load->view('notedby/add', $data);
        $this->load->view('template/footer', $data);
            }

else{ redirect('examples/optional_login_test'); }  
            
    }
    
        public function addnoteresponse($idEtudiant=null)
	{if( $this->require_role('admin') )
{   
$this->is_logged_in();

		$data = array(                   
                'idStudent' => $this->input->post('Letudiant'),
                'idTeacher' => $this->input->post('Enseignant'),
                'idMatiere' => $this->input->post('Matiere') ,
                'annee' => $this->input->post('Lannee'),            
                'note_S1' => $this->input->post('note_S1'),
                'note_S2' => $this->input->post('note_S2'),
                'note_Finale' => $this->input->post('note_Finale'),
                
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->notedby_model->create($data) === true;
            
           	$data = array(  
            'noqat' => $this->etudiant_model->liste_note($idEtudiant),
            'lesetudiants' => $this->etudiant_model->give_all(),
            'chkoun' => $idEtudiant
     );

		
		if ($success) {
			$data['successMessage'] = "Les notes ont été ajoutés avec succès !";
            $data['metaTitle'] = "Liste des notes | MadrassApp App !";


        $this->load->view('template/header', $data);
		$this->load->view('notedby/bulletin', $data);
		$this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, Veuillez réessayer.";
            $this->load->view('template/header', $data);
		$this->load->view('notedby/add', $data);
		$this->load->view('template/footer', $data);
		}

            }

else{ redirect('examples/optional_login_test'); }  
	}
    
   
    
    	public function fiche($idEtudiant=null)
	{  if( $this->require_role('admin') )
{    
		$data = array(            'metaTitle' => 'Fiche des notes | MadrassApp App',
                      			'noqat' => $this->etudiant_model->liste_note($idEtudiant)

            
		);
            $data['chkoun'] = $idEtudiant;

		$this->load->view('template/header', $data);
		$this->load->view('notedby/bulletin', $data);
		$this->load->view('template/footer', $data);
        }

else{ redirect('examples/optional_login_test'); }  
	}
    
        public function downPDF($idEtudiant=null)
    {   
        $data = array(            'metaTitle' => 'Le BULLETIN PDF | MadrassApp App',
                                'noqat' => $this->etudiant_model->liste_note($idEtudiant)

            
        );
            $data['chkoun'] = $idEtudiant;

        $this->load->view('examples/page_header', $data);
        $this->load->view('notedby/pdfnotes', $data);
        $this->load->view('template/footer', $data);
          
    }
    
    
    public function effacer($idEtudiant,$idTeacher,$idMatiere, $annee)
	{   if( $this->require_role('admin') )
{        
            $success = $this->notedby_model->deletenote($idEtudiant,$idTeacher,$idMatiere, $annee) === true;    
            
                     	$data = array(  
            'inafil' => $this->etudiant_model->finek(),
            'listnotes'=> $this->notedby_model->getALL()

     );

			if ($success) {
			$data['successMessage'] = "La note effacée avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, note non effacée.";}
      
        $data['metaTitle'] = "Liste des notes | MadrassApp App";        
        $this->load->view('template/header', $data);
        $this->load->view('notedby/index', $data);
		$this->load->view('template/footer', $data); 

        }

else{ redirect('examples/optional_login_test'); }           
	}
    
    
        public function edit($idEtudiant, $idTeacher, $idMatiere, $annee)
	{     if( $this->require_role('admin') )
{   
                
                $data = array(
            'metaTitle' => 'Modifier une note | MadrassApp App',
            'idStudent' => $idEtudiant,
            'idTeacher' => $idTeacher,
            'idMatiere' => $idMatiere,
            'annee' => $annee,

            'lesfilieres' => $this->filiere_model->give_all(),
            'inafil' => $this->etudiant_model->finek()

		);
		$this->load->view('template/header', $data);
		$this->load->view('notedby/update',$data);
		$this->load->view('template/footer');    
        }

else{ redirect('examples/optional_login_test'); }       
            }
    
    
                   
    
    
    public function editresponse($idEtudiant, $idTeacher, $idMatiere, $annee)
	{if( $this->require_role('admin') )
{   

		$data = array(          
                             
                    'note_S1' => $this->input->post('note_S1'),
                    'note_S2' => $this->input->post('note_S2'),
                    'note_Finale' => $this->input->post('note_Finale')                    
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->notedby_model->update($idEtudiant, $idTeacher, $idMatiere, $annee, $data) === true;
            
           	$data = array(  
            'lesetudiants' => $this->etudiant_model->give_all(), 
                'listnotes'=> $this->notedby_model->getALL()

     );	
			if ($success) {
			$data['successMessage'] = "La note de l'étudiant modifiée avec succès !";
            $data['metaTitle'] = "Liste des notes étudiants | MadrassApp App";
        }

            
			
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, La note nom modifiée. Veuillez réessayer.";
            $data['metaTitle'] = "Modifier une note Etudiant | MadrassApp App";
			$data['listetudiants'] = $this->etudiant_model->give_all();}
                    
            $this->load->view('template/header', $data);
			$this->load->view('notedby/index', $data);
            $this->load->view('template/footer', $data);

            }

else{ redirect('examples/optional_login_test'); }  
    
                    }
    
            
                
    
            

}
