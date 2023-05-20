 <footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © <span style="color: #000000;font-weight: bold;"><?php echo TITLE ?></span>.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    <div id='toTop'>Aller vers haut <i class="fa fa-arrow-up"></i></div>
                    Created by <a style="color:<?php echo COLOR_N ?>;font-weight: bold;" href="">Donesia technology</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="assets/libs/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(window).scroll(function() {
            if ($(this).scrollTop()) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });

        $("#toTop").click(function () {
           //1 second of animation time
           //html works for FFX but not Chrome
           //body works for Chrome but not FFX
           //This strange selector seems to work universally
           $("html, body").animate({scrollTop: 0}, 1000);
        });
    });
</script>
<style type="text/css">
    #toTop {
    border-radius: 10px;
    padding: 8px 3px;
    background: #000;
    color: #fff;
    position: fixed;
    bottom: 0;
    right: 5px;
    display: none;
    cursor: pointer;
}
</style>