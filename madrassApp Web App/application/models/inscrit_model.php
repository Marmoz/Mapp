<?php
class Inscrit_model extends MY_Model {
    
   
      public function give_all()
        {
          $query = $this->db->query("SELECT * FROM inscrit;");
          return $query->result_array();
                }
    

	public function create($unedata) {
		return $this->db->insert('inscrit', $unedata);
	}

       public function zeTeach()
        {
 $this->db->select('Enseignant.nomTeacher, Enseignant.prenomTeacher, Filiere.nomFiliere, inscrit.teach');
$this->db->from('inscrit');
$this->db->where(array('inscrit.idFiliere' => $data['idFiliere'],
                        'inscrit.annee' => $data['annee'],
));

$this->db->join('Filiere', 'inscrit.idFiliere = Filiere.idFiliere');

$this->db->join('Etudiant', 'Etudiant.idStudent = inscrit.idStudent');
$query = $this->db->get();
                   return $query->result_array();
                }
  

    


    
               public function desinscrire($idEtudiant,$idFiliere,$idas) {
        
        // Desinscrire
       return $this->db->delete('inscrit', array('idStudent' => $idEtudiant,
                                          'idFiliere' => $idFiliere,
                                          'annee' => $idas)); 
        
	}
             public function myStudz($data)
        {
 $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent, Filiere.nomFiliere, inscrit.annee');
$this->db->from('inscrit');
$this->db->where(array('inscrit.idFiliere' => $data['idFiliere'],
                        'inscrit.annee' => $data['annee'],
));

$this->db->join('Filiere', 'inscrit.idFiliere = Filiere.idFiliere');

$this->db->join('Etudiant', 'Etudiant.idStudent = inscrit.idStudent');
$query = $this->db->get();
                   return $query->result_array();




                }
    

    

    
    public function miseajour($idEtudiant, $oldfili, $oldyear,$newfiliere,$newidas ){
        
        $this->db->set('idFiliere', $newfiliere);
        $this->db->set('annee', $newidas);
        $this->db->where('idStudent', $idEtudiant);
        $this->db->where('idFiliere', $oldfili);
        $this->db->where('annee', $oldyear);

return $this->db->update('inscrit'); 




        
          }
        
        
     public function give_AnneeScolaire()
        {
          $query = $this->db->query("SELECT * FROM AnneeScolaire;");
          return $query->result_array();
                }
    
        
public function switchInfoAdmin($idUser)
        {
          $query = $this->db->query("SELECT idAdministrator FROM administrateur WHERE user_id='$idUser' ;");
          return $query->result_array();
        }
        
        
}
?>