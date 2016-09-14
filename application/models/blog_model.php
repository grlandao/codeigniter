<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_model extends CI_Model
{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }
 
    function ler_postagens(){
        $query = $this->db->get('posts');
        return $query->result();
    }
 
    function add_post($attributes){
        $this->db->insert('posts', $attributes);
    }
    function ler_postagem($id){
        $this->db->select()->from('posts')->where("id", $id);
        $query = $this->db->get();
        if ($query->row()) {
            return $query->row();
        }else{
            $query = array(
                    'titulo' => 'Postagem não encontrada',
                    'post'   => ''   
                );
            $query = (object) $query;
            return $query;
        }
        
    }
    function att_post($id, $attributes){
        $this->db->where('id', $id);
        $this->db->update('posts', $attributes);
    }
    function delete_post($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
    }
}