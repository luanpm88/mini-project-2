var tdbFiltersList={};
(function(){tdbFiltersList={items:[],init:function(){tdbFiltersList.items=[]},item:function(){this.jqueryObj=this.blockUid=void 0;this.sampleData=!1;this.closeIcon="";this._is_initialized=this.inComposer=!1},_initialize_item:function(a){!0!==a._is_initialized&&!0!==a.inComposer&&!0!==a.sampleData&&(a.jqueryObj.on("click",".remove",function(b){b.preventDefault();b.stopPropagation();b=jQuery(this).parent().data("tax");var a=jQuery(this).parent().data("term-slug").toString();jQuery(this).parents("li").hide();jQuery(document).trigger("tdb_filters_remove_filter",
{tax:b,term:a});var d=tdbFiltersList.removeQueryParam(window.location.href,"tdb-loop-page");window.location.href=tdbFiltersList.updateQuery(d,b,a)}),window.onpopstate=function(a){null!==a.state&&window.location.reload()},a._is_initialized=!0)},addItem:function(a){if("undefined"===typeof a.blockUid)throw"item.blockUid is not defined";tdbFiltersList.items.push(a);tdbFiltersList._initialize_item(a)},deleteItem:function(a){for(var b=0;b<tdbFiltersList.items.length;b++)if(tdbFiltersList.items[b].blockUid===
a)return tdbFiltersList.items.splice(b,1),!0;return!1},updateQuery:function(a,b,e){var d=new RegExp("([?&])"+b+"=.*?(&|$)","i"),c=(new URLSearchParams(window.location.search)).get(b),f="";if(-1!==c.indexOf(",")){c=c.split(",");for(var g=0;g<c.length;g++)c[g]!==e&&(f+=c[g]+",");f=f.replace(/,\s*$/,"");return a.replace(d,"$1"+b+"="+f+"$2")}return a.replace(d,"$1").replace(/[&|?]\s*$/,"")},removeQueryParam:function(a,b){return a.replace(new RegExp("([?&])"+b+"=.*?(&|$)","i"),"$1").replace(/[&|?]\s*$/,
"")},getItemIndex:function(a){var b=0,e=0;jQuery.each(tdbFiltersList.items,function(d,c){if(c.blockUid===a)return e=b,!1;b++});return e},getItemObjById:function(a){return tdbFiltersList.items[tdbFiltersList.getItemIndex(a)]}}})();jQuery().ready(function(){tdbFiltersList.init()});