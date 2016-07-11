

<?php 


class Administradormodel extends CI_Model
{


	function validateuser($login,$senha)
	{
		$sql = $this->db->query("select * from usuarios where login = '".$login."' and senha = '".$senha."' and status = 'ativo'");
		if($sql->num_rows()==1)
		{
			return $sql->result();
		}
		else
		{
			return false;
		}
	}
}
?>