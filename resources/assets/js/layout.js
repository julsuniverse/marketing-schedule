var base_url = $('#base-url').data('url');
$(function() {
    // Remove button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="remove"]',
        function (e) {
            var result = confirm('Do you really want to remove?');
            if(result == true){
                e.preventDefault();
                $(this).closest('.form-inline').remove();

                var dynamic = $('.dynamic-fields').find('.form-inline').length;
                if (dynamic == '1') {
                    $('#social-form-hide').fadeIn();
                } else if (dynamic == '0') {
                    $('#social-form-hide').fadeIn();
                }
            }else{
                return false;
            }
        }
    );
    // Add button click
    $(document).on(
        'click',
        '[data-role="dynamic-fields"] > .form-inline [data-role="add"]',
        function(e) {
            e.preventDefault();
            var container = $(this).closest('[data-role="dynamic-fields"]');
            new_field_group = container.children().filter('.form-inline:first-child').clone();
            new_field_group.find('input').each(function(){
                $(this).val('');
            });
            container.append(new_field_group);
            if(($('.dynamic-fields').find('.form-inline').length) == '0'){
                $('#social-form-hide').fadeIn();
                //  $('#social-form-hide').fadeOut();
            }
        }
    );
});

$(document).ready(function() {
    // datatables
    $('#dataTables').DataTable({
        responsive: true
    });

    // validator
    $( "#validate" ).validate({ });

    // reset or change password validator
    $('#validatedForm').validate({
        rules: {
            newuserpassword: {
                required: true
            },
            renewuserpassword: {
                required: true,
                equalTo: "#newuserpassword"
            }
        }
    });

    // tooltip
    $("body").tooltip({ selector: '[data-toggle=tooltip]' });

    // show hide text sms boxes
    $("#first_text_box").show(); // default text 1
    $("#submit-button-message").show(); // default
    $("input#first_text").click(function(){
        if($(this).is(":checked")){
            $("#first_text_box").show();
            $("#submit-button-message").show();
            $("#second_text_box").hide();
            $("#third_text_box").hide();
        }
    });

    $("input#second_text").click(function(){
        if($(this).is(":checked")){
            $("#second_text_box").show();
            $("#submit-button-message").show();
            $("#first_text_box").hide();
            $("#third_text_box").hide();
        }
    });

    $("input#third_text").click(function(){
        if($(this).is(":checked")){
            $("#third_text_box").show();
            $("#submit-button-message").show();
            $("#first_text_box").hide();
            $("#second_text_box").hide();
        }
    });

    // select urls
    $("input[name='url']").click(function(){
        if($(this).is(":checked")){
            var populate = $('input[name="url"]:checked').val();
            $("#populate").html('<span class="heighlight">Selected URL:</span> '+populate);
        }
    });
});

function goBack() {
    window.history.back();
}

// --------------------

// contact form validator
$(function() {
    $("#request_custom_message").validate({
        // validation rules
        rules: {
            type: "required",
            dropdown: "required",
            value: "required"
        },
        // submit
        submitHandler:function() {
            $("#request_custom_message").fadeIn(),
                $.post(base_url+"custom-message-request.php",
                    $("#request_custom_message").serialize(),
                    function(data){
                        //alert(data);
                        if (data == 'Sent') {
                            //alert(data);
                            $("#processing").fadeOut();
                            $("#request-sent").fadeIn();
                            $("#request_custom_message")[0].reset();
                            $("#request-sent").fadeOut(8000);
                        }
                        else{
                            //alert(data);
                            // $("#request_custom_message").fadeOut();
                            $("#request-not-sent").fadeIn();
                            $("#request-not-sent").fadeOut(8000);
                        }
                    });
            return false;
        }
    });
});

$(function() {
    $("#request_custom_email").validate({
        // validation rules
        rules: {
            type: "required",
            dropdown: "required",
            value: "required"
        },
        // submit
        submitHandler:function() {
            $("#request_custom_email").fadeIn(),
                $.post(base_url+"custom-message-request.php",
                    $("#request_custom_email").serialize(),
                    function(data){
                        //alert(data);
                        if (data == 'Sent') {
                            //alert(data);
                            $("#processing").fadeOut();
                            $("#request-sent-email").fadeIn();
                            $("#request_custom_email")[0].reset();
                            $("#request-sent-email").fadeOut(8000);
                        }
                        else{
                            //alert(data);
                            // $("#request_custom_email").fadeOut();
                            $("#request-not-sent-email").fadeIn();
                            $("#request-not-sent-email").fadeOut(8000);
                        }
                    });
            return false;
        }
    });
});

// upgrade / downgrade level
$(function() {
    $("#change_user_level").validate({
        // validation rules
        rules: {
            levels_id: "required",
            company_id: "required"
        },
        // submit
        submitHandler:function() {
            $("#change_user_level").fadeIn(),
                $.post(base_url+"jquery-ajax.php?action=change_level",
                    $("#change_user_level").serialize(),
                    function(data){
                        // alert(data);
                        if (data == 'true') {
                            $("#processing").fadeOut();
                            $("#success_change_level").fadeIn();
                            $("#success_change_level").fadeOut(8000);
                        }
                        else{
                            // $("#request_custom_message").fadeOut();
                            $("#error_change_level").fadeIn();
                            $("#error_change_level").fadeOut(8000);
                        }
                    });
            return false;
        }
    });
});


