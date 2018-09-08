<?php
class Etudiant_model extends MY_Model {
    
    	public function create($unedata) {
		return $this->db->insert('Etudiant', $unedata);
	}
    
      public function give_all()
        {
          $query = $this->db->query("SELECT * FROM Etudiant;");
          return $query->result_array();
        }
          public function givebyID($idEtudiant)
        {
          $query = $this->db->query("SELECT * FROM Etudiant WHERE idStudent='$idEtudiant' ;");
          return $query->result_array();


        }

                  public function dewwez($emailStudent, $userauthID) {  
                   $this->db->set('user_id', $userauthID);
                   $this->db->where('emailStudent', $emailStudent);
                   $this->db->update('Etudiant');                


         }

    

    

        	public function update($unedata) {   
            return $this->db->replace('Etudiant', $unedata);

	       }

     
    
    
    
                    public function finek()
        {
          $query = $this->db->query("SELECT Etudiant.idStudent, Etudiant.nomStudent, Etudiant.prenomStudent, inscrit.annee, Filiere.nomFiliere, Filiere.idFiliere, inscrit.numInscription
FROM ((Etudiant
LEFT JOIN inscrit ON Etudiant.idStudent = inscrit.idStudent)
LEFT JOIN Filiere ON inscrit.idFiliere = Filiere.idFiliere)
ORDER BY annee DESC, nomFiliere");
          return $query->result_array();
                }
    
    
     
                  public function liste_note($idStud)
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent, Matiere.nomMatiere, Enseignant.nomTeacher, notedby.note_S1, notedby.note_S2, notedby.note_Finale');
$this->db->from('notedby');
$this->db->where(array('notedby.idStudent' => $idStud));
$this->db->join('Etudiant', 'notedby.idStudent = Etudiant.idStudent');
$this->db->join('Matiere', 'notedby.idMatiere = Matiere.idMatiere');
$this->db->join('Enseignant', 'notedby.idTeacher = Enseignant.idTeacher');
$query = $this->db->get();
                  return $query->result_array();
                }




    
 
    
    
 
    
    
    

    
        
	public function desinscrire($idEtudiant) {
        
        // Desinscrire
        return $this->db->delete('inscrit', array('idStudent' => $idEtudiant)); 
    
        
	}
    	
        public function supprimer($idEtudiant) {

        
        // Desinscrire
        $this->db->delete('inscrit', array('idStudent' => $idEtudiant)); 
                    // Supprimer les notes
        $this->db->delete('notedby', array('idStudent' => $idEtudiant));
                                // Supprimer etudiant
        return $this->db->delete('Etudiant', array('idStudent' => $idEtudiant));
       
        
	}



        public function IDtoMAIL($idEtudiant) {
   $query = $this->db->query("SELECT emailStudent FROM Etudiant WHERE idStudent='$idEtudiant' ;");
  $row = $query->row_array();
  return $row['emailStudent'];
       
    
}


     public function modifier($idEtudiant, $unedata) {          
            return $this->db->update('Etudiant', $unedata, array('idStudent' => $idEtudiant));

         }

              public function modifierUserMail($idEtudiant) {          

  $query = $this->db->query("SELECT user_id, emailStudent FROM Etudiant WHERE idStudent='$idEtudiant' ;");
  $row = $query->row();

  $myuserid = $row->user_id;
  $mymail =  $row->emailStudent; 

            

$this->db->set('email', $mymail);
$this->db->where('user_id', $myuserid );
$this->db->update('users');
                                  


         }



  public function supprCompteStudent($emailStudent) {
        
        // Desinscrire
        return $this->db->delete('users', array('email' => $emailStudent)); 
    
        
  }


 public function arabyUSERID($idUser)
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent');
$this->db->from('Etudiant');
$this->db->where(array('Etudiant.user_id' => $idUser));
$this->db->join('users', 'users.user_id = Etudiant.user_id');

$query = $this->db->get();
                  return $query->result_array();
                }






public function getinfobyUSERMAIL($mailUser)
        {
          $query = $this->db->query("SELECT * FROM Etudiant WHERE emailStudent='$mailUser' ;");
          return $query->result_array();
        }

 public function filierebyUSERMAIL($mailUser)
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent, Etudiant.idStudent, Filiere.idFiliere, Filiere.nomFiliere, inscrit.annee');
$this->db->from('Etudiant');
$this->db->where(array('Etudiant.emailStudent' => $mailUser));
$this->db->join('inscrit', 'inscrit.idStudent = Etudiant.idStudent');
$this->db->join('Filiere', 'inscrit.idFiliere = Filiere.idFiliere');
$query = $this->db->get();
                  return $query->row_array();
                }

public function TESTUSERMAIL($mailUser)
        {
          $query = $this->db->query("SELECT * FROM Etudiant WHERE emailStudent='$mailUser' JOIN inscrit ON 'Etudiant.idStudent' = 'inscit.idStudent' SELECT * FROM inscit
WHERE idFiliere LIKE 'a%';   ;");
          return $query->result_array();
        }


 public function classMates($data)
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent');
$this->db->from('inscrit');
$this->db->where(array('inscrit.idFiliere' => $data['idFiliere'],
                    'inscrit.annee' => $data['annee'],
  ));
$this->db->join('Etudiant', 'inscrit.idStudent = Etudiant.idStudent');



$query = $this->db->get();
                  return $query->result_array();
                }


 public function notebyUSERMAIL($mailUser)
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent, Matiere.nomMatiere, Enseignant.nomTeacher, notedby.note_S1, notedby.note_S2, notedby.note_Finale, notedby.annee');
$this->db->from('Etudiant');
$this->db->where(array('Etudiant.emailStudent' => $mailUser));
$this->db->join('notedby', 'notedby.idStudent = Etudiant.idStudent');
$this->db->join('Matiere', 'notedby.idMatiere = Matiere.idMatiere');
$this->db->join('Enseignant', 'notedby.idTeacher = Enseignant.idTeacher');
$query = $this->db->get();
                  return $query->result_array();
                }



  public function getinfobyUSERID($idUser)
        {
          $query = $this->db->query("SELECT * FROM Etudiant WHERE user_id='$idUser' ;");
          return $query->result_array();
        }




                 public function notebyUSERID($idUser)
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent, Matiere.nomMatiere, Enseignant.nomTeacher, notedby.note_S1, notedby.note_S2, notedby.note_Finale');
$this->db->from('Etudiant');
$this->db->where(array('Etudiant.user_id' => $idUser));
$this->db->join('notedby', 'notedby.idStudent = Etudiant.idStudent');
$this->db->join('Matiere', 'notedby.idMatiere = Matiere.idMatiere');
$this->db->join('Enseignant', 'notedby.idTeacher = Enseignant.idTeacher');
$query = $this->db->get();
                  return $query->result_array();
                }


                 public function checkCompte($idEtudiant)
        {
    $this->db->select('Etudiant.user_id');
$this->db->from('Etudiant');
$this->db->where(array('Etudiant.idStudent' => $idEtudiant));
$query = $this->db->get();
                  
                    $row = $query->row_array();
  $monUserID = $row['user_id'];
  if ($monUserID == 0 ) {
    return $monUserID;
  }
  
                }


                

}
?>