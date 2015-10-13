<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class news_model extends CI_Model {

	
	public function get_all_news ($num, $offset)
	{
        $strQuery = "SELECT * FROM news LEFT JOIN categories ON news.id_c = categories.id_c LIMIT $num";
        if($offset){
        	$strQuery .= ", $offset"; 
        }
        $query = $this->db->query($strQuery);
        
		return $query->result_array();

	}

	public function get_page_count ()
	{
		$query = $this->db->query('SELECT COUNT(*) FROM news');
		return $query->result_array();
	}

	public function get_tags ($news)
	{
		if($news){
		foreach ($news as $curNews):
			$newsID = $curNews['id_n'];
			$query = $this->db->query("SELECT tags.name_tags FROM news INNER JOIN tagsnewsreference ON news.id_n = tagsnewsreference.id_n 
				INNER JOIN tags ON tags.id_t = tagsnewsreference.id_t WHERE news.id_n ='.$newsID'");
			$tags_array[$newsID] = $query->result_array();	
		endforeach;

		return $tags_array;
		}
	}
	public function get_all_categories ()
	{
		$query = $this->db->query('SELECT * FROM categories');              
		return $query->result_array();
	}


	public function get_all_tags ()
	{
		$query = $this->db->query('SELECT * FROM tags'); 
		return $query->result_array();
	}

	public function get_search ($text_search, $tags, $categories) {
		$strQuery = "SELECT DISTINCT news.id_n, news.name_text, news.little_text,
			categories.name, news.id_c, news.img, news.date FROM news 
			LEFT JOIN tagsnewsreference ON news.id_n = tagsnewsreference.id_n
			LEFT JOIN categories ON news.id_c = categories.id_c WHERE news.name_text LIKE '%$text_search%'";
		if ($tags) {
			$strQuery .=" AND (";
			foreach ($tags as  $tag) {
				$strQuery .= " tagsnewsreference.id_t = $tag";
			}
			$strQuery .=")";
		}
		if ($categories) {
			foreach ($categories as $cat) {
				$strQuery .= " AND news.id_c = $cat";
			}
		}

		$query = $this->db->query($strQuery);
		return $query->result_array();
	}

	public function get_search_count ($text_search, $tags, $categories) {
		$strQuery = "SELECT COUNT(DISTINCT news.id_n) FROM news 
							LEFT JOIN tagsnewsreference ON news.id_n = tagsnewsreference.id_n
							LEFT JOIN categories ON news.id_c = categories.id_c 
							WHERE news.name_text LIKE '%$text_search%'";
		if ($tags) {
			foreach ($tags as  $tag) {
				$strQuery .= " AND tagsnewsreference.id_t = $tag";
			}
		}
		if ($categories) {
			foreach ($categories as $cat) {
				$strQuery .= " AND news.id_c = $cat";
			}
		}

		$query = $this->db->query($strQuery);

		return $query->result_array();
	}

}
?>