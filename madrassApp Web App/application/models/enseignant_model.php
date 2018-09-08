<?php
class Enseignant_model extends MY_Model {
    
    	public function create($unedata) {
		return $this->db->insert('Enseignant', $unedata);
	}
    
      public function give_all()
        {
          $query = $this->db->query("SELECT * FROM Enseignant;");
          return $query->result_array();
        }
          public function givebyID($idTeacher)
        {
          $query = $this->db->query("SELECT * FROM Enseignant WHERE idTeacher='$idTeacher' ;");
          return $query->result_array();
        }

    
        	public function supprimer($idTeacher) {
            return $this->db->delete('Enseignant', array('idTeacher' => $idTeacher));   
	       }
        	public function update($idTeacher, $unedata) {   
            return $this->db->update('Enseignant', $unedata, array('idTeacher' => $idTeacher));                       
	       }
    
    
    
        public function IDtoMAIL($idEnseignant) {
   $query = $this->db->query("SELECT emailTeacher FROM Enseignant WHERE idTeacher='$idEnseignant' ;");
  $row = $query->row_array();
  return $row['emailTeacher'];
       
    
}


  public function supprCompteTeacher($emailTeacher) {
        
        // Desinscrire
        return $this->db->delete('users', array('email' => $emailTeacher)); 
    
        
  }
    


      public function getinfobyUSERID($idUser)
        {
          $query = $this->db->query("SELECT * FROM Enseignant WHERE user_id='$idUser' ;");
          return $query->result_array();
        }


       public function dewwezTeacher($emailTeacher, $userauthID) {  
                   $this->db->set('user_id', $userauthID);
                   $this->db->where('emailTeacher', $emailTeacher);
                   $this->db->update('Enseignant');                
 
         }



    public function getAll2()
        {
    $this->db->select('Enseignant.nomTeacher, Enseignant.prenomTeacher,Matiere.nomMatiere, teach.nb_heures, teach.annee, Filiere.nomFiliere');
$this->db->from('teach');
$this->db->join('Enseignant', 'teach.idTeacher = Enseignant.idTeacher');
$this->db->join('Filiere', 'teach.idFiliere = Filiere.idFiliere');
$this->db->join('Matiere', 'teach.idMatiere = Matiere.idMatiere');

$query = $this->db->get();
                  return $query->result_array();
        }

            public function getAll()
        {
    $this->db->select('Enseignant.nomTeacher, Enseignant.prenomTeacher,Matiere.nomMatiere, teach.nb_heures, teach.annee, Filiere.nomFiliere');
$this->db->from('comporte');
$this->db->join('teach', 'teach.idMatiere = comporte.idMatiere');
$this->db->join('Enseignant', 'teach.idTeacher = Enseignant.idTeacher');
$this->db->join('Matiere', 'teach.idMatiere = Matiere.idMatiere');

$this->db->join('Filiere', 'comporte.idFiliere = Filiere.idFiliere');

$query = $this->db->get();
                  return $query->result_array();
        }

                    public function getmyIntel($mailUser)
        {
    $this->db->select('Matiere.nomMatiere, teach.nb_heures, teach.annee, Filiere.nomFiliere,Filiere.idFiliere, Enseignant.nomTeacher, Enseignant.idTeacher');
$this->db->from('teach');
$this->db->where(array('Enseignant.emailTeacher' => $mailUser));
$this->db->join('Enseignant', 'teach.idTeacher = Enseignant.idTeacher');
$this->db->join('Matiere', 'teach.idMatiere = Matiere.idMatiere');
$this->db->join('Filiere', 'teach.idFiliere = Filiere.idFiliere');

$query = $this->db->get();
                  return $query->result_array();
        }


          public function myMatiere($mailUser)
        {
    $this->db->select('Filiere.idFiliere, teach.annee,Filiere.nomFiliere,Matiere.nomMatiere,teach.nb_heures,');
$this->db->from('Enseignant');
$this->db->where(array('Enseignant.emailTeacher' => $mailUser));
$this->db->join('teach', 'teach.idTeacher = Enseignant.idTeacher');
$this->db->join('Filiere', 'teach.idFiliere = Filiere.idFiliere');
$this->db->join('Matiere', 'teach.idMatiere = Matiere.idMatiere');
$query = $this->db->get();
return $query->result_array();
        }

 public function myStudents($mailUser)
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent, Filiere.nomFiliere, inscrit.annee');
$this->db->from('inscrit');
$this->db->where(array('Enseignant.emailTeacher' => $mailUser));

$this->db->join('teach', 'inscrit.annee = teach.annee');
$this->db->join('Enseignant', 'teach.idTeacher = Enseignant.idTeacher');
$this->db->join('Filiere', 'inscrit.idFiliere = Filiere.idFiliere');

$this->db->join('Etudiant', 'Etudiant.idStudent = inscrit.idStudent');
$query = $this->db->get();
                   return $query->result_array();

                }




public function getinfobyUSERMAIL($mailUser)
        {
          $query = $this->db->query("SELECT * FROM Enseignant WHERE emailTeacher='$mailUser' ;");
          return $query->result_array();
        }


 public function notebyUSERMAIL($mailUser)
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent, Matiere.nomMatiere, Enseignant.nomTeacher, notedby.note_S1, notedby.note_S2, notedby.note_Finale');
$this->db->from('Etudiant');
$this->db->where(array('Etudiant.emailStudent' => $mailUser));
$this->db->join('notedby', 'notedby.idStudent = Etudiant.idStudent');
$this->db->join('Matiere', 'notedby.idMatiere = Matiere.idMatiere');
$this->db->join('Enseignant', 'notedby.idTeacher = Enseignant.idTeacher');
$query = $this->db->get();
                  return $query->result_array();
                }

                public function modifierUserMail($idEnseignant) {          

  $query = $this->db->query("SELECT user_id, emailTeacher FROM Enseignant WHERE idTeacher='$idEnseignant' ;");
  $row = $query->row();

  $myuserid = $row->user_id;
  $mymail =  $row->emailTeacher; 

            

$this->db->set('email', $mymail);
$this->db->where('user_id', $myuserid );
$this->db->update('users');
                                  


         }


    
    
    }
?>