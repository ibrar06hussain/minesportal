$(document).ready(function(){
    // var current_fs, next_fs, previous_fs; //fieldsets
    // var opacity;
    // var current = 1;
    // var steps = $("fieldset").length;

    // setProgressBar(current);

    // $(".next").click(function(){

    // current_fs = $(this).parent();
    // next_fs = $(this).parent().next();
    

    // //Add Class Active
    // $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    // //show the next fieldset
    // next_fs.show();
    // //hide the current fieldset with style
    // current_fs.animate({opacity: 0}, {
    // step: function(now) {
    // // for making fielset appear animation
    // opacity = 1 - now;

    // current_fs.css({
    // 'display': 'none',
    // 'position': 'relative'
    // });
    // next_fs.css({'opacity': opacity});
    // },
    // duration: 500
    // });
    // setProgressBar(++current);
    // });

    // $(".previous").click(function(){

    // current_fs = $(this).parent();
    // previous_fs = $(this).parent().prev();

    // //Remove class active
    // $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    // //show the previous fieldset
    // previous_fs.show();

    // //hide the current fieldset with style
    // current_fs.animate({opacity: 0}, {
    // step: function(now) {
    // // for making fielset appear animation
    // opacity = 1 - now;

    // current_fs.css({
    // 'display': 'none',
    // 'position': 'relative'
    // });
    // previous_fs.css({'opacity': opacity});
    // },
    // duration: 500
    // });
    // setProgressBar(--current);
    // });

    // function setProgressBar(curStep){
    // var percent = parseFloat(100 / steps) * curStep;
    // percent = percent.toFixed();
    // $(".progress-bar")
    // .css("width",percent+"%")
    // }

    // $(".submit").click(function(){
    // return false;
    // })

    var current_fs, next_fs, previous_fs; // Fieldsets
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;

    // Function to set progress bar percentage
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar").css("width", percent + "%");
    }

    setProgressBar(current);

    // Function to go to the next step
    function goToNextStep() {
        current_fs = $("fieldset:visible");
        next_fs = current_fs.next();

        // Add Class Active to the next step
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        // Show the next fieldset
        next_fs.show();
        // Hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(++current);
    }

    // Function to go to the previous step
    $(".previous").click(function() {
        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        // Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        // Show the previous fieldset
        previous_fs.show();

        // Hide the current fieldset with style
        current_fs.animate({ opacity: 0 }, {
            step: function(now) {
                opacity = 1 - now;
                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({ 'opacity': opacity });
            },
            duration: 500
        });
        setProgressBar(--current);
    });
    $(".next").click(function(e) {
     //   e.preventDefault();

        let formData = new FormData($('#registrationform')[0]);

        $.ajax({
            url: '/new_application_store', // Your route here
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#app_id').val(response.lastInsertedId);
                    console.log(response.lastInsertedId);
                    goToNextStep();
                }
                
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    // Clear previous errors
                    $('.invalid-feedback').remove();
                    $('.is-invalid').removeClass('is-invalid');

                    // Get the validation errors from the response
                    let errors = xhr.responseJSON.errors;

                    // Loop over each error and display it on the form
                    $.each(errors, function(key, errorMessages) {
                        // Find the form field by name and add error class and message
                        let inputField = $('[name="' + key + '"]');
                        inputField.addClass('is-invalid');
                        inputField.after('<span class="invalid-feedback" role="alert"><strong>' + errorMessages[0] + '</strong></span>');
                    });
                }
            }
        });
    });

    $(".submit").click(function(){
        return false;
    });
    $('#district').on('change', function() {
        var districtId = $(this).val();
        if(districtId) {
            $.ajax({
                url: '/tehsils/' + districtId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#tehsil').empty();
                    $('#tehsil').append('<option value="">Select Tehsil</option>');
                    $.each(data, function(key, value) {
                        $('#tehsil').append('<option value="'+ value.Tehsil +'">'+ value.TehsilName +'</option>');
                    });
                }
            });
        } else {
            $('#tehsil').empty();
            $('#tehsil').append('<option value="">Select Tehsil</option>');
        }
    });
    
});