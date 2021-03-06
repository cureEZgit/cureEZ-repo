/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.extend(a.jqx._jqxGrid.prototype,{
        exportdata:function(i,o,n,k){
            if(!a.jqx.dataAdapter.ArrayExporter){
                throw"jqxdata.export.js is not loaded."
            }
            if(n==undefined){
                n=true
            }
            var s=this;
            var h=this.getrows();
            if(h.length==0){
                throw"No data to export."
            }
            var q={};
            
            var g={};
            
            var l=[];
            var f=this.host.find(".jqx-grid-cell:first");
            var m=this.host.find(".jqx-grid-cell-alt:first");
            f.removeClass(this.toThemeProperty("jqx-grid-cell-selected"));
            f.removeClass(this.toThemeProperty("jqx-fill-state-pressed"));
            m.removeClass(this.toThemeProperty("jqx-grid-cell-selected"));
            m.removeClass(this.toThemeProperty("jqx-fill-state-pressed"));
            f.removeClass(this.toThemeProperty("jqx-grid-cell-hover"));
            f.removeClass(this.toThemeProperty("jqx-fill-state-hover"));
            m.removeClass(this.toThemeProperty("jqx-grid-cell-hover"));
            m.removeClass(this.toThemeProperty("jqx-fill-state-hover"));
            var d="cell";
            var c=1;
            var r="column";
            var b=1;
            var e=[];
            a.each(this.columns.records,function(v){
                var z=a(s.table[0].rows[0].cells[v]);
                if(s.table[0].rows.length>1){
                    var w=a(s.table[0].rows[1].cells[v])
                }
                var y=function(A){
                    A.removeClass(s.toThemeProperty("jqx-grid-cell-selected"));
                    A.removeClass(s.toThemeProperty("jqx-fill-state-pressed"));
                    A.removeClass(s.toThemeProperty("jqx-grid-cell-hover"));
                    A.removeClass(s.toThemeProperty("jqx-fill-state-hover"))
                };
                    
                y(z);
                if(w){
                    y(w)
                }
                if(s.showaggregates){
                    if(s.getcolumnaggregateddata){
                        e.push(s.getcolumnaggregateddata(this.datafield,this.aggregates,true))
                    }
                }
                var x=s._getexportcolumntype(this);
                if(this.exportable){
                    q[this.datafield]={};
                
                    q[this.datafield].text=this.text;
                    q[this.datafield].width=this.width;
                    q[this.datafield].formatString=this.cellsformat;
                    q[this.datafield].type=x;
                    q[this.datafield].cellsAlign=this.cellsalign;
                    q[this.datafield].hidden=!n
                }
                d="cell"+c;
                var t=a(this.element);
                r="column"+b;
                if(i=="html"||i=="xls"){
                    var u=function(E,B,C,A,G,F,D){
                        g[E]={};
                    
                        g[E]["font-size"]=B.css("font-size");
                        g[E]["font-weight"]=B.css("font-weight");
                        g[E]["font-style"]=B.css("font-style");
                        g[E]["background-color"]=F._getexportcolor(B.css("background-color"));
                        g[E]["color"]=F._getexportcolor(B.css("color"));
                        g[E]["border-color"]=F._getexportcolor(B.css("border-top-color"));
                        if(C){
                            g[E]["text-align"]=G.align
                        }else{
                            g[E]["text-align"]=G.cellsalign;
                            g[E]["formatString"]=G.cellsformat;
                            g[E]["dataType"]=x
                        }
                        if(i=="html"){
                            g[E]["border-top-width"]=B.css("border-top-width");
                            g[E]["border-left-width"]=B.css("border-left-width");
                            g[E]["border-right-width"]=B.css("border-right-width");
                            g[E]["border-bottom-width"]=B.css("border-bottom-width");
                            g[E]["border-top-style"]=B.css("border-top-style");
                            g[E]["border-left-style"]=B.css("border-left-style");
                            g[E]["border-right-style"]=B.css("border-right-style");
                            g[E]["border-bottom-style"]=B.css("border-bottom-style");
                            if(C){
                                if(D==0){
                                    g[E]["border-left-width"]=B.css("border-right-width")
                                }
                                g[E]["border-top-width"]=B.css("border-right-width");
                                g[E]["border-bottom-width"]=B.css("border-bottom-width")
                            }else{
                                if(D==0){
                                    g[E]["border-left-width"]=B.css("border-right-width")
                                }
                            }
                            g[E]["height"]=B.css("height")
                        }
                        if(G.exportable){
                            if(C){
                                q[G.datafield].style=E
                            }else{
                                if(!A){
                                    q[G.datafield].cellStyle=E
                                }else{
                                    q[G.datafield].cellAltStyle=E
                                }
                            }
                        }
                    };
        
                    u(r,t,true,false,this,s,v);
                    b++;
                    u(d,z,false,false,this,s,v);
                    if(s.altrows){
                        d="cellalt"+c;
                        u(d,w,false,true,this,s,v)
                    }
                    c++
                }
            });
            if(this.showaggregates){
                var p=[];
                if(e.length>0){
                    a.each(this.columns.records,function(t){
                        if(this.aggregates){
                            for(var u=0;u<this.aggregates.length;u++){
                                if(!p[u]){
                                    p[u]={}
                                }
                                if(p[u]){
                                    var v=s._getaggregatename(this.aggregates[u]);
                                    p[u][this.datafield]=v+": "+e[t][this.aggregates[u]]
                                }
                            }
                        }
                    });
                    a.each(this.columns.records,function(t){
                        for(var u=0;u<p.length;u++){
                            if(p[u][this.datafield]==undefined){
                                p[u][this.datafield]=""
                            }
                        }
                    })
                }
                a.each(p,function(){
                    h.push(this)
                })
            }
            var j=a.jqx.dataAdapter.ArrayExporter(h,q,g);
            if(o==undefined){
                this._renderrows(this.virtualsizeinfo);
                return j.exportTo(i)
            }else{
                j.exportToFile(i,o)
            }
            this._renderrows(this.virtualsizeinfo)
        },
        _getexportcolor:function(k){
            var d=k;
            if(k=="transparent"){
                d="#FFFFFF"
            }
            if(d.toString().indexOf("rgb")!=-1){
                var e=d.split(",");
                var i=parseInt(e[0].substring(4));
                var h=parseInt(e[1]);
                var c=parseInt(e[2].substring(1,4));
                var j={
                    r:i,
                    g:h,
                    b:c
                };
        
                var f=this._rgbToHex(j);
                return"#"+f
            }
            return d
        },
        _rgbToHex:function(b){
            return this._intToHex(b.r)+this._intToHex(b.g)+this._intToHex(b.b)
        },
        _intToHex:function(c){
            var b=(parseInt(c).toString(16));
            if(b.length==1){
                b=("0"+b)
            }
            return b.toUpperCase()
        },
        _getexportcolumntype:function(e){
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
        }
    })
})(jQuery);