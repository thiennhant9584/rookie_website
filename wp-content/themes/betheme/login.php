<?php
/**
 * Template Name: Login
 **/
get_header();
?>
<style>
    .mycolor{
        color : #20bcf6;
    }
    .myborder{
        padding: 20px;;
        border: 1px solid #ccc;
        border-radius: 4px;
        -webkit-box-shadow: 0px 0px 3px 0px #20bcf6;
        -moz-box-shadow:    0px 0px 3px 0px #20bcf6;
        box-shadow:         0px 0px 3px 0px #20bcf6;
    }
    .mybutton{
        position: relative;
        left: 50%;
        top: 193px;

    }
    .margin-bottom-20 {
        margin-bottom: 20px;

    }
    input, select, textarea{
        color: #252525!important;
        font-size: 14px!important;
        font-family:inherit!important;
    }
    .btn-u:hover {
        background: #20bcf6;
    }
    .btn-u:hover, .btn-u:focus, .btn-u:active, .btn-u.active, .open .dropdown-toggle.btn-u {
        background: #20bcf6;
    }
    .btn-u:hover {
        color: #fff;
        text-decoration: none;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
    }
    .btn-u {
        background: #0b97c4;
    }
    .btn-u {
        white-space: nowrap;
        border: 0;
        color: #fff;
        font-size: 17px;
        cursor: pointer;
        font-weight: 400;
        padding: 9px 13px;
        position: relative;
        background: #0b97c4;
        display: inline-block;
        text-decoration: none;
    }
    .input-group-addon {
        border-right: 0;
        /*color: #b3b3b3;*/
        font-size: 14px;
        background: #fff;
        padding: 6px 12px;
        font-size: 14px;
        font-weight: 400;
        line-height: 1;
        color: #555;
        text-align: center;
        background-color: #eee;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .input-group .form-control {
        float: left;
        width: 100%;
        margin-bottom: 0;
    }
    .form-control {
        box-shadow: none;
    }
    .form-control {
        display: block;
        width: 100%;
        height: 34px !important;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.428571429;
        color: #555;
        background-color: #fff;
        background-image: none;
        border: 1px solid  #1e83c9 !important;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
        -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    }
    .submit:hover{
        background-color: #1e83c9;
    }
    #imageUpload-label:hover{
        background-position: 0;
    }
    .error{
        color: #d53239!important;
    }
    .forgot{
        padding-top: 2%!important;
    }
</style>
<div id="Content">
    <div class="content_wrapper clearfix">
        <div class="container">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="row myborder">
                    <?php
                    if (isset($_SESSION['login']) && $_SESSION['login']=='thatbai'):
                        ?>
                        <div class="alert alert-danger alert-autocloseable-danger">
                            Bạn nhập sai Tài Khoản hoặc Mật khẩu. Vui lòng thử lại.
                        </div>
                    <?php
                        $_SESSION['login']='thatbai2';
                    endif;
                    ?>
                    <?php
                    if (isset($_SESSION['login']) && $_SESSION['login']=='thatbai_1'):
                        ?>
                        <div class="alert alert-danger alert-autocloseable-danger">
                            Tài khoản của bạn đang bị khóa hoặc chưa được xác nhận. Vui lòng liên hệ quản trị viên.
                        </div>
                        <?php
                        $_SESSION['login']='thatbai2';
                    endif;
                    ?>
                    <form method="post" id="login-form" action="<?php echo home_url('xu-ly-dang-nhap')?>">
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                            <input required size="60" maxlength="255"  class="form-control" placeholder="Email" name="email" id="email_login" type="email">
                        </div>
                        <div class="input-group margin-bottom-20">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user mycolor"></i></span>
                            <input required size="60" maxlength="32" minlength="6" class="form-control" placeholder="Mật khẩu" name="password" id="password_login" type="password">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn-u btn-block pull-left submit" type="submit">Đăng Nhập</button>
                            </div>
                        </div>
                    </form>
                        <div class="row forgot">
                            <div class="col-md-12">
                                <div class="container">
                                    <a href="#" data-toggle="modal" data-target="#myModal">Quên mật khẩu?</a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Quên mật khẩu</h4>
                                                </div>
                                                <form class="form-group" method="post" id="forgot-form">
                                                    <div class="modal-body">
                                                        <input class="form-control" id="email-forgot" required style="width: 100%!important" type="email" value="" placeholder="Địa chỉ Email của bạn">
                                                    </div>
                                                    <div id="alert" class="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button href="<?php echo home_url('forgot-password')?>" type="submit" class="btn btn-primary submit-forgot" id="submit-forgot"><i id="icon-fesh" class=""></i>Gửi</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php
get_footer();
?>
<script>
    jQuery(document).ready(function($) {
        $("#forgot-form").on("click", ".submit-forgot", function(event){
            event.preventDefault();
            $("#icon-fesh").addClass('fa fa-refresh fa-spin');
            var href = $(this).attr("href");
            var email =$('#email-forgot').val();
            $.ajax({
                type: "POST",
                data:{email:email},
                url: href,
                dataType : "json"
            })
                .done(function(data){
                    $("#icon-fesh").removeClass('fa fa-refresh fa-spin');
                    if(data.status ==1)
                    {
                        $('#alert').addClass('alert alert-success').html('Đã gửi mật khẩu mới vào email của bạn. Vui lòng kiểm tra email.');
                    }
                    else if(data.status ==0)
                    {
                        $('#alert').addClass('alert alert-danger').html('Tài khoản email không tồn tại.');
                    }
                })
        });
    });
    jQuery.extend(jQuery.validator.messages, {
        required: "Đây là trường bắt buộc nhập.",
        minlength: jQuery.validator.format("Vui lòng nhập từ {0} kí tự trở lên."),
        email: "Vui lòng nhập đúng định dạng email.",
        number: "Vui lòng nhập đúng định dạng số.",
        date:" Vui lòng chọn đúng định dạng ngày."
    });
    jQuery(document).ready(function($) {

        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#login-form").validate({
            rules: {
                email:
                    {  required: true,
                        email: true
                    },
                password: {
                    required: true,
                    minlength: 6
                }
            }
        });
    });
</script>
