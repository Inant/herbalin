<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function cekLogin($where)
    {
        return $this->db->get_where('user', $where);
    }
}
