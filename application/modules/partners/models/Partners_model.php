<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Partners_model extends CI_Model
{
    public function get_data($table)

    {

        $this->db->order_by('id', 'ASC');
        $data =  $this->db->get($table)->result();
        return  $data;
    }

    public function get_districts()
    {
        return  $this->db->get('districts')->result();
    }

    public function get_projects($limit = null, $start = null)
    {

        if ($limit)
            $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");
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

        return $row;
    }

    public function get_profile_partners($profile_id)
    {
        $this->db->where('profile_id', $profile_id);
        $this->db->join("partners", "partners.id=profile_partners.partner_id");
        return $this->db->get("profile_partners")->result();
    }

    public function get_profile_activities($profile_id)
    {
        $subwork_areas = $this->get_subwork_areas($profile_id);

        if (count($subwork_areas) > 0) :
            $this->db->where_in('sub_work_areas_id',  $subwork_areas);
            $activities = $this->db->get("activities")->result();

            foreach($activities as $row){
                $row->workarea= $this->get_work_area($row->sub_work_areas_id);
            }
            
            return $activities;
        else :
            return [];
        endif;
    }

    public function get_work_area($subwork_area_id){

        $this->db->select("work_areas.id,work_areas.name");
        $this->db->where_in('work_areas.id',  $subwork_area_id);
        $this->db->join("work_areas","work_areas.id=sub_work_areas.work_area_id");

        return $this->db->get("sub_work_areas")->row();
    }

    public function get_subwork_areas($profile_id)
    {
        $this->db->select("work_areas.id");
        $this->db->where('profile_id', $profile_id);
        $this->db->join("work_areas", "work_areas.id=partners_activities.activity_id");

        $work_areas = [];
        foreach ($this->db->get("partners_activities")->result() as $row) {
            $work_areas[] = $row->id;
        }

        if (empty($work_areas))
            return [];

        $this->db->select("sub_work_areas.id");
        $this->db->where_in("work_area_id", $work_areas);
        $subwork_areas = [];

        foreach ($this->db->get("sub_work_areas")->result() as $row1) {
            $subwork_areas[] = $row1->id;
        }
        return $subwork_areas;
    }

    public function get_profile_funders($profile_id)
    {
        $this->db->where('profile_id', $profile_id);
        $this->db->join("funder", "funder.id=partners_funders.funder_id");
        return $this->db->get("partners_funders")->result();
    }

    public function save_partner()
    {
        $postdata = $this->input->post();

        $partners   = $postdata["partner"];
        $funders    = $postdata["funder"];
        $activities = @$postdata['theme'];

        $data = array(
            "project"    => $postdata['project'],
            "start_date" => date('Y-m-d'),
            "end_date"   => date('Y-m-d'),
            "email"      => $postdata['email'],
            "organisation_telephone" => $postdata['organisation_telephone'],
            "contact_person_title"   => $postdata['person_title'],
            "contact_person_name"    => $postdata['name'],
            "contact_phone_number"   => $postdata['phone_number'],
            "contact_position"       => $postdata['position']
        );

        if(!isset($postdata['id'])):
            $query  = $this->db->insert("partners_profile", $data);
            $profile_id = $this->db->insert_id();
        else:
            $this->db->where("id",$postdata['id']);
            $profile_id = $postdata['id'];
            $query  = $this->db->update("partners_profile", $data);
        endif;

        if ($query) {
            $msg = "Saved Successfully";

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

        $this->db->where('profile_id',$profile_id);
        $this->db->delete('profile_partners');

        foreach ($data as $key => $value) {

            $row = ['profile_id' => $profile_id, "partner_id" => $value];
            $this->db->insert("profile_partners", $row);
        }
    }

    public function save_profile_activities($profile_id, $data)
    {
        $this->db->where('profile_id',$profile_id);
        $this->db->delete('partners_activities');

        foreach ($data as $key => $value) {
            $row = ['profile_id' => $profile_id, "activity_id" => $value];
            $this->db->insert("partners_activities", $row);
        }
    }

    public function save_profile_funders($profile_id, $data)
    {
        $this->db->where('profile_id',$profile_id);
        $this->db->delete('partners_funders');

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

    //submit report
    public function save_report()
    {
        $postdata = $this->input->post();
        $rows     = [];

        for ($i = 0; $i < count($postdata['date']); $i++) :

            $profile       = $postdata['profile_id'];
            $date          = $postdata['date'][$i];
            $activities    = $postdata['activity'][$i];
            $budget        = $postdata['budget'][$i];
            $days          = $postdata['duration'][$i];
            $beneficiaries = $postdata['beneficiaries'][$i];
            $location      =  (count($postdata['scope'][$i]) > 1) ? implode(",", $postdata['scope'][$i]) : $postdata['scope'][$i];

            $row = array(
                "profile_id"     => $profile,
                "date"           => $date,
                "activity_id"    => $activities,
                "budget"         => $budget,
                "duration"       => $days,
                "beneficiaries"  => $beneficiaries,
                "location"       => $location
            );

            $this->db->insert('partners_reports', $row);

        endfor;
    }

    public function partners_report($profile_id)
    {

        $this->db->where("profile_id", $profile_id);
        $rows = $this->db->get("partners_reports")->result();

        foreach ($rows as $row) :
            $row->profile  = $this->get_profile($profile_id);
            $row->activity = $this->get_activity($profile_id);
        endforeach;

        return $rows;
    }

    public  function get_profile($profile_id)
    {
        $this->db->where('id', $profile_id);
        $row = $this->db->get("partners_profile")->row();
        $row =  $this->attach_related($row);
        return $row;
    }

    public  function get_activity($activity_id)
    {
        $this->db->where('id', $activity_id);
        return $this->db->get("activities")->row();
    }
}
