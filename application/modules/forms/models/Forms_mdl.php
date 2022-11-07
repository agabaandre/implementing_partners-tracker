<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_mdl extends CI_Model
{


   public function __Construct()
   {

      parent::__Construct();
   }
   public function get_data($table, $parent_table)
   {
      $data = $this->db->get($table)->result();
      foreach ($data as $row) :
         $this->attached_data($row, $parent_table);
      endforeach;
      return $data;
   }
   public function attached_data($row, $parent_table)
   {
      $this->db->where($parent_table . '.id', $row->id);
      $data = $this->db->get($parent_table)->row();

      $row->$parent_table = $data;
      return $row;
   }
   public function get_parent_data($parent_table)
   {
      return $this->db->get($parent_table)->result();
   }
}
