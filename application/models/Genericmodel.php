<?php 

class Genericmodel extends CI_Model
{
	
	function inserir($table,$data)
	{
		return $this->db->insert($table,$data);
	}
	
	function listarTodos($table)
	{
		$sql = $this->db->get($table);
		return $sql;	
	}

	function selectPorId($table,$campo,$id)
	{
		$sql = $this->db->get_where($table, array($campo => $id));
		return $sql;
	}

	function selectPorCampo($table,$campo,$id)
	{
		$sql = $this->db->get_where($table, array($campo => $id, 'status'=>'ativo'));
		return $sql;
	}

	function delete($table,$campo,$id)
	{
		$sql = $this->db->delete($table, array($campo => $id));
		return $sql;
	}

	function alterar($table,$campo,$id,$data)
	{
		$this->db->where($campo, $id);
		return $this->db->update($table, $data);
	}

	function select($where){
		$ret = $this->db->query($where);
		return $ret;
	}
}


	?>