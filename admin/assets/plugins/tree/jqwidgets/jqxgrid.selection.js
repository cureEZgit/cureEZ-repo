/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.extend(a.jqx._jqxGrid.prototype,{
        selectrow:function(b,c){
            this._applyrowselection(b,true,c)
        },
        selectallrows:function(){
            this.clearselection(false);
            var c=this.dataview.records.length;
            if(c>0){
                for(var b=0;b<c;b++){
                    if(b<c-1){
                        this.selectrow(b,false)
                    }else{
                        this.selectrow(b,true)
                    }
                }
            }
        },
        unselectrow:function(b,c){
            this._applyrowselection(b,false,c)
        },
        selectcell:function(c,b){
            this._applycellselection(c,b,true)
        },
        unselectcell:function(c,b){
            this._applycellselection(c,b,false)
        },
        clearselection:function(b){
            this.selectedrowindex=-1;
            for(i=0;i<this.selectedrowindexes.length;i++){
                this._raiseEvent(3,{
                    rowindex:this.selectedrowindexes[i]
                })
            }
            this.selectedrowindexes=new Array();
            this.selectedcells=new Array();
            if(!b){
                return
            }
            this._renderrows(this.virtualsizeinfo)
        },
        getselectedrowindex:function(){
            return this.selectedrowindex
        },
        getselectedrowindexes:function(){
            return this.selectedrowindexes
        },
        getselectedcell:function(){
            return this.selectedcell
        },
        getselectedcells:function(){
            var b=new Array();
            for(obj in this.selectedcells){
                b[b.length]=this.selectedcells[obj]
            }
            return b
        },
        _applyrowselection:function(c,b,g,e,f){
            if(c==null){
                return false
            }
            var d=this.selectedrowindex;
            if(this.selectionmode=="singlerow"){
                if(b){
                    this._raiseEvent(2,{
                        rowindex:c,
                        row:this.getrowdata(c)
                    })
                }else{
                    this._raiseEvent(3,{
                        rowindex:c,
                        row:this.getrowdata(c)
                    })
                }
                this._raiseEvent(3,{
                    rowindex:d
                });
                this.selectedrowindexes=new Array();
                this.selectedcells=new Array()
            }
            if(e==true){
                this.selectedrowindexes=new Array()
            }
            var h=this.selectedrowindexes.indexOf(c);
            if(b){
                this.selectedrowindex=c;
                if(this.selectedrowindexes.indexOf(c)==-1){
                    this.selectedrowindexes.push(c);
                    if(this.selectionmode!="singlerow"){
                        this._raiseEvent(2,{
                            rowindex:c,
                            row:this.getrowdata(c)
                        })
                    }
                }else{
                    if(this.selectionmode=="multiplerows"){
                        this.selectedrowindexes.splice(h,1);
                        this._raiseEvent(3,{
                            rowindex:this.selectedrowindex,
                            row:this.getrowdata(c)
                        });
                        this.selectedrowindex=this.selectedrowindexes.length>0?this.selectedrowindexes[this.selectedrowindexes.length-1]:-1
                    }
                }
            }else{
                if(h>=0||this.selectionmode=="singlerow"||this.selectionmode=="multiplerowsextended"){
                    this.selectedrowindexes.splice(h,1);
                    this._raiseEvent(3,{
                        rowindex:this.selectedrowindex,
                        row:this.getrowdata(c)
                    });
                    this.selectedrowindex=-1
                }
            }
            if(g==undefined||g){
                this._rendervisualrows()
            }
            return true
        },
        _applycellselection:function(d,j,c,h){
            if(d==null){
                return false
            }
            if(j==null){
                return false
            }
            var e=this.selectedrowindex;
            if(this.selectionmode=="singlecell"){
                var g=this.selectedcell;
                if(g!=null){
                    this._raiseEvent(16,{
                        rowindex:g.rowindex,
                        datafield:g.datafield
                    })
                }
                this.selectedcells=new Array()
            }
            if(this.selectionmode=="multiplecellsextended"){
                var g=this.selectedcell;
                if(g!=null){
                    this._raiseEvent(16,{
                        rowindex:g.rowindex,
                        datafield:g.datafield
                    })
                }
            }
            var f=d+"_"+j;
            var b={
                rowindex:d,
                datafield:j
            };

            if(c){
                this.selectedcell=b;
                if(!this.selectedcells[f]){
                    this.selectedcells[f]=b;
                    this.selectedcells.length++;
                    this._raiseEvent(15,b)
                }else{
                    if(this.selectionmode=="multiplecells"){
                        this.selectedcells[f]=undefined;
                        this.selectedcells.length--;
                        this._raiseEvent(16,b)
                    }
                }
            }else{
                this.selectedcells[f]=undefined;
                this.selectedcells.length--;
                this._raiseEvent(16,b)
            }
            if(h==undefined||h){
                this._rendervisualrows()
            }
            return true
        },
        _getcellindex:function(b){
            var c=-1;
            a.each(this.selectedcells,function(){
                c++;
                if(this[b]){
                    return false
                }
            });
            return c
        },
        _clearhoverstyle:function(){
            if(undefined==this.hoveredrow||this.hoveredrow==-1){
                return
            }
            if(this.vScrollInstance.isScrolling()){
                return
            }
            if(this.hScrollInstance.isScrolling()){
                return
            }
            var b=this.table.find(".jqx-grid-cell-hover");
            if(b.length>0){
                b.removeClass(this.toTP("jqx-grid-cell-hover"));
                b.removeClass(this.toTP("jqx-fill-state-hover"))
            }
            this.hoveredrow=-1
        },
        _clearselectstyle:function(){
            var k=this.table[0].rows.length;
            var p=this.table[0].rows;
            var l=this.toTP("jqx-grid-cell-selected");
            var c=this.toTP("jqx-fill-state-pressed");
            var m=this.toTP("jqx-grid-cell-hover");
            var h=this.toTP("jqx-fill-state-hover");
            for(var g=0;g<k;g++){
                var b=p[g];
                var f=b.cells.length;
                var o=b.cells;
                for(var e=0;e<f;e++){
                    var d=o[e];
                    var n=a(d);
                    if(d.className.indexOf("jqx-grid-cell-selected")!=-1){
                        n.removeClass(l);
                        n.removeClass(c)
                    }
                    if(d.className.indexOf("jqx-grid-cell-hover")!=-1){
                        n.removeClass(m);
                        n.removeClass(h)
                    }
                }
            }
        },
        _selectpath:function(n,e){
            var m=this;
            var j=this._lastClickedCell?Math.min(this._lastClickedCell.row,n):0;
            var l=this._lastClickedCell?Math.max(this._lastClickedCell.row,n):0;
            if(j<=l){
                var h=this._getcolumnindex(this._lastClickedCell.column);
                var g=this._getcolumnindex(e);
                var f=Math.min(h,g);
                var d=Math.max(h,g);
                this.selectedcells=new Array();
                for(var b=j;b<=l;b++){
                    for(var k=f;k<=d;k++){
                        this._applycellselection(b,m._getcolumnat(k).datafield,true,false)
                    }
                }
                this._rendervisualrows()
            }
        },
        _selectrowpath:function(e){
            if(this.selectionmode=="multiplerowsextended"){
                var c=this;
                var b=this._lastClickedCell?Math.min(this._lastClickedCell.row,e):0;
                var f=this._lastClickedCell?Math.max(this._lastClickedCell.row,e):0;
                if(b<=f){
                    this.selectedrowindexes=new Array();
                    for(var d=b;d<=f;d++){
                        this._applyrowselection(d,true,false)
                    }
                    this._rendervisualrows()
                }
            }
        },
        _selectrowwithmouse:function(q,m,e,f,d,k){
            var s=m.row;
            if(s==undefined){
                return
            }
            var g=m.index;
            var c=this.hittestinfo[g].visualrow;
            if(this.hittestinfo[g].details){
                return
            }
            var j=c.cells[0].className;
            if(s.group){
                return
            }
            if(this.selectionmode=="multiplerows"||this.selectionmode=="multiplecells"||(this.selectionmode.indexOf("multiple")!=-1&&(k==true||d==true))){
                var o=e.indexOf(s.boundindex)!=-1;
                var n=s.boundindex+"_"+f;
                if(this.selectionmode.indexOf("cell")!=-1){
                    var p=this.selectedcells[n]!=undefined;
                    if(this.selectedcells[n]!=undefined&&p){
                        this._selectcellwithstyle(q,false,g,f,c)
                    }else{
                        this._selectcellwithstyle(q,true,g,f,c)
                    }
                    if(k&&this._lastClickedCell){
                        this._selectpath(s.boundindex,f);
                        this.mousecaptured=false;
                        if(this.selectionarea.css("visibility")=="visible"){
                            this.selectionarea.css("visibility","hidden")
                        }
                    }
                }else{
                    if(o){
                        this._selectrowwithstyle(q,c,false,f)
                    }else{
                        this._selectrowwithstyle(q,c,true,f)
                    }
                    if(k&&this._lastClickedCell){
                        this.selectedrowindexes=new Array();
                        var h=this._lastClickedCell?Math.min(this._lastClickedCell.row,s.boundindex):0;
                        var l=this._lastClickedCell?Math.max(this._lastClickedCell.row,s.boundindex):0;
                        for(var b=h;b<=l;b++){
                            this._applyrowselection(b,true,false,false)
                        }
                        this._rendervisualrows()
                    }
                }
            }else{
                this._clearselectstyle();
                this._selectrowwithstyle(q,c,true,f);
                if(this.selectionmode.indexOf("cell")!=-1){
                    this._selectcellwithstyle(q,true,g,f,c)
                }
            }
            if(!k){
                this._lastClickedCell={
                    row:s.boundindex,
                    column:f
                }
            }
        },
        _selectcellwithstyle:function(d,c,g,f,e){
            var b=a(e.cells[d._getcolumnindex(f)]);
            b.removeClass(this.toTP("jqx-grid-cell-hover"));
            b.removeClass(this.toTP("jqx-fill-state-hover"));
            if(c){
                b.addClass(this.toTP("jqx-grid-cell-selected"));
                b.addClass(this.toTP("jqx-fill-state-pressed"))
            }else{
                b.removeClass(this.toTP("jqx-grid-cell-selected"));
                b.removeClass(this.toTP("jqx-fill-state-pressed"))
            }
        },
        _selectrowwithstyle:function(e,g,b,h){
            var c=g.cells.length;
            var f=0;
            if(e.rowdetails&&e.showrowdetailscolumn){
                f=1
            }
            for(i=f;i<c;i++){
                var d=g.cells[i];
                if(b){
                    a(d).removeClass(this.toTP("jqx-grid-cell-hover"));
                    a(d).removeClass(this.toTP("jqx-fill-state-hover"));
                    if(e.selectionmode.indexOf("cell")==-1){
                        a(d).addClass(this.toTP("jqx-grid-cell-selected"));
                        a(d).addClass(this.toTP("jqx-fill-state-pressed"))
                    }
                }else{
                    a(d).removeClass(this.toTP("jqx-grid-cell-hover"));
                    a(d).removeClass(this.toTP("jqx-grid-cell-selected"));
                    a(d).removeClass(this.toTP("jqx-fill-state-hover"));
                    a(d).removeClass(this.toTP("jqx-fill-state-pressed"))
                }
            }
        },
        _handlemousemoveselection:function(b,p){
            if((p.selectionmode=="multiplerowsextended"||p.selectionmode=="multiplecellsextended")&&p.mousecaptured){
                var d=this.showheader?this.columnsheader.height()+2:0;
                var c=this._groupsheader()?this.groupsheader.height():0;
                var g=this.showtoolbar?this.toolbarheight:0;
                c+=g;
                var f=this.host.offset();
                var m=b.pageX;
                var l=b.pageY-c;
                var o=parseInt(this.columnsheader.offset().top);
                var e=d;
                if(l<e){
                    l=e+5
                }
                var n=parseInt(Math.min(p.mousecaptureposition.left,m));
                var k=-5+parseInt(Math.min(p.mousecaptureposition.top,l));
                var h=parseInt(Math.abs(p.mousecaptureposition.left-m));
                var j=parseInt(Math.abs(p.mousecaptureposition.top-l));
                n-=p.host.offset().left;
                k-=p.host.offset().top;
                this.selectionarea.css("visibility","visible");
                this.selectionarea.width(h);
                this.selectionarea.height(j);
                this.selectionarea.css("left",n);
                this.selectionarea.css("top",k)
            }
        },
        _handlemouseupselection:function(u,o){
            if(this.selectionarea.css("visibility")!="visible"){
                o.mousecaptured=false;
                return true
            }
            if(o.mousecaptured&&(o.selectionmode=="multiplerowsextended"||o.selectionmode=="multiplecellsextended")){
                o.mousecaptured=false;
                if(this.selectionarea.css("visibility")=="visible"){
                    this.selectionarea.css("visibility","hidden");
                    var v=this.showheader?this.columnsheader.height()+2:0;
                    var p=this._groupsheader()?this.groupsheader.height():0;
                    var A=this.showtoolbar?this.toolbarheight:0;
                    p+=A;
                    var B=this.selectionarea.offset();
                    var c=this.host.offset();
                    var n=B.left-c.left;
                    var k=B.top-v-c.top-p;
                    var s=k;
                    var g=n+this.selectionarea.width();
                    var C=n;
                    var l=new Array();
                    var e=new Array();
                    if(o.selectionmode=="multiplerowsextended"){
                        while(k<s+this.selectionarea.height()){
                            var b=this._hittestrow(n,k);
                            var f=b.row;
                            var h=b.index;
                            if(h!=-1){
                                if(!e[h]){
                                    e[h]=true;
                                    l[l.length]=b
                                }
                            }
                            k+=20
                        }
                        var s=0;
                        a.each(l,function(){
                            var m=this;
                            var x=this.row;
                            if(o.selectionmode!="none"&&o._selectrowwithmouse){
                                if(u.ctrlKey){
                                    o._applyrowselection(x.boundindex,true,false,false)
                                }else{
                                    if(s==0){
                                        o._applyrowselection(x.boundindex,true,false,true)
                                    }else{
                                        o._applyrowselection(x.boundindex,true,false,false)
                                    }
                                }
                                s++
                            }
                        })
                    }else{
                        var r=o.hScrollInstance;
                        var t=r.value;
                        var q=o.table[0].rows[0];
                        var j=o.selectionarea.height();
                        if(!u.ctrlKey&&j>0){
                            o.selectedcells=new Array()
                        }
                        var z=j;
                        while(k<s+z){
                            var b=o._hittestrow(n,k);
                            var f=b.row;
                            var h=b.index;
                            if(h!=-1){
                                if(!e[h]){
                                    e[h]=true;
                                    for(i=0;i<q.cells.length;i++){
                                        var d=parseInt(a(o.columnsrow[0].cells[i]).css("left"))-t;
                                        var w=d+a(o.columnsrow[0].cells[i]).width();
                                        if((C>=d&&C<=w)||(g>=d&&g<=w)||(d>=C&&d<=g)){
                                            o._applycellselection(f.boundindex,o._getcolumnat(i).datafield,true,false)
                                        }
                                    }
                                }
                            }
                            k+=5
                        }
                    }
                    o._renderrows(o.virtualsizeinfo)
                }
            }
        },
        selectprevcell:function(e,c){
            var f=this._getcolumnindex(c);
            var b=this.columns.records.length;
            var d=this._getprevvisiblecolumn(f);
            if(d!=null){
                this.clearselection();
                this.selectcell(e,d.datafield)
            }
        },
        selectnextcell:function(e,d){
            var f=this._getcolumnindex(d);
            var c=this.columns.records.length;
            var b=this._getnextvisiblecolumn(f);
            if(b!=null){
                this.clearselection();
                this.selectcell(e,b.datafield)
            }
        },
        _getfirstvisiblecolumn:function(){
            var b=this;
            var e=this.columns.records.length;
            for(var c=0;c<e;c++){
                var d=this.columns.records[c];
                if(!d.hidden&&d.datafield!=null){
                    return d
                }
            }
            return null
        },
        _getlastvisiblecolumn:function(){
            var b=this;
            var e=this.columns.records.length;
            for(var c=e-1;c>=0;c--){
                var d=this.columns.records[c];
                if(!d.hidden&&d.datafield!=null){
                    return d
                }
            }
            return null
        },
        _handlekeydown:function(u,n){
            if(n.editcell){
                return true
            }
            if(n.selectionmode=="none"){
                return true
            }
            if(n.showfilterrow&&n.filterable){
                if(this.filterrow){
                    if(a(u.target).ischildof(this.filterrow)){
                        return true
                    }
                }
            }
            var z=u.charCode?u.charCode:u.keyCode?u.keyCode:0;
            var m=false;
            if(u.altKey){
                return true
            }
            var j=Math.round(n._gettableheight());
            var s=Math.round(j/n.rowsheight);
            var e=n.getdatainformation();
            switch(n.selectionmode){
                case"singlecell":case"multiplecells":case"multiplecellsextended":
                    var A=n.getselectedcell();
                    if(A!=null){
                        var d=this.getrowvisibleindex(A.rowindex);
                        var f=d;
                        var l=A.datafield;
                        var p=n._getcolumnindex(l);
                        var b=n.columns.records.length;
                        var q=function(E,C,D){
                            var B=function(I,F){
                                var H=n.dataview.loadedrecords[I];
                                if(H!=undefined&&F!=null){
                                    if(D||D==undefined){
                                        n.clearselection()
                                    }
                                    var G=H.boundindex;
                                    n.selectcell(G,F);
                                    n._oldselectedcell=n.selectedcell;
                                    m=true;
                                    n.ensurecellvisible(I,F);
                                    return true
                                }
                                return false
                            };
                
                            if(!B(E,C)){
                                n.ensurecellvisible(E,C);
                                B(E,C);
                                if(n.virtualmode){
                                    n.host.focus()
                                }
                            }
                            if(u.shiftKey&&z!=9){
                                if(n.selectionmode=="multiplecellsextended"){
                                    if(n._lastClickedCell){
                                        n._selectpath(E,C);
                                        n.selectedcell={
                                            rowindex:E,
                                            datafield:C
                                        };
                    
                                        return
                                    }
                                }
                            }else{
                                if(!u.shiftKey){
                                    n._lastClickedCell={
                                        row:E,
                                        column:C
                                    }
                                }
                            }
                        };

                        var v=u.shiftKey&&n.selectionmode!="singlecell"&&n.selectionmode!="multiplecells";
                        var w=function(){
                            q(0,l,!v)
                        };
    
                        var g=function(){
                            var B=e.rowscount-1;
                            q(B,l,!v)
                        };
    
                        var c=z==9&&!u.shiftKey;
                        var h=z==9&&u.shiftKey;
                        if(c||h){
                            v=false
                        }
                        var k=u.ctrlKey;
                        if(k&&z==37){
                            var y=n._getfirstvisiblecolumn(p);
                            if(y!=null){
                                q(f,y.datafield)
                            }
                        }else{
                            if(k&&z==39){
                                var o=n._getlastvisiblecolumn(p);
                                if(o!=null){
                                    q(f,o.datafield)
                                }
                            }else{
                                if(z==39||c){
                                    var r=n._getnextvisiblecolumn(p);
                                    if(r!=null){
                                        q(f,r.datafield,!v)
                                    }else{
                                        if(!c){
                                            m=true
                                        }
                                    }
                                }else{
                                    if(z==37||h){
                                        var y=n._getprevvisiblecolumn(p);
                                        if(y!=null){
                                            q(f,y.datafield,!v)
                                        }else{
                                            if(!h){
                                                m=true
                                            }
                                        }
                                    }else{
                                        if(z==36){
                                            w()
                                        }else{
                                            if(z==35){
                                                g()
                                            }else{
                                                if(z==33){
                                                    if(f-s>=0){
                                                        var x=f-s;
                                                        q(x,l,!v)
                                                    }else{
                                                        w()
                                                    }
                                                }else{
                                                    if(z==34){
                                                        if(e.rowscount>f+s){
                                                            var x=f+s;
                                                            q(x,l,!v)
                                                        }else{
                                                            g()
                                                        }
                                                    }else{
                                                        if(z==38){
                                                            if(k){
                                                                w()
                                                            }else{
                                                                if(f>0){
                                                                    q(f-1,l,!v)
                                                                }else{
                                                                    m=true
                                                                }
                                                            }
                                                        }else{
                                                            if(z==40){
                                                                if(k){
                                                                    g()
                                                                }else{
                                                                    if(e.rowscount>f+1){
                                                                        q(f+1,l,!v)
                                                                    }else{
                                                                        m=true
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    break;
                case"singlerow":case"multiplerows":case"multiplerowsextended":
                    var f=n.getselectedrowindex();
                    if(f==null||f==-1){
                        return true
                    }
                    f=this.getrowvisibleindex(f);
                    var t=function(C,D){
                        var B=function(G){
                            var I=n.dataview.loadedrecords[G];
                            if(I!=undefined){
                                var H=I.boundindex;
                                var F=n.selectedrowindex;
                                if(D||D==undefined){
                                    n.clearselection()
                                }
                                n.selectedrowindex=F;
                                n.selectrow(H,false);
                                var E=n.ensurerowvisible(G);
                                if(!E){
                                    n._rendervisualrows()
                                }
                                m=true;
                                return true
                            }
                            return false
                        };
        
                        if(!B(C)){
                            n.ensurerowvisible(C);
                            B(C,D);
                            if(n.virtualmode){
                                n.host.focus()
                            }
                        }
                        if(u.shiftKey&&z!=9){
                            if(n.selectionmode=="multiplerowsextended"){
                                if(n._lastClickedCell){
                                    n._selectrowpath(C);
                                    n.selectedrowindex=C;
                                    return
                                }
                            }
                        }else{
                            if(!u.shiftKey){
                                n._lastClickedCell={
                                    row:C
                                }
                            }
                        }
                    };

                    var v=u.shiftKey&&n.selectionmode!="singlerow"&&n.selectionmode!="multiplerows";
                    var w=function(){
                        t(0,!v)
                    };
    
                    var g=function(){
                        var B=e.rowscount-1;
                        t(B,!v)
                    };
    
                    var k=u.ctrlKey;
                    if(z==36||(k&&z==38)){
                        w()
                    }else{
                        if(z==35||(k&&z==40)){
                            g()
                        }else{
                            if(z==33){
                                if(f-s>=0){
                                    var x=f-s;
                                    t(x,!v)
                                }else{
                                    w()
                                }
                            }else{
                                if(z==34){
                                    if(e.rowscount>f+s){
                                        var x=f+s;
                                        t(x,!v)
                                    }else{
                                        g()
                                    }
                                }else{
                                    if(z==38){
                                        if(f>0){
                                            t(f-1,!v)
                                        }else{
                                            m=true
                                        }
                                    }else{
                                        if(z==40){
                                            if(e.rowscount>f+1){
                                                t(f+1,!v)
                                            }else{
                                                m=true
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    break
            }
            if(m){
                if(n.editcell!=null&&n.endcelledit){
                    n.endcelledit(n.editcell.row,n.editcell.column,true,true)
                }
                return false
            }
            return true
        },
        _handlemousemove:function(r,m){
            if(m.vScrollInstance.isScrolling()){
                return
            }
            if(m.hScrollInstance.isScrolling()){
                return
            }
            var s;
            var n;
            var e;
            var l;
            var k;
            if(m.enablehover||m.selectionmode=="multiplerows"){
                s=this.showheader?this.columnsheader.height()+2:0;
                n=this._groupsheader()?this.groupsheader.height():0;
                var u=this.showtoolbar?this.toolbarheight:0;
                n+=u;
                e=this.host.offset();
                l=r.pageX-e.left;
                k=r.pageY-s-e.top-n
            }
            if(m.selectionmode=="multiplerowsextended"||m.selectionmode=="multiplecellsextended"){
                if(m.mousecaptured==true){
                    return
                }
            }
            if(m.enablehover){
                if(m.disabled){
                    return
                }
                if(this.vScrollInstance.isScrolling()||this.hScrollInstance.isScrolling()){
                    return
                }
                var c=this._hittestrow(l,k);
                if(!c){
                    return
                }
                var g=c.row;
                var h=c.index;
                if(this.hoveredrow!=-1&&h!=-1&&this.hoveredrow==h&&this.selectionmode.indexOf("cell")==-1){
                    return
                }
                this._clearhoverstyle();
                if(h==-1||g==undefined){
                    return
                }
                var o=this.hittestinfo[h].visualrow;
                if(o==null){
                    return
                }
                if(this.hittestinfo[h].details){
                    return
                }
                var v=0;
                if(m.rowdetails&&m.showrowdetailscolumn){
                    v=1
                }
                if(o.cells.length==0){
                    return
                }
                var j=o.cells[v].className;
                if(g.group||j.indexOf("jqx-grid-cell-selected")!=-1){
                    return
                }
                this.hoveredrow=h;
                if(this.selectionmode.indexOf("cell")!=-1){
                    var d=-1;
                    var p=this.hScrollInstance;
                    var q=p.value;
                    for(i=0;i<o.cells.length;i++){
                        var f=parseInt(a(this.columnsrow[0].cells[i]).css("left"))-q;
                        var t=f+a(this.columnsrow[0].cells[i]).width();
                        if(t>=l&&l>=f){
                            d=i;
                            break
                        }
                    }
                    if(d!=-1){
                        var b=o.cells[d];
                        if(b.className.indexOf("jqx-grid-cell-selected")==-1){
                            if(b.className.indexOf("jqx-grid-group")==-1){
                                a(b).addClass(this.toTP("jqx-grid-cell-hover"));
                                a(b).addClass(this.toTP("jqx-fill-state-hover"))
                            }
                        }
                    }
                    return
                }
                for(i=v;i<o.cells.length;i++){
                    var b=o.cells[i];
                    if(b.className.indexOf("jqx-grid-group")==-1){
                        a(b).addClass(this.toTP("jqx-grid-cell-hover"));
                        a(b).addClass(this.toTP("jqx-fill-state-hover"))
                    }
                }
            }else{
                return true
            }
        }
    })
})(jQuery);