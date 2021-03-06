/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.jqx.jqxWidget("jqxNumberInput","",{});
    a.jqx.textInput={};
    
    a.extend(a.jqx.textInput,{
        addHandler:function(b){
            a(b).data("lastValue",a(b).val());
            a(b).bind("keyup.textchange",a.jqx.textInput.handler);
            a(b).bind("cut.textchange paste.textchange input.textchange",a.jqx.textInput.delayedHandler)
        },
        removeHandler:function(b){
            a(b).unbind(".textchange")
        },
        handler:function(b){
            a.jqx.textInput.triggerIfChanged(a(this))
        },
        delayedHandler:function(c){
            var b=a(this);
            setTimeout(function(){
                a.jqx.textInput.triggerIfChanged(b)
            },25)
        },
        triggerIfChanged:function(d){
            var e=d.val();
            var c=d.data("lastValue");
            if(e!==d.data("lastValue")){
                d.trigger("textchange",[d.data("lastValue")]);
                var b=false;
                if(d.val()===""&&d.val()!=c){
                    b=true;
                    d.data("emptyValue",true)
                }else{
                    b=false;
                    d.data("emptyValue",false)
                }
                d.trigger("showPlaceHolder",b);
                d.data("lastValue",e)
            }
        }
    });
    a.extend(a.jqx._jqxNumberInput.prototype,{
        defineInstance:function(){
            this.value=null;
            this.decimal=0;
            this.min=-99999999;
            this.max=99999999;
            this.width=null;
            this.validationMessage="Invalid value";
            this.height=50;
            this.textAlign="right";
            this.readOnly=false;
            this.promptChar="_";
            this.decimalDigits=2;
            this.decimalSeparator=".";
            this.groupSeparator=",";
            this.groupSize=3;
            this.symbol="";
            this.symbolPosition="left";
            this.digits=8;
            this.negative=false;
            this.negativeSymbol="-";
            this.disabled=false;
            this.inputMode="advanced";
            this.spinButtons=false;
            this.spinButtonsWidth=18;
            this.spinButtonsStep=1;
            this.autoValidate=true;
            this.spinMode="advanced";
            this.events=["valuechanged","textchanged","mousedown","mouseup","keydown","keyup","keypress",];
            this.invalidArgumentExceptions=["invalid argument exception"]
        },
        createInstance:function(g){
            this.host.attr({
                role:"numberInput"
            });
            if(a.jqx.mobile.isTouchDevice()){
                this.inputMode="simple";
                this.spinMode="simple"
            }
            this.tooltip=null;
            this.host.addClass(this.toThemeProperty("jqx-input"));
            this.host.addClass(this.toThemeProperty("jqx-rc-all"));
            this.host.addClass(this.toThemeProperty("jqx-widget"));
            this.host.addClass(this.toThemeProperty("jqx-widget-content"));
            if(this.spinButtons){
                this._spinButtons()
            }else{
                this.numberInput=a("<input autocomplete='off' type='textarea'/>").appendTo(this.host);
                this.numberInput.addClass(this.toThemeProperty("jqx-input-content"));
                this.numberInput.addClass(this.toThemeProperty("jqx-widget-content"))
            }
            if(a.jqx.mobile.isTouchDevice()||this.inputMode=="textbox"){
                var h=this;
                this.numberInput.bind("change",function(){
                    if(!h.parsing){
                        h.parsing=true
                    }
                    if(h.parsing){
                        if(h.numberInput.val()&&h.numberInput.val().indexOf("-")==0){
                            h.setvalue("negative",true)
                        }else{
                            h.setvalue("negative",false)
                        }
                        h.ValueString=h.GetValueString(h.numberInput.val(),h.decimalSeparator,h.decimalSeparator!="");
                        h.ValueString=new Number(h.ValueString).toFixed(h.decimalDigits);
                        h._parseDecimalInSimpleMode();
                        h.decimal=h.ValueString;
                        h.parsing=false
                    }
                })
            }
            var f=a.data(this.host[0],"jqxNumberInput");
            f.jqxNumberInput=this;
            var h=this;
            this.addHandler(this.host,"loadContent",function(q){
                h._render()
            });
            if(this.host.parents("form").length>0){
                this.host.parents("form").bind("reset",function(){
                    setTimeout(function(){
                        h.setDecimal(0)
                    },10)
                })
            }
            if(this.host.jqxTooltip){
                var l=this.host.append(a("<div></div>"));
                var b=l.jqxTooltip();
                this.tooltip=a.data(b[0],"jqxTooltip").instance;
                this.tooltip.disabled=true
            }
            this.propertyChangeMap.disabled=function(q,s,r,u){
                if(u){
                    q.numberInput.addClass(o.toThemeProperty("jqx-input-disabled"));
                    q.numberInput.attr("disabled",true)
                }else{
                    q.host.removeClass(o.toThemeProperty("jqx-input-disabled"));
                    q.numberInput.attr("disabled",false)
                }
                if(q.spinButtons&&q.host.jqxRepeatButton){
                    q.upbutton.jqxRepeatButton({
                        disabled:u
                    });
                    q.downbutton.jqxRepeatButton({
                        disabled:u
                    })
                }
            };
    
            if(this.disabled){
                this.numberInput.addClass(this.toThemeProperty("jqx-input-disabled"));
                this.numberInput.attr("disabled",true);
                this.host.addClass(this.toThemeProperty("jqx-fill-state-disabled"))
            }
            this.selectedText="";
            this.decimalSeparatorPosition=-1;
            var c=this.element.id;
            var d=this.element;
            var o=this;
            this.oldValue=this._value();
            this.items=new Array();
            var n=this.value;
            var e=this.decimal;
            this._initializeLiterals();
            this._render();
            this.setDecimal(e);
            var h=this;
            setTimeout(function(){
                h._render(false)
            },100);
            this._addHandlers()
        },
        refresh:function(b){
            if(!b){
                this._render()
            }
        },
        wheel:function(d,c){
            var e=0;
            if(!d){
                d=window.event
            }
            if(d.originalEvent&&d.originalEvent.wheelDelta){
                d.wheelDelta=d.originalEvent.wheelDelta
            }
            if(d.wheelDelta){
                e=d.wheelDelta/120
            }else{
                if(d.detail){
                    e=-d.detail/3
                }
            }
            if(e){
                var b=c._handleDelta(e);
                if(d.preventDefault){
                    d.preventDefault()
                }
                if(d.originalEvent!=null){
                    d.originalEvent.mouseHandled=true
                }
                if(d.stopPropagation!=undefined){
                    d.stopPropagation()
                }
                if(b){
                    b=false;
                    d.returnValue=b;
                    return b
                }else{
                    return false
                }
            }
            if(d.preventDefault){
                d.preventDefault()
            }
            d.returnValue=false
        },
        _handleDelta:function(b){
            if(b<0){
                this.spinDown()
            }else{
                this.spinUp()
            }
            return true
        },
        _addHandlers:function(){
            var b=this;
            this.addHandler(this.numberInput,"mousedown",function(e){
                return b._raiseEvent(2,e)
            });
            this._mousewheelfunc=this._mousewheelfunc||function(e){
                if(!b.editcell){
                    b.wheel(e,b);
                    return false
                }
            };
    
            this.removeHandler(this.host,"mousewheel",this._mousewheelfunc);
            this.addHandler(this.host,"mousewheel",this._mousewheelfunc);
            var d=a.jqx.mobile.isOperaMiniMobileBrowser();
            if(d){
                this.inputMode="simple";
                var c=a.jqx.mobile.isOperaMiniBrowser();
                if(c){
                    b.numberInput.attr("readonly",true)
                }
                this.addHandler(a(document),"click."+this.element.id,b._exitSimpleInputMode,b)
            }
            this.addHandler(this.numberInput,"focus",function(e){
                if(b.inputMode=="simple"){}
                a.data(b.numberInput,"selectionstart",b._selection().start);
                b.host.addClass(b.toThemeProperty("jqx-fill-state-focus"))
            });
            this.addHandler(this.numberInput,"blur",function(e){
                if(b.inputMode=="simple"){
                    b._exitSimpleInputMode(e,b,false)
                }
                if(b.autoValidate){
                    var f=b.getDecimal();
                    if(f>b.max){
                        b.setDecimal(b.max)
                    }
                    if(f<b.min){
                        b.setDecimal(b.min)
                    }
                }
                b.host.removeClass(b.toThemeProperty("jqx-fill-state-focus"))
            });
            this.addHandler(this.numberInput,"mouseup",function(e){
                return b._raiseEvent(3,e)
            });
            this.addHandler(this.numberInput,"keydown",function(e){
                return b._raiseEvent(4,e)
            });
            this.addHandler(this.numberInput,"keyup",function(e){
                return b._raiseEvent(5,e)
            });
            this.addHandler(this.numberInput,"keypress",function(e){
                return b._raiseEvent(6,e)
            })
        },
        _removeHandlers:function(){
            var b=this;
            this.removeHandler(this.numberInput,"mousedown");
            var c=a.jqx.mobile.isOperaMiniMobileBrowser();
            if(c){
                this.removeHandler(a(document),"click."+this.element.id,b._exitSimpleInputMode,b)
            }
            this.removeHandler(this.numberInput,"focus");
            this.removeHandler(this.numberInput,"blur");
            this.removeHandler(this.numberInput,"mouseup");
            this.removeHandler(this.numberInput,"keydown");
            this.removeHandler(this.numberInput,"keyup");
            this.removeHandler(this.numberInput,"keypress")
        },
        _spinButtons:function(){
            if(this.host.jqxRepeatButton){
                this.numberInput=a("<input autocomplete='off' style='float: left;' type='textarea'/>");
                this.numberInput.appendTo(this.host);
                this.numberInput.addClass(this.toThemeProperty("jqx-input-content"));
                this.numberInput.addClass(this.toThemeProperty("jqx-widget-content"));
                this.spincontainer=a('<div style="float: left; height: 100%; overflow: hidden; position: relative;"></div>');
                this.host.append(this.spincontainer);
                this.upbutton=a('<div style="overflow: hidden; padding: 0px; margin-left: -1px; position: relative;"><div></div></div>');
                this.spincontainer.append(this.upbutton);
                this.upbutton.jqxRepeatButton({
                    overrideTheme:true,
                    disabled:this.disabled,
                    roundedCorners:"top-right"
                });
                this.downbutton=a('<div style="overflow: hidden; padding: 0px; margin-left: -1px; position: relative;"><div></div></div>');
                this.spincontainer.append(this.downbutton);
                this.downbutton.jqxRepeatButton({
                    overrideTheme:true,
                    disabled:this.disabled,
                    roundedCorners:"bottom-right"
                });
                var b=this;
                this.downbutton.addClass(this.toThemeProperty("jqx-fill-state-normal"));
                this.upbutton.addClass(this.toThemeProperty("jqx-fill-state-normal"));
                this.upbutton.addClass(this.toThemeProperty("jqx-rc-tr"));
                this.downbutton.addClass(this.toThemeProperty("jqx-rc-br"));
                this.addHandler(this.downbutton,"mouseup",function(c){
                    if(!b.disabled){
                        b.downbutton.removeClass(b.toThemeProperty("jqx-fill-state-pressed"));
                        b._downArrow.removeClass(b.toThemeProperty("icon-arrow-down-selected"))
                    }
                });
                this.addHandler(this.upbutton,"mouseup",function(c){
                    if(!b.disabled){
                        b.upbutton.removeClass(b.toThemeProperty("jqx-fill-state-pressed"));
                        b._upArrow.removeClass(b.toThemeProperty("icon-arrow-up-selected"))
                    }
                });
                this.addHandler(this.downbutton,"mousedown",function(c){
                    if(!b.disabled){
                        b.downbutton.addClass(b.toThemeProperty("jqx-fill-state-pressed"));
                        b._downArrow.addClass(b.toThemeProperty("icon-arrow-down-selected"));
                        return false
                    }
                });
                this.addHandler(this.upbutton,"mousedown",function(c){
                    if(!b.disabled){
                        b.upbutton.addClass(b.toThemeProperty("jqx-fill-state-pressed"));
                        b._upArrow.addClass(b.toThemeProperty("icon-arrow-up-selected"));
                        return false
                    }
                });
                this.upbutton.hover(function(){
                    if(!b.disabled){
                        b.upbutton.addClass(b.toThemeProperty("jqx-fill-state-hover"))
                    }
                },function(){
                    b.upbutton.removeClass(b.toThemeProperty("jqx-fill-state-hover"));
                    b._upArrow.removeClass(b.toThemeProperty("icon-arrow-up-hover"))
                });
                this.downbutton.hover(function(){
                    if(!b.disabled){
                        b.downbutton.addClass(b.toThemeProperty("jqx-fill-state-hover"))
                    }
                },function(){
                    b.downbutton.removeClass(b.toThemeProperty("jqx-fill-state-hover"));
                    b._downArrow.removeClass(b.toThemeProperty("icon-arrow-down-hover"))
                });
                this.upbutton.css("border-width","0px");
                this.downbutton.css("border-width","0px");
                if(this.disabled){
                    this.upbutton[0].disabled=true;
                    this.downbutton[0].disabled=true
                }else{
                    this.upbutton[0].disabled=false;
                    this.downbutton[0].disabled=false
                }
                this.spincontainer.addClass(this.toThemeProperty("jqx-input"));
                this.spincontainer.addClass(this.toThemeProperty("jqx-rc-r"));
                this.spincontainer.css("border-width","0px");
                this.spincontainer.css("border-left-width","1px");
                this._upArrow=this.upbutton.find("div");
                this._downArrow=this.downbutton.find("div");
                this._upArrow.addClass(this.toThemeProperty("icon-arrow-up"));
                this._downArrow.addClass(this.toThemeProperty("icon-arrow-down"));
                this._upArrow.addClass(this.toThemeProperty("jqx-input-icon"));
                this._downArrow.addClass(this.toThemeProperty("jqx-input-icon"));
                var b=this;
                this._upArrow.hover(function(){
                    if(!b.disabled){
                        b._upArrow.addClass(b.toThemeProperty("icon-arrow-up-hover"))
                    }
                },function(){
                    b._upArrow.removeClass(b.toThemeProperty("icon-arrow-up-hover"))
                });
                this._downArrow.hover(function(){
                    if(!b.disabled){
                        b._downArrow.addClass(b.toThemeProperty("icon-arrow-down-hover"))
                    }
                },function(){
                    b._downArrow.removeClass(b.toThemeProperty("icon-arrow-down-hover"))
                });
                this.addHandler(this.downbutton,"click",function(){
                    if(b._selection().start==0){
                        b._setSelectionStart(b.numberInput.val().length)
                    }
                    b.spinDown()
                });
                this.addHandler(this.upbutton,"click",function(){
                    if(b._selection().start==0){
                        b._setSelectionStart(b.numberInput.val().length)
                    }
                    b.spinUp()
                })
            }
        },
        spinDown:function(){
            var l=this;
            if(l.spinMode=="none"){
                return
            }
            if(!l.disabled){
                var n=l.decimal;
                var o=this._selection();
                var g=parseFloat(l.decimal);
                if(l.spinButtonsStep<0){
                    l.spinButtonsStep=1
                }
                var c=parseInt(l.decimal)+l.spinButtonsStep;
                c=c.toString().length;
                var e=c<=l.digits;
                if(l.spinMode!="advanced"){
                    if(g>0&&g+l.spinButtonsStep<=l.max&&e){
                        var s=1;
                        for(i=0;i<l.decimalDigits;i++){
                            s=s*10
                        }
                        var d=(s*g)-(s*l.spinButtonsStep);
                        d=d/s;
                        if(d<0){
                            d=0
                        }
                        d=this._parseDecimalValueToEditorValue(d);
                        l._setDecimal(d)
                    }
                }else{
                    var q=this._getspindecimal();
                    var h=this._getSeparatorPosition();
                    var g=parseFloat(q.decimal);
                    if(l.spinButtonsStep<0){
                        l.spinButtonsStep=1
                    }
                    var c=parseInt(g)+l.spinButtonsStep;
                    c=c.toString().length;
                    var e=c<=l.digits;
                    var s=1;
                    var b=q.decimal.indexOf(".");
                    if(b!=-1){
                        var f=q.decimal.length-b-1;
                        var s=1;
                        for(i=0;i<f;i++){
                            s=s*10
                        }
                        g-=new Number(l.spinButtonsStep/s);
                        if(g<0){
                            g=0
                        }
                        g=g.toFixed(f);
                        var b=g.toString().indexOf(".");
                        if(b==-1){
                            g=g.toString()+"."
                        }
                        var r=g.toString()+q.afterdecimal;
                        r=new Number(r);
                        r=r.toFixed(l.decimalDigits);
                        r=this._parseDecimalValueToEditorValue(r);
                        if(r>=l.min){
                            l._setDecimal(r)
                        }
                    }else{
                        if(g>0&&g+l.spinButtonsStep<=l.max&&e){
                            var d=(s*g)-(s*l.spinButtonsStep);
                            d=d/s;
                            var r=d.toString()+q.afterdecimal;
                            if(r<0){
                                r=0
                            }
                            r=this._parseDecimalValueToEditorValue(r);
                            if(r>=l.min){
                                l._setDecimal(r)
                            }
                        }
                    }
                }
                if(r==undefined||this.inputMode!="simple"){
                    this._setSelectionStart(o.start);
                    return
                }
                if(r!=undefined&&(n==undefined||n.toString().length==r.length)){
                    this._setSelectionStart(o.start)
                }else{
                    this._setSelectionStart(o.start-1)
                }
            }
        },
        _getspindecimal:function(){
            var g=this._selection();
            var l="";
            var f=this._getSeparatorPosition();
            var o=this._getVisibleItems();
            var b=this._getHiddenPrefixCount();
            var n=this.numberInput.val();
            if(this.numberInput.val().length==g.start&&g.length==0){
                this._setSelection(g.start,g.start+1);
                g=this._selection()
            }
            var e=this.inputMode!="advanced";
            for(i=0;i<g.start;i++){
                if(e){
                    var h=n.substring(i,i+1);
                    var d=(!isNaN(parseInt(h)));
                    if(d){
                        l+=h
                    }
                    if(h==this.decimalSeparator){
                        l+=h
                    }
                    continue
                }
                if(o[i].canEdit&&o[i].character!=this.promptChar){
                    l+=o[i].character
                }else{
                    if(!o[i].canEdit&&this.decimalSeparatorPosition!=-1&&o[i]==o[this.decimalSeparatorPosition-b]){
                        if(l.length==0){
                            l="0"
                        }
                        l+=o[i].character
                    }
                }
            }
            var c="";
            for(i=g.start;i<o.length;i++){
                if(e){
                    var h=n.substring(i,i+1);
                    var d=(!isNaN(parseInt(h)));
                    if(d){
                        c+=h
                    }
                    if(h==this.decimalSeparator){
                        c+=h
                    }
                    continue
                }
                if(o[i].canEdit&&o[i].character!=this.promptChar){
                    c+=o[i].character
                }else{
                    if(!o[i].canEdit&&this.decimalSeparatorPosition!=-1&&o[i]==o[this.decimalSeparatorPosition-b]){
                        c+=o[i].character
                    }
                }
            }
            return{
                decimal:this._parseDecimalValue(l),
                afterdecimal:this._parseDecimalValue(c)
            }
        },
        _parseDecimalValue:function(c){
            if(this.decimalSeparator!="."){
                var d=c.toString().indexOf(this.decimalSeparator);
                if(d>=0){
                    var b=c.toString().substring(0,d)+"."+c.toString().substring(d+1);
                    return b
                }
            }
            return c
        },
        _parseDecimalValueToEditorValue:function(c){
            if(this.decimalSeparator!="."){
                var d=c.toString().indexOf(".");
                if(d>=0){
                    var b=c.toString().substring(0,d)+this.decimalSeparator+c.toString().substring(d+1);
                    return b
                }
            }
            return c
        },
        spinUp:function(){
            var n=this;
            if(n.spinMode=="none"){
                return
            }
            if(!n.disabled){
                var q=this._selection();
                var o=n.decimal;
                var h=parseFloat(n.decimal);
                if(n.spinButtonsStep<0){
                    n.spinButtonsStep=1
                }
                var c=parseInt(n.decimal)+n.spinButtonsStep;
                c=c.toString().length;
                var f=c<=n.digits;
                if(n.spinMode!="advanced"){
                    if(h+n.spinButtonsStep<=n.max&&f){
                        var u=1;
                        for(i=0;i<n.decimalDigits;i++){
                            u=u*10
                        }
                        var e=(u*h)+(u*n.spinButtonsStep);
                        e=e/u;
                        e=this._parseDecimalValueToEditorValue(e);
                        n._setDecimal(e)
                    }
                }else{
                    var r=this._getspindecimal();
                    var l=this._getSeparatorPosition();
                    var h=parseFloat(r.decimal);
                    if(n.spinButtonsStep<0){
                        n.spinButtonsStep=1
                    }
                    var c=parseInt(h)+n.spinButtonsStep;
                    c=c.toString().length;
                    var f=c<=n.digits;
                    var u=1;
                    var b=r.decimal.indexOf(".");
                    if(b!=-1){
                        var g=r.decimal.length-b-1;
                        var u=1;
                        for(i=0;i<g;i++){
                            u=u*10
                        }
                        h+=new Number(n.spinButtonsStep/u);
                        h=h.toFixed(g);
                        var b=h.toString().indexOf(".");
                        if(b==-1){
                            h=h.toString()+"."
                        }
                        var s=h.toString()+r.afterdecimal;
                        s=new Number(s);
                        s=s.toFixed(n.decimalDigits);
                        var d=new Number(s).toFixed(n.decimalDigits);
                        if(d<=n.max){
                            s=this._parseDecimalValueToEditorValue(s);
                            n._setDecimal(s)
                        }else{
                            s=undefined
                        }
                    }else{
                        if(h+n.spinButtonsStep<=n.max&&f){
                            var e=(u*h)+(u*n.spinButtonsStep);
                            e=e/u;
                            var s=e.toString()+r.afterdecimal;
                            var d=new Number(s).toFixed(n.decimalDigits);
                            if(d<=n.max){
                                s=this._parseDecimalValueToEditorValue(s);
                                n._setDecimal(s)
                            }else{
                                s=undefined
                            }
                        }
                    }
                }
                if(s==undefined||this.inputMode!="simple"){
                    this._setSelectionStart(q.start);
                    return
                }
                if(s!=undefined&&(o==undefined||o.toString().length==s.length)){
                    this._setSelectionStart(q.start)
                }else{
                    this._setSelectionStart(1+q.start)
                }
            }
        },
        _exitSimpleInputMode:function(b,n,g){
            if(n==undefined){
                n=b.data
            }
            if(n==null){
                return
            }
            if(g==undefined){
                if(b.target!=null&&n.element!=null){
                    if((b.target.id!=undefined&&b.target.id.toString().length>0&&n.host.find("#"+b.target.id).length>0)||b.target==n.element){
                        return
                    }
                }
                var e=n.host.offset();
                var d=e.left;
                var f=e.top;
                var c=n.host.width();
                var l=n.host.height();
                var o=a(b.target).offset();
                if(o.left>=d&&o.left<=d+c){
                    if(o.top>=f&&o.top<=f+l){
                        return
                    }
                }
            }
            if(a.jqx.mobile.isOperaMiniBrowser()){
                n.numberInput.attr("readonly",true)
            }
            if(n.disabled||n.readOnly){
                return
            }
            var h=a.data(n.numberInput,"simpleInputMode");
            if(h==null){
                return
            }
            a.data(n.numberInput,"simpleInputMode",null);
            this._parseDecimalInSimpleMode();
            return false
        },
        _parseDecimalInSimpleMode:function(){
            var e=this;
            var c=e.getvalue("negative");
            var b=this.ValueString;
            if(b==undefined){
                b=this.GetValueString(this.numberInput.val(),this.decimalSeparator,this.decimalSeparator!="")
            }
            var f=c?"-":"";
            if(this.symbolPosition=="left"){
                f+=this.symbol
            }
            var d=this.digits%this.groupSize;
            if(d==0){
                d=this.groupSize
            }
            var g=b.toString();
            f+=g;
            if(this.symbolPosition=="right"){
                f+=this.symbol
            }
            e.numberInput.val(f)
        },
        _enterSimpleInputMode:function(f,d){
            if(d==undefined){
                d=f.data
            }
            var e=this._selection();
            if(d==null){
                return
            }
            var c=d.getvalue("negative");
            var b=d.decimal;
            if(c){
                if(b>0){
                    b=-b
                }
            }
            d.numberInput.val(b);
            a.data(d.numberInput,"simpleInputMode",true);
            if(a.jqx.mobile.isOperaMiniBrowser()){
                d.numberInput.attr("readonly",false)
            }
            this._parseDecimalInSimpleMode();
            this._setSelectionStart(e.start)
        },
        setvalue:function(b,c){
            if(this[b]!=undefined){
                if(b=="decimal"){
                    this._setDecimal(c)
                }else{
                    this[b]=c;
                    this.propertyChangedHandler(this,b,c,c)
                }
            }
        },
        getvalue:function(b){
            if(b=="decimal"){
                if(this.negative!=undefined&&this.negative==true){
                    return -Math.abs(this[b])
                }
            }
            if(b in this){
                return this[b]
            }
            return null
        },
        _getString:function(){
            var b="";
            for(i=0;i<this.items.length;i++){
                var c=this.items[i].character;
                b+=c
            }
            return b
        },
        _literal:function(d,b,c,e){
            return{
                character:d,
                regex:b,
                canEdit:c,
                isSeparator:e
            }
        },
        _initializeLiterals:function(){
            if(this.inputMode=="textbox"){
                return
            }
            var f=0;
            var d=this.negativeSymbol.length;
            for(i=0;i<d;i++){
                var e=this.negativeSymbol.substring(i,i+1);
                var l="";
                var b=false;
                var n=null;
                if(this.negative){
                    n=this._literal(e,l,b,false)
                }else{
                    n=this._literal("",l,b,false)
                }
                this.items[f]=n;
                f++
            }
            var c=this.symbol.length;
            if(this.symbolPosition=="left"){
                for(i=0;i<c;i++){
                    var e=this.symbol.substring(i,i+1);
                    var l="";
                    var b=false;
                    var n=this._literal(e,l,b,false);
                    this.items[f]=n;
                    f++
                }
            }
            var g=this.digits%this.groupSize;
            if(g==0){
                g=this.groupSize
            }
            for(i=0;i<this.digits;i++){
                var e=this.promptChar;
                var l="\\d";
                var b=true;
                var n=this._literal(e,l,b,false);
                this.items[f]=n;
                f++;
                if(i<this.digits-1&&this.groupSeparator!=undefined&&this.groupSeparator.length>0){
                    g--;
                    if(g==0){
                        g=this.groupSize;
                        var h=this._literal(this.groupSeparator,"",false,false);
                        this.items[f]=h;
                        f++
                    }
                }else{
                    if(i==this.digits-1){
                        n.character=0
                    }
                }
            }
            this.decimalSeparatorPosition=-1;
            if(this.decimalDigits!=undefined&&this.decimalDigits>0){
                var e=this.decimalSeparator;
                if(e.length==0){
                    e="."
                }
                var n=this._literal(e,"",false,true);
                this.items[f]=n;
                this.decimalSeparatorPosition=f;
                f++;
                for(i=0;i<this.decimalDigits;i++){
                    var q=0;
                    var l="\\d";
                    var o=this._literal(q,l,true,false);
                    this.items[f]=o;
                    f++
                }
            }
            if(this.symbolPosition=="right"){
                for(i=0;i<c;i++){
                    var e=this.symbol.substring(i,i+1);
                    var l="";
                    var b=false;
                    var n=this._literal(e,l,b);
                    this.items[f]=n;
                    f++
                }
            }
        },
        _match:function(c,b){
            var d=new RegExp(b,"i");
            return d.test(c)
        },
        _raiseEvent:function(r,d){
            var o=this.events[r];
            var b={};
    
            b.owner=this;
            if(this.host.css("display")=="none"){
                return true
            }
            var z=d.charCode?d.charCode:d.keyCode?d.keyCode:0;
            var g=true;
            var l=this.readOnly;
            var x=this;
            if(r==3||r==2){
                if(!this.disabled){
                    if(this.inputMode!="simple"){
                        this._handleMouse(d)
                    }else{
                        return true
                    }
                }
            }
            if(r==0){
                if(this.tooltip!=null&&this.tooltip!=undefined&&this.validationMessage.length>0){
                    var h=this.getvalue("decimal");
                    if((this.max<h)||(this.min>h)){
                        this.host.addClass(this.toThemeProperty("jqx-input-invalid"));
                        var s=a.data(this.numberInput[0],"Tooltip");
                        if(!this.tooltip.isOpen){
                            this.tooltip.location="relative";
                            this.tooltip.disabled=false;
                            this.tooltip.open(this.numberInput,this.validationMessage);
                            s=a.data(this.numberInput[0],"Tooltip");
                            var f=a.data(this.numberInput[0],"TooltipBounds");
                            s.css({
                                top:parseInt(f.position.top)+parseInt(f.elementHeight)+3,
                                left:parseInt(f.position.left)+parseInt(f.elementWidth)-parseInt(f.width)
                            })
                        }
                        var c=a(s).find(".jqx-tooltip-content",true)[0];
                        if(c!=null){
                            c.className=this.toThemeProperty("jqx-tooltip-content-invalid")
                        }
                    }else{
                        var s=a.data(this.numberInput[0],"Tooltip");
                        if(s!=null){
                            this.tooltip.events.closed=function(){
                                var e=a(s).find(".jqx-tooltip-content-invalid",true)[0];
                                if(e!=null){
                                    e.className=this.toThemeProperty("jqx-tooltip-content")
                                }
                            }
                        }
                        this.tooltip.close(this.numberInput[0]);
                        this.host.removeClass(this.toThemeProperty("jqx-input-invalid"));
                        this.host.addClass(this.toThemeProperty("jqx-input"));
                        this.host.addClass(this.toThemeProperty("jqx-rc-all"));
                        this.tooltip.disabled=true
                    }
                }
            }
            var u=new jQuery.Event(o);
            u.owner=this;
            b.value=this.getvalue("decimal");
            b.text=this.numberInput.val();
            u.args=b;
            g=this.host.trigger(u);
            var x=this;
            if(this.inputMode=="textbox"){
                return g
            }
            if(this.inputMode!="simple"){
                if(r==4){
                    if(l||this.disabled){
                        return false
                    }
                    g=x._handleKeyDown(d,z)
                }else{
                    if(r==5){
                        if(l||this.disabled){
                            g=false
                        }
                    }else{
                        if(r==6){
                            if(l||this.disabled){
                                return false
                            }
                            g=x._handleKeyPress(d,z)
                        }
                    }
                }
            }else{
                if(r==4||r==5||r==6){
                    if(a.jqx.mobile.isTouchDevice()){
                        return true
                    }
                    if(l||this.disabled){
                        return false
                    }
                    var y=String.fromCharCode(z);
                    var q=parseInt(y);
                    var v=true;
                    if(!d.ctrlKey&&!d.shiftKey){
                        if(z>=65&&z<=90){
                            v=false
                        }
                    }
                    if(r==6&&a.browser.opera!=undefined){
                        if(z==8){
                            return false
                        }
                    }
                    if(v){
                        if(r==4){
                            v=x._handleSimpleKeyDown(d,z)
                        }
                        if(!a.browser.msie){
                            var w=d;
                            if((w.ctrlKey&&z==99)||(w.ctrlKey&&z==67)||(w.ctrlKey&&z==122)||(w.ctrlKey&&z==90)||(w.ctrlKey&&z==118)||(w.ctrlKey&&z==86)||(w.shiftKey&&z==45)){
                                if(r==6&&a.browser.webkit){
                                    x._handleSimpleKeyDown(d,z)
                                }
                                return false
                            }
                        }
                        if((d.ctrlKey&&z==97)||(d.ctrlKey&&z==65)){
                            return true
                        }
                        if(r==6&&v){
                            var n=this._isSpecialKey(z);
                            return n
                        }
                    }
                    return v
                }
            }
            return g
        },
        GetSelectionInValue:function(h,g,f,e){
            var c=0;
            for(i=0;i<g.length;i++){
                if(i>=h){
                    break
                }
                var d=g.substring(i,i+1);
                var b=(!isNaN(parseInt(d)));
                if(b||(e&&g[i].toString()==f)){
                    c++
                }
            }
            return c
        },
        GetSelectionLengthInValue:function(g,h,f,e){
            var c=0;
            for(i=0;i<f.length;i++){
                if(i>=g+h){
                    break
                }
                var d=f.substring(i,i+1);
                var b=(!isNaN(parseInt(d)));
                if(h>0&&i>=g&&b||(i>=g&&f[i].toString()==e)){
                    c++
                }
            }
            return c
        },
        GetInsertTypeByPositionInValue:function(e,g,h,f){
            var c="before";
            var b=this.GetValueString(h,g,f);
            var d=this.GetDigitsToSeparator(0,b);
            if(e>d){
                c="after"
            }
            return c
        },
        RemoveRange:function(f,e,q,g,w,b){
            var h=this.digits;
            var r=f;
            var x=e;
            var c=0;
            var s=this.decimal;
            var B=this._selection();
            var q=this.numberInput.val();
            var g=this.decimalSeparator;
            var l=g!="";
            if(x==0&&this.ValueString.length<this.decimalPossibleChars-1){
                return c
            }
            var y=this.GetSeparatorPositionInText(g,q);
            if(!w){
                y=this.GetSeparatorPositionInText(".",q)
            }
            if(y<0&&!l&&q.length>1){
                y=q.length
            }
            if(y==-1){
                y=q.length
            }
            var d=l?1:0;
            if(e<2&&b==true){
                var A=this.ValueString.length-this.decimalDigits-d;
                if((A)==h&&f+e<y){
                    x++
                }
            }
            var n="";
            for(i=0;i<q.length;i++){
                if(i<r||i>=r+x){
                    n+=q.substring(i,i+1);
                    continue
                }else{
                    if(q[i].toString()==g){
                        n+=g;
                        continue
                    }else{
                        var v=q.substring(i,i+1);
                        if(i>y){
                            n+="0";
                            continue
                        }
                    }
                }
                var v=q.substring(i,i+1);
                var u=(!isNaN(parseInt(v)));
                if(u){
                    c++
                }
            }
            if(n.length==0){
                n="0"
            }
            if(w){
                this.numberInput.val(n)
            }else{
                this.ValueString=n
            }
            var o=n.substring(0,1);
            if(o==g&&isNaN(parseInt(o))){
                var z="0"+n;
                n=z
            }
            this.ValueString=this.GetValueString(n,g,l);
            this.decimal=this.ValueString;
            this._parseDecimalInSimpleMode();
            this._setSelectionStart(r);
            return c
        },
        InsertDigit:function(w,C){
            if(typeof this.digits!="number"){
                this.digits=parseInt(this.digits)
            }
            if(typeof this.decimalDigits!="number"){
                this.decimalDigits=parseInt(this.decimalDigits)
            }
            var l=1+this.digits;
            var D=this._selection();
            var q=this.getvalue("negative");
            var d=false;
            if(D.start==0&&this.symbol!=""&&this.symbolPosition=="left"){
                this._setSelectionStart(D.start+1);
                D=this._selection();
                d=true
            }
            if((q&&d)||(q&&!d&&D.start==0)){
                this._setSelectionStart(D.start+1);
                D=this._selection()
            }
            var A=this.numberInput.val().substring(D.start,D.start+1);
            var s=this.numberInput.val();
            var g=this.decimalSeparator;
            var n=g!=""&&this.decimalDigits>0;
            if(A==this.symbol&&this.symbolPosition=="right"){
                if(this.decimalDigits==0){
                    this.ValueString=this.GetValueString(s,g,n);
                    if(this.ValueString.length>=l){
                        return
                    }
                }else{
                    return
                }
            }
            this.ValueString=this.GetValueString(s,g,n);
            var z=this.ValueString;
            if(this.decimalDigits>0&&C>=z.length){
                C=z.length-1
            }
            var u="";
            if(C<z.length){
                u=z.substring(C,C+1)
            }
            var h=false;
            var B=false;
            var e=this.GetInsertTypeByPositionInValue(C,g,s,n);
            if(e=="after"){
                h=true
            }
            var b=n?1:0;
            if(u!="."&&(this.ValueString.length-this.decimalDigits-b)>=l-1){
                h=true
            }
            var v=false;
            var x=n?1:0;
            if(!h&&this.ValueString&&this.ValueString.length>=this.digits+this.decimalDigits+x){
                return
            }
            if(h&&u!="."){
                if(v){
                    C++
                }
                var r=z.substring(0,C);
                if(r.length==z.length){
                    if(this.ValueString.length>=this.digits+this.decimalDigits+x){
                        return
                    }
                }
                var y=w;
                var c="";
                if(C+1<z.length){
                    c=z.substring(C+1)
                }
                var o=r+y+c;
                this.ValueString=o
            }else{
                var r=z.substring(0,C);
                var y=w;
                var c=z.substring(C);
                var o=r+y+c;
                if(z.substring(0,1)=="0"){
                    o=y+z.substring(1);
                    if(u=="."){
                        this._setSelectionStart(D.start-1);
                        D=this._selection()
                    }
                }
                this.ValueString=o
            }
            if(q){
                this.decimal=-this.ValueString
            }else{
                this.decimal=this.ValueString
            }
            this._parseDecimalInSimpleMode();
            var f=D.start;
            f+=1;
            this._setSelectionStart(f);
            this.value=this.decimal;
            this._raiseEvent(0,this.value);
            this._raiseEvent(1,this.numberInput.val())
        },
        GetStringToSeparator:function(h,f,e){
            var d="";
            var b=f;
            var g=this.GetSeparatorPositionInText(f,h);
            var c=h.subString(0,g);
            d=this.GetValueString(c,f,e);
            return d
        },
        GetSeparatorPositionInText:function(c,d){
            var b=-1;
            for(i=0;i<d.length;i++){
                if(d.substring(i,i+1)==c){
                    b=i;
                    break
                }
            }
            return b
        },
        GetValueString:function(g,f,e){
            var c="";
            for(i=0;i<g.length;i++){
                var d=g.substring(i,i+1);
                var b=(!isNaN(parseInt(d)));
                if(b){
                    c+=d
                }
                if(d==f){
                    c+=f
                }
            }
            return c
        },
        Backspace:function(){
            var d=this._selection();
            var e=this._selection();
            var f=this.numberInput.val();
            if(d.start==0&&d.length==0){
                return
            }
            this.isBackSpace=true;
            var c=f.substring[d.start,d.start+1];
            var b=(!isNaN(parseInt(c)));
            if(d.start>0&&d.length==0){
                this._setSelectionStart(d.start-1);
                var d=this._selection()
            }
            this.Delete();
            this._setSelectionStart(e.start-1);
            this.isBackSpace=false
        },
        Delete:function(c){
            var e=this._selection();
            var g=this.numberInput.val();
            var f=e.start;
            var h=e.length;
            h=Math.max(h,1);
            this.ValueString=this.GetValueString(g,this.decimalSeparator,this.decimalSeparator!="");
            this.RemoveRange(e.start,h,this.ValueString,".",false);
            var d=this.ValueString.substring(0,1);
            var b=(!isNaN(parseInt(d)));
            if(!b){
                this.ValueString="0"+this.ValueString
            }
            this.decimal=this.ValueString;
            this._parseDecimalInSimpleMode();
            this._setSelectionStart(f);
            this.value=this.decimal;
            this._raiseEvent(0,this.value);
            this._raiseEvent(1,this.numberInput.val())
        },
        insertsimple:function(d){
            var l=this._selection();
            var n=this.numberInput.val();
            if(l.start==n.length&&this.decimalDigits>0){
                return
            }
            var b=this.decimal;
            var g=this.decimalSeparator;
            this.ValueString=this.GetValueString(n,g,g!="");
            var h=this.GetSelectionInValue(l.start,n,g,g!="");
            var e=this.GetSelectionLengthInValue(l.start,l.length,n,g);
            var f=this.GetDigitsToSeparator(0,this.ValueString);
            var c=false;
            if(this.decimalDigits>0&&h>=this.ValueString.length){
                h--
            }
            this.RemoveRange(l.start,e,this.ValueString,g,false,true);
            this.InsertDigit(d,h,l)
        },
        GetDigitsToSeparator:function(c,b){
            if(b.indexOf(".")<0){
                return b.length
            }
            for(i=0;i<b.length;i++){
                if(b.substring(i,i+1)=="."){
                    c=i;
                    break
                }
            }
            return c
        },
        _handleSimpleKeyDown:function(g,s){
            var r=this._selection();
            if(r.start>=0&&r.start<this.items.length){
                var c=String.fromCharCode(s)
            }
            if(s==8){
                this.Backspace();
                return false
            }
            if(s==190||s==110){
                var f=this.GetSeparatorPositionInText(".",this.numberInput.val());
                this._setSelectionStart(f+1);
                return false
            }
            if(s==188){
                var q=this.numberInput.val();
                for(d=r.start;d<q.length;d++){
                    if(q[d]==this.groupSeparator){
                        this._setSelectionStart(1+d);
                        break
                    }
                }
                return false
            }
            if((g.ctrlKey&&s==99)||(g.ctrlKey&&s==67)){
                var r=this._selection();
                var u="";
                var o=this.numberInput.val();
                if(r.start>0||r.length>0){
                    for(var d=r.start;d<r.end;d++){
                        u+=o.substring(d,d+1)
                    }
                }
                if(a.browser.msie){
                    window.clipboardData.setData("Text",u)
                }
                this.savedText=u;
                return false
            }
            if((g.ctrlKey&&s==122)||(g.ctrlKey&&s==90)){
                return false
            }
            if((g.ctrlKey&&s==118)||(g.ctrlKey&&s==86)||(g.shiftKey&&s==45)){
                if(this.savedText!=null&&this.savedText.length>0){
                    for(var d=0;d<this.savedText.length;d++){
                        var l=parseInt(this.savedText.substring(d,d+1));
                        if(!isNaN(l)){
                            this.insertsimple(l)
                        }
                    }
                }
                return false
            }
            var c=String.fromCharCode(s);
            var l=parseInt(c);
            if(s>=96&&s<=105){
                l=s-96;
                s=s-48
            }
            if(!isNaN(l)){
                var h=this;
                this.insertsimple(l);
                return false
            }
            if(s==46){
                this.Delete();
                return false
            }
            if(s==189||s==45){
                var b=this.getvalue("negative");
                if(b==false){
                    this.setvalue("negative",true)
                }else{
                    this.setvalue("negative",false)
                }
                this._parseDecimalInSimpleMode();
                this._setSelectionStart(r.start)
            }
            if(s==38){
                this.spinUp();
                return false
            }else{
                if(s==40){
                    this.spinDown();
                    return false
                }
            }
            var n=this._isSpecialKey(s);
            if(!a.browser.mozilla){
                return true
            }
            return n
        },
        _getEditRange:function(){
            var c=0;
            var b=0;
            for(i=0;i<this.items.length;i++){
                if(this.items[i].canEdit){
                    c=i;
                    break
                }
            }
            for(i=this.items.length-1;i>=0;i--){
                if(this.items[i].canEdit){
                    b=i;
                    break
                }
            }
            return{
                start:c,
                end:b
            }
        },
        _getVisibleItems:function(){
            var b=new Array();
            var c=0;
            for(i=0;i<this.items.length;i++){
                if(this.items[i].character.toString().length>0){
                    b[c]=this.items[i];
                    c++
                }
            }
            return b
        },
        _hasEmptyVisibleItems:function(){
            var b=this._getVisibleItems();
            for(i=0;i<b.length;i++){
                if(b[i].canEdit&&b[i].character==this.promptChar){
                    return true
                }
            }
            return false
        },
        _getFirstVisibleNonEmptyIndex:function(){
            var b=this._getVisibleItems();
            for(i=0;i<b.length;i++){
                if(b[i].canEdit&&b[i].character!=this.promptChar){
                    return i
                }
            }
        },
        _handleMouse:function(f,b){
            var d=this._selection();
            if(d.length<=1){
                var c=this._getFirstVisibleNonEmptyIndex();
                if(d.start<c){
                    this._setSelectionStart(c)
                }
            }
        },
        _insertKey:function(l){
            this.numberInput[0].focus();
            var d=String.fromCharCode(l);
            var e=parseInt(d);
            if(isNaN(e)){
                return
            }
            var q=0;
            for(i=0;i<this.items.length;i++){
                if(this.items[i].character.length==0){
                    q++
                }
            }
            var g=this._selection();
            var b=this;
            if(g.start>=0&&g.start<=this.items.length){
                var f=false;
                var h=this._getFirstVisibleNonEmptyIndex();
                if(g.start<h&&g.length==0){
                    if(!isNaN(d)||d==" "){
                        this._setSelectionStart(h);
                        g=this._selection()
                    }
                }
                var c=this._getFirstEditableItemIndex();
                var o=this._getLastEditableItemIndex();
                var n=this._getVisibleItems();
                a.each(n,function(y,C){
                    if(g.start>y&&y!=n.length-1){
                        return
                    }
                    var F=n[y];
                    if(y>o){
                        F=n[o]
                    }
                    if(isNaN(d)||d==" "){
                        return
                    }
                    if(!F.canEdit){
                        return
                    }
                    var B=b._getSeparatorPosition();
                    if(b._match(d,F.regex)){
                        if(!f&&g.length>0){
                            for(j=g.start+q;j<g.end+q;j++){
                                if(b.items[j].canEdit){
                                    if(j>B){
                                        b.items[j].character="0"
                                    }else{
                                        b.items[j].character=b.promptChar
                                    }
                                }
                            }
                            var E=b._getString();
                            f=true
                        }
                        var B=b._getSeparatorPosition();
                        var z=b._hasEmptyVisibleItems();
                        if(g.start<=B&&z){
                            var w=y;
                            if(b.decimalSeparatorPosition==-1&&g.start==B){
                                w=y+1
                            }
                            var v="";
                            for(p=0;p<w;p++){
                                if(n[p].canEdit&&n[p].character!=b.promptChar){
                                    v+=n[p].character
                                }
                            }
                            v+=d;
                            var x=b.decimal<1?1:0;
                            if(g.start==B&&b.decimalSeparatorPosition!=-1){
                                v+=b.decimalSeparator;
                                x=0
                            }
                            for(p=w+x;p<n.length;p++){
                                if(n[p].character==b.decimalSeparator&&n[p].isSeparator){
                                    v+=n[p].character
                                }else{
                                    if(n[p].canEdit&&n[p].character!=b.promptChar){
                                        v+=n[p].character
                                    }
                                }
                            }
                            if(b.decimalSeparator!="."){
                                v=b._parseDecimalValue(v)
                            }
                            v=parseFloat(v).toString();
                            v=new Number(v);
                            v=v.toFixed(b.decimalDigits);
                            if(b.decimalSeparator!="."){
                                v=b._parseDecimalValueToEditorValue(v)
                            }
                            b.setvalue("decimal",v);
                            var E=b._getString();
                            if(g.end<B){
                                b._setSelectionStart(g.end+x)
                            }else{
                                b._setSelectionStart(g.end)
                            }
                            if(g.length>=1){
                                b._setSelectionStart(g.end)
                            }
                            if(g.length==b.numberInput.val().length){
                                var r=b._moveCaretToDecimalSeparator();
                                var D=b.decimalSeparatorPosition>=0?1:0;
                                b._setSelectionStart(r-D)
                            }
                        }else{
                            if(g.start<B||g.start>B){
                                if(b.numberInput.val().length==g.start&&b.decimalSeparatorPosition!=-1){
                                    return false
                                }else{
                                    if(b.numberInput.val().length==g.start&&b.decimalSeparatorPosition==-1&&!z){
                                        return false
                                    }
                                }
                                var v="";
                                var s=false;
                                for(p=0;p<y;p++){
                                    if(n[p].canEdit&&n[p].character!=b.promptChar){
                                        v+=n[p].character
                                    }
                                    if(n[p].character==b.decimalSeparator&&n[p].isSeparator){
                                        v+=n[p].character;
                                        s=true
                                    }
                                }
                                v+=d;
                                var x=b.decimal<1?1:0;
                                if(!s&&g.start==B-1){
                                    v+=b.decimalSeparator;
                                    s=true
                                }
                                for(p=y+1;p<n.length;p++){
                                    if(!s&&n[p].character==b.decimalSeparator&&n[p].isSeparator){
                                        v+=n[p].character
                                    }else{
                                        if(n[p].canEdit&&n[p].character!=b.promptChar){
                                            v+=n[p].character
                                        }
                                    }
                                }
                                b.setvalue("decimal",v);
                                var E=b._getString();
                                if(b.decimalSeparatorPosition<0&&F==n[o]){
                                    b._setSelectionStart(y);
                                    return false
                                }
                                var A=E.indexOf(b.symbol);
                                var u=!b.getvalue("negative")?0:1;
                                if(A<=u){
                                    A=E.length
                                }
                                if(g.start<A){
                                    b._setSelectionStart(y+1)
                                }else{
                                    b._setSelectionStart(y)
                                }
                                if(g.length>=1){}
                                if(g.length==b.numberInput.val().length){
                                    var r=b._moveCaretToDecimalSeparator();
                                    b._setSelectionStart(r-1)
                                }
                            }
                        }
                        return false
                    }
                })
            }
        },
        _handleKeyPress:function(h,d){
            var f=this._selection();
            var b=this;
            if((h.ctrlKey&&d==97)||(h.ctrlKey&&d==65)){
                return true
            }
            if(d==8){
                if(f.start>0){
                    b._setSelectionStart(f.start)
                }
                return false
            }
            if(d==46){
                if(f.start<this.items.length){
                    b._setSelectionStart(f.start)
                }
                return false
            }
            if(d==45){
                var c=this.getvalue("negative");
                if(c==false){
                    this.setvalue("negative",true)
                }else{
                    this.setvalue("negative",false)
                }
            }
            if(a.browser.msie){
                this._insertKey(d)
            }
            var g=this._isSpecialKey(d);
            return g
        },
        _deleteSelectedText:function(){
            var d=this._selection();
            var c="";
            var f=this._getSeparatorPosition();
            var b=this._getVisibleItems();
            var e=this._getHiddenPrefixCount();
            if(this.numberInput.val().length==d.start&&d.length==0){
                this._setSelection(d.start,d.start+1);
                d=this._selection()
            }
            for(i=0;i<d.start;i++){
                if(b[i].canEdit&&b[i].character!=this.promptChar){
                    c+=b[i].character
                }else{
                    if(!b[i].canEdit&&this.decimalSeparatorPosition!=-1&&b[i]==b[this.decimalSeparatorPosition-e]){
                        if(c.length==0){
                            c="0"
                        }
                        c+=b[i].character
                    }
                }
            }
            for(i=d.start;i<d.end;i++){
                if(i>f&&this.decimalSeparatorPosition!=-1){
                    if(b[i].canEdit&&b[i].character!=this.promptChar){
                        c+="0"
                    }
                }else{
                    if(!b[i].canEdit&&this.decimalSeparatorPosition!=-1&&b[i]==b[this.decimalSeparatorPosition-e]){
                        if(c.length==0){
                            c="0"
                        }
                        c+=b[i].character
                    }
                }
            }
            for(i=d.end;i<b.length;i++){
                if(b[i].canEdit&&b[i].character!=this.promptChar){
                    c+=b[i].character
                }else{
                    if(!b[i].canEdit&&this.decimalSeparatorPosition!=-1&&b[i]==b[this.decimalSeparatorPosition-e]){
                        if(c.length==0){
                            c="0"
                        }
                        c+=b[i].character
                    }
                }
            }
            this.setvalue("decimal",c);
            return d.length>0
        },
        _restoreInitialState:function(){
            var b=parseInt(this.decimalDigits);
            if(b>0){
                b+=2
            }
            for(k=this.items.length-1;k>this.items.length-1-b;k--){
                if(this.items[k].canEdit&&this.items[k].character==this.promptChar){
                    this.items[k].character=0
                }
            }
        },
        clearDecimal:function(){
            if(this.inputMode=="textbox"){
                this.numberInput.val();
                return
            }
            for(i=0;i<this.items.length;i++){
                if(this.items[i].canEdit){
                    this.items[i].character=this.promptChar
                }
            }
            this._restoreInitialState()
        },
        _saveSelectedText:function(){
            var c=this._selection();
            var d="";
            var b=this._getVisibleItems();
            if(c.start>0||c.length>0){
                for(i=c.start;i<c.end;i++){
                    if(b[i].canEdit&&b[i].character!=this.promptChar){
                        d+=b[i].character
                    }else{
                        if(b[i].isSeparator){
                            d+=b[i].character
                        }
                    }
                }
            }
            if(a.browser.msie){
                window.clipboardData.setData("Text",d)
            }
            return d
        },
        _pasteSelectedText:function(){
            var f=this._selection();
            var l="";
            var e=0;
            if(window.clipboardData){
                var d=window.clipboardData.getData("Text");
                if(d!=this.selectedText&&d.length>0){
                    this.selectedText=window.clipboardData.getData("Text");
                    if(this.selectedText==null||this.selectedText==undefined){
                        return
                    }
                }
            }
            var c=f.start;
            var b=this._getVisibleItems();
            this.selectedText=a.data(document.body,"jqxSelection");
            for(t=0;t<this.selectedText.length;t++){
                var g=parseInt(this.selectedText[t]);
                if(!isNaN(g)){
                    var h=48+g;
                    this._insertKey(h)
                }
            }
        },
        _getHiddenPrefixCount:function(){
            var b=0;
            if(!this.negative){
                b++
            }
            if(this.symbolPosition=="left"){
                for(i=0;i<this.symbol.length;i++){
                    if(this.symbol.substring(i,i+1)==""){
                        b++
                    }
                }
            }
            return b
        },
        _getEditableItem:function(){
            var b=this._selection();
            for(i=0;i<this.items.length;i++){
                if(i<b.start){
                    if(this.items[i].canEdit&&this.items[i].character!=this.promptChar){
                        return this.items[i]
                    }
                }
            }
            return null
        },
        _getEditableItems:function(){
            var c=new Array();
            var b=0;
            for(i=0;i<this.items.length;i++){
                if(this.items[i].canEdit){
                    c[b]=this.items[i];
                    b++
                }
            }
            return c
        },
        _getValidSelectionStart:function(b){
            for(i=this.items.length-1;i>=0;i--){
                if(this.items[i].canEdit&&this.items[i].character!=this.promptChar){
                    return i
                }
            }
            return -1
        },
        _getEditableItemIndex:function(c){
            var e=this._selection();
            var f=this._getHiddenPrefixCount();
            var b=this._getVisibleItems();
            var d=e.start;
            var g=-1;
            for(i=0;i<d;i++){
                if(i<b.length&&b[i].canEdit){
                    g=i+f
                }
            }
            if(g==-1&&e.length>0){
                d=e.end;
                for(i=0;i<d;i++){
                    if(i<b.length&&b[i].canEdit){
                        g=i+f;
                        break
                    }
                }
            }
            return g
        },
        _getEditableItemByIndex:function(b){
            for(k=0;k<this.items.length;k++){
                if(k>b){
                    if(this.items[k].canEdit&&this.items[k].character!=this.promptChar){
                        return k
                    }
                }
            }
            return -1
        },
        _getFirstEditableItemIndex:function(){
            var b=this._getVisibleItems();
            for(m=0;m<b.length;m++){
                if(b[m].character!=this.promptChar&&b[m].canEdit&&b[m].character!="0"){
                    return m
                }
            }
            return -1
        },
        _getLastEditableItemIndex:function(){
            var b=this._getVisibleItems();
            for(m=b.length-1;m>=0;m--){
                if(b[m].character!=this.promptChar&&b[m].canEdit){
                    return m
                }
            }
            return -1
        },
        _moveCaretToDecimalSeparator:function(){
            for(i=this.items.length-1;i>=0;i--){
                if(this.items[i].character==this.decimalSeparator&&this.items[i].isSeparator){
                    if(!this.negative){
                        this._setSelectionStart(i);
                        return i
                    }else{
                        this._setSelectionStart(i+1);
                        return i
                    }
                    break
                }
            }
            return this.numberInput.val().length
        },
        _handleBackspace:function(){
            var e=this._selection();
            var f=this._getHiddenPrefixCount();
            var b=this._getEditableItemIndex()-f;
            if(b>=0){
                if(e.length==0&&b!=-1){
                    this._setSelection(b,b+1)
                }
                var g=e.start>this._getSeparatorPosition()+1&&this.decimalSeparatorPosition>0;
                if(g){
                    e=this._selection()
                }
                var d=this._deleteSelectedText();
                if(e.length<1||g){
                    this._setSelectionStart(e.start)
                }else{
                    if(e.length>=1){
                        this._setSelectionStart(e.end)
                    }
                }
                if(e.length==this.numberInput.val().length){
                    var c=this._moveCaretToDecimalSeparator();
                    this._setSelectionStart(c-1)
                }
            }else{
                this._setSelectionStart(e.start)
            }
        },
        _handleKeyDown:function(d,o){
            var n=this._selection();
            if((d.ctrlKey&&o==97)||(d.ctrlKey&&o==65)){
                return true
            }
            if((d.ctrlKey&&o==120)||(d.ctrlKey&&o==88)){
                this.selectedText=this._saveSelectedText(d);
                a.data(document.body,"jqxSelection",this.selectedText);
                this._handleBackspace();
                return false
            }
            if((d.ctrlKey&&o==99)||(d.ctrlKey&&o==67)){
                this.selectedText=this._saveSelectedText(d);
                a.data(document.body,"jqxSelection",this.selectedText);
                return false
            }
            if((d.ctrlKey&&o==122)||(d.ctrlKey&&o==90)){
                return false
            }
            if((d.ctrlKey&&o==118)||(d.ctrlKey&&o==86)||(d.shiftKey&&o==45)){
                this._pasteSelectedText();
                return false
            }
            if(n.start>=0&&n.start<this.items.length){
                var b=String.fromCharCode(o);
                var r=this.items[n.start]
            }
            if(o==8){
                this._handleBackspace();
                return false
            }
            if(o==190||o==110){
                this._moveCaretToDecimalSeparator();
                return false
            }
            if(o==188){
                var l=this.numberInput.val();
                for(i=n.start;i<l.length;i++){
                    if(l[i]==this.groupSeparator){
                        this._setSelectionStart(1+i);
                        break
                    }
                }
                return false
            }
            if(a.browser.msie==null){
                var b=String.fromCharCode(o);
                var g=parseInt(b);
                if(o>=96&&o<=105){
                    g=o-96;
                    o=o-48
                }
                if(!isNaN(g)){
                    var f=this;
                    f._insertKey(o);
                    return false
                }
            }
            if(o==46){
                var q=this._getVisibleItems();
                if(n.start<q.length){
                    var c=q[n.start].canEdit==false?2:1;
                    if(n.length==0){
                        this._setSelection(n.start+c,n.start+c+n.length)
                    }
                    this._handleBackspace();
                    if(new Number(this.decimal)<1||n.start>this._getSeparatorPosition()){
                        this._setSelectionStart(n.end+c)
                    }else{
                        if(n.start+1<this.decimalSeparatorPosition){
                            this._setSelectionStart(n.end+c)
                        }
                    }
                }
                return false
            }
            if(o==38){
                this.spinUp();
                return false
            }else{
                if(o==40){
                    this.spinDown();
                    return false
                }
            }
            var h=this._isSpecialKey(o);
            if(!a.browser.mozilla){
                return true
            }
            return h
        },
        _isSpecialKey:function(b){
            if(b!=8&&b!=9&&b!=13&&b!=35&&b!=36&&b!=37&&b!=39&&b!=27&&b!=46){
                return false
            }
            return true
        },
        _selection:function(){
            if("selectionStart" in this.numberInput[0]){
                var f=this.numberInput[0];
                var g=f.selectionEnd-f.selectionStart;
                return{
                    start:f.selectionStart,
                    end:f.selectionEnd,
                    length:g,
                    text:f.value
                }
            }else{
                var c=document.selection.createRange();
                if(c==null){
                    return{
                        start:0,
                        end:f.value.length,
                        length:0
                    }
                }
                var b=this.numberInput[0].createTextRange();
                var d=b.duplicate();
                b.moveToBookmark(c.getBookmark());
                d.setEndPoint("EndToStart",b);
                var g=c.text.length;
                return{
                    start:d.text.length,
                    end:d.text.length+c.text.length,
                    length:g,
                    text:c.text
                }
            }
        },
        _setSelection:function(e,b){
            try{
                if("selectionStart" in this.numberInput[0]){
                    this.numberInput[0].focus();
                    this.numberInput[0].setSelectionRange(e,b)
                }else{
                    var c=this.numberInput[0].createTextRange();
                    c.collapse(true);
                    c.moveEnd("character",b);
                    c.moveStart("character",e);
                    c.select()
                }
            }catch(d){}
        },
        _setSelectionStart:function(b){
            this._setSelection(b,b);
            a.data(this.numberInput,"selectionstart",b)
        },
        _render:function(f){
            var c=parseInt(this.host.css("border-left-width"));
            var h=parseInt(this.host.css("border-left-width"));
            var g=parseInt(this.host.css("border-left-width"));
            var d=parseInt(this.host.css("border-left-width"));
            var n=parseInt(this.host.css("height"))-g-d;
            var e=parseInt(this.host.css("width"))-c-h;
            if(this.width!=null&&this.width.toString().indexOf("px")!=-1){
                e=this.width
            }else{
                if(this.width!=undefined&&!isNaN(this.width)){
                    e=this.width
                }
            }
            if(this.height!=null&&this.height.toString().indexOf("px")!=-1){
                n=this.height
            }else{
                if(this.height!=undefined&&!isNaN(this.height)){
                    n=this.height
                }
            }
            e=parseInt(e);
            n=parseInt(n);
            this.numberInput.css({
                "border-left-width":0,
                "border-right-width":0,
                "border-bottom-width":0,
                "border-top-width":0
            });
            this.numberInput.css("text-align",this.textAlign);
            var o=this.numberInput.css("font-size");
            if(!isNaN(n)){
                this.numberInput.css("height",parseInt(o)+4+"px")
            }
            if(!isNaN(e)){
                this.numberInput.css("width",e-2)
            }
            var l=n-2*g-2*d-parseInt(o);
            if(isNaN(l)){
                l=0
            }
            if(!isNaN(n)){
                this.host.height(n)
            }
            if(!isNaN(e)){
                this.host.width(e)
            }
            if(this.spinButtons){
                e-=parseInt(this.spinButtonsWidth-2);
                this.spincontainer.width(this.spinButtonsWidth);
                this.upbutton.width(this.spinButtonsWidth+2);
                this.downbutton.width(this.spinButtonsWidth+2);
                this.upbutton.height(Math.round(n/2));
                this.downbutton.height(Math.round(n/2));
                this.spincontainer.width(this.spinButtonsWidth);
                this.numberInput.css("width",e-5);
                this.numberInput.css("margin-right","2px")
            }
            var b=l/2;
            if(a.browser.msie&&a.browser.version<8){
                b=l/4
            }
            this.numberInput.css("padding-left","0px");
            this.numberInput.css("padding-right","0px");
            this.numberInput.css("padding-top",b);
            this.numberInput.css("padding-bottom",l/2);
            if(f==undefined||f==true){
                this.numberInput.val(this._getString());
                if(this.inputMode!="advanced"){
                    this._parseDecimalInSimpleMode()
                }
            }
        },
        destroy:function(){
            this._removeHandlers();
            this.host.remove()
        },
        inputValue:function(b){
            if(b===undefined){
                return this._value()
            }
            this.propertyChangedHandler(this,"value",this._value,b);
            this._refreshValue();
            return this
        },
        _value:function(){
            var b=this.numberInput.val();
            return b
        },
        val:function(b){
            if(b!=undefined&&typeof b!="object"){
                this.setDecimal(b)
            }else{
                return this.getDecimal()
            }
        },
        getDecimal:function(){
            if(this.inputMode=="simple"){
                this._parseDecimalInSimpleMode()
            }
            var b=this.getvalue("negative");
            if(b&&this.decimal>0){
                return -this.decimal
            }
            return this.decimal
        },
        setDecimal:function(d){
            var b=d;
            if(this.decimalSeparator!="."){
                d=d.toString();
                var f=d.indexOf(".");
                if(f!=-1){
                    var c=d.substring(0,f);
                    var e=d.substring(f+1);
                    d=c+this.decimalSeparator+e
                }
                if(d<0){
                    this.setvalue("negative",true)
                }else{
                    this.setvalue("negative",false)
                }
                this._setDecimal(d)
            }else{
                if(d<0){
                    this.setvalue("negative",true)
                }else{
                    this.setvalue("negative",false)
                }
                this._setDecimal(Math.abs(d))
            }
            if(b==null){
                this.numberInput.val("")
            }
        },
        _setDecimal:function(l){
            if(l==null||l==undefined){
                l=0
            }
            if(l.toString().indexOf("e")!=-1){
                l=0
            }
            this.clearDecimal();
            var n=l.toString();
            var o="";
            var b="";
            var c=true;
            if(n.length==0){
                n="0"
            }
            for(var e=0;e<n.length;e++){
                if(n.substring(e,e+1)==this.decimalSeparator){
                    c=false;
                    continue
                }
                if(c){
                    o+=n.substring(e,e+1)
                }else{
                    b+=n.substring(e,e+1)
                }
            }
            if(o.length>0){
                o=parseFloat(o).toString()
            }
            var g=this.digits;
            if(g<o.length){
                o=o.substr(0,g)
            }
            var d=0;
            var h=this._getSeparatorPosition();
            var f=this._getHiddenPrefixCount();
            h=h+f;
            for(e=h;e>=0;e--){
                if(e<this.items.length&&this.items[e].canEdit){
                    if(d<o.length){
                        this.items[e].character=o.substring(o.length-d-1,o.length-d);
                        d++
                    }
                }
            }
            d=0;
            for(e=h;e<this.items.length;e++){
                if(this.items[e].canEdit){
                    if(d<b.length){
                        this.items[e].character=b.substring(d,d+1);
                        d++
                    }
                }
            }
            this._refreshValue();
            this.ValueString=new Number(l).toFixed(this.decimalDigits);
            if(this.inputMode!="advanced"){
                this._parseDecimalInSimpleMode();
                this._raiseEvent(1,this.ValueString)
            }
        },
        _getSeparatorPosition:function(){
            var b=this._getHiddenPrefixCount();
            if(this.decimalSeparatorPosition>0){
                return this.decimalSeparatorPosition-b
            }
            return this.items.length-b
        },
        _setTheme:function(){
            this.host.removeClass();
            this.host.addClass(this.toThemeProperty("jqx-input"));
            this.host.addClass(this.toThemeProperty("jqx-rc-all"));
            this.host.addClass(this.toThemeProperty("jqx-widget"));
            this.host.addClass(this.toThemeProperty("jqx-widget-content"));
            if(this.spinButtons){
                this.downbutton.removeClass();
                this.upbutton.removeClass();
                this.downbutton.addClass(this.toThemeProperty("jqx-scrollbar-button-state-normal"));
                this.upbutton.addClass(this.toThemeProperty("jqx-scrollbar-button-state-normal"));
                this._upArrow.removeClass();
                this._downArrow.removeClass();
                this._upArrow.addClass(this.toThemeProperty("icon-arrow-up"));
                this._downArrow.addClass(this.toThemeProperty("icon-arrow-down"))
            }
            this.numberInput.removeClass();
            this.numberInput.addClass(this.toThemeProperty("jqx-input-content"))
        },
        propertyChangedHandler:function(c,d,g,f){
            if(d=="digits"||d=="groupSize"||d=="decimalDigits"){
                if(f<0){
                    throw new Exception(this.invalidArgumentExceptions[0])
                }
            }
            if(d==="theme"){
                a.jqx.utilities.setTheme(g,f,c.host)
            }
            if(d=="digits"){
                if(f!=g){
                    c.digits=parseInt(f)
                }
            }
            if(d=="decimalDigits"){
                if(f!=g){
                    c.decimalDigits=parseInt(f)
                }
            }
            if(d=="digits"||d=="symbol"||d=="symbolPosition"||d=="groupSize"||d=="groupSeparator"||d=="decimalDigits"||d=="negativeSymbol"){
                var b=c.decimal;
                if(g!=f){
                    var e=c._selection();
                    c.items=new Array();
                    c._initializeLiterals();
                    c.value=c._getString();
                    c._refreshValue();
                    c._setSelection(e.start,e.end);
                    c._setDecimal(b)
                }
            }
            if(d=="spinButtons"){
                if(!f){
                    c.spincontainer.css("display","none")
                }else{
                    c.spincontainer.css("display","block")
                }
                c._render()
            }
            if(d=="negative"&&c.inputMode=="advanced"){
                var e=c._selection();
                var h=0;
                if(f){
                    c.items[0].character=c.negativeSymbol[0];
                    h=1
                }else{
                    c.items[0].character="";
                    h=-1
                }
                c._refreshValue();
                if(c.isInitialized){
                    c._setSelection(e.start+h,e.end+h)
                }
            }
            if(d=="decimal"){
                c.setDecimal(f)
            }
            if(d==="value"){
                c.value=f;
                c.setDecimal(f);
                c._raiseEvent(1,f)
            }
            if(d=="textAlign"){
                c.textAlign=f;
                c._render()
            }
            if(d=="disabled"){
                c.numberInput.attr("disabled",f);
                if(c.disabled){
                    c.host.addClass(c.toThemeProperty("jqx-fill-state-disabled"))
                }else{
                    c.host.removeClass(c.toThemeProperty("jqx-fill-state-disabled"))
                }
            }
            if(d=="readOnly"){
                c.readOnly=f
            }
            if(d=="promptChar"){
                for(i=0;i<c.items.length;i++){
                    if(c.items[i].character==c.promptChar){
                        c.items[i].character=f
                    }
                }
                c.promptChar=f
            }
            if(d=="width"){
                c.width=f;
                c._render()
            }else{
                if(d=="height"){
                    c.height=f;
                    c._render()
                }
            }
        },
        _value:function(){
            var b=this.value;
            return b
        },
        _refreshValue:function(){
            var e=this.value;
            var b=0;
            this.value=this._getString();
            e=this.value;
            var d="";
            for(i=0;i<this.items.length;i++){
                if(this.items[i].canEdit&&this.items[i].character!=this.promptChar){
                    d+=this.items[i].character
                }
                if(i==this.decimalSeparatorPosition){
                    d+="."
                }
            }
            this.decimal=d;
            var c=false;
            if(this.oldValue!==e){
                this.oldValue=e;
                this._raiseEvent(0,e);
                c=true
            }
            if(this.inputMode!="simple"){
                this.numberInput.val(e);
                if(c){
                    this._raiseEvent(1,e)
                }
            }
            if(e==null){
                this.numberInput.val("")
            }
        }
    })
})(jQuery);