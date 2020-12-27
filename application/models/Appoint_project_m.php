<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Appoint_project_m extends CI_Model {

	protected $tProject = 'm03_project';
    protected $tBid = 'm07_post_bid';

	public function insAppoint()
    {
        $i = 0;
        $doc = array();
        foreach($_POST['document'] as $key => $val){
            $i++;
            $doc[] = array(
                'doc-'.$i => $_POST['document'][$key],
            );
        }

        $id_bid = $this->input->post('post_bid_id', true);
        $project_value = str_replace(".","",$this->input->post('budget', true));

        $this->db->trans_start();
        $this->db->set('is_active', 1);
        $this->db->set('updated_on', 'now()', FALSE);
        $this->db->where('id', $id_bid);
        $this->db->update($this->tBid);

        $dataIns = array(
        	'name' => $this->input->post('post_name', true), 
            'm06_id' => $this->input->post('post_id', true), 
        	'category' => $this->input->post('category', true), 
        	'area' => $this->input->post('area', true), 
        	'budget' => $project_value,
        	'duration' => $this->input->post('duration', true),
        	'est_date_fr' => $this->input->post('start_project', true),
        	'est_date_to' => $this->input->post('finish_project', true),
            'handover_date' => $this->input->post('handover_project', true),
        	'mitra_id' => $this->input->post('mitra_id', true),
        	'customer_id' => $this->input->post('customer_id', true),
            'm07_id' => $this->input->post('post_bid_id', true),
        	'document' => json_encode($doc),
        	'type' => 1,
        );

        $this->db->insert($this->tProject, $dataIns);
        $idProject = $this->db->insert_id();
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            return false;
        } else {
            return $idProject;
        }
    }

    public function cekAppointCustomer($idBid)
    {
        $this->db->where('md5(m07_id)', $idBid);
        $result = $this->db->get('m03_project');
        return $result;
    }

}