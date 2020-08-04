<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GenerateModel extends CI_Model {

  public function __construct()
  {
      parent::__construct();
      $this->load->database();
  }

  public function getCountGenerate()
  {
      return $this->db->count_all('generate', FALSE);
  }
  public function lastId(){
      $this->db->order_by('id',"desc")->limit(1);
      $id=$this->db->get('generate')->row();
      if($id==null){
        return 0;
      }else{
        return $id->id;
      } 
  }
  public function getPageGenerate($page, $size,$select,$where,$order)
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
      return $this->db->get('generate', $page, $size)->result();
  }

  public function getGenerate($select,$where)
  {
      if($select!=null){
        $this->db->select($select);
      }
      if($where!=null){
        $this->db->where($where);
      }
      //$this->db->order($order);
      return $this->db->get('generate')->row();
  }

  public function insertGenerate($data)
  {
      $where=array('nim' => $data['nim']);
      $datas=$this->getGenerate(null,$where);
      if($datas!=null){
        return "nim";
      }else{
        if($data['nim']!=null){
          $this->db->set($data);
          $this->db->insert('generate');
          return  "success";
        }
      }
  }

  public function updateGenerate($data, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('generate', $data);
  }

  public function deleteGenerate($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('generate', $val);
  }

}