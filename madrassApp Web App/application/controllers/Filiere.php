<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filiere extends MY_Controller {

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
        $this->load->model('filiere_model');	

	} 
    
    
	public function index()
	{
     		if( $this->require_role('admin') )
{            

        $data = array(
            'metaTitle' => 'Liste des Filieres | MadrassApp App',
			'listfilieres' => $this->filiere_model->give_all(),
		);
            
        $this->load->view('template/header', $data);
		$this->load->view('filiere/index', $data);
		$this->load->view('template/footer', $data);
       }
		else{ redirect('/login');}         
	}
    
    
    
        	public function add()
	{
           if( $this->require_role('admin') )
{     
            		$data = array(
            'metaTitle' => 'Ajouter une Filiere | MadrassApp App'
		);
		$this->load->view('template/header', $data);
		$this->load->view('filiere/add');
		$this->load->view('template/footer', $data);
            }

else{ redirect('examples/optional_login_test');	} 
            
	}
    
    
            public function addresponse()
	{ if( $this->require_role('admin') )
{   

		$data = array(          
                      'nomFiliere' => $this->input->post('filiere_nom'),
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->filiere_model->create($data) === true;
            
           	$data = array(  
            'listfilieres' => $this->filiere_model->give_all(),
     );
		if ($success) {
			$data['successMessage'] = "La filiere a été ajoutée avec succès !";
            $data['metaTitle'] = "Liste des Filières | MadrassApp App";

            $this->load->view('template/header', $data);
			$this->load->view('filiere/index', $data);
		  $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, filiere non ajoutée.";
            $data['metaTitle'] = "Ajouter une filière | MadrassApp App";
            $this->load->view('template/header', $data);
			$this->load->view('filiere/add', $data);
		$this->load->view('template/footer', $data);
		}     }

else{ redirect('examples/optional_login_test');	}   
	}
    
    
     	public function delete($idfiliere)
	{       if( $this->require_role('admin') )
{     
            $success = $this->filiere_model->supprimer($idfiliere) === true;    
            
                     	$data = array(  
            'listfilieres' => $this->filiere_model->give_all(),
     );

			if ($success) {
			$data['successMessage'] = "La filiere a été supprimée avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, filiere non supprimée.";}
        $data['metaTitle'] = "Liste des filieres | MadrassApp App";        
        $this->load->view('template/header', $data);
        $this->load->view('filiere/index', $data);
		$this->load->view('template/footer', $data); 
		}

else{ redirect('examples/optional_login_test');	}           
	}
    
         	public function edit($idfiliere)
	{     if( $this->require_role('admin') )
{    
                
                $data = array(
            'metaTitle' => 'Modifier une Filière | MadrassApp App',
            'mafiliere' => $this->filiere_model->givebyID($idfiliere),

		);
		$this->load->view('template/header', $data);
		$this->load->view('filiere/update',$data);
		$this->load->view('template/footer');
               }

else{ redirect('examples/optional_login_test');	}  
                
            }
    
    public function editresponse($idfiliere)
	{ if( $this->require_role('admin') )
{   

		$data = array( 
                      'nomFiliere' => $this->input->post('filiere_nom')
                     
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->filiere_model->update($idfiliere, $data) === true;
            
           	$data = array(  
            'listfilieres' => $this->filiere_model->give_all(),
     );
		if ($success) {
			$data['successMessage'] = "La filière a été modifiée avec succès !";
            $data['metaTitle'] = "Liste des Filières | MadrassApp App";

            $this->load->view('template/header', $data);
			$this->load->view('filiere/index', $data);
		  $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, filiere non modifiée.";
            $data['metaTitle'] = "Modifier une Filière | MadrassApp App";
            $data['mafiliere'] = $this->filiere_model->givebyID($idfiliere);

            $this->load->view('template/header', $data);
			$this->load->view('filiere/update', $data);
		$this->load->view('template/footer', $data);
		} }

else{ redirect('examples/optional_login_test');	}       
	}
    
    

               		
    
}
