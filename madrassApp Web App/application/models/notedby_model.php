<?php
class Notedby_model extends MY_Model {
    
      public function give_all()
        {
          $query = $this->db->query("SELECT * FROM notedby;");
          return $query->result_array();
                }
    /*
              public function getnote($idStud)
        {
    $this->db->select('*');
$this->db->from('notedby');
$this->db->where(array('idStudent' => $idStud));
$query = $this->db->get();
                  return $query->result_array();
                }
    */

	public function create($unedata) {
		return $this->db->insert('notedby', $unedata);
	}
    
      public function deletenote($idEtudiant,$idTeacher,$idMatiere, $annee) {
        
                    // Supprimer les notes
        return $this->db->delete('notedby', array('idStudent' => $idEtudiant,
                                          'idTeacher' => $idTeacher,
                                          'idMatiere' => $idMatiere,
                                          'annee' => $annee,
                                        ));
        
	}
    
    	public function update($idEtudiant,$idTeacher,$idMatiere, $annee, $unedata) { 
              
             return $this->db->update('notedby', $unedata, array( 'idStudent' => $idEtudiant,
                                          'idTeacher' => $idTeacher,
                                          'idMatiere' => $idMatiere,
                                          'annee' => $annee,));   
            }
    
     public function getALL()
        {
    $this->db->select('Etudiant.nomStudent, Etudiant.prenomStudent, Matiere.nomMatiere, Enseignant.nomTeacher, notedby.note_S1, notedby.note_S2, notedby.note_Finale, notedby.annee, notedby.idTeacher, notedby.idStudent, notedby.idMatiere');
$this->db->from('notedby');
$this->db->join('Enseignant', 'notedby.idTeacher = Enseignant.idTeacher');
$this->db->join('Etudiant', 'notedby.idStudent = Etudiant.idStudent');
$this->db->join('Matiere', 'notedby.idMatiere = Matiere.idMatiere');
$query = $this->db->get();
                  return $query->result_array();
                }

    

}
?>