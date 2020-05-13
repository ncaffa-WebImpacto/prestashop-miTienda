/**
*  @author    ThemeDelights
*  @copyright 2015-2019 ThemeDelights. All Rights Reserved.
*  @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
/*!
 * Bootstrap Colorpicker v2.3.6
 * https://itsjavi.com/bootstrap-colorpicker/ */
!function(a){"use strict";"object"==typeof exports?module.exports=a(window.jQuery):"function"==typeof define&&define.amd?define(["jquery"],a):window.jQuery&&!window.jQuery.fn.colorpicker&&a(window.jQuery)}(function(a){"use strict";var b=function(b,c){this.value={h:0,s:0,b:0,a:1},this.origFormat=null,c&&a.extend(this.colors,c),b&&(void 0!==b.toLowerCase?(b+="",this.setColor(b)):void 0!==b.h&&(this.value=b))};b.prototype={constructor:b,colors:{aliceblue:"#f0f8ff",antiquewhite:"#faebd7",aqua:"#00ffff",aquamarine:"#7fffd4",azure:"#f0ffff",beige:"#f5f5dc",bisque:"#ffe4c4",black:"#000000",blanchedalmond:"#ffebcd",blue:"#0000ff",blueviolet:"#8a2be2",brown:"#a52a2a",burlywood:"#deb887",cadetblue:"#5f9ea0",chartreuse:"#7fff00",chocolate:"#d2691e",coral:"#ff7f50",cornflowerblue:"#6495ed",cornsilk:"#fff8dc",crimson:"#dc143c",cyan:"#00ffff",darkblue:"#00008b",darkcyan:"#008b8b",darkgoldenrod:"#b8860b",darkgray:"#a9a9a9",darkgreen:"#006400",darkkhaki:"#bdb76b",darkmagenta:"#8b008b",darkolivegreen:"#556b2f",darkorange:"#ff8c00",darkorchid:"#9932cc",darkred:"#8b0000",darksalmon:"#e9967a",darkseagreen:"#8fbc8f",darkslateblue:"#483d8b",darkslategray:"#2f4f4f",darkturquoise:"#00ced1",darkviolet:"#9400d3",deeppink:"#ff1493",deepskyblue:"#00bfff",dimgray:"#696969",dodgerblue:"#1e90ff",firebrick:"#b22222",floralwhite:"#fffaf0",forestgreen:"#228b22",fuchsia:"#ff00ff",gainsboro:"#dcdcdc",ghostwhite:"#f8f8ff",gold:"#ffd700",goldenrod:"#daa520",gray:"#808080",green:"#008000",greenyellow:"#adff2f",honeydew:"#f0fff0",hotpink:"#ff69b4",indianred:"#cd5c5c",indigo:"#4b0082",ivory:"#fffff0",khaki:"#f0e68c",lavender:"#e6e6fa",lavenderblush:"#fff0f5",lawngreen:"#7cfc00",lemonchiffon:"#fffacd",lightblue:"#add8e6",lightcoral:"#f08080",lightcyan:"#e0ffff",lightgoldenrodyellow:"#fafad2",lightgrey:"#d3d3d3",lightgreen:"#90ee90",lightpink:"#ffb6c1",lightsalmon:"#ffa07a",lightseagreen:"#20b2aa",lightskyblue:"#87cefa",lightslategray:"#778899",lightsteelblue:"#b0c4de",lightyellow:"#ffffe0",lime:"#00ff00",limegreen:"#32cd32",linen:"#faf0e6",magenta:"#ff00ff",maroon:"#800000",mediumaquamarine:"#66cdaa",mediumblue:"#0000cd",mediumorchid:"#ba55d3",mediumpurple:"#9370d8",mediumseagreen:"#3cb371",mediumslateblue:"#7b68ee",mediumspringgreen:"#00fa9a",mediumturquoise:"#48d1cc",mediumvioletred:"#c71585",midnightblue:"#191970",mintcream:"#f5fffa",mistyrose:"#ffe4e1",moccasin:"#ffe4b5",navajowhite:"#ffdead",navy:"#000080",oldlace:"#fdf5e6",olive:"#808000",olivedrab:"#6b8e23",orange:"#ffa500",orangered:"#ff4500",orchid:"#da70d6",palegoldenrod:"#eee8aa",palegreen:"#98fb98",paleturquoise:"#afeeee",palevioletred:"#d87093",papayawhip:"#ffefd5",peachpuff:"#ffdab9",peru:"#cd853f",pink:"#ffc0cb",plum:"#dda0dd",powderblue:"#b0e0e6",purple:"#800080",red:"#ff0000",rosybrown:"#bc8f8f",royalblue:"#4169e1",saddlebrown:"#8b4513",salmon:"#fa8072",sandybrown:"#f4a460",seagreen:"#2e8b57",seashell:"#fff5ee",sienna:"#a0522d",silver:"#c0c0c0",skyblue:"#87ceeb",slateblue:"#6a5acd",slategray:"#708090",snow:"#fffafa",springgreen:"#00ff7f",steelblue:"#4682b4",tan:"#d2b48c",teal:"#008080",thistle:"#d8bfd8",tomato:"#ff6347",turquoise:"#40e0d0",violet:"#ee82ee",wheat:"#f5deb3",white:"#ffffff",whitesmoke:"#f5f5f5",yellow:"#ffff00",yellowgreen:"#9acd32",transparent:"transparent"},_sanitizeNumber:function _sanitizeNumber(a){return"number"==typeof a?a:isNaN(a)||null===a||""===a||void 0===a?1:""===a?0:void 0!==a.toLowerCase?(a.match(/^\./)&&(a="0"+a),Math.ceil(100*parseFloat(a))/100):1},isTransparent:function isTransparent(a){return!!a&&(a=a.toLowerCase().trim(),"transparent"===a||a.match(/#?00000000/)||a.match(/(rgba|hsla)\(0,0,0,0?\.?0\)/))},rgbaIsTransparent:function rgbaIsTransparent(a){return 0===a.r&&0===a.g&&0===a.b&&0===a.a},setColor:function setColor(a){a=a.toLowerCase().trim(),a&&(this.isTransparent(a)?this.value={h:0,s:0,b:0,a:0}:this.value=this.stringToHSB(a)||{h:0,s:0,b:0,a:1})},stringToHSB:function stringToHSB(b){b=b.toLowerCase();var c;"undefined"!=typeof this.colors[b]&&(b=this.colors[b],c="alias");var d=this,e=!1;return a.each(this.stringParsers,function(a,f){var g=f.re.exec(b),h=g&&f.parse.apply(d,[g]),i=c||f.format||"rgba";return!h||(e=i.match(/hsla?/)?d.RGBtoHSB.apply(d,d.HSLtoRGB.apply(d,h)):d.RGBtoHSB.apply(d,h),d.origFormat=i,!1)}),e},setHue:function setHue(a){this.value.h=1-a},setSaturation:function setSaturation(a){this.value.s=a},setBrightness:function setBrightness(a){this.value.b=1-a},setAlpha:function setAlpha(a){this.value.a=Math.round(parseInt(100*(1-a),10)/100*100)/100},toRGB:function toRGB(a,b,c,d){a||(a=this.value.h,b=this.value.s,c=this.value.b),a*=360;var e,f,g,h,i;return a=a%360/60,i=c*b,h=i*(1-Math.abs(a%2-1)),e=f=g=c-i,a=~~a,e+=[i,h,0,0,h,i][a],f+=[h,i,i,h,0,0][a],g+=[0,0,h,i,i,h][a],{r:Math.round(255*e),g:Math.round(255*f),b:Math.round(255*g),a:d||this.value.a}},toHex:function toHex(a,b,c,d){var e=this.toRGB(a,b,c,d);return this.rgbaIsTransparent(e)?"transparent":"#"+(1<<24|parseInt(e.r)<<16|parseInt(e.g)<<8|parseInt(e.b)).toString(16).substr(1)},toHSL:function toHSL(a,b,c,d){a=a||this.value.h,b=b||this.value.s,c=c||this.value.b,d=d||this.value.a;var e=a,f=(2-b)*c,g=b*c;return g/=f>0&&f<=1?f:2-f,f/=2,g>1&&(g=1),{h:isNaN(e)?0:e,s:isNaN(g)?0:g,l:isNaN(f)?0:f,a:isNaN(d)?0:d}},toAlias:function toAlias(a,b,c,d){var e=this.toHex(a,b,c,d);for(var f in this.colors)if(this.colors[f]===e)return f;return!1},RGBtoHSB:function RGBtoHSB(a,b,c,d){a/=255,b/=255,c/=255;var e,f,g,h;return g=Math.max(a,b,c),h=g-Math.min(a,b,c),e=0===h?null:g===a?(b-c)/h:g===b?(c-a)/h+2:(a-b)/h+4,e=(e+360)%6*60/360,f=0===h?0:h/g,{h:this._sanitizeNumber(e),s:f,b:g,a:this._sanitizeNumber(d)}},HueToRGB:function HueToRGB(a,b,c){return c<0?c+=1:c>1&&(c-=1),6*c<1?a+(b-a)*c*6:2*c<1?b:3*c<2?a+(b-a)*(2/3-c)*6:a},HSLtoRGB:function HSLtoRGB(a,b,c,d){b<0&&(b=0);var e;e=c<=.5?c*(1+b):c+b-c*b;var f=2*c-e,g=a+1/3,h=a,i=a-1/3,j=Math.round(255*this.HueToRGB(f,e,g)),k=Math.round(255*this.HueToRGB(f,e,h)),l=Math.round(255*this.HueToRGB(f,e,i));return[j,k,l,this._sanitizeNumber(d)]},toString:function toString(a){a=a||"rgba";var b=!1;switch(a){case"rgb":return b=this.toRGB(),this.rgbaIsTransparent(b)?"transparent":"rgb("+b.r+","+b.g+","+b.b+")";case"rgba":return b=this.toRGB(),"rgba("+b.r+","+b.g+","+b.b+","+b.a+")";case"hsl":return b=this.toHSL(),"hsl("+Math.round(360*b.h)+","+Math.round(100*b.s)+"%,"+Math.round(100*b.l)+"%)";case"hsla":return b=this.toHSL(),"hsla("+Math.round(360*b.h)+","+Math.round(100*b.s)+"%,"+Math.round(100*b.l)+"%,"+b.a+")";case"hex":return this.toHex();case"alias":return this.toAlias()||this.toHex();default:return b}},stringParsers:[{re:/rgb\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*?\)/,format:"rgb",parse:function parse(a){return[a[1],a[2],a[3],1]}},{re:/rgb\(\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*?\)/,format:"rgb",parse:function parse(a){return[2.55*a[1],2.55*a[2],2.55*a[3],1]}},{re:/rgba\(\s*(\d{1,3})\s*,\s*(\d{1,3})\s*,\s*(\d{1,3})\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,format:"rgba",parse:function parse(a){return[a[1],a[2],a[3],a[4]]}},{re:/rgba\(\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,format:"rgba",parse:function parse(a){return[2.55*a[1],2.55*a[2],2.55*a[3],a[4]]}},{re:/hsl\(\s*(\d*(?:\.\d+)?)\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*?\)/,format:"hsl",parse:function parse(a){return[a[1]/360,a[2]/100,a[3]/100,a[4]]}},{re:/hsla\(\s*(\d*(?:\.\d+)?)\s*,\s*(\d*(?:\.\d+)?)\%\s*,\s*(\d*(?:\.\d+)?)\%\s*(?:,\s*(\d*(?:\.\d+)?)\s*)?\)/,format:"hsla",parse:function parse(a){return[a[1]/360,a[2]/100,a[3]/100,a[4]]}},{re:/#?([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/,format:"hex",parse:function parse(a){return[parseInt(a[1],16),parseInt(a[2],16),parseInt(a[3],16),1]}},{re:/#?([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/,format:"hex",parse:function(a){return[parseInt(a[1]+a[1],16),parseInt(a[2]+a[2],16),parseInt(a[3]+a[3],16),1]}}],colorNameToHex:function colorNameToHex(a){return"undefined"!=typeof this.colors[a.toLowerCase()]&&this.colors[a.toLowerCase()]}};var c={horizontal:!1,inline:!1,color:!1,format:!1,input:"input",container:!1,component:".add-on, .input-group-addon",sliders:{saturation:{maxLeft:100,maxTop:100,callLeft:"setSaturation",callTop:"setBrightness"},hue:{maxLeft:0,maxTop:100,callLeft:!1,callTop:"setHue"},alpha:{maxLeft:0,maxTop:100,callLeft:!1,callTop:"setAlpha"}},slidersHorz:{saturation:{maxLeft:100,maxTop:100,callLeft:"setSaturation",callTop:"setBrightness"},hue:{maxLeft:100,maxTop:0,callLeft:"setHue",callTop:!1},alpha:{maxLeft:100,maxTop:0,callLeft:"setAlpha",callTop:!1}},template:'<div class="colorpicker dropdown-menu"><div class="colorpicker-saturation"><i><b></b></i></div><div class="colorpicker-hue"><i></i></div><div class="colorpicker-alpha"><i></i></div><div class="colorpicker-color"><div /></div><div class="colorpicker-selectors"></div></div>',align:"right",customClass:null,colorSelectors:null},d=function(d,e){if(this.element=a(d).addClass("colorpicker-element"),this.options=a.extend(!0,{},c,this.element.data(),e),this.component=this.options.component,this.component=this.component!==!1&&this.element.find(this.component),this.component&&0===this.component.length&&(this.component=!1),this.container=this.options.container===!0?this.element:this.options.container,this.container=this.container!==!1&&a(this.container),this.input=this.element.is("input")?this.element:!!this.options.input&&this.element.find(this.options.input),this.input&&0===this.input.length&&(this.input=!1),this.color=new b(this.options.color!==!1?this.options.color:this.getValue(),this.options.colorSelectors),this.format=this.options.format!==!1?this.options.format:this.color.origFormat,this.options.color!==!1&&(this.updateInput(this.color),this.updateData(this.color)),this.picker=a(this.options.template),this.options.customClass&&this.picker.addClass(this.options.customClass),this.options.inline?this.picker.addClass("colorpicker-inline colorpicker-visible"):this.picker.addClass("colorpicker-hidden"),this.options.horizontal&&this.picker.addClass("colorpicker-horizontal"),"rgba"!==this.format&&"hsla"!==this.format&&this.options.format!==!1||this.picker.addClass("colorpicker-with-alpha"),"right"===this.options.align&&this.picker.addClass("colorpicker-right"),this.options.inline===!0&&this.picker.addClass("colorpicker-no-arrow"),this.options.colorSelectors){var f=this;a.each(this.options.colorSelectors,function(b,c){var d=a("<i />").css("background-color",c).data("class",b);d.click(function(){f.setValue(a(this).css("background-color"))}),f.picker.find(".colorpicker-selectors").append(d)}),this.picker.find(".colorpicker-selectors").show()}this.picker.on("mousedown.colorpicker touchstart.colorpicker",a.proxy(this.mousedown,this)),this.picker.appendTo(this.container?this.container:a("body")),this.input!==!1&&(this.input.on({"keyup.colorpicker":a.proxy(this.keyup,this)}),this.input.on({"change.colorpicker":a.proxy(this.change,this)}),this.component===!1&&this.element.on({"focus.colorpicker":a.proxy(this.show,this)}),this.options.inline===!1&&this.element.on({"focusout.colorpicker":a.proxy(this.hide,this)})),this.component!==!1&&this.component.on({"click.colorpicker":a.proxy(this.show,this)}),this.input===!1&&this.component===!1&&this.element.on({"click.colorpicker":a.proxy(this.show,this)}),this.input!==!1&&this.component!==!1&&"color"===this.input.attr("type")&&this.input.on({"click.colorpicker":a.proxy(this.show,this),"focus.colorpicker":a.proxy(this.show,this)}),this.update(),a(a.proxy(function(){this.element.trigger("create")},this))};d.Color=b,d.prototype={constructor:d,destroy:function destroy(){this.picker.remove(),this.element.removeData("colorpicker","color").off(".colorpicker"),this.input!==!1&&this.input.off(".colorpicker"),this.component!==!1&&this.component.off(".colorpicker"),this.element.removeClass("colorpicker-element"),this.element.trigger({type:"destroy"})},reposition:function reposition(){if(this.options.inline!==!1||this.options.container)return!1;var a=this.container&&this.container[0]!==document.body?"position":"offset",b=this.component||this.element,c=b[a]();"right"===this.options.align&&(c.left-=this.picker.outerWidth()-b.outerWidth()),this.picker.css({top:c.top+b.outerHeight(),left:c.left})},show:function showPicker(b){return!this.isDisabled()&&(this.picker.addClass("colorpicker-visible").removeClass("colorpicker-hidden"),this.reposition(),a(window).on("resize.colorpicker",a.proxy(this.reposition,this)),!b||this.hasInput()&&"color"!==this.input.attr("type")||b.stopPropagation&&b.preventDefault&&(b.stopPropagation(),b.preventDefault()),!this.component&&this.input||this.options.inline!==!1||a(window.document).on({"mousedown.colorpicker":a.proxy(this.hide,this)}),void this.element.trigger({type:"showPicker",color:this.color}))},hide:function hide(){this.picker.addClass("colorpicker-hidden").removeClass("colorpicker-visible"),a(window).off("resize.colorpicker",this.reposition),a(document).off({"mousedown.colorpicker":this.hide}),this.update(),this.element.trigger({type:"hidePicker",color:this.color})},updateData:function updateData(a){return a=a||this.color.toString(this.format),this.element.data("color",a),a},updateInput:function updateInput(a){if(a=a||this.color.toString(this.format),this.input!==!1){if(this.options.colorSelectors){var c=new b(a,this.options.colorSelectors),d=c.toAlias();"undefined"!=typeof this.options.colorSelectors[d]&&(a=d)}this.input.prop("value",a)}return a},updatePicker:function updatePicker(a){void 0!==a&&(this.color=new b(a,this.options.colorSelectors));var c=this.options.horizontal===!1?this.options.sliders:this.options.slidersHorz,d=this.picker.find("i");if(0!==d.length)return this.options.horizontal===!1?(c=this.options.sliders,d.eq(1).css("top",c.hue.maxTop*(1-this.color.value.h)).end().eq(2).css("top",c.alpha.maxTop*(1-this.color.value.a))):(c=this.options.slidersHorz,d.eq(1).css("left",c.hue.maxLeft*(1-this.color.value.h)).end().eq(2).css("left",c.alpha.maxLeft*(1-this.color.value.a))),d.eq(0).css({top:c.saturation.maxTop-this.color.value.b*c.saturation.maxTop,left:this.color.value.s*c.saturation.maxLeft}),this.picker.find(".colorpicker-saturation").css("backgroundColor",this.color.toHex(this.color.value.h,1,1,1)),this.picker.find(".colorpicker-alpha").css("backgroundColor",this.color.toHex()),this.picker.find(".colorpicker-color, .colorpicker-color div").css("backgroundColor",this.color.toString(this.format)),a},updateComponent:function updateComponent(a){if(a=a||this.color.toString(this.format),this.component!==!1){var b=this.component.find("i").eq(0);b.length>0?b.css({backgroundColor:a}):this.component.css({backgroundColor:a})}return a},update:function update(a){var b;return this.getValue(!1)===!1&&a!==!0||(b=this.updateComponent(),this.updateInput(b),this.updateData(b),this.updatePicker()),b},setValue:function setValue(a){this.color=new b(a,this.options.colorSelectors),this.update(!0),this.element.trigger({type:"changeColor",color:this.color,value:a})},getValue:function getValue(a){a=void 0===a?"#000000":a;var b;return b=this.hasInput()?this.input.val():this.element.data("color"),void 0!==b&&""!==b&&null!==b||(b=a),b},hasInput:function hasInput(){return this.input!==!1},isDisabled:function isDisabled(){return!!this.hasInput()&&this.input.prop("disabled")===!0},disable:function disable(){return!!this.hasInput()&&(this.input.prop("disabled",!0),this.element.trigger({type:"disable",color:this.color,value:this.getValue()}),!0)},enable:function enable(){return!!this.hasInput()&&(this.input.prop("disabled",!1),this.element.trigger({type:"enable",color:this.color,value:this.getValue()}),!0)},currentSlider:null,mousePointer:{left:0,top:0},mousedown:function mousedown(b){!b.pageX&&!b.pageY&&b.originalEvent&&b.originalEvent.touches&&(b.pageX=b.originalEvent.touches[0].pageX,b.pageY=b.originalEvent.touches[0].pageY),b.stopPropagation(),b.preventDefault();var c=a(b.target),d=c.closest("div"),e=this.options.horizontal?this.options.slidersHorz:this.options.sliders;if(!d.is(".colorpicker")){if(d.is(".colorpicker-saturation"))this.currentSlider=a.extend({},e.saturation);else if(d.is(".colorpicker-hue"))this.currentSlider=a.extend({},e.hue);else{if(!d.is(".colorpicker-alpha"))return!1;this.currentSlider=a.extend({},e.alpha)}var f=d.offset();this.currentSlider.guide=d.find("i")[0].style,this.currentSlider.left=b.pageX-f.left,this.currentSlider.top=b.pageY-f.top,this.mousePointer={left:b.pageX,top:b.pageY},a(document).on({"mousemove.colorpicker":a.proxy(this.mousemove,this),"touchmove.colorpicker":a.proxy(this.mousemove,this),"mouseup.colorpicker":a.proxy(this.mouseup,this),"touchend.colorpicker":a.proxy(this.mouseup,this)}).trigger("mousemove")}return!1},mousemove:function mousemove(a){!a.pageX&&!a.pageY&&a.originalEvent&&a.originalEvent.touches&&(a.pageX=a.originalEvent.touches[0].pageX,a.pageY=a.originalEvent.touches[0].pageY),a.stopPropagation(),a.preventDefault();var b=Math.max(0,Math.min(this.currentSlider.maxLeft,this.currentSlider.left+((a.pageX||this.mousePointer.left)-this.mousePointer.left))),c=Math.max(0,Math.min(this.currentSlider.maxTop,this.currentSlider.top+((a.pageY||this.mousePointer.top)-this.mousePointer.top)));return this.currentSlider.guide.left=b+"px",this.currentSlider.guide.top=c+"px",this.currentSlider.callLeft&&this.color[this.currentSlider.callLeft].call(this.color,b/this.currentSlider.maxLeft),this.currentSlider.callTop&&this.color[this.currentSlider.callTop].call(this.color,c/this.currentSlider.maxTop),"setAlpha"===this.currentSlider.callTop&&this.options.format===!1&&(1!==this.color.value.a?(this.format="rgba",this.color.origFormat="rgba"):(this.format="hex",this.color.origFormat="hex")),this.update(!0),this.element.trigger({type:"changeColor",color:this.color}),!1},mouseup:function mouseup(b){return b.stopPropagation(),b.preventDefault(),a(document).off({"mousemove.colorpicker":this.mousemove,"touchmove.colorpicker":this.mousemove,"mouseup.colorpicker":this.mouseup,"touchend.colorpicker":this.mouseup}),!1},change:function change(a){this.keyup(a)},keyup:function keyup(a){38===a.keyCode?(this.color.value.a<1&&(this.color.value.a=Math.round(100*(this.color.value.a+.01))/100),this.update(!0)):40===a.keyCode?(this.color.value.a>0&&(this.color.value.a=Math.round(100*(this.color.value.a-.01))/100),this.update(!0)):(this.color=new b(this.input.val(),this.options.colorSelectors),this.color.origFormat&&this.options.format===!1&&(this.format=this.color.origFormat),this.getValue(!1)!==!1&&(this.updateData(),this.updateComponent(),this.updatePicker())),this.element.trigger({type:"changeColor",color:this.color,value:this.input.val()})}},a.colorpicker=d,a.fn.colorpicker=function(b){var c=Array.prototype.slice.call(arguments,1),e=1===this.length,f=null,g=this.each(function(){var e=a(this),g=e.data("colorpicker"),h="object"==typeof b?b:{};g||(g=new d(this,h),e.data("colorpicker",g)),"string"==typeof b?a.isFunction(g[b])?f=g[b].apply(g,c):(c.length&&(g[b]=c[0]),f=g[b]):f=e});return e?f:g},a.fn.colorpicker.constructor=d});
/*! codeflask.min.js - v0.1.1 */
function CodeFlask(){}CodeFlask.prototype.run=function(e,t){var n=document.querySelectorAll(e);if(n.length>1)throw"CodeFlask.js ERROR: run() expects only one element, "+n.length+" given. Use .runAll() instead.";this.scaffold(n[0],!1,t)},CodeFlask.prototype.runAll=function(e,t){this.update=null,this.onUpdate=null;var n,a=document.querySelectorAll(e);for(n=0;n<a.length;n++)this.scaffold(a[n],!0,t)},CodeFlask.prototype.scaffold=function(e,t,n){var a=document.createElement("TEXTAREA"),l=document.createElement("PRE"),o=document.createElement("CODE"),i=e.textContent;1==!n.enableAutocorrect&&(a.setAttribute("spellcheck","false"),a.setAttribute("name",e.id),a.setAttribute("autocapitalize","off"),a.setAttribute("autocomplete","off"),a.setAttribute("autocorrect","off")),n.language=this.handleLanguage(n.language),this.defaultLanguage=e.dataset.language||n.language||"markup",t||(this.textarea=a,this.highlightCode=o),e.classList.add("CodeFlask"),a.classList.add("CodeFlask__textarea"),l.classList.add("CodeFlask__pre"),o.classList.add("CodeFlask__code"),o.classList.add("language-"+this.defaultLanguage),/iPad|iPhone|iPod/.test(navigator.platform)&&(o.style.paddingLeft="3px"),e.innerHTML="",e.appendChild(a),e.appendChild(l),l.appendChild(o),a.value=i,this.renderOutput(o,a),Prism.highlightAll(),this.handleInput(a,o,l),this.handleScroll(a,l)},CodeFlask.prototype.renderOutput=function(e,t){e.innerHTML=t.value.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;")+"\n"},CodeFlask.prototype.handleInput=function(e,t,n){var a,l,o,i=this;e.addEventListener("input",function(e){a=this,i.renderOutput(t,a),Prism.highlightAll()}),e.addEventListener("keydown",function(e){a=this,l=a.selectionStart,o=a.value,9===e.keyCode&&(a.value=o.substring(0,l)+"    "+o.substring(l,a.value.length),a.selectionStart=l+4,a.selectionEnd=l+4,e.preventDefault(),t.innerHTML=a.value.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;")+"\n",Prism.highlightAll())})},CodeFlask.prototype.handleScroll=function(e,t){e.addEventListener("scroll",function(){roundedScroll=Math.floor(this.scrollTop),navigator.userAgent.toLowerCase().indexOf("firefox")<0&&(this.scrollTop=roundedScroll),t.style.top="-"+roundedScroll+"px"})},CodeFlask.prototype.handleLanguage=function(e){return e.match(/html|xml|xhtml|svg/)?"markup":e.match(/js/)?"javascript":e},CodeFlask.prototype.onUpdate=function(e){if("function"!=typeof e)throw"CodeFlask.js ERROR: onUpdate() expects function, "+typeof e+" given instead.";this.textarea.addEventListener("input",function(t){e(this.value)})},CodeFlask.prototype.update=function(e){var t=document.createEvent("HTMLEvents");this.textarea.value=e,this.renderOutput(this.highlightCode,this.textarea),Prism.highlightAll(),t.initEvent("input",!1,!0),this.textarea.dispatchEvent(t)};
/* PrismJS 1.15.0 - https://prismjs.com/download.html#themes=prism&languages=css+clike+javascript */
var _self="undefined"!=typeof window?window:"undefined"!=typeof WorkerGlobalScope&&self instanceof WorkerGlobalScope?self:{},Prism=function(){var e=/\blang(?:uage)?-([\w-]+)\b/i,t=0,n=_self.Prism={manual:_self.Prism&&_self.Prism.manual,disableWorkerMessageHandler:_self.Prism&&_self.Prism.disableWorkerMessageHandler,util:{encode:function encode(e){return e instanceof r?new r(e.type,n.util.encode(e.content),e.alias):"Array"===n.util.type(e)?e.map(n.util.encode):e.replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/\u00a0/g," ")},type:function type(e){return Object.prototype.toString.call(e).match(/\[object (\w+)\]/)[1]},objId:function objId(e){return e.__id||Object.defineProperty(e,"__id",{value:++t}),e.__id},clone:function clone(e,t){var r=n.util.type(e);switch(t=t||{},r){case"Object":if(t[n.util.objId(e)])return t[n.util.objId(e)];var a={};t[n.util.objId(e)]=a;for(var l in e)e.hasOwnProperty(l)&&(a[l]=n.util.clone(e[l],t));return a;case"Array":if(t[n.util.objId(e)])return t[n.util.objId(e)];var a=[];return t[n.util.objId(e)]=a,e.forEach(function(e,r){a[r]=n.util.clone(e,t)}),a}return e}},languages:{extend:function extend(e,t){var r=n.util.clone(n.languages[e]);for(var a in t)r[a]=t[a];return r},insertBefore:function insertBefore(e,t,r,a){a=a||n.languages;var l=a[e];if(2==arguments.length){r=arguments[1];for(var i in r)r.hasOwnProperty(i)&&(l[i]=r[i]);return l}var o={};for(var s in l)if(l.hasOwnProperty(s)){if(s==t)for(var i in r)r.hasOwnProperty(i)&&(o[i]=r[i]);o[s]=l[s]}var u=a[e];return a[e]=o,n.languages.DFS(n.languages,function(t,n){n===u&&t!=e&&(this[t]=o)}),o},DFS:function DFS(e,t,r,a){a=a||{};for(var l in e)e.hasOwnProperty(l)&&(t.call(e,l,e[l],r||l),"Object"!==n.util.type(e[l])||a[n.util.objId(e[l])]?"Array"!==n.util.type(e[l])||a[n.util.objId(e[l])]||(a[n.util.objId(e[l])]=!0,n.languages.DFS(e[l],t,l,a)):(a[n.util.objId(e[l])]=!0,n.languages.DFS(e[l],t,null,a)))}},plugins:{},highlightAll:function highlightAll(e,t){n.highlightAllUnder(document,e,t)},highlightAllUnder:function highlightAllUnder(e,t,r){var a={callback:r,selector:'code[class*="language-"], [class*="language-"] code, code[class*="lang-"], [class*="lang-"] code'};n.hooks.run("before-highlightall",a);for(var l,i=a.elements||e.querySelectorAll(a.selector),o=0;l=i[o++];)n.highlightElement(l,t===!0,a.callback)},highlightElement:function highlightElement(t,r,a){for(var l,i,o=t;o&&!e.test(o.className);)o=o.parentNode;o&&(l=(o.className.match(e)||[,""])[1].toLowerCase(),i=n.languages[l]),t.className=t.className.replace(e,"").replace(/\s+/g," ")+" language-"+l,t.parentNode&&(o=t.parentNode,/pre/i.test(o.nodeName)&&(o.className=o.className.replace(e,"").replace(/\s+/g," ")+" language-"+l));var s=t.textContent,u={element:t,language:l,grammar:i,code:s};if(n.hooks.run("before-sanity-check",u),!u.code||!u.grammar)return u.code&&(n.hooks.run("before-highlight",u),u.element.textContent=u.code,n.hooks.run("after-highlight",u)),n.hooks.run("complete",u),void 0;if(n.hooks.run("before-highlight",u),r&&_self.Worker){var g=new Worker(n.filename);g.onmessage=function(e){u.highlightedCode=e.data,n.hooks.run("before-insert",u),u.element.innerHTML=u.highlightedCode,a&&a.call(u.element),n.hooks.run("after-highlight",u),n.hooks.run("complete",u)},g.postMessage(JSON.stringify({language:u.language,code:u.code,immediateClose:!0}))}else u.highlightedCode=n.highlight(u.code,u.grammar,u.language),n.hooks.run("before-insert",u),u.element.innerHTML=u.highlightedCode,a&&a.call(t),n.hooks.run("after-highlight",u),n.hooks.run("complete",u)},highlight:function highlight(e,t,a){var l={code:e,grammar:t,language:a};return n.hooks.run("before-tokenize",l),l.tokens=n.tokenize(l.code,l.grammar),n.hooks.run("after-tokenize",l),r.stringify(n.util.encode(l.tokens),l.language)},matchGrammar:function matchGrammar(e,t,r,a,l,i,o){var s=n.Token;for(var u in r)if(r.hasOwnProperty(u)&&r[u]){if(u==o)return;var g=r[u];g="Array"===n.util.type(g)?g:[g];for(var c=0;c<g.length;++c){var h=g[c],f=h.inside,d=!!h.lookbehind,m=!!h.greedy,p=0,y=h.alias;if(m&&!h.pattern.global){var v=h.pattern.toString().match(/[imuy]*$/)[0];h.pattern=RegExp(h.pattern.source,v+"g")}h=h.pattern||h;for(var b=a,k=l;b<t.length;k+=t[b].length,++b){var w=t[b];if(t.length>e.length)return;if(!(w instanceof s)){if(m&&b!=t.length-1){h.lastIndex=k;var _=h.exec(e);if(!_)break;for(var j=_.index+(d?_[1].length:0),P=_.index+_[0].length,A=b,x=k,O=t.length;O>A&&(P>x||!t[A].type&&!t[A-1].greedy);++A)x+=t[A].length,j>=x&&(++b,k=x);if(t[b]instanceof s)continue;I=A-b,w=e.slice(k,x),_.index-=k}else{h.lastIndex=0;var _=h.exec(w),I=1}if(_){d&&(p=_[1]?_[1].length:0);var j=_.index+p,_=_[0].slice(p),P=j+_.length,N=w.slice(0,j),S=w.slice(P),C=[b,I];N&&(++b,k+=N.length,C.push(N));var E=new s(u,f?n.tokenize(_,f):_,y,_,m);if(C.push(E),S&&C.push(S),Array.prototype.splice.apply(t,C),1!=I&&n.matchGrammar(e,t,r,b,k,!0,u),i)break}else if(i)break}}}}},tokenize:function tokenize(e,t){var r=[e],a=t.rest;if(a){for(var l in a)t[l]=a[l];delete t.rest}return n.matchGrammar(e,r,t,0,0,!1),r},hooks:{all:{},add:function add(e,t){var r=n.hooks.all;r[e]=r[e]||[],r[e].push(t)},run:function run(e,t){var r=n.hooks.all[e];if(r&&r.length)for(var a,l=0;a=r[l++];)a(t)}}},r=n.Token=function(e,t,n,r,a){this.type=e,this.content=t,this.alias=n,this.length=0|(r||"").length,this.greedy=!!a};if(r.stringify=function(e,t,a){if("string"==typeof e)return e;if("Array"===n.util.type(e))return e.map(function(n){return r.stringify(n,t,e)}).join("");var l={type:e.type,content:r.stringify(e.content,t,a),tag:"span",classes:["token",e.type],attributes:{},language:t,parent:a};if(e.alias){var i="Array"===n.util.type(e.alias)?e.alias:[e.alias];Array.prototype.push.apply(l.classes,i)}n.hooks.run("wrap",l);var o=Object.keys(l.attributes).map(function(e){return e+'="'+(l.attributes[e]||"").replace(/"/g,"&quot;")+'"'}).join(" ");return"<"+l.tag+' class="'+l.classes.join(" ")+'"'+(o?" "+o:"")+">"+l.content+"</"+l.tag+">"},!_self.document)return _self.addEventListener?(n.disableWorkerMessageHandler||_self.addEventListener("message",function(e){var t=JSON.parse(e.data),r=t.language,a=t.code,l=t.immediateClose;_self.postMessage(n.highlight(a,n.languages[r],r)),l&&_self.close()},!1),_self.Prism):_self.Prism;var a=document.currentScript||[].slice.call(document.getElementsByTagName("script")).pop();return a&&(n.filename=a.src,n.manual||a.hasAttribute("data-manual")||("loading"!==document.readyState?window.requestAnimationFrame?window.requestAnimationFrame(n.highlightAll):window.setTimeout(n.highlightAll,16):document.addEventListener("DOMContentLoaded",n.highlightAll))),_self.Prism}();"undefined"!=typeof module&&module.exports&&(module.exports=Prism),"undefined"!=typeof global&&(global.Prism=Prism);
Prism.languages.css={comment:/\/\*[\s\S]*?\*\//,atrule:{pattern:/@[\w-]+?.*?(?:;|(?=\s*\{))/i,inside:{rule:/@[\w-]+/}},url:/url\((?:(["'])(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1|.*?)\)/i,selector:/[^{}\s][^{};]*?(?=\s*\{)/,string:{pattern:/("|')(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/,greedy:!0},property:/[-_a-z\xA0-\uFFFF][-\w\xA0-\uFFFF]*(?=\s*:)/i,important:/\B!important\b/i,"function":/[-a-z0-9]+(?=\()/i,punctuation:/[(){};:]/},Prism.languages.css.atrule.inside.rest=Prism.languages.css,Prism.languages.markup&&(Prism.languages.insertBefore("markup","tag",{style:{pattern:/(<style[\s\S]*?>)[\s\S]*?(?=<\/style>)/i,lookbehind:!0,inside:Prism.languages.css,alias:"language-css",greedy:!0}}),Prism.languages.insertBefore("inside","attr-value",{"style-attr":{pattern:/\s*style=("|')(?:\\[\s\S]|(?!\1)[^\\])*\1/i,inside:{"attr-name":{pattern:/^\s*style/i,inside:Prism.languages.markup.tag.inside},punctuation:/^\s*=\s*['"]|['"]\s*$/,"attr-value":{pattern:/.+/i,inside:Prism.languages.css}},alias:"language-css"}},Prism.languages.markup.tag));
Prism.languages.clike={comment:[{pattern:/(^|[^\\])\/\*[\s\S]*?(?:\*\/|$)/,lookbehind:!0},{pattern:/(^|[^\\:])\/\/.*/,lookbehind:!0,greedy:!0}],string:{pattern:/(["'])(?:\\(?:\r\n|[\s\S])|(?!\1)[^\\\r\n])*\1/,greedy:!0},"class-name":{pattern:/((?:\b(?:class|interface|extends|implements|trait|instanceof|new)\s+)|(?:catch\s+\())[\w.\\]+/i,lookbehind:!0,inside:{punctuation:/[.\\]/}},keyword:/\b(?:if|else|while|do|for|return|in|instanceof|function|new|try|throw|catch|finally|null|break|continue)\b/,"boolean":/\b(?:true|false)\b/,"function":/\w+(?=\()/,number:/\b0x[\da-f]+\b|(?:\b\d+\.?\d*|\B\.\d+)(?:e[+-]?\d+)?/i,operator:/--?|\+\+?|!=?=?|<=?|>=?|==?=?|&&?|\|\|?|\?|\*|\/|~|\^|%/,punctuation:/[{}[\];(),.:]/};
Prism.languages.javascript=Prism.languages.extend("clike",{"class-name":[Prism.languages.clike["class-name"],{pattern:/(^|[^$\w\xA0-\uFFFF])[_$A-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\.(?:prototype|constructor))/,lookbehind:!0}],keyword:[{pattern:/((?:^|})\s*)(?:catch|finally)\b/,lookbehind:!0},/\b(?:as|async|await|break|case|class|const|continue|debugger|default|delete|do|else|enum|export|extends|for|from|function|get|if|implements|import|in|instanceof|interface|let|new|null|of|package|private|protected|public|return|set|static|super|switch|this|throw|try|typeof|var|void|while|with|yield)\b/],number:/\b(?:(?:0[xX][\dA-Fa-f]+|0[bB][01]+|0[oO][0-7]+)n?|\d+n|NaN|Infinity)\b|(?:\b\d+\.?\d*|\B\.\d+)(?:[Ee][+-]?\d+)?/,"function":/[_$a-zA-Z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*\(|\.(?:apply|bind|call)\()/,operator:/-[-=]?|\+[+=]?|!=?=?|<<?=?|>>?>?=?|=(?:==?|>)?|&[&=]?|\|[|=]?|\*\*?=?|\/=?|~|\^=?|%=?|\?|\.{3}/}),Prism.languages.javascript["class-name"][0].pattern=/(\b(?:class|interface|extends|implements|instanceof|new)\s+)[\w.\\]+/,Prism.languages.insertBefore("javascript","keyword",{regex:{pattern:/((?:^|[^$\w\xA0-\uFFFF."'\])\s])\s*)\/(\[[^\]\r\n]+]|\\.|[^\/\\\[\r\n])+\/[gimyu]{0,5}(?=\s*($|[\r\n,.;})\]]))/,lookbehind:!0,greedy:!0},"function-variable":{pattern:/[_$a-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*(?=\s*[=:]\s*(?:function\b|(?:\([^()]*\)|[_$a-z\xA0-\uFFFF][$\w\xA0-\uFFFF]*)\s*=>))/i,alias:"function"},constant:/\b[A-Z][A-Z\d_]*\b/}),Prism.languages.insertBefore("javascript","string",{"template-string":{pattern:/`(?:\\[\s\S]|\${[^}]+}|[^\\`])*`/,greedy:!0,inside:{interpolation:{pattern:/\${[^}]+}/,inside:{"interpolation-punctuation":{pattern:/^\${|}$/,alias:"punctuation"},rest:Prism.languages.javascript}},string:/[\s\S]+/}}}),Prism.languages.markup&&Prism.languages.insertBefore("markup","tag",{script:{pattern:/(<script[\s\S]*?>)[\s\S]*?(?=<\/script>)/i,lookbehind:!0,inside:Prism.languages.javascript,alias:"language-javascript",greedy:!0}}),Prism.languages.js=Prism.languages.javascript;
/* jQuery SerializeToJSON v1.2.1 - github.com/raphaelm22/jquery.serializeToJSON */
!function(e){"use strict";e.fn.serializeToJSON=function(t){return{settings:e.extend(!0,{},e.fn.serializeToJSON.defaults,t),getValue:function(t){var a=t.val();if(t.is(":radio")&&(a=t.filter(":checked").val()||null),t.is(":checkbox")&&(a=e(t).prop("checked")),this.settings.parseBooleans){var n=(a+"").toLowerCase();"true"!==n&&"false"!==n||(a="true"===n)}var i=this.settings.parseFloat.condition;return void 0!==i&&("string"==typeof i&&t.is(i)||"function"==typeof i&&i(t))&&(a=this.settings.parseFloat.getInputValue(t),a=Number(a),this.settings.parseFloat.nanToZero&&isNaN(a)&&(a=0)),a},createProperty:function(t,a,n,i){for(var r=t,s=0;s<n.length;s++){var l=n[s];if(s===n.length-1){i.is("select")&&i.prop("multiple")&&null!==a?(r[l]=new Array,Array.isArray(a)?e(a).each(function(){r[l].push(this)}):r[l].push(a)):r[l]=a}else{var o=/\[\w+\]/g.exec(l);if(null!=o&&o.length>0){l=l.substr(0,l.indexOf("[")),this.settings.associativeArrays?r.hasOwnProperty(l)||(r[l]={}):Array.isArray(r[l])||(r[l]=new Array),r=r[l];var u=o[0].replace(/[\[\]]/g,"");l=u}r.hasOwnProperty(l)||(r[l]={}),r=r[l]}}},includeUncheckValues:function(t,a){e(":radio",t).each(function(){0===e("input[name='"+this.name+"']:radio:checked").length&&a.push({name:this.name,value:null})}),e("select[multiple]",t).each(function(){null===e(this).val()&&a.push({name:this.name,value:null})})},serializer:function(t){var a=this,n={};return t.each(function(){var t=e(this),i=a.getValue(t),r=e(this).data("name").split(".");a.createProperty(n,i,r,t)}),n}}.serializer(this)},e.fn.serializeToJSON.defaults={associativeArrays:!0,parseBooleans:!0,parseFloat:{condition:void 0,nanToZero:!0,getInputValue:function(e){return e.val().split(",").join("")}}}}(jQuery);

var tdBoxShadowGenerator, tdBackgroundGenerator;
$(document).ready(function(){
    var $backGroundGenerators = $('.js-background-generator');
    var $boxShadowGenerators = $('.js-box-shadow-generator');
    var $borderGenerators = $('.js-border-generator');
    var $typographyGenerators = $('.js-typography-generator');
    var $paddingGenerators = $('.js-padding-generator');
    var $configurationForm = $('#configuration_form');
    var tdBaseUrl = $('#td-base-url').val();

    $('.colorpicker-component').colorpicker().on('changeColor', function (e) {
        $(this).find('input').keydown();
    });

    /* codes editor */
    var flask = new CodeFlask();
    flask.run('#codes_css', { language: 'css' });
    flask.onUpdate(function (code) {
        $('#codes_css').trigger('cssCodeChanged', code);
    });
    flask.run('#codes_js', { language: 'javascript' });

    $('#td-config-tabs').on('click', 'a[data-toggle="tab"]', function (e) {
        e.preventDefault();
        $('#td-config-tabs').find('a[data-toggle="tab"]').parent().removeClass('active');
    });
    $('#td-config-tabs').on('click', '.parent-tab', function (e) {
        e.preventDefault();
        var $link = $(this);

        if ($link.parent().find('ul').length) {
            var $firstChild = $link.parent().find('ul').find('a[data-toggle="tab"]').first();

            $('#td-config-tabs').find('.parent-tab').parent().removeClass('active');
            $link.parent().addClass('active');

            $link.parent().addClass('active');
            $firstChild.click();
            $firstChild.tab('show');
        }
    });

    $(document).on('click', '.remove-image', function (e) {
        var $input = $('#' + $(this).data("rel"));
        $(this).parents('.js-image-preview').addClass('hide');
        $input.val('');
    });

    /* boxshadow */
    tdBoxShadowGenerator = (function () {
        function init() {
            $boxShadowGenerators.each(function () {
                var $generator = $(this),
                    $input = $generator.find('.js-box-shadow-input'),
                    $colorControl = $generator.find('.js-shadow-color'),
                    $controls = $generator.find('.js-shadow-blur, .js-shadow-spread, .js-shadow-horizontal, .js-shadow-vertical'),
                    $switch = $generator.find('.js-box-shadow-switch');

                setShadow($generator);

                $colorControl.keydown(function () {
                    setShadow($generator);
                    $input.change();
                });

                $controls.on('input', function () {
                    setShadow($generator);
                    $input.change();
                });

                $switch.change(function () {
                    $input.change();
                });
            });
        }

        function setShadow($generator) {
            var color = $generator.find('.js-shadow-color').val(),
                blur = $generator.find('.js-shadow-blur').val(),
                spread = $generator.find('.js-shadow-spread').val(),
                horizontal = $generator.find('.js-shadow-horizontal').val(),
                vertical = $generator.find('.js-shadow-vertical').val(),
                $preview = $generator.find('.js-shadow-preview'),
                shdw = '';

            shdw += horizontal + 'px ' + vertical + 'px ' + blur + 'px ' + spread + 'px ' + color;
            $preview.css('box-shadow', shdw);
            $preview.html('box-shadow: ' + shdw);
        }

        return { init: init };
    })();
    tdBoxShadowGenerator.init();

    /* Background */
    tdBackgroundGenerator = (function () {
        function init() {
            $backGroundGenerators.each(function () {
                var $generator = $(this),
                    $input = $generator.find('.js-background-input'),
                    $colorControl = $generator.find('.js-background-color'),
                    $controls = $generator.find('.js-background-repeat, .js-background-position, .js-background-size, .js-background-attachment'),
                    $image = $generator.find('.js-background-img');

                setBackground($generator);

                $colorControl.keydown(function () {
                    setBackground($generator);
                    $input.change();
                });

                $controls.on('input', function () {
                    setBackground($generator);
                    $input.change();
                });

                $image.on('change input', function () {
                    setBackground($generator);
                    $input.change();
                });
            });
        }

        function setBackground($generator) {
            var color = $generator.find('.js-background-color').val(),
                image = $generator.find('.js-background-img').val(),
                position = $generator.find('.js-background-position').val().replace('-', ' '),
                size = $generator.find('.js-background-size').val(),
                repeat = $generator.find('.js-background-repeat').val(),
                attachment = $generator.find('.js-background-attachment').val(),
                $preview = $generator.find('.js-background-preview'),
                bkg = '';

            bkg += color + ' url("' + image + '") ' + position + ' / ' + size + ' ' + repeat + ' ' + attachment;
            if (color != "" || image != "") {
                $preview.css({'background': bkg, 'height': '200px', 'margin-top': '15px'});
            } else {
                $preview.css({'height': '0px', 'margin-top': '0px'});
            }
        }

        return { init: init };
    })();
    tdBackgroundGenerator.init();

    $typographyGenerators.each(function () {
        var $controls = $(this).find('.js-font-size, .js-font-spacing, .js-font-bold, .js-font-italic, .js-font-uppercase');
        var $field = $(this).find('.js-font-input').first();
        $controls.on('change input', function () {
            $field.val(encodeURIComponent(JSON.stringify($controls.serializeToJSON())));
            $field.change();
        });
    });

    $paddingGenerators.each(function () {
        var $controls = $(this).find('.js-padding-top, .js-padding-right, .js-padding-bottom, .js-padding-left');
        var $field = $(this).find('.js-padding-input').first();
        $controls.on('change input', function () {
            $field.val(encodeURIComponent(JSON.stringify($controls.serializeToJSON())));
            $field.change();
        });
    });

    $('.js-range-slider').on('input', function (e) {
        $('#' + $(this).data('vinput')).change();
    });

    $('.js-iframe-upload').fancybox({
        'width': 900,
        'height': 600,
        'type': 'iframe',
        'autoScale': false,
        'autoDimensions': false,
        'fitToView': false,
        'autoSize': false,
        onUpdate: function onUpdate() {
            var $linkImage = $('.fancybox-iframe').contents().find('a.link');
            var inputName = $(this.element).data('input-name');
            $linkImage.data('field_id', inputName);
            $linkImage.attr('data-field_id', inputName);
        },
        afterShow: function afterShow() {
            var $linkImage = $('.fancybox-iframe').contents().find('a.link');
            var inputName = $(this.element).data('input-name');
            $linkImage.data('field_id', inputName);
            $linkImage.attr('data-field_id', inputName);
        },
        beforeClose: function beforeClose() {
            var $input = $('#' + $(this.element).data("input-name"));
            var val = $input.val();
            $input.val(val.replace(tdBaseUrl, ""));
            if (val != '') {
                $(this.element).parents('.image-generator').find('.imgpreview').attr('src', val);
                $(this.element).parents('.image-generator').find('.js-image-preview').removeClass('hide');
            }
            $input.change();
        }
    });

    $configurationForm.submit(function (event) {
        $configurationForm.trigger('beforeSubmit', []);
    });
    $configurationForm.on('beforeSubmit', function (event) {
        $backGroundGenerators.each(function () {
            var $controls = $(this).find('.js-background-color, .js-background-repeat, .js-background-position, .js-background-size, .js-background-attachment, .js-background-img');
            $(this).find('.js-background-input').first().val(encodeURIComponent(JSON.stringify($controls.serializeToJSON())));
        });
        $boxShadowGenerators.each(function () {
            var $controls = $(this).find('.js-shadow-color, .js-box-shadow-switch, .js-shadow-blur, .js-shadow-spread, .js-shadow-horizontal, .js-shadow-vertical');
            $(this).find('.js-box-shadow-input').first().val(encodeURIComponent(JSON.stringify($controls.serializeToJSON())));
        });
        $borderGenerators.each(function () {
            var $controls = $(this).find('.js-border-color, .js-border-type, .js-border-width');
            $(this).find('.js-border-input').first().val(encodeURIComponent(JSON.stringify($controls.serializeToJSON())));
        });
        $typographyGenerators.each(function () {
            var $controls = $(this).find('.js-font-size, .js-font-spacing, .js-font-bold, .js-font-italic, .js-font-uppercase');
            $(this).find('.js-font-input').first().val(encodeURIComponent(JSON.stringify($controls.serializeToJSON())));
        });
        $paddingGenerators.each(function () {
            var $controls = $(this).find('.js-padding-top, .js-padding-right, .js-padding-bottom, .js-padding-left');
            $(this).find('.js-padding-input').first().val(encodeURIComponent(JSON.stringify($controls.serializeToJSON())));
        });
    });
});


(function ( $, window, document, undefined ) {
    'use strict';
    $.tdDependency = function( el, param ) {
        var base = this;
            base.$el = $(el);
            base.el  = el;

        base.init = function () {
            base.ruleset = $.deps.createRuleset();
            var cfg = {
                show: function( el ) {
                    el.removeClass('hidden');
                },
                hide: function( el ) {
                    el.addClass('hidden');
                },
                log: false,
                checkTargets: false
            };
            base.depRoot();
            $.deps.enable( base.$el, base.ruleset, cfg );
        };

        base.depRoot = function() {
            base.$el.each( function() {
                $(this).find('[data-controller]').each( function() {
                    var $this       = $(this),
                    _controller = $this.data('controller').split('|'),
                    _condition  = $this.data('condition').split('|'),
                    _value      = $this.data('value').toString().split('|'),
                    _rules      = base.ruleset;
                    $.each(_controller, function(index, element) {
                        var value     = _value[index] || '',
                        condition = _condition[index] || _condition[0];
                        _rules = _rules.createRule('[data-depend-id="'+ element +'"]', condition, value);
                        _rules.include($this);
                    });
                });
            });
        };
        base.init();
    };
    $.fn.initDependency = function ( param ) {
        return this.each(function () {
            new $.tdDependency( this, param );
        });
    };
    $(document).ready( function() {
        $('.form-wrapper').initDependency();
    });
})( jQuery, window, document );
