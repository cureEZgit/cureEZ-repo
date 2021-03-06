/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.extend(a.jqx._jqxGrid.prototype,{
        _calculateaggregate:function(f,h,g){
            var e=f.aggregates;
            if(!e){
                e=h
            }
            if(e){
                var d=new Array();
                for(var c=0;c<e.length;c++){
                    if(e[c]=="count"){
                        continue
                    }
                    d[d.length]=f.cellsformat
                }
                if(this.source&&this.source.getAggregatedData){
                    if(g==undefined||g==true){
                        var b=this.source.getAggregatedData([{
                            name:f.datafield,
                            aggregates:e,
                            formatStrings:d
                        }],this.gridlocalization);
                        return b
                    }else{
                        var b=this.source.getAggregatedData([{
                            name:f.datafield,
                            aggregates:e
                        }],this.gridlocalization);
                        return b
                    }
                }
            }
            return null
        },
        getcolumnaggregateddata:function(d,g,c){
            var e=this.getcolumn(d);
            var f=(c==undefined||c==false)?false:c;
            if(g==null){
                return""
            }
            var b=this._calculateaggregate(e,g,f)[d];
            return b
        },
        refresheaggregates:function(){
            this._updatecolumnsaggregates()
        },
        renderaggregates:function(){
            this._updateaggregates()
        },
        _updatecolumnaggregates:function(d,f,b){
            var e=this;
            if(!f){
                b.children().remove();
                b.html("");
                if(d.aggregatesrenderer){
                    var c=d.aggregatesrenderer(d);
                    b.html(c)
                }
                return
            }
            b.children().remove();
            b.html("");
            if(d.aggregatesrenderer){
                if(f){
                    var c=d.aggregatesrenderer(f[d.datafield],d);
                    b.html(c)
                }
            }else{
                a.each(f,function(){
                    var h=this;
                    for(obj in h){
                        var k=a('<div style="position: relative; margin: 4px; overflow: hidden;"></div>');
                        var g=obj;
                        g=e._getaggregatename(g);
                        k.html(g+":"+h[obj]);
                        b.append(k)
                    }
                })
            }
        },
        _getaggregatename:function(c){
            var b=c;
            switch(c){
                case"min":
                    b="Min";
                    break;
                case"max":
                    b="Max";
                    break;
                case"count":
                    b="Count";
                    break;
                case"avg":
                    b="Avg";
                    break;
                case"product":
                    b="Product";
                    break;
                case"var":
                    b="Var";
                    break;
                case"stdevp":
                    b="StDevP";
                    break;
                case"stdev":
                    b="StDev";
                    break;
                case"varp":
                    b="VarP";
                case"sum":
                    b="Sum";
                    break
            }
            return b
        },
        _updatecolumnsaggregates:function(){
            var b=this.columns.records.length;
            for(j=0;j<b;j++){
                var e=a(this.statusbar[0].cells[j]);
                var d=this.columns.records[j];
                var c=this._calculateaggregate(d);
                this._updatecolumnaggregates(d,c,e)
            }
        },
        _updateaggregates:function(){
            var b=a('<div style="position: relative;" id="row'+i+this.element.id+'"></div>');
            var d=0;
            var k=this.columns.records.length;
            var h=this.toThemeProperty("jqx-grid-cell");
            h+=" "+this.toThemeProperty("jqx-grid-cell-pinned");
            var l=k+10;
            var m=new Array();
            this.statusbar[0].cells=m;
            for(j=0;j<k;j++){
                var e=this.columns.records[j];
                var f=this._calculateaggregate(e);
                var c=e.width;
                if(c<e.minwidth){
                    c=e.minwidth
                }
                if(c>e.maxwidth){
                    c=e.maxwidth
                }
                var g=a('<div style="overflow: hidden; position: absolute; height: 100%;" class="'+h+'"></div>');
                b.append(g);
                g.css("left",d);
                g.css("z-index",l--);
                g.width(c);
                g[0].left=d;
                if(!(e.hidden&&e.hideable)){
                    d+=c
                }else{
                    g.css("display","none")
                }
                m[m.length]=g[0];
                this._updatecolumnaggregates(e,f,g)
            }
            if(a.browser.msie&&a.browser.version<8){
                b.css("z-index",l--)
            }
            b.width(parseInt(d)+2);
            b.height(this.statusbarheight);
            this.statusbar.children().remove();
            this.statusbar.append(b);
            this.statusbar.removeClass(this.toThemeProperty("jqx-widget-header"));
            this.statusbar.addClass(h);
            this.statusbar.css("border-bottom-color","transparent");
            this.statusbar.css("border-top-width","1px")
        }
    })
})(jQuery);