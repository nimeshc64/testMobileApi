function addDeleteForms(){$("[data-method]").append(function(){return!$(this).find("form").length>0?"\n<form action='"+$(this).attr("href")+"' method='POST' name='delete_item' style='display:none'>\n   <input type='hidden' name='_method' value='"+$(this).attr("data-method")+"'>\n   <input type='hidden' name='_token' value='"+$('meta[name="_token"]').attr("content")+"'>\n</form>\n":""}).removeAttr("href").attr("style","cursor:pointer;").attr("onclick",'$(this).find("form").submit();')}function _init(){$.AdminLTE.layout={activate:function(){var e=this;e.fix(),e.fixSidebar(),$(window,".wrapper").resize(function(){e.fix(),e.fixSidebar()})},fix:function(){var e=$(".main-header").outerHeight()+$(".main-footer").outerHeight(),t=$(window).height(),n=$(".sidebar").height();if($("body").hasClass("fixed"))$(".content-wrapper, .right-side").css("min-height",t-$(".main-footer").outerHeight());else{var o;t>=n?($(".content-wrapper, .right-side").css("min-height",t-e),o=t-e):($(".content-wrapper, .right-side").css("min-height",n),o=n);var i=$($.AdminLTE.options.controlSidebarOptions.selector);"undefined"!=typeof i&&i.height()>o&&$(".content-wrapper, .right-side").css("min-height",i.height())}},fixSidebar:function(){return $("body").hasClass("fixed")?("undefined"==typeof $.fn.slimScroll&&console,void($.AdminLTE.options.sidebarSlimScroll&&"undefined"!=typeof $.fn.slimScroll&&($(".sidebar").slimScroll({destroy:!0}).height("auto"),$(".sidebar").slimscroll({height:$(window).height()-$(".main-header").height()+"px",color:"rgba(0,0,0,0.2)",size:"3px"})))):void("undefined"!=typeof $.fn.slimScroll&&$(".sidebar").slimScroll({destroy:!0}).height("auto"))}},$.AdminLTE.pushMenu={activate:function(e){var t=$.AdminLTE.options.screenSizes;$(e).on("click",function(e){e.preventDefault(),$(window).width()>t.sm-1?$("body").toggleClass("sidebar-collapse"):$("body").hasClass("sidebar-open")?($("body").removeClass("sidebar-open"),$("body").removeClass("sidebar-collapse")):$("body").addClass("sidebar-open")}),$(".content-wrapper").click(function(){$(window).width()<=t.sm-1&&$("body").hasClass("sidebar-open")&&$("body").removeClass("sidebar-open")}),($.AdminLTE.options.sidebarExpandOnHover||$("body").hasClass("fixed")&&$("body").hasClass("sidebar-mini"))&&this.expandOnHover()},expandOnHover:function(){var e=this,t=$.AdminLTE.options.screenSizes.sm-1;$(".main-sidebar").hover(function(){$("body").hasClass("sidebar-mini")&&$("body").hasClass("sidebar-collapse")&&$(window).width()>t&&e.expand()},function(){$("body").hasClass("sidebar-mini")&&$("body").hasClass("sidebar-expanded-on-hover")&&$(window).width()>t&&e.collapse()})},expand:function(){$("body").removeClass("sidebar-collapse").addClass("sidebar-expanded-on-hover")},collapse:function(){$("body").hasClass("sidebar-expanded-on-hover")&&$("body").removeClass("sidebar-expanded-on-hover").addClass("sidebar-collapse")}},$.AdminLTE.tree=function(e){var t=this,n=$.AdminLTE.options.animationSpeed;$("li a",$(e)).on("click",function(e){var o=$(this),i=o.next();if(i.is(".treeview-menu")&&i.is(":visible"))i.slideUp(n,function(){i.removeClass("menu-open")}),i.parent("li").removeClass("active");else if(i.is(".treeview-menu")&&!i.is(":visible")){var a=o.parents("ul").first(),s=a.find("ul:visible").slideUp(n);s.removeClass("menu-open");var r=o.parent("li");i.slideDown(n,function(){i.addClass("menu-open"),a.find("li.active").removeClass("active"),r.addClass("active"),t.layout.fix()})}i.is(".treeview-menu")&&e.preventDefault()})},$.AdminLTE.controlSidebar={activate:function(){var e=this,t=$.AdminLTE.options.controlSidebarOptions,n=$(t.selector),o=$(t.toggleBtnSelector);o.on("click",function(o){o.preventDefault(),n.hasClass("control-sidebar-open")||$("body").hasClass("control-sidebar-open")?e.close(n,t.slide):e.open(n,t.slide)});var i=$(".control-sidebar-bg");e._fix(i),$("body").hasClass("fixed")?e._fixForFixed(n):$(".content-wrapper, .right-side").height()<n.height()&&e._fixForContent(n)},open:function(e,t){t?e.addClass("control-sidebar-open"):$("body").addClass("control-sidebar-open")},close:function(e,t){t?e.removeClass("control-sidebar-open"):$("body").removeClass("control-sidebar-open")},_fix:function(e){var t=this;$("body").hasClass("layout-boxed")?(e.css("position","absolute"),e.height($(".wrapper").height()),$(window).resize(function(){t._fix(e)})):e.css({position:"fixed",height:"auto"})},_fixForFixed:function(e){e.css({position:"fixed","max-height":"100%",overflow:"auto","padding-bottom":"50px"})},_fixForContent:function(e){$(".content-wrapper, .right-side").css("min-height",e.height())}},$.AdminLTE.boxWidget={selectors:$.AdminLTE.options.boxWidgetOptions.boxWidgetSelectors,icons:$.AdminLTE.options.boxWidgetOptions.boxWidgetIcons,animationSpeed:$.AdminLTE.options.animationSpeed,activate:function(e){var t=this;e||(e=document),$(e).find(t.selectors.collapse).on("click",function(e){e.preventDefault(),t.collapse($(this))}),$(e).find(t.selectors.remove).on("click",function(e){e.preventDefault(),t.remove($(this))})},collapse:function(e){var t=this,n=e.parents(".box").first(),o=n.find("> .box-body, > .box-footer");n.hasClass("collapsed-box")?(e.children(":first").removeClass(t.icons.open).addClass(t.icons.collapse),o.slideDown(t.animationSpeed,function(){n.removeClass("collapsed-box")})):(e.children(":first").removeClass(t.icons.collapse).addClass(t.icons.open),o.slideUp(t.animationSpeed,function(){n.addClass("collapsed-box")}))},remove:function(e){var t=e.parents(".box").first();t.slideUp(this.animationSpeed)}}}if(!function(e,t,n){"use strict";!function o(e,t,n){function i(s,r){if(!t[s]){if(!e[s]){var l="function"==typeof require&&require;if(!r&&l)return l(s,!0);if(a)return a(s,!0);var c=new Error("Cannot find module '"+s+"'");throw c.code="MODULE_NOT_FOUND",c}var d=t[s]={exports:{}};e[s][0].call(d.exports,function(t){var n=e[s][1][t];return i(n?n:t)},d,d.exports,o,e,t,n)}return t[s].exports}for(var a="function"==typeof require&&require,s=0;s<n.length;s++)i(n[s]);return i}({1:[function(o,i,a){var s=function(e){return e&&e.__esModule?e:{"default":e}};Object.defineProperty(a,"__esModule",{value:!0});var r,l,c,d,u=o("./modules/handle-dom"),f=o("./modules/utils"),p=o("./modules/handle-swal-dom"),m=o("./modules/handle-click"),h=o("./modules/handle-key"),v=s(h),b=o("./modules/default-params"),g=s(b),y=o("./modules/set-params"),C=s(y);a["default"]=c=d=function(){function o(e){var t=i;return t[e]===n?g["default"][e]:t[e]}var i=arguments[0];if(u.addClass(t.body,"stop-scrolling"),p.resetInput(),i===n)return f.logStr("SweetAlert expects at least 1 attribute!"),!1;var a=f.extend({},g["default"]);switch(typeof i){case"string":a.title=i,a.text=arguments[1]||"",a.type=arguments[2]||"";break;case"object":if(i.title===n)return f.logStr('Missing "title" argument!'),!1;a.title=i.title;for(var s in g["default"])a[s]=o(s);a.confirmButtonText=a.showCancelButton?"Confirm":g["default"].confirmButtonText,a.confirmButtonText=o("confirmButtonText"),a.doneFunction=arguments[1]||null;break;default:return f.logStr('Unexpected type of argument! Expected "string" or "object", got '+typeof i),!1}C["default"](a),p.fixVerticalPosition(),p.openModal(arguments[1]);for(var c=p.getModal(),h=c.querySelectorAll("button"),b=["onclick","onmouseover","onmouseout","onmousedown","onmouseup","onfocus"],y=function(e){return m.handleButton(e,a,c)},w=0;w<h.length;w++)for(var x=0;x<b.length;x++){var S=b[x];h[w][S]=y}p.getOverlay().onclick=y,r=e.onkeydown;var $=function(e){return v["default"](e,a,c)};e.onkeydown=$,e.onfocus=function(){setTimeout(function(){l!==n&&(l.focus(),l=n)},0)},d.enableButtons()},c.setDefaults=d.setDefaults=function(e){if(!e)throw new Error("userParams is required");if("object"!=typeof e)throw new Error("userParams has to be a object");f.extend(g["default"],e)},c.close=d.close=function(){var o=p.getModal();u.fadeOut(p.getOverlay(),5),u.fadeOut(o,5),u.removeClass(o,"showSweetAlert"),u.addClass(o,"hideSweetAlert"),u.removeClass(o,"visible");var i=o.querySelector(".sa-icon.sa-success");u.removeClass(i,"animate"),u.removeClass(i.querySelector(".sa-tip"),"animateSuccessTip"),u.removeClass(i.querySelector(".sa-long"),"animateSuccessLong");var a=o.querySelector(".sa-icon.sa-error");u.removeClass(a,"animateErrorIcon"),u.removeClass(a.querySelector(".sa-x-mark"),"animateXMark");var s=o.querySelector(".sa-icon.sa-warning");return u.removeClass(s,"pulseWarning"),u.removeClass(s.querySelector(".sa-body"),"pulseWarningIns"),u.removeClass(s.querySelector(".sa-dot"),"pulseWarningIns"),setTimeout(function(){var e=o.getAttribute("data-custom-class");u.removeClass(o,e)},300),u.removeClass(t.body,"stop-scrolling"),e.onkeydown=r,e.previousActiveElement&&e.previousActiveElement.focus(),l=n,clearTimeout(o.timeout),!0},c.showInputError=d.showInputError=function(e){var t=p.getModal(),n=t.querySelector(".sa-input-error");u.addClass(n,"show");var o=t.querySelector(".sa-error-container");u.addClass(o,"show"),o.querySelector("p").innerHTML=e,setTimeout(function(){c.enableButtons()},1),t.querySelector("input").focus()},c.resetInputError=d.resetInputError=function(e){if(e&&13===e.keyCode)return!1;var t=p.getModal(),n=t.querySelector(".sa-input-error");u.removeClass(n,"show");var o=t.querySelector(".sa-error-container");u.removeClass(o,"show")},c.disableButtons=d.disableButtons=function(){var e=p.getModal(),t=e.querySelector("button.confirm"),n=e.querySelector("button.cancel");t.disabled=!0,n.disabled=!0},c.enableButtons=d.enableButtons=function(){var e=p.getModal(),t=e.querySelector("button.confirm"),n=e.querySelector("button.cancel");t.disabled=!1,n.disabled=!1},"undefined"!=typeof e?e.sweetAlert=e.swal=c:f.logStr("SweetAlert is a frontend module!"),i.exports=a["default"]},{"./modules/default-params":2,"./modules/handle-click":3,"./modules/handle-dom":4,"./modules/handle-key":5,"./modules/handle-swal-dom":6,"./modules/set-params":8,"./modules/utils":9}],2:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});var o={title:"",text:"",type:null,allowOutsideClick:!1,showConfirmButton:!0,showCancelButton:!1,closeOnConfirm:!0,closeOnCancel:!0,confirmButtonText:"OK",confirmButtonColor:"#8CD4F5",cancelButtonText:"Cancel",imageUrl:null,imageSize:null,timer:null,customClass:"",html:!1,animation:!0,allowEscapeKey:!0,inputType:"text",inputPlaceholder:"",inputValue:"",showLoaderOnConfirm:!1};n["default"]=o,t.exports=n["default"]},{}],3:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var i=t("./utils"),a=(t("./handle-swal-dom"),t("./handle-dom")),s=function(t,n,o){function s(e){m&&n.confirmButtonColor&&(p.style.backgroundColor=e)}var c,d,u,f=t||e.event,p=f.target||f.srcElement,m=-1!==p.className.indexOf("confirm"),h=-1!==p.className.indexOf("sweet-overlay"),v=a.hasClass(o,"visible"),b=n.doneFunction&&"true"===o.getAttribute("data-has-done-function");switch(m&&n.confirmButtonColor&&(c=n.confirmButtonColor,d=i.colorLuminance(c,-.04),u=i.colorLuminance(c,-.14)),f.type){case"mouseover":s(d);break;case"mouseout":s(c);break;case"mousedown":s(u);break;case"mouseup":s(d);break;case"focus":var g=o.querySelector("button.confirm"),y=o.querySelector("button.cancel");m?y.style.boxShadow="none":g.style.boxShadow="none";break;case"click":var C=o===p,w=a.isDescendant(o,p);if(!C&&!w&&v&&!n.allowOutsideClick)break;m&&b&&v?r(o,n):b&&v||h?l(o,n):a.isDescendant(o,p)&&"BUTTON"===p.tagName&&sweetAlert.close()}},r=function(e,t){var n=!0;a.hasClass(e,"show-input")&&(n=e.querySelector("input").value,n||(n="")),t.doneFunction(n),t.closeOnConfirm&&sweetAlert.close(),t.showLoaderOnConfirm&&sweetAlert.disableButtons()},l=function(e,t){var n=String(t.doneFunction).replace(/\s/g,""),o="function("===n.substring(0,9)&&")"!==n.substring(9,10);o&&t.doneFunction(!1),t.closeOnCancel&&sweetAlert.close()};o["default"]={handleButton:s,handleConfirm:r,handleCancel:l},n.exports=o["default"]},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],4:[function(n,o,i){Object.defineProperty(i,"__esModule",{value:!0});var a=function(e,t){return new RegExp(" "+t+" ").test(" "+e.className+" ")},s=function(e,t){a(e,t)||(e.className+=" "+t)},r=function(e,t){var n=" "+e.className.replace(/[\t\r\n]/g," ")+" ";if(a(e,t)){for(;n.indexOf(" "+t+" ")>=0;)n=n.replace(" "+t+" "," ");e.className=n.replace(/^\s+|\s+$/g,"")}},l=function(e){var n=t.createElement("div");return n.appendChild(t.createTextNode(e)),n.innerHTML},c=function(e){e.style.opacity="",e.style.display="block"},d=function(e){if(e&&!e.length)return c(e);for(var t=0;t<e.length;++t)c(e[t])},u=function(e){e.style.opacity="",e.style.display="none"},f=function(e){if(e&&!e.length)return u(e);for(var t=0;t<e.length;++t)u(e[t])},p=function(e,t){for(var n=t.parentNode;null!==n;){if(n===e)return!0;n=n.parentNode}return!1},m=function(e){e.style.left="-9999px",e.style.display="block";var t,n=e.clientHeight;return t="undefined"!=typeof getComputedStyle?parseInt(getComputedStyle(e).getPropertyValue("padding-top"),10):parseInt(e.currentStyle.padding),e.style.left="",e.style.display="none","-"+parseInt((n+t)/2)+"px"},h=function(e,t){if(+e.style.opacity<1){t=t||16,e.style.opacity=0,e.style.display="block";var n=+new Date,o=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){e.style.opacity=+e.style.opacity+(new Date-n)/100,n=+new Date,+e.style.opacity<1&&setTimeout(o,t)});o()}e.style.display="block"},v=function(e,t){t=t||16,e.style.opacity=1;var n=+new Date,o=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){e.style.opacity=+e.style.opacity-(new Date-n)/100,n=+new Date,+e.style.opacity>0?setTimeout(o,t):e.style.display="none"});o()},b=function(n){if("function"==typeof MouseEvent){var o=new MouseEvent("click",{view:e,bubbles:!1,cancelable:!0});n.dispatchEvent(o)}else if(t.createEvent){var i=t.createEvent("MouseEvents");i.initEvent("click",!1,!1),n.dispatchEvent(i)}else t.createEventObject?n.fireEvent("onclick"):"function"==typeof n.onclick&&n.onclick()},g=function(t){"function"==typeof t.stopPropagation?(t.stopPropagation(),t.preventDefault()):e.event&&e.event.hasOwnProperty("cancelBubble")&&(e.event.cancelBubble=!0)};i.hasClass=a,i.addClass=s,i.removeClass=r,i.escapeHtml=l,i._show=c,i.show=d,i._hide=u,i.hide=f,i.isDescendant=p,i.getTopMargin=m,i.fadeIn=h,i.fadeOut=v,i.fireClick=b,i.stopEventPropagation=g},{}],5:[function(t,o,i){Object.defineProperty(i,"__esModule",{value:!0});var a=t("./handle-dom"),s=t("./handle-swal-dom"),r=function(t,o,i){var r=t||e.event,l=r.keyCode||r.which,c=i.querySelector("button.confirm"),d=i.querySelector("button.cancel"),u=i.querySelectorAll("button[tabindex]");if(-1!==[9,13,32,27].indexOf(l)){for(var f=r.target||r.srcElement,p=-1,m=0;m<u.length;m++)if(f===u[m]){p=m;break}9===l?(f=-1===p?c:p===u.length-1?u[0]:u[p+1],a.stopEventPropagation(r),f.focus(),o.confirmButtonColor&&s.setFocusStyle(f,o.confirmButtonColor)):13===l?("INPUT"===f.tagName&&(f=c,c.focus()),f=-1===p?c:n):27===l&&o.allowEscapeKey===!0?(f=d,a.fireClick(f,r)):f=n}};i["default"]=r,o.exports=i["default"]},{"./handle-dom":4,"./handle-swal-dom":6}],6:[function(n,o,i){var a=function(e){return e&&e.__esModule?e:{"default":e}};Object.defineProperty(i,"__esModule",{value:!0});var s=n("./utils"),r=n("./handle-dom"),l=n("./default-params"),c=a(l),d=n("./injected-html"),u=a(d),f=".sweet-alert",p=".sweet-overlay",m=function(){var e=t.createElement("div");for(e.innerHTML=u["default"];e.firstChild;)t.body.appendChild(e.firstChild)},h=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){var e=t.querySelector(f);return e||(m(),e=h()),e}),v=function(){var e=h();return e?e.querySelector("input"):void 0},b=function(){return t.querySelector(p)},g=function(e,t){var n=s.hexToRgb(t);e.style.boxShadow="0 0 2px rgba("+n+", 0.8), inset 0 0 0 1px rgba(0, 0, 0, 0.05)"},y=function(n){var o=h();r.fadeIn(b(),10),r.show(o),r.addClass(o,"showSweetAlert"),r.removeClass(o,"hideSweetAlert"),e.previousActiveElement=t.activeElement;var i=o.querySelector("button.confirm");i.focus(),setTimeout(function(){r.addClass(o,"visible")},500);var a=o.getAttribute("data-timer");if("null"!==a&&""!==a){var s=n;o.timeout=setTimeout(function(){var e=(s||null)&&"true"===o.getAttribute("data-has-done-function");e?s(null):sweetAlert.close()},a)}},C=function(){var e=h(),t=v();r.removeClass(e,"show-input"),t.value=c["default"].inputValue,t.setAttribute("type",c["default"].inputType),t.setAttribute("placeholder",c["default"].inputPlaceholder),w()},w=function(e){if(e&&13===e.keyCode)return!1;var t=h(),n=t.querySelector(".sa-input-error");r.removeClass(n,"show");var o=t.querySelector(".sa-error-container");r.removeClass(o,"show")},x=function(){var e=h();e.style.marginTop=r.getTopMargin(h())};i.sweetAlertInitialize=m,i.getModal=h,i.getOverlay=b,i.getInput=v,i.setFocusStyle=g,i.openModal=y,i.resetInput=C,i.resetInputError=w,i.fixVerticalPosition=x},{"./default-params":2,"./handle-dom":4,"./injected-html":7,"./utils":9}],7:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});var o='<div class="sweet-overlay" tabIndex="-1"></div><div class="sweet-alert"><div class="sa-icon sa-error">\n      <span class="sa-x-mark">\n        <span class="sa-line sa-left"></span>\n        <span class="sa-line sa-right"></span>\n      </span>\n    </div><div class="sa-icon sa-warning">\n      <span class="sa-body"></span>\n      <span class="sa-dot"></span>\n    </div><div class="sa-icon sa-info"></div><div class="sa-icon sa-success">\n      <span class="sa-line sa-tip"></span>\n      <span class="sa-line sa-long"></span>\n\n      <div class="sa-placeholder"></div>\n      <div class="sa-fix"></div>\n    </div><div class="sa-icon sa-custom"></div><h2>Title</h2>\n    <p>Text</p>\n    <fieldset>\n      <input type="text" tabIndex="3" />\n      <div class="sa-input-error"></div>\n    </fieldset><div class="sa-error-container">\n      <div class="icon">!</div>\n      <p>Not valid!</p>\n    </div><div class="sa-button-container">\n      <button class="cancel" tabIndex="2">Cancel</button>\n      <div class="sa-confirm-button-container">\n        <button class="confirm" tabIndex="1">OK</button><div class="la-ball-fall">\n          <div></div>\n          <div></div>\n          <div></div>\n        </div>\n      </div>\n    </div></div>';n["default"]=o,t.exports=n["default"]},{}],8:[function(e,t,o){Object.defineProperty(o,"__esModule",{value:!0});var i=e("./utils"),a=e("./handle-swal-dom"),s=e("./handle-dom"),r=["error","warning","info","success","input","prompt"],l=function(e){var t=a.getModal(),o=t.querySelector("h2"),l=t.querySelector("p"),c=t.querySelector("button.cancel"),d=t.querySelector("button.confirm");if(o.innerHTML=e.html?e.title:s.escapeHtml(e.title).split("\n").join("<br>"),l.innerHTML=e.html?e.text:s.escapeHtml(e.text||"").split("\n").join("<br>"),e.text&&s.show(l),e.customClass)s.addClass(t,e.customClass),t.setAttribute("data-custom-class",e.customClass);else{var u=t.getAttribute("data-custom-class");s.removeClass(t,u),t.setAttribute("data-custom-class","")}if(s.hide(t.querySelectorAll(".sa-icon")),e.type&&!i.isIE8()){var f=function(){for(var o=!1,i=0;i<r.length;i++)if(e.type===r[i]){o=!0;break}if(!o)return logStr("Unknown alert type: "+e.type),{v:!1};var l=["success","error","warning","info"],c=n;-1!==l.indexOf(e.type)&&(c=t.querySelector(".sa-icon.sa-"+e.type),s.show(c));var d=a.getInput();switch(e.type){case"success":s.addClass(c,"animate"),s.addClass(c.querySelector(".sa-tip"),"animateSuccessTip"),s.addClass(c.querySelector(".sa-long"),"animateSuccessLong");break;case"error":s.addClass(c,"animateErrorIcon"),s.addClass(c.querySelector(".sa-x-mark"),"animateXMark");break;case"warning":s.addClass(c,"pulseWarning"),s.addClass(c.querySelector(".sa-body"),"pulseWarningIns"),s.addClass(c.querySelector(".sa-dot"),"pulseWarningIns");break;case"input":case"prompt":d.setAttribute("type",e.inputType),d.value=e.inputValue,d.setAttribute("placeholder",e.inputPlaceholder),s.addClass(t,"show-input"),setTimeout(function(){d.focus(),d.addEventListener("keyup",swal.resetInputError)},400)}}();if("object"==typeof f)return f.v}if(e.imageUrl){var p=t.querySelector(".sa-icon.sa-custom");p.style.backgroundImage="url("+e.imageUrl+")",s.show(p);var m=80,h=80;if(e.imageSize){var v=e.imageSize.toString().split("x"),b=v[0],g=v[1];b&&g?(m=b,h=g):logStr("Parameter imageSize expects value with format WIDTHxHEIGHT, got "+e.imageSize)}p.setAttribute("style",p.getAttribute("style")+"width:"+m+"px; height:"+h+"px")}t.setAttribute("data-has-cancel-button",e.showCancelButton),e.showCancelButton?c.style.display="inline-block":s.hide(c),t.setAttribute("data-has-confirm-button",e.showConfirmButton),e.showConfirmButton?d.style.display="inline-block":s.hide(d),e.cancelButtonText&&(c.innerHTML=s.escapeHtml(e.cancelButtonText)),e.confirmButtonText&&(d.innerHTML=s.escapeHtml(e.confirmButtonText)),e.confirmButtonColor&&(d.style.backgroundColor=e.confirmButtonColor,d.style.borderLeftColor=e.confirmLoadingButtonColor,d.style.borderRightColor=e.confirmLoadingButtonColor,a.setFocusStyle(d,e.confirmButtonColor)),t.setAttribute("data-allow-outside-click",e.allowOutsideClick);var y=!!e.doneFunction;t.setAttribute("data-has-done-function",y),e.animation?"string"==typeof e.animation?t.setAttribute("data-animation",e.animation):t.setAttribute("data-animation","pop"):t.setAttribute("data-animation","none"),t.setAttribute("data-timer",e.timer)};o["default"]=l,t.exports=o["default"]},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],9:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var i=function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},a=function(e){var t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);return t?parseInt(t[1],16)+", "+parseInt(t[2],16)+", "+parseInt(t[3],16):null},s=function(){return e.attachEvent&&!e.addEventListener},r=function(t){e.console&&e.console.log("SweetAlert: "+t)},l=function(e,t){e=String(e).replace(/[^0-9a-f]/gi,""),e.length<6&&(e=e[0]+e[0]+e[1]+e[1]+e[2]+e[2]),t=t||0;var n,o,i="#";for(o=0;3>o;o++)n=parseInt(e.substr(2*o,2),16),n=Math.round(Math.min(Math.max(0,n+n*t),255)).toString(16),i+=("00"+n).substr(n.length);return i};o.extend=i,o.hexToRgb=a,o.isIE8=s,o.logStr=r,o.colorLuminance=l},{}]},{},[1]),"function"==typeof define&&define.amd?define(function(){return sweetAlert}):"undefined"!=typeof module&&module.exports&&(module.exports=sweetAlert)}(window,document),$(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="_token"]').attr("content")}}),addDeleteForms(),$(document).ajaxComplete(function(){addDeleteForms()}),$("body").on("submit","form[name=delete_item]",function(e){e.preventDefault();var t=this,n=$('a[data-method="delete"]'),o=n.attr("data-trans-button-cancel")?n.attr("data-trans-button-cancel"):"Cancel",i=n.attr("data-trans-button-confirm")?n.attr("data-trans-button-confirm"):"Yes, delete",a=n.attr("data-trans-title")?n.attr("data-trans-title"):"Warning";n.attr("data-trans-text")?n.attr("data-trans-text"):"Are you sure you want to delete this item?";swal({title:a,type:"warning",showCancelButton:!0,cancelButtonText:o,confirmButtonColor:"#DD6B55",confirmButtonText:i,closeOnConfirm:!0},function(e){e&&t.submit()})}),$('[data-toggle="tooltip"]').tooltip(),$('[data-toggle="popover"]').popover(),$("body").on("click",function(e){$('[data-toggle="popover"]').each(function(){$(this).is(e.target)||0!==$(this).has(e.target).length||0!==$(".popover").has(e.target).length||$(this).popover("hide")})})}),"undefined"==typeof jQuery)throw new Error("AdminLTE requires jQuery");$.AdminLTE={},$.AdminLTE.options={navbarMenuSlimscroll:!0,navbarMenuSlimscrollWidth:"3px",navbarMenuHeight:"200px",animationSpeed:500,sidebarToggleSelector:'[data-toggle="offcanvas"]',sidebarPushMenu:!0,sidebarSlimScroll:!0,sidebarExpandOnHover:!1,enableBoxRefresh:!0,enableBSToppltip:!0,BSTooltipSelector:'[data-toggle="tooltip"]',enableFastclick:!0,enableControlSidebar:!0,controlSidebarOptions:{toggleBtnSelector:'[data-toggle="control-sidebar"]',selector:".control-sidebar",slide:!0},enableBoxWidget:!0,boxWidgetOptions:{boxWidgetIcons:{collapse:"fa-minus",open:"fa-plus",remove:"fa-times"},boxWidgetSelectors:{remove:'[data-widget="remove"]',collapse:'[data-widget="collapse"]'}},directChat:{enable:!0,contactToggleSelector:'[data-widget="chat-pane-toggle"]'},colors:{lightBlue:"#3c8dbc",red:"#f56954",green:"#00a65a",aqua:"#00c0ef",yellow:"#f39c12",blue:"#0073b7",navy:"#001F3F",teal:"#39CCCC",olive:"#3D9970",lime:"#01FF70",orange:"#FF851B",fuchsia:"#F012BE",purple:"#8E24AA",maroon:"#D81B60",black:"#222222",gray:"#d2d6de"},screenSizes:{xs:480,sm:768,md:992,lg:1200}},$(function(){"undefined"!=typeof AdminLTEOptions&&$.extend(!0,$.AdminLTE.options,AdminLTEOptions);var e=$.AdminLTE.options;_init(),$.AdminLTE.layout.activate(),$.AdminLTE.tree(".sidebar"),e.enableControlSidebar&&$.AdminLTE.controlSidebar.activate(),e.navbarMenuSlimscroll&&"undefined"!=typeof $.fn.slimscroll&&$(".navbar .menu").slimscroll({height:e.navbarMenuHeight,alwaysVisible:!1,size:e.navbarMenuSlimscrollWidth}).css("width","100%"),e.sidebarPushMenu&&$.AdminLTE.pushMenu.activate(e.sidebarToggleSelector),e.enableBSToppltip&&$("body").tooltip({selector:e.BSTooltipSelector}),e.enableBoxWidget&&$.AdminLTE.boxWidget.activate(),e.enableFastclick&&"undefined"!=typeof FastClick&&FastClick.attach(document.body),e.directChat.enable&&$(e.directChat.contactToggleSelector).on("click",function(){var e=$(this).parents(".direct-chat").first();e.toggleClass("direct-chat-contacts-open")}),$('.btn-group[data-toggle="btn-toggle"]').each(function(){var e=$(this);$(this).find(".btn").on("click",function(t){e.find(".btn.active").removeClass("active"),$(this).addClass("active"),t.preventDefault()})})}),function(e){e.fn.boxRefresh=function(t){function n(e){e.append(a),i.onLoadStart.call(e)}function o(e){e.find(a).remove(),i.onLoadDone.call(e)}var i=e.extend({trigger:".refresh-btn",source:"",onLoadStart:function(e){},onLoadDone:function(e){}},t),a=e('<div class="overlay"><div class="fa fa-refresh fa-spin"></div></div>');return this.each(function(){if(""===i.source)return void console;var t=e(this),a=t.find(i.trigger).first();a.on("click",function(e){e.preventDefault(),n(t),t.find(".box-body").load(i.source,function(){o(t)})})})}}(jQuery),function(e){e.fn.activateBox=function(){e.AdminLTE.boxWidget.activate(this)}}(jQuery),function(e){e.fn.todolist=function(t){var n=e.extend({onCheck:function(e){},onUncheck:function(e){}},t);return this.each(function(){"undefined"!=typeof e.fn.iCheck?(e("input",this).on("ifChecked",function(t){var o=e(this).parents("li").first();o.toggleClass("done"),n.onCheck.call(o)}),e("input",this).on("ifUnchecked",function(t){var o=e(this).parents("li").first();o.toggleClass("done"),n.onUncheck.call(o)})):e("input",this).on("change",function(t){var o=e(this).parents("li").first();o.toggleClass("done"),n.onCheck.call(o)})})}}(jQuery),!function(e){e(["jquery"],function(e){return function(){function t(e,t,n){return m({type:w.error,iconClass:h().iconClasses.error,message:e,optionsOverride:n,title:t})}function n(t,n){return t||(t=h()),b=e("#"+t.containerId),b.length?b:(n&&(b=u(t)),b)}function o(e,t,n){return m({type:w.info,iconClass:h().iconClasses.info,message:e,optionsOverride:n,title:t})}function i(e){g=e}function a(e,t,n){return m({type:w.success,iconClass:h().iconClasses.success,message:e,optionsOverride:n,title:t})}function s(e,t,n){return m({type:w.warning,iconClass:h().iconClasses.warning,message:e,optionsOverride:n,title:t})}function r(e){var t=h();b||n(t),d(e,t)||c(t)}function l(t){var o=h();return b||n(o),t&&0===e(":focus",t).length?void v(t):void(b.children().length&&b.remove())}function c(t){for(var n=b.children(),o=n.length-1;o>=0;o--)d(e(n[o]),t)}function d(t,n){return t&&0===e(":focus",t).length?(t[n.hideMethod]({duration:n.hideDuration,easing:n.hideEasing,complete:function(){v(t)}}),!0):!1}function u(t){return b=e("<div/>").attr("id",t.containerId).addClass(t.positionClass).attr("aria-live","polite").attr("role","alert"),b.appendTo(e(t.target)),b}function f(){return{tapToDismiss:!0,toastClass:"toast",containerId:"toast-container",debug:!1,showMethod:"fadeIn",showDuration:300,showEasing:"swing",onShown:void 0,hideMethod:"fadeOut",hideDuration:1e3,hideEasing:"swing",onHidden:void 0,extendedTimeOut:1e3,iconClasses:{error:"toast-error",info:"toast-info",success:"toast-success",warning:"toast-warning"},iconClass:"toast-info",positionClass:"toast-top-right",timeOut:5e3,titleClass:"toast-title",messageClass:"toast-message",target:"body",closeHtml:'<button type="button">&times;</button>',newestOnTop:!0,preventDuplicates:!1,progressBar:!1}}function p(e){g&&g(e)}function m(t){function o(t){return!e(":focus",d).length||t?(clearTimeout(w.intervalId),d[r.hideMethod]({duration:r.hideDuration,easing:r.hideEasing,complete:function(){v(d),r.onHidden&&"hidden"!==x.state&&r.onHidden(),x.state="hidden",x.endTime=new Date,p(x)}})):void 0}function i(){(r.timeOut>0||r.extendedTimeOut>0)&&(c=setTimeout(o,r.extendedTimeOut),w.maxHideTime=parseFloat(r.extendedTimeOut),w.hideEta=(new Date).getTime()+w.maxHideTime)}function a(){clearTimeout(c),w.hideEta=0,d.stop(!0,!0)[r.showMethod]({duration:r.showDuration,easing:r.showEasing})}function s(){var e=(w.hideEta-(new Date).getTime())/w.maxHideTime*100;m.width(e+"%")}var r=h(),l=t.iconClass||r.iconClass;if("undefined"!=typeof t.optionsOverride&&(r=e.extend(r,t.optionsOverride),l=t.optionsOverride.iconClass||l),r.preventDuplicates){if(t.message===y)return;y=t.message}C++,b=n(r,!0);var c=null,d=e("<div/>"),u=e("<div/>"),f=e("<div/>"),m=e("<div/>"),g=e(r.closeHtml),w={intervalId:null,hideEta:null,maxHideTime:null},x={toastId:C,state:"visible",startTime:new Date,options:r,map:t};return t.iconClass&&d.addClass(r.toastClass).addClass(l),t.title&&(u.append(t.title).addClass(r.titleClass),d.append(u)),t.message&&(f.append(t.message).addClass(r.messageClass),d.append(f)),r.closeButton&&(g.addClass("toast-close-button").attr("role","button"),d.prepend(g)),r.progressBar&&(m.addClass("toast-progress"),d.prepend(m)),d.hide(),r.newestOnTop?b.prepend(d):b.append(d),d[r.showMethod]({duration:r.showDuration,easing:r.showEasing,complete:r.onShown}),r.timeOut>0&&(c=setTimeout(o,r.timeOut),w.maxHideTime=parseFloat(r.timeOut),w.hideEta=(new Date).getTime()+w.maxHideTime,r.progressBar&&(w.intervalId=setInterval(s,10))),d.hover(a,i),!r.onclick&&r.tapToDismiss&&d.click(o),r.closeButton&&g&&g.click(function(e){e.stopPropagation?e.stopPropagation():void 0!==e.cancelBubble&&e.cancelBubble!==!0&&(e.cancelBubble=!0),o(!0)}),r.onclick&&d.click(function(){r.onclick(),o()}),p(x),r.debug&&console&&void 0,d}function h(){return e.extend({},f(),x.options)}function v(e){b||(b=n()),e.is(":visible")||(e.remove(),e=null,0===b.children().length&&(b.remove(),y=void 0))}var b,g,y,C=0,w={error:"error",info:"info",success:"success",warning:"warning"},x={clear:r,remove:l,error:t,getContainer:n,info:o,options:{},subscribe:i,success:a,version:"2.1.0",warning:s};return x}()})}("function"==typeof define&&define.amd?define:function(e,t){"undefined"!=typeof module&&module.exports?module.exports=t(require("jquery")):window.toastr=t(window.jQuery)}),$(function(){toastr.options={closeButton:!0,debug:!1,progressBar:!0,positionClass:"toast-top-right",onclick:null,showDuration:"400",hideDuration:"1000",timeOut:"2000",extendedTimeOut:"1000",showEasing:"swing",hideEasing:"linear",showMethod:"fadeIn",hideMethod:"fadeOut"}});