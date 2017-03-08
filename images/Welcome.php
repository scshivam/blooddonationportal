<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *     http://example.com/index.php/welcome
   *  - or -
   *     http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $this->load->view('index');
  }
  public function home()
  {
    
    $this->load->view('home');
    $this->invitation_script();
    
  }
  public function department_group()
  {
    $this->load->model('model_epoque');
    $data = $this->model_epoque->group_events();
    $this->invitation_script();
    if ($data == 0) {
       redirect(base_url().'Welcome/student_dash');
    }
    else{
      $this->load->view('dept_group',$data);
    
    }
    
  }
  public function department_group_registration()
  {
    $this->load->model('model_epoque');
    $this->invitation_script();
    $data = $this->model_epoque->group_events_registration();
    
    
  }
  public function department_group_registration1($Event_Id)
  {
    $this->load->model('model_epoque');
    $this->invitation_script();
    $row=$this->model_epoque->group_events_registration1($Event_Id);
    $this->load->view('dept_group1',$row);
  }
  public function institute_group()
  {
    $this->load->model('model_epoque');
    $this->invitation_script();
    $data = $this->model_epoque->institute_events();
    $this->load->view('institute_group',$data);
    
  }
  public function institute_group_registration()
  {
    $this->load->model('model_epoque');
    $this->invitation_script();
    $data = $this->model_epoque->institute_events_registration();
    
    
  }
  public function institute_group_registration1($Event_Id)
  {
      
    $this->load->model('model_epoque');
    $this->invitation_script();

    $row=$this->model_epoque->institute_events_registration1($Event_Id);
    $this->load->view('institute_group1',$row);
  }

  public function department_solo()
  {
    $this->load->model('model_epoque');
    $this->invitation_script();
    $data = $this->model_epoque->solo_events();
    //var_dump($data);
    //$this->load->view('static_header');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
    $this->load->view('dept_solo',$data);
    
  }
  public function dept_events_view()
  {
    $this->load->model('model_epoque');
    $data = $this->model_epoque->dept_events_view();
    //var_dump($data);
    //$this->load->view('static_header');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
    $this->load->view('dept_events_view',$data);
    //
  }
  public function institute_events_view()
  {
    $this->load->model('model_epoque');
    $data = $this->model_epoque->institute_events_view();
    //var_dump($data);
    //$this->load->view('static_header');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
    $this->load->view('institute_events_view',$data);
    //
  }
  public function dept_events_view_students()
  {
    $this->load->model('model_epoque');
    $data = $this->model_epoque->dept_events_view();
    //var_dump($data);
    //$this->load->view('static_header');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
    $this->load->view('dept_events_view_students',$data);
    
  }
    public function events_apex(){

    $this->load->model('model_epoque');
    $data = $this->model_epoque->get_event_id();
   $this->cord_apex($data);

  }

  public function cord_apex($event_id)
  {
      $this->load->model('model_epoque');
  $r = $this->model_epoque->events_students_cord($event_id);
   //$r['s']=$this->model_epoque->group_team_details($event_id);
   // var_dump($r);
     $this->load->view('events_apex',$r);
      //var_dump($r);
  }
   public function team_detail($k)
{
    $this->load->model('model_epoque');
    $res = $this->model_epoque->group_members($k);//passs the single argument
  //var_dump($res);
  $this->load->view('team_detail',$res);
}
  public function department_solo_registration()
  {
    $this->load->model('model_epoque');
    $this->invitation_script();
    $data = $this->model_epoque->solo_events_registration();
    if($data==1)
    {
       $this->session->set_flashdata('success', 'Registered Successfully!');
            redirect('welcome/department_solo');
    }
    if($data==3)
    {
       $this->session->set_flashdata('fail', 'You Have Exceeded Maximum Limit!');
             redirect('welcome/department_solo');
    }
    if($data==0)
    {
       $this->session->set_flashdata('already', 'You Are Already Registered For This Event!');
             redirect('welcome/department_solo');
    }
    //var_dump($row);
    //$this->load->view('static_header');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
    //$this->load->view('dept_group',$data);
    
  }
  public function institute()
  {
    $this->load->model('model_epoque');
    $data = $this->model_epoque->institute_events();
    //var_dump($row);
    //$this->load->view('static_header');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
    $this->load->view('institute',$data);
    
  }
  public function institute_registration()
  {
    $this->load->model('model_epoque');
    $this->invitation_script();
    $data = $this->model_epoque->institute_registration();
    if($data==1)
    {
       $this->session->set_flashdata('success', 'Registered Successfully!');
             redirect('welcome/department_solo');
    }
    if($data==0)
    {
       $this->session->set_flashdata('fail', 'You Have Exceeded Maximum Limit!');
             redirect('welcome/department_solo');
    }
    //var_dump($row);
    //$this->load->view('static_header');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
    //$this->load->view('dept_group',$data);
    
  }
    public function student_coordinator()
  {
  //  $this->load->view('static_header');
    $this->load->model('model_epoque');
    $result=explode('_',$this->model_epoque->event_info());
    $view["event"]=$result[1];
    $view["dept"]=$result[0];
     $where=array(
            "dept_id"=>$view["dept"],
            "Event_name"=>$view["event"]
            );
     $result1 = $this->model_epoque->event_details($where);


      foreach ($result1 as $row) {
       $view['Venue'] = $row->Venue;
        $view['Start_time'] = $row->Start_time ;
        $view['End_time'] = $row->End_time ;
         $view['img'] = $row->img ;
         $view['Date'] = $row->Date;

    }

    // $this->load->view('test_view',$result1);

    /* $view['venue']=$result1['Venue'];
     $view['start_time']=$result1['Start_time'];

     $view['end_time']=$result1['End_time']; */
    // $view['dept_id']= $this->coordinator_event->dept_detail($view);
  $this->load->view('student_coordinator',$view);
    //var_dump($this->session);
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
  }
  
   
  public function upload_image()
  {
    $this->load->library('upload');
    //$image=$this->upload->do_upload('image');
    $event=strtoupper(trim($this->input->post('event')));
    $dept=trim($this->input->post('dept'));
    $venue=strtoupper(trim($this->input->post('venue')));
    $start_time=trim($this->input->post('start_time'));
    $end_time=trim($this->input->post('end_time'));
    $date=trim($this->input->post('date'));
   // $image=$_FILES['image'];
  // print_r($date);
    //  $upload=$this->input->post('image');
      /*if ($_FILES['image']['error']!= UPLOAD_ERR_OK) {
    switch ($_FILES['image']['error']) {
    case UPLOAD_ERR_INI_SIZE:
    die('The uploaded file exceeds the upload_max_filesize directive'.
    'in php.ini.');
    break;
    case UPLOAD_ERR_FORM_SIZE:
    die('The uploaded file exceeds the MAX_FILE_SIZE directive that ' .
    'was specified in the HTML form.');
    break;
    case UPLOAD_ERR_PARTIAL:
    die('The uploaded file was only partially uploaded.');
    break;
    case UPLOAD_ERR_NO_FILE:
    die('No file was uploaded.');
    break;
    case UPLOAD_ERR_NO_TMP_DIR:
    die('The server is missing a temporary folder.');
    break;
    case UPLOAD_ERR_CANT_WRITE:
    die('The server failed to write the uploaded file to disk.');
    break;
    case UPLOAD_ERR_EXTENSION:
    die('File upload stopped by extension.');
    break;
    }
    }
    $imagename=$dept.'_'.$event.'.jpg';
    $path='images\events\\'.$imagename;
    if($_FILES['image']['name']!="")
    {
      move_uploaded_file($_FILES['image']['tmp_name'], $path);
    }
     else
    {
        //die("No file specified!");
         redirect('welcome/student_coordinator');
    }*/

          $this->load->model('model_epoque');

          $data=array( 
            "Start_time"=>$start_time,
            "End_time"=>$end_time,
            "Venue"=>$venue,
        
          "Date"=>$date
            );
          $where=array(
            "dept_id"=>$dept,
            "Event_name"=>$event,
            );
        $value= $this->model_epoque->update_event_info($data,$where);
        if($value==1)
        {
         $this->session->set_flashdata('updated','updated succesfully');
          redirect('welcome/student_coordinator');
    
      }
      else
      {
        $this->session->set_flashdata('not_updated','Failed to Upload');
          redirect('welcome/student_coordinator');
    
      }
          
   
  }



  
  public function event_cordinator()
  {
    $this->load->model('Model_epoque');
    $data['even_type']=$this->Model_epoque->event_cordinator_model0();
   // var_dump($data);
    $data['created_login']=$this->Model_epoque->event_cordinator_created_login();
  // var_dump($data);
  $this->load->view('assign_event_cordinator',$data);  
   
  
  
  }
  
  
   public function event_cordinator_1()
  {
   $val=$this->input->post('value');
  //  $val='1';
   
    $this->load->model('Model_epoque');
    $data['name']=$this->Model_epoque->event_cordinator_model_2($val);
   
     echo  json_encode($data['name']);
   
}
 
  
  /*public function event_cordinator()
  {
    
    $this->load->model('Model_epoque');
    $data['events']=$this-> Model_epoque->event_cordinator_model1();
    
     // $this->load->view('static_header');
    $this->load->view('assign_event_cordinator',$data);
    
      //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
    
  }*/
  public function event_cordinator_submit()
  {
    $this->load->model('Model_epoque');
    
    $msg=$this->Model_epoque->event_cordinator_model_1();
  //var_dump($msg);
    $this->session->set_flashdata('message',$msg);
    
    redirect('Welcome/event_cordinator');
        }

  public function apex_info()
  {
    //$this->load->view('static_header');
  //  $this->load->view('static_left_panel');
    $this->load->view('apex_info_reg');
  //  $this->load->view('static_footer');
    
  }
  public function apex_info_submit()
  {
    $this->load->model('Model_epoque');
    $msg=$this->Model_epoque->apex_info();
    if($msg==0)
    {
    $this->session->set_flashdata('message',"SUCCESSFULLY INSERTED");
    }
    else{
    $this->session->set_flashdata('message',"ALREADY INSERTED");
    }  
    redirect('Welcome/apex_info');
  }

 public function view_student_apex_info()
  {
//$this->load->view('static_header');
   // $this->load->view('static_left_panel');
    $this->load->model('Model_epoque');
    $data['details']=$this->Model_epoque->student_apex_info();
      $this->load->view('view_student_apex_cordinator',$data);
   // $this->load->view('static_footer');
   }

  public function view_faculty_apex_info()
  {
   //   $this->load->view('static_header');
   // $this->load->view('static_left_panel');
    $this->load->model('Model_epoque');
    $data['details']=$this->Model_epoque->faculty_apex_info();
      $this->load->view('view_faculty_apex_cordinator',$data);
    //$this->load->view('static_footer');
   }
   public function super_admin()
  {
    //$this->load->view('static_header');
    $this->load->view('sup_admin');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
  }

  public function superadmin_submit()
  {
    

    $this->load->library('form_validation');
        $this->form_validation->set_rules('level','Level','required|trim');
      $this->form_validation->set_rules('name','Event name','required|trim|alpha');
      $this->form_validation->set_rules('p_type','Participation type','required|trim');
      $p_type=$this->input->post('p_type');
      if($p_type=='group')
       {  
       
         $this->form_validation->set_rules('max_nop','Maximum No of participants','required|trim|callback_maxmin['.$this->input->post("min_nop").']');
          $this->form_validation->set_rules('min_nop','Minimum No of participantsMaximum No of participants','required|trim');
         
         
      }

          $this->form_validation->set_error_delimiters("<p class='text-danger'>","</p>");

           if($this->form_validation->run())
            {
             $level=$this->input->post('level');
               $name=$this->input->post('name');
              if(isset($_POST['max_nop']))
                 {
                 $max_nop=$this->input->post('max_nop');
           $min_nop=$this->input->post('min_nop');
           $this->load->model('model_epoque');
           if($this->model_epoque->valid_admin($level,$p_type,$name, $max_nop,$min_nop))
           {
             $this->load->library('session');
        $this->session->set_flashdata('result', 'Inserted Successfully');
        redirect('welcome/super_admin');

           }
     }

   

   else 
   {
  
     if($this->model_epoque->valid_admin($level,$p_type,$name, '0','0'))
     {
       $this->load->library('session');
        $this->session->set_flashdata('result', 'Inserted Successfully');
        redirect('welcome/super_admin');
   

     
     }  
   }
   }
   else{
     $this->load->view('static_header');
    $this->load->view('sup_admin');
    $this->load->view('static_left_panel');
    $this->load->view('static_footer');
  }
  }

  public function maxmin($max,$min)
  {
     if($max<$min)
      {
        $this->form_validation->set_message('maxmin', 'Minimum No. of participants should not exceed Maximum No.');
        return FALSE;
      }
     else 
        return TRUE;
  }

  public function register(){

    //$this->load->view('static_header');
    $this->load->view('register');
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
  }

  public function login(){

    //$this->load->view('static_header');
    $this->load->view('login');
    $this->invitation_script();
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
  }

  public function apex_login(){

    //$this->load->view('static_header');
    $this->load->view('apex_login');
    //var_dump($this->session);
    //$this->load->view('static_left_panel');
    //$this->load->view('static_footer');
  }

  public function logout(){
      $this->session->unset_userdata('logged_in');
      $this->session->unset_userdata('hash0');
      $this->session->unset_userdata('hash1');
      $this->session->unset_userdata('hash2');
      $this->session->unset_userdata('hash3');
    //  $this->session->unset_userdata('event_name');
    //  $this->session->unset_userdata('dept');
      $this->session->sess_destroy();
      redirect (base_url().'/Welcome/home');
    }

  public function error2(){
    echo 'error3' ;
  }

  public function error3(){
    echo 'error4' ;
  }

  public function success(){
    echo 'success' ;
  }

