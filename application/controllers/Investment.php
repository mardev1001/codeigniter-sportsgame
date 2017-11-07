<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
 class Investment extends CI_Controller
  {
	  public function __construct()
	  {
		  parent::__construct();
		  $this->load->model('Common_model','cmodel');
	  }
	public function index()
	   {
		$where = array('user_type'=>'investment'); 
		$data['result'] = $this->cmodel->select_where('register',$where);
		$data['countrows'] = $this->cmodel->count_where('register',$where);
		$data['content'] = 'investmentview';
		$this->load->view('template',$data);
       }
	 
    public function saveInvestment()
	     {
			 $id = trim($this->input->post('id'));
			 if(empty($id))
			 {
             $where = array('email'=>$this->input->post('email'));
			 $result = $this->cmodel->select_single_where('register',$where);
			 if(count($result)>0)
			 {
				 $data['inerror_message'] = 'Email Already Exists';
				 $data['content'] = 'addinvestmentview';
		         $this->load->view('template',$data); 
			 }
			 else
			 {
 			     $data = array('uname'=>$this->input->post('uname'),
			              'fname'=>$this->input->post('fname'),
						  'lname'=>$this->input->post('lname'),
						  'password'=>$this->input->post('password'),
						  'inmanager'=>$this->input->post('inmanager'),
						  'site'=>$this->input->post('site'),
						  'mlbet'=>$this->input->post('mlbet'),
						  'network_id'=>$this->input->post('network_id'),
						  'splash_url'=>$this->input->post('splash_url'),
						  'email'=>$this->input->post('email'),
						  'splash_url'=>$this->input->post('splash_url'),
						  'cellphone'=>$this->input->post('cellphone'),
						  'homecity'=>$this->input->post('homecity'),
						  'besttime'=>$this->input->post('besttime'),
						  'profile1'=>$this->input->post('profile1'),
						  'profile2'=>$this->input->post('profile2'),
						  'user_type'=>'investment'
						  );
					  
						  $result = $this->cmodel->insert('register',$data);
						  redirect(base_url('investment'));
	          } 
			 }
			 else
			 {
			//update section start here
			$new_network_id = $this->input->post('network_id');
			$old_network_id = $this->input->post('old_network_id');

               if($new_network_id!=$old_network_id)
			    {
			  $where = array('network_id'=>$new_network_id);
			  $result = $this->cmodel->select_single_where('register',$where);
			  if(count($result)>0)
			  {
				  $this->session->set_flashdata('netid_exists','Network Id Already Exists');
				  redirect(base_url('investment'));
			  }
			  else {
				 $where = array('id'=>$this->input->post('id'));
			     $data = array('uname'=>$this->input->post('uname'),
			              'fname'=>$this->input->post('fname'),
						  'lname'=>$this->input->post('lname'),
						  'password'=>$this->input->post('password'),
						  'inmanager'=>$this->input->post('inmanager'),
						  'site'=>$this->input->post('site'),
						  'mlbet'=>$this->input->post('mlbet'),
						  'network_id'=>$new_network_id,
						  'email'=>$this->input->post('email'),
						  'splash_url'=>$this->input->post('splash_url'),
						  'email'=>$this->input->post('email'),
						  'cellphone'=>$this->input->post('cellphone'),
						  'homecity'=>$this->input->post('homecity'),
						  'besttime'=>$this->input->post('besttime'),
						  'profile1'=>$this->input->post('profile1'),
						  'profile2'=>$this->input->post('profile2'),
						  'user_type'=>'investment'
						  );
						 $this->cmodel->update_where('register',$where,$data);
						 redirect(base_url('investment')); 
			  }
			  
			}
			else{
				
				$where = array('id'=>$this->input->post('id'));
			    $data = array('uname'=>$this->input->post('uname'),
			              'fname'=>$this->input->post('fname'),
						  'lname'=>$this->input->post('lname'),
						  'password'=>$this->input->post('password'),
						  'inmanager'=>$this->input->post('inmanager'),
						  'site'=>$this->input->post('site'),
						  'mlbet'=>$this->input->post('mlbet'),
						  'network_id'=>$old_network_id,
						  'email'=>$this->input->post('email'),
						  'splash_url'=>$this->input->post('splash_url'),
						  'email'=>$this->input->post('email'),
						  'cellphone'=>$this->input->post('cellphone'),
						  'homecity'=>$this->input->post('homecity'),
						  'besttime'=>$this->input->post('besttime'),
						  'profile1'=>$this->input->post('profile1'),
						  'profile2'=>$this->input->post('profile2'),
						  'user_type'=>'investment'
						  );
						 $this->cmodel->update_where('register',$where,$data);
						 redirect(base_url('investment'));
			}				
			 }


		}
	  public function editInvestment()
		{
			$where = array('user_type'=>'investment'); 
		    $data['result'] = $this->cmodel->select_where('register',$where);
		    $data['countrows'] = $this->cmodel->count_where('register',$where);
			$id = $this->uri->segment(4);
            $where2 = array('id'=>$id);
		    $data['eresult'] =  $this->cmodel->select_single_where('register',$where2);
			$data['content'] = 'investmentview';
			$this->load->view('template',$data);
		}
    
	public function deleteInvestment()
		{
			$where = array('id'=>$this->uri->segment(4));
		    $this->cmodel->delete_where('register',$where);
            redirect(base_url('investment'));
		}


  }
?>