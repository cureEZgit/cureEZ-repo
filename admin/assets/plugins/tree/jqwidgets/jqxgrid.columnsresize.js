/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.extend(a.jqx._jqxGrid.prototype,{
        _handlecolumnsresize:function(){
            var c=this;
            if(this.columnsresize){
                var b=false;
                if(c.isTouchDevice()){
                    b=true
                }
                var g="mousemove.resize"+this.element.id;
                var d="mousedown.resize"+this.element.id;
                var h="mouseup.resize"+this.element.id;
                if(b){
                    var g="touchmove.resize"+this.element.id;
                    var d="touchstart.resize"+this.element.id;
                    var h="touchend.resize"+this.element.id
                }
                this.removeHandler(a(document),g);
                this.addHandler(a(document),g,function(k){
                    var l=a.data(document.body,"contextmenu"+c.element.id);
                    if(l!=null){
                        return true
                    }
                    if(c.resizablecolumn!=null&&!c.disabled&&c.resizing){
                        if(c.resizeline!=null){
                            var n=c.host.offset();
                            var s=parseInt(c.resizestartline.offset().left);
                            var i=s-c._startcolumnwidth;
                            var t=c.resizablecolumn.column.minwidth;
                            if(t=="auto"){
                                t=0
                            }else{
                                t=parseInt(t)
                            }
                            var j=c.resizablecolumn.column.maxwidth;
                            if(j=="auto"){
                                j=0
                            }else{
                                j=parseInt(j)
                            }
                            var o=k.pageX;
                            if(b){
                                var q=c.getTouches(k);
                                var p=q[0];
                                o=p.pageX
                            }
                            i+=t;
                            var r=j>0?s+j:0;
                            var m=j==0?true:c._startcolumnwidth+o-s<j?true:false;
                            if(m){
                                if(o>=n.left&&o>=i&&o<=n.left+c.host.width()){
                                    if(r!=0&&k.pageX<r){
                                        c.resizeline.css("left",o)
                                    }else{
                                        if(r==0){
                                            c.resizeline.css("left",o)
                                        }
                                    }
                                    if(b){
                                        return false
                                    }
                                }
                            }
                        }
                    }
                    if(!b){
                        return false
                    }
                });
                this.removeHandler(a(document),d);
                this.addHandler(a(document),d,function(k){
                    var j=a.data(document.body,"contextmenu"+c.element.id);
                    if(j!=null){
                        return true
                    }
                    if(c.resizablecolumn!=null&&!c.disabled){
                        var i=c.resizablecolumn.columnelement;
                        if(i.offset().top+i.height()+5<k.pageY){
                            c.resizablecolumn=null;
                            return
                        }
                        c._startcolumnwidth=c.resizablecolumn.column.width;
                        c.resizablecolumn.column._width=null;
                        a(document.body).addClass("jqx-disableselect");
                        c._mouseDownResize=new Date();
                        c.resizing=true;
                        c._resizecolumn=c.resizablecolumn.column;
                        c.resizeline=c.resizeline||a('<div style="position: absolute;"></div>');
                        c.resizestartline=c.resizestartline||a('<div style="position: absolute;"></div>');
                        c.resizebackground=c.resizebackground||a('<div style="position: absolute; left: 0; top: 0; background: #000;"></div>');
                        c.resizebackground.css("opacity",0.01);
                        c.resizebackground.css("cursor","col-resize");
                        c.resizeline.css("cursor","col-resize");
                        c.resizestartline.css("cursor","col-resize");
                        c.resizeline.addClass(c.toThemeProperty("jqx-grid-column-resizeline"));
                        c.resizestartline.addClass(c.toThemeProperty("jqx-grid-column-resizestartline"));
                        a(document.body).append(c.resizeline);
                        a(document.body).append(c.resizestartline);
                        a(document.body).append(c.resizebackground);
                        var l=c.resizablecolumn.columnelement.offset();
                        c.resizebackground.css("left",c.host.offset().left);
                        c.resizebackground.css("top",c.host.offset().top);
                        c.resizebackground.width(c.host.width());
                        c.resizebackground.height(c.host.height());
                        c.resizebackground.css("z-index",999999999);
                        var m=function(o){
                            o.css("left",parseInt(l.left)+c._startcolumnwidth);
                            var r=c._groupsheader();
                            var q=r?c.groupsheader.height():0;
                            var t=c.showtoolbar?c.toolbarheight:0;
                            q+=t;
                            var n=c.showstatusbar?c.statusbarheight:0;
                            q+=n;
                            var p=0;
                            if(c.pageable){
                                p=c.pagerheight
                            }
                            var s=c.hScrollBar.css("visibility")=="visible"?17:0;
                            o.css("top",parseInt(l.top));
                            o.css("z-index",9999999999);
                            o.height(c.host.height()-p-q-s);
                            if(c.enableanimations){
                                o.show("fast")
                            }else{
                                o.show()
                            }
                        };
        
                        m(c.resizeline);
                        m(c.resizestartline)
                    }
                });
                var e=function(){
                    a(document.body).removeClass("jqx-disableselect");
                    if(!c.resizing){
                        return
                    }
                    c._mouseUpResize=new Date();
                    var l=c._mouseUpResize-c._mouseDownResize;
                    if(l<200){
                        c.resizing=false;
                        if(c._resizecolumn!=null&&c.resizeline!=null&&c.resizeline.css("display")=="block"){
                            c._resizecolumn=null;
                            c.resizeline.hide();
                            c.resizestartline.hide();
                            c.resizebackground.remove()
                        }
                        return
                    }
                    c.resizing=false;
                    if(c.disabled){
                        return
                    }
                    if(c._resizecolumn!=null&&c.resizeline!=null&&c.resizeline.css("display")=="block"){
                        var m=parseInt(c.resizeline.css("left"));
                        var j=parseInt(c.resizestartline.css("left"));
                        var i=c._startcolumnwidth+m-j;
                        var k=c._resizecolumn.width;
                        c._closemenu();
                        c._resizecolumn.width=i;
                        c._updatecolumnwidths();
                        c._updatecellwidths();
                        c._raiseEvent(14,{
                            columntext:c._resizecolumn.text,
                            column:c._resizecolumn.getcolumnproperties(),
                            datafield:c._resizecolumn.datafield,
                            oldwidth:k,
                            newwidth:i
                        });
                        c._renderrows(c.virtualsizeinfo);
                        c._resizecolumn=null;
                        c.resizeline.hide();
                        c.resizestartline.hide();
                        c.resizebackground.remove()
                    }else{
                        c.resizablecolumn=null
                    }
                };

                if(window.frameElement){
                    if(window.top!=null){
                        var f=function(i){
                            e()
                        };
            
                        if(window.top.document.addEventListener){
                            window.top.document.addEventListener("mouseup",f,false)
                        }else{
                            if(window.top.document.attachEvent){
                                window.top.document.attachEvent("onmouseup",f)
                            }
                        }
                    }
                }
                this.removeHandler(a(document),h);
                this.addHandler(a(document),h,function(j){
                    var i=a.data(document.body,"contextmenu"+c.element.id);
                    if(i!=null){
                        return true
                    }
                    e()
                })
            }
        }
    })
})(jQuery);