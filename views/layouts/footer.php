<footer class="footer" id="footer" class="page-footer">
    <div class="footer-left">
    <ul id="part1">
        <a href="/additional"<li id='main-topic'><p>Дополнительные услуги</p></li></a>
        <a href="/lifting"<li><p>Подъем и монтаж</p></li></a>
       <a href="/trade" <li><p>Обмен и возврат</p></li></a>
   </ul>
   <ul id="part2">
        <a href="/deliveryandpayment"<li id='main-topic'>Доставка и оплата</li></a>
       <a href="/deliveryandpayment" <li><p>Доставка</p></li></a>
        <a href="/deliveryandpayment"<li><p>Оплата</p></li></a>
    </ul>
    <ul id="part3">
       <a href="/about"<li id='main-topic'>О компании</li></a>
        <a href="/news"<li><p>Новости</p></li></a>
    </ul>
    <div id='payment'>
        <p id="prin">Принимаем к оплате:</p>
		<div id="visa">
        <img src="/static/images/visa.png">
        <img src="/static/images/visa_electron.png">
		</div>
		<div id="mastercard">
        <img src="/static/images/mastercard.png">
        <img src="/static/images/maestro.png">
    </div>
	</div>
    </div>
    <hr>
    <div id='footer-text'>
        <font>
            © 2018 Интернет- магазин строительных товаров «НСТ». 
        </font>
        <font>
            405050 Челябинск ул. Курчатова 7.<br>
        </font>
            Все права защищены. Не является публичной офертой.
            
    </div>
    
</footer>
<script src="/static/js/jquery.js"></script>
<script src="/static/js/TextChange.js"></script>
<script src="/static/js/jquery-ui.min.js"></script>
<script src="/static/js/jquery.maskedinput.js"></script>
<?php foreach ($products as $product):
?>
    <script>
        var product =String(<?php echo $product['id'];?>); 
        $('a[class="add-to-cart"][data-id='+product+']').css({'display':'none'});
        $('a[class="added-to-cart"][data-id='+product+']').css({'display':'block'});
    </script>
<?php
endforeach;
?>
<script>

$('.showpass').click(function(){
    var type = $('#pass').attr('type') == "text" ? "password" : 'text';
    $('#pass').prop('type', type);
});
    $(document).ready(function(){
        $("#zakphone").mask("+7 ?(999) 999 99 99");
		var cartcheck = '<?php echo $totalPrice;?>';
		if (cartcheck<1){
			$("#cart-count").css({'display':'none'});
			$("#cart-price").css({'display':'none'});
			$("#carttxt").css({'display':'none'});
			$("#carttxt2").css({'display':'none'});
			$("#cartnull").css({'display':'inline'});
		}
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            var counter = $(".productscounter").val();
			$("#cart-count").css({'display':'inline'});
			$("#cart-price").css({'display':'inline'});
			$("#carttxt").css({'display':'inline'});
			$("#carttxt2").css({'display':'inline'});
			$("#cartnull").css({'display':'none'});
            $.post("/cart/addAjax/"+id+'/'+counter, {}, function (data) {
                $("#cart-count").html(data);
            });
            $.post("/cart/getPrice/"+id+'/'+counter, {}, function (price) {
                $("#cart-price").html(price);
            });
            $("#productimg"+id)
            .clone()
            .css({'position' : 'absolute', 'z-index' : '11100', top: $(this).offset().top-300, left:$(this).offset().left-100})
            .appendTo("body")
            .animate({opacity: 0.05,
                left: $("#cart").offset()['left'],
                top: $("#cart").offset()['top'],
                width: 20}, 1000, function() {
                $(this).remove();
            });
            $('a[class="add-to-cart"][data-id='+id+']').css({'display':'none'});
            $('a[class="added-to-cart"][data-id='+id+']').css({'display':'block'});
            return false;
        });
        $(".added-to-cart").click(function () {
            var id = $(this).attr("data-id");
            var counter = $(".productscounter").val();
            $.post("/cart/addAjax/"+id+'/'+counter, {}, function (data) {
                $("#cart-count").html(data);
            });
            $.post("/cart/getPrice/"+id+'/'+counter, {}, function (price) {
                $("#cart-price").html(price);
            });
            $("#productimg"+id)
            .clone()
            .css({'position' : 'absolute', 'z-index' : '11100', top: $(this).offset().top-300, left:$(this).offset().left-100})
            .appendTo("body")
            .animate({opacity: 0.05,
                left: $("#cart").offset()['left'],
                top: $("#cart").offset()['top'],
                width: 20}, 1000, function() {
                $(this).remove();
            });
            return false;
        });   
          $(".plus").click(function() { 
    $(".productscounter").val(parseInt($(".productscounter").val())+1);
});
$(".minus").click(function() {
    if($(".productscounter").val()>1){
    $(".productscounter").val($(".productscounter").val()-1);
    }
});
    });
 function changeText(theTag,textto) {
        theTag.innerHTML=textto;  
    }
    var slideNow = 1;
