<!-- start footer -->

<script>
    $(document).ready(function () {
        $(".add-to-cart").click(function () { 
            // Если нажали "В корзину":
            var text = $(this).text();
            if (text === "Перейти в корзину")
                location.href = "/cart";
            $(this).html("Перейти в корзину");   
            $(this).attr("href", "/cart");
            $(this).css("color", "#204986");
            var id = $(this).attr("data-id");
                $.post("/cart/addAjax/" + id, {}, function (data) {
                    $(".c1 i").html(data);
                }); 
                return false;
        });
    });
</script>
<script>
    var columns = 3;

var $ul = $('ul.submenu'),
    $elements = $ul.children('li'),
    breakPoint = Math.round($elements.length/columns);
    $ordered = $('<div></div>');

function appendToUL(i) {
    if ($ul.children().eq(i).length > 0) {
        $ordered.append($ul.children().eq(i).clone());
    } 
    else $ordered.append($('<li></li>'));
}

function reorder($el) {
    $el.each(function(){
        $item = $(this);
        
        if ($item.index() >= breakPoint) return false;

        appendToUL($item.index());
        for (var i = 1; i < columns; i++) {
            appendToUL(breakPoint*i+$item.index());
        }
    });

    $ul.html($ordered.children().css('width',100/columns+'%'));
}

reorder($elements);
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
                <p class="link">&copy;  All rights reserved | Template by&nbsp;&nbsp;<a href="http://w3layouts.com/" target="_blank"> W3Layouts</a></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
</body>
</html>
