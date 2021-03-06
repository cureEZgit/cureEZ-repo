/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.extend(a.jqx._jqxGrid.prototype,{
        _updatefilterrowui:function(f){
            var m=this.columns.records.length;
            var e=0;
            for(var h=0;h<m;h++){
                var g=this.columns.records[h];
                var c=g.width;
                if(c<g.minwidth){
                    c=g.minwidth
                }
                if(c>g.maxwidth){
                    c=g.maxwidth
                }
                var l=a(this.filterrow[0].cells[h]);
                l.css("left",e);
                var k=true;
                if(l.width()==c){
                    k=false
                }
                if(f){
                    k=true
                }
                l.width(c);
                l[0].left=e;
                if(!(g.hidden&&g.hideable)){
                    e+=c
                }else{
                    l.css("display","none")
                }
                if(!k){
                    continue
                }
                if(g.createfilterwidget){
                    g.createfilterwidget(g,l)
                }else{
                    if(g.filterable){
                        var d=function(n,o){
                            var j=a(o.children()[0]);
                            j.width(c-10)
                        };
                            
                        switch(g.filtertype){
                            case"number":
                                a(l.children()[0]).width(c);
                                l.find("input").width(c-30);
                                break;
                            case"date":
                                if(this.host.jqxDateTimeInput){
                                    a(l.children()[0]).jqxDateTimeInput({
                                        width:c-10
                                    })
                                }else{
                                    d(this,l)
                                }
                                break;
                            case"textbox":case"default":
                                d(this,l);
                                break;
                            case"list":case"checkedlist":
                                if(this.host.jqxDropDownList){
                                    a(l.children()[0]).jqxDropDownList({
                                        width:c-10
                                    })
                                }else{
                                    d(this,l)
                                }
                                break;
                            case"bool":case"boolean":
                                if(!this.host.jqxCheckBox){
                                    d(this,l)
                                }
                                break
                        }
                    }
                }
            }
            var b=a(this.filterrow.children()[0]);
            b.width(parseInt(e)+2);
            b.height(this.filterrowheight)
        },
        _applyfilterfromfilterrow:function(){
            var z=this.columns.records.length;
            var C=this;
            for(var t=0;t<z;t++){
                var k=new a.jqx.filter();
                var u=this.columns.records[t];
                var f=C._getcolumntypebydatafield(u);
                var d=C._getfiltertype(f);
                var l=1;
                var D=true;
                var e=u.filtertype;
                var A=function(F,K,I){
                    var j=true;
                    if(F._filterwidget){
                        var G=F._filterwidget.val();
                        if(G!=""){
                            var J="equal";
                            if(K=="stringfilter"){
                                var J="contains"
                            }
                            var H=I.createfilter(K,G,J);
                            I.addfilter(l,H)
                        }else{
                            j=false
                        }
                    }
                    return j
                };
        
                switch(u.filtertype){
                    case"date":
                        if(u._filterwidget.jqxDateTimeInput){
                            var p=u._filterwidget.jqxDateTimeInput("getRange");
                            if(p!=null&&p.from!=null&&p.to!=null){
                                var o="GREATER_THAN_OR_EQUAL";
                                var r=new Date(0);
                                r.setHours(0);
                                r.setFullYear(p.from.getFullYear(),p.from.getMonth(),p.from.getDate());
                                var q=new Date(0);
                                q.setHours(0);
                                q.setFullYear(p.to.getFullYear(),p.to.getMonth(),p.to.getDate());
                                var y=k.createfilter(d,r,o);
                                k.addfilter(0,y);
                                var c="LESS_THAN_OR_EQUAL";
                                var x=k.createfilter(d,q,c);
                                k.addfilter(0,x)
                            }else{
                                D=false
                            }
                        }else{
                            D=A(u,d,k)
                        }
                        break;
                    case"number":
                        if(u._filterwidget){
                            var p=u._filterwidget.find("input").val();
                            var h=u._filterwidget.find(".filter").jqxDropDownList("selectedIndex");
                            var w=k.getoperatorsbyfiltertype(d)[h];
                            if(C.updatefilterconditions){
                                var E=C.updatefilterconditions(d,k.getoperatorsbyfiltertype(d));
                                if(E!=undefined){
                                    k.setoperatorsbyfiltertype(d,E)
                                }
                                var w=k.getoperatorsbyfiltertype(d)[h]
                            }
                            var n=w=="NULL"||w=="NOT_NULL";
                            var s=w=="EMPTY"||w=="NOT_EMPTY";
                            if(p.length>0||n||s){
                                y=k.createfilter(d,p,w,null,u.cellsformat,C.gridlocalization);
                                k.addfilter(0,y)
                            }else{
                                D=false
                            }
                        }else{
                            D=false
                        }
                        break;
                    case"textbox":case"default":
                        D=A(u,d,k);
                        break;
                    case"bool":case"boolean":
                        if(u._filterwidget.jqxCheckBox){
                            var p=u._filterwidget.jqxCheckBox("checked");
                            if(p!=null){
                                var o="equal";
                                var m=k.createfilter(d,p,o);
                                k.addfilter(l,m)
                            }else{
                                D=false
                            }
                        }else{
                            D=A(u,d,k)
                        }
                        break;
                    case"list":
                        var g=u._filterwidget.jqxDropDownList("listBox");
                        if(g.selectedIndex>0){
                            var b=g.getItem(g.selectedIndex);
                            var p=b.value;
                            var o="equal";
                            var m=k.createfilter(d,p,o);
                            k.addfilter(l,m)
                        }else{
                            D=false
                        }
                        break;
                    case"checkedlist":
                        if(u._filterwidget.jqxDropDownList){
                            var g=u._filterwidget.jqxDropDownList("listBox");
                            var B=g.getCheckedItems();
                            if(B.length==0){
                                var l=1;
                                var p="Empty";
                                var o="equal";
                                var m=k.createfilter(d,p,o);
                                k.addfilter(l,m);
                                D=true
                            }else{
                                if(B.length!=g.items.length){
                                    for(var v=0;v<B.length;v++){
                                        var p=B[v].value;
                                        var o="equal";
                                        var m=k.createfilter(d,p,o);
                                        k.addfilter(l,m)
                                    }
                                }else{
                                    D=false
                                }
                            }
                        }else{
                            D=A(u,d,k)
                        }
                        break
                }
                if(D){
                    this.addfilter(u.datafield,k,false)
                }else{
                    this.removefilter(u.datafield,false)
                }
            }
            this.applyfilters()
        },
        _updatefilterrow:function(){
            var b=a('<div style="position: relative;" id="row'+i+this.element.id+'"></div>');
            var e=0;
            var o=this.columns.records.length;
            var m=this.toThemeProperty("jqx-grid-cell");
            m+=" "+this.toThemeProperty("jqx-grid-cell-pinned");
            var q=o+10;
            var r=new Array();
            var n=this;
            this.filterrow[0].cells=r;
            b.height(this.filterrowheight);
            this.filterrow.children().detach();
            this.filterrow.append(b);
            if(!this._filterrowcache){
                this._filterrowcache=new Array()
            }
            var f=false;
            for(var g=0;g<o;g++){
                var d=this.columns.records[g];
                var c=d.width;
                if(c<d.minwidth){
                    c=d.minwidth
                }
                if(c>d.maxwidth){
                    c=d.maxwidth
                }
                var l=a('<div style="overflow: hidden; position: absolute; height: 100%;" class="'+m+'"></div>');
                b.append(l);
                l.css("left",e);
                l.css("z-index",q--);
                l.width(c);
                l[0].left=e;
                if(!(d.hidden&&d.hideable)){
                    e+=c
                }else{
                    l.css("display","none")
                }
                r[r.length]=l[0];
                var k=true;
                if(this.groupable){
                    var p=this.rowdetails?1:0;
                    if(this.groups.length+p>g){
                        k=false
                    }
                }
                if(this.rowdetails&&g==0){
                    k=false
                }
                if(k){
                    if(d.filtertype=="custom"&&d.createfilterwidget){
                        var h=function(){
                            n._applyfilterfromfilterrow()
                        };
                
                        d.createfilterwidget(d,l,h)
                    }else{
                        if(d.filterable){
                            if(this._filterrowcache[d.datafield]){
                                f=true;
                                l.append(this._filterrowcache[d.datafield]);
                                d._filterwidget=this._filterrowcache[d.datafield]
                            }else{
                                this._addfilterwidget(d,l,c);
                                this._filterrowcache[d.datafield]=d._filterwidget
                            }
                        }
                    }
                }
            }
            if(a.browser.msie&&a.browser.version<8){
                b.css("z-index",q--)
            }
            b.width(parseInt(e)+2);
            this.filterrow.addClass(m);
            this.filterrow.css("border-top-width","1px");
            if(f){
                this._updatefilterrowui(true)
            }
        },
        _addfilterwidget:function(y,d,w){
            var C=this;
            var u="";
            for(var z=0;z<C.dataview.filters.length;z++){
                var s=C.dataview.filters[z];
                if(s.datafield&&s.datafield==y.datafield){
                    u=s.filter.getfilters()[0].value;
                    break
                }
            }
            var e=function(D,E){
                var f=a('<input autocomplete="off" type="textarea"/>');
                f[0].id=a.jqx.utilities.createId();
                f.addClass(D.toThemeProperty("jqx-input"));
                f.addClass(D.toThemeProperty("jqx-widget-content"));
                f.appendTo(E);
                f.width(w-10);
                f.height(D.filterrowheight-10);
                f.css("margin","4px");
                y._filterwidget=f;
                f.bind("keydown",function(F){
                    if(F.keyCode=="13"){
                        D._applyfilterfromfilterrow()
                    }
                    if(f[0]._writeTimer){
                        clearTimeout(f[0]._writeTimer)
                    }
                    f[0]._writeTimer=setTimeout(function(){
                        if(D["_oldWriteText"+f[0].id]!=f.val()){
                            D._applyfilterfromfilterrow();
                            D["_oldWriteText"+f[0].id]=f.val()
                        }
                    },400)
                });
                D.host.removeClass("jqx-disableselect");
                D.content.removeClass("jqx-disableselect");
                f.val(u)
            };

            switch(y.filtertype){
                case"number":
                    var j=a("<div></div>");
                    j.width(d.width());
                    j.height(this.filterrowheight);
                    d.append(j);
                    var w=d.width()-20;
                    var n=function(E,F,f){
                        var D=a('<input style="float: left;" autocomplete="off" type="textarea"/>');
                        D[0].id=a.jqx.utilities.createId();
                        D.addClass(C.toThemeProperty("jqx-input"));
                        D.addClass(C.toThemeProperty("jqx-widget-content"));
                        D.appendTo(E);
                        D.width(F-10);
                        D.height(C.filterrowheight-10);
                        D.css("margin","4px");
                        D.css("margin-right","2px");
                        D.bind("keydown",function(G){
                            if(G.keyCode=="13"){
                                C._applyfilterfromfilterrow()
                            }
                            if(D[0]._writeTimer){
                                clearTimeout(D[0]._writeTimer)
                            }
                            D[0]._writeTimer=setTimeout(function(){
                                if(C["_oldWriteText"+D[0].id]!=D.val()){
                                    C._applyfilterfromfilterrow();
                                    C["_oldWriteText"+D[0].id]=D.val()
                                }
                            },400)
                        });
                        D.val(u);
                        return D
                    };
        
                    n(j,w);
                    var x=C._getfiltersbytype("number");
                    var o=a("<div class='filter' style='float: left;'></div>");
                    o.css("margin-top","4px");
                    o.appendTo(j);
                    o.jqxDropDownList({
                        dropDownHorizontalAlignment:"right",
                        enableBrowserBoundsDetection:false,
                        selectedIndex:2,
                        width:18,
                        height:20,
                        dropDownHeight:150,
                        dropDownWidth:170,
                        source:x,
                        theme:C.theme
                    });
                    o.jqxDropDownList({
                        selectionRenderer:function(f){
                            return""
                        }
                    });
                    o.jqxDropDownList("setContent","");
                    o.find(".jqx-dropdownlist-content").hide();
                    y._filterwidget=j;
                    o.bind("select",function(){
                        if(y._filterwidget.find("input").val().length>0){
                            C._applyfilterfromfilterrow()
                        }
                    });
                    break;
                case"textbox":case"default":
                    e(this,d);
                    break;
                case"date":
                    if(this.host.jqxDateTimeInput){
                        var b=a("<div></div>");
                        b.css("margin","4px");
                        b.appendTo(d);
                        b.jqxDateTimeInput({
                            showFooter:true,
                            formatString:y.cellsformat,
                            selectionMode:"range",
                            value:null,
                            theme:this.theme,
                            width:w-10,
                            height:this.filterrowheight-10
                        });
                        y._filterwidget=b;
                        b.bind("valuechanged",function(f){
                            C._applyfilterfromfilterrow()
                        })
                    }else{
                        e(this,d)
                    }
                    break;
                case"list":case"checkedlist":
                    if(this.host.jqxDropDownList){
                        var v=this.source._source?true:false;
                        var m=null;
                        if(!v){
                            m=new a.jqx.dataAdapter(this.source,{
                                autoBind:false,
                                uniqueDataFields:[column.datafield],
                                async:false
                            })
                        }else{
                            var A={
                                localdata:this.source.records,
                                datatype:this.source.datatype,
                                async:false
                            };
        
                            m=new a.jqx.dataAdapter(A,{
                                autoBind:false,
                                async:false,
                                uniqueDataFields:[y.datafield]
                            })
                        }
                        var h=true;
                        var o=a("<div></div>");
                        o.css("margin","4px");
                        var p=y.datafield;
                        var q=y.filtertype=="checkedlist"?true:false;
                        o.jqxDropDownList({
                            checkboxes:q,
                            source:m,
                            autoDropDownHeight:h,
                            theme:this.theme,
                            width:w-10,
                            height:this.filterrowheight-10,
                            displayMember:p,
                            valueMember:p
                        });
                        o.appendTo(d);
                        var l=o.jqxDropDownList("getItems");
                        var c=o.jqxDropDownList("listBox");
                        if(l.length<8){
                            o.jqxDropDownList("autoDropDownHeight",true)
                        }else{
                            o.jqxDropDownList("autoDropDownHeight",false)
                        }
                        if(q){
                            o.jqxDropDownList({
                                selectionRenderer:function(f){
                                    return"Select Filter"
                                }
                            });
                            var t=a('<span style="top: 2px; position: relative; color: inherit; border: none; background-color: transparent;">Select Filter</span>');
                            t.addClass(this.toThemeProperty("jqx-item"));
                            o.jqxDropDownList("setContent",t);
                            var g=true;
                            c.insertAt(C.gridlocalization.filterselectallstring,0);
                            var B=new Array();
                            c.checkAll();
                            c.host.bind("checkChange",function(E){
                                if(!g){
                                    return
                                }
                                if(E.args.label!=C.gridlocalization.filterselectallstring){
                                    g=false;
                                    c.host.jqxListBox("checkIndex",0);
                                    var f=c.host.jqxListBox("getCheckedItems");
                                    var D=c.host.jqxListBox("getItems");
                                    if(f.length==1){
                                        c.host.jqxListBox("uncheckIndex",0)
                                    }else{
                                        if(D.length!=f.length){
                                            c.host.jqxListBox("indeterminateIndex",0)
                                        }
                                    }
                                    g=true
                                }else{
                                    g=false;
                                    if(E.args.checked){
                                        c.host.jqxListBox("checkAll")
                                    }else{
                                        c.host.jqxListBox("uncheckAll")
                                    }
                                    g=true
                                }
                            })
                        }else{
                            c.insertAt({
                                label:this.gridlocalization.filterchoosestring,
                                value:""
                            },0);
                            o.jqxDropDownList({
                                selectedIndex:0
                            })
                        }
                        if(y.createfilterwidget){
                            y.createfilterwidget(y,d,o)
                        }
                        y._filterwidget=o;
                        o[0]._selectionChanged=false;
                        this.addHandler(c.content,"click",function(f){
                            C._applyfilterfromfilterrow();
                            o[0]._selectionChanged=false
                        });
                        this.addHandler(o,"select",function(f){
                            o[0]._selectionChanged=true
                        });
                        var k=o.jqxDropDownList("dropdownlistWrapper");
                        this.addHandler(o,"close",function(f){
                            if(o[0]._selectionChanged){
                                C._applyfilterfromfilterrow();
                                o[0]._selectionChanged=false
                            }
                        })
                    }else{
                        e(this,d)
                    }
                    break;
                case"bool":case"boolean":
                    if(this.host.jqxCheckBox){
                        var r=a('<div tabIndex=0 style="opacity: 0.99; position: absolute; top: 50%; left: 50%; margin-top: -7px; margin-left: -10px;"></div>');
                        r.appendTo(d);
                        r.jqxCheckBox({
                            enableContainerClick:false,
                            animationShowDelay:0,
                            animationHideDelay:0,
                            hasThreeStates:true,
                            theme:this.theme,
                            checked:null
                        });
                        if(y.createfilterwidget){
                            y.createfilterwidget(y,d,r)
                        }
                        if(u===true||u=="true"){
                            r.jqxCheckBox({
                                checked:true
                            })
                        }else{
                            if(u===false||u=="false"){
                                r.jqxCheckBox({
                                    checked:false
                                })
                            }
                        }
                        y._filterwidget=r;
                        r.bind("change",function(f){
                            if(f.args){
                                C._applyfilterfromfilterrow()
                            }
                        })
                    }else{
                        e(this,d)
                    }
                    break
            }
        },
        _renderfiltercolumn:function(){
            var b=this;
            if(this.filterable){
                a.each(this.columns.records,function(c,d){
                    if(b.autoshowfiltericon){
                        if(this.filter){
                            a(this.filtericon).show()
                        }else{
                            a(this.filtericon).hide()
                        }
                    }else{
                        if(this.filterable){
                            a(this.filtericon).show()
                        }
                    }
                })
            }
        },
        _getcolumntypebydatafield:function(e){
            var f=this;
            var d="string";
            var c=f.source.datafields||((f.source._source)?f.source._source.datafields:null);
            if(c){
                var h="";
                a.each(c,function(){
                    if(this.name==e.datafield){
                        if(this.type){
                            h=this.type
                        }
                        return false
                    }
                });
                if(h){
                    return h
                }
            }
            if(e!=null){
                if(this.dataview.cachedrecords==undefined){
                    return d
                }
                var b=null;
                if(!this.virtualmode){
                    if(this.dataview.cachedrecords.length==0){
                        return d
                    }
                    b=this.dataview.cachedrecords[0][e.datafield];
                    if(b!=null&&b.toString()==""){
                        return"string"
                    }
                }else{
                    a.each(this.dataview.cachedrecords,function(){
                        b=this[e.datafield];
                        return false
                    })
                }
                if(b!=null){
                    if(typeof b=="boolean"){
                        d="boolean"
                    }else{
                        if(a.jqx.dataFormat.isNumber(b)){
                            d="number"
                        }else{
                            var g=new Date(b);
                            if(g.toString()=="NaN"||g.toString()=="Invalid Date"){
                                if(a.jqx.dataFormat){
                                    g=a.jqx.dataFormat.tryparsedate(b);
                                    if(g!=null){
                                        return"date"
                                    }else{
                                        d="string"
                                    }
                                }else{
                                    d="string"
                                }
                            }else{
                                d="date"
                            }
                        }
                    }
                }
            }
            return d
        },
        _getfiltersbytype:function(b){
            var c=this;
            var d="";
            switch(b){
                case"number":case"float":case"int":
                    d=c.gridlocalization.filternumericcomparisonoperators;
                    break;
                case"date":
                    d=c.gridlocalization.filterdatecomparisonoperators;
                    break;
                case"boolean":case"bool":
                    d=c.gridlocalization.filterbooleancomparisonoperators;
                    break;
                case"string":default:
                    d=c.gridlocalization.filterstringcomparisonoperators;
                    break
            }
            return d
        },
        _updatefilterpanel:function(y,c,d){
            if(y==null||y==undefined){
                y=this
            }
            var e=y._getcolumntypebydatafield(d);
            var t=y._getfiltersbytype(e);
            if(!y.host.jqxDropDownList){
                alert("jqxdropdownlist is not loaded.");
                return
            }
            var o=a(c).find("#filterclearbutton"+y.element.id);
            var h=a(c).find("#filterbutton"+y.element.id);
            var v=a(c).find("#filter1"+y.element.id);
            var s=a(c).find("#filter2"+y.element.id);
            var u=a(c).find("#filter3"+y.element.id);
            var r=a(c).find(".filtertext1"+y.element.id);
            var q=a(c).find(".filtertext2"+y.element.id);
            r.val("");
            q.val("");
            this.removeHandler(h,"click");
            this.addHandler(h,"click",function(){
                y._buildfilter(y,c,d);
                y._closemenu()
            });
            this.removeHandler(o,"click");
            this.addHandler(o,"click",function(){
                y._clearfilter(y,c,d);
                y._closemenu()
            });
            v.jqxDropDownList({
                enableBrowserBoundsDetection:false,
                source:t
            });
            u.jqxDropDownList({
                enableBrowserBoundsDetection:false,
                source:t
            });
            if(e=="boolean"||e=="bool"){
                v.jqxDropDownList({
                    autoDropDownHeight:true,
                    selectedIndex:0
                });
                u.jqxDropDownList({
                    autoDropDownHeight:true,
                    selectedIndex:0
                })
            }else{
                v.jqxDropDownList({
                    autoDropDownHeight:false,
                    selectedIndex:2
                });
                u.jqxDropDownList({
                    autoDropDownHeight:false,
                    selectedIndex:2
                })
            }
            s.jqxDropDownList({
                selectedIndex:0
            });
            var m=d.filter;
            if(m!=null){
                var x=m.getfilterat(0);
                var w=m.getfilterat(1);
                var l=m.getoperatorat(0);
                var j=[];
                var b="";
                switch(e){
                    case"number":case"int":case"float":case"decimal":
                        b="numericfilter";
                        j=m.getoperatorsbyfiltertype("numericfilter");
                        break;
                    case"boolean":case"bool":
                        b="booleanfilter";
                        j=m.getoperatorsbyfiltertype("booleanfilter");
                        break;
                    case"date":case"time":
                        b="datefilter";
                        j=m.getoperatorsbyfiltertype("datefilter");
                        break;
                    case"string":
                        b="stringfilter";
                        j=m.getoperatorsbyfiltertype("stringfilter");
                        break
                }
                if(y.updatefilterconditions){
                    var z=y.updatefilterconditions(b,j);
                    if(z!=undefined){
                        m.setoperatorsbyfiltertype(b,z);
                        j=z
                    }
                }
                var k=this.enableanimations?"default":"none";
                if(x!=null){
                    var g=j.indexOf(x.comparisonoperator);
                    var p=x.filtervalue;
                    r.val(p);
                    v.jqxDropDownList({
                        selectedIndex:g,
                        animationType:k
                    })
                }
                if(w!=null){
                    var f=j.indexOf(w.comparisonoperator);
                    var n=w.filtervalue;
                    q.val(n);
                    u.jqxDropDownList({
                        selectedIndex:f,
                        animationType:k
                    })
                }
                if(m.getoperatorat(0)==undefined){
                    s.jqxDropDownList({
                        selectedIndex:0,
                        animationType:k
                    })
                }else{
                    if(m.getoperatorat(0)=="and"||m.getoperatorat(0)==0){
                        s.jqxDropDownList({
                            selectedIndex:0
                        })
                    }else{
                        s.jqxDropDownList({
                            selectedIndex:1
                        })
                    }
                }
            }
            if(y.updatefilterpanel){
                y.updatefilterpanel(v,u,s,r,q,h,o,m,b,j)
            }
            r.focus();
            setTimeout(function(){
                r.focus()
            },10)
        },
        _getfiltertype:function(b){
            var c="stringfilter";
            switch(b){
                case"number":case"int":case"float":case"decimal":
                    c="numericfilter";
                    break;
                case"boolean":case"bool":
                    c="booleanfilter";
                    break;
                case"date":case"time":
                    c="datefilter";
                    break;
                case"string":
                    c="stringfilter";
                    break
            }
            return c
        },
        _buildfilter:function(B,d,e){
            var y=a(d).find("#filter1"+B.element.id);
            var k=a(d).find("#filter2"+B.element.id);
            var v=a(d).find("#filter3"+B.element.id);
            var r=a(d).find(".filtertext1"+B.element.id);
            var q=a(d).find(".filtertext2"+B.element.id);
            var p=r.val();
            var n=q.val();
            var f=B._getcolumntypebydatafield(e);
            var s=B._getfiltersbytype(f);
            var h=y.jqxDropDownList("selectedIndex");
            var x=k.jqxDropDownList("selectedIndex");
            var g=v.jqxDropDownList("selectedIndex");
            var j=new a.jqx.filter();
            var A=null;
            var z=null;
            var c=B._getfiltertype(f);
            if(B.updatefilterconditions){
                var C=B.updatefilterconditions(c,j.getoperatorsbyfiltertype(c));
                if(C!=undefined){
                    j.setoperatorsbyfiltertype(c,C)
                }
            }
            var b=false;
            var w=j.getoperatorsbyfiltertype(c)[h];
            var v=j.getoperatorsbyfiltertype(c)[g];
            var o=w=="NULL"||w=="NOT_NULL";
            var u=w=="EMPTY"||w=="NOT_EMPTY";
            if(w==undefined){
                w=j.getoperatorsbyfiltertype(c)[0]
            }
            if(v==undefined){
                v=j.getoperatorsbyfiltertype(c)[0]
            }
            if(p.length>0||o||u){
                A=j.createfilter(c,p,w,null,e.cellsformat,B.gridlocalization);
                j.addfilter(x,A);
                b=true
            }
            var m=v=="NULL"||v=="NOT_NULL";
            var t=v=="EMPTY"||v=="NOT_EMPTY";
            if(n.length>0||m||t){
                z=j.createfilter(c,n,v,null,e.cellsformat,B.gridlocalization);
                j.addfilter(x,z);
                b=true
            }
            if(b){
                var l=e.datafield;
                this.addfilter(l,j,true)
            }else{
                this._clearfilter(B,d,e)
            }
        },
        _clearfilter:function(e,c,d){
            var b=d.datafield;
            this.removefilter(b,true)
        },
        addfilter:function(d,e,c){
            if(this._loading){
                alert(this.loadingerrormessage);
                return false
            }
            var f=this.getcolumn(d);
            var b=this._getcolumn(d);
            if(f==undefined||f==null){
                return
            }
            f.filter=e;
            b.filter=e;
            this.dataview.addfilter(d,e);
            if(c==true&&c!=undefined){
                this.applyfilters()
            }
        },
        removefilter:function(d,c){
            if(this._loading){
                alert(this.loadingerrormessage);
                return false
            }
            var e=this.getcolumn(d);
            var b=this._getcolumn(d);
            if(e==undefined||e==null){
                return
            }
            if(e.filter==null){
                return
            }
            this.dataview.removefilter(d,e.filter);
            e.filter=null;
            b.filter=null;
            if(c==true||c!=undefined){
                this.applyfilters()
            }
        },
        applyfilters:function(){
            var c=false;
            if(this.dataview.filters.length>=0&&(this.virtualmode||!this.source.localdata)){
                if(this.source!=null&&this.source.filter){
                    var f=-1;
                    if(this.pageable){
                        f=this.dataview.pagenum;
                        this.dataview.pagenum=0
                    }
                    this.source.filter(this.dataview.filters,this.dataview.records,this.dataview.records.length);
                    if(this.pageable){
                        this.dataview.pagenum=f
                    }
                }
            }
            if(!this.virtualmode){
                var b=this.selectedrowindexes;
                var d=this;
                if(b.length>0){
                    if(this.dataview.filters&&this.dataview.filters.length==0){
                        var e=new Array();
                        a.each(b,function(){
                            var g=d.getrowdata(this);
                            if(g&&g.dataindex){
                                e[e.length]=g.dataindex
                            }
                        });
                        this.selectedrowindexes=e;
                        this.selectedrowindex=this.selectedrowindexes.length>0?this.selectedrowindexes[0]:-1
                    }
                }
                this.dataview.refresh();
                if(b.length>0){
                    if(this.dataview.filters&&this.dataview.filters.length>0){
                        var e=new Array();
                        a.each(b,function(){
                            var g=d.dataview._dataIndexToBoundIndex[this];
                            if(g!=null){
                                e[e.length]=g.boundindex
                            }
                        });
                        this.selectedrowindexes=e;
                        this.selectedrowindex=this.selectedrowindexes.length>0?this.selectedrowindexes[0]:-1
                    }
                }
            }else{
                if(this.pageable){
                    this.dataview.updateview();
                    if(this.gotopage){
                        this.gotopage(0)
                    }
                }
                this.rendergridcontent(false,false);
                this._raiseEvent(13,{
                    filters:this.dataview.filters
                });
                return
            }
            if(this.pageable){
                this.dataview.updateview();
                if(this.gotopage){
                    this.gotopage(0);
                    this.updatepagerdetails()
                }
            }
            this._updaterowsproperties();
            if(!this.groupable||(this.groupable&&this.groups.length==0)){
                this._rowdetailscache=new Array();
                this.virtualsizeinfo=null;
                this._pagescache=new Array();
                this.rendergridcontent(true,true);
                this._updatecolumnwidths();
                this._updatecellwidths();
                this._renderrows(this.virtualsizeinfo)
            }else{
                this._rowdetailscache=new Array();
                this._render(true,true,false,false)
            }
            this._raiseEvent(13,{
                filters:this.dataview.filters
            })
        },
        getfilterinformation:function(){
            var c=new Array();
            for(i=0;i<this.dataview.filters.length;i++){
                var b=this.getcolumn(this.dataview.filters[i].datafield);
                c[i]={
                    filter:this.dataview.filters[i].filter,
                    filtercolumn:b.datafield,
                    filtercolumntext:b.text
                }
            }
            return c
        },
        clearfilters:function(){
            var b=this;
            if(this.columns.records){
                a.each(this.columns.records,function(){
                    b.removefilter(this.datafield)
                })
            }
            this.applyfilters()
        },
        _destroyfilterpanel:function(){
            var e=a(a.find("#filterclearbutton"+this.element.id));
            var d=a(a.find("#filterbutton"+this.element.id));
            var h=a(a.find("#filter1"+this.element.id));
            var c=a(a.find("#filter2"+this.element.id));
            var g=a(a.find("#filter3"+this.element.id));
            var f=a(a.find(".filtertext1"+this.element.id));
            var b=a(a.find(".filtertext2"+this.element.id));
            if(f.length>0&&b.length>0){
                f.removeClass();
                b.removeClass();
                f.remove();
                b.remove()
            }
            if(e.length>0){
                e.jqxButton("destroy");
                d.jqxButton("destroy");
                this.removeHandler(e,"click");
                this.removeHandler(d,"click")
            }
            if(h.length>0){
                h.jqxDropDownList("destroy")
            }
            if(c.length>0){
                c.jqxDropDownList("destroy")
            }
            if(g>0){
                g.jqxDropDownList("destroy")
            }
        },
        _initfilterpanel:function(s,b,c,l){
            if(s==null||s==undefined){
                s=this
            }
            b[0].innerHTML="";
            var p=a("<div class='filter' style='margin-left: 7px;'></div>");
            b.append(p);
            var k=a("<div class='filter' style='margin-top: 3px; margin-bottom: 3px;'></div>");
            k.text(s.gridlocalization.filtershowrowstring);
            var q=a("<div class='filter' id='filter1"+s.element.id+"'></div>");
            var g=a("<div class='filter' id='filter2"+s.element.id+"' style='margin-bottom: 3px;'></div>");
            var o=a("<div class='filter' id='filter3"+s.element.id+"'></div>");
            var d=s._getcolumntypebydatafield(c);
            if(!q.jqxDropDownList){
                alert("jqxdropdownlist is not loaded.");
                return
            }
            var m=s._getfiltersbytype(d);
            var h=a("<div class='filter'><input class='filtertext1"+s.element.id+"' style='height: 20px; margin-top: 3px; margin-bottom: 3px;' type='text'></input></div>");
            h.find("input").addClass(this.toThemeProperty("jqx-input"));
            h.find("input").addClass(this.toThemeProperty("jqx-widget-content"));
            h.find("input").addClass(this.toThemeProperty("jqx-rc-all"));
            h.find("input").width(l-15);
            var j=a("<div class='filter'><input class='filtertext2"+s.element.id+"' style='height: 20px; margin-top: 3px;' type='text'></input></div>");
            j.find("input").addClass(this.toThemeProperty("jqx-input"));
            j.find("input").addClass(this.toThemeProperty("jqx-widget-content"));
            j.find("input").addClass(this.toThemeProperty("jqx-rc-all"));
            j.find("input").width(l-15);
            var f=a("<div class='filter' style='height: 25px; margin-left: 20px; margin-top: 7px;'></div>");
            var e=a('<span tabIndex=0 id="filterbutton'+s.element.id+'" class="filterbutton" style="padding: 4px 12px; margin-left: 2px;">'+s.gridlocalization.filterstring+"</span>");
            f.append(e);
            var r=a('<span tabIndex=0 id="filterclearbutton'+s.element.id+'" class="filterclearbutton" style="padding: 4px 12px; margin-left: 5px;">'+s.gridlocalization.filterclearstring+"</span>");
            f.append(r);
            e.jqxButton({
                height:20,
                theme:s.theme
            });
            r.jqxButton({
                height:20,
                theme:s.theme
            });
            var t=function(v){
                if(v.text().indexOf("case sensitive")!=-1){
                    var u=v.text();
                    u=u.replace("case sensitive","match case");
                    v.text(u)
                }
                v.css("font-family",s.host.css("font-family"));
                v.css("font-size",s.host.css("font-size"));
                return v
            };
        
            p.append(k);
            p.append(q);
            q.jqxDropDownList({
                enableBrowserBoundsDetection:false,
                selectedIndex:2,
                width:l-15,
                height:20,
                dropDownHeight:150,
                dropDownWidth:l-15,
                selectionRenderer:t,
                source:m,
                theme:s.theme
            });
            p.append(h);
            var n=new Array();
            n[0]=s.gridlocalization.filterandconditionstring;
            n[1]=s.gridlocalization.filterorconditionstring;
            g.jqxDropDownList({
                enableBrowserBoundsDetection:false,
                autoDropDownHeight:true,
                selectedIndex:0,
                width:60,
                height:20,
                source:n,
                selectionRenderer:t,
                theme:s.theme
            });
            p.append(g);
            o.jqxDropDownList({
                enableBrowserBoundsDetection:false,
                selectedIndex:2,
                width:l-15,
                height:20,
                dropDownHeight:150,
                dropDownWidth:l-15,
                selectionRenderer:t,
                source:m,
                theme:s.theme
            });
            p.append(o);
            p.append(j);
            p.append(f);
            if(s.updatefilterpanel){
                s.updatefilterpanel(q,o,g,h,j,e,r,null,null,m)
            }
        }
    });
    a.jqx.filter=function(){
        this.operator="and";
        var h=0;
        var e=1;
        var l=["EMPTY","NOT_EMPTY","CONTAINS","CONTAINS_CASE_SENSITIVE","DOES_NOT_CONTAIN","DOES_NOT_CONTAIN_CASE_SENSITIVE","STARTS_WITH","STARTS_WITH_CASE_SENSITIVE","ENDS_WITH","ENDS_WITH_CASE_SENSITIVE","EQUAL","EQUAL_CASE_SENSITIVE","NULL","NOT_NULL"];
        var n=["EQUAL","NOT_EQUAL","LESS_THAN","LESS_THAN_OR_EQUAL","GREATER_THAN","GREATER_THAN_OR_EQUAL","NULL","NOT_NULL"];
        var o=["EQUAL","NOT_EQUAL","LESS_THAN","LESS_THAN_OR_EQUAL","GREATER_THAN","GREATER_THAN_OR_EQUAL","NULL","NOT_NULL"];
        var g=["EQUAL","NOT_EQUAL"];
        var f=new Array();
        var m=new Array();
        this.evaluate=function(s){
            var r=true;
            for(i=0;i<f.length;i++){
                var q=f[i].evaluate(s);
                if(i==0){
                    r=q
                }else{
                    if(m[i]==e||m[i]=="or"){
                        r=r||q
                    }else{
                        r=r&&q
                    }
                }
            }
            return r
        };

        this.getfilterscount=function(){
            return f.length
        };
    
        this.setoperatorsbyfiltertype=function(q,r){
            switch(q){
                case"numericfilter":
                    n=r;
                    break;
                case"stringfilter":
                    l=r;
                    break;
                case"datefilter":
                    o=r;
                    break;
                case"booleanfilter":
                    g=r;
                    break
            }
        };

        this.getoperatorsbyfiltertype=function(q){
            var r=new Array();
            switch(q){
                case"numericfilter":
                    r=n.slice(0);
                    break;
                case"stringfilter":
                    r=l.slice(0);
                    break;
                case"datefilter":
                    r=o.slice(0);
                    break;
                case"booleanfilter":
                    r=g.slice(0);
                    break
            }
            return r
        };
    
        var k=function(){
            var q=function(){
                return(((1+Math.random())*65536)|0).toString(16).substring(1)
            };
        
            return(q()+"-"+q()+"-"+q())
        };
    
        this.createfilter=function(u,r,t,s,q,v){
            if(u==null||u==undefined){
                return null
            }
            switch(u){
                case"numericfilter":
                    return new j(r,t.toUpperCase());
                case"stringfilter":
                    return new p(r,t.toUpperCase());
                case"datefilter":
                    return new c(r,t.toUpperCase(),q,v);
                case"booleanfilter":
                    return new d(r,t.toUpperCase());
                case"custom":
                    return new b(r,t.toUpperCase(),s)
            }
            return null
        };
    
        this.getfilters=function(){
            var q=new Array();
            for(i=0;i<f.length;i++){
                var r={
                    value:f[i].filtervalue,
                    condition:f[i].comparisonoperator,
                    operator:m[i]
                };
            
                q[i]=r
            }
            return q
        };
    
        this.addfilter=function(q,r){
            f[f.length]=r;
            r.key=k();
            m[m.length]=q
        };
    
        this.removefilter=function(q){
            for(i=0;i<f.length;i++){
                if(f[i].key==q.key){
                    f.splice(i,1);
                    m.splice(i,1);
                    break
                }
            }
        };

        this.getoperatorat=function(q){
            if(q==undefined||q==null){
                return null
            }
            if(q<0||q>f.length){
                return null
            }
            return m[q]
        };
    
        this.setoperatorat=function(r,q){
            if(r==undefined||r==null){
                return null
            }
            if(r<0||r>f.length){
                return null
            }
            m[q]=q
        };
    
        this.getfilterat=function(q){
            if(q==undefined||q==null){
                return null
            }
            if(q<0||q>f.length){
                return null
            }
            return f[q]
        };
    
        this.setfilterat=function(q,r){
            if(q==undefined||q==null){
                return null
            }
            if(q<0||q>f.length){
                return null
            }
            r.key=k();
            f[q]=r
        };
    
        this.clear=function(){
            f=new Array();
            m=new Array()
        };
    
        var p=function(r,q){
            this.filtervalue=r;
            this.comparisonoperator=q;
            this.evaluate=function(v){
                var u=this.filtervalue;
                var s=this.comparisonoperator;
                if(v==null||v==undefined){
                    if(s=="NULL"){
                        return true
                    }
                    return false
                }
                var w="";
                try{
                    w=v.toString()
                }catch(t){
                    return true
                }
                switch(s){
                    case"EQUAL":
                        return a.jqx.string.equalsIgnoreCase(w,u);
                    case"EQUAL_CASE_SENSITIVE":
                        return a.jqx.string.equals(w,u);
                    case"CONTAINS":
                        return a.jqx.string.containsIgnoreCase(w,u);
                    case"CONTAINS_CASE_SENSITIVE":
                        return a.jqx.string.contains(w,u);
                    case"DOES_NOT_CONTAIN":
                        return !a.jqx.string.containsIgnoreCase(w,u);
                    case"DOES_NOT_CONTAIN_CASE_SENSITIVE":
                        return !a.jqx.string.contains(w,u);
                    case"EMPTY":
                        return w=="";
                    case"NOT_EMPTY":
                        return w!="";
                    case"NOT_NULL":
                        return w!=null;
                    case"STARTS_WITH":
                        return a.jqx.string.startsWithIgnoreCase(w,u);
                    case"ENDS_WITH":
                        return a.jqx.string.endsWithIgnoreCase(w,u);
                    case"ENDS_WITH_CASE_SENSITIVE":
                        return a.jqx.string.endsWith(w,u);
                    case"STARTS_WITH_CASE_SENSITIVE":
                        return a.jqx.string.startsWith(w,u);
                    default:
                        return false
                }
            }
        };

        var d=function(r,q){
            this.filtervalue=r;
            this.comparisonoperator=q;
            this.evaluate=function(u){
                var t=this.filtervalue;
                var s=this.comparisonoperator;
                if(u==null||u==undefined){
                    if(s=="NULL"){
                        return true
                    }
                    return false
                }
                var v=u;
                switch(s){
                    case"EQUAL":
                        return v==t||v.toString()==t.toString();
                    case"NOT_EQUAL":
                        return v!=t&&v.toString()!=t.toString();
                    default:
                        return false
                }
            }
        };

        var j=function(r,q){
            this.filtervalue=r;
            this.comparisonoperator=q;
            this.evaluate=function(v){
                var u=this.filtervalue;
                var s=this.comparisonoperator;
                if(v==null||v==undefined){
                    if(s=="NOT_NULL"){
                        return false
                    }
                    if(s=="NULL"){
                        return true
                    }else{
                        return false
                    }
                }else{
                    if(s=="NULL"){
                        return false
                    }
                    if(s=="NOT_NULL"){
                        return true
                    }
                }
                var w=v;
                try{
                    w=parseFloat(w)
                }catch(t){
                    if(v.toString()!=""){
                        return false
                    }
                }
                switch(s){
                    case"EQUAL":
                        return w==u;
                    case"NOT_EQUAL":
                        return w!=u;
                    case"GREATER_THAN":
                        return w>u;
                    case"GREATER_THAN_OR_EQUAL":
                        return w>=u;
                    case"LESS_THAN":
                        return w<u;
                    case"LESS_THAN_OR_EQUAL":
                        return w<=u;
                    default:
                        return true
                }
            }
        };

        var c=function(t,r,s,w){
            this.filtervalue=t;
            if(s!=undefined&&w!=undefined){
                var u=a.jqx.dataFormat.parsedate(t,s,w);
                if(u!=null){
                    this.filterdate=u
                }else{
                    var q=a.jqx.dataFormat.tryparsedate(t,w);
                    if(q!=null){
                        this.filterdate=q
                    }
                }
            }else{
                var v=new Date(t);
                if(v.toString()=="NaN"||v.toString()=="Invalid Date"){
                    this.filterdate=a.jqx.dataFormat.tryparsedate(t)
                }else{
                    this.filterdate=v
                }
            }
            this.comparisonoperator=r;
            this.evaluate=function(E){
                var F=this.filtervalue;
                var C=this.comparisonoperator;
                if(E==null||E==undefined){
                    if(C=="NOT_NULL"){
                        return false
                    }
                    if(C=="NULL"){
                        return true
                    }else{
                        return false
                    }
                }else{
                    if(C=="NULL"){
                        return false
                    }
                    if(C=="NOT_NULL"){
                        return true
                    }
                }
                var x=new Date();
                x.setFullYear(1900,0,1);
                x.setHours(12,0,0,0);
                try{
                    var A=new Date(E);
                    if(A.toString()=="NaN"||A.toString()=="Invalid Date"){
                        E=a.jqx.dataFormat.tryparsedate(E)
                    }else{
                        E=A
                    }
                    x=E
                }catch(B){
                    if(E.toString()!=""){
                        return false
                    }
                }
                if(this.filterdate!=null){
                    F=this.filterdate
                }else{
                    if(F.indexOf(":")!=-1||!isNaN(parseInt(F))){
                        var D=new Date(x);
                        D.setHours(12,0,0,0);
                        var y=F.split(":");
                        for(var z=0;z<y.length;z++){
                            if(z==0){
                                D.setHours(y[z])
                            }
                            if(z==1){
                                D.setMinutes(y[z])
                            }
                            if(z==2){
                                D.setSeconds(y[z])
                            }
                        }
                        F=D
                    }
                }
                switch(C){
                    case"EQUAL":
                        return x.toString()==F.toString();
                    case"NOT_EQUAL":
                        return x.toString()!=F.toString();
                    case"GREATER_THAN":
                        return x>F;
                    case"GREATER_THAN_OR_EQUAL":
                        return x>=F;
                    case"LESS_THAN":
                        return x<F;
                    case"LESS_THAN_OR_EQUAL":
                        return x<=F;
                    default:
                        return true
                }
            }
        };

        var b=function(r,q,s){
            this.filtervalue=r;
            this.comparisonoperator=q;
            this.evaluate=function(u,t){
                return s(this.filtervalue,u,this.comparisonoperator)
            }
        }
    }
})(jQuery);