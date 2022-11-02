<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{
    public function get_data($table)

    {

        $this->db->order_by('name', 'ASC');
        $data =  $this->db->get($table)->result();
        if (!empty($this->input->post('name'))) {
            $field = $this->input->post();
            $insert = $this->db->insert("$table", $field);
        }
        if ($insert) {
            $data['message'] = "Saved Successfully";
        } else {
            $data['message'] = "Not Saved";
        }
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
    public function create_partner($data)
    {
        $data = array(
            "project" => $data['project'],
            "partner" => $data['partner'],
            "start_date" => $data['start_date'],
            "end_date" => $data['end_date'],
            "email" => $data['email'],
            "organisation_telephone" => $data['organisation_telephone'],
            "contact_person_title" => $data['person_title'],
            "contact_person_name" => $data['name'],
            "contact_phone_number" => $data['phone_number'],
            "contact_position" => $data['position']
        );

        $query = $this->db->insert("organizations", $data);
        $org_id = $this->db->insert_id();
        //$this->project_data($org_id, $data);
        if ($query) {
            $msg = "Saved Successfully";
        } else {
            $msg = "Failed Try Again";
        }
        return $msg;
    }
    public function project_data($org_id, $data)
    {
        for ($i = 0; $i < count($data['district']); $i++) {
            $insert = array(
                "organisation_id" => $org_id,
                "district_id" => $data['district'][$i]
            );
            $this->db->insert("organisation_district", $insert);
        }
        for ($i = 0; $i < count($data['funder']); $i++) {
            $insert2 = array(
                "organisation_id" => $org_id,
                "funder_id" => $data['funder'][$i]
            );
            $this->db->insert("organisation_funders", $insert2);
        }
        //thematic areas and activities
        for ($i = 0; $i < count($data['activities']); $i++) {
            $insert3 = array(
                "organisation_id" => $org_id,
                "activity_id" => $data['activities'][$i]
            );
            $this->db->insert("organisation_activities", $insert3);
        }
    }
}
