<?php

   class Mainpage extends CI_Model{
// var $limit;
// var $offset;

   	    public function main_page_content(){
   	    	$this->db->where_in('type',array('rec'));
   	    	$query = $this->db->get('content');
   	    	return $query->result();

   	    }
   	    public function  Main_page_trend(){
   	    	$limit=6;
   	    	$offset=0;
   	    	// $limit = $this->limit;
   	    	// $offset = $this->offset;
   	    	$this->db->where_in('type',array('trend'));
   	    	$trend= $this->db->limit($limit,$offset)->get('content');
   	    	return $trend->result();
   	    }
        // public function Main_page_latest(){
        // 	$limit=
        // }
        public function  Main_page_latest(){
        	$limit=3;
        	$offset=0;
        	$this->db->where_in('type',array('latest'));
        	$latest= $this->db->limit($limit,$offset)->get('content');
           return $latest->result();
        }
         public function  Main_page_random(){
          $limit=10;
          $offset=0;
          $this->db->where_in('type',array('all'));
          $latest= $this->db->limit($limit,$offset)->get('content');
           return $latest->result();
        }
          


    public function getCountry($page){
        // $offset = 10*$page;
        // $limit = 10;
        // $sql = "select * from content limit $offset ,$limit";
        // $result = $this->db->query($sql)->result();
           $offset = 0;
           $limit = 1;
           $this->db->where_in('type',array('top'));
           $result = $this->db->limit($limit,$offset)->get('content');
        return $result->result();
    }
   	    	   	    
   }