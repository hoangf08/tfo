function getScrollLeft() {
if ((navigator.appName.indexOf("Microsoft Internet Explorer",0) != -1)) {
return document.documentElement.scrollLeft;
} else if (window.pageXOffset) {
return window.pageXOffset;
} else {
return 0;
}
}

function getScrollTop() {
if ((navigator.appName.indexOf("Microsoft Internet Explorer",0) != -1)) {
return document.documentElement.scrollTop;
} else if (window.pageYOffset) {
return window.pageYOffset;
} else {
return 0;
}
}

var pageScrollTimer;
function pageScroll(toX,toY,frms,cuX,cuY) {
if (pageScrollTimer) clearTimeout(pageScrollTimer);
if (!toX || toX < 0) toX = 0;
if (!toY || toY < 0) toY = 0;
if (!cuX) cuX = 0 + getScrollLeft();
if (!cuY) cuY = 0 + getScrollTop();
if (!frms) frms = 6;

if (toY > cuY && toY > (getAnchorPosObj('end','enddiv').y) - getInnerSize().height) toY = (getAnchorPosObj('end','enddiv').y - getInnerSize().height) + 1;
cuX += (toX - getScrollLeft()) / frms; if (cuX < 0) cuX = 0;
cuY += (toY - getScrollTop()) / frms;  if (cuY < 0) cuY = 0;
var posX = Math.floor(cuX);
var posY = Math.floor(cuY);
window.scrollTo(posX, posY);

if (posX != toX || posY != toY) {
pageScrollTimer = setTimeout("pageScroll("+toX+","+toY+","+frms+","+cuX+","+cuY+")",16);
}
}

function jumpToPageTop() {
pageScroll(0,0,5);
}