

<?php 


class Administradormodel extends CI_Model
{


	function validateuser($login, $senha)
	{
		$sql = $this->db->query("select * from usuario where login = '".$login."' and senha = '".$senha."'");
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