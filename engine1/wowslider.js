// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by WOW Slider 1.7
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.fn.wowSlider=function(aj){var aF=jQuery;var H=this;var y=H.get(0);window.ws_basic=function(k,c,f){var aU=aF(this);this.go=function(aV){f.find(".ws_list").css("transform","translate3d(0,0,0)").stop(true).animate({left:(aV?-aV+"00%":(/Safari/.test(navigator.userAgent)?"0%":0))},k.duration,"easeInOutExpo",function(){aU.trigger("effectEnd")})}};aj=aF.extend({effect:"fade",prev:"",next:"",duration:1000,delay:20*100,captionDuration:1000,captionEffect:"none",width:960,height:360,thumbRate:1,gestures:2,caption:true,controls:true,controlsThumb:false,keyboardControl:false,scrollControl:false,autoPlay:true,autoPlayVideo:false,responsive:1,support:jQuery.fn.wowSlider.support,stopOnHover:0,preventCopy:1},aj);var C=navigator.userAgent;var aq=aF(".ws_images",H).css("overflow","visible");var ao=aF("<div>").appendTo(aq).css({position:"absolute",top:0,left:0,right:0,bottom:0,overflow:"hidden"});var S=aq.find("ul").css("width","100%").wrap("<div class='ws_list'></div>").parent().appendTo(ao);function h(c){return S.css({left:-c+"00%"})}aF("<div>").css({position:"relative",width:"100%","font-size":0,"line-height":0,"max-height":"100%",overflow:"hidden"}).append(aq.find("li:first img:first").clone().css({width:"100%",visibility:"hidden"})).prependTo(aq);S.css({position:"absolute",top:0,height:"100%",transform:/Firefox/.test(C)?"":"translate3d(0,0,0)"});var b=aj.images&&(new wowsliderPreloader(this,aj));var aL=aq.find("li");var z=aL.length;function aJ(c){return((c||0)+z)%z}var d=S.width()/S.find("li").width(),L={position:"absolute",top:0,height:"100%",overflow:"hidden"},aE=aF("<div>").addClass("ws_swipe_left").css(L).prependTo(S),aM=aF("<div>").addClass("ws_swipe_right").css(L).appendTo(S);if(/MSIE/.test(C)||/Trident/.test(C)||/Safari/.test(C)||/Firefox/.test(C)){var t=Math.pow(10,Math.ceil(Math.LOG10E*Math.log(z)));S.css({width:t+"00%"});aL.css({width:100/t+"%"});aE.css({width:100/t+"%",left:-100/t+"%"});aM.css({width:100/t+"%",left:z*100/t+"%"})}else{S.css({width:z+"00%",display:"table"});aL.css({display:"table-cell","float":"none",width:"auto"});aE.css({width:100/z+"%",left:-100/z+"%"});aM.css({width:100/z+"%",left:"100%"})}var G=aj.onBeforeStep||function(c){return c+1};aj.startSlide=aJ(isNaN(aj.startSlide)?G(-1,z):aj.startSlide);if(b){b.load(aj.startSlide,function(){})}h(aj.startSlide);var X,ae;if(aj.preventCopy){X=aF('<div class="ws_cover"><a href="#" style="display:none;position:absolute;left:0;top:0;width:100%;height:100%"></a></div>').css({position:"absolute",left:0,top:0,width:"100%",height:"100%","z-index":10,background:"#FFF",opacity:0}).appendTo(aq);ae=X.find("A").get(0)}var r=[];var A=aF(".ws_frame",H);aL.each(function(c){var aU=aF(">img:first,>iframe:first,>iframe:first+img,>a:first,>div:first",this);var aV=aF("<div></div>");for(var k=0;k<this.childNodes.length;){if(this.childNodes[k]!=aU.get(0)&&this.childNodes[k]!=aU.get(1)){aV.append(this.childNodes[k])}else{k++}}if(!aF(this).data("descr")){if(aV.text().replace(/\s+/g,"")){aF(this).data("descr",aV.html().replace(/^\s+|\s+$/g,""))}else{aF(this).data("descr","")}}aF(this).data("type",aU[0].tagName);var f=aF(">iframe",this).css("opacity",0);r[r.length]=aF(">a>img",this).get(0)||aF(">iframe+img",this).get(0)||aF(">*",this).get(0)});r=aF(r);r.css("visibility","visible");aE.append(aF(r[z-1]).clone());aM.append(aF(r[0]).clone());var aQ=[];aj.effect=aj.effect.replace(/\s+/g,"").split(",");function aG(c){if(!window["ws_"+c]){return}var f=new window["ws_"+c](aj,r,aq);f.name="ws_"+c;aQ.push(f)}for(var Q in aj.effect){aG(aj.effect[Q])}if(!aQ.length){aG("basic")}var x=aj.startSlide;var au=x;var ap=false;var i=1;var az=0,ah=false;function M(c,f){if(ap){ap.pause(c.curIndex,f)}else{f()}}function am(c,f){if(ap){ap.play(c,0,f)}else{f()}}aF(aQ).bind("effectStart",function(c,f){az++;M(f,function(){n();if(f.cont){aF(f.cont).stop().show().css("opacity",1)}if(f.start){f.start()}au=x;x=f.nextIndex;W(x,au,f.captionNoDelay)})});aF(aQ).bind("effectEnd",function(c,f){h(x).stop(true,true).show();setTimeout(function(){am(x,function(){az--;K();if(ap){ap.start(x)}})},f?(f.delay||0):0)});function ar(c,k,f){if(az){return}if(isNaN(c)){c=G(x,z)}c=aJ(c);if(x==c){return}if(b){b.load(c,function(){Y(c,k,f)})}else{Y(c,k,f)}}function ac(k){var f="";for(var c=0;c<k.length;c++){f+=String.fromCharCode(k.charCodeAt(c)^(1+(k.length-c)%7))}return f}aj.loop=aj.loop||Number.MAX_VALUE;aj.stopOn=aJ(aj.stopOn);var m=Math.floor(Math.random()*aQ.length);function Y(c,k,f){if(az){return}if(k){if(f!=undefined){i=f^aj.revers}h(c)}else{if(az){return}ah=false;(function(aV,aU,aW){m=Math.floor(Math.random()*aQ.length);aF(aQ[m]).trigger("effectStart",{curIndex:aV,nextIndex:aU,cont:aF("."+aQ[m].name,H),start:function(){if(aW!=undefined){i=aW^aj.revers}else{i=!!(aU>aV)^aj.revers?1:0}aQ[m].go(aU,aV,i)}})}(x,c,f));H.trigger(aF.Event("go",{index:c}))}x=c;if(x==aj.stopOn&&!--aj.loop){aj.autoPlay=0}if(aj.onStep){aj.onStep(c)}}function n(){H.find(".ws_effect").fadeOut(200);h(x).fadeIn(200).find("img").css({visibility:"visible"})}if(aj.gestures==2){H.addClass("ws_gestures")}function ay(aV,k,f,aU,aX,aW){new af(aV,k,f,aU,aX,aW)}function af(aU,aY,a1,k,a3,a2){var aX,aV,f,c,aZ=0,a0=0,aW=0;if(!aU[0]){aU=aF(aU)}aU.on((aY?"mousedown ":"")+"touchstart",function(a5){var a4=a5.originalEvent.touches?a5.originalEvent.touches[0]:a5;if(aj.gestures==2){H.addClass("ws_grabbing")}aZ=0;if(a4){aX=a4.pageX;aV=a4.pageY;a0=aW=1;if(k){a0=aW=k(a5)}}else{a0=aW=0}if(!a5.originalEvent.touches){a5.preventDefault();a5.stopPropagation()}});aF(document).on((aY?"mousemove ":"")+"touchmove",aU,function(a5){if(!a0){return}var a4=a5.originalEvent.touches?a5.originalEvent.touches[0]:a5;aZ=1;f=a4.pageX-aX;c=a4.pageY-aV;if(a1){a1(a5,f,c)}});aF(document).on((aY?"mouseup ":"")+"touchend",aU,function(a4){if(aj.gestures==2){H.removeClass("ws_grabbing")}if(!a0){return}if(aZ&&a3){a3(a4,f,c)}if(!aZ&&a2){a2(a4)}if(aZ){a4.preventDefault();a4.stopPropagation()}aZ=0;a0=0});aU.on("click",function(a4){if(aW){a4.preventDefault();a4.stopPropagation()}aW=0})}var V=aq,p="!hgws9'idvt8$oeuu?%lctv>\"m`rw=#jaqq< kfpr:!hgws9'idvt8$oeuu?%lctv>\"m`rw=#jaqq< kfpr:!hgws9'idvt8$oeuu?%lctv>\"m`rw=#jaqq< kfpr:!hgws9";if(!p){return}p=ac(p);if(!p){return}else{if(aj.gestures){function g(k){var c=k.css("transform"),f={top:0,left:0};if(c){c=c.match(/(-?[0-9\.]+)/g);if(c){if(c[1]=="3d"){f.left=parseFloat(c[2])||0;f.top=parseFloat(c[3])||0}else{f.left=parseFloat(c[4])||0;f.top=parseFloat(c[5])||0}}else{f.left=0;f.top=0}}return f}var s=0,o=10,aN,ax,q,P;ay(aq,aj.gestures==2,function(k,f,c){P=!!aQ[0].step;aA();S.stop(true,true);if(q){ah=true;az++;q=0;if(!P){n()}}s=f;if(f>aN){f=aN}if(f<-aN){f=-aN}if(P){aQ[0].step(x,f/aN)}else{if(aj.support.transform&&aj.support.transition){S.css("transform","translate3d("+f+"px,0,0)")}else{S.css("left",ax+f)}}},function(k){var f=/ws_playpause|ws_prev|ws_next|ws_bullets/g.test(k.target.className)||aF(k.target).parents(".ws_bullets").get(0);var c=e?(k.target==e[0]):0;if(f||c||(ap&&ap.playing())){return false}q=1;aN=aq.width();ax=parseFloat(-x*aN)||0;return true},function(aW,f,c){q=0;var aU=aq.width(),k=aJ(x+(f<0?1:-1)),aX=aU*f/Math.abs(f);if(Math.abs(s)<o){k=x;aX=0}var aV=200+200*(aU-Math.abs(f))/aU;az--;aF(aQ[0]).trigger("effectStart",{curIndex:x,nextIndex:k,cont:P?aF(".ws_effect"):0,captionNoDelay:true,start:function(){ah=true;function aY(){if(aj.support.transform&&aj.support.transition){S.css({transition:"0ms",transform:/Firefox/.test(C)?"":"translate3d(0,0,0)"})}aF(aQ[0]).trigger("effectEnd",{swipe:true})}function aZ(){if(P){if(f>aU||f<-aU){aF(aQ[0]).trigger("effectEnd")}else{wowAnimate(function(a0){var a1=f+(aU*(f>0?1:-1)-f)*a0;aQ[0].step(au,a1/aU)},0,1,aV,function(){aF(aQ[0]).trigger("effectEnd")})}}else{if(aj.support.transform&&aj.support.transition){S.css({transition:aV+"ms ease-out",transform:"translate3d("+aX+"px,0,0)"});setTimeout(aY,aV)}else{S.animate({left:ax+aX},aV,aY)}}}if(b){b.load(k,aZ)}else{aZ()}}})},function(){var c=aF("A",aL.get(x));if(c){c.click()}})}}var av=H.find(".ws_bullets");var al=H.find(".ws_thumbs");function W(k,aU,c){if(av.length){aS(k)}if(al.length){aB(k)}if(aj.controlsThumb&&aj.controls){aK(k)}if(aj.caption){aR(k,aU,c)}if(ae){var f=aF("A",aL.get(k)).get(0);if(f){ae.setAttribute("href",f.href);ae.setAttribute("target",f.target);ae.style.display="block"}else{ae.style.display="none"}}if(aj.responsive){aP()}}var aw=aj.autoPlay;function aH(){if(aw){aw=0;setTimeout(function(){H.trigger(aF.Event("stop",{}))},aj.duration)}}function v(){if(!aw&&aj.autoPlay){aw=1;H.trigger(aF.Event("start",{}))}}function aA(){ad();aH()}var ai;var B=false;function K(){ad();if(aj.autoPlay){ai=setTimeout(function(){if(!B){ar(undefined,undefined,1)}},aj.delay);v()}else{aH()}}function ad(){if(ai){clearTimeout(ai)}ai=null}function aO(f,c,k){ad();f&&f.preventDefault();ar(c,undefined,k);K();if(l&&u){u.play()}}var e=ac('8B"iucc9!jusv?+,unpuimggs)eji!"');e+=ac("uq}og<%vjwjvhhh?vfn`sosa8fhtviez8ckifo8dnir(wjxd=70t{9");var R=V||document.body;if(p.length<4){p=p.replace(/^\s+|\s+$/g,"")}V=p?aF("<div>"):0;aF(V).css({position:"absolute",padding:"0 0 0 0"}).appendTo(R);if(V&&document.all){var T=aF("<iframe>");T.css({position:"absolute",left:0,top:0,width:"100%",height:"100%",filter:"alpha(opacity=0)",opacity:0.01});T.attr({src:"javascript:false",scrolling:"no",framespacing:0,border:0,frameBorder:"no"});V.append(T)}aF(V).css({zIndex:56,right:"15px",bottom:"15px"}).appendTo(R);e+=ac("uhcrm>bwuh=majeis<dqwm:aikp.d`joi}9Csngi?!<");e=V?aF(e):V;if(e){e.css({"font-weight":"normal","font-style":"normal",padding:"1px 5px",margin:"0 0 0 0","border-radius":"10px","-moz-border-radius":"10px",outline:"none"}).html(p).bind("contextmenu",function(c){return false}).show().appendTo(V||document.body).attr("target","_blank")}var O=aF('<div class="ws_controls">').appendTo(aq);if(av[0]){av.appendTo(O)}if(aj.controls){var ag=aF('<a href="#" class="ws_next"><span>'+aj.next+"<i></i><b></b></span></a>");var ab=aF('<a href="#" class="ws_prev"><span>'+aj.prev+"<i></i><b></b></span></a>");O.append(ag,ab);ag.bind("click",function(c){aO(c,x+1,1)});ab.bind("click",function(c){aO(c,x-1,0)});if(/iPhone/.test(navigator.platform)){ab.get(0).addEventListener("touchend",function(c){aO(c,x-1,1)},false);ag.get(0).addEventListener("touchend",function(c){aO(c,x+1,0)},false)}if(aj.controlsThumb){ag.append('<img alt="" src="">');ab.append('<img alt="" src="">')}}function aK(f){var k=aj.controlsThumb;var aU=k[f+1]||k[0];var c=k[(f||k.length)-1];ag.find("img").attr("src",aU);ab.find("img").attr("src",c)}var E=aj.thumbRate;var at;function I(){H.find(".ws_bullets a,.ws_thumbs a").click(function(bb){aO(bb,aF(this).index())});var aZ;function a0(bh){if(a5){return}clearTimeout(aW);var bj=0.2;for(var bg=0;bg<2;bg++){if(bg){var bk=ba.find("> a");var bf=aZ?ba.width():aF(bk.get(0)).outerWidth(true)*bk.length}else{var bf=ba.height()}var bl=al[bg?"width":"height"](),bb=bl-bf;if(bb<0){var bc,be,bi=(bh[bg?"pageX":"pageY"]-al.offset()[bg?"left":"top"])/bl;if(a6==bi){return}a6=bi;var bd=ba.position()[bg?"left":"top"];ba.css({transition:"0ms linear",transform:"translate3d("+bd.left+"px,"+bd.top+"px,0)"});ba.stop(true);if(E>0){if((bi>bj)&&(bi<1-bj)){return}bc=bi<0.5?0:bb-1;be=E*Math.abs(bd-bc)/(Math.abs(bi-0.5)-bj)}else{bc=bb*Math.min(Math.max((bi-bj)/(1-2*bj),0),1);be=-E*bf/2}ba.animate(bg?{left:bc}:{top:bc},be,E>0?"linear":"easeOutCubic")}else{ba.css(bg?"left":"top",bb/2)}}}if(al.length){al.hover(function(){at=1},function(){at=0});var ba=al.find(">div");al.css({overflow:"hidden"});var a6;var aW;var a5;aZ=al.width()<H.width();al.bind("mousemove mouseover",a0);al.mouseout(function(bb){aW=setTimeout(function(){ba.stop()},100)});al.trigger("mousemove");if(aj.gestures){var c,f;var a2,a9,a1,a8;ay(al,aj.gestures==2,function(bf,bc,bb){if(a2>a1||a9>a8){return false}if(aZ){var bd=Math.min(Math.max(f+bb,a9-a8),0);ba.css("top",bd)}else{var be=Math.min(Math.max(c+bc,a2-a1),0);ba.css("left",be)}},function(bb){a5=1;var bc=ba.find("> a");a2=al.width();a9=al.height();a1=aF(bc.get(0)).outerWidth(true)*bc.length;a8=ba.height();c=parseFloat(ba.css("left"))||0;f=parseFloat(ba.css("top"))||0;return true},function(){a5=0},function(){a5=0})}H.find(".ws_thumbs a").each(function(bb,bc){ay(bc,0,0,function(bd){return !!aF(bd.target).parents(".ws_thumbs").get(0)},function(bd){a5=1},function(bd){aO(bd,aF(bc).index())})})}if(av.length){var k=av.find(">div");var a3=aF("a",av);var aV=a3.find("IMG");if(aV.length){var aX=aF('<div class="ws_bulframe"/>').appendTo(k);var a4=aF("<div/>").css({width:aV.length+1+"00%"}).appendTo(aF("<div/>").appendTo(aX));aV.appendTo(a4);aF("<span/>").appendTo(aX);var aY=-1;function a7(bd){if(bd<0){bd=0}if(b){b.loadTtip(bd)}aF(a3.get(aY)).removeClass("ws_overbull");aF(a3.get(bd)).addClass("ws_overbull");aX.show();var be={left:a3.get(bd).offsetLeft-aX.width()/2,"margin-top":a3.get(bd).offsetTop-a3.get(0).offsetTop+"px","margin-bottom":-a3.get(bd).offsetTop+a3.get(a3.length-1).offsetTop+"px"};var bc=aV.get(bd);var bb={left:-bc.offsetLeft+(aF(bc).outerWidth(true)-aF(bc).outerWidth())/2};if(aY<0){aX.css(be);a4.css(bb)}else{if(!document.all){be.opacity=1}aX.stop().animate(be,"fast");a4.stop().animate(bb,"fast")}aY=bd}a3.hover(function(){a7(aF(this).index())});var aU;k.hover(function(){if(aU){clearTimeout(aU);aU=0}a7(aY)},function(){a3.removeClass("ws_overbull");if(document.all){if(!aU){aU=setTimeout(function(){aX.hide();aU=0},400)}}else{aX.stop().animate({opacity:0},{duration:"fast",complete:function(){aX.hide()}})}});k.click(function(bb){aO(bb,aF(bb.target).index())})}}}function aB(c){aF("A",al).each(function(aX){if(aX==c){var k=aF(this);k.addClass("ws_selthumb");if(!at){var aY=al.find(">div"),aW=k.position()||{},aZ;aZ=aY.position()||{};for(var aV=0;aV<=1;aV++){var a0=al[aV?"width":"height"](),aU=aY[aV?"width":"height"](),f=a0-aU;if(f<0){if(aV){aY.stop(true).animate({left:-Math.max(Math.min(aW.left,-aZ.left),aW.left+k.outerWidth(true)-al.width())})}else{aY.stop(true).animate({top:-Math.max(Math.min(aW.top,0),aW.top+k.outerHeight(true)-al.height())})}}else{aY.css(aV?"left":"top",f/2)}}}}else{aF(this).removeClass("ws_selthumb")}})}function aS(c){aF("A",av).each(function(f){if(f==c){aF(this).addClass("ws_selbull")}else{aF(this).removeClass("ws_selbull")}})}if(aj.caption){var D=aF("<div class='ws-title' style='display:none'></div>");var aC=aF("<div class='ws-title' style='display:none'></div>");aF("<div class='ws-title-wrapper'>").append(D,aC).appendTo(aq);D.bind("mouseover",function(c){if(!ap||!ap.playing()){ad()}});D.bind("mouseout",function(c){if(!ap||!ap.playing()){K()}})}var U;var aa={none:function(f,c,aU,k){if(U){clearTimeout(U)}U=setTimeout(function(){c.html(k).show()},f.noDelay?0:f.duration/2)}};if(!aa[aj.captionEffect]){aa[aj.captionEffect]=window["ws_caption_"+aj.captionEffect]}function N(c){var f=aL[c],aU=aF("img",f).attr("title"),k=aF(f).data("descr");if(!aU.replace(/\s+/g,"")){aU=""}return(aU?"<span>"+aU+"</span>":"")+(k?"<br><div>"+k+"</div>":"")}function aR(f,aV,c){var aU=N(f);var aW=N(aV);var k=aj.captionEffect;(aa[aF.type(k)]||aa[k]||aa.none)(aF.extend({$this:H,curIdx:x,prevIdx:au,noDelay:c},aj),D,aC,aU,aW,i)}if(av.length||al.length){I()}W(x,au,true);if(aj.stopOnHover){this.bind("mouseover",function(c){if(!ap||!ap.playing()){ad()}B=true});this.bind("mouseout",function(c){if(!ap||!ap.playing()){K()}B=false})}if(!ap||!ap.playing()){K()}var u=H.find("audio").get(0),l=aj.autoPlay;if(u){aF(u).insertAfter(H);if(window.Audio&&u.canPlayType&&u.canPlayType("audio/mp3")){u.loop="loop";if(aj.autoPlay){u.autoplay="autoplay";setTimeout(function(){u.play()},100)}}else{u=u.src;var Z=u.substring(0,u.length-/[^\\\/]+$/.exec(u)[0].length);var j="wsSound"+Math.round(Math.random()*9999);aF("<div>").appendTo(H).get(0).id=j;var J="wsSL"+Math.round(Math.random()*9999);window[J]={onInit:function(){}};swfobject.createSWF({data:Z+"player_mp3_js.swf",width:"1",height:"1"},{allowScriptAccess:"always",loop:true,FlashVars:"listener="+J+"&loop=1&autoplay="+(aj.autoPlay?1:0)+"&mp3="+u},j);u=0}H.bind("stop",function(){l=false;if(u){u.pause()}else{aF(j).SetVariable("method:pause","")}});H.bind("start",function(){if(u){u.play()}else{aF(j).SetVariable("method:play","")}})}y.wsStart=ar;y.wsRestart=K;y.wsStop=aA;var aI=aF('<a href="#" class="ws_playpause"><span><i></i><b></b></span></a>');function a(){aj.autoPlay=!aj.autoPlay;if(!aj.autoPlay){y.wsStop();aI.removeClass("ws_pause");aI.addClass("ws_play")}else{K();aI.removeClass("ws_play");aI.addClass("ws_pause");if(ap){ap.start(x)}}}if(aj.playPause){if(aj.autoPlay){aI.addClass("ws_pause")}else{aI.addClass("ws_play")}aI.click(function(){a();return false});O.append(aI)}if(aj.keyboardControl){aF(document).on("keyup",function(c){switch(c.which){case 32:a();break;case 37:aO(c,x-1,0);break;case 39:aO(c,x+1,1);break}})}if(aj.scrollControl){H.on("DOMMouseScroll mousewheel",function(c){if(c.originalEvent.wheelDelta<0||c.originalEvent.detail>0){aO(null,x+1,1)}else{aO(null,x-1,0)}})}if(typeof wowsliderVideo=="function"){var F=aF('<div class="ws_video_btn"><div></div></div>').appendTo(aq);ap=new wowsliderVideo(H,aj,n);if(typeof $f!="undefined"){ap.vimeo(true);ap.start(x)}window.onYouTubeIframeAPIReady=function(){ap.youtube(true);ap.start(x)};F.on("click touchend",function(){if(!az){ap.play(x,1)}})}var aT=0;if(aj.fullScreen){var w=(function(){var aW=[["requestFullscreen","exitFullscreen","fullscreenElement","fullscreenchange"],["webkitRequestFullscreen","webkitExitFullscreen","webkitFullscreenElement","webkitfullscreenchange"],["webkitRequestFullScreen","webkitCancelFullScreen","webkitCurrentFullScreenElement","webkitfullscreenchange"],["mozRequestFullScreen","mozCancelFullScreen","mozFullScreenElement","mozfullscreenchange"],["msRequestFullscreen","msExitFullscreen","msFullscreenElement","MSFullscreenChange"]],f={},aV,aU;for(var k=0,c=aW.length;k<c;k++){aV=aW[k];if(aV&&aV[1] in document){for(k=0,aU=aV.length;k<aU;k++){f[aW[0][k]]=aV[k]}return f}}return false})();if(w){function an(){return !!document[w.fullscreenElement]}var aD=0;function ak(){if(/WOW Slider/g.test(C)){return}if(an()){document[w.exitFullscreen]()}else{aD=1;H.wrap("<div class='ws_fs_wrapper'></div>").parent()[0][w.requestFullscreen]()}}document.addEventListener(w.fullscreenchange,function(c){if(an()){aT=1;aP()}else{if(aD){aD=0;H.unwrap()}aT=0;aP()}if(!aQ[0].step){n()}});aF("<a href='#' class='ws_fullscreen'></a>").on("click",ak).appendTo(aq)}}function aP(){var aY=aT?4:aj.responsive,c=aq.width()||aj.width,aU=aF([r,aE.find("img"),aM.find("img")]);if(aY>0&&!!document.addEventListener){H.css("fontSize",Math.max(Math.min((c/aj.width)||1,1)*10,4))}if(aY==2){var f=Math.max((c/aj.width),1)-1;aU.each(function(){aF(this).css("marginTop",-aj.height*f/2)})}if(aY==3){var aZ=window.innerHeight-(H.offset().top||0),aW=aj.width/aj.height,aX=aW>c/aZ;H.css("height",aZ);aU.each(function(){aF(this).css({width:aX?"auto":"100%",height:aX?"100%":"auto",marginLeft:aX?((c-aZ*aW)/2):0,marginTop:aX?0:((aZ-c/aW)/2)})})}if(aY==4){var aV=window.innerWidth,k=window.innerHeight,aW=(H.width()||aj.width)/(H.height()||aj.height);H.css({maxWidth:aW>aV/k?"100%":(aW*k),height:""});aU.each(function(){aF(this).css({width:"100%",marginLeft:0,marginTop:0})})}else{H.css({maxWidth:"",top:""})}}if(aj.responsive){aF(aP);aF(window).on("load resize",aP)}return this};jQuery.extend(jQuery.easing,{easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeOutElastic1:function(k,l,i,h,g){var f=Math.PI/2;var m=1.70158;var e=0;var j=h;if(l==0){return i}if((l/=g)==1){return i+h}if(!e){e=g*0.3}if(j<Math.abs(h)){j=h;var m=e/4}else{var m=e/f*Math.asin(h/j)}return j*Math.pow(2,-10*l)*Math.sin((l*g-m)*f/e)+h+i},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a}});jQuery.fn.wowSlider.support={transform:(function(){if(!window.getComputedStyle){return false}var b=document.createElement("div");document.body.insertBefore(b,document.body.lastChild);b.style.transform="matrix3d(1,0,0,0,0,1,0,0,0,0,1,0,0,0,0,1)";var a=window.getComputedStyle(b).getPropertyValue("transform");b.parentNode.removeChild(b);if(a!==undefined){return a!=="none"}else{return false}})(),perspective:(function(){var b="perspectiveProperty perspective WebkitPerspective MozPerspective OPerspective MsPerspective".split(" ");for(var a=0;a<b.length;a++){if(document.body.style[b[a]]!==undefined){return !!b[a]}}return false})(),transition:(function(){var a=document.body||document.documentElement,b=a.style;return b.transition!==undefined||b.WebkitTransition!==undefined||b.MozTransition!==undefined||b.MsTransition!==undefined||b.OTransition!==undefined})()};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by $AppName$ $AppVersion$
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
(function(a){function b(l,m,n,f,h,j,o){if(typeof l==="undefined"){return}if(!l.jquery&&typeof l!=="function"){m=l.from;n=l.to;f=l.duration;h=l.delay;j=l.easing;o=l.callback;l=l.each||l.obj}var k="num";if(l.jquery){k="obj"}if(typeof l==="undefined"||typeof m==="undefined"||typeof n==="undefined"){return}if(typeof h==="function"){o=h;h=0}if(typeof j==="function"){o=j;j=0}if(typeof h==="string"){j=h;h=0}f=f||0;h=h||0;j=j||0;o=o||0;function i(s){var t=new Date().getTime()+h;var r=function(){var v=new Date().getTime()-t;if(v<0){v=0}var u=f?(v/f):1;if(u<1){s(u);requestAnimationFrame(r)}else{q(1)}};r();function q(u){cancelAnimationFrame(u);s(1);if(o){o()}}return{stop:q}}function g(s,r,q){return s+(r-s)*q}function e(q,r){if(r=="linear"){return q}if(r=="swing"){return a.easing[r]?a.easing[r](q):q}return a.easing[r]?a.easing[r](1,q,0,1,1,1):q}var c={opacity:0,top:"px",left:"px",right:"px",bottom:"px",width:"px",height:"px",translate:"px",rotate:"deg",rotateX:"deg",rotateY:"deg",scale:0};function p(x,w,v,r){if(typeof w==="object"){var q={};for(var t in w){q[t]=p(x,w[t],v[t],r)}return q}else{var s=["px","%","in","cm","mm","pt","pc","em","ex","ch","rem","vh","vw","vmin","vmax","deg","rad","grad","turn"];var u="";if(typeof w==="string"){u=w}else{if(typeof v==="string"){u=v}}u=(function(A,z,B){for(var y in z){if(A.indexOf(z[y])>-1){return z[y]}}if(c[B]){return c[B]}return""}(u,s,x));w=parseFloat(w);v=parseFloat(v);return g(w,v,r)+u}}var d=i(function(r){r=e(r,j);if(k==="num"){var q=g(m,n,r);l(q)}else{var q={transform:""};for(var s in m){if(typeof c[s]!=="undefined"){var t=p(s,m[s],n[s],r);switch(s){case"translate":q.transform+=" translate3d("+t[0]+","+t[1]+","+t[2]+")";break;case"rotate":q.transform+=" rotate("+t+")";break;case"rotateX":q.transform+=" rotateX("+t+")";break;case"rotateY":q.transform+=" rotateY("+t+")";break;case"scale":if(typeof t==="object"){q.transform+=" scale("+t[0]+", "+t[1]+")"}else{q.transform+=" scale("+t+")"}break;default:q[s]=t}}}if(q.transform===""){delete q.transform}l.css(q)}});return d}window.wowAnimate=b}(jQuery));if(!Date.now){Date.now=function(){return new Date().getTime()}}(function(){var d=["webkit","moz"];for(var b=0;b<d.length&&!window.requestAnimationFrame;++b){var a=d[b];window.requestAnimationFrame=window[a+"RequestAnimationFrame"];window.cancelAnimationFrame=(window[a+"CancelAnimationFrame"]||window[a+"CancelRequestAnimationFrame"])}if(/iP(ad|hone|od).*OS 6/.test(window.navigator.userAgent)||!window.requestAnimationFrame||!window.cancelAnimationFrame){var c=0;window.requestAnimationFrame=function(g){var f=Date.now();var e=Math.max(c+16,f);return setTimeout(function(){g(c=e)},e-f)};window.cancelAnimationFrame=clearTimeout}}());// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Generated by $AppName$ $AppVersion$
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
function ws_caption_parallax(d,c,h,f,g,b){var e=jQuery;c.parent().css({position:"absolute",top:0,left:0,width:"100%",height:"100%",overflow:"hidden"});c.html(f).css("width","100%").stop(1,1);h.html(g).css("width","100%").stop(1,1);(function a(n,j,v,r,s,w){var p=15;var m=d.$this.width();p*=m/100;function q(z,A){return z.css(d.support.transform?{transform:"translate3d("+A+"px,0px,0px)"}:{marginLeft:A}).css("display","inline-block")}if(d.prevIdx==d.curIdx){q(n,0).fadeIn(s/3);q(e(">div,>span",n),0)}else{var l=e(">div",n);var y=e(">div",j);var o=e(">span",n);var i=e(">span",j);var u=p+m*(w?-1:1),x=p+m*(w?1:-1),t=(w?-1:1)*p;q(n,u).show();q(j,0).show();q(l,t);q(y,0);q(o,2*t);q(i,0);wowAnimate(function(z){z=e.easing.swing(z);q(n,(1-z)*u);q(j,z*x)},0,1,d.duration);var k=0.8;wowAnimate(function(z){z*=k;q(o,(1-z)*2*t);q(l,(1-z)*t);q(i,z*(-2*t));q(y,z*(-t))},0,1,d.duration,function(){i.css("opacity",0);y.css("opacity",0);wowAnimate(function(z){z=e.easing.easeOutCubic(1,z,0,1,1,1);var A=(1-k)*2*t,C=(1-k)*t,B=k*(-2*t),D=k*(-t);q(o,(1-z)*A);q(l,(1-z)*C);q(i,(1-z)*B+z*(-2*t));q(y,(1-z)*D+z*(-t))},0,1,(/Firefox/g.test(navigator.userAgent)?1500:d.delay))})}}(c,h,f,g,d.captionDuration,b))};