<?php
defined('BASEPATH') or exit('No direct script access allowed');

class welcome_model extends CI_Model
{
    public function cadastrar($dados)
    {
        try {
            $this->db->insert('insert_arquivo', $dados);
            return $this->db->insert_id();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
