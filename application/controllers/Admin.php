<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function auth_login()
	{
    	$email = $this->input->post('email');
    	$passwd = $this->input->post('passwd');

    	$this->load->model('admin_model');

    	$this->admin_model->login($email,$passwd);

    	redirect('news','refresh');
    }
	
	public function addNews()
	{
		
		$name_text = $this->input->post('text_name');
		$litle_text = $this->input->post('litle_text');
		$full_text = $this->input->post('full_text');
		$categorie = $this->input->post('categorie');
		$tags = $this->input->post('checkbox_tags');

		if (isset($_FILES["fileToUpload"]["name"]) && $_FILES["fileToUpload"]["name"]) {
			$img = $_FILES["fileToUpload"]["name"];

			$target_dir = $_SERVER['DOCUMENT_ROOT']."/images/";

			$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

			if ($_FILES['fileToUpload']['size']) {
			    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			    
			} else {
			   	$check = false;
			}
		    if($check != false) {
		        $uploadOk = 1;
		    } else {
		        $data['errorStr'] = 'Файл не является изображением. Изображение установлено по умолчанию.';
		        $uploadOk = 0;
		    }
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    $data['errorStr'] = 'Файл слишком большой. Изображение установлено по умолчанию.';
			    $uploadOk = 0;
			}
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    $data['errorStr'] = 'Извините можно добавлять только изображения с раширением JPG, JPEG, PNG & GIF. Изображение установлено по умолчанию.';
			    $uploadOk = 0;
			}
			
			if ($uploadOk != 0) {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			    } else {
			        $data['errorStr'] = 'Ошибка загрузки изображения. Изображение установлено по умолчанию.';
			    }
			}

		}
		else {
			$img = 'images/0.jpg';
		}
		if (isset($data['errorStr'])) {
			$img = 'images/0.jpg';
		}

		if (isset($name_text)) {
			$this->load->model('admin_model');
			$this->admin_model->addNews($name_text,$litle_text, $full_text, $categorie, $tags, $img);

			$data['accessStr'] = 'Новость добавлена';
		}
		
		$this->load->model('news_model');

		$data['categories'] = $this->news_model->get_all_categories();
		$data['allTags'] = $this->news_model->get_all_tags();

		$this->load->view('index_admin',$data);
	}

	public function addMat() {

		$this->load->model('news_model');

		//$data['allTags'] = $this->news_model->get_all_tags();

		$this->load->view('admin_add');

	}

	/*public function addCategories () {
		$this->load->model('news_model');

		$data['categories'] = $this->news_model->get_all_categories();

		$this->load->view('addCategories',$data);

	}*/

	public function delNews ()
	{
		/*$email = $this->input->post('email');
    	$passwd = $this->input->post('passwd');

		$name = $_POST['name'];
		$litle_text = $_POST['litle_text'];
		$full_text = $_POST['full_text'];
		$img = $_POST['img'];
		$cat = $_POST['cat'];
		//$tags = $_POST['tags['id_t']'];*/
	}

	public function editNews ()
	{
		/*$email = $this->input->post('email');
    	$passwd = $this->input->post('passwd');

		$name = $_POST['name'];
		$litle_text = $_POST['litle_text'];
		$full_text = $_POST['full_text'];
		$img = $_POST['img'];
		$cat = $_POST['cat'];
		//$tags = $_POST['tags['id_t']'];*/
	}

	function logout()
	 {
	   session_destroy();
	   redirect('news', 'refresh');
	 }

}
