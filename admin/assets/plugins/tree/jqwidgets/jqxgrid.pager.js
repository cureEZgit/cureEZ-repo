/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.extend(a.jqx._jqxGrid.prototype,{
        _initpager:function(){
            var j=this;
            var c=this.gridlocalization.pagergotopagestring;
            var h=this.gridlocalization.pagerrangestring;
            var m=this.gridlocalization.pagershowrowsstring;
            var k=(this.pagerheight-17)/2;
            this.pagerdiv=this.pagerdiv||a('<div style="width: 100%; height: 100%; position: relative;"></div>');
            if(!this.pageable){
                this.pagerdiv.remove();
                this.vScrollBar.jqxScrollBar({
                    thumbSize:0
                });
                return
            }
            if(!this.pagerrenderer){
                this.pagerdiv.css("top",k);
                this.pagergotoinput=this.pagergotoinput||a('<div style="margin-right: 7px; width: 27px; height: 17px; float: right;"><input style="margin-top: 0px; text-align: right; width: 27px;" type="text"/></div>');
                this.pagergoto=this.pagergoto||a('<div style="float: right; margin-right: 7px;"></div>');
                this.pagerrightbutton=this.pagerrightbutton||a('<div type="button" style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; float: right;"></div>');
                this.pagerleftbutton=this.pagerleftbutton||a('<div type="button" style="padding: 0px; margin-top: 0px; margin-right: 3px; width: 27px; float: right;"></div>');
                this.pagerdetails=this.pagerdetails||a('<div style="margin-right: 7px; float: right;"></div>');
                this.pagershowrows=this.pagershowrows||a('<div style="margin-right: 7px; float: right;"></div>');
                if(this.pagershowrowscombo&&this.pagershowrowscombo.jqxDropDownList){
                    this.pagershowrowscombo.remove();
                    this.pagershowrowscombo=null
                }
                this.pagershowrowscombo=this.pagershowrowscombo||a('<div id="gridpagerlist" style="margin-top: 0px; margin-right: 7px; float: right;"></div>');
                this.pagerdiv.children().remove();
                this.pagershowrowscombo[0].id="gridpagerlist"+this.element.id;
                this.removeHandler(this.pagerrightbutton,"mousedown");
                this.removeHandler(this.pagerrightbutton,"mouseup");
                this.removeHandler(this.pagerrightbutton,"click");
                this.removeHandler(this.pagerleftbutton,"mousedown");
                this.removeHandler(this.pagerleftbutton,"mouseup");
                this.removeHandler(this.pagerleftbutton,"click");
                this.pagerleftbutton.attr("title",this.gridlocalization.pagerpreviousbuttonstring);
                this.pagerrightbutton.attr("title",this.gridlocalization.pagernextbuttonstring);
                this.pagerdiv.append(this.pagerrightbutton);
                this.pagerdiv.append(this.pagerleftbutton);
                this.pagerrightbutton.jqxButton({
                    cursor:"pointer",
                    theme:this.theme
                });
                this.pagerleftbutton.jqxButton({
                    cursor:"pointer",
                    theme:this.theme
                });
                this.pagerleftbutton.find(".icon-arrow-left").remove();
                this.pagerrightbutton.find(".icon-arrow-right").remove();
                var d=a("<div style='margin-left: 6px; width: 15px; height: 15px;'></div>");
                d.addClass(this.toThemeProperty("icon-arrow-left"));
                this.pagerleftbutton.wrapInner(d);
                var g=a("<div style='margin-left: 6px; width: 15px; height: 15px;'></div>");
                g.addClass(this.toThemeProperty("icon-arrow-right"));
                this.pagerrightbutton.wrapInner(g);
                this.pagerdiv.append(this.pagerdetails);
                this.pagerdiv.append(this.pagershowrowscombo);
                this.pagerdiv.append(this.pagershowrows);
                this.pagerdiv.append(this.pagergotoinput);
                this.pagerdiv.append(this.pagergoto);
                var b=this.pagesizeoptions;
                if(!this.pagershowrowscombo.jqxDropDownList){
                    alert("jqxdropdownlist is not loaded.");
                    return
                }
                this.pagershowrowscombo.jqxDropDownList({
                    source:b,
                    keyboardSelection:false,
                    autoDropDownHeight:true,
                    width:44,
                    height:16,
                    theme:this.theme
                });
                var f=0;
                for(i=0;i<b.length;i++){
                    if(this.pagesize>=b[i]){
                        f=i
                    }
                }
                this.pagershowrows[0].innerHTML=m;
                this.pagergoto[0].innerHTML=c;
                this.updatepagerdetails();
                this.pager.append(this.pagerdiv);
                this.pagershowrowscombo.jqxDropDownList({
                    selectedIndex:f
                });
                this.pagerpageinput=this.pagergotoinput.find("input");
                this.pagerpageinput.addClass(this.toThemeProperty("jqx-input"));
                this.pagerpageinput.addClass(this.toThemeProperty("jqx-widget-content"));
                var j=this;
                this.pagershowrowscombo.unbind("select");
                this.pagershowrowscombo.bind("select",function(q){
                    if(q.args){
                        var o=q.args.index;
                        var r=j.dataview.pagenum*j.dataview.pagesize;
                        var p=b[o];
                        var s=j.pagesize;
                        j.pagesize=parseInt(p);
                        if(isNaN(j.pagesize)){
                            j.pagesize=10
                        }
                        if(p>=100){
                            j.pagershowrowscombo.jqxDropDownList({
                                width:55
                            })
                        }else{
                            j.pagershowrowscombo.jqxDropDownList({
                                width:44
                            })
                        }
                        j.dataview.pagesize=j.pagesize;
                        var n=Math.floor(r/j.dataview.pagesize);
                        j.prerenderrequired=true;
                        j._requiresupdate=true;
                        j._raiseEvent(10,{
                            pagenum:n,
                            oldpagesize:s,
                            pagesize:j.dataview.pagesize
                        });
                        j.gotopage(n);
                        if(j.autoheight&&j._updatesizeonwindowresize){
                            j._updatesize(true);
                            setTimeout(function(){
                                j._updatesize(true)
                            },500)
                        }
                    }
                });
                var l=this.pagergotoinput.find("input");
                l.addClass(this.toThemeProperty("jqx-grid-pager-input"));
                l.addClass(this.toThemeProperty("jqx-rc-all"));
                l.unbind("keydown");
                l.unbind("change");
                l.bind("keydown",function(n){
                    if(n.keyCode>=65&&n.keyCode<=90){
                        return false
                    }
                    if(n.keyCode=="13"){
                        var o=l.val();
                        o=parseInt(o);
                        if(!isNaN(o)){
                            j.gotopage(o-1)
                        }
                        return false
                    }
                });
                l.bind("change",function(){
                    var n=l.val();
                    n=parseInt(n);
                    if(!isNaN(n)){
                        j.gotopage(n-1)
                    }
                });
                this.addHandler(this.pagerrightbutton,"mouseenter",function(){
                    g.addClass(j.toThemeProperty("icon-arrow-right-hover"))
                });
                this.addHandler(this.pagerleftbutton,"mouseenter",function(){
                    d.addClass(j.toThemeProperty("icon-arrow-left-hover"))
                });
                this.addHandler(this.pagerrightbutton,"mouseleave",function(){
                    g.removeClass(j.toThemeProperty("icon-arrow-right-hover"))
                });
                this.addHandler(this.pagerleftbutton,"mouseleave",function(){
                    d.removeClass(j.toThemeProperty("icon-arrow-left-hover"))
                });
                this.addHandler(this.pagerrightbutton,"mousedown",function(){
                    g.addClass(j.toThemeProperty("icon-arrow-right-selected"))
                });
                this.addHandler(this.pagerrightbutton,"mouseup",function(){
                    g.removeClass(j.toThemeProperty("icon-arrow-right-selected"))
                });
                this.addHandler(this.pagerleftbutton,"mousedown",function(){
                    d.addClass(j.toThemeProperty("icon-arrow-left-selected"))
                });
                this.addHandler(this.pagerleftbutton,"mouseup",function(){
                    d.removeClass(j.toThemeProperty("icon-arrow-left-selected"))
                });
                this.addHandler(this.pagerrightbutton,"click",function(){
                    if(!j.pagerrightbutton.jqxButton("disabled")){
                        j.gotonextpage()
                    }
                });
                this.addHandler(this.pagerleftbutton,"click",function(){
                    if(!j.pagerrightbutton.jqxButton("disabled")){
                        j.gotoprevpage()
                    }
                })
            }else{
                this.pagerdiv.children().remove();
                var e=this.pagerrenderer();
                if(e!=null){
                    this.pagerdiv.append(a(e))
                }
                this.pager.append(this.pagerdiv)
            }
            this.vScrollBar.jqxScrollBar({
                thumbSize:this.host.height()/5
            });
            this.vScrollBar.jqxScrollBar("refresh");
            this._arrange()
        },
        _updatepagertheme:function(){
            if(this.pagershowrowscombo==null){
                return
            }
            this.pagershowrowscombo.jqxDropDownList({
                theme:this.theme
            });
            this.pagerrightbutton.jqxButton({
                theme:this.theme
            });
            this.pagerleftbutton.jqxButton({
                theme:this.theme
            });
            this.pagerpageinput.removeClass();
            var c=this.pagergotoinput.find("input");
            c.removeClass();
            c.addClass(this.toThemeProperty("jqx-grid-pager-input"));
            c.addClass(this.toThemeProperty("jqx-rc-all"));
            this.pagerpageinput.addClass(this.toThemeProperty("jqx-input"));
            this.pagerpageinput.addClass(this.toThemeProperty("jqx-widget-content"));
            this.pagerleftbutton.find(".icon-arrow-left").remove();
            this.pagerrightbutton.find(".icon-arrow-right").remove();
            var d=a("<div style='width: 27px; height: 15px;'></div>");
            d.addClass(this.toThemeProperty("icon-arrow-left"));
            this.pagerleftbutton.wrapInner(d);
            var e=a("<div style='width: 27px; height: 15px;'></div>");
            e.addClass(this.toThemeProperty("icon-arrow-right"));
            this.pagerrightbutton.wrapInner(e);
            var b=function(g,f){
                g.removeHandler(f,"mouseenter");
                g.removeHandler(f,"mouseleave");
                g.removeHandler(f,"mousedown");
                g.removeHandler(f,"mouseup")
            };
        
            b(this,this.pagerrightbutton);
            b(this,this.pagerleftbutton);
            this.addHandler(this.pagerrightbutton,"mouseenter",function(){
                e.addClass(me.toThemeProperty("icon-arrow-right-hover"))
            });
            this.addHandler(this.pagerleftbutton,"mouseenter",function(){
                d.addClass(me.toThemeProperty("icon-arrow-left-hover"))
            });
            this.addHandler(this.pagerrightbutton,"mouseleave",function(){
                e.removeClass(me.toThemeProperty("icon-arrow-right-hover"))
            });
            this.addHandler(this.pagerleftbutton,"mouseleave",function(){
                d.removeClass(me.toThemeProperty("icon-arrow-left-hover"))
            });
            this.addHandler(this.pagerrightbutton,"mousedown",function(){
                e.addClass(me.toThemeProperty("icon-arrow-right-selected"))
            });
            this.addHandler(this.pagerrightbutton,"mouseup",function(){
                e.removeClass(me.toThemeProperty("icon-arrow-right-selected"))
            });
            this.addHandler(this.pagerleftbutton,"mousedown",function(){
                d.addClass(me.toThemeProperty("icon-arrow-left-selected"))
            });
            this.addHandler(this.pagerleftbutton,"mouseup",function(){
                d.removeClass(me.toThemeProperty("icon-arrow-left-selected"))
            })
        },
        gotopage:function(d){
            if(d==null||d==undefined){
                d=0
            }
            if(d==-1){
                d=0
            }
            if(d<0){
                return
            }
            var c=this.dataview.totalrecords;
            if(this.summaryrows){
                c+=this.summaryrows.length
            }
            var b=Math.ceil(c/this.pagesize);
            if(d>=b){
                if(this.dataview.totalrecords==0){
                    this.dataview.pagenum=0;
                    this.updatepagerdetails()
                }
                if(d>0){
                    d=b-1
                }
            }
            if(this.dataview.pagenum!=d||this._requiresupdate){
                if(this.pageable){
                    if(this.source.pager){
                        this.source.pager(d,this.dataview.pagesize,this.dataview.pagenum)
                    }
                    this.dataview.pagenum=d;
                    if(this.virtualmode){
                        this.hiddens=new Array();
                        this.expandedgroups=new Array();
                        if(this.rendergridrows){
                            var g=d*this.dataview.pagesize;
                            var f=g+this.dataview.pagesize;
                            if(g!=null&&f!=null){
                                if(this.pagerrightbutton){
                                    this.pagerrightbutton.jqxButton({
                                        disabled:true
                                    });
                                    this.pagerleftbutton.jqxButton({
                                        disabled:true
                                    });
                                    this.pagershowrowscombo.jqxDropDownList({
                                        disabled:true
                                    })
                                }
                                this.updatebounddata("pagechanged");
                                this._raiseEvent(9,{
                                    pagenum:d,
                                    pagesize:this.dataview.pagesize
                                });
                                this.updatepagerdetails();
                                return
                            }
                        }
                    }else{
                        this.dataview.updateview()
                    }
                    this._loadrows();
                    this._updatepageviews();
                    this.tableheight=null;
                    this._renderrows(this.virtualsizeinfo);
                    this.updatepagerdetails();
                    if(this.autoheight){
                        var e=this.host.height()-this._gettableheight();
                        height=e+this._pageviews[0].height;
                        if(height!=this.host.height()){
                            this._arrange();
                            this._updatepageviews()
                        }
                    }
                    if(this.editcell!=null&&this.endcelledit){
                        this.endcelledit(this.editcell.row,this.editcell.column,true,false)
                    }
                    this._raiseEvent(9,{
                        pagenum:d,
                        pagesize:this.dataview.pagesize
                    })
                }
            }
        },
        gotoprevpage:function(){
            if(this.dataview.pagenum>0){
                this.gotopage(this.dataview.pagenum-1)
            }else{
                var c=this.dataview.totalrecords;
                if(this.summaryrows){
                    c+=this.summaryrows.length
                }
                var b=Math.ceil(c/this.pagesize);
                this.gotopage(b-1)
            }
        },
        gotonextpage:function(){
            var c=this.dataview.totalrecords;
            if(this.summaryrows){
                c+=this.summaryrows.length
            }
            var b=Math.ceil(c/this.pagesize);
            if(this.dataview.pagenum<b-1){
                this.gotopage(this.dataview.pagenum+1)
            }else{
                this.gotopage(0)
            }
        },
        updatepagerdetails:function(){
            if(this.pagerdetails!=null&&this.pagerdetails.length>0){
                var f=this.dataview.pagenum*this.pagesize;
                var c=(this.dataview.pagenum+1)*this.pagesize;
                if(c>=this.dataview.totalrecords){
                    c=this.dataview.totalrecords
                }
                var b=this.dataview.totalrecords;
                if(this.summaryrows){
                    b+=this.summaryrows.length;
                    if((this.dataview.pagenum+1)*this.pagesize>this.dataview.totalrecords){
                        c=b
                    }
                }
                f++;
                var e=this.pagergotoinput.find("input");
                e.val(this.dataview.pagenum+1);
                var d=Math.round(b/this.dataview.pagesize);
                if(d>1){
                    d--
                }
                d++;
                this.pagergotoinput.attr("title","1 - "+d);
                if(c==0&&c<f){
                    f=0
                }
                this.pagerdetails[0].innerHTML=f+"-"+c+this.gridlocalization.pagerrangestring+b;
                if(f>c){
                    this.gotoprevpage()
                }
            }
        },
        _updatepagedview:function(h,j,c){
            var d=this;
            var g=this.dataview.rows.length;
            for(i=0;i<g;i++){
                var e=this.dataview.rows[i].visibleindex;
                var b={
                    index:e,
                    height:this.heights[e],
                    hidden:this.hiddens[e],
                    details:this.details[e]
                };
            
                if(this.heights[e]==undefined){
                    this.heights[e]=this.rowsheight;
                    b.height=this.rowsheight
                }
                if(this.hiddens[e]==undefined){
                    this.hiddens[e]=false;
                    b.hidden=false
                }
                if(this.details[e]==undefined){
                    this.details[e]=null
                }
                if(b.height!=d.rowsheight){
                    j-=d.rowsheight;
                    j+=b.height
                }
                if(b.hidden){
                    j-=b.height
                }else{
                    c+=b.height;
                    var f=0;
                    if(this.rowdetails){
                        if(b.details&&b.details.rowdetails&&!b.details.rowdetailshidden){
                            f=b.details.rowdetailsheight;
                            c+=f;
                            j+=f
                        }
                    }
                }
            }
            this._pageviews[0]={
                top:0,
                height:c
            };

            return j
        }
    })
})(jQuery);