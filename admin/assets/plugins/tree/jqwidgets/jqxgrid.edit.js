/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.extend(a.jqx._jqxGrid.prototype,{
        _handledblclick:function(t,n){
            if(t.target==null){
                return
            }
            if(n.disabled){
                return
            }
            if(a(t.target).ischildof(this.columnsheader)){
                return
            }
            var v;
            if(t.which){
                v=(t.which==3)
            }else{
                if(t.button){
                    v=(t.button==2)
                }
            }
            if(v){
                return
            }
            var z;
            if(t.which){
                z=(t.which==2)
            }else{
                if(t.button){
                    z=(t.button==1)
                }
            }
            if(z){
                return
            }
            var u=this.showheader?this.columnsheader.height()+2:0;
            var o=this._groupsheader()?this.groupsheader.height():0;
            var e=this.host.offset();
            var l=t.pageX-e.left;
            var k=t.pageY-u-e.top-o;
            var b=this._hittestrow(l,k);
            var g=b.row;
            var h=b.index;
            var q=t.target.className;
            var p=this.table[0].rows[h];
            if(p==null){
                return
            }
            n.mousecaptured=true;
            n.mousecaptureposition={
                left:t.pageX,
                top:t.pageY-o
            };
        
            var r=this.hScrollInstance;
            var s=r.value;
            var d=0;
            var j=this.groupable?this.groups.length:0;
            for(i=0;i<p.cells.length;i++){
                var f=parseInt(a(this.columnsrow[0].cells[i]).css("left"))-s;
                var w=f+a(this.columnsrow[0].cells[i]).width();
                if(w>=l&&l>=f){
                    d=i;
                    break
                }
            }
            if(g!=null){
                var c=this._getcolumnat(d);
                if(!(q.indexOf("jqx-grid-group-expand")!=-1||q.indexOf("jqx-grid-group-collapse")!=-1)){
                    if(g.boundindex!=-1){
                        n.begincelledit(g.boundindex,c.datafield,c.defaulteditorvalue)
                    }
                }
            }
        },
        _handleeditkeydown:function(c,s){
            var o=c.charCode?c.charCode:c.keyCode?c.keyCode:0;
            if(s.showfilterrow&&s.filterable){
                if(this.filterrow){
                    if(a(c.target).ischildof(this.filterrow)){
                        return true
                    }
                }
            }
            if(this.editcell){
                if(o==32){
                    if(s.editcell.columntype=="checkbox"){
                        var l=!s.getcellvalue(s.editcell.row,s.editcell.column);
                        s.setcellvalue(s.editcell.row,s.editcell.column,l,true);
                        s._raiseEvent(18,{
                            rowindex:s.editcell.row,
                            datafield:s.editcell.column,
                            oldvalue:!l,
                            value:l,
                            columntype:"checkbox"
                        });
                        return false
                    }
                }
                if(o==9){
                    var r=this.editcell.row;
                    var d=this.editcell.column;
                    var h=d;
                    var k=s._getcolumnindex(d);
                    var j=false;
                    var b=s.getrowvisibleindex(r);
                    if(this.editcell.validated!=false){
                        if(c.shiftKey){
                            var e=s._getprevvisiblecolumn(k);
                            if(e){
                                d=e.datafield;
                                j=true;
                                if(s.selectionmode.indexOf("cell")!=-1){
                                    s.selectprevcell(r,h);
                                    setTimeout(function(){
                                        s.ensurecellvisible(b,d)
                                    },10)
                                }
                            }
                        }else{
                            var e=s._getnextvisiblecolumn(k);
                            if(e){
                                d=e.datafield;
                                j=true;
                                if(s.selectionmode.indexOf("cell")!=-1){
                                    s.selectnextcell(r,h);
                                    setTimeout(function(){
                                        s.ensurecellvisible(b,d)
                                    },10)
                                }
                            }
                        }
                        if(j){
                            s.begincelledit(r,d);
                            if(this.editcell!=null&&this.editcell.columntype=="checkbox"){
                                this._renderrows(this.virtualsizeinfo)
                            }
                        }
                    }
                    return false
                }else{
                    if(o==13){
                        this.endcelledit(this.editcell.row,this.editcell.column,false,true);
                        return false
                    }else{
                        if(o==27){
                            this.endcelledit(this.editcell.row,this.editcell.column,true,true);
                            return false
                        }
                    }
                }
            }else{
                var f=false;
                if(o==113){
                    f=true
                }
                if(o>=48&&o<=57){
                    this.editchar=String.fromCharCode(o);
                    f=true
                }
                if(o>=65&&o<=90){
                    this.editchar=String.fromCharCode(o);
                    if(!c.shiftKey){
                        this.editchar=this.editchar.toLowerCase()
                    }
                    f=true
                }else{
                    if(o>=96&&o<=105){
                        this.editchar=o-96;
                        this.editchar=this.editchar.toString();
                        f=true
                    }
                }
                if(o==13||f){
                    if(s.getselectedrowindex){
                        var r=s.getselectedrowindex();
                        switch(s.selectionmode){
                            case"singlerow":case"multiplerows":case"multiplerowsextended":
                                if(r>=0){
                                    var d="";
                                    for(m=0;m<s.columns.records.length;m++){
                                        var e=s.getcolumnat(m);
                                        if(e.editable){
                                            d=e.datafield;
                                            break
                                        }
                                    }
                                    s.begincelledit(r,d)
                                }
                                break;
                            case"singlecell":case"multiplecells":case"multiplecellsextended":
                                var n=s.getselectedcell();
                                if(n!=null){
                                    s.begincelledit(n.rowindex,n.datafield)
                                }
                                break
                        }
                        return false
                    }
                }
                if(o==46){
                    var q=s.getselectedcells();
                    if(q!=null&&q.length>0){
                        for(var g=0;g<q.length;g++){
                            var n=q[g];
                            var e=s.getcolumn(n.datafield);
                            var p=s.getcellvalue(n.rowindex,n.datafield);
                            s._raiseEvent(17,{
                                rowindex:n.rowindex,
                                datafield:n.datafield,
                                value:p
                            });
                            if(g==q.length-1){
                                s.setcellvalue(n.rowindex,n.datafield,"",true)
                            }else{
                                s.setcellvalue(n.rowindex,n.datafield,"",false)
                            }
                            s._raiseEvent(18,{
                                rowindex:n.rowindex,
                                datafield:n.datafield,
                                oldvalue:p,
                                value:""
                            })
                        }
                        return false
                    }
                }
                if(o==32){
                    var n=s.getselectedcell();
                    if(n!=null){
                        var e=s.getcolumn(n.datafield);
                        if(e.columntype=="checkbox"){
                            var l=!s.getcellvalue(n.rowindex,n.datafield);
                            s._raiseEvent(17,{
                                rowindex:n.rowindex,
                                datafield:n.datafield,
                                value:!l,
                                columntype:"checkbox"
                            });
                            s.setcellvalue(n.rowindex,n.datafield,l,true);
                            s._raiseEvent(18,{
                                rowindex:n.rowindex,
                                datafield:n.datafield,
                                oldvalue:!l,
                                value:l,
                                columntype:"checkbox"
                            });
                            return false
                        }
                    }
                }
            }
            return true
        },
        begincelledit:function(k,c,h){
            var d=this.getcolumn(c);
            if(c==null){
                return
            }
            if(d.columntype=="number"||d.columntype=="button"){
                return
            }
            if(this.editrow!=undefined){
                return
            }
            if(this.editcell){
                if(this.editcell.row==k&&this.editcell.column==c){
                    return true
                }
                var b=this.endcelledit(this.editcell.row,this.editcell.column,false,true);
                if(false==b){
                    return
                }
            }
            var e=d.columntype=="checkbox"||d.columntype=="button";
            this.host.removeClass("jqx-disableselect");
            this.content.removeClass("jqx-disableselect");
            if(d.editable){
                if(d.cellbeginedit){
                    var g=this.getcell(k,c);
                    var j=d.cellbeginedit(k,c,d.columntype,g!=null?g.value:null);
                    if(j==false){
                        return
                    }
                }
                var f=this.getrowvisibleindex(k);
                this.editcell=this.getcell(k,c);
                this.editcell.visiblerowindex=f;
                if(!this.editcell.editing){
                    if(!e){
                        this.editcell.editing=true
                    }
                    this.editcell.columntype=d.columntype;
                    this.editcell.defaultvalue=h;
                    if(d.defaultvalue!=undefined){
                        this.editcell.defaultvalue=d.defaultvalue
                    }
                    this.editcell.init=true;
                    if(d.columntype!="checkbox"){
                        this._raiseEvent(17,{
                            rowindex:k,
                            datafield:d.datafield,
                            value:this.editcell.value,
                            columntype:d.columntype
                        })
                    }
                    if(!e){
                        this._renderrows(this.virtualsizeinfo)
                    }
                    if(this.editcell){
                        this.editcell.init=false
                    }
                }
            }else{
                if(!this.editcell){
                    return
                }
                this.editcell.editor=null;
                this.editcell.editing=false;
                this._renderrows(this.virtualsizeinfo);
                this.editcell=null
            }
        },
        endcelledit:function(q,c,k,g){
            var e=this.getcolumn(c);
            var j=this;
            if(j.editrow!=undefined){
                return
            }
            var h=function(){
                if(!j.isNestedGrid){
                    j.element.focus();
                    j.content.focus();
                    setTimeout(function(){
                        j.element.focus();
                        j.content.focus()
                    },10)
                }
            };
    
            if(e.columntype=="checkbox"||e.columntype=="button"){
                this.editcell.editor=null;
                this.editcell.editing=false;
                this.editcell=null;
                return true
            }
            var d=this._geteditorvalue(e);
            var l=function(r){
                r._hidecelleditor();
                r.editcell.editor=null;
                r.editcell.editing=false;
                r.editcell=null;
                if(g||g==undefined){
                    r._renderrows(r.virtualsizeinfo)
                }
                h();
                r.host.addClass("jqx-disableselect");
                r.content.addClass("jqx-disableselect")
            };
    
            if(k){
                l(this);
                return false
            }
            if(this.validationpopup){
                this.validationpopup.hide();
                this.validationpopuparrow.hide()
            }
            if(e.validation){
                var n=this.getcell(q,c);
                var p=e.validation(n,d);
                var f=this.gridlocalization.validationstring;
                if(p.message!=undefined){
                    f=p.message
                }
                var o=typeof p=="boolean"?p:p.result;
                if(!o){
                    if(p.showmessage==undefined||p.showmessage==true){
                        this._showvalidationpopup(q,c,f)
                    }
                    this.editcell.validated=false;
                    return false
                }
            }
            if(e.cellendedit){
                var b=e.cellendedit(q,c,e.columntype,this.editcell.value,d);
                if(b==false){
                    this._raiseEvent(18,{
                        rowindex:q,
                        datafield:c,
                        oldvalue:this.editcell.value,
                        value:this.editcell.value,
                        columntype:e.columntype
                    });
                    l(this);
                    return false
                }
            }
            this._raiseEvent(18,{
                rowindex:q,
                datafield:c,
                oldvalue:this.editcell.value,
                value:d,
                columntype:e.columntype
            });
            this._hidecelleditor();
            this.editcell.editor=null;
            this.editcell.editing=false;
            this.editcell=null;
            this.setcellvalue(q,c,d,g);
            this.host.addClass("jqx-disableselect");
            this.content.addClass("jqx-disableselect");
            h();
            return true
        },
        beginrowedit:function(d){
            if(!this.editcells){
                this.editcells=new Array()
            }
            if(this.editcells.length>0){
                if(this.editcells[0].row==d){
                    return
                }
                var c=this.endrowedit(this.editcells[0].row,false,true);
                if(false==c){
                    return
                }
            }
            this.host.removeClass("jqx-disableselect");
            this.content.removeClass("jqx-disableselect");
            var b=this;
            this.editcells=new Array();
            a.each(this.columns.records,function(){
                if(b.editable){
                    var e=b.getcell(d,this.datafield);
                    e.editing=true;
                    if(this.defaultvalue!=undefined){
                        e.defaultvalue=column.defaultvalue
                    }
                    e.init=true;
                    b.editcells[this.datafield]=e
                }
            });
            b.editrow=d;
            b._renderrows(this.virtualsizeinfo);
            a.each(this.columns.records,function(){
                b.editcells[this.datafield].init=false
            })
        },
        endrowedit:function(b){
            if(this.editcell.editor==undefined){
                return false
            }
            return true
        },
        _setSelection:function(e,b,d){
            if("selectionStart" in d[0]){
                d[0].focus();
                d[0].setSelectionRange(e,b)
            }else{
                var c=d[0].createTextRange();
                c.collapse(true);
                c.moveEnd("character",b);
                c.moveStart("character",e);
                c.select()
            }
        },
        findRecordIndex:function(g,c,b){
            var b=b;
            if(g&&c){
                var e=b.length;
                for(urec=0;urec<e;urec++){
                    var f=b[urec];
                    var d=f.label;
                    if(g==d){
                        return urec
                    }
                }
            }
            return -1
        },
        _destroyeditors:function(){
            var b=this;
            a.each(this.columns.records,function(e,f){
                switch(this.columntype){
                    case"dropdownlist":
                        var c=b.editors["dropdownlist_"+this.datafield];
                        if(c){
                            c.jqxDropDownList("destroy");
                            b.editors["dropdownlist_"+this.datafield]=null
                        }
                        break;
                    case"datetimeinput":
                        var d=b.editors["datetimeinput_"+this.datafield];
                        if(d){
                            d.jqxDateTimeInput("destroy");
                            b.editors["datetimeinput_"+this.datafield]=null
                        }
                        break;
                    case"numberinput":
                        var g=b.editors["numberinput_"+this.datafield];
                        if(g){
                            g.jqxNumberInput("destroy");
                            b.editors["numberinput_"+this.datafield]=null
                        }
                        break
                }
            })
        },
        _showcelleditor:function(l,d,b,z){
            if(this.editrow!=undefined){
                this.editcell=this.editcells[d.datafield]
            }
            if(b==undefined){
                return
            }
            if(this.editcell==null){
                return
            }
            if(d.columntype=="checkbox"&&d.editable){
                return
            }
            var q=d.datafield;
            var t=a(b);
            var D=this;
            var g=this.editcell.editor;
            var r=this.getcellvalue(l,q);
            var w=this.hScrollInstance;
            var y=w.value;
            var h=parseInt(y);
            this.editcell.element=b;
            if(this.editcell.validated==false){
                this._showvalidationpopup()
            }
            var B=function(E){
                if(!D.isNestedGrid){
                    E.focus()
                }
                if(D.gridcontent[0].scrollTop!=0){
                    D.scrolltop(Math.abs(D.gridcontent[0].scrollTop));
                    D.gridcontent[0].scrollTop=0
                }
                if(D.gridcontent[0].scrollLeft!=0){
                    D.scrollleft(Math.abs(D.gridcontent[0].scrollLeft));
                    D.gridcontent[0].scrollLeft=0
                }
            };
    
            switch(d.columntype){
                case"dropdownlist":
                    if(this.host.jqxDropDownList){
                        b.innerHTML="";
                        var p=this.editors["dropdownlist_"+d.datafield];
                        g=p==undefined?a("<div style='z-index: 99999; top: 0px; left: 0px; position: absolute;' id='dropdownlisteditor'></div>"):p;
                        g.css("top",a(b).parent().position().top);
                        g.css("left",-h+parseInt(a(b).position().left));
                        if(p==undefined){
                            g.prependTo(this.table);
                            g[0].id="dropdownlisteditor"+this.element.id+d.datafield;
                            var v=this.source._source?true:false;
                            var o=null;
                            if(!v){
                                o=new a.jqx.dataAdapter(this.source,{
                                    autoBind:false,
                                    uniqueDataFields:[d.datafield],
                                    async:false
                                })
                            }else{
                                var A={
                                    localdata:this.source.records,
                                    datatype:this.source.datatype,
                                    async:false
                                };
                
                                o=new a.jqx.dataAdapter(A,{
                                    autoBind:false,
                                    async:false,
                                    uniqueDataFields:[d.datafield]
                                })
                            }
                            var k=true;
                            g.jqxDropDownList({
                                keyboardSelection:false,
                                source:o,
                                autoDropDownHeight:k,
                                theme:this.theme,
                                width:t.width()-2,
                                height:t.height()-2,
                                displayMember:q,
                                valueMember:q
                            });
                            this.editors["dropdownlist_"+d.datafield]=g;
                            if(d.createeditor){
                                d.createeditor(l,r,g)
                            }
                        }
                        if(d._requirewidthupdate){
                            g.jqxDropDownList({
                                width:t.width()-2
                            })
                        }
                        var n=g.jqxDropDownList("getItems");
                        if(n.length<8){
                            g.jqxDropDownList("autoDropDownHeight",true)
                        }else{
                            g.jqxDropDownList("autoDropDownHeight",false)
                        }
                        var e=this.findRecordIndex(r,d.datafield,n);
                        if(z){
                            if(r!=""){
                                g.jqxDropDownList("selectIndex",e,true)
                            }else{
                                g.jqxDropDownList("selectIndex",-1)
                            }
                        }
                        if(this.editcell.defaultvalue!=undefined){
                            g.jqxDropDownList("selectIndex",this.editcell.defaultvalue,true)
                        }
                        setTimeout(function(){
                            B(g.jqxDropDownList("comboStructure"))
                        },10)
                    }
                    break;
                case"datetimeinput":
                    if(this.host.jqxDateTimeInput){
                        b.innerHTML="";
                        var f=this.editors["datetimeinput_"+d.datafield];
                        g=f==undefined?a("<div style='z-index: 99999; top: 0px; left: 0px; position: absolute;' id='datetimeeditor'></div>"):f;
                        g.show();
                        g.css("top",a(b).parent().position().top);
                        g.css("left",-h+parseInt(a(b).position().left));
                        if(f==undefined){
                            g.prependTo(this.table);
                            g[0].id="datetimeeditor"+this.element.id+d.datafield;
                            g.jqxDateTimeInput({
                                theme:this.theme,
                                width:t.width(),
                                height:t.height(),
                                formatString:d.cellsformat
                            });
                            this.editors["datetimeinput_"+d.datafield]=g;
                            if(d.createeditor){
                                d.createeditor(l,r,g)
                            }
                        }
                        if(d._requirewidthupdate){
                            g.jqxDateTimeInput({
                                width:t.width()-2
                            })
                        }
                        if(z){
                            if(r!=""){
                                var C=new Date(r);
                                if(C=="Invalid Date"){
                                    if(this.source.getvaluebytype){
                                        C=this.source.getvaluebytype(r,{
                                            name:d.datafield,
                                            type:"date"
                                        })
                                    }
                                }
                                g.jqxDateTimeInput("setDate",C)
                            }else{
                                g.jqxDateTimeInput("setDate",new Date())
                            }
                            if(this.editcell.defaultvalue!=undefined){
                                g.jqxDateTimeInput("setDate",this.editcell.defaultvalue)
                            }
                        }
                        setTimeout(function(){
                            B(g.jqxDateTimeInput("dateTimeInput"))
                        },10)
                    }
                    break;
                case"numberinput":
                    if(this.host.jqxNumberInput){
                        b.innerHTML="";
                        var j=this.editors["numberinput_"+d.datafield];
                        g=j==undefined?a("<div style='z-index: 99999; top: 0px; left: 0px; position: absolute;' id='numbereditor'></div>"):j;
                        g.show();
                        g.css("top",a(b).parent().position().top);
                        g.css("left",-h+parseInt(a(b).position().left));
                        if(j==undefined){
                            g.prependTo(this.table);
                            g[0].id="numbereditor"+this.element.id+d.datafield;
                            var x="";
                            var u="left";
                            if(d.cellsformat){
                                if(d.cellsformat.indexOf("c")!=-1){
                                    x=this.gridlocalization.currencysymbol
                                }else{
                                    if(d.cellsformat.indexOf("p")!=-1){
                                        x=this.gridlocalization.percentsymbol;
                                        u="right"
                                    }
                                }
                            }
                            g.jqxNumberInput({
                                inputMode:"simple",
                                theme:this.theme,
                                width:t.width()-1,
                                height:t.height()-1,
                                spinButtons:true,
                                symbol:x,
                                symbolPosition:u
                            });
                            this.editors["numberinput_"+d.datafield]=g;
                            if(d.createeditor){
                                d.createeditor(l,r,g)
                            }
                        }
                        if(d._requirewidthupdate){
                            g.jqxNumberInput({
                                width:t.width()-2
                            })
                        }
                        if(z){
                            if(r!=""){
                                var c=r;
                                g.jqxNumberInput("setDecimal",c)
                            }else{
                                g.jqxNumberInput("setDecimal",0)
                            }
                            if(this.editcell.defaultvalue!=undefined){
                                g.jqxNumberInput("setDecimal",this.editcell.defaultvalue)
                            }
                            if(this.editchar&&this.editchar.length>0){
                                var s=parseInt(this.editchar);
                                if(!isNaN(s)){
                                    g.jqxNumberInput("setDecimal",s)
                                }
                            }
                            setTimeout(function(){
                                B(g.jqxNumberInput("numberInput"));
                                g.jqxNumberInput("_setSelectionStart",0);
                                if(D.editchar){
                                    if(d.cellsformat.length>0){
                                        g.jqxNumberInput("_setSelectionStart",2)
                                    }else{
                                        g.jqxNumberInput("_setSelectionStart",1)
                                    }
                                    D.editchar=null
                                }else{
                                    var E=g.jqxNumberInput("spinButtons");
                                    if(E){
                                        var F=g.jqxNumberInput("numberInput").val();
                                        D._setSelection(g.jqxNumberInput("numberInput")[0],F.length,F.length)
                                    }else{
                                        var F=g.jqxNumberInput("numberInput").val();
                                        D._setSelection(g.jqxNumberInput("numberInput")[0],0,F.length)
                                    }
                                }
                            },10)
                        }
                    }
                    break;
                case"textbox":default:
                    b.innerHTML="";
                    g=this.editors["textboxeditor_"+d.datafield]||a("<input 'type='textbox' id='textboxeditor'/>");
                    g[0].id="textboxeditor"+this.element.id+d.datafield;
                    g.appendTo(t);
                    if(z){
                        g.addClass(this.toThemeProperty("jqx-input"));
                        g.addClass(this.toThemeProperty("jqx-widget-content"));
                        if(this.editchar&&this.editchar.length>0){
                            g.val(this.editchar)
                        }else{
                            g.val(r)
                        }
                        if(this.editcell.defaultvalue!=undefined){
                            g.val(this.editcell.defaultvalue)
                        }
                        g.width(t.width());
                        g.height(t.height());
                        if(d.createeditor){
                            d.createeditor(l,r,g)
                        }
                    }
                    this.editors["textboxeditor_"+d.datafield]=g;
                    if(z){
                        setTimeout(function(){
                            B(g);
                            if(D.editchar){
                                D._setSelection(g[0],1,1);
                                D.editchar=null
                            }else{
                                D._setSelection(g[0],0,g.val().length)
                            }
                        },10)
                    }
                    break
            }
            if(z){
                if(d.initeditor){
                    d.initeditor(l,r,g)
                }
            }
            if(g){
                g.css("display","block");
                this.editcell.editor=g
            }
        },
        _setSelection:function(d,g,b){
            try{
                if("selectionStart" in d){
                    d.setSelectionRange(g,b)
                }else{
                    var c=d.createTextRange();
                    c.collapse(true);
                    c.moveEnd("character",b);
                    c.moveStart("character",g);
                    c.select()
                }
            }catch(e){
                var f=e
            }
        },
        _hideeditors:function(){
            if(this.editcells!=null){
                var b=this;
                for(var c in this.editcells){
                    b.editcell=b.editcells[c];
                    b._hidecelleditor()
                }
            }
        },
        _hidecelleditor:function(){
            if(!this.editcell){
                return
            }
            if(this.editcell.columntype=="checkbox"){
                return
            }
            if(this.editcell.editor){
                this.editcell.editor.hide();
                switch(this.editcell.columntype){
                    case"dropdownlist":
                        this.editcell.editor.jqxDropDownList({
                            hideDelay:0
                        });
                        this.editcell.editor.jqxDropDownList("hideListBox");
                        this.editcell.editor.jqxDropDownList({
                            hideDelay:400
                        });
                        break;
                    case"datetimeinput":
                        var b=this.editcell.editor;
                        if(b.jqxDateTimeInput("isOpened")){
                            b.jqxDateTimeInput({
                                hideDelay:0
                            });
                            b.jqxDateTimeInput("hideCalendar");
                            b.jqxDateTimeInput({
                                hideDelay:400
                            })
                        }
                        break
                }
            }
            if(this.validationpopup){
                this.validationpopup.hide();
                this.validationpopuparrow.hide()
            }
            if(!this.isNestedGrid){
                this.element.focus()
            }
        },
        _geteditorvalue:function(d){
            var f=new String();
            if(this.editcell.editor){
                switch(d.columntype){
                    case"textbox":default:
                        f=this.editcell.editor.val();
                        break;
                    case"datetimeinput":
                        if(this.editcell.editor.jqxDateTimeInput){
                            this.editcell.editor.jqxDateTimeInput({
                                isEditing:false
                            });
                            f=this.editcell.editor.jqxDateTimeInput("getDate").toString();
                            f=new Date(f);
                            if(f==null){
                                f==""
                            }
                        }
                        break;
                    case"dropdownlist":
                        if(this.editcell.editor.jqxDropDownList){
                            var b=this.editcell.editor.jqxDropDownList("selectedIndex");
                            var e=this.editcell.editor.jqxDropDownList("getItem",b);
                            if(e){
                                f=e.label
                            }else{
                                f=""
                            }
                            if(f==null){
                                f=""
                            }
                        }
                        break;
                    case"numberinput":
                        if(this.editcell.editor.jqxNumberInput){
                            var c=this.editcell.editor.jqxNumberInput("getDecimal");
                            f=new Number(c);
                            f=parseFloat(f);
                            if(isNaN(f)){
                                f=0
                            }
                        }
                        break
                }
            }
            return f
        },
        hidevalidationpopups:function(){
            if(this.popups){
                a.each(this.popups,function(){
                    this.validation.remove();
                    this.validationrow.remove()
                });
                this.popups=new Array()
            }
            if(this.validationpopup){
                this.validationpopuparrow.hide();
                this.validationpopup.hide()
            }
        },
        showvalidationpopup:function(p,d,q){
            var o=a("<div style='z-index: 99999; top: 0px; left: 0px; position: absolute;'></div>");
            var n=a("<div style='width: 20px; height: 20px; z-index: 999999; top: 0px; left: 0px; position: absolute;'></div>");
            o.html(q);
            n.addClass(this.toThemeProperty("jqx-grid-validation-arrow-up"));
            o.addClass(this.toThemeProperty("jqx-grid-validation"));
            o.addClass(this.toThemeProperty("jqx-rc-all"));
            o.prependTo(this.table);
            n.prependTo(this.table);
            var f=this.hScrollInstance;
            var h=f.value;
            var e=parseInt(h);
            var k=this.getcolumn(d).uielement;
            var j=a(this.hittestinfo[p].visualrow);
            o.css("top",parseInt(j.position().top)+30+"px");
            var b=parseInt(o.css("top"));
            n.css("top",b-12);
            n.removeClass();
            n.addClass(this.toThemeProperty("jqx-grid-validation-arrow-up"));
            if(b>this._gettableheight()){
                n.removeClass(this.toThemeProperty("jqx-grid-validation-arrow-up"));
                n.addClass(this.toThemeProperty("jqx-grid-validation-arrow-down"));
                b=parseInt(a(k).parent().position().top)-30;
                o.css("top",b+"px");
                n.css("top",b+o.outerHeight()-9)
            }
            var l=-e+parseInt(a(k).position().left);
            n.css("left",l+30);
            var c=o.width();
            if(c+l>this.host.width()-20){
                var g=c+l-this.host.width()+40;
                l-=g
            }
            o.css("left",l);
            o.show();
            n.show();
            if(!this.popups){
                this.popups=new Array()
            }
            this.popups[this.popups.length]={
                validation:o,
                validationrow:n
            }
        },
        _showvalidationpopup:function(o,d,p){
            var j=this.editcell.editor;
            if(!j){
                return
            }
            if(!this.validationpopup){
                var n=a("<div style='z-index: 99999; top: 0px; left: 0px; position: absolute;'></div>");
                var l=a("<div style='width: 20px; height: 20px; z-index: 999999; top: 0px; left: 0px; position: absolute;'></div>");
                n.html(p);
                l.addClass(this.toThemeProperty("jqx-grid-validation-arrow-up"));
                n.addClass(this.toThemeProperty("jqx-grid-validation"));
                n.addClass(this.toThemeProperty("jqx-rc-all"));
                n.prependTo(this.table);
                l.prependTo(this.table);
                this.validationpopup=n;
                this.validationpopuparrow=l
            }else{
                this.validationpopup.html(p)
            }
            var f=this.hScrollInstance;
            var h=f.value;
            var e=parseInt(h);
            this.validationpopup.css("top",parseInt(a(this.editcell.element).parent().position().top)+30+"px");
            var b=parseInt(this.validationpopup.css("top"));
            this.validationpopuparrow.css("top",b-12);
            this.validationpopuparrow.removeClass();
            this.validationpopuparrow.addClass(this.toThemeProperty("jqx-grid-validation-arrow-up"));
            if(b>this._gettableheight()){
                this.validationpopuparrow.removeClass(this.toThemeProperty("jqx-grid-validation-arrow-up"));
                this.validationpopuparrow.addClass(this.toThemeProperty("jqx-grid-validation-arrow-down"));
                b=parseInt(a(this.editcell.element).parent().position().top)-30;
                this.validationpopup.css("top",b+"px");
                this.validationpopuparrow.css("top",b+this.validationpopup.outerHeight()-9)
            }
            var k=-e+parseInt(a(this.editcell.element).position().left);
            this.validationpopuparrow.css("left",k+30);
            var c=this.validationpopup.width();
            if(c+k>this.host.width()-20){
                var g=c+k-this.host.width()+40;
                k-=g
            }
            this.validationpopup.css("left",k);
            this.validationpopup.show();
            this.validationpopuparrow.show()
        }
    })
})(jQuery);