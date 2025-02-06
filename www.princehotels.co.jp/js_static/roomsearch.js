$(function(){var autoHeight=function(){$(".room-box").css("height","")
$(".cf").each(function(i){var s1=null
var s2=null
$(this).find(".room-box").each(function(j){if($(this).css('display')=="block"&&0<$(this).height()){if(s1==null){s1=$(this)}else{s2=$(this)
var h=Math.max(s1.height(),s2.height())
s1.css("height",h)
s2.css("height",h)
s1=s2=null}}})})}
$(".room-list-cont dt").off("click")
$(".accordion-block dt:not('.no-cont')").on("click",function(){$(this).next().slideToggle()
$(this).toggleClass('active')
if($(window).width()>=736){autoHeight();}})
var removeHeight=function(){$(this).css("height","")}
$("#select-floor").change(function(){$(".accordion-block dt").next().slideUp("",removeHeight)
$(".room-list-cont").find("dt").removeClass("active")
var floorId=$(this).val()
var floorCls=".floor-"+floorId
if(floorId==0){$(".room-list-floor").slideDown("",removeHeight)
$(".room-list-cont").slideDown("",removeHeight)}else{$(".room-list-floor").slideUp("",removeHeight)
$(".room-list-cont").slideUp("",removeHeight)
$(floorCls).stop()
$(floorCls).slideDown("",removeHeight)}
if($(window).width()>=736){autoHeight();}})
$("#select-room-type").change(function(){var roomType=$(this).val()
var roomTypeCls=".room-type-"+roomType
var floorId=$("#select-floor").val()
var floorCls=".floor-"+floorId
var showBox=function(elem){if(roomType==0){$(elem).find(".room-box").show(0,removeHeight)}else{$(elem).find(".room-box").hide(0,removeHeight)
$(elem).find(roomTypeCls).stop()
$(elem).find(roomTypeCls).show(0,removeHeight)}}
$(".room-list-cont").each(function(index,elem){if(floorId==0||$(elem).hasClass(floorCls.replace(".","")))
{if(roomType==0||0<$(elem).find(roomTypeCls).size())
{showBox(elem)
$(elem).find("dt").addClass("active")
$(elem).find(".accordion-block dt").next().slideDown("",removeHeight)
$(elem).find(".p-acc-slider").slick('setPosition')}
else if(roomType!=0)
{$(elem).find("dt").removeClass("active")
$(elem).find(".accordion-block dt").next().slideUp("",function(){removeHeight()
showBox(elem)})}}
else
{showBox(elem)
$(elem).find(".p-acc-slider").slick('setPosition')}})
if($(window).width()>=736){autoHeight();}})})