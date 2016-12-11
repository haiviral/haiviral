<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Mainpage');
		$content = $this->Mainpage->main_page_content();
		$trend = $this->Mainpage->main_page_trend();
		$latest = $this->Mainpage->main_page_latest();
		$random = $this->Mainpage->main_page_random();
		$this->load->view('Main',['data'=>$content,'trendpost'=>$trend,'latest'=>$latest,'random'=>$random]);


	}
	public function Detail($id)
	{
		print_r($id);exit;
		$this->load->model('Mainpage');
		$latest = $this->Mainpage->main_page_latest();
		$this->load->view('Detail',['latest'=>$latest]);
	}





		
    public function getData(){
        $page =  $_GET['page'];
        $this->load->model('Mainpage');
        $countries = $this->Mainpage->getCountry($page);


        foreach($countries as $country){
   				
            echo ('<img src="viralhai/'.$country->link.'">');
                 echo '<p>'.$country->news.'</p>'; 
         }
        exit;
    }
}
