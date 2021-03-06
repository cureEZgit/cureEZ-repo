/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.jqx.jqxWidget("jqxDropDownList","",{});
    a.extend(a.jqx._jqxDropDownList.prototype,{
        defineInstance:function(){
            this.disabled=false;
            this.width=null;
            this.height=null;
            this.items=new Array();
            this.selectedIndex=-1;
            this.source=null;
            this.scrollBarSize=15;
            this.arrowSize=19;
            this.enableHover=true;
            this.enableSelection=true;
            this.visualItems=new Array();
            this.groups=new Array();
            this.equalItemsWidth=true;
            this.itemHeight=-1;
            this.visibleItems=new Array();
            this.emptyGroupText="Group";
            this.checkboxes=false;
            if(this.openDelay==undefined){
                this.openDelay=350
            }
            if(this.closeDelay==undefined){
                this.closeDelay=400
            }
            this.animationType="default";
            this.autoOpen=false;
            this.dropDownWidth="auto";
            this.dropDownHeight="200px";
            this.autoDropDownHeight=false;
            this.keyboardSelection=true;
            this.enableBrowserBoundsDetection=false;
            this.dropDownHorizontalAlignment="left";
            this.displayMember="";
            this.valueMember="";
            this.searchMode="startswithignorecase";
            this.incrementalSearch=true;
            this.incrementalSearchDelay=700;
            this.renderer=null;
            this.events=["open","close","select","unselect","change","checkChange"]
        },
        createInstance:function(h){
            this.isanimating=false;
            if(this.element.id==""){
                this.element.id=a.jqx.utilities.createId()
            }
            var d=a("<div tabIndex=0 style='background-color: transparent; -webkit-appearance: none; outline: none; width:100%; height: 100%; padding: 0px; margin: 0px; border: 0px; position: relative;'><div id='dropdownlistWrapper' style='outline: none; background-color: transparent; border: none; float: left; width:100%; height: 100%; position: relative;'><div id='dropdownlistContent' style='outline: none; background-color: transparent; border: none; float: left; position: relative;'/><div id='dropdownlistArrow' style='background-color: transparent; border: none; float: right; position: relative;'><div></div></div></div></div>");
            if(a.jqx._jqxListBox==null||a.jqx._jqxListBox==undefined){
                alert("jqxListBox is not loaded.")
            }
            var i=this;
            this.addHandler(this.host,"loadContent",function(e){
                i._arrange()
            });
            try{
                var k="listBox"+this.element.id;
                var f=a(a.find("#"+k));
                if(f.length>0){
                    f.remove()
                }
                var b=a("<div style='overflow: hidden; background-color: transparent; border: none; position: absolute;' id='listBox"+this.element.id+"'><div id='innerListBox"+this.element.id+"'></div></div>");
                if(a.jqx.utilities.getBrowser().browser=="opera"){
                    b.hide()
                }
                b.appendTo(document.body);
                this.container=b;
                this.listBoxContainer=a(a.find("#innerListBox"+this.element.id));
                var c=this.width;
                if(this.dropDownWidth!="auto"){
                    c=this.dropDownWidth
                }
                if(this.dropDownHeight==null){
                    this.dropDownHeight=200
                }
                this.listBoxContainer.jqxListBox({
                    checkboxes:this.checkboxes,
                    itemHeight:this.itemHeight,
                    width:c,
                    searchMode:this.searchMode,
                    incrementalSearch:this.incrementalSearch,
                    incrementalSearchDelay:this.incrementalSearchDelay,
                    displayMember:this.displayMember,
                    valueMember:this.valueMember,
                    height:this.dropDownHeight,
                    autoHeight:this.autoDropDownHeight,
                    scrollBarSize:this.scrollBarSize,
                    source:this.source,
                    theme:this.theme
                });
                this.container.width(parseInt(c)+25);
                this.container.height(parseInt(this.dropDownHeight)+25);
                this.listBoxContainer.css({
                    position:"absolute",
                    zIndex:9999999999999,
                    top:0,
                    left:0
                });
                this.listBox=a.data(this.listBoxContainer[0],"jqxListBox").instance;
                this.listBox.enableSelection=this.enableSelection;
                this.listBox.enableHover=this.enableHover;
                this.listBox.equalItemsWidth=this.equalItemsWidth;
                this.listBox.selectIndex(this.selectedIndex);
                this.listBox._arrange();
                if(this.renderer){
                    this.listBox.renderer=this.renderer
                }
                this.listBox.rendered=function(){
                    i.listBox.selectIndex(i.selectedIndex);
                    i.renderSelection("mouse")
                };
                    
                var i=this;
                this.addHandler(this.listBoxContainer,"unselect",function(e){
                    i._raiseEvent("3",{
                        index:e.args.index,
                        type:e.args.type,
                        item:e.args.item
                    })
                });
                this.addHandler(this.listBoxContainer,"change",function(e){
                    i._raiseEvent("4",{
                        index:e.args.index,
                        type:e.args.type,
                        item:e.args.item
                    })
                });
                if(this.animationType=="none"){
                    this.container.css("display","none")
                }else{
                    this.container.hide()
                }
            }catch(g){}
            this.touch=a.jqx.mobile.isTouchDevice();
            this.comboStructure=d;
            this.host.append(d);
            this.dropdownlistWrapper=this.host.find("#dropdownlistWrapper");
            this.dropdownlistArrow=this.host.find("#dropdownlistArrow");
            this.arrow=a(this.dropdownlistArrow.children()[0]);
            this.dropdownlistContent=this.host.find("#dropdownlistContent");
            this.dropdownlistContent.addClass(this.toThemeProperty("jqx-dropdownlist-content"));
            this.dropdownlistWrapper.addClass(this.toThemeProperty("jqx-disableselect"));
            this.addHandler(this.dropdownlistWrapper,"selectstart",function(){
                return false
            });
            this.dropdownlistWrapper[0].id="dropdownlistWrapper"+this.element.id;
            this.dropdownlistArrow[0].id="dropdownlistArrow"+this.element.id;
            this.dropdownlistContent[0].id="dropdownlistContent"+this.element.id;
            var l=this;
            this.propertyChangeMap.disabled=function(e,n,m,o){
                if(o){
                    e.host.addClass(l.toThemeProperty("jqx-dropdownlist-state-disabled"));
                    e.host.addClass(l.toThemeProperty("jqx-fill-state-disabled"));
                    e.dropdownlistContent.addClass(l.toThemeProperty("jqx-dropdownlist-content-disabled"))
                }else{
                    e.host.removeClass(l.toThemeProperty("jqx-dropdownlist-state-disabled"));
                    e.host.removeClass(l.toThemeProperty("jqx-fill-state-disabled"));
                    e.dropdownlistContent.removeClass(l.toThemeProperty("jqx-dropdownlist-content-disabled"))
                }
            };
        
            if(this.disabled){
                this.host.addClass(this.toThemeProperty("jqx-dropdownlist-state-disabled"));
                this.host.addClass(this.toThemeProperty("jqx-fill-state-disabled"));
                this.dropdownlistContent.addClass(this.toThemeProperty("jqx-dropdownlist-content-disabled"))
            }
            this.host.addClass(this.toThemeProperty("jqx-widget"));
            this.host.addClass(this.toThemeProperty("jqx-widget-content"));
            this.host.addClass(this.toThemeProperty("jqx-dropdownlist-state-normal"));
            this.host.addClass(this.toThemeProperty("jqx-rc-all"));
            this.host.addClass(this.toThemeProperty("jqx-fill-state-normal"));
            this.arrow.addClass(this.toThemeProperty("icon-arrow-down"));
            this.arrow.addClass(this.toThemeProperty("icon"));
            this._setSize();
            this.render();
            if(a.browser.msie&&a.browser.version<8){
                if(this.host.parents(".jqx-window").length>0){
                    var j=this.host.parents(".jqx-window").css("z-index");
                    b.css("z-index",j+10);
                    this.listBoxContainer.css("z-index",j+10)
                }
            }
        },
        getItems:function(){
            if(!this.listBox){
                return new Array()
            }
            return this.listBox.items
        },
        _setSize:function(){
            if(this.width!=null&&this.width.toString().indexOf("px")!=-1){
                this.host.width(this.width)
            }else{
                if(this.width!=undefined&&!isNaN(this.width)){
                    this.host.width(this.width)
                }
            }
            if(this.height!=null&&this.height.toString().indexOf("px")!=-1){
                this.host.height(this.height)
            }else{
                if(this.height!=undefined&&!isNaN(this.height)){
                    this.host.height(this.height)
                }
            }
            var e=false;
            if(this.width!=null&&this.width.toString().indexOf("%")!=-1){
                e=true;
                this.host.width(this.width)
            }
            if(this.height!=null&&this.height.toString().indexOf("%")!=-1){
                e=true;
                this.host.height(this.height)
            }
            if(e){
                this.refresh(false);
                var c=this;
                var b=this.host.width();
                if(this.dropDownWidth!="auto"){
                    b=this.dropDownWidth
                }
                this.listBoxContainer.jqxListBox({
                    width:b
                });
                this.container.width(parseInt(b)+25);
                var d=function(){
                    c._arrange();
                    if(c.dropDownWidth=="auto"){
                        var f=c.host.width();
                        c.listBoxContainer.jqxListBox({
                            width:f
                        });
                        c.container.width(parseInt(f)+25)
                    }
                };
    
                a(window).resize(function(){
                    d()
                });
                setInterval(function(){
                    var g=c.host.width();
                    var f=c.host.height();
                    if(c._lastWidth!=g||c._lastHeight!=f){
                        d()
                    }
                    c._lastWidth=g;
                    c._lastHeight=f
                },100)
            }
        },
        isOpened:function(){
            var c=this;
            var b=a.data(document.body,"openedJQXListBox");
            if(b!=null&&b==c.listBoxContainer){
                return true
            }
            return false
        },
        render:function(){
            var b=this;
            var c=false;
            this.removeHandlers();
            if(!this.touch){
                this.host.hover(function(){
                    if(!b.disabled&&b.enableHover){
                        c=true;
                        b.host.addClass(b.toThemeProperty("jqx-dropdownlist-state-hover"));
                        b.arrow.addClass(b.toThemeProperty("icon-arrow-down-hover"));
                        b.host.addClass(b.toThemeProperty("jqx-fill-state-hover"))
                    }
                },function(){
                    if(!b.disabled&&b.enableHover){
                        b.host.removeClass(b.toThemeProperty("jqx-dropdownlist-state-hover"));
                        b.host.removeClass(b.toThemeProperty("jqx-fill-state-hover"));
                        b.arrow.removeClass(b.toThemeProperty("icon-arrow-down-hover"));
                        c=false
                    }
                })
            }
            this.addHandler(this.dropdownlistWrapper,"mousedown",function(f){
                if(!b.disabled){
                    var e=b.container.css("display")=="block";
                    if(!b.isanimating){
                        if(e){
                            b.hideListBox()
                        }else{
                            b.showListBox()
                        }
                    }
                }
            });
            if(b.autoOpen){
                this.addHandler(this.host,"mouseenter",function(){
                    var e=b.isOpened();
                    if(!e&&b.autoOpen){
                        b.open();
                        b.host.focus()
                    }
                });
                a(document).bind("mousemove."+b.element.id,function(h){
                    var g=b.isOpened();
                    if(g&&b.autoOpen){
                        var l=b.host.offset();
                        var k=l.top;
                        var j=l.left;
                        var i=b.container.offset();
                        var e=i.left;
                        var f=i.top;
                        canClose=true;
                        if(h.pageY>=k&&h.pageY<=k+b.host.height()){
                            if(h.pageX>=j&&h.pageX<j+b.host.width()){
                                canClose=false
                            }
                        }
                        if(h.pageY>=f&&h.pageY<=f+b.container.height()){
                            if(h.pageX>=e&&h.pageX<e+b.container.width()){
                                canClose=false
                            }
                        }
                        if(canClose){
                            b.close()
                        }
                    }
                })
            }
            this.addHandler(a(document),"mousedown."+this.element.id,b.closeOpenedListBox,{
                me:this,
                listbox:this.listBox,
                id:this.element.id
            });
            if(this.touch){
                this.addHandler(a(document),"touchstart."+this.element.id,b.closeOpenedListBox,{
                    me:this,
                    listbox:this.listBox,
                    id:this.element.id
                })
            }
            if(window.frameElement){
                if(window.top!=null){
                    var d=function(e){
                        if(b.isOpened()){
                            var f={
                                me:b,
                                listbox:b.listBox,
                                id:b.element.id
                            };
                    
                            e.data=f
                        }
                    };
        
                    if(window.top.document.addEventListener){
                        window.top.document.addEventListener("mousedown",d,false)
                    }else{
                        if(window.top.document.attachEvent){
                            window.top.document.attachEvent("onmousedown",d)
                        }
                    }
                }
            }
            this.addHandler(this.host,"keydown",function(f){
                var e=b.container.css("display")=="block";
                if(b.host.css("display")=="none"){
                    return true
                }
                if(f.keyCode=="13"){
                    if(!b.isanimating){
                        if(e){
                            b.renderSelection();
                            b.hideListBox();
                            if(!b.keyboardSelection){
                                b._raiseEvent("2",{
                                    index:b.selectedIndex,
                                    type:"keyboard",
                                    item:b.getItem(b.selectedIndex)
                                })
                            }
                        }else{
                            b.showListBox()
                        }
                    }
                }
                if(f.keyCode==115){
                    if(!b.isanimating){
                        if(!b.isOpened()){
                            b.showListBox()
                        }else{
                            if(b.isOpened()){
                                b.hideListBox()
                            }
                        }
                    }
                    return false
                }
                if(f.altKey){
                    if(b.host.css("display")=="block"){
                        if(f.keyCode==38){
                            if(b.isOpened()){
                                b.hideListBox()
                            }
                        }else{
                            if(f.keyCode==40){
                                if(!b.isOpened()){
                                    b.showListBox()
                                }
                            }
                        }
                    }
                }
                if(f.keyCode=="27"){
                    if(!b.ishiding){
                        b.hideListBox();
                        if(b.tempSelectedIndex!=undefined){
                            b.selectIndex(b.tempSelectedIndex)
                        }
                    }
                }
                if(e&&!b.disabled){
                    return b.listBox._handleKeyDown(f)
                }
            });
            this.addHandler(this.listBoxContainer,"checkChange",function(e){
                b._raiseEvent(5,{
                    label:e.args.label,
                    value:e.args.value,
                    checked:e.args.checked,
                    item:e.args.item
                })
            });
            this.addHandler(this.listBoxContainer,"select",function(e){
                if(!b.disabled){
                    if(e.args.type!="keyboard"||b.keyboardSelection){
                        b.renderSelection();
                        b._raiseEvent("2",{
                            index:e.args.index,
                            type:e.args.type,
                            item:e.args.item,
                            originalEvent:e.args.originalEvent
                        });
                        if(e.args.type=="mouse"){
                            if(!b.checkboxes){
                                b.hideListBox()
                            }
                        }
                    }
                }
            });
            if(this.listBox){
                if(this.listBox.content){
                    this.addHandler(this.listBox.content,"click",function(e){
                        if(!b.disabled){
                            b.renderSelection("mouse");
                            if(!b.touch){
                                if(!b.ishiding){
                                    b.hideListBox()
                                }
                            }
                            if(!b.keyboardSelection){
                                if(b._oldSelectedInd==undefined){
                                    b._oldSelectedIndx=b.selectedIndex
                                }
                                if(b.selectedIndex!=b._oldSelectedIndx){
                                    b._raiseEvent("2",{
                                        index:b.selectedIndex,
                                        type:"keyboard",
                                        item:b.getItem(b.selectedIndex)
                                    });
                                    b._oldSelectedIndx=b.selectedIndex
                                }
                            }
                        }
                    })
                }
            }
            this.addHandler(this.host.find("div:first"),"focus",function(){
                b.host.addClass(b.toThemeProperty("jqx-dropdownlist-state-focus"));
                b.host.addClass(b.toThemeProperty("jqx-fill-state-focus"))
            });
            this.addHandler(this.host.find("div:first"),"blur",function(){
                b.host.removeClass(b.toThemeProperty("jqx-dropdownlist-state-focus"));
                b.host.removeClass(b.toThemeProperty("jqx-fill-state-focus"))
            })
        },
        removeHandlers:function(){
            var b=this;
            this.removeHandler(this.dropdownlistWrapper,"mousedown");
            if(this.listBox){
                if(this.listBox.content){
                    this.removeHandler(this.listBox.content,"click")
                }
            }
            this.removeHandler(this.host,"loadContent");
            this.removeHandler(this.listBoxContainer,"checkChange");
            this.removeHandler(this.host,"keydown");
            this.removeHandler(this.host.find("div:first"),"focus");
            this.removeHandler(this.host.find("div:first"),"blur");
            this.host.unbind("hover");
            this.removeHandler(this.host,"mouseenter");
            a(document).unbind("mousemove."+b.element.id)
        },
        getItem:function(b){
            var c=this.listBox.getItem(b);
            return c
        },
        renderSelection:function(){
            if(this.listBox==null){
                return
            }
            var k=this.listBox.getItem(this.listBox.selectedIndex);
            if(k==null){
                this.dropdownlistContent.html("");
                return
            }
            this.selectedIndex=this.listBox.selectedIndex;
            var d=a('<span style="color: inherit; border: none; background-color: transparent;"></span>');
            d.appendTo(a(document.body));
            d.addClass(this.toThemeProperty("jqx-listitem-state-normal"));
            d.addClass(this.toThemeProperty("jqx-item"));
            try{
                if(k.html!=undefined&&k.html!=null&&k.html.toString().length>0){
                    d.html(k.html)
                }else{
                    if(k.label!=undefined&&k.label!=null&&k.label.toString().length>0){
                        d.html(k.label)
                    }else{
                        if(k.value!=undefined&&k.value!=null&&k.value.toString().length>0){
                            d.html(k.value)
                        }else{
                            if(k.title!=undefined&&k.title!=null&&k.title.toString().length>0){
                                d.html(k.title)
                            }
                        }
                    }
                }
            }catch(h){
                var f=h
            }
            var g=this.dropdownlistContent.css("font-size");
            var e=this.dropdownlistContent.css("font-family");
            var c=this.dropdownlistContent.css("padding-top");
            var l=this.dropdownlistContent.css("padding-bottom");
            d.css("font-size",g);
            d.css("font-family",e);
            d.css("padding-top",c);
            d.css("padding-bottom",l);
            var b=d.outerHeight();
            d.remove();
            d.removeClass();
            if(this.selectionRenderer){
                this.dropdownlistContent.html(this.selectionRenderer(d))
            }else{
                this.dropdownlistContent.html(d)
            }
            var j=this.host.height();
            if(this.height!=null&&this.height!=undefined){
                j=parseInt(this.height)
            }
            var i=(parseInt(j)-parseInt(b))/2;
            if(i>0){
                this.dropdownlistContent.css("margin-top",i+"px");
                this.dropdownlistContent.css("margin-bottom",i+"px")
            }
        },
        setContent:function(b){
            this.dropdownlistContent.html(b)
        },
        dataBind:function(){
            this.listBoxContainer.jqxListBox({
                source:this.source
            });
            this.renderSelection("mouse");
            if(this.source==null){
                this.clearSelection()
            }
        },
        clear:function(){
            this.listBoxContainer.jqxListBox({
                source:null
            });
            this.clearSelection()
        },
        clearSelection:function(b){
            this.selectedIndex=-1;
            this.listBox.clearSelection();
            this.renderSelection();
            this.dropdownlistContent.html("")
        },
        unselectIndex:function(b,c){
            if(isNaN(b)){
                return
            }
            this.listBox.unselectIndex(b,c);
            this.renderSelection()
        },
        selectIndex:function(b,d,e,c){
            this.listBox.selectIndex(b,d,e,c);
            this.renderSelection()
        },
        getSelectedIndex:function(){
            return this.selectedIndex
        },
        getSelectedItem:function(){
            return this.getItem(this.selectedIndex)
        },
        getCheckedItems:function(){
            return this.listBox.getCheckedItems()
        },
        checkIndex:function(b){
            this.listBox.checkIndex(b)
        },
        uncheckIndex:function(b){
            this.listBox.checkIndex(b)
        },
        indeterminateIndex:function(b){
            this.listBox.indeterminateIndex(b)
        },
        checkAll:function(){
            this.listBox.checkAll()
        },
        uncheckAll:function(){
            this.listBox.uncheckAll()
        },
        insertAt:function(c,b){
            if(c==null){
                return false
            }
            return this.listBox.insertAt(c,b)
        },
        addItem:function(b){
            return this.listBox.addItem(b)
        },
        removeAt:function(c){
            var b=this.listBox.removeAt(c);
            this.renderSelection("mouse");
            return b
        },
        ensureVisible:function(b){
            this.listBox.ensureVisible(b)
        },
        disableAt:function(b){
            this.listBox.disableAt(b)
        },
        enableAt:function(b){
            this.listBox.enableAt(b)
        },
        _findPos:function(c){
            while(c&&(c.type=="hidden"||c.nodeType!=1||a.expr.filters.hidden(c))){
                c=c.nextSibling
            }
            var b=a(c).offset();
            return[b.left,b.top]
        },
        testOffset:function(h,f,c){
            var g=h.outerWidth();
            var j=h.outerHeight();
            var i=a(window).width()+a(window).scrollLeft();
            var e=a(window).height()+a(window).scrollTop();
            if(f.left+g>i){
                if(g>this.host.width()){
                    var d=this.host.offset().left;
                    var b=g-this.host.width();
                    f.left=d-b+2
                }
            }
            f.top-=Math.min(f.top,(f.top+j>e&&e>j)?Math.abs(j+c+22):0);
            return f
        },
        open:function(){
            this.showListBox()
        },
        close:function(){
            this.hideListBox()
        },
        hide:function(){
            this.close()
        },
        show:function(){
            this.open()
        },
        showListBox:function(){
            var n=this;
            var c=this.listBoxContainer;
            var h=this.listBox;
            var k=a(window).scrollTop();
            var f=a(window).scrollLeft();
            var i=parseInt(this._findPos(this.host[0])[1])+parseInt(this.host.outerHeight())-1+"px";
            var e=parseInt(this.host.offset().left)+"px";
            var m=a.jqx.mobile.isSafariMobileBrowser();
            if(this.listBox==null){
                return
            }
            this.ishiding=false;
            if(!this.keyboardSelection){
                this.listBox.selectIndex(this.selectedIndex);
                this.listBox.ensureVisible(this.selectedIndex)
            }
            this.tempSelectedIndex=this.selectedIndex;
            if(this.autoDropDownHeight){
                this.container.height(this.listBoxContainer.height()+25)
            }
            if(m!=null&&m){
                e=a.jqx.mobile.getLeftPos(this.element);
                i=a.jqx.mobile.getTopPos(this.element)+parseInt(this.host.outerHeight())
            }
            c.stop();
            this.host.addClass(this.toThemeProperty("jqx-dropdownlist-state-selected"));
            this.host.addClass(this.toThemeProperty("jqx-fill-state-pressed"));
            this.arrow.addClass(this.toThemeProperty("icon-arrow-down-selected"));
            this.container.css("left",e);
            this.container.css("top",i);
            h._arrange();
            var d=true;
            var o=false;
            if(this.dropDownHorizontalAlignment=="right"){
                var j=this.container.width();
                var b=Math.abs(j-this.host.width());
                if(j>this.host.width()){
                    this.container.css("left",25+parseInt(e)-b+"px")
                }else{
                    this.container.css("left",25+parseInt(e)+b+"px")
                }
            }
            if(this.enableBrowserBoundsDetection){
                var g=this.testOffset(c,{
                    left:parseInt(this.container.css("left")),
                    top:parseInt(i)
                },parseInt(this.host.outerHeight()));
                if(parseInt(this.container.css("top"))!=g.top){
                    o=true;
                    c.css("top",23)
                }else{
                    c.css("top",0)
                }
                this.container.css("top",g.top);
                if(parseInt(this.container.css("left"))!=g.left){
                    this.container.css("left",g.left)
                }
            }
            if(this.animationType=="none"){
                this.container.css("display","block");
                a.data(document.body,"openedJQXListBoxParent",n);
                a.data(document.body,"openedJQXListBox",c);
                c.css("margin-top",0);
                c.css("opacity",1)
            }else{
                this.container.css("display","block");
                n.isanimating=true;
                if(this.animationType=="fade"){
                    c.css("margin-top",0);
                    c.css("opacity",0);
                    c.animate({
                        opacity:1
                    },this.openDelay,function(){
                        a.data(document.body,"openedJQXListBoxParent",n);
                        a.data(document.body,"openedJQXListBox",c);
                        n.ishiding=false;
                        n.isanimating=false
                    })
                }else{
                    c.css("opacity",1);
                    var l=c.outerHeight();
                    if(o){
                        c.css("margin-top",l)
                    }else{
                        c.css("margin-top",-l)
                    }
                    c.animate({
                        "margin-top":0
                    },this.openDelay,function(){
                        a.data(document.body,"openedJQXListBoxParent",n);
                        a.data(document.body,"openedJQXListBox",c);
                        n.ishiding=false;
                        n.isanimating=false
                    })
                }
            }
            h._renderItems();
            this._raiseEvent("0",h)
        },
        hideListBox:function(){
            var f=this.listBoxContainer;
            var g=this.listBox;
            var c=this.container;
            var d=this;
            a.data(document.body,"openedJQXListBox",null);
            if(this.animationType=="none"){
                this.container.css("display","none")
            }else{
                if(!d.ishiding){
                    f.stop();
                    var b=f.outerHeight();
                    f.css("margin-top",0);
                    d.isanimating=true;
                    var e=-b;
                    if(parseInt(this.container.offset().top)<parseInt(this.host.offset().top)){
                        e=b
                    }
                    if(this.animationType=="fade"){
                        f.css({
                            opacity:1
                        });
                        f.animate({
                            opacity:0
                        },this.closeDelay,function(){
                            c.css("display","none");
                            d.isanimating=false;
                            d.ishiding=false
                        })
                    }else{
                        f.animate({
                            "margin-top":e
                        },this.closeDelay,function(){
                            c.css("display","none");
                            d.isanimating=false;
                            d.ishiding=false
                        })
                    }
                }
            }
            this.ishiding=true;
            this.host.removeClass(this.toThemeProperty("jqx-dropdownlist-state-selected"));
            this.host.removeClass(this.toThemeProperty("jqx-fill-state-pressed"));
            this.arrow.removeClass(this.toThemeProperty("icon-arrow-down-selected"));
            this._raiseEvent("1",g)
        },
        closeOpenedListBox:function(e){
            var d=e.data.me;
            var b=a(e.target);
            var c=e.data.listbox;
            if(c==null){
                return true
            }
            if(a(e.target).ischildof(e.data.me.host)){
                return true
            }
            var f=d;
            var g=false;
            a.each(b.parents(),function(){
                if(this.className!="undefined"){
                    if(this.className.indexOf){
                        if(this.className.indexOf("jqx-listbox")!=-1){
                            g=true;
                            return false
                        }
                        if(this.className.indexOf("jqx-dropdownlist")!=-1){
                            if(d.element.id==this.id){
                                g=true
                            }
                            return false
                        }
                    }
                }
            });
            if(c!=null&&!g&&d.isOpened()){
                d.hideListBox()
            }
            return true
        },
        loadFromSelect:function(b){
            this.listBox.loadFromSelect(b)
        },
        refresh:function(b){
            this._arrange();
            this.renderSelection();
            if(b!=true){
                this.dataBind()
            }
        },
        _arrange:function(){
            var f=parseInt(this.host.width());
            var b=parseInt(this.host.height());
            var e=this.arrowSize;
            var d=this.arrowSize;
            var g=3;
            var c=f-d-2*g;
            if(c>0){
                this.dropdownlistContent.width(c+"px")
            }
            this.dropdownlistContent.height(b);
            this.dropdownlistContent.css("left",0);
            this.dropdownlistContent.css("top",0);
            this.dropdownlistArrow.width(d);
            this.dropdownlistArrow.height(b)
        },
        destroy:function(){
            this.removeHandler(this.listBoxContainer,"select");
            this.removeHandler(this.listBoxContainer,"unselect");
            this.removeHandler(this.listBoxContainer,"change");
            this.removeHandler(this.dropdownlistWrapper,"selectstart");
            this.removeHandler(this.dropdownlistWrapper,"mousedown");
            this.removeHandler(this.host,"keydown");
            this.removeHandler(this.listBoxContainer,"select");
            this.removeHandler(this.listBox.content,"click");
            this.removeHandlers();
            this.listBoxContainer.jqxListBox("destroy");
            this.listBoxContainer.remove();
            this.host.removeClass();
            this.removeHandler(a(document),"mousedown."+this.element.id,self.closeOpenedListBox);
            if(this.touch){
                this.removeHandler(a(document),"touchstart."+this.element.id)
            }
            this.host.remove()
        },
        _raiseEvent:function(f,c){
            if(c==undefined){
                c={
                    owner:null
                }
            }
            var d=this.events[f];
            args=c;
            args.owner=this;
            var e=new jQuery.Event(d);
            e.owner=this;
            if(f==2||f==3||f==4||f==5){
                e.args=c
            }
            var b=this.host.trigger(e);
            return b
        },
        propertyChangedHandler:function(b,c,f,e){
            if(b.isInitialized==undefined||b.isInitialized==false){
                return
            }
            if(c=="autoOpen"){
                b.render()
            }
            if(c=="renderer"){
                b.listBox.renderer=b.renderer
            }
            if(c=="itemHeight"){
                b.listBox.itemHeight=e
            }
            if(c=="source"){
                b.listBoxContainer.jqxListBox({
                    source:b.source
                });
                b.renderSelection();
                if(e==null){
                    b.clear()
                }
            }
            if(c=="displayMember"||c=="valueMember"){
                b.listBoxContainer.jqxListBox({
                    displayMember:b.displayMember,
                    valueMember:b.valueMember
                });
                b.renderSelection()
            }
            if(c=="theme"&&e!=null){
                b.listBoxContainer.jqxListBox({
                    theme:e
                });
                b.dropdownlistContent.removeClass();
                b.dropdownlistContent.addClass(b.toThemeProperty("jqx-dropdownlist-content"));
                b.dropdownlistWrapper.removeClass();
                b.dropdownlistWrapper.addClass(b.toThemeProperty("jqx-disableselect"));
                b.host.removeClass();
                b.host.addClass(b.toThemeProperty("jqx-fill-state-normal"));
                b.host.addClass(b.toThemeProperty("jqx-dropdownlist-state-normal"));
                b.host.addClass(b.toThemeProperty("jqx-rc-all"));
                b.host.addClass(b.toThemeProperty("jqx-widget"));
                b.host.addClass(b.toThemeProperty("jqx-widget-content"));
                b.arrow.removeClass();
                b.arrow.addClass(b.toThemeProperty("icon-arrow-down"));
                b.arrow.addClass(b.toThemeProperty("icon"))
            }
            if(c=="autoDropDownHeight"&&e!=f){
                b.listBoxContainer.jqxListBox({
                    autoHeight:b.autoDropDownHeight
                });
                if(b.autoDropDownHeight){
                    b.container.height(b.listBoxContainer.height()+25)
                }else{
                    b.listBoxContainer.jqxListBox({
                        height:b.dropDownHeight
                    });
                    b.container.height(parseInt(b.dropDownHeight)+25)
                }
            }
            if(c=="searchMode"){
                b.listBoxContainer.jqxListBox({
                    searchMode:b.searchMode
                })
            }
            if(c=="incrementalSearch"){
                b.listBoxContainer.jqxListBox({
                    incrementalSearch:b.incrementalSearch
                })
            }
            if(c=="incrementalSearchDelay"){
                b.listBoxContainer.jqxListBox({
                    incrementalSearchDelay:b.incrementalSearchDelay
                })
            }
            if(c=="dropDownHeight"){
                if(!b.autoDropDownHeight){
                    b.listBoxContainer.jqxListBox({
                        height:b.dropDownHeight
                    });
                    b.container.height(parseInt(b.dropDownHeight)+25)
                }
            }
            if(c=="dropDownWidth"||c=="scrollBarSize"){
                var d=b.width;
                if(b.dropDownWidth!="auto"){
                    d=b.dropDownWidth
                }
                b.listBoxContainer.jqxListBox({
                    width:d,
                    scrollBarSize:b.scrollBarSize
                });
                b.container.width(parseInt(d)+25)
            }
            if(c=="width"||c=="height"){
                if(e!=f){
                    b._setSize();
                    b._arrange();
                    if(c=="width"){
                        if(b.dropDownWidth=="auto"){
                            var d=b.host.width();
                            b.listBoxContainer.jqxListBox({
                                width:d
                            });
                            b.container.width(parseInt(d)+25)
                        }
                    }
                }
            }
            if(c=="checkboxes"){
                b.listBoxContainer.jqxListBox({
                    checkboxes:b.checkboxes
                })
            }
            if(c=="selectedIndex"){
                if(b.listBox!=null){
                    b.listBox.selectIndex(e);
                    b.renderSelection()
                }
            }
        }
    })
})(jQuery);