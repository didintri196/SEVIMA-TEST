<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_post extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_post_all($iduser)
    {
        $sql = "SELECT account.username, account.pict_profile, account.full_name,post.Id as PostID, post.ImageUrl, post.Caption, post.CreateAt,(SELECT COUNT(*) FROM like_post WHERE like_post.PostID=post.Id) as tot_like,(SELECT COUNT(*) FROM comment_post WHERE comment_post.PostID=post.Id) as tot_comment,IF(post.AccountID=$iduser, 'YES', 'NO') as mypost,IF((SELECT COUNT(*) FROM like_post WHERE like_post.AccountID=$iduser)=1, 'YES', 'NO') as is_liked FROM post,account where post.AccountID=account.Id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_post_id($idpost)
    {
        $sql = "SELECT account.username, account.pict_profile, account.full_name,post.Id as PostID, post.ImageUrl, post.Caption, post.CreateAt, post.UpdateAt,(SELECT COUNT(*) FROM like_post WHERE like_post.PostID=post.Id) as tot_like,(SELECT COUNT(*) FROM comment_post WHERE comment_post.PostID=post.Id) as tot_comment  FROM post,account where post.Id='$idpost' AND post.AccountID=account.Id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function Updated($PostID){
        $sql="UPDATE `post` SET `UpdateAt` = ".time()." WHERE `post`.`Id` = '$PostID'";
        $query = $this->db->query($sql);
        return $query;
    }
}