var slideCount = $('#slidewrapper').children().length;
var slideInterval = 3000;
var navBtnId = 0;
var translateWidth = 0;
$('li[class="slide-nav-btn"][data-id='+1+']').css({'background-color':'#16adad'});
$(document).ready(function() {
    var switchInterval = setInterval(nextSlide, slideInterval);

    $('#viewport').hover(function() {
        clearInterval(switchInterval);
    }, function() {
        switchInterval = setInterval(nextSlide, slideInterval);
    });

    $('#next-btn').click(function() {
        nextSlide();
    });

    $('#prev-btn').click(function() {
        prevSlide();
    });

    $('.slide-nav-btn').click(function() {
        navBtnId = $(this).index();
        if (navBtnId + 1 != slideNow) {
            translateWidth = -$('#viewport').width() * (navBtnId);
            $('#slidewrapper').css({
                'transform': 'translate(' + translateWidth + 'px, 0)',
                '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
                '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
            });
            slideNow = navBtnId + 1;
        }
        var id = slideNow;
          $('li[class="slide-nav-btn"]').css({'background-color':'#fff'});
    $('li[class="slide-nav-btn"][data-id='+id+']').css({'background-color':'#16adad'});
    });

});


function nextSlide() {
    if (slideNow == slideCount || slideNow <= 0 || slideNow > slideCount) {
        $('#slidewrapper').css('transform', 'translate(0, 0)');
        slideNow = 1;
    } else {
        translateWidth = -$('#viewport').width() * (slideNow);
        $('#slidewrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow++;
    }
    var id = slideNow;
    $('li[class="slide-nav-btn"]').css({'background-color':'#fff'});
    $('li[class="slide-nav-btn"][data-id='+id+']').css({'background-color':'#16adad'});
}

function prevSlide() {
    if (slideNow == 1 || slideNow <= 0 || slideNow > slideCount) {
        translateWidth = -$('#viewport').width() * (slideCount - 1);
        $('#slidewrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow = slideCount;
    } else {
        translateWidth = -$('#viewport').width() * (slideNow - 2);
        $('#slidewrapper').css({
            'transform': 'translate(' + translateWidth + 'px, 0)',
            '-webkit-transform': 'translate(' + translateWidth + 'px, 0)',
            '-ms-transform': 'translate(' + translateWidth + 'px, 0)',
        });
        slideNow--;
    }
    var id = slideNow;
    $('li[class="slide-nav-btn"]').css({'background-color':'#fff'});
    $('li[class="slide-nav-btn"][data-id='+id+']').css({'background-color':'#0ca3d2'});
}
$(window).on('load', function () {
    var $preloader = $('#p_prldr'),
        $svg_anm   = $preloader.find('.svg_anm');
    $svg_anm.fadeOut();
    $preloader.delay(500).fadeOut('slow');
});
$(document).ready(function(){ 
        var my_link = location.pathname;
        $('.navigation li a[href="'+my_link+'"]').parent().addClass('active');
    });

$(document).ready(function(){
 
$(window).scroll(function(){
if ($(this).scrollTop() > 400){
$('.scrollup').fadeIn();
} else {
$('.scrollup').fadeOut();
}
});
 
$('.scrollup').click(function(){
$("html, body").animate({ scrollTop: 0 }, 400);
return false;
});
 
});
var user='<? echo $check;?>';
if (user==1){  
    location.replace("/personalcabinet");
    user =0;
}
var txt = $('#comments'),
    hiddenDiv = $(document.createElement('div')),
    content = null;

txt.addClass('txtstuff');
hiddenDiv.addClass('hiddendiv common');

$('body').append(hiddenDiv);

txt.on('keyup', function () {

    content = $(this).val();

    content = content.replace(/\n/g, '<br>');
    hiddenDiv.html(content + '<br class="lbr">');

    $(this).css('height', hiddenDiv.height());

});



    $(document).ready(function() {
$('#sl').bind('textchange', function () {
                 
 var input_search = $("#sl").val();

if (input_search.length >= 3 && input_search.length < 150 )
{
 $.ajax({
  type: "POST",
  url: "/views/site/search.php",
  data: "q="+input_search,
  dataType: "html",
  cache: false,
  success: function(data) {

  $("#block-search-result").show();
  $("#list-search-result").html(data); 
   
}
}); 

}else
{
  $("#block-search-result").hide();    
}
});
  
     });
     function processAjaxData(response, urlPath){
     document.getElementById("content").innerHTML = response.html;
     document.title = response.pageTitle;
     window.history.pushState({"html":response.html,"pageTitle":response.pageTitle},"", urlPath);
 }
 $(".added-to-cart").mouseover(function(){
    changeText(this,'Добавить еще?');
});
  $(".added-to-cart").mouseout(function(){
    changeText(this,'В корзине');
});
 </script>
</body>
</html>