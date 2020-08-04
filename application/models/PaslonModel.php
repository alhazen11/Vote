<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PaslonModel extends CI_Model {

  public function __construct()
  {
      parent::__construct();
      $this->load->database();
  }

  public function getCountPaslon()
  {
      return $this->db->count_all('paslon', FALSE);
  }
  public function lastId(){
      $this->db->order_by('id',"desc")->limit(1);
      $id=$this->db->get('paslon')->row();
      if($id==null){
        return 0;
      }else{
        return $id->id;
      } 
  }
  public function getPagePaslon($page, $size,$select,$where,$order)
  {
      if($select!=null){
        $this->db->select($select);
      }
      if($where!=null){
        $this->db->where($where);
      }
      if($order!=null){
        $this->db->order_by($order['name'],$order['option']);
      }
      return $this->db->get('paslon', $page, $size)->result();
  }
  public function getAllPaslon()
  {
      return $this->db->get('paslon')->result();
  }

  public function getPaslon($select,$where)
  {
      if($select!=null){
        $this->db->select($select);
      }
      if($where!=null){
        $this->db->where($where);
      }
      //$this->db->order($order);
      return $this->db->get('paslon')->row();
  }

  public function insertPaslon($data)
  {
      $where=array('nama' => $data['nama']);
      $datas=$this->getPaslon(null,$where);
      if($datas!=null){
        return "nama";
      }else{
        if($data['nama']!=null){
          $this->db->set($data);
          $this->db->insert('paslon');
          return  "success";
        }
      }
  }

  public function updatePaslon($data, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('paslon', $data);
  }

  public function deletePaslon($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('paslon', $val);
  }

}