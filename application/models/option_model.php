<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class option_model extends CI_Model{
    /**
     * Initialize table and primary field variable
     */
    var $table      = "sig_options";

    /**
	* Constructor - Sets up the object properties.
	*/
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add Options
     *
     * @author  Iqbal
     * @param   Array/Object    $data   (Required)  Data of option to add
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Option ID
     */
    function add_option($data){
        if( empty($data) ) return false;
        if( $this->db->insert($this->table, $data) ) {
            $id = $this->db->insert_id();
            return $id;
        };
        return false;
    }

    /**
     * Update Options
     *
     * @author  Iqbal
     * @param   Array/Object    $data   (Required)  Data of option to update
     * @param   Int             $id     (Required)  ID of Option
     * @return  Mixed   Boolean false on failed process, invalid data, or data is not found, otherwise Int of Option ID
     */
    function update_option($data, $id){
        if( empty($id) ) return false;
        if( empty($data) ) return false;
        if( $this->db->update($this->table, $data, array('id_option' => $id)) ) return true;
        return false;
    }
}
/* End of file model_option.php */
/* Location: ./application/models/model_option.php */
