<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_comment extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function GetComment($PostID,$lc){
        $sql="SELECT comment_post.Id as CommentID, comment_post.CreateAt, comment_post.Comment,account.pict_profile,account.full_name FROM comment_post,account WHERE comment_post.AccountID=account.Id AND comment_post.PostID='$PostID' AND comment_post.CreateAt > $lc";
        $query = $this->db->query($sql);
        return $query;
    }
}
