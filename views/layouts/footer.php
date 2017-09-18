<!-- start footer -->
<div class="footer_bg">
    <div class="wrap">	
        <div class="footer">
            <!-- start grids_of_4 -->	
            <div class="grids_of_4">
                <div class="grid1_of_4">
                    <h4>featured sale</h4>
                    <ul class="f_nav">
                        <li><a href="">alexis Hudson</a></li>
                        <li><a href="">american apparel</a></li>
                        <li><a href="">ben sherman</a></li>
                        <li><a href="">big buddha</a></li>
                        <li><a href="">channel</a></li>
                        <li><a href="">christian audigier</a></li>
                        <li><a href="">coach</a></li>
                        <li><a href="">cole haan</a></li>
                    </ul>
                </div>
                <div class="grid1_of_4">
                    <h4>mens store</h4>
                    <ul class="f_nav">
                        <li><a href="">alexis Hudson</a></li>
                        <li><a href="">american apparel</a></li>
                        <li><a href="">ben sherman</a></li>
                        <li><a href="">big buddha</a></li>
                        <li><a href="">channel</a></li>
                        <li><a href="">christian audigier</a></li>
                        <li><a href="">coach</a></li>
                        <li><a href="">cole haan</a></li>
                    </ul>
                </div>
                <div class="grid1_of_4">
                    <h4>women store</h4>
                    <ul class="f_nav">
                        <li><a href="">alexis Hudson</a></li>
                        <li><a href="">american apparel</a></li>
                        <li><a href="">ben sherman</a></li>
                        <li><a href="">big buddha</a></li>
                        <li><a href="">channel</a></li>
                        <li><a href="">christian audigier</a></li>
                        <li><a href="">coach</a></li>
                        <li><a href="">cole haan</a></li>
                    </ul>
                </div>
                <div class="grid1_of_4">
                    <h4>quick links</h4>
                    <ul class="f_nav">
                        <li><a href="">alexis Hudson</a></li>
                        <li><a href="">american apparel</a></li>
                        <li><a href="">ben sherman</a></li>
                        <li><a href="">big buddha</a></li>
                        <li><a href="">channel</a></li>
                        <li><a href="">christian audigier</a></li>
                        <li><a href="">coach</a></li>
                        <li><a href="">cole haan</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>	
<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () { 
            // Если нажали "В корзину":
            var id = $(this).attr("data-id");
            $('#basket-add').css({"visibility": "visible", "opacity": "1"});
            $("input[type='radio']").prop('checked', false); // Очистить radioButton
            $(".buy").click(function () { 
                // Если нажали "Добавить в корзину":
                $.post("/cart/addAjax/" + id, {}, function (data) {
                    $(".c1").html(data);
                });
                $('#basket-add').css({"visibility": "hidden", "opacity": "0"}); // Скрыть форму с выбором срока аренды
                return false;
            })
            $(".b-popup__close").click(function () { // Кнопка "Закрыть"
                $('#basket-add').css({"visibility": "hidden", "opacity": "0"}); // Скрыть форму с выбором срока аренды
                return false;
            });
            return false;
        });
    });
</script>
<!-- start footer -->
<div class="footer_bg1">
    <div class="wrap">
        <div class="footer">

            <!-- scroll_top_btn -->
            <script type="text/javascript">
                $(document).ready(function () {

                    var defaults = {
                        containerID: 'toTop', // fading element id
                        containerHoverID: 'toTopHover', // fading element hover id
                        scrollSpeed: 1200,
                        easingType: 'linear'
                    };


                    $().UItoTop({easingType: 'easeOutQuart'});

                });
            </script>


            <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
            <!--end scroll_top_btn -->
            <div class="copy">
                <p class="link">&copy;  All rights reserved | Template by&nbsp;&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>