/*  public function register_validation(){
           
           if($this->session->userdata('logged_in')){
        redirect (base_url().'/Welcome/home');
      }
         //  echo 'there';

    $this->load->model('model_epoque');
    $q = $this->model_epoque->validate(); 

    if($q){  //valid lib_id and lib_password
             
             $data = array(
               'libid'          => $this->input->post('lib_id'),
               'libpass'      => $this->input->post('lib_pass'),
               'is_logged_in'   => true
               );

             $this->session->set_userdata($data); 
             $redirect('members_area');


    }
    else{  // lib_id and lib_password don't match
             echo 'invalid';
    }   
  }  */


   public function reg_val(){
             
             if($this->session->userdata('logged_in')){
        redirect (base_url().'/Welcome/register');
      }

      $this->form_validation->set_rules('lib_id','Library id','trim|max_length[7]|min_length[5]|required');
      $this->form_validation->set_rules('lib_pass','Library Password','trim|max_length[15]|min_length[5]|required');
      $this->form_validation->set_rules('mob','Mobile','trim|max_length[10]|min_length[10]|required');

      $this->form_validation->set_rules('set_pass','Set Password','trim|max_length[15]|min_length[5]|required');
      $this->form_validation->set_rules('con_pass','Confirm Password','trim|max_length[15]|min_length[5]|required|matches[set_pass]');
      
      if($this->form_validation->run()==false){   //Inputs not validated
        $this->register();
      }

      else{   //Inputs Validated

        $this->load->model('model_epoque');
            $q = $this->model_epoque->validate(); 

              if($q){   // Library Id and password match

                     if($this->model_epoque->new_member()!=false){   
                       
                       // If New User successfully registered
                    

                $this->session->sess_destroy();
          
                  }
                  else{   // If New User notregistered
                                 $this->session->set_flashdata('reg_fail_already','You are already Registered');
                     redirect (base_url().'/Welcome/register');
                  }

                }
            else  
          {   // Library Id and password match

            $this->session->set_flashdata('reg_fail','Invalid Library Id or Library Password');
            redirect (base_url().'/Welcome/register');
          }
                
      }

    }


  public function login_val(){

      if($this->session->userdata('logged_in')){
        redirect (base_url().'/Welcome/home');
      }

            $this->form_validation->set_rules('regn_id','Registeration id','trim|max_length[9]|min_length[8]|required');
      $this->form_validation->set_rules('regn_pass','Password','trim|max_length[15]|min_length[5]|required');

      if($this->form_validation->run()==false){   //Inputs not validated
        $this->login();
      }


      else{
          
          $this->load->model('model_epoque');
           $this->model_epoque->login_validation();

          //   $data['name'] = $q ;
          //   $this->load->view('test_view',$data);
    }
            
 }  



