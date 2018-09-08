<?php
class Comporte_model extends MY_Model {
     /*
      public function give_all()
        {
          $query = $this->db->query("SELECT * FROM Filiere;");
          return $query->result_array();
                }
    
          public function give_matiere()
        {
          $query = $this->db->query("SELECT * FROM comporte ORDER BY idFiliere;");
          return $query->result_array();
                }

    
             
              public function name_matiere($id)
        {
                  $query = $this->db->get_where('Matiere', array('idMatiere' => $id)
                  $this->db->query($sql,array($id));
                  
                  
                }
               
    
	public function create($unedata) {
		return $this->db->insert('Etudiant', $unedata);
	}
     */
     
    
    
                      public function get_all()
        {
    $this->db->select('Filiere.nomFiliere, Matiere.nomMatiere, comporte.coeff, Filiere.idFiliere, Matiere.idMatiere');
$this->db->from('comporte');
//      $this->db->group_by("Filiere.nomFiliere"); 

// $this->db->where(array('notedby.idStudent' => $idStud));
$this->db->join('Filiere', 'Filiere.idFiliere = comporte.idFiliere');
$this->db->join('Matiere', 'Matiere.idMatiere = comporte.idMatiere');
$this->db->order_by('Filiere.nomFiliere', 'DESC');
                          
$query = $this->db->get();
                  return $query->result_array();
                }
    
        
                      public function get_comporte4()
        {
    $this->db->select('Filiere.idFiliere, Filiere.nomFiliere, Matiere.idMatiere, Matiere.nomMatiere, comporte.coeff');
$this->db->from('Filiere');
$this->db->join('comporte', 'Filiere.idFiliere = comporte.idFiliere');
$this->db->join('Matiere', 'Matiere.idMatiere = comporte.idMatiere');
                          
$query = $this->db->get();
                  return $query->result_array();
                }
    
    
    
    
    	public function create($unedata) {
		return $this->db->insert('comporte', $unedata);
	}
    
        
    
    public function delete($idFiliere,$idMatiere) {
        
        $this->db->delete('comporte', array( 'idFiliere' => $idFiliere,
                                          'idMatiere' => $idMatiere));
        
	}
    
    
    public function update($idFiliere, $idMatiere, $unedata) { 
            return $this->db->update('comporte', $unedata, array( 'idFiliere' => $idFiliere,
                                          'idMatiere' => $idMatiere));    
            }

}
?>