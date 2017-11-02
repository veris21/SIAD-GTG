<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class option_model extends CI_Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function sms_opt($id)
    {
      return $this->db->get_where('sig_options', array('status_option' => $id));
    }

}
/* End of file model_option.php */
/* Location: ./application/models/model_option.php */
