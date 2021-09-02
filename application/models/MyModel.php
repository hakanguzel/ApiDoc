<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MyModel extends CI_Model
{

    public function tum_categories()
    {
        return $this->db->from('categories')->get()->result();
    }
    public function tum_methodlar()
    {
        return $this->db->from('methodlar')->get()->result();
    }
}