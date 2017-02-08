/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
     var basepath = $("#basepath").val();
     //dateofentry
     $('#dateofentry').datepicker({
            autoclose: true,
			todayHighlight: true,
            format: 'dd-mm-yyyy',
			forceParse: false
		});
   
    $("#imgInp").change(function(){
        readURL(this);
    });
    
    $("#weight").blur(function(){
        getBodyfatPercentage();
    });
    $("#Waist").blur(function(){
        getBodyfatPercentage();
    });
    $("#hip").blur(function(){
        getBodyfatPercentage();
    });
    $("#getvalue").click(function(){
        
        getBodyfatPercentage();
    });
    
    $('.decimal').keypress(function (event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) &&
                ((event.which < 48 || event.which > 57) &&
                        (event.which != 0 && event.which != 8))) {
            event.preventDefault();
        }

        var text = $(this).val();

        if ((text.indexOf('.') != -1) &&
                (text.substring(text.indexOf('.')).length > 4) &&
                (event.which != 0 && event.which != 8) &&
                ($(this)[0].selectionStart >= text.length - 4)) {
            event.preventDefault();
        }
    });
    
    $(document).on('click', '#errorclose', function () {
        $("#msgdiv").hide();
    });
     $(document).on('click', '#successclose', function () {
        $("#msgdivsuccess").hide();
    });
    
    $("#frmbodycmp").on("submit", function(event) {
         event.preventDefault();
        // var frdata = $(this).serialize();
        // var img=$('#imgInp').val();     
        //var form = $('#frmbodycmp')[0];
          // var formData = new FormData(form);
          var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: basepath + 'portfolio/updateMemberBodyComposition',
            dataType: "json",
            processData: false,
            contentType: false,// "application/x-www-form-urlencoded; charset=UTF-8",
            data:formData ,
            success: function (result) {
                if (result.msg_code == 0) {
                    $("#msgdivsuccess").hide();
                    $("#msgdiv").show();
                    $("#msgText").html(result.msg_data);
                    

                } else if(result.msg_code == 2) {
                    $("#msgdivsuccess").hide();
                    $("#msgdiv").show();
                    $("#msgText").html(result.msg_data);
                }else if(result.msg_code == 1){
                    $("#msgdiv").hide();
                    $("#msgdivsuccess").show();
                    $("#successmsgText").html(result.msg_data);
                    $('#frmbodycmp')[0].reset();
                     $('#imgpreview').attr('src', basepath+'application/assets/images/portfolioimages/No_Image_Available.png');
                } else if(result.msg_code==500){
                    window.location.href = basepath + 'memberlogin';
                }
            }, error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            }
        });
       });
    
    
    
    
    
    
});//main

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgpreview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function getBodyfatPercentage(){
    //console.log("here i am");
    var basepath = $("#basepath").val();
    var weight = $("#weight").val()||"";
    var waist = $("#Waist").val()||"";
    var hip = $("#hip").val()||"";
    var bodyfat="";
    if(bfvalidate()){
        
        $.ajax({
            type: "POST",
            url: basepath + 'portfolio/getBodyFatPercentage',
            dataType: "json",
            contentType: "application/x-www-form-urlencoded; charset=UTF-8",
            data: {weight: weight, waist: waist,hip:hip},
            success: function (result) {
                if (result.msg_code == 1) {
                    $("#bodyfat").val(result.msg_data.bodyFatPercentage);
                    $("#bodyfatmass").val(result.msg_data.bodyFatMass);
                    $("#bodyleanmass").val(result.msg_data.bodyLeanMass);
                    $("#waistcrmfrnc").val(result.msg_data.waistcurcumferenceassesment);
                    $("#waistcrmfrncvalue").val(result.msg_data.waistcurcumferencevalue);
                    $("#waisthipratio").val(result.msg_data.waistHipRatioAssessment);
                    $("#waisthipratiovalue").val(result.msg_data.waistHipRatioValue);
                    
                }else if(result.msg_code == 2){
                    $("#bodyfat").val(result.msg_data.bodyFatPercentage);
                    $("#bodyfatmass").val(result.msg_data.bodyFatMass);
                    $("#bodyleanmass").val(result.msg_data.bodyLeanMass);
                    $("#waistcrmfrnc").val(result.msg_data.waistcurcumferenceassesment);
                    $("#waistcrmfrncvalue").val(result.msg_data.waistcurcumferencevalue);
                    $("#waisthipratio").val(result.msg_data.waistHipRatioAssessment);
                    $("#waisthipratiovalue").val(result.msg_data.waistHipRatioValue);
                    
                }else if(result.msg_code==500){
                     window.location.href = basepath + 'memberlogin';
                }
            }, error: function (jqXHR, exception) {
                var msg = '';
                if (jqXHR.status === 0) {
                    msg = 'Not connect.\n Verify Network.';
                } else if (jqXHR.status == 404) {
                    msg = 'Requested page not found. [404]';
                } else if (jqXHR.status == 500) {
                    msg = 'Internal Server Error [500].';
                } else if (exception === 'parsererror') {
                    msg = 'Requested JSON parse failed.';
                } else if (exception === 'timeout') {
                    msg = 'Time out error.';
                } else if (exception === 'abort') {
                    msg = 'Ajax request aborted.';
                } else {
                    msg = 'Uncaught Error.\n' + jqXHR.responseText;
                }
                alert(msg);
            }
        });
        
    }else{
        return bodyfat;
    }
}

function bfvalidate(){
    var weight = $("#weight").val()||"";
    var waist = $("#Waist").val()||"";
    var hip = $("#hip").val()||"";
    if(weight==""){return false;}
    if(waist==""){return false;}
    if(hip==""){return false;}
    
    return true;
    
}
