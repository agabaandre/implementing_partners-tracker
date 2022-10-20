<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    public function get_data($table)

    {

        $this->db->order_by('name', 'ASC');
        $data =  $this->db->get($table)->result();
        return  $data;
    }
    public function get_district()
    {
        return  $this->db->get('districts')->result();
    }
    public function get_projects($district, $work_areas, $start, $limit, $csv)
    {


        //$kyc =  implode(',', array_map('add_quotes', $kycs));
        if (!empty($start) && ($csv != 1)) {
            $limits = " LIMIT $limit,$start";
        } else {
            $limits = " ";
        }
        if (!empty($district)) {
            $d  = implode("','", $district);

            $quot = "'";
            $dfilter = $_SESSION['dfilter'] = " and district in  ($quot$d$quot)";
        } else {
            $dfilter = $_SESSION['dfilter'] = "";
        }
        if (!empty($work_areas)) {
            $w  = implode("','", $work_areas);

            $quot = "'";
            $wfilter = $_SESSION['dfilter'] = " and district in  ($quot$d$quot)";
        } else {
            $wfilter = $_SESSION['dfilter'] = "";
        }
    }
}