// ---------------------

$(document).ready(function(){
    $("#collapse1").on("hide.bs.collapse", function(){
        $("#toggle_import").html('Import CSV File Instructions <i class="fa fa-caret-down pull-right"></i> ');
    });
    $("#collapse1").on("show.bs.collapse", function(){
        $("#toggle_import").html('Import CSV File Instructions <i class="fa fa-caret-up pull-right"></i> ');
    });


    $("#collapse2").on("hide.bs.collapse", function(){
        $("#toggle_import").html('My Custom Messages <i class="fa fa-caret-down pull-right"></i> ');
    });
    $("#collapse2").on("show.bs.collapse", function(){
        $("#toggle_import").html('My Custom Messages <i class="fa fa-caret-up pull-right"></i> ');
    });


    $("#test_smtp").click(function(){
        var smtp_host = $('#smtp_host').val();
        var smtp_user = $('#smtp_user').val();
        var smtp_unsecure = $('#smtp_password').val();
        var smtp_password = $.base64.encode(smtp_unsecure);
        var smtp_port = $('#smtp_port').val();
        var smtp_secure = $('#smtp_secure').val();

        window.open(base_url+'smtp-test.php?h='+smtp_host+'&u='+smtp_user+'&p='+smtp_password+'&po='+smtp_port+'&s='+smtp_secure, '_blank');
    });

});

// -----------------------

// set marketing status
function marketing_status(id,type) {
    var company = id;
    var type = type;
    var selector = "#marketing_btn_"+company;
    $.ajax({
        type: 'post',
        data: 'action=marketing&company=' + company + '&type='+type,
        url: 'jquery-ajax.php',
        success: function (html) {
            if (html) {
                if(type == 'on'){
                    $(selector).removeClass('btn-warning').addClass('btn-primary').text('ON').attr("onClick","marketing_status(`"+company+"`,`off`)");
                }else if(type == 'off'){
                    $(selector).removeClass('btn-primary').addClass('btn-warning').text('OFF').attr("onClick","marketing_status(`"+company+"`,`on`)");
                }
            }
            else if (html == 'false') {
                $('#policy_error').html("<div class='text-success'><i class='fa fa-check'></i> Available</div>");
            }
        },
        beforeSend: function () {
            // please wait
        }
    });
}

// clean phone
function clear_phone(id,com) {
    var csv = id;
    var com = com;
    var selector = ".no_phone_"+csv;
    console.log(csv+' '+com);
    $.ajax({
        type: 'post',
        data: 'action=clear_phone&csv=' + csv + '&com='+com,
        url: 'jquery-ajax.php',
        success: function (html) {
            if (html) {
                $(selector).hide();
            }
        },
        beforeSend: function () {
            // please wait
        }
    });
}

// select office phone and email
function fetch_phone_email(phone, email) {
    $('#fetch_office_phone').html(phone); $('#add_office_phone').val(phone);
    $('#fetch_office_email').html(email); $('#add_office_email').val(email);
}
// additional URLs
$("input#additional_links").change(function(){
    if($(this).is(':checked')){
        $('#is_additional_links').show();
        $('#additional_url_wrapper').show();
    }
    else if($(this).is(':unchecked')){
        $('#is_additional_links').hide();
        $('#additional_url_wrapper').hide();
    }
});

// social profile id , office id, company id
function additional_urls(type, soc_id, off_id, com_id){
    var type = type;
    var soc_id = soc_id;
    var off_id = off_id;
    var com_id = com_id;

    $('#select_above').hide();

    if(type == 'Google_Places'){
        $('#additional_urls_data').html('');
        //////////////////
        $.ajax({
            type: 'post',
            data: 'action=additional_urls&com_id=' + com_id + '&type='+type + '&soc_id=' + soc_id + '&off_id=' + off_id,
            url: 'jquery-ajax.php',
            success: function (html) {
                $('#additional_urls_data').html(html);
            },
            beforeSend: function () {
                // please wait
                $('#additional_urls_data').html('<p style="margin: 0;background: #fff;padding: 10px;"><img src="images/loading.gif" width="15" height="15"> Fetching social site URLs. Please wait</p>');
            }
        });
        //////////////////
    }else if(type == 'Not_Google_Places'){
        $('#additional_urls_data').html('');
        //////////////////
        $.ajax({
            type: 'post',
            data: 'action=additional_urls&com_id=' + com_id + '&type='+type + '&soc_id=' + soc_id + '&off_id=' + off_id,
            url: 'jquery-ajax.php',
            success: function (html) {
                $('#additional_urls_data').html(html);
            },
            beforeSend: function () {
                // please wait
                $('#additional_urls_data').html('<p style="margin: 0;background: #fff;padding: 10px;"><img src="images/loading.gif" width="15" height="15"> Fetching Google URLs. Please wait</p>');
            }
        });
        //////////////////
    }

}