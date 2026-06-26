document.addEventListener('DOMContentLoaded',function(){
 document.querySelectorAll('[data-confirm]').forEach(function(el){el.addEventListener('click',function(e){if(!confirm(el.getAttribute('data-confirm'))){e.preventDefault();}});});
 function bindLookup(inputId, hiddenId, typeHiddenId){
   var input=document.getElementById(inputId), hidden=document.getElementById(hiddenId), typeHidden=typeHiddenId?document.getElementById(typeHiddenId):null;
   if(!input||!hidden) return;
   function resolve(){
     var v=input.value.trim(); hidden.value=''; if(typeHidden) typeHidden.value='';
     var opts=document.querySelectorAll('option[value="'+CSS.escape(v)+'"]');
     if(opts.length && opts[0].dataset.id){ hidden.value=opts[0].dataset.id; if(typeHidden) typeHidden.value=opts[0].dataset.type || ''; }
   }
   input.addEventListener('input',resolve); input.addEventListener('change',resolve); resolve();
 }
 bindLookup('member_lookup','member_id');
 bindLookup('item_lookup','item_id','item_type');
});
