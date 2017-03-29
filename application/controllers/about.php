<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class about extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
    $this->load->model('homemodel','',TRUE);
    $this->load->model('aboutusmodel','',TRUE);
  }
	
 public function index()
 {
	$page = "";
	$header = "";
	$session="";
	$result="";
//	$result['contactBranch'] = $this->homemodel->getWebBranch();
	createbody_method($result,$page,$header,$session);
 }
 
 public function about_us(){
	$page = 'about/about-us';
	$header="";
	$session="";
	$result="";
	//$page = 'contact/contact-detail';
	createbody_method($result,$page,$header,$session);
	
}

	public function mission_and_vision(){
		$page = "about/mission-and-vission";
		$header="";
		$session = "";
		$result = "";
		createbody_method($result,$page,$header,$session);
	}
	
	public function life_style_health_club(){
		$page = "about/life-style-health-club";
		$header="";
		$session = "";
		$result = "";
		createbody_method($result,$page,$header,$session);
	}
	
	public function mantra_testimonial(){
		$page = "about/mantra-testimonial";
		$header="";
		$session = "";
		$result['testimonials'] = $this->homemodel->getAllTestimonial();
		createbody_method($result,$page,$header,$session);
	}
	public function career(){
		$page = "about/mantra-career";
		$header="";
		$session = "";
		$result['webBranch'] = $this->homemodel->getWebBranch();
		$result['appliedFor'] = $this->aboutusmodel->getDesignation();
		createbody_method($result,$page,$header,$session);
	}
	
	public function insertMantraCareer(){
		$json_response = array();
		$careerdata = array();
		$posting_date = date("Y-m-d");
		$firstname = trim($this->input->post('career-firstname'));
		$lastname = trim($this->input->post('career-lastname'));
		$mobile = trim($this->input->post('career-mobile'));
		$email = trim($this->input->post('career-email'));
		$branch = trim($this->input->post('branch'));
		$appliedfor = trim($this->input->post('applied-for'));
		
		
		$validation_err = $this->validateMantraCareer($firstname,$lastname,$mobile,$branch,$appliedfor);
		if($validation_err){
			$email_validate = $this->validateEmail($email);
			if($email_validate){
				if($_FILES['career-resume']['error']!=4){
					//$dir = APPPATH . 'assets/career-resume/';
					 $dir = $_SERVER['DOCUMENT_ROOT'].'/images/career_resume';
					
                    $config = array(
                        'upload_path' => $dir,
                        'allowed_types' => 'docx|doc|pdf',
                        //allowed max file size. 0 means unlimited file size
                        'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                        //max file name size
                        'max_filename' => '255',
                        //whether file name should be encrypted or not
                        'encrypt_name' => TRUE
                        //store image info once uploaded
                         );
					$this->load->library('upload', $config);
					$upload_file = $this->upload->do_upload('career-resume');
					if($upload_file){
						$resume_data = $this->upload->data();
						$file_name=$resume_data['file_name'];
						$careerdata = array(
							"first_name" => $firstname,
							"last_name" => $lastname,
							"date_of_posting" => $posting_date,
							"mobile_no" => $mobile,
							"email" => $email,
							"web_branch" => $branch,
							"designation_id" => $appliedfor,
							"resume_name" => $file_name
						);
						
						$insertStatus = $this->aboutusmodel->insertIntoCareer($careerdata);
						if($insertStatus){
							$json_response = array(
							"msg_code" => 1,
							"msg_data" => "Thank you , we will contact you soon..."
							);
						}
						else{
							$json_response = array(
							"msg_code" => 2,
							"msg_data" => "There is something error.Please try again..."
							);
						}
						
					}
					else{
						$json_response = array(
						"msg_code" => 3,
						"msg_data" => "Only .docx, .doc, .pdf files are supported and File size must be less than 2MB"
						);
					}
				}
				else{
					$json_response = array(
					"msg_code" => 0,
					"msg_data" => "Please upload resume"
					);
				}
			}
			else{
				$json_response = array(
				"msg_code" => 0,
				"msg_data" => "Email is not valid"
				);
			}
		}
		else{
			$json_response = array(
				"msg_code" => 0,
				"msg_data" => "* Fields are requierd"
			);
		}
		
		header('Content-Type: application/json');
		echo json_encode($json_response);
		exit();
	}
	
	public function mantra_trainer(){
		$category="Trainer";
		$page="about/mantra-trainer";
		$header = "";
		$session = "";
		$result['trainer'] = $this->aboutusmodel->getTeamMantra($category);
		createbody_method($result,$page,$header,$session);
	}
	
	public function mantra_director(){
		$page="about/mantra-director";
		$header = "";
		$session = "";
		$result = "";
		createbody_method($result,$page,$header,$session);
	}
	
	
	
	private function validateMantraCareer($firstname,$lastname,$mobile,$branch,$appliedfor){
		if($firstname==""){return false;}
		if($lastname==""){return false;}
		if($mobile==""){return false;}
		if($branch=="0"){return false;}
		if($appliedfor=="0"){return false;}
		return true;
	}
	private function validateEmail($email){
		if($email!=""){	
			$email = filter_var($email, FILTER_SANITIZE_EMAIL);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
				return true;
			}
			else {
			return false;
			}
		}
		else{
		return true;
		}
}
	

	
}

?>