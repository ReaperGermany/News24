<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller 
{

	public function index()
	{
		$this->load->model('news_model');

		$data['countPage'] = $this->news_model->get_page_count();

		$config['base_url'] = base_url().'/News/index/';
		$config['total_rows'] = $data['countPage'][0]["COUNT(*)"];
		
		$config['per_page'] = 2; 
		$config['first_link'] = 'В начало';
		$config['last_link'] = 'В конец';

		$config['next_link'] = '  Далее';
		$config['prev_link'] = 'Назад  ';

		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config); 

		$data['news'] = $this->news_model->get_all_news($config['per_page'], $this->uri->segment(3));
		$data['tags'] = $this->news_model->get_tags($data['news']);

		$data['allCategories'] = $this->news_model->get_all_categories();
		$data['allTags'] = $this->news_model->get_all_tags();

		$this->load->view('index', $data);

		
	}

	public function search()
	{
		$this->load->model('news_model');
		if(isset($_POST)){
			$_SESSION['text_search'] = isset($_POST['filtr_post']) ? $_POST['filtr_post'] : null;
			$_SESSION['tags'] = isset($_POST['checkbox_tags']) ? $_POST['checkbox_tags'] : null;
		    $_SESSION['categories'] = isset($_POST['checkbox_cast']) ? $_POST['checkbox_cast'] : null;
		}

		$data['countPage'] = $this->news_model->get_search_count($_SESSION['text_search'], $_SESSION['tags'], $_SESSION['categories']);

		$config['base_url'] = base_url().'/News/search/';
		$config['total_rows'] = $data['countPage'][0]["COUNT(DISTINCT news.id_n)"];
		
		$config['per_page'] = 2; 
		$config['first_link'] = 'В начало';
		$config['last_link'] = 'В конец';

		$config['next_link'] = '  Далее';
		$config['prev_link'] = 'Назад  ';

		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config); 

		$data['news'] = $this->news_model->get_search($_SESSION['text_search'], $_SESSION['tags'], $_SESSION['categories']);
		$data['tags'] = $this->news_model->get_tags($data['news']);

		$data['allCategories'] = $this->news_model->get_all_categories();
		$data['allTags'] = $this->news_model->get_all_tags();

		

	    //$data['search'] = $this->news_model->get_search($text_search, $tags, $categories);

	    $this->load->view('index', $data);

	    
	}
}
?>