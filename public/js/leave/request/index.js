$boxtypeLeave = $('#dirh-box-leaveType');
$spinner = $('.spinner-border');

$.ajax({
    url: '/api/v1/types/',
}).done(function (data){

    $spinner.remove();

    data.leaveTypes.map(function(item){ 

        $boxtypeLeave.append('<div class="col-6 mt-3"><div class="dirh-input-custom-box dirh-input-custom-box-disabled" id="dirh-input-custom-box-1">'+
        '<input class="dirh-input-custom dirh-input-custom-radio dirh-input-custom-radio-disabled" id="dirh-input-custom-radio-1" type="radio" value="'+item.id+'" name="leave_type_id">'+
           '<div class="dirh-input-custom dirh-input-custom-description"> <span style="font-weight: bold" id="dirh-input-custom-title-1">'+item.name+'<span class="dirh-input-custom-title-counter" id="dirh-input-custom-title-counter-1">(0/0)</span></span><br>'+item.description+'</div>'+
        '</div></div>').show('slow'); 

    });
  
});

$(".user_id").change(function(){

    user_id = this.value;

    $boxtypeLeaveInput = $(".dirh-input-custom-box")  
    
    $(".dirh-input-custom-radio").removeAttr("checked") 
    $boxtypeLeaveInput.removeClass("dirh-input-custom-radio-active")  
    $boxtypeLeaveInput.addClass("dirh-input-custom-box-disabled")  
    
    $(".dirh-input-custom-title-counter").text("(0/0)")

    $.ajax({
        url : "avalableLeaveTypesByUser/"+user_id,
    }).done(function(data){ 
        
        if(data.leaveTypes.length > 0){ 

            data.leaveTypes.map(function(item , index){ 

                $("#dirh-input-custom-box-"+item.id).removeClass("dirh-input-custom-box-disabled")

                $("#dirh-input-custom-title-counter-"+item.id).text("("+item.total+"/"+item.remaining+")")

            });

        }else{

        toastr.warning('No leabe type for this user') 

        } 
       
    }).fail(function(){
        toastr.error('Serveur error') 
    });

});

$(document).on('click','.dirh-input-custom-box',function(){ 

    $radioInput = this.closest('.dirh-input-custom-radio') 
    $thisElement = this  

    id =  $thisElement.getAttribute('id')
    className =  $thisElement.getAttribute('class') 
 

    if(className.split(' ').indexOf("dirh-input-custom-box-disabled") === 1) 
    { 
        return ;
    }

    idRadioInput = $("#"+id).children(".dirh-input-custom-radio").attr('id')    

    $(".dirh-input-custom-radio").removeAttr("checked") 
    $("#"+idRadioInput).attr("checked","checked")  

   $(".dirh-input-custom-box").removeClass("dirh-input-custom-radio-active")  

   $("#"+id).addClass("dirh-input-custom-radio-active")  
   

});