<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_mdl extends CI_Model
{


    public function __Construct()
    {

        parent::__Construct();
    }
    public function getData()
    {

        $data['updated_records'] = "";


        // $data['mhwdata']= $this->db->query("SELECT reference as ministry_workers from records_json WHERE JSON_EXTRACT(data,'$.hw_type')='mhw'")->num_rows();

        return $data;
    }

    //
    public function district_count()
    {

        return $counts = 1;
    }
}
