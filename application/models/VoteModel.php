<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VoteModel extends CI_Model {

  public function __construct()
  {
      parent::__construct();
      $this->load->database();
  }

  public function getCountVote()
  {
      return $this->db->count_all('vote', FALSE);
  }
  public function getAllVote()
  {
      return $this->db->get('vote')->result();
  }
  public function lastId(){
      $this->db->order_by('id',"desc")->limit(1);
      $id=$this->db->get('vote')->row();
      if($id==null){
        return 0;
      }else{
        return $id->id;
      } 
  }
  public function getPageVote($page, $size,$select,$where,$order)
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
      return $this->db->get('vote', $page, $size)->result();
  }

  public function getVote($select,$where)
  {
      if($select!=null){
        $this->db->select($select);
      }
      if($where!=null){
        $this->db->where($where);
      }
      //$this->db->order($order);
      return $this->db->get('vote')->row();
  }

  public function insertVote($data)
  {
      $where=array('generate_vote' => $data['generate_vote']);
      $datas=$this->getVote(null,$where);
      if($datas!=null){
        return "generate_vote";
      }else{
        if($data['generate_vote']!=null){
          $this->db->set($data);
          $this->db->insert('vote');
          return  "success";
        }
      }
  }

  public function updateVote($data, $id)
  {
    $this->db->where('id', $id);
    return $this->db->update('vote', $data);
  }

  public function deleteVote($id)
  {
    $val = array(
      'id' => $id
    );
    return $this->db->delete('vote', $val);
  }

}