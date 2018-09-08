<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teach extends MY_Controller {
    
    public function __construct() {
		parent:: __construct();
        $this->load->model('filiere_model');
         $this->load->model('enseignant_model');
        $this->load->model('matiere_model');


	} 


	public function index()
	{if( $this->require_role('teacher, admin') )
{
        
		$data = array(  'metaTitle' => 'Liste détaillée des matières enseignées | MadrassApp App',
                      'nozDet' => $this->enseignant_model->getAll2(),
		);

        $this->load->view('template/header', $data);
		$this->load->view('enseignant/mesetudiants', $data);
		$this->load->view('template/footer', $data);
		}

else{ redirect('examples/optional_login_test');	}
	}
    

    

       	public function add()
	{if( $this->require_role('admin') )
{
            
            		$data = array(
            'metaTitle' => 'Ajouter des Matiere/filieres | MadrassApp App',
            'lesfilieres' => $this->filiere_model->give_all(),
            'lesmatieres' => $this->matiere_model->give_all()
		);
		$this->load->view('template/header', $data);
		$this->load->view('comporte/add');
		$this->load->view('template/footer', $data);
		}

else{ redirect('examples/optional_login_test');	}
            
            
	}
    
        public function addresponse()
	{if( $this->require_role('admin') )
{

		$data = array(          
            
                      'idFiliere' => $this->input->post('Lafiliere'),
                      'idMatiere' => $this->input->post('Lamatiere'),
                        'coeff' => $this->input->post('coeff_mati')
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->comporte_model->create($data) === true;
            
           	$data = array(  
            'lesfilieres' => $this->filiere_model->give_all(),
            'lesmatieres' => $this->matiere_model->give_all()
     );

		
		if ($success) {
			$data['successMessage'] = "La matière a été ajouté avec succès à la filière !";
            $data['metaTitle'] = "Liste des Matiere/filieres | MadrassApp App";
             $data['filieredetail'] = $this->comporte_model->get_all();

            
            $this->load->view('template/header', $data);
            $this->load->view('comporte/index', $data);
		      $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, filiere non ajoutée.";
            $data['metaTitle'] = "Ajouter des Matiere/filieres | MadrassApp App";

        $this->load->view('template/header', $data);
        $this->load->view('comporte/add', $data);
		$this->load->view('template/footer', $data);
		}
		}

else{ redirect('examples/optional_login_test');	}

            
	}
    
    
    public function effacer($idFiliere,$idMatiere)
	{  if( $this->require_role('admin') )
{      
            $success = $this->comporte_model->delete($idFiliere,$idMatiere) === true;        

			if ($success) {
			$data['successMessage'] = "Matiere non affectée à la filiere avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, matiere non effacée.";}
      
        $data['metaTitle'] = "Liste des Matieres/Filieres étudiant | MadrassApp App";    
        $data['filieredetail'] = $this->comporte_model->get_all();

        $this->load->view('template/header', $data);
        $this->load->view('comporte/index', $data);
		$this->load->view('template/footer', $data);  
		}

else{ redirect('examples/optional_login_test');	}         
	}
    
    
    /*
    public function delete($idfiliere)
	{
            
            		$data = array(
            'metaTitle' => 'Supprimer un filiere | MadrassApp App',

                        'chkoun'=> $idfiliere
		);

            
            $success = $this->filiere_model->supprimer($idfiliere) === true;
            

			if ($success) {

			$data['successMessage'] = "La filiere a été supprimé avec succès !";

		}		
		else {                       

			$data['errorMessage'] = "Une erreur a eu lieu, filiere non supprimé.";}
                    $data['lesfilieres'] = $this->filiere_model->give_all();

            
        $this->load->view('template/header', $data);
        $this->load->view('filiere/index', $data);
		$this->load->view('template/footer', $data);
		
            
	}        
*/
    
    public function edit($idFiliere, $idMatiere)
	{  if( $this->require_role('admin') )
{   
                
                $data = array(
            'metaTitle' => 'Modifier coeff | MadrassApp App',
            'lesfilieres' => $this->filiere_model->give_all(),
            'lesmatieres' => $this->matiere_model->give_all(),
            'idFiliere' => $idFiliere,
            'idMatiere' => $idMatiere


		);
		$this->load->view('template/header', $data);
		$this->load->view('comporte/update',$data);
		$this->load->view('template/footer');   

		}

else{ redirect('examples/optional_login_test');	}      
            }
    
    

    public function editresponse($idFiliere, $idMatiere)
	{if( $this->require_role('admin') )
{

		$data = array( 
			'coeff' => $this->input->post('coeff_mati')                    
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->comporte_model->update($idFiliere, $idMatiere,$data) === true;
            
           	$data = array(  
                'filieredetail' => $this->comporte_model->get_all()


     );	
			if ($success) {
			$data['successMessage'] = "Modifs avec succès !";       }
	
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, La note nom modifiée. Veuillez réessayer.";
			$data['listetudiants'] = $this->etudiant_model->give_all();}
        
            $data['metaTitle'] = "Liste des Matieres/Filieres étudiant | MadrassApp App";    
                
            $this->load->view('template/header', $data);
			$this->load->view('comporte/index', $data);
            $this->load->view('template/footer', $data);
    }

else{ redirect('examples/optional_login_test');	}
                    }
    
    
   }