public function apex_val(){


      if($this->session->userdata('logged_in')){
        redirect (base_url().'/Welcome/home');
      }

            $this->form_validation->set_rules('username','Username','trim|max_length[100]|min_length[5]|required');
      $this->form_validation->set_rules('apex_pass','Password','trim|max_length[15]|min_length[5]|required');

      if($this->form_validation->run()==false){   //Inputs not validated
        $this->apex_login();
      }

      else{
          
          $this->load->model('model_epoque');
           $this->model_epoque->apex_validation();

          //   $data['name'] = $q ;
          //   $this->load->view('test_view',$data);
    }
            
 }  
 public function support_team()
  {
  //$this->load->view('static_header');
    
   //$this->load->view('static_left_panel');
   $this->load->view('technical_team');
   //$this->load->view('static_footer');
   // echo "hi";
  }
    public function invitation()
  {   
    $this->invitation_script();
    $this->load->model('model_epoque');
    $data['row'] = $this->model_epoque->invitation();
      $data['header'] = $this->load->view('static_header',NULL,true);
    $data['static_left_panel'] = $this->load->view('static_left_panel',NULL,true);
    $data['static_footer'] = $this->load->view('static_footer',NULL,true);
        $this->load->view('invitations',$data);
    
  }
  public function invite_accept()
  {
    $this->invitation_script();
      $invited_by=$this->input->post('invited_by');
      //echo $invited_by;
      $event_name=$this->input->post( 'event_name');
      $event_id=$this->input->post('event_id');
    $this->load->model('model_epoque');
      $number_of_events = $this->model_epoque->accept_invitation();
      //echo $number_of_events;
        if(intval($number_of_events) >= 3)
        {
         // echo $number_of_events;
           $this->session->set_flashdata('participation_failure','You or any of your team member has Exceeded The Maximum Limit Of Participation.Therefore your team cannot be registered!');
          redirect(base_url().'Welcome/invitation');
        }
        else
        {
          $data = $this->model_epoque->notification_val();
          if($data === true)
          {
               $this->model_epoque->notification($event_name , $invited_by , $event_id);
                $this->session->set_flashdata('done','  Invitation Has Been Accepted!');
            redirect(base_url().'Welcome/invitation');
          }
          else
          {
            $yes = ($number_of_events-$data['count'])+($data['number_of_rows']);
           // echo '<script>alert("'.$yes.'")</script>';
            if(intval($yes) <= 3)
            {
              
              $this->model_epoque->notification($event_name , $invited_by , $event_id);
               $this->session->set_flashdata('done','Invitation has been accepted!');
              redirect(base_url().'Welcome/invitation');
            }
            else{
              //echo "Yes";
              $this->session->set_flashdata('participation_failure','You or any of your team member has Exceeded The Maximum Limit Of Participation.Therefore your team cannot be registered!');
              redirect(base_url().'Welcome/invitation');
            }
          }
          //
        }
  }
  public function invitation_script()
  {
        $this->load->model('model_epoque');
        $data = $this->model_epoque->script_query();
        //var_dump($data);
  }
    public function student_dash(){

    $this->load->model('model_epoque');
    $data['events'] = $this->model_epoque->student_dash_reg_events();
       // var_dump($r);
    
            $data['stu_name'] = $this->session->userdata('hash3');
        $data['invites'] = $this->model_epoque->student_dash_invited_events();
        //var_dump($data);
    $this->load->view('student_dash2',$data);
  }
  public function contact_us(){

    //$this->load->model('model_epoque');
    //$r = $this->model_epoque->contact_us();
     
    $this->load->view('contact_us');
  }
