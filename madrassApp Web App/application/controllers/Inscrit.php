<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscrit extends MY_Controller {
    
    public function __construct() {
		parent:: __construct();
        $this->load->model('etudiant_model');
        $this->load->model('filiere_model');
        $this->load->model('inscrit_model');	


	} 


	public function index()
	{ if( $this->require_role('teacher, admin') )
{   
        
		$data = array(
            'metaTitle' => 'Liste des inscriptions étudiants | MadrassApp App',
            'inafil' => $this->etudiant_model->finek()

		);
		$this->load->view('template/header', $data);
		$this->load->view('inscrit/index', $data);
		$this->load->view('template/footer', $data);
        }

else{ redirect('examples/optional_login_test'); }    
        
	}
    
    	
    	public function addins($idEtudiant = null)
	{
             if( $this->require_role('admin') )
{   
            		$data = array(
            'metaTitle' => 'Ajouter une inscription Etudiant | MadrassApp App',
            'lesetudiants' => $this->etudiant_model->give_all(),
            'lesfilieres' => $this->filiere_model->give_all(),
            'chkoun' => $idEtudiant

		);

		$this->load->view('template/header', $data);
		$this->load->view('inscrit/add');
		$this->load->view('template/footer', $data);
            }

else{ redirect('examples/optional_login_test'); }    
            
	}
    
  
        public function addresponse()
	{
 if( $this->require_role('admin') )
{   
		$data = array(          
                    'idStudent' => $this->input->post('Letudiant'),
                    'idFiliere' => $this->input->post('Lafiliere'),
                    'annee' => $this->input->post('AnneeInscription')                     
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->inscrit_model->create($data) === true;
            
           	$data = array(  
            'lesetudiants' => $this->etudiant_model->give_all(),
     );	
		if ($success) {
			$data['successMessage'] = "L'inscription de l'étudiant réalisée avec succès !";
            $data['metaTitle'] = "Liste des inscriptions étudiants | MadrassApp App";

            $data['inafil'] = $this->etudiant_model->finek();

            $this->load->view('template/header', $data);
			$this->load->view('inscrit/index', $data);
            $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, L'inscription refusée. Veuillez réessayer.";
            $data['metaTitle'] = "Ajouter une inscription Etudiant | MadrassApp App";

            $this->load->view('template/header', $data);
			$this->load->view('inscrit/add', $data);
		  $this->load->view('template/footer', $data);
		}
}

else{ redirect('examples/optional_login_test'); }    
            
	}
    
  public function supprimer($idEtudiant)
	{      if( $this->require_role('admin') )
{      
            $success = $this->inscrit_model->supprimer($idEtudiant) === true;    
            
                     	$data = array(  
            'inafil' => $this->etudiant_model->finek()

     );

			if ($success) {
			$data['successMessage'] = "L'etudiant a été supprimé avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, etudiant non supprimé.";}
      
        $data['metaTitle'] = "Liste des inscriptions étudiant | MadrassApp App";        
        $this->load->view('template/header', $data);
        $this->load->view('inscrit/index', $data);
		$this->load->view('template/footer', $data);  
        }

else{ redirect('examples/optional_login_test'); }             
	}
    
    
    public function edit($idEtudiant, $oldfili, $oldyear)
	{      if( $this->require_role('admin') )
{   
                
                $data = array(
            'metaTitle' => 'Modifier une inscription | MadrassApp App',
            'monetudiant' => $idEtudiant,
            'oldfiliere' => $oldfili,
            'oldannee' => $oldyear,

            'lesfilieres' => $this->filiere_model->give_all(),
            'inafil' => $this->etudiant_model->finek()

		);
		$this->load->view('template/header', $data);
		$this->load->view('inscrit/update',$data);
		$this->load->view('template/footer');  
        }

else{ redirect('examples/optional_login_test'); }           
            }
    
    

                
                public function editre($idEtudiant, $oldfili, $oldyear)
	{ if( $this->require_role('admin') )
{   

		$data = array(          
                    'newfiliere' => $this->input->post('Lafiliere'),
                    'newannee' => $this->input->post('AnneeInscription'),
                     );

		// VERIFIER $success __ ok MODIF DB & retourne false 
		$success = $this->inscrit_model->miseajour($idEtudiant, $oldfili, $oldyear,$data['newfiliere'],$data['newannee']) ;
            
           	$data = array(  
            'inafil' => $this->etudiant_model->finek()
     );	
		if ($success == true) {
			$data['successMessage'] = "L'inscription de l'étudiant modifiée avec succès !";
            $data['metaTitle'] = "Liste des inscriptions étudiants | MadrassApp App";
        }

            
			
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, L'inscription non modifiée. Veuillez réessayer.";
            $data['metaTitle'] = "Modifier une inscription Etudiant | MadrassApp App";
			$data['listetudiants'] = $this->etudiant_model->give_all();}
                    
            $this->load->view('template/header', $data);
			$this->load->view('inscrit/index', $data);
            $this->load->view('template/footer', $data);
    }

else{ redirect('examples/optional_login_test'); }    
                    }	
    
      public function desinscrire($idEtudiant,$idFiliere,$annee)
	{     if( $this->require_role('admin') )
{       
            $success = $this->inscrit_model->desinscrire($idEtudiant,$idFiliere,$annee) === true;    
            
                     	$data = array(  
            'inafil' => $this->etudiant_model->finek()

     );

			if ($success) {
			$data['successMessage'] = "L'etudiant a été desinscrit avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, etudiant non desinscrit.";}
      
        $data['metaTitle'] = "Liste des inscriptions étudiant | MadrassApp App";        
        $this->load->view('template/header', $data);
        $this->load->view('inscrit/index', $data);
		$this->load->view('template/footer', $data);    

        }

else{ redirect('examples/optional_login_test'); }           
	}
    
            
   
      

}
