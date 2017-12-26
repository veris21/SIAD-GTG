<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class option_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    // ========= SMS CENTER MODEL SETTING =======
    public function sms_opt()
    {
      return $this->db->get_where('sms_setting', array('status' => 1));
    }

    public function sms_api_get(){
        return $this->db->get('sms_setting');
    }

    public function sms_api_update($id, $status){
        $this->db->where('id', $id);
        return $this->db->update('sms_setting', $status);
    }

    public function _get_data_api($id){
        return $this->db->get_where('sms_setting', array('id'=>$id));
    }

    public function sms_update_data($id, $update){
        $this->db->where('id', $id);
        return $this->db->update('sms_setting', $update);
    }

    public function sms_insert_data($insert){
        return $this->db->insert('sms_setting', $insert);
    }
    // ===========================================
   
}
/* End of file model_option.php */
/* Location: ./application/models/model_option.php */
