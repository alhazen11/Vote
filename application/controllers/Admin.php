<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('pagination');
        $this->load->library('session');
        $this->load->model('GenerateModel');
        $this->load->model('PaslonModel');
        $this->load->model('VoteModel');
        $this->salt = "okelah";
        $this->username = "test";
        $this->password = md5(sha1("test"));
        $this->deadline = True;
    }
    function login(){
		$data = array(
        'js_index' => 'login.php',
		);
		if($this->session->logged_in){
			redirect(base_url());
		}else{
			$this->load->view('layout_admin_login',$data);
		}

    }
    public function session()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5(sha1($password));
		if($this->username == $username &&  $this->password==$password){
			$newdata = array(
	        'name'  => 'Admin',
	        'username'  => $username,
	        'logged_in' => TRUE
			);
			$this->session->set_userdata($newdata);
			//$encode_data = json_encode($newdata);
			//echo $encode_data;
			?>
			<div class="alert alert-success" role="alert">
			 Successfully logged in.
			</div>
			<script>setTimeout(function(){window.location.href='<?=base_url()?>admin/list'},2000);</script>
			<?php
		}else{
			?>
			<div class="alert alert-warning" role="alert">
			 Failed to login, Your email or password is incorrect!
			</div>
			<?php
		}
	}
    function logout(){
        $newdata = array('name', 'username','logged_in');
        $this->session->unset_userdata($newdata);
        redirect(base_url()."admin/login");
    }
    function paslon(){
        if($this->session->logged_in){
    		$data_h = array(
		        'title' => 'Paslon',
		        'active' => 'paslon'
                );
            $data_f = array('js_index' => 'paslon.php');
            $db =$this->PaslonModel;
            $order['name'] = 'nomor_paslon';
            $order['option'] = 'DESC';
            $data['list'] = $db->getAllPaslon();
			$this->load->view('layout_admin_header',$data_h);
			$this->load->view('layout_admin_paslon',$data);
			$this->load->view('layout_admin_footer', $data_f);
		}else{
			redirect(base_url()."admin/login");
		}
    }
    function p_add(){
        if($this->session->logged_in){
            $date= date("Y-m-d");
            $name = $this->input->post('name');
            $nomor = $this->input->post('nomor');
            $ketua = $this->input->post('ketua');
            $wakil = $this->input->post('wakil');
            $desc = $this->input->post('desc');

            $image_name = "image-".md5($name);
            $filename = $image_name . '.' . 'png';
            $config['upload_path']          = "./image";
            $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPEG|JPG|PNG';
            $config['file_name']            = $filename;
            $config['overwrite']			= true;
            $config['max_size']             = 10024; // 1MB
            // $config['max_width']            = 1024;
            // $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                print_r($this->upload->display_errors());
                $photo="image/".$this->upload->data("file_name");
            }else{
                ?>
                <div class="alert alert-warning" role="alert">
                Image not allow.
                </div>
                <?php
                exit();
            }
            $input = array('ketua' => $ketua,'wakil' => $wakil,'nomor_paslon' => $nomor,
            'desc' => $desc, 'nama' => $name, 'foto' => $photo, 'create_date' => $date);
            $data = $this->PaslonModel->insertPaslon($input);
            if($data=="success"){ ?>
                <div class="alert alert-success" role="alert">
                Successfully add paslon.
                </div>
                <script>setTimeout(function(){window.location.href='<?=base_url()?>admin/paslon'},2000);</script>
                <?php
            }else {
                ?>
                <div class="alert alert-warning" role="alert">
                Failed add paslon.
                </div>
                <?php
            }	
		}else{
			redirect(base_url()."login");
		}
    }
    function p_delete(){
        if($this->session->logged_in){
            $id= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data = $this->PaslonModel->deletePaslon($id);    
		}else{
			redirect(base_url()."admin/login");
		}
    }
    function p_pilih(){
        $date= date("Y-m-d");
        $id= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $ex = explode("-",$id);
        $where=array('generate' => $ex[1], 'vote' => False);
        $cek=$this->GenerateModel->getGenerate(null,$where);
        if ($cek!=null) {
            $where=array('vote' => True);
            $this->GenerateModel->updateGenerate($where,$cek->id);
            $input = array('generate_vote' => md5(sha1($date)."-".$ex[1]), 'vote' => $ex[0], 'create_date' => $date);
            $data = $this->VoteModel->insertVote($input);
            if($data=="success"){ ?>
                <div class="alert alert-success" role="alert">
                Successfully memilih paslon.
                </div>
                <script>setTimeout(function(){window.location.href='<?=base_url()?>vote'},3000);</script>
                <?php
            }
        }else {
            ?>
            <div class="alert alert-warning" role="alert">
            Failed memilih paslon.
            </div>
            <?php
        }
    }
    function list(){
        if($this->session->logged_in){
    		$data_h = array(
		        'title' => 'List',
		        'active' => 'list'
                );
            $data_f = array('js_index' => 'list.php');
            $db =$this->GenerateModel;
            $total_rows=$db->getCountGenerate();
	    	$config['base_url'] = base_url()."admin/list";
	        $config['total_rows'] =$total_rows;
	        $config['per_page'] = 10;
	        $config['uri_segment'] = 3;
	        $choice = $config["total_rows"] / $config["per_page"];
	        $config["num_links"] = round($choice);
	 
	      	$config['first_link']       = 'First';
	        $config['last_link']        = 'Last';
	        $config['next_link']        = 'Next';
	        $config['prev_link']        = 'Prev';
	        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
	        $config['full_tag_close']   = '</ul></nav></div>';
	        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
	        $config['num_tag_close']    = '</span></li>';
	        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
	        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
	        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
	        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['prev_tagl_close']  = '</span>Next</li>';
	        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
	        $config['first_tagl_close'] = '</span></li>';
	        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
	        $config['last_tagl_close']  = '</span></li>';
	 
	        $this->pagination->initialize($config);
	        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	         //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model.        
	        $data['pagination'] = $this->pagination->create_links();
       		$order['name'] = 'nim';
       		$order['option'] = 'DESC';
			$data['list'] = $db->getPageGenerate($config["per_page"],$data['page'],null,null,$order);
			$this->load->view('layout_admin_header',$data_h);
			$this->load->view('layout_admin_list', $data);
			$this->load->view('layout_admin_footer',$data_f);
		}else{
			redirect(base_url()."admin/login");
		}
    }
    function result(){
        $data_h = array(
            'title' => 'Result',
            'active' => 'result'
            );
        $db =$this->PaslonModel;
        $db2 =$this->GenerateModel;
        $db3 =$this->VoteModel;

        $order['name'] = 'nomor_paslon';
        $order['option'] = 'DESC';
        $data['list'] = $db3->getAllVote();
        $data['paslon'] = $db->getAllPaslon();
        $data['jumlah_peserta'] = $db2->getCountGenerate();
        $data['jumlah_vote'] = $db3->getCountVote();
        $data_f = array('js_index' => 'result.php');
        $this->load->view('layout_admin_header',$data_h);
        if (!$this->deadline){
            $data['list'] = [];
            $data['message'] = "Waktu pemilihan belum selesai.";
            $this->load->view('layout_admin_result',$data);
        }else{
            $this->load->view('layout_admin_result',$data);            
        }
        $this->load->view('layout_admin_footer',$data_f);
    }
    function vote(){
        $data_h = array(
            'title' => 'Vote',
            'active' => 'vote'
            );
        $data_f = array('js_index' => 'vote.php');
        $db =$this->PaslonModel;
        $db2 =$this->GenerateModel;
        $order['name'] = 'nomor_paslon';
        $order['option'] = 'DESC';
        $data['list'] = $db->getAllPaslon();
        $id= ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $this->load->view('layout_admin_header',$data_h);
        $where=array('generate' => $id);
        $datas=$db2->getGenerate(null,$where);
        if ($this->deadline){
            $data['list'] = [];
            $data['message'] = "Waktu pemilihan selesai.";
            $this->load->view('layout_admin_vote',$data);
        }
        else if ($id==null){
            $data['list'] = [];
            $data['message'] = "Tidak memiliki nomor pemilih unik.";
            $this->load->view('layout_admin_vote',$data);            
        }else if($datas==null){
            $data['list'] = [];
            $data['message'] = "Link pemilih tidak terdaftar.";
            $this->load->view('layout_admin_vote',$data); 
        }else if($datas->vote==True){
            $data['list'] = [];
            $data['message'] = "Link pemilih sudah tidak berlaku.";
            $this->load->view('layout_admin_vote',$data); 
        }else{
            $this->load->view('layout_admin_vote',$data);            
        }
        $this->load->view('layout_admin_footer',$data_f);
    }
    function l_add(){
        if($this->session->logged_in){
            $date= date("Y-m-d");
            $awal = $this->input->post('awal');
            $akhir = $this->input->post('akhir');

            for ($x = $awal; $x<= $akhir; $x++)
            {
                $input = array('nim' => $x,'generate' => md5(sha1($x."-".$this->salt."-".$date)),'vote' => False, 'create_date' => $date);
                $data = $this->GenerateModel->insertGenerate($input);
            }
            ?>
                <div class="alert alert-success" role="alert">
                Successfully generate pemilih.
                </div>
                <script>setTimeout(function(){window.location.href='<?=base_url()?>admin/list'},2000);</script>
            <?php
		}else{
			redirect(base_url()."admin/login");
		}
    }
    function l_delete(){
        if($this->session->logged_in){
            $id= ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data = $this->GenerateModel->deleteGenerate($id);    
		}else{
			redirect(base_url()."admin/login");
		}
    }

}
?>