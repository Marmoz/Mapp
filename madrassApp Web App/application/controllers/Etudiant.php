<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etudiant extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
        public function __construct() {
		parent:: __construct();
        $this->load->model('etudiant_model');	

	} 
    
    	

	public function index()
	{
		$data = array(
            'metaTitle' => 'Liste des étudiants | MadrassApp App',
			'listetudiants' => $this->etudiant_model->give_all(),
			
		);

		if( $this->require_role('teacher, admin') )
{
    	$this->load->view('template/header', $data);  
      	$this->load->view('etudiant/index', $data); 
		$this->load->view('template/footer', $data); 
}
		else{ redirect('/login');}
	         
	
	}


	public function mynotes()
	{if( $this->require_role('student, admin') )
{
		$data = array(
            'metaTitle' => 'Mes notes | MadrassApp App',
			'noznotes' => $this->etudiant_model->notebyUSERMAIL($this->auth_email),
		);

		
    	$this->load->view('template/header', $data);
		echo $this->load->view('etudiant/mesnotes', $data, TRUE);
		$this->load->view('template/footer', $data); 
}
		else{ redirect('examples/optional_login_test');}
	         
	
	}

		public function myFiliere()
	{if( $this->require_role('student, admin') )
{
		$data = array(
            'metaTitle' => 'Ma Classe/Filiere | MadrassApp App',
			'mafiliere' => $this->etudiant_model->filierebyUSERMAIL($this->auth_email),
			'mescamarades' => $this->etudiant_model->classMates($this->etudiant_model->filierebyUSERMAIL($this->auth_email))
		);

		
    	$this->load->view('template/header', $data);
		echo $this->load->view('etudiant/mafiliere', $data, TRUE);
		$this->load->view('template/footer', $data); 
}
		else{ redirect('examples/optional_login_test');}
	         
	
	}





    
        	public function add()
	{
            
            		$data = array(
            'metaTitle' => 'Ajouter un étudiant | MadrassApp App'
		);
					if( $this->require_role('admin') ){	
				$this->load->view('template/header', $data);
				

		$this->load->view('etudiant/add');
		}
		else{ $this->load->view('template/header', $data);
		redirect('examples/optional_login_test');}
		$this->load->view('template/footer', $data);
            
            
	}
    
    
            public function addresponse()
	{

		$data = array(          
                      'nomStudent' => $this->input->post('etudiant_nom'),
                      'prenomStudent' => $this->input->post('etudiant_prenom'),
                      'emailStudent' => $this->input->post('etudiant_email'),
                      'naissanceStudent' => $this->input->post('etudiant_naissance')                     
                     );
if( $this->require_role('admin') ){	
		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->etudiant_model->create($data) === true;
            
           	$data = array(  
            'listetudiants' => $this->etudiant_model->give_all(),
     );
		if ($success) {
			$data['successMessage'] = "L'etudiant a été ajouté avec succès !";
            $data['metaTitle'] = "Liste des étudiant | MadrassApp App";

            $this->load->view('template/header', $data);
			$this->load->view('etudiant/index', $data);
		  $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, etudiant non ajouté.";
            $data['metaTitle'] = "Ajouter un étudiant | MadrassApp App";
            $this->load->view('template/header', $data);
			$this->load->view('etudiant/add', $data);
		$this->load->view('template/footer', $data);
		} 

}

else{ redirect('examples/optional_login_test');	}

	}
    
    
     	public function delete($idEtudiant)
	{      
	if( $this->require_role('admin') ){  
            $success = $this->etudiant_model->supprimer($idEtudiant) === true; 

            
                     	$data = array(  
            'listetudiants' => $this->etudiant_model->give_all(),

     );

			if ($success) {
			$data['successMessage'] = "L'etudiant a été supprimé avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, etudiant non supprimé.";}
        $data['metaTitle'] = "Liste des étudiant | MadrassApp App";


        $this->load->view('template/header', $data);
        $this->load->view('etudiant/index', $data);
		$this->load->view('template/footer', $data); 

		}

else{ redirect('examples/optional_login_test');	}

	}



    
     	public function deleteCompte($idEtudiant)
	{      
	if( $this->require_role('admin') ){  

		$monmail = $this->etudiant_model->IDtoMAIL($idEtudiant);
		
        $success = $this->etudiant_model->supprCompteStudent($monmail) === true; 

            
                     	$data = array(  
            'listetudiants' => $this->etudiant_model->give_all(),

     );

			if ($success) {
			$data['successMessage'] = "Le COMPTE 'etudiant a été supprimé avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, etudiant non supprimé.";}
        $data['metaTitle'] = "Liste des étudiant | MadrassApp App";


        $this->load->view('template/header', $data);
        $this->load->view('etudiant/index', $data);
		$this->load->view('template/footer', $data); 

		}

else{ redirect('examples/optional_login_test');	}
}





    
         	public function edit($idEtudiant)
	{     
           if( $this->require_role('admin') ){      
                $data = array(
            'metaTitle' => 'Modifier un étudiant | MadrassApp App',
            'monetudiant' => $this->etudiant_model->givebyID($idEtudiant),
            'monmail' => $this->etudiant_model->IDtoMAIL($idEtudiant),

		);
		$this->load->view('template/header', $data);
				$this->load->view('etudiant/update',$data);
		$this->load->view('template/footer');
                
                }

else{ redirect('examples/optional_login_test');	}
                
            }
    
    public function editresponse($idEtudiant)
	{
		$data = array( 
                      'nomStudent' => $this->input->post('etudiant_nom'),
                      'prenomStudent' => $this->input->post('etudiant_prenom'),
                      'emailStudent' => $this->input->post('etudiant_email'),
                      'naissanceStudent' => $this->input->post('etudiant_naissance')                     
                     );
if( $this->require_role('admin') ){ 
		// Créer une entrer, verifier true, Affichageecter $success
		// PB Affichage errorMessage
		$success = $this->etudiant_model->modifier($idEtudiant, $data) === true;
            
           	$data = array(  
            'listetudiants' => $this->etudiant_model->give_all(),
     );
		if ($success) {
			$data['successMessage'] = "L'etudiant a été modifié avec succès !";
            $data['metaTitle'] = "Liste des étudiant | MadrassApp App";

 $this->etudiant_model->modifierUserMail($idEtudiant);

            $this->load->view('template/header', $data);
			$this->load->view('etudiant/index', $data);
		  $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, etudiant non modifié.";
            $data['metaTitle'] = "Modifier un étudiant | MadrassApp App";
            $data['monetudiant'] = $this->etudiant_model->givebyID($idEtudiant);

            $this->load->view('template/header', $data);
			$this->load->view('etudiant/update', $data);
		$this->load->view('template/footer', $data);
		}   
		 }

else{ redirect('examples/optional_login_test');	}

	}
    
    
    
    
    	public function homestudent()
	{
     if( $this->require_role('student, admin') ){ 
       	 $data = array(
            'metaTitle' => 'Portail des étudiants | MadrassApp App',
			'listetudiants' => $this->etudiant_model->give_all(),


		);
            $data['nozinfos'] = $this->etudiant_model->getinfobyUSERMAIL($this->auth_email);
			$data['noznotes'] = $this->etudiant_model->notebyUSERMAIL($this->auth_email);
        $this->load->view('template/header', $data);
		$this->load->view('etudiant/portalstudent', $data);
		$this->load->view('template/footer', $data);
       
         		 }

else{ redirect('examples/optional_login_test');	}            
	}
    
    
    
    
    
               		
    
}
