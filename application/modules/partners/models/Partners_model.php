<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partners_model extends CI_Model
{
    public function get_data($table)

    {

        $this->db->order_by('name', 'ASC');
        $data =  $this->db->get($table)->result();
        if (!empty($this->input->post('name'))) {
            $field = $this->input->post();
            $insert = $this->db->insert("$table", "$field");
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

    public function get_projects($limit = null, $start = null)
    {

        if ($limit)
            $this->db->limit($limit, $start);

        $profiles = $this->db->get("partners_profile")->result();

        foreach ($profiles as $row) :
            $this->attach_related($row);
        endforeach;

        return $profiles;
    }

    public function attach_related($row)
    {

        $row->partners   = $this->get_profile_partners($row->id);
        $row->activities = $this->get_profile_activities($row->id);
        $row->funders    = $this->get_profile_funders($row->id);
    }

    public function get_profile_partners($profile_id)
    {
        $this->db->where('profile_id', $profile_id);
        $this->db->join("partners", "partners.id=profile_partners.partner_id");
        return $this->db->get("profile_partners")->result();
    }

    public function get_profile_activities($profile_id)
    {
        $this->db->where('profile_id', $profile_id);
        $this->db->join("activities", "activities.id=partners_activities.activity_id");
        return $this->db->get("partners_activities")->result();
    }

    public function get_profile_funders($profile_id)
    {
        $this->db->where('profile_id', $profile_id);
        $this->db->join("funder", "funder.id=partners_funders.funder_id");
        return $this->db->get("partners_funders")->result();
    }

    public function save_partner()
    {
        $data = $this->input->post();

        $partners   = $data["partner"];
        $funders    = $data["funder"];
        $activities = @$data['theme'];

        $data = array(
            "project"    => $data['project'],
            "start_date" => $data['start_date'],
            "end_date"   => $data['end_date'],
            "email"      => $data['email'],
            "organisation_telephone" => $data['organisation_telephone'],
            "contact_person_title"   => $data['person_title'],
            "contact_person_name"    => $data['name'],
            "contact_phone_number"   => $data['phone_number'],
            "contact_position"       => $data['position']
        );

        $query  = $this->db->insert("partners_profile", $data);

        if ($query) {
            $msg = "Saved Successfully";

            $profile_id = $this->db->insert_id();

            $this->save_profile_partners($profile_id, $partners);
            $this->save_profile_activities($profile_id, $activities);
            $this->save_profile_funders($profile_id, $funders);
        } else {
            $msg = "Failed Try Again";
        }

        return $msg;
    }

    public function save_profile_partners($profile_id, $data)
    {

        foreach ($data as $key => $value) {

            $row = ['profile_id' => $profile_id, "partner_id" => $value];
            $this->db->insert("profile_partners", $row);
        }
    }

    public function save_profile_activities($profile_id, $data)
    {
        foreach ($data as $key => $value) {
            $row = ['profile_id' => $profile_id, "activity_id" => $value];
            $this->db->insert("partners_activities", $row);
        }
    }

    public function save_profile_funders($profile_id, $data)
    {
        foreach ($data as $key => $value) {
            $row = ['profile_id' => $profile_id, "funder_id" => $value];
            $this->db->insert("partners_funders", $row);
        }
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

    public function count_projects()
    {
        return $this->db->count_all("partners_profile");
    }
}
