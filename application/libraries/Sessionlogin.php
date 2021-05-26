<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sessionlogin
{

    // SET SUPER GLOBAL
    var $CI = NULL;

    /**
     * Class constructor
     *
     * @return   void
     */
    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /*
     * cek username dan password pada table users, jika ada set session berdasar data user dari
     * table users.
     * @param string username dari input form
     * @param string password dari input form
     */
    public function login($id)
    {
        $this->CI->session->set_userdata('id', $id);
    }

    /**
     * Cek session login, jika tidak ada, set notifikasi dalam flashdata, lalu dialihkan ke halaman
     * login
     */
    public function cek_login()
    {

        //cek session username
        if ($this->CI->session->userdata('id') == '') {

            //set notifikasi
            $this->CI->session->set_flashdata('alert', 'warning|<b>Sorry</b> you must login.');

            //alihkan ke halaman login
            redirect(base_url('auth'));
        }
    }


    public function get_session()
    {
        $id = $this->CI->session->userdata('id');
        // echo $id;
        $row  = $this->CI->db->query('SELECT * FROM account where Id = "' . $id . '"');
        if ($row->num_rows() > 0) {
            $user     = $row->row();
            $session["status"] = "ok";
            $session["id"] = $user->Id;
            $session["pict"] = $user->pict_profile;
        } else {
            $session["status"] = "no_found";
        }

        return $session;
    }



    /**
     * Hapus session, lalu set notifikasi kemudian di alihkan
     * ke halaman login
     */
    public function logout()
    {
        $this->CI->session->unset_userdata('id');
        $this->CI->session->set_flashdata('alert', 'success|<b>Success</b> logout.');
        redirect(base_url('auth'));
    }
}