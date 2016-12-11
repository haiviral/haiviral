<?php
class Login extends CI_Controller {
  
public function index()
{
  if ($this->session->userdata('id'))
    return redirect('Welcome');
  $this->load->helper('form');
  $this->load->view('login.php');
  
}
public function admin_login()
{
$this->form_validation->set_rules('email','Email','required|valid_email');
  $this->form_validation->set_rules('password','Password','required|trim|min_length[6]');
  $this->form_validation->set_error_delimiters("<p class='text-danger'>", "</p>");
  if ($this->form_validation->run()==TRUE)
  {
    $email= $this->input->post('email');
    $password= $this->input->post('password');
      
      $this->load->model('Adminlogin');
      $log_id=$this->Adminlogin->Loginadmin($email,$password);
      if ($log_id)
      {
       $this->session->set_userdata('id',$log_id);
        return redirect('Welcome');
       

      }
      else{
        $this->session->alart('login_failed','Inavlid Username or Password!');
        return redirect('Main');


      }
  }
    else {
          $this->load->model('Mainpage');
    $content = $this->Mainpage->main_page_content();
    $trend = $this->Mainpage->main_page_trend();
    $latest = $this->Mainpage->main_page_latest();
    $this->load->view('Main',['data'=>$content,'trendpost'=>$trend,'latest'=>$latest]);
    
    }

}
public function logout()
{
  $this->session->unset_userdata('id');
  return redirect('Main');

}
}