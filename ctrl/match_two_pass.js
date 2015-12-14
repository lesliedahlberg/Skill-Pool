$('form').on('submit',function(){
   var execsubmit = true;
   var passerror = "";

   if($('#old').val()!=$('#matchold').val()){
       passerror = 'Password must match';
       execsubmit = false;
   }
   if(!execsubmit)
   {
     $('#head_message').html(passerror);
     $('#body').css("background-color", '#ff4d4d');
     return execsubmit;
   }
   return execsubmit;
});
