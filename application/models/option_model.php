<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class option_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    // ========= SMS CENTER MODEL SETTING =======
    public function sms_opt($id)
    {
      return $this->db->get_where('sms_setting', array('status' => $id));
    }
    // ===========================================
    // public function checkPassLama($id, $pass)
    // {
    //   return $this->db->get_where('sig_users', array('id' => $id, 'user_pass'=>$pass));
    // }

    // public function get_user_data($id)
    // {
    //   return $this->db->get_where('sig_users', array('id' => $id));
    // }
    // public function update_user_data($id, $update)
    // {
    //   $this->db->where('id', $id);
    //   return $this->db->update('sig_users', $update);
    // }

}
/* End of file model_option.php */
/* Location: ./application/models/model_option.php */
