<?php
class Matiere_model extends MY_Model {
    
    	public function create($unedata) {
		return $this->db->insert('Matiere', $unedata);
	}
    
      public function give_all(){
          $query = $this->db->query("SELECT * FROM Matiere;");
          return $query->result_array();
        }
          public function givebyID($idMatiere)
        {
          $query = $this->db->query("SELECT * FROM matiere WHERE idMatiere='$idMatiere' ;");
          return $query->result_array();
        }

    
        	public function supprimer($idMatiere) {
            return $this->db->delete('Matiere', array('idMatiere' => $idMatiere));   
	       }
        	public function update($idMatiere, $unedata) {   
            return $this->db->update('Matiere',$unedata, array('idMatiere' => $idMatiere));                       
	       }
    
    
    
    
    
    }
?>