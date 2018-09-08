<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matiere extends MY_Controller {

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
        $this->load->model('matiere_model');	

	} 
    
    
	public function index()
	{
        
        $data = array(
            'metaTitle' => 'Liste des Matières | MadrassApp App',
			'listmatieres' => $this->matiere_model->give_all(),
		);
 		if( $this->require_role('admin') )
{           
        $this->load->view('template/header', $data);
		$this->load->view('matiere/index', $data);
		$this->load->view('template/footer', $data);
        }
		else{ redirect('/login');}       
	}
    
    
    
        	public function add()
	{
          		if( $this->require_role('admin') )
{   
            		$data = array(
            'metaTitle' => 'Ajouter une Matière | MadrassApp App'
		);
		$this->load->view('template/header', $data);
		$this->load->view('matiere/add');
		$this->load->view('template/footer', $data);
            }

else{ redirect('examples/optional_login_test');	}
            
	}
    
    
            public function addresponse()
	{
 		if( $this->require_role('admin') )
{
		$data = array(          
                      'nomMatiere' => $this->input->post('matiere_nom'),
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->matiere_model->create($data) === true;
            
           	$data = array(  
            'listmatieres' => $this->matiere_model->give_all(),
     );
		if ($success) {
			$data['successMessage'] = "La matiere a été ajoutée avec succès !";
            $data['metaTitle'] = "Liste des Matières | MadrassApp App";

            $this->load->view('template/header', $data);
			$this->load->view('matiere/index', $data);
		  $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, Matière non ajoutée.";
            $data['metaTitle'] = "Ajouter une Matière | MadrassApp App";
            $this->load->view('template/header', $data);
			$this->load->view('matiere/add', $data);
		$this->load->view('template/footer', $data);
		}   }

else{ redirect('examples/optional_login_test');	}    
	}
    
    
     	public function delete($idMatiere)
	{   		if( $this->require_role('admin') )
{      
            $success = $this->matiere_model->supprimer($idMatiere) === true;    
            
                     	$data = array(  
            'listmatieres' => $this->matiere_model->give_all(),
     );

			if ($success) {
			$data['successMessage'] = "La matiere a été supprimée avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, matiere non supprimée.";}
        $data['metaTitle'] = "Liste des matieres | MadrassApp App";        
        $this->load->view('template/header', $data);
        $this->load->view('matiere/index', $data);
		$this->load->view('template/footer', $data);     

		}

else{ redirect('examples/optional_login_test');	}      
	}
    
         	public function edit($idMatiere)
	{     		if( $this->require_role('admin') )
{ 
                
                $data = array(
            'metaTitle' => 'Modifier une Matière | MadrassApp App',
            'mamatiere' => $this->matiere_model->givebyID($idMatiere),

		);
		$this->load->view('template/header', $data);
		$this->load->view('matiere/update',$data);
		$this->load->view('template/footer');
                
                }

else{ redirect('examples/optional_login_test');	}
                
            }
    
    public function editresponse($idMatiere)
	{ 		if( $this->require_role('admin') )
{

		$data = array( 
                      'nomMatiere' => $this->input->post('matiere_nom')
                     
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->matiere_model->update($idMatiere, $data) === true;
            
           	$data = array(  
            'listmatieres' => $this->matiere_model->give_all(),
     );
		if ($success) {
			$data['successMessage'] = "La Matière a été modifiée avec succès !";
            $data['metaTitle'] = "Liste des Matières | MadrassApp App";

            $this->load->view('template/header', $data);
			$this->load->view('matiere/index', $data);
		  $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, Matière non modifiée.";
            $data['metaTitle'] = "Modifier une Matière | MadrassApp App";
            $data['mamatiere'] = $this->matiere_model->givebyID($idMatiere);

            $this->load->view('template/header', $data);
			$this->load->view('matiere/update', $data);
		$this->load->view('template/footer', $data);
		}       

		}

else{ redirect('examples/optional_login_test');	}
	}
    
    
    
    
    
               		
    
}