public function notification_button()
  {
    $this->load->model('model_epoque');
    $result['info']=$this->model_epoque->notification1();
  //  var_dump($result);

    

    
      //$view['Note_By']=$row->NoteBy;
      //$view['Note']=$row->Note;
  //  $this->load->view('static_header');
      $this->load->view('request_notification',$result);
      foreach ($result['info'] as $row) {
                  $res=explode('_', $row);
                 // var_dump($res);
    
        $where=array(
          "NoteId"=> $res[0],
          "NoteTo"=> $res[1],
          "NoteBy"=>  $res[2]
          

        
        );
      $this->model_epoque->seen_update($where);
      
      }
      


  
    
  }
  public function core_team()
  {
    $this->load->view('core_team');
  }
  public function view_result()
{
  $this->load->view('view_result');
}
public function view_result_1()
{
$val=$this->input->post('value');
$this->load->model('model_epoque');
$data['name']=$this->model_epoque->result_dept_ajax($val);
echo json_encode($data['name']);
}
public function view_result_2()
{
$val=$this->input->post('value');
$this->load->model('model_epoque');
$data['name']=$this->model_epoque->result_dept_ajax1($val);
echo json_encode($data['name']);
}
public function view_result_event()
{
  $this->load->model('model_epoque');
  $data=$data=$this->model_epoque->event_result();
  $this->load->view('result_event',$data);
}
public function fill_result()
  {
  
    $this->load->model('Model_epoque');
    $data=$this->Model_epoque->results();
    if($data['dept']=='AS')
    {
    $this->load->view('result_as',$data);  
    }
    else
    {
    $this->load->view('result',$data);
    }
  }
     public function submit_result()
  {
    $this->load->model('Model_epoque');
    $data=$this->Model_epoque->sub_result();
    if($data['check']==0)
    {
    $this->session->set_flashdata("success",'Results Uploaded Successfully');
    redirect('Welcome/fill_result');
    }
  else
  {
    $this->session->set_flashdata("warn",'Results For This Year Are Already Uploaded');
    redirect('Welcome/fill_result');
  }
  }
    public function submit_result_as()
  {
    $this->load->model('Model_epoque');
    $data=$this->Model_epoque->sub_result_as();
    if($data['check']==0)
    {
      $this->session->set_flashdata("success",'Results Uploaded Successfully');
    redirect('Welcome/fill_result');
    }
  else
  {
    $this->session->set_flashdata("warn",'Results Are Already Uploaded');
    redirect('Welcome/fill_result');
  }
    }
  public function sponsers(){
     
      $this->load->view('sponsers');

 } 

}
