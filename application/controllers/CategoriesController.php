<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoriesController extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    private function resultjsonapi($status, $result)
    {
        return $this->output->set_status_header($status)->set_content_type('application/json')->set_output(json_encode($result));
    }

    public function allcategories()
    {
        $allcategories = $this->db->from('categories')->get()->result();
        $this->resultjsonapi(200, $allcategories);
    }
    public function allcategoriesandmethos()
    {
        $allcategories = $this->db->from('categories')->get()->result();
        foreach ($allcategories as $category) {
            $category->submethods = $this->db->from('methods')->where('category', $category->id)->get()->result();
        }
        $this->resultjsonapi(200, $allcategories);
    }

    public function getcategories($id)
    {
        $allcategories = $this->db->where('id', $id)->from('categories')->get()->row();
        $this->resultjsonapi(200, $allcategories);
    }

    public function addorupdatecategories()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $request->slug = $this->str_slug($request->name);

        if ($request->id != null) {
            $this->db->where('id', $request->id)->update('categories', $request);
        } else {
            $this->db->insert('categories', $request);
        }

        $this->allcategories();
    }

    public function deletecategories($id)
    {
        if ((int) $id != 0) {
            $this->db->where('id', $id)->delete('categories');
        }
        $this->allcategories();
    }

    function str_slug($str)
    {
        $bul = ['Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#'];
        $degistir = ['c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp'];

        $str = strtolower(str_replace($bul, $degistir, $str));
        $str = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $str);
        $str = trim(preg_replace('/\s+/', ' ', $str));
        $str = str_replace(' ', '-', $str);
        return $str;
    }
}
