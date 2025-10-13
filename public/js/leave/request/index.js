$boxtypeLeave = $('#dirh-box-leaveType');
$spinner = $('.spinner-border');

$.ajax({
    url: '/api/v1/types/',
}).done(function (data){

    $spinner.remove();

    data.leaveTypes.map(function(item){ 

        $boxtypeLeave.append(
            '<label class="relative cursor-not-allowed opacity-50 dirh-input-custom-box" id="dirh-input-custom-box-'+item.id+'" data-disabled="true">'+
                '<input type="radio" name="leave_type_id" value="'+item.id+'" id="dirh-input-custom-radio-'+item.id+'" class="peer sr-only dirh-input-custom-radio" disabled>'+
                '<div class="p-4 border-2 border-gray-200 bg-gray-50 rounded-lg transition-all peer-checked:border-blue-500 peer-checked:bg-blue-50">'+
                    '<div class="flex items-start justify-between mb-2">'+
                        '<h4 class="font-semibold text-gray-900" id="dirh-input-custom-title-'+item.id+'">'+item.name+'</h4>'+
                        '<div class="flex items-center gap-1 text-xs dirh-input-custom-title-counter" id="dirh-input-custom-title-counter-'+item.id+'">'+
                            '<span class="px-2 py-1 bg-gray-200 text-gray-500 rounded font-medium">0</span>'+
                            '<span class="text-gray-400">/</span>'+
                            '<span class="px-2 py-1 bg-gray-200 text-gray-500 rounded font-medium">0</span>'+
                        '</div>'+
                    '</div>'+
                    '<p class="text-sm text-gray-600">'+item.description+'</p>'+
                    '<p class="text-xs text-red-500 mt-2 hidden dirh-insufficient-balance">Solde insuffisant</p>'+
                '</div>'+
            '</label>'
        ).show('slow'); 

    });
  
});

$(".user_id").change(function(){

    user_id = this.value;

    $boxtypeLeaveInput = $(".dirh-input-custom-box")  
    
    // Réinitialiser tous les types de congé
    $(".dirh-input-custom-radio").prop("checked", false).prop("disabled", true);
    $boxtypeLeaveInput.removeClass("cursor-pointer opacity-100").addClass("cursor-not-allowed opacity-50").attr("data-disabled", "true");
    $boxtypeLeaveInput.find("div").first().removeClass("border-blue-500 bg-blue-50").addClass("border-gray-200 bg-gray-50");
    
    // Réinitialiser les compteurs
    $(".dirh-input-custom-title-counter").html(
        '<span class="px-2 py-1 bg-gray-200 text-gray-500 rounded font-medium">0</span>'+
        '<span class="text-gray-400">/</span>'+
        '<span class="px-2 py-1 bg-gray-200 text-gray-500 rounded font-medium">0</span>'
    );

    $.ajax({
        url : "avalableLeaveTypesByUser/"+user_id,
    }).done(function(data){ 
      
        if(data.leaveTypes.length > 0){ 

            data.leaveTypes.map(function(item , index){ 

                var $box = $("#dirh-input-custom-box-"+item.id);
                var $radio = $("#dirh-input-custom-radio-"+item.id);
                var $counter = $("#dirh-input-custom-title-counter-"+item.id);
                
                // Activer le type de congé
                $box.removeClass("cursor-not-allowed opacity-50").addClass("cursor-pointer opacity-100").attr("data-disabled", "false");
                $box.find("div").first().removeClass("border-gray-200 bg-gray-50").addClass("border-gray-300");
                $radio.prop("disabled", false);
                
                // Afficher le solde
                $counter.html(
                    '<span class="px-2 py-1 bg-green-100 text-green-700 rounded font-medium">'+item.total+'</span>'+
                    '<span class="text-gray-400">/</span>'+
                    '<span class="px-2 py-1 bg-blue-100 text-blue-700 rounded font-medium">'+item.remaining+'</span>'
                );

            });

        }else{

        toastr.warning('Aucun type de congé disponible pour cet utilisateur') 

        } 
       
    }).fail(function(){
        toastr.error('Erreur serveur') 
    });

});

$(document).on('click','.dirh-input-custom-box',function(){ 

    var $thisElement = $(this);
    var isDisabled = $thisElement.attr('data-disabled') === 'true';
    
    // Ne rien faire si le type de congé est désactivé
    if(isDisabled) { 
        return;
    }

    var id = $thisElement.attr('id');
    var $radio = $("#"+id).find(".dirh-input-custom-radio");
    
    // Décocher tous les radios et retirer les styles actifs
    $(".dirh-input-custom-radio").prop("checked", false);
    $(".dirh-input-custom-box").find("div").first().removeClass("border-blue-500 bg-blue-50");
    
    // Cocher le radio sélectionné et appliquer les styles actifs
    $radio.prop("checked", true);
    $thisElement.find("div").first().removeClass("border-gray-300").addClass("border-blue-500 bg-blue-50");

});