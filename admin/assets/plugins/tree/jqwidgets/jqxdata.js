/*
jQWidgets v2.4.2 (2012-Sep-12)
Copyright (c) 2011-2012 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){
    a.jqx.dataAdapter=function(e,b){
        this._source=e;
        this._options=b||{};
        
        this.records=new Array();
        this._downloadComplete=new Array();
        this._bindingUpdate=new Array();
        if(this._options.autoBind==true){
            this.dataBind()
        }
        if(e!=undefined&&e.localdata!=null&&typeof e.localdata=="function"){
            var d=e.localdata();
            if(d!=null){
                e._localdata=e.localdata;
                var c=this;
                if(e._localdata.subscribe){
                    e._localdata.subscribe(function(h){
                        var g=c._oldCount!=h.length;
                        var f=g?"createRemoveData":"updateData";
                        c.dataBind(null,f);
                        c._oldCount=h.length
                    })
                }
                e.localdata=d;
                c._oldCount=d.length
            }
        }
    };

    a.jqx.dataAdapter.prototype={
        getrecords:function(){
            return this.records
        },
        beginUpdate:function(){
            this.isUpdating=true
        },
        endUpdate:function(b){
            this.isUpdating=false;
            if(b!=false){
                this.dataBind(null,"")
            }
        },
        dataBind:function(l,q){
            if(this.isUpdating==true){
                return
            }
            var n=this._source;
            if(!n){
                return
            }
            if(n.dataFields!=null){
                n.datafields=n.dataFields
            }
            if(n.recordstartindex==undefined){
                n.recordstartindex=0
            }
            if(n.recordendindex==undefined){
                n.recordendindex=0
            }
            if(n.loadallrecords==undefined){
                n.loadallrecords=true
            }
            if(n.sort!=undefined){
                this.sort=n.sort
            }
            if(n.filter!=undefined){
                this.filter=n.filter
            }
            if(n.sortcolumn!=undefined){
                this.sortcolumn=n.sortcolumn
            }
            if(n.sortdirection!=undefined){
                this.sortdirection=n.sortdirection
            }
            if(n.sortcomparer!=undefined){
                this.sortcomparer=n.sortcomparer
            }
            this.records=new Array();
            var f=this._options||{};
    
            this.virtualmode=f.virtualmode!=undefined?f.virtualmode:false;
            this.totalrecords=f.totalrecords!=undefined?f.totalrecords:0;
            this.pageable=f.pageable!=undefined?f.pageable:false;
            this.pagesize=f.pagesize!=undefined?f.pagesize:0;
            this.pagenum=f.pagenum!=undefined?f.pagenum:0;
            this.cachedrecords=f.cachedrecords!=undefined?f.cachedrecords:new Array();
            this.originaldata=new Array();
            this.recordids=new Array();
            this.updaterow=f.updaterow!=undefined?f.updaterow:null;
            this.addrow=f.addrow!=undefined?f.addrow:null;
            this.deleterow=f.deleterow!=undefined?f.deleterow:null;
            this.cache=f.cache!=undefined?f.cache:true;
            this.unboundmode=false;
            if(f.unboundmode||n.unboundmode){
                this.unboundmode=f.unboundmode||n.unboundmode
            }
            if(n.cache!=undefined){
                this.cache=n.cache
            }
            if(this.koSubscriptions){
                for(var s=0;s<this.koSubscriptions.length;s++){
                    this.koSubscriptions[s].dispose()
                }
            }
            this.koSubscriptions=new Array();
            if(this.pagenum<0){
                this.pagenum=0
            }
            var v=this;
            var k=n.datatype;
            if(n.datatype==="csv"||n.datatype==="tab"||n.datatype=="text"){
                k="text"
            }
            var h=f.async!=undefined?f.async:true;
            if(n.async!=undefined){
                h=n.async
            }
            switch(k){
                case"local":case"array":default:
                    if(n.localdata==undefined&&n.length){
                        n.localdata=new Array();
                        for(var p=0;p<n.length;p++){
                            n.localdata[n.localdata.length]=n[p]
                        }
                    }
                    var g=n.localdata.length;
                    this.totalrecords=this.virtualmode?(n.totalrecords||g):g;
                    if(this.unboundmode){
                        this.totalrecords=this.unboundmode?(n.totalrecords||g):g;
                        var t=n.datafields?n.datafields.length:0;
                        if(t>0){
                            for(var p=0;p<this.totalrecords;p++){
                                var d={};
                
                                for(var o=0;o<t;o++){
                                    d[n.datafields[o].name]=""
                                }
                                n.localdata[n.localdata.length]=d
                            }
                        }
                    }
                    if(this.totalrecords==undefined){
                        this.totalrecords=0
                    }
                    var t=n.datafields?n.datafields.length:0;
                    var c=function(w,D){
                        var B={};
    
                        for(o=0;o<D;o++){
                            var y=n.datafields[o];
                            var A="";
                            if(undefined==y||y==null){
                                continue
                            }
                            if(y.map){
                                var x=y.map.split(">");
                                if(x.length>0){
                                    var z=w;
                                    for(var C=0;C<x.length;C++){
                                        z=z[x[C]]
                                    }
                                    A=z
                                }else{
                                    A=w[y.map]
                                }
                                if(A!=undefined&&A!=null){
                                    A=A.toString()
                                }else{
                                    A=""
                                }
                            }
                            if(A==""){
                                A=w[y.name];
                                if(A!=undefined&&A!=null){
                                    if(n._localdata){
                                        A=A()
                                    }else{
                                        A=A.toString()
                                    }
                                }else{
                                    A=""
                                }
                            }
                            A=v.getvaluebytype(A,y);
                            B[y.name]=A
                        }
                        return B
                    };

                    if(n._localdata){
                        this.records=new Array();
                        a.each(n.localdata,function(x){
                            if(t>0){
                                var w=this;
                                var y=c(w,t);
                                v.records[v.records.length]=y
                            }else{
                                var w={};
            
                                for(var z in this){
                                    var A=a.isFunction(this[z]);
                                    if(A){
                                        w[z]=this[z]();
                                        if(this[z].subscribe){
                                            v.koSubscriptions[v.koSubscriptions.length]=this[z].subscribe(function(B){
                                                v.dataBind(null,null);
                                                return false
                                            })
                                        }
                                    }else{
                                        w[z]=this[z]
                                    }
                                }
                                v.records[v.records.length]=w
                            }
                        })
                    }else{
                        if(!a.isArray(n.localdata)){
                            this.records=new Array();
                            a.each(n.localdata,function(x){
                                if(t>0){
                                    var w=this;
                                    var y=c(w,t);
                                    v.records[v.records.length]=y
                                }else{
                                    v.records[v.records.length]=this
                                }
                            })
                        }else{
                            if(t==0){
                                this.records=n.localdata
                            }else{
                                a.each(n.localdata,function(x){
                                    var w=this;
                                    var y=c(w,t);
                                    v.records[v.records.length]=y
                                })
                            }
                        }
                    }
                    this.originaldata=n.localdata;
                    this.cachedrecords=this.records;
                    if(f.uniqueDataFields){
                        var m=this.getUniqueRecords(this.records,f.uniqueDataFields);
                        this.records=m;
                        this.cachedrecords=m
                    }
                    if(a.isFunction(f.loadComplete)){
                        f.loadComplete(n.localdata)
                    }
                    break;
                case"json":case"jsonp":case"xml":case"xhtml":case"script":case"text":
                    if(n.localdata!=null){
                        if(a.isFunction(n.beforeprocessing)){
                            n.beforeprocessing(n.localdata)
                        }
                        if(n.datatype==="xml"){
                            v.loadxml(n.localdata,n.localdata,n)
                        }else{
                            if(k==="text"){
                                v.loadtext(n.localdata,n)
                            }else{
                                v.loadjson(n.localdata,n.localdata,n)
                            }
                        }
                        if(f.uniqueDataFields){
                            var m=v.getUniqueRecords(v.records,f.uniqueDataFields);
                            v.records=m;
                            v.cachedrecords=m
                        }
                        if(a.isFunction(f.loadComplete)){
                            f.loadComplete(n.localdata)
                        }
                        return
                    }
                    var u=f.data!=undefined?f.data:{};

                    if(n.processdata){
                        n.processdata(u)
                    }
                    if(a.isFunction(f.processData)){
                        f.processData(u)
                    }
                    if(a.isFunction(f.formatData)){
                        var b=f.formatData(u);
                        if(b!=undefined){
                            u=b
                        }
                    }
                    var r="application/x-www-form-urlencoded";
                    if(f.contentType){
                        r=f.contentType
                    }
                    var e="GET";
                    if(f.type){
                        e=f.type
                    }
                    if(n.url&&n.url.length>0){
                        if(a.isFunction(f.loadServerData)){
                            v._requestData(u,n,f)
                        }else{
                            a.ajax({
                                dataType:k,
                                cache:this.cache,
                                type:e,
                                url:n.url,
                                async:h,
                                contentType:r,
                                data:u,
                                success:function(z,w,B){
                                    if(a.isFunction(n.beforeprocessing)){
                                        var A=n.beforeprocessing(z,w,B);
                                        if(A!=undefined){
                                            z=A
                                        }
                                    }
                                    if(a.isFunction(f.downloadComplete)){
                                        var A=f.downloadComplete(z,w,B);
                                        if(A!=undefined){
                                            z=A
                                        }
                                    }
                                    if(z==null){
                                        return
                                    }
                                    var x=z;
                                    if(z.records){
                                        x=z.records
                                    }
                                    if(z.totalrecords){
                                        n.totalrecords=z.totalrecords
                                    }
                                    if(n.datatype==="xml"){
                                        v.loadxml(null,x,n)
                                    }else{
                                        if(k==="text"){
                                            v.loadtext(x,n)
                                        }else{
                                            v.loadjson(null,x,n)
                                        }
                                    }
                                    if(f.uniqueDataFields){
                                        var y=v.getUniqueRecords(v.records,f.uniqueDataFields);
                                        v.records=y;
                                        v.cachedrecords=y
                                    }
                                    v.callDownloadComplete();
                                    if(a.isFunction(f.loadComplete)){
                                        f.loadComplete(z)
                                    }
                                },
                                error:function(y,w,x){
                                    if(a.isFunction(n.loaderror)){
                                        n.loaderror(y,w,x)
                                    }
                                    if(a.isFunction(f.loadError)){
                                        f.loadError(y,w,x)
                                    }
                                    y=null;
                                    v.callDownloadComplete()
                                },
                                beforeSend:function(x,w){
                                    if(a.isFunction(f.beforeSend)){
                                        f.beforeSend(x,w)
                                    }
                                    if(a.isFunction(n.beforesend)){
                                        n.beforesend(x,w)
                                    }
                                }
                            })
                        }
                    }else{
                        v.callDownloadComplete();
                        if(a.isFunction(f.loadComplete)){
                            f.loadComplete(data)
                        }
                    }
                    break
            }
            this.callBindingUpdate(q)
        },
        _requestData:function(c,e,b){
            var d=this;
            var f=function(g){
                if(g.totalrecords){
                    e.totalrecords=g.totalrecords;
                    d.totalrecords=g.totalrecords
                }
                if(g.records){
                    d.records=g.records;
                    d.cachedrecords=g.records
                }
                if(a.isFunction(b.loadComplete)){
                    b.loadComplete(data)
                }
                d.callDownloadComplete()
            };
        
            b.loadServerData(c,e,f)
        },
        getUniqueRecords:function(d,f){
            if(d&&f){
                var b=d.length;
                var l=f.length;
                var h=new Array();
                var k=new Array();
                for(urec=0;urec<b;urec++){
                    var g=d[urec];
                    var e="";
                    for(datafieldindex=0;datafieldindex<l;datafieldindex++){
                        var c=f[datafieldindex];
                        e+=g[c]+"_"
                    }
                    if(!k[e]){
                        h[h.length]=g
                    }
                    k[e]=true
                }
            }
            return h
        },
        getAggregatedData:function(n,h,f){
            var e=f;
            if(!e){
                e=this.records
            }
            var k={};
    
            var d=e.length;
            if(d==0){
                return
            }
            for(var l=0;l<d;l++){
                var m=e[l];
                for(var g=0;g<n.length;g++){
                    var c=n[g];
                    var o=m[c.name];
                    if(c.aggregates){
                        k[c.name]=k[c.name]||{};
                
                        var b=function(p){
                            for(obj in p){
                                var q=k[c.name][obj];
                                if(q==null){
                                    k[c.name][obj]=0;
                                    q=0
                                }
                                if(a.isFunction(p[obj])){
                                    q=p[obj](q,o,c.name,m)
                                }
                                k[c.name][obj]=q
                            }
                        };
                    
                        if(typeof o==="number"&&isFinite(o)){
                            a.each(c.aggregates,function(){
                                var p=k[c.name][this];
                                if(p==null){
                                    p=0;
                                    if(this=="min"){
                                        p=9999999999999
                                    }
                                }
                                if(this=="sum"||this=="avg"||this=="stdev"||this=="stdevp"||this=="var"||this=="varp"){
                                    p+=parseFloat(o)
                                }else{
                                    if(this=="product"){
                                        if(l==0){
                                            p=parseFloat(o)
                                        }else{
                                            p*=parseFloat(o)
                                        }
                                    }else{
                                        if(this=="min"){
                                            p=Math.min(p,parseFloat(o))
                                        }else{
                                            if(this=="max"){
                                                p=Math.max(p,parseFloat(o))
                                            }else{
                                                if(this=="count"){
                                                    p++
                                                }else{
                                                    if(typeof(this)=="object"){
                                                        b(this);
                                                        return
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                k[c.name][this]=p
                            })
                        }else{
                            a.each(c.aggregates,function(){
                                if(this=="min"||this=="max"||this=="count"||this=="product"||this=="sum"||this=="avg"||this=="stdev"||this=="stdevp"||this=="var"||this=="varp"){
                                    k[c.name][this]=0;
                                    return true
                                }
                                if(typeof(this)=="object"){
                                    b(this)
                                }
                            })
                        }
                    }
                }
            }
            for(var g=0;g<n.length;g++){
                var c=n[g];
                if(k[c.name]["avg"]!=undefined){
                    var o=k[c.name]["avg"];
                    k[c.name]["avg"]=o/e.length
                }else{
                    if(k[c.name]["count"]!=undefined){
                        k[c.name]["count"]=d
                    }
                }
                if(k[c.name]["stdev"]||k[c.name]["stdevp"]||k[c.name]["var"]||k[c.name]["varp"]){
                    a.each(c.aggregates,function(v){
                        if(this=="stdev"||this=="var"||this=="varp"||this=="stdevp"){
                            var w=k[c.name][this];
                            var u=d;
                            var p=(w/d);
                            var r=0;
                            for(var s=0;s<d;s++){
                                var t=e[s];
                                var x=t[c.name];
                                r+=(x-p)*(x-p)
                            }
                            var q=(this=="stdevp"||this=="varp")?u:u-1;
                            if(q==0){
                                q=1
                            }
                            if(this=="var"||this=="varp"){
                                k[c.name][this]=r/q
                            }else{
                                if(this=="stdevp"||this=="stdev"){
                                    k[c.name][this]=Math.sqrt(r/q)
                                }
                            }
                        }
                    })
                }
                if(c.formatStrings){
                    a.each(c.aggregates,function(q){
                        var p=c.formatStrings[q];
                        if(p){
                            if(this=="min"||this=="max"||this=="count"||this=="product"||this=="sum"||this=="avg"||this=="stdev"||this=="stdevp"||this=="var"||this=="varp"){
                                var r=k[c.name][this];
                                k[c.name][this]=a.jqx.dataFormat.formatnumber(r,p,h)
                            }else{
                                if(typeof this=="object"){
                                    for(obj in this){
                                        var r=k[c.name][obj];
                                        k[c.name][obj]=a.jqx.dataFormat.formatnumber(r,p,h)
                                    }
                                }
                            }
                        }
                    })
                }
            }
            return k
        },
        bindDownloadComplete:function(c,b){
            this._downloadComplete[this._downloadComplete.length]={
                id:c,
                func:b
            }
        },
        unbindDownloadComplete:function(c){
            for(var b=0;b<this._downloadComplete.length;b++){
                if(this._downloadComplete[b].id==c){
                    this._downloadComplete[b].func=null;
                    this._downloadComplete.splice(b,1);
                    break
                }
            }
        },
        callDownloadComplete:function(){
            for(complete=0;complete<this._downloadComplete.length;complete++){
                var b=this._downloadComplete[complete];
                if(b.func!=null){
                    b.func()
                }
            }
        },
        setSource:function(b){
            this._source=b
        },
        generatekey:function(){
            var b=function(){
                return(((1+Math.random())*65536)|0).toString(16).substring(1)
            };
        
            return(b()+b()+"-"+b()+"-"+b()+"-"+b()+"-"+b()+b()+b())
        },
        getGroupedRecords:function(E,H,s,z,F,x){
            var B=0;
            var w=this;
            var d=new Array();
            for(var h=0;h<E.length;h++){
                d[h]=w.generatekey()
            }
            if(!H){
                H="items"
            }
            if(!s){
                s="group"
            }
            if(!F){
                F="record"
            }
            if(!x){
                x="value"
            }
            var n=new Array();
            var f=0;
            var e=new Array();
            var m=E.length;
            var G=new Array();
            var I=this.records;
            var k=I.length;
            var A=function(q){
                var J=q;
                if(z){
                    a.each(z,function(){
                        if(this.name&&this.map){
                            J[this.map]=J[this.name]
                        }
                    })
                }
                return J
            };
    
            for(var r=0;r<k;r++){
                var D=A(I[r]);
                id=D[w.uniqueId];
                var c=new Array();
                var t=0;
                for(h=0;h<m;h++){
                    var l=E[h];
                    var y=D[l];
                    if(null==y){
                        continue
                    }
                    c[t++]={
                        value:y,
                        hash:d[h]
                    }
                }
                if(c.length!=m){
                    break
                }
                var u=null;
                var o="";
                var b=-1;
                for(var v=0;v<c.length;v++){
                    b++;
                    var C=c[v].value;
                    var g=c[v].hash;
                    o=o+"_"+g+"_"+C;
                    if(e[o]!=undefined&&e[o]!=null){
                        u=e[o];
                        continue
                    }
                    if(u==null){
                        u={
                            level:0
                        };
        
                        u[s]=C;
                        u[F]=D;
                        u[x]=D[x];
                        u[H]=new Array();
                        n[f++]=u
                    }else{
                        var p={
                            parentItem:u,
                            level:u.level+1
                        };
            
                        p[s]=C;
                        p[H]=new Array();
                        p[F]=D;
                        p[x]=D[x];
                        u[H][u[H].length]=p;
                        u=p
                    }
                    e[o]=u
                }
                if(u!=null){
                    D.parentItem=u;
                    D.level=u.level+1;
                    u[H][u[H].length]=D
                }
            }
            return n
        },
        getRecordsHierarchy:function(f,d,u,p){
            var b=new Array();
            var c=this.records;
            if(this.records.length==0){
                return null
            }
            var s=u!=null?u:"items";
            var m=[];
            var v=c;
            var k=v.length;
            var q=function(w){
                var x=w;
                if(p){
                    a.each(p,function(){
                        if(this.name&&this.map){
                            x[this.map]=x[this.name]
                        }
                    })
                }
                return x
            };
    
            for(var r=0;r<k;r++){
                var t=a.extend({},v[r]);
                var o=t[d];
                var n=t[f];
                m[n]={
                    parentid:o,
                    item:t
                }
            }
            for(var r=0;r<k;r++){
                var t=a.extend({},v[r]);
                var o=t[d];
                var n=t[f];
                if(m[o]!=undefined){
                    var t={
                        parentid:o,
                        item:m[n].item
                    };
            
                    var l=m[o].item;
                    if(!l[s]){
                        l[s]=[]
                    }
                    var g=l[s].length;
                    var e=t.item;
                    var h=q(e);
                    l[s][g]=h;
                    m[o].item=l;
                    m[n]=t
                }else{
                    var e=m[n].item;
                    var h=q(e);
                    b[b.length]=h
                }
            }
            return b
        },
        bindBindingUpdate:function(c,b){
            this._bindingUpdate[this._bindingUpdate.length]={
                id:c,
                func:b
            }
        },
        unbindBindingUpdate:function(c){
            for(var b=0;b<this._bindingUpdate.length;b++){
                if(this._bindingUpdate[b].id==c){
                    this._bindingUpdate[b].func=null;
                    this._bindingUpdate.splice(b,1);
                    break
                }
            }
        },
        callBindingUpdate:function(b){
            for(var d=0;d<this._bindingUpdate.length;d++){
                var c=this._bindingUpdate[d];
                if(c.func!=null){
                    c.func(b)
                }
            }
        },
        getid:function(e,c,d){
            if(a(e,c).length>0){
                return a(e,c).text()
            }
            if(e){
                if(e.toString().length>0){
                    var b=a(c).attr(e);
                    if(b!=null&&b.toString().length>0){
                        return b
                    }
                }
            }
            return d
        },
        loadjson:function(v,w,m){
            if(typeof(v)=="string"){
                v=a.parseJSON(v)
            }
            if(m.root==undefined){
                m.root=""
            }
            if(m.record==undefined){
                m.record=""
            }
            var v=v||w;
            if(!v){
                v=[]
            }
            if(m.root!=""){
                if(v[m.root]!=undefined){
                    v=v[m.root]
                }else{
                    a.each(v,function(x){
                        var p=this;
                        if(this==m.root){
                            v=this;
                            return false
                        }else{
                            if(this[m.root]!=undefined){
                                v=this[m.root]
                            }
                        }
                    })
                }
            }else{
                if(!v.length){
                    for(obj in v){
                        if(a.isArray(v[obj])){
                            v=v[obj];
                            break
                        }
                    }
                }
            }
            if(v!=null&&v.length==undefined){
                v=a.makeArray(v)
            }
            if(v==null||v.length==undefined){
                alert("JSON Parse error.");
                return
            }
            if(v.length==0){
                return
            }
            var e=v.length;
            this.totalrecords=this.virtualmode?(m.totalrecords||e):e;
            this.records=new Array();
            this.originaldata=new Array();
            var q=this.records;
            var n=!this.pageable?m.recordstartindex:this.pagesize*this.pagenum;
            this.recordids=new Array();
            if(m.loadallrecords){
                n=0;
                e=this.totalrecords
            }
            var k=0;
            if(this.virtualmode){
                n=!this.pageable?m.recordstartindex:this.pagesize*this.pagenum;
                k=n;
                n=0;
                e=this.totalrecords
            }
            var r=m.datafields?m.datafields.length:0;
            if(r==0){
                var b=v[0];
                var t=new Array();
                for(obj in b){
                    var c=obj;
                    t[t.length]={
                        name:c
                    }
                }
                m.datafields=t;
                r=t.length
            }
            for(i=n;i<e;i++){
                var d=v[i];
                if(d==undefined){
                    break
                }
                if(m.record&&m.record!=""){
                    d=d[m.record]
                }
                var u=this.getid(m.id,d,i);
                if(!this.recordids[u]){
                    this.recordids[u]=d;
                    var g={};
        
                    for(j=0;j<r;j++){
                        var h=m.datafields[j];
                        var o="";
                        if(undefined==h||h==null){
                            continue
                        }
                        if(h.map){
                            var f=h.map.split(">");
                            if(f.length>0){
                                var s=d;
                                for(var l=0;l<f.length;l++){
                                    s=s[f[l]]
                                }
                                o=s
                            }else{
                                o=d[h.map]
                            }
                            if(o!=undefined&&o!=null){
                                o=o.toString()
                            }else{
                                o=""
                            }
                        }
                        if(o==""){
                            o=d[h.name];
                            if(o!=undefined&&o!=null){
                                o=o.toString()
                            }else{
                                o=""
                            }
                        }
                        o=this.getvaluebytype(o,h);
                        g[h.name]=o
                    }
                    if(m.recordendindex<=0||n<m.recordendindex){
                        q[k+i]=a.extend({},g);
                        q[k+i].uid=u;
                        this.originaldata[k+i]=a.extend({},q[i])
                    }
                }
            }
            this.records=q;
            this.cachedrecords=this.records
        },
        loadxml:function(p,m,c){
            if(typeof(p)=="string"){
                p=m=a(a.parseXML(p))
            }
            if(c.root==undefined){
                c.root=""
            }
            if(c.record==undefined){
                c.record=""
            }
            var p;
            if(a.browser.msie&&m){
                if(m.xml!=undefined){
                    p=a(c.root+" "+c.record,a.parseXML(m.xml))
                }else{
                    p=p||a(c.root+" "+c.record,m)
                }
            }else{
                p=p||a(c.root+" "+c.record,m)
            }
            if(!p){
                p=[]
            }
            var f=p.length;
            if(p.length==0){
                return
            }
            this.totalrecords=this.virtualmode?(c.totalrecords||f):f;
            this.records=new Array();
            this.originaldata=new Array();
            var k=this.records;
            var t=!this.pageable?c.recordstartindex:this.pagesize*this.pagenum;
            this.recordids=new Array();
            if(c.loadallrecords){
                t=0;
                f=this.totalrecords
            }
            var e=0;
            if(this.virtualmode){
                t=!this.pageable?c.recordstartindex:this.pagesize*this.pagenum;
                e=t;
                t=0;
                f=this.totalrecords
            }
            var s=c.datafields?c.datafields.length:0;
            if(s==0){
                var l=p[0];
                var h=new Array();
                for(obj in l){
                    var q=obj;
                    h[h.length]={
                        name:q
                    }
                }
                c.datafields=h;
                s=h.length
            }
            for(i=t;i<f;i++){
                var n=p[i];
                if(n==undefined){
                    break
                }
                var d=this.getid(c.id,n,i);
                if(!this.recordids[d]){
                    this.recordids[d]=n;
                    var o={};
        
                    for(j=0;j<s;j++){
                        var g=c.datafields[j];
                        var r="";
                        if(undefined==g||g==null){
                            continue
                        }
                        if(g.map){
                            r=a(g.map,n).text()
                        }
                        if(r==""){
                            r=a(g.name,n).text()
                        }
                        var b=r;
                        r=this.getvaluebytype(r,g);
                        o[g.name]=r
                    }
                    if(c.recordendindex<=0||t<c.recordendindex){
                        k[e+i]=a.extend({},o);
                        k[e+i].uid=d;
                        this.originaldata[e+i]=a.extend({},k[i])
                    }
                }
            }
            this.records=k;
            this.cachedrecords=this.records
        },
        loadtext:function(k,b){
            if(k==null){
                return
            }
            var t=b.rowDelimiter||"\n";
            var s=k.split(t);
            var e=s.length;
            this.totalrecords=this.virtualmode?(b.totalrecords||e):e;
            this.records=new Array();
            this.originaldata=new Array();
            var g=this.records;
            var r=!this.pageable?b.recordstartindex:this.pagesize*this.pagenum;
            this.recordids=new Array();
            if(b.loadallrecords){
                r=0;
                e=this.totalrecords
            }
            var d=0;
            if(this.virtualmode){
                r=!this.pageable?b.recordstartindex:this.pagesize*this.pagenum;
                d=r;
                r=0;
                e=this.totalrecords
            }
            var o=b.datafields.length;
            var q=b.columnDelimiter;
            if(!q){
                q=(b.datatype==="tab")?"\t":","
            }
            for(i=r;i<e;i++){
                var l=s[i];
                var c=this.getid(b.id,l,i);
                if(!this.recordids[c]){
                    this.recordids[c]=l;
                    var m={};
            
                    var h=s[i].split(q);
                    for(j=0;j<o;j++){
                        if(j>=h.lenght){
                            continue
                        }
                        var f=b.datafields[j];
                        var n=h[j];
                        if(f.type){
                            n=this.getvaluebytype(n,f)
                        }
                        var p=f.map||f.name||j.toSring();
                        m[p]=n
                    }
                    g[d+i]=a.extend({},m);
                    g[d+i].uid=c;
                    this.originaldata[d+i]=a.extend({},g[i])
                }
            }
            this.records=g;
            this.cachedrecords=this.records
        },
        getvaluebytype:function(f,c){
            var d=f;
            if(c.type=="date"){
                var e=new Date(f);
                if(typeof f=="string"){
                    if(c.format){
                        var b=a.jqx.dataFormat.parsedate(f,c.format);
                        if(b!=null){
                            e=b
                        }
                    }
                }
                if(e.toString()=="NaN"||e.toString()=="Invalid Date"){
                    if(a.jqx.dataFormat){
                        f=a.jqx.dataFormat.tryparsedate(f)
                    }else{
                        f=e
                    }
                }else{
                    f=e
                }
                if(f==null){
                    f=d
                }
            }else{
                if(c.type=="float"||c.type=="number"||c.type=="decimal"){
                    var f=parseFloat(f);
                    if(isNaN(f)){
                        f=d
                    }
                }else{
                    if(c.type=="int"||c.type=="integer"){
                        var f=parseInt(f);
                        if(isNaN(f)){
                            f=d
                        }
                    }else{
                        if(c.type=="bool"||c.type=="boolean"){
                            if(f!=null){
                                if(f.toLowerCase()=="false"){
                                    f=false
                                }else{
                                    if(f.toLowerCase()=="true"){
                                        f=true
                                    }
                                }
                            }
                            if(f==1){
                                f=true
                            }else{
                                if(f==0){
                                    f=false
                                }else{
                                    f=""
                                }
                            }
                        }
                    }
                }
            }
            return f
        }
    };

    a.jqx.dataFormat={};

    a.extend(a.jqx.dataFormat,{
        regexTrim:/^\s+|\s+$/g,
        regexInfinity:/^[+-]?infinity$/i,
        regexHex:/^0x[a-f0-9]+$/i,
        regexParseFloat:/^[+-]?\d*\.?\d*(e[+-]?\d+)?$/,
        toString:Object.prototype.toString,
        isBoolean:function(b){
            return typeof b==="boolean"
        },
        isObject:function(b){
            return(b&&(typeof b==="object"||a.isFunction(b)))||false
        },
        isDate:function(b){
            return b instanceof Date
        },
        arrayIndexOf:function(e,d){
            if(e.indexOf){
                return e.indexOf(d)
            }
            for(var b=0,c=e.length;b<c;b++){
                if(e[b]===d){
                    return b
                }
            }
            return -1
        },
        isString:function(b){
            return typeof b==="string"
        },
        isNumber:function(b){
            return typeof b==="number"&&isFinite(b)
        },
        isNull:function(b){
            return b===null
        },
        isUndefined:function(b){
            return typeof b==="undefined"
        },
        isValue:function(b){
            return(this.isObject(b)||this.isString(b)||this.isNumber(b)||this.isBoolean(b))
        },
        isEmpty:function(b){
            if(!this.isString(b)&&this.isValue(b)){
                return false
            }else{
                if(!this.isValue(b)){
                    return true
                }
            }
            b=a.trim(b).replace(/\&nbsp\;/ig,"").replace(/\&#160\;/ig,"");
            return b===""
        },
        startsWith:function(c,b){
            return c.indexOf(b)===0
        },
        endsWith:function(c,b){
            return c.substr(c.length-b.length)===b
        },
        trim:function(b){
            return(b+"").replace(this.regexTrim,"")
        },
        isArray:function(b){
            return this.toString.call(b)==="[object Array]"
        },
        defaultcalendar:function(){
            var b={
                "/":"/",
                ":":":",
                firstDay:0,
                days:{
                    names:["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"],
                    namesAbbr:["Sun","Mon","Tue","Wed","Thu","Fri","Sat"],
                    namesShort:["Su","Mo","Tu","We","Th","Fr","Sa"]
                },
                months:{
                    names:["January","February","March","April","May","June","July","August","September","October","November","December",""],
                    namesAbbr:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec",""]
                },
                AM:["AM","am","AM"],
                PM:["PM","pm","PM"],
                eras:[{
                    name:"A.D.",
                    start:null,
                    offset:0
                }],
                twoDigitYearMax:2029,
                patterns:{
                    d:"M/d/yyyy",
                    D:"dddd, MMMM dd, yyyy",
                    t:"h:mm tt",
                    T:"h:mm:ss tt",
                    f:"dddd, MMMM dd, yyyy h:mm tt",
                    F:"dddd, MMMM dd, yyyy h:mm:ss tt",
                    M:"MMMM dd",
                    Y:"yyyy MMMM",
                    S:"yyyy\u0027-\u0027MM\u0027-\u0027dd\u0027T\u0027HH\u0027:\u0027mm\u0027:\u0027ss",
                    ISO:"yyyy-MM-dd hh:mm:ss",
                    ISO2:"yyyy-MM-dd HH:mm:ss",
                    d1:"dd.MM.yyyy",
                    d2:"dd-MM-yyyy"
                },
                percentsymbol:"%",
                currencysymbol:"$",
                currencysymbolposition:"before",
                decimalseparator:".",
                thousandsseparator:","
            };
    
            return b
        },
        expandFormat:function(f,e){
            e=e||"F";
            var d,c=f.patterns,b=e.length;
            if(b===1){
                d=c[e];
                if(!d){
                    throw"Invalid date format string '"+e+"'."
                }
                e=d
            }else{
                if(b===2&&e.charAt(0)==="%"){
                    e=e.charAt(1)
                }
            }
            return e
        },
        getEra:function(d,c){
            if(!c){
                return 0
            }
            var g,f=d.getTime();
            for(var e=0,b=c.length;e<b;e++){
                g=c[e].start;
                if(g===null||f>=g){
                    return e
                }
            }
            return 0
        },
        toUpper:function(b){
            return b.split("\u00A0").join(" ").toUpperCase()
        },
        toUpperArray:function(b){
            var e=[];
            for(var d=0,c=b.length;d<c;d++){
                e[d]=this.toUpper(b[d])
            }
            return e
        },
        getEraYear:function(c,e,b,f){
            var d=c.getFullYear();
            if(!f&&e.eras){
                d-=e.eras[b].offset
            }
            return d
        },
        getDayIndex:function(f,e,c){
            var b,g=f.days,d=f._upperDays;
            if(!d){
                f._upperDays=d=[this.toUpperArray(g.names),this.toUpperArray(g.namesAbbr),this.toUpperArray(g.namesShort)]
            }
            e=toUpper(e);
            if(c){
                b=this.arrayIndexOf(d[1],e);
                if(b===-1){
                    b=this.arrayIndexOf(d[2],e)
                }
            }else{
                b=this.arrayIndexOf(d[0],e)
            }
            return b
        },
        getMonthIndex:function(k,h,d){
            var b=k.months,c=k.monthsGenitive||k.months,f=k._upperMonths,g=k._upperMonthsGen;
            if(!f){
                k._upperMonths=f=[this.toUpperArray(b.names),this.toUpperArray(b.namesAbbr)];
                k._upperMonthsGen=g=[this.toUpperArray(c.names),this.toUpperArray(c.namesAbbr)]
            }
            h=this.toUpper(h);
            var e=this.arrayIndexOf(d?f[1]:f[0],h);
            if(e<0){
                e=this.arrayIndexOf(d?g[1]:g[0],h)
            }
            return e
        },
        appendPreOrPostMatch:function(f,b){
            var e=0,h=false;
            for(var g=0,d=f.length;g<d;g++){
                var k=f.charAt(g);
                switch(k){
                    case"'":
                        if(h){
                            b.push("'")
                        }else{
                            e++
                        }
                        h=false;
                        break;
                    case"\\":
                        if(h){
                            b.push("\\")
                        }
                        h=!h;
                        break;
                    default:
                        b.push(k);
                        h=false;
                        break
                }
            }
            return e
        },
        getTokenRegExp:function(){
            return/\/|dddd|ddd|dd|d|MMMM|MMM|MM|M|yyyy|yy|y|hh|h|HH|H|mm|m|ss|s|tt|t|fff|ff|f|zzz|zz|z|gg|g/g
        },
        formatlink:function(b,d){
            var c="";
            if(d&&d.target){
                c="target="+d.target
            }
            if(c!=""){
                return"<a "+c+' href="'+b+'">'+b+"</a>"
            }
            return'<a href="'+b+'">'+b+"</a>"
        },
        formatemail:function(b){
            return'<a href="mailto:'+b+'">'+b+"</a>"
        },
        formatnumber:function(q,p,l){
            if(l==undefined||l==null){
                l=this.defaultcalendar()
            }
            if(!this.isNumber(q)){
                q*=1
            }
            var m;
            if(p.length>1){
                m=parseInt(p.slice(1),10)
            }
            var s={};
    
            var n=p.charAt(0).toUpperCase();
            s.thousandsSeparator=l.thousandsseparator;
            s.decimalSeparator=l.decimalseparator;
            switch(n){
                case"D":case"d":case"F":case"f":
                    s.decimalPlaces=m;
                    break;
                case"N":case"n":
                    s.decimalPlaces=0;
                    break;
                case"C":case"c":
                    s.decimalPlaces=m;
                    if(l.currencysymbolposition=="before"){
                        s.prefix=l.currencysymbol
                    }else{
                        s.suffix=l.currencysymbol
                    }
                    break;
                case"P":case"p":
                    s.suffix=l.percentsymbol;
                    s.decimalPlaces=m;
                    break;
                default:
                    throw"Bad number format specifier: "+n
            }
            if(this.isNumber(q)){
                var f=(q<0);
                var d=q+"";
                var o=(s.decimalSeparator)?s.decimalSeparator:".";
                var b;
                if(this.isNumber(s.decimalPlaces)){
                    var g=s.decimalPlaces;
                    var k=Math.pow(10,g);
                    d=Math.round(q*k)/k+"";
                    b=d.lastIndexOf(".");
                    if(g>0){
                        if(b<0){
                            d+=o;
                            b=d.length-1
                        }else{
                            if(o!=="."){
                                d=d.replace(".",o)
                            }
                        }while((d.length-1-b)<g){
                            d+="0"
                        }
                    }
                }
                if(s.thousandsSeparator){
                    var r=s.thousandsSeparator;
                    b=d.lastIndexOf(o);
                    b=(b>-1)?b:d.length;
                    var e=d.substring(b);
                    var c=-1;
                    for(var h=b;h>0;h--){
                        c++;
                        if((c%3===0)&&(h!==b)&&(!f||(h>1))){
                            e=r+e
                        }
                        e=d.charAt(h-1)+e
                    }
                    d=e
                }
                d=(s.prefix)?s.prefix+d:d;
                d=(s.suffix)?d+s.suffix:d;
                return d
            }else{
                return q
            }
        },
        tryparsedate:function(r,h){
            if(h==undefined||h==null){
                h=this.defaultcalendar()
            }
            var o=this;
            if(r==""){
                return null
            }
            if(r!=null&&r.substring(0,6)=="/Date("){
                var p=/^\/Date\((-?\d+)(\+|-)?(\d+)?\)\/$/;
                var e=new Date(+r.replace(/\/Date\((\d+)\)\//,"$1"));
                if(e=="Invalid Date"){
                    var f=r.match(/^\/Date\((\d+)([-+]\d\d)(\d\d)\)\/$/);
                    var e=null;
                    if(f){
                        e=new Date(1*f[1]+3600000*f[2]+60000*f[3])
                    }
                }
                if(e==null||e=="Invalid Date"){
                    var k=p.exec(r);
                    if(k){
                        var s=new Date(parseInt(k[1]));
                        if(k[2]){
                            var b=parseInt(k[3]);
                            if(k[2]==="-"){
                                b=-b
                            }
                            var n=s.getUTCMinutes();
                            s.setUTCMinutes(n-b)
                        }
                        if(!isNaN(s.valueOf())){
                            return s
                        }
                    }
                }
                return e
            }
            patterns=h.patterns;
            for(prop in patterns){
                e=o.parsedate(r,patterns[prop],h);
                if(e){
                    return e
                }
            }
            if(r!=null){
                var d=null;
                var q=[":","/","-"];
                var l=true;
                for(var c=0;c<q.length;c++){
                    if(r.indexOf(q[c])!=-1){
                        l=false
                    }
                }
                if(l){
                    var g=new Number(r);
                    if(!isNaN(g)){
                        return new Date(g)
                    }
                }
            }
            return null
        },
        getparseregexp:function(b,p){
            var r=b._parseRegExp;
            if(!r){
                b._parseRegExp=r={}
            }else{
                var f=r[p];
                if(f){
                    return f
                }
            }
            var o=this.expandFormat(b,p).replace(/([\^\$\.\*\+\?\|\[\]\(\)\{\}])/g,"\\\\$1"),l=["^"],c=[],k=0,e=0,u=this.getTokenRegExp(),g;
            while((g=u.exec(o))!==null){
                var t=o.slice(k,g.index);
                k=u.lastIndex;
                e+=this.appendPreOrPostMatch(t,l);
                if(e%2){
                    l.push(g[0]);
                    continue
                }
                var d=g[0],h=d.length,q;
                switch(d){
                    case"dddd":case"ddd":case"MMMM":case"MMM":case"gg":case"g":
                        q="(\\D+)";
                        break;
                    case"tt":case"t":
                        q="(\\D*)";
                        break;
                    case"yyyy":case"fff":case"ff":case"f":
                        q="(\\d{"+h+"})";
                        break;
                    case"dd":case"d":case"MM":case"M":case"yy":case"y":case"HH":case"H":case"hh":case"h":case"mm":case"m":case"ss":case"s":
                        q="(\\d\\d?)";
                        break;
                    case"zzz":
                        q="([+-]?\\d\\d?:\\d{2})";
                        break;
                    case"zz":case"z":
                        q="([+-]?\\d\\d?)";
                        break;
                    case"/":
                        q="(\\"+b["/"]+")";
                        break;
                    default:
                        throw"Invalid date format pattern '"+d+"'.";
                        break
                }
                if(q){
                    l.push(q)
                }
                c.push(g[0])
            }
            this.appendPreOrPostMatch(o.slice(k),l);
            l.push("$");
            var s=l.join("").replace(/\s+/g,"\\s+"),n={
                regExp:s,
                groups:c
            };

            return r[p]=n
        },
        outOfRange:function(d,b,c){
            return d<b||d>c
        },
        expandYear:function(g,e){
            var c=new Date(),b=getEra(c);
            if(e<100){
                var d=g.twoDigitYearMax;
                d=typeof d==="string"?new Date().getFullYear()%100+parseInt(d,10):d;
                var f=this.getEraYear(c,g,b);
                e+=f-(f%100);
                if(e>d){
                    e-=100
                }
            }
            return e
        },
        parsedate:function(z,G,u){
            if(u==undefined||u==null){
                u=this.defaultcalendar()
            }
            z=this.trim(z);
            var r=u,L=this.getparseregexp(r,G),k=new RegExp(L.regExp).exec(z);
            if(k===null){
                return null
            }
            var H=L.groups,x=null,p=null,K=null,J=null,q=null,g=0,C,B=0,I=0,b=0,d=null,s=false;
            for(var D=0,F=H.length;D<F;D++){
                var c=k[D+1];
                if(c){
                    var y=H[D],f=y.length,h=parseInt(c,10);
                    switch(y){
                        case"dd":case"d":
                            J=h;
                            if(this.outOfRange(J,1,31)){
                                return null
                            }
                            break;
                        case"MMM":case"MMMM":
                            K=this.getMonthIndex(r,c,f===3);
                            if(this.outOfRange(K,0,11)){
                                return null
                            }
                            break;
                        case"M":case"MM":
                            K=h-1;
                            if(this.outOfRange(K,0,11)){
                                return null
                            }
                            break;
                        case"y":case"yy":case"yyyy":
                            p=f<4?this.expandYear(r,h):h;
                            if(this.outOfRange(p,0,9999)){
                                return null
                            }
                            break;
                        case"h":case"hh":
                            g=h;
                            if(g===12){
                                g=0
                            }
                            if(this.outOfRange(g,0,11)){
                                return null
                            }
                            break;
                        case"H":case"HH":
                            g=h;
                            if(this.outOfRange(g,0,23)){
                                return null
                            }
                            break;
                        case"m":case"mm":
                            B=h;
                            if(this.outOfRange(B,0,59)){
                                return null
                            }
                            break;
                        case"s":case"ss":
                            I=h;
                            if(this.outOfRange(I,0,59)){
                                return null
                            }
                            break;
                        case"tt":case"t":
                            s=r.PM&&(c===r.PM[0]||c===r.PM[1]||c===r.PM[2]);
                            if(!s&&(!r.AM||(c!==r.AM[0]&&c!==r.AM[1]&&c!==r.AM[2]))){
                                return null
                            }
                            break;
                        case"f":case"ff":case"fff":
                            b=h*Math.pow(10,3-f);
                            if(this.outOfRange(b,0,999)){
                                return null
                            }
                            break;
                        case"ddd":case"dddd":
                            q=this.getDayIndex(r,c,f===3);
                            if(this.outOfRange(q,0,6)){
                                return null
                            }
                            break;
                        case"zzz":
                            var e=c.split(/:/);
                            if(e.length!==2){
                                return null
                            }
                            C=parseInt(e[0],10);
                            if(this.outOfRange(C,-12,13)){
                                return null
                            }
                            var n=parseInt(e[1],10);
                            if(this.outOfRange(n,0,59)){
                                return null
                            }
                            d=(C*60)+(startsWith(c,"-")?-n:n);
                            break;
                        case"z":case"zz":
                            C=h;
                            if(this.outOfRange(C,-12,13)){
                                return null
                            }
                            d=C*60;
                            break;
                        case"g":case"gg":
                            var t=c;
                            if(!t||!r.eras){
                                return null
                            }
                            t=trim(t.toLowerCase());
                            for(var E=0,A=r.eras.length;E<A;E++){
                                if(t===r.eras[E].name.toLowerCase()){
                                    x=E;
                                    break
                                }
                            }
                            if(x===null){
                                return null
                            }
                            break
                    }
                }
            }
            var o=new Date(),w,m=r.convert;
            w=o.getFullYear();
            if(p===null){
                p=w
            }else{
                if(r.eras){
                    p+=r.eras[(x||0)].offset
                }
            }
            if(K===null){
                K=0
            }
            if(J===null){
                J=1
            }
            if(m){
                o=m.toGregorian(p,K,J);
                if(o===null){
                    return null
                }
            }else{
                o.setFullYear(p,K,J);
                if(o.getDate()!==J){
                    return null
                }
                if(q!==null&&o.getDay()!==q){
                    return null
                }
            }
            if(s&&g<12){
                g+=12
            }
            o.setHours(g,B,I,b);
            if(d!==null){
                var v=o.getMinutes()-(d+o.getTimezoneOffset());
                o.setHours(o.getHours()+parseInt(v/60,10),v%60)
            }
            return o
        },
        cleardatescache:function(){
            this.datescache=new Array()
        },
        formatdate:function(w,A,r){
            if(r==undefined||r==null){
                r=this.defaultcalendar()
            }
            var e=w.toString()+"_"+A;
            if(this.datescache&&this.datescache[e]){
                return this.datescache[e]
            }
            if(!A||!A.length||A==="i"){
                var C;
                C=this.formatDate(w,r.patterns.F,culture);
                return C
            }
            var x=r.eras,c=A==="s";
            A=this.expandFormat(r,A);
            C=[];
            var h,y=["0","00","000"],n,o,b=/([^d]|^)(d|dd)([^d]|$)/g,B=0,t=this.getTokenRegExp(),d;
            function l(D,G){
                var F,E=D+"";
                if(G>1&&E.length<G){
                    F=(y[G-2]+E);
                    return F.substr(F.length-G,G)
                }else{
                    F=E
                }
                return F
            }
            function z(){
                if(n||o){
                    return n
                }
                n=b.test(A);
                o=true;
                return n
            }
            function f(E,D){
                if(d){
                    return d[D]
                }
                if(E.getMonth!=undefined){
                    switch(D){
                        case 0:
                            return E.getFullYear();
                        case 1:
                            return E.getMonth();
                        case 2:
                            return E.getDate()
                    }
                }
            }
            for(;;){
                var k=t.lastIndex,s=t.exec(A);
                var p=A.slice(k,s?s.index:A.length);
                B+=this.appendPreOrPostMatch(p,C);
                if(!s){
                    break
                }
                if(B%2){
                    C.push(s[0]);
                    continue
                }
                var u=s[0],g=u.length;
                switch(u){
                    case"ddd":case"dddd":
                        var q=(g===3)?r.days.namesAbbr:r.days.names;
                        C.push(q[w.getDay()]);
                        break;
                    case"d":case"dd":
                        n=true;
                        C.push(l(f(w,2),g));
                        break;
                    case"MMM":case"MMMM":
                        var v=f(w,1);
                        C.push(r.months[g===3?"namesAbbr":"names"][v]);
                        break;
                    case"M":case"MM":
                        C.push(l(f(w,1)+1,g));
                        break;
                    case"y":case"yy":case"yyyy":
                        v=this.getEraYear(w,r,this.getEra(w,x),c);
                        if(g<4){
                            v=v%100
                        }
                        C.push(l(v,g));
                        break;
                    case"h":case"hh":
                        h=w.getHours()%12;
                        if(h===0){
                            h=12
                        }
                        C.push(l(h,g));
                        break;
                    case"H":case"HH":
                        C.push(l(w.getHours(),g));
                        break;
                    case"m":case"mm":
                        C.push(l(w.getMinutes(),g));
                        break;
                    case"s":case"ss":
                        C.push(l(w.getSeconds(),g));
                        break;
                    case"t":case"tt":
                        v=w.getHours()<12?(r.AM?r.AM[0]:" "):(r.PM?r.PM[0]:" ");
                        C.push(g===1?v.charAt(0):v);
                        break;
                    case"f":case"ff":case"fff":
                        C.push(l(w.getMilliseconds(),3).substr(0,g));
                        break;
                    case"z":case"zz":
                        h=w.getTimezoneOffset()/60;
                        C.push((h<=0?"+":"-")+l(Math.floor(Math.abs(h)),g));
                        break;
                    case"zzz":
                        h=w.getTimezoneOffset()/60;
                        C.push((h<=0?"+":"-")+l(Math.floor(Math.abs(h)),2)+":"+l(Math.abs(w.getTimezoneOffset()%60),2));
                        break;
                    case"g":case"gg":
                        if(r.eras){
                            C.push(r.eras[getEra(w,x)].name)
                        }
                        break;
                    case"/":
                        C.push(r["/"]);
                        break;
                    default:
                        throw"Invalid date format pattern '"+u+"'.";
                        break
                }
            }
            var m=C.join("");
            if(!this.datescache){
                this.datescache=new Array()
            }
            this.datescache[e]=m;
            return m
        }
    })
})(jQuery);