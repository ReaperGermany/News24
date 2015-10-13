<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function login($email, $passwd)
	{
		$this->load->library('encrypt');

		$config['encryption_key'] = "Tolik";
		$passwd = $this->encrypt->encode($passwd);

		$query = $this->db->query("SELECT * from users WHERE email = '$email'");
		$query = $query->result_array();
		
		if ($query) {
			$passwDB = $this->encrypt->decode($query[0]['passwd']);
			if ($passwd = $passwDB) {
				$_SESSION['email'] = $email;
			}
		}
	}

	public function addNews($name_text,$litle_text, $full_text, $categorie, $tags, $img)
	{
		
		$this->db->query("INSERT INTO news (name_text, little_text, full_text, id_c,img) 
			VALUES ('$name_text', '$litle_text', '$full_text', '$categorie', '$img' )");

		$countNews = mysql_insert_id();
		if ($tags) {
			foreach ($tags as $tag) {
				$this->db->query("INSERT INTO tagsnewsreference (id_n, id_t) 
				VALUES ($countNews, $tag)");
			}
		}
	}

}
?>