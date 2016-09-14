<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('blog_model');
    }
 
    function index(){
        $data['query'] = $this->blog_model->ler_postagens();
        $this->load->view('blog',$data);

    }
 
    function add_post(){
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
 
        //faz a validação
        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[80]');
        $this->form_validation->set_rules('post', 'Post', 'required');
 
        if ($this->form_validation->run() == FALSE){
            $this->load->view('add_post');
        }
        else{
            if($this->input->post('userfile')){
                $config["upload_path"] = "./public/uploads/";
                $config["allowed_types"] = "gif|jpg|png";
                $config["overwrite"] = TRUE;
                $this->load->library("upload", $config);
                if ($this->upload->do_upload()) {
                    $nomeorig = $config["upload_path"] . "/" . $this->upload->file_name;
                    $nomedestino = $config["upload_path"] . "ft-" .uniqid().  $this->upload->file_ext;
                    rename($nomeorig, $nomedestino);
                    
                    //define opções de crop
                    $config["image_library"] = "gd2";
                    $config["source_image"] = $nomedestino;
                    $config["width"] = 500;
                    $config['quality'] = "100%";
                    $config['height'] = 500;
                    $this->load->library("image_lib", $config); 
                    $this->image_lib->resize();
                    
                } else {
                    $this->upload->display_errors();
                }
                if ($nomedestino == FALSE) {
                    var_dump($this->blog_model->ler_postagem($id));
                }
                $attributes = array(
                    'titulo' => $this->input->post('titulo'),
                    'post'   => $this->input->post('post'),
                    'imagem' => $nomedestino
                );
            }else{
                $attributes = array(
                    'titulo' => $this->input->post('titulo'),
                    'post'   => $this->input->post('post')
                );
            }
            $this->blog_model->add_post($attributes);
            redirect('');
        }
    }
    function post($id){
        if($id == FALSE){
            redirect('');
        }
        $data['post'] = $this->blog_model->ler_postagem($id);
        $this->load->view('post', $data);
    }
    function edit_post($id){
        if($id == FALSE){
            redirect('');
        }
        $this->load->helper('form');
        $this->load->library(array('form_validation','session'));
        //faz a validação
        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[80]');
        $this->form_validation->set_rules('post', 'Post', 'required');
 
        if ($this->form_validation->run() == FALSE)
        {   
            $data['id'] = $id;
            $data['post'] = $this->blog_model->ler_postagem($id);
            $this->load->view('edit_post', $data);
        }
        else
        {   
            if($this->input->post('userfile')){
                $config["upload_path"] = "./public/uploads/";
                $config["allowed_types"] = "gif|jpg|png";
                $config["overwrite"] = TRUE;
                $this->load->library("upload", $config);
                if ($this->upload->do_upload()) {
                    $nomeorig = $config["upload_path"] . "/" . $this->upload->file_name;
                    $nomedestino = $config["upload_path"] . "ft-" .uniqid().  $this->upload->file_ext;
                    rename($nomeorig, $nomedestino);
                    
                    //define opções de crop
                    $config["image_library"] = "gd2";
                    $config["source_image"] = $nomedestino;
                    $config["width"] = 500;
                    $config['quality'] = "100%";
                    $config['height'] = 500;
                    $this->load->library("image_lib", $config); 
                    $this->image_lib->resize();
                    
                } else {
                    $this->upload->display_errors();
                }
                if ($nomedestino == FALSE) {
                    var_dump($this->blog_model->ler_postagem($id));
                }
                $attributes = array(
                    'titulo' => $this->input->post('titulo'),
                    'post'   => $this->input->post('post'),
                    'imagem' => $nomedestino
                );
            }else{
                $attributes = array(
                    'titulo' => $this->input->post('titulo'),
                    'post'   => $this->input->post('post')
                );
            }
            
            $this->blog_model->att_post($id, $attributes);
            redirect('');
        }
        
        
    }
    function delete_post($id){
        $this->blog_model->delete_post($id);
        redirect('');
    }

}