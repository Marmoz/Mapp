<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enseignant extends MY_Controller {

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
        $this->load->model('enseignant_model');
         $this->load->model('inscrit_model');
         	

	} 
    
    
	public function index()
	{

        
        $data = array(
            'metaTitle' => 'Liste des enseignants | MadrassApp App',
			'listenseignants' => $this->enseignant_model->give_all(),
		);
                 if( $this->verify_min_level(1) )
{ 
	
        $this->load->view('template/header', $data);
	$this->load->view('enseignant/index', $data);   
	

		$this->load->view('template/footer', $data);}
           
	}


	        	public function hometeacher()
	{
                      

       	 $data = array(
            'metaTitle' => 'Portail des enseignants | MadrassApp App',
			'listenseignants' => $this->enseignant_model->give_all()
		);
            
        $this->load->view('template/header', $data);
        if( $this->verify_min_level(6) )
{
		$this->load->view('enseignant/portalteacher', $data); }
		$this->load->view('template/footer', $data);
            
	}


    

    public function enDetail()
	{if( $this->require_role('teacher, admin') )
{
		$data = array(
            'metaTitle' => 'mesEtudiants | MadrassApp App',
			'nozDet' => $this->enseignant_model->getAll(),
			'nozDet2' => $this->enseignant_model->getAll2(),
			
		);

		
    	$this->load->view('template/header', $data);
		echo $this->load->view('enseignant/mesEtudiants', $data, TRUE);
		$this->load->view('template/footer', $data); 
}
		else{ redirect('examples/optional_login_test');}
	         
	
	}


		public function mesInfos()
	{if( $this->require_role('teacher, admin') )
{
		$data = array(
            'metaTitle' => 'mesInfos | MadrassApp App',
			'myIntel' => $this->enseignant_model->getmyIntel($this->auth_email),
			
		);

		
    	$this->load->view('template/header', $data);
		echo $this->load->view('enseignant/mesEtudiants', $data, TRUE);
		$this->load->view('template/footer', $data); 
}
		else{ redirect('examples/optional_login_test');}
	         
	
	}





		public function mesMatieres()
	{if( $this->require_role('teacher, admin') )
{
		$data = array(
            'metaTitle' => 'mesMatieres | MadrassApp App',
			'nozMatieres' => $this->enseignant_model->myMatiere($this->auth_email),
			
		);


		

		
    	$this->load->view('template/header', $data);
		echo $this->load->view('enseignant/mesMatieres', $data, TRUE);
		$this->load->view('template/footer', $data); 
}
		else{ redirect('examples/optional_login_test');}
	         
	
	}



		public function mesEtudiants()
	{if( $this->require_role('teacher, admin') )
{
	$mesmatieres = $this->enseignant_model->myMatiere($this->auth_email);

	
		$data = array(
            'metaTitle' => 'mesEtudiants | MadrassApp App',
            

			
		);

		$this->load->view('template/header', $data);
	

		foreach ($mesmatieres as $uneclasse ) {
			//print_r($uneclasse);
						
			$data['mesetudz'] =$this->inscrit_model->myStudz($uneclasse);

echo $this->load->view('enseignant/mesEtudiants', $data, TRUE);
	//print_r($mesetudz);


			
			# code...
		} 

		
		$this->load->view('template/footer', $data); 
}
		else{ redirect('examples/optional_login_test');}
	         
	
	}



        	public function add()
	{
            
            		$data = array(
            'metaTitle' => 'Ajouter un enseignant | MadrassApp App'
		);

 if( $this->require_role('admin') )
{
		$this->load->view('template/header', $data);
		$this->load->view('enseignant/add');
		$this->load->view('template/footer', $data);
            
          }

else{ redirect('examples/optional_login_test');	}  
	}
    
    
            public function addresponse()
	{

		$data = array(          
                      'nomTeacher' => $this->input->post('enseignant_nom'),
                      'prenomTeacher' => $this->input->post('enseignant_prenom'),
                      'emailTeacher' => $this->input->post('enseignant_email'),
                      'naissanceTeacher' => $this->input->post('enseignant_naissance') 
                     );

 if( $this->require_role('admin') )
{
		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->enseignant_model->create($data) === true;
            
           	$data = array(  
            'listenseignants' => $this->enseignant_model->give_all(),
     );
		if ($success) {
			$data['successMessage'] = "L'enseignant a été ajouté avec succès !";
            $data['metaTitle'] = "Liste des enseignants | MadrassApp App";

            $this->load->view('template/header', $data);
			$this->load->view('enseignant/index', $data);
		  $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, enseignant non ajouté.";
            $data['metaTitle'] = "Ajouter un enseignant | MadrassApp App";
            $this->load->view('template/header', $data);
			$this->load->view('enseignant/add', $data);
		$this->load->view('template/footer', $data);
		} 
	}

else{ redirect('examples/optional_login_test');	}      
	}
    
    
     	public function delete($idenseignant)
	{       

	if( $this->require_role('admin') ){ 
            $success = $this->enseignant_model->supprimer($idenseignant) === true;    
            
                     	$data = array(  
            'listenseignants' => $this->enseignant_model->give_all(),
     );

			if ($success) {
			$data['successMessage'] = "L'enseignant a été supprimé avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, enseignant non supprimé.";}
        $data['metaTitle'] = "Liste des enseignants | MadrassApp App";        
        $this->load->view('template/header', $data);
        $this->load->view('enseignant/index', $data);
		$this->load->view('template/footer', $data);     

		      }

else{ redirect('examples/optional_login_test');	}  
	}


     	public function deleteCompte($idEnseignant)
	{      
	if( $this->require_role('admin') ){  

		$monmail = $this->enseignant_model->IDtoMAIL($idEnseignant);
		
        $success = $this->enseignant_model->supprCompteTeacher($monmail) === true; 

            
                     	$data = array(  
            'listenseignants' => $this->enseignant_model->give_all(),

     );

			if ($success) {
			$data['successMessage'] = "Le COMPTE 'enseignant a été supprimé avec succès !";  
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, enseignant non supprimé.";}
        $data['metaTitle'] = "Liste des étudiant | MadrassApp App";


        $this->load->view('template/header', $data);
        $this->load->view('enseignant/index', $data);
		$this->load->view('template/footer', $data); 

		}

else{ redirect('examples/optional_login_test');	}
}


    
         	public function edit($idenseignant)
	{     
                if( $this->require_role('admin') ){  
                $data = array(
            'metaTitle' => 'Modifier un enseignant | MadrassApp App',
            'monenseignant' => $this->enseignant_model->givebyID($idenseignant),

		);
		$this->load->view('template/header', $data);
		$this->load->view('enseignant/update',$data);
		$this->load->view('template/footer');
                
                }

else{ redirect('examples/optional_login_test');	}
            }
    
    public function editresponse($idenseignant)
	{
if( $this->require_role('admin') ){
		$data = array( 
                      'nomTeacher' => $this->input->post('enseignant_nom'),
                      'prenomTeacher' => $this->input->post('enseignant_prenom'),
                      'emailTeacher' => $this->input->post('enseignant_email'),
                      'naissanceTeacher' => $this->input->post('enseignant_naissance')
                     
                     );

		// Créer une entrer, verifier true, affecter $success
		// PB Affichage errorMessage
		$success = $this->enseignant_model->update($idenseignant,$data) === true;
            
           	$data = array(  
            'listenseignants' => $this->enseignant_model->give_all(),
     );
		if ($success) {
			$data['successMessage'] = "L'enseignant a été modifié avec succès !";
            $data['metaTitle'] = "Liste des enseignants | MadrassApp App";

$this->enseignant_model->modifierUserMail($idenseignant);

            $this->load->view('template/header', $data);
			$this->load->view('enseignant/index', $data);
		  $this->load->view('template/footer', $data);
		}		
		else {
			$data['errorMessage'] = "Une erreur a eu lieu, enseignant non modifié.";
            $data['metaTitle'] = "Modifier un enseignant | MadrassApp App";
            $data['monenseignant'] = $this->enseignant_model->givebyID($idenseignant);

            $this->load->view('template/header', $data);
			$this->load->view('enseignant/update', $data);
		$this->load->view('template/footer', $data);
		}     

		}

else{ redirect('examples/optional_login_test');	}  
	}
    
    
    

    
               		
    
}
