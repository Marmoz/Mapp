<?php
class Filiere_model extends MY_Model {
    
    	public function create($unedata) {
		return $this->db->insert('Filiere', $unedata);
	}
    
      public function give_all(){
          $query = $this->db->query("SELECT * FROM Filiere;");
          return $query->result_array();
        }
          public function givebyID($idFiliere)
        {
          $query = $this->db->query("SELECT * FROM Filiere WHERE idFiliere='$idFiliere' ;");
          return $query->result_array();
        }

    
        	public function supprimer($idFiliere) {
            return $this->db->delete('Filiere', array('idFiliere' => $idFiliere));   
	       }
        	public function update($idFiliere, $unedata) {   
            return $this->db->update('Filiere', $unedata, array('idFiliere' => $idFiliere));                       
	       }
    
    
    
    
    
    }
?>