<?php $session = $this->sessionlogin->get_session();?>
<section>
    <div class="gray-bg" style="padding-top: 5px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row" id="page-contents">
                        <div class="col-lg-3"></div>
                        <!-- sidebar -->
                        <div class="col-lg-6">
                            <div class="central-meta">
                                <div class="new-postbox">
                                    <button data-toggle="modal" data-target="#postModal" class="btn btn-inline btn-block" style="height: 80px;background-color: #fdfdfd;border: 1px solid #f4f2f2;color: #cacaca;font-weight: 100;">＋
                                        Post New Moment </button>
                                </div>
                            </div>
                            <!-- add post new box -->
                            <div class="loadMore">
                                <?php foreach ($feed->result() as $row_feed) { ?>
                                    <div class="central-meta item">
                                        <div class="user-post">
                                            <div class="friend-info">
                                                <figure>
                                                    <img src="<?php echo base_url(); ?>assets/uploads/profile/<?php echo $row_feed->pict_profile; ?>" alt="">
                                                </figure>
                                                <div class="friend-name">
                                                    <ins><a href="time-line.html" title=""><?php echo $row_feed->full_name; ?></a></ins>
                                                    <span>published: <?php echo date("h:i d-m-Y", $row_feed->CreateAt); ?></span>
                                                </div>
                                                <div class="post-meta">
                                                    <img src="<?php echo base_url(); ?>assets/uploads/post/<?php echo $row_feed->ImageUrl; ?>" alt="<?php echo $row_feed->Caption; ?>">
                                                    <div class="we-video-info">
                                                        <ul>
                                                            <li>
                                                                <span class="comment" data-toggle="tooltip" title="Comments">
                                                                    <i class="fa fa-comments-o"></i>
                                                                    <ins id="comment_<?php echo $row_feed->PostID; ?>"><?php echo $row_feed->tot_comment; ?></ins>
                                                                </span>
                                                            </li>
                                                            <?php if ($row_feed->is_liked == "YES") { ?>
                                                                <li>
                                                                    <span class="like" data-toggle="tooltip" title="Liked">
                                                                        <i class="ti-heart" style="color: red;font-weight: 1000;"></i>
                                                                        <ins id="like_<?php echo $row_feed->PostID; ?>"><?php echo $row_feed->tot_like; ?></ins>
                                                                    </span>
                                                                </li>
                                                            <?php } else { ?>
                                                                <li>
                                                                    <span class="like" data-toggle="tooltip" title="Like">
                                                                        <i class="ti-heart"></i>
                                                                        <ins id="like_<?php echo $row_feed->PostID; ?>"><?php echo $row_feed->tot_like; ?></ins>
                                                                    </span>
                                                                </li>
                                                            <?php } ?>

                                                        </ul>
                                                    </div>
                                                    <div class="description">
                                                        <p>
                                                            <?php echo $row_feed->Caption; ?>
                                                            <hr>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="coment-area">
                                                <ul class="we-comet">
                                                    <li id="load_<?php echo $row_feed->PostID; ?>">
                                                        <a title="" id="showmore_<?php echo $row_feed->PostID; ?>" class="showmore underline" style="cursor: pointer;" onclick="load_comment('<?php echo $row_feed->PostID; ?>')">load comments</a>
                                                    </li>
                                                    <li class="post-comment">
                                                        <div class="comet-avatar">
                                                        <img src="<?php echo base_url();?>assets/uploads/profile/<?php echo $session['pict'];?>" alt="">
                                                        </div>
                                                        <div class="post-comt-box">
                                                            <form method="post">
                                                                <textarea placeholder="Post your comment" data-postid="<?php echo $row_feed->PostID; ?>" data-base="<?php echo base_url(); ?>"></textarea>
                                                                <button type="submit"></button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div><!-- centerl meta -->
                        <div class="col-lg-3"></div><!-- sidebar -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="postModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 20px;">
            <form action="account/post" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel"><i class="fa fa-bullhorn"></i> Share your Moment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="file" name="files">
                    <textarea class="form-control text-post" name="caption" id="" placeholder="Caption for moment.."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Post Now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var data = [];
    var data_t = [];
    var data_lc = []; //time last comment

    function load_comment(id) {
        $("#load_" + id).hide();
        data.push(id);
        data_t[id] = 0;
        data_lc[id] = 0;
        console.log(data);
    }

    function get_comment(t, PostID) {
        $.getJSON("<?php echo base_url(); ?>api/post/" + PostID + "/comment?t=" + t + "&lc=" + data_t[PostID], function(datapost) {
            console.log(datapost);
            if (datapost.status == "update") {
                $("#comment_" + PostID).html(datapost.comment_count);
                $("#like_" + PostID).html(datapost.like_count);
                var items = [];
                data_t[PostID] = datapost.time;
                var last_comment = 0;
                $.each(datapost.comment_list, function(key, val) {
                    var parent = jQuery("#showmore_" + PostID).parent("li");
                    var comment_HTML = '	<li><div class="comet-avatar"><img src="<?php echo base_url(); ?>assets/uploads/profile/' + val.pict_profile + '" alt=""></div><div class="we-comment"><div class="coment-head"><h5><a href="time-line.html" title="">' + val.full_name + '</a></h5><span>1 year ago</span><a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a></div><p>' + val.Comment + '</p></div></li>';
                    $(comment_HTML).insertBefore(parent);
                });
                data_lc[PostID] = last_comment;
            }
        });
    }

    function realtime_comment() {
        console.log("run realtime");
        console.log(data);
        $.each(data, function(key, val) {
            var t = data_t[val]
            console.log(val, "->", t);
            get_comment(t, val);
        });
    }

    setInterval(function() {
        realtime_comment();
    }, 1000);
</script>