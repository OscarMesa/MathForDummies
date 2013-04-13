<?php 
	/**
	* 
	*/
	class Videos extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('model_videos','mvideos');
		}
		public function index()
		{
			
		}

		public function SearchVideo()
		{
			$data['videos'] = $this->mvideos->SearchVideo($this->input->post('valuesearch'));
			$data['table'] = 'videos';
			echo $this->load->view('SearchTable',$data);
		}

		public function LoadViewVideos()
		{
			$data['videos'] = $this->mvideos->getAllVideos();
			$this->load->view('view_videos', $data);
		}
		

		public function upload()
		{
			$data = json_decode($this->input->post('data'));
			$rpt = array('rpt'=>true,'msg'=>array('El video subio correctamente.'));
			$name = $this->com_create_guid1();
			$filename = $name.'.'.$data->format;
			if($data->server == 'youtube')
			{
				$this->load->library('ClassYouTubeAPI');

				$username ='oscarmesa.elpoli@gmail.com';
				$pass='oscarmesa';
				$obj = new ClassYouTubeAPI();
				$result = $obj->clientLoginAuth($username,$pass);
				if ($_FILES["file"]["error"] > 0)
				  {
				  	$rpt['rpt'] = false;
				  	$rpt['msg']['status'] = 'El video presento un error'.$_FILES["file"]["error"];
				  }
				else
				  {
					  flush();
					  $filename = $filename;
					  $fullFilePath = $_FILES['file']['tmp_name'];
					  $title =$data->title;
					  $description = $data->description;
					  $result = $obj->uploadVideo($filename,$fullFilePath,$title,$description);
					  $this->mvideos->insert_video(array($result['webSite'].'embed/'.$result['videoId'],$data->title,'video',$data->description));
				  }
			}else {
				move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$filename);
				chmod("upload/".$filename, 0777);
				$this->mvideos->insert_video(array(base_url()."upload/".$name,$data->title,'video',$data->description));
				shell_exec('nohup php /opt/lampp/htdocs/MathForDummies/upload/CloneVideo.php '.$data->format.' '.$filename.' '.$name.' > /dev/null &');
			}	
			echo json_encode($rpt);
		}

		public function com_create_guid1() 
		{
	         if (function_exists('com_create_guid') === true) {
	             return trim(com_create_guid(), '{}');
	         }
	         return strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535)));
		}
	}

?>






