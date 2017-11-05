<?php 
	class Common_model extends CI_Model
	{
       public function select($tablename)
		{
			$this->db->select('*')->from($tablename);
			$result = $this->db->get();
			return $result->result_array();
		}
		public function select_where($tablename,$where=array())
		{
			$this->db->select('*')->from($tablename);
			$this->db->where($where);
			$result = $this->db->get();
			return $result->result_array();
		}
		public function select_single_where($tablename,$where=array())
		{
			$this->db->select('*')->from($tablename);
			$this->db->where($where);
			$result = $this->db->get();
			return $result->row_array();
		}
		
		public function select_selectsingle_where($tablename,$select,$where=array())
		{
			$this->db->select($select)->from($tablename);
			$this->db->where($where);
			$result = $this->db->get();
			return $result->row_array();
		}
		
		
		public function select_where_orderby($tablename,$where=array(),$order_by)
		{
			$this->db->select('*')->from($tablename);
			$this->db->where($where);
			$this->db->order_by($order_by);
			$result = $this->db->get();
			return $result->result_array();
		}
		public function select_orderby($tablename,$order_by)
		{
			  $this->db->select('*');
			  $this->db->order_by($order_by);
			  $result = $this->db->get($tablename);
			  return $result->result_array();
		}
		public function select_orderby_limit($tablename,$order_by,$limit)
		{
			  $this->db->select('*');
			  $this->db->order_by($order_by);
			  $result = $this->db->get($tablename);
			  return $result->row_array();
		}
	
       public function select_where_join($tablename1, $tablename2, $tablename3,$where = array())
		{
			$this->db->select('*')->from($tablename1);
			$this->db->join($tablename2,"$tablename2.nid=$tablename1.id");
			$this->db->join($tablename3,"$tablename3.nid=$tablename1.id");
			$this->db->where($where);
			$result = $this->db->get();
			return $result->result_array();
		}	
        public function select_where_in($tablename,$where_in=array())
		{
			$this->db->select('*')->from($tablename);
			$this->db->where_in($where_in[0],$where_in[1]);
			$result = $this->db->get();
			return $result->result_array();
		}
       public function select_with_limit($tablename,$order_by,$limit)
		{
			$this->db->select('*');
			$this->db->order_by($order_by);
			$this->db->limit($limit);
			$result = $this->db->get($tablename);
			return $result->row_array();
		}
        public function select_with_limit_where($tablename,$where,$order_by,$limit)
		{
			$this->db->select('*');
			$this->db->where($where);
			$this->db->order_by($order_by);
			$this->db->limit($limit);
			$result = $this->db->get($tablename);
			return $result->row_array();
		}		

        public function insert($tablename,$data = array())
		 {
			$this->db->insert($tablename,$data);
			return $this->db->insert_id();
		 }
		public function update_where($tablename,$where = array(),$data = array())
		{
			$this->db->where($where);
			$this->db->update($tablename,$data);
		}
       public function delete_where($tablename,$where = array())
		{
			$this->db->where($where);
			$this->db->delete($tablename);
		}
		
		public function select_countwhere($tablename,$select,$where)
		  {
			  $this->db->select($select);
			  $this->db->where($where);
			  $result = $this->db->get($tablename);
			  return $result->row_array();
		  }
		
		public function selelct_countbet($tablename,$select)
		{
			$this->db->select($select);
			/* echo $this->db->last_query(); */
			$result = $this->db->get($tablename); 
			return $result->row_array();
		}
		public function select_count_where($tablename,$select,$group_by)
		  {
			  $this->db->select($select);
			  $this->db->group_by($group_by);
			  $result = $this->db->get($tablename);
			  return $result->result_array();
		  }
		public function select_count($tablename,$group_by,$where = array())
		  {
			  $this->db->select('*,COUNT(bet_day)');
			  $this->db->group_by($group_by);
              $this->db->where($where);			  
			  $result = $this->db->get($tablename);
		 	  return $result->result_array();
		  }
		  public function select_max($tablename,$select)
		  {
			  $this->db->select($select);
			  $result = $this->db->get($tablename);
			  return $result->row_array();
	      }
        public function count_where($tablename,$where = array())
		  {
			  $this->db->select('COUNT(user_type)');
			  $this->db->group_by('user_type'); 
			  $this->db->where($where);
			  $result = $this->db->get($tablename);
			  return $result->result_array();
	      }
   }		  
?>