$(document).ready(function() {
    
    // MOBILE MENU
    $('.page-container').on('click', '.mobile-menu', function(e) {
        e.preventDefault();
        $('.page-container').toggleClass('toggled');
    });
    
    
    // SHOW USER MODAL
    $('.page-container').on('click', '.show-user-modal', function(e) {
        e.preventDefault();
        
        var user_id = $(this).data('id');
        
        $.ajax({
            type: 'post',
            url: 'modals/user-modal.php',
            data: {
                'user_id': user_id
            },
            success: function(response) {
                $('#ajax-modal').html(response).modal('show');
            }
        });
    });
    
    // AJAX MODAL
    $('#ajax-modal').on('hidden.bs.modal', function(e){
        $(this).empty();
    });

    //POPOVERS
    $('[data-toggle="popover"]').popover();

    $("[data-toggle=ajax-popover]").popover( {
        html : true,
        placement: 'top',
        content: function() {
            var content = $(this).attr("data-popover-content");
            return $(content).html();
        }
    });

    // TOOLTIPS
    $('[data-toggle="tooltip"]').tooltip();

    // CHOSEN SELECT
    $('.chosen-select').chosen({
        disable_search_threshold: 5
    });

    // FORM VALIDATION
    $('.validate').formValidation({
        //container: 'tooltip',
        trigger: 'blur',
        feedbackIcons: {
            valid:'fa fa-check',
            invalid:'fa fa-warning',
            validating:'fa fa-spinner'
        }
    }).on('success.field.fv',function(e, data){
        var $parent = data.element.parents('.form-group');
        $parent.removeClass('has-sucess');
        data.element.data('fv.icon').hide();
    });

    // VALIDATE AND SUBMIT
    $('.validate-and-submit').formValidation({
        container:'tooltip',
        feedbackIcons:{
            valid:'fa fa-check',
            invalid: 'fa fa-warning',
            validating:'fa fa-spinner'
        }
    }).on('success.field.fv',function(e,data){
        var $parent =data.element.parents('.form-group');
        $parent.removeClass('has-success');
        data.element.data('fv.icon').hide();
    }).on('success.form.fv',function(e) {
        e.preventDefault();
        var $form = $(e.target);

        $form.ajaxSubmit({
            url:$form.attr('action'),
            dataType:'json',
            success: function(response,statusText, xhr, $form){
                alert("success");
            }
        });
    });

    // DATE PICKER
    $('.date-picker').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: true,
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-angle-up',
            down: 'fa fa-angle-down',
            previous:'fa fa-angle-double-left',
            next: 'fa fa-angle-double-right',
            today: 'fa fa-calendar-times-o',
            clear: 'fa fa-trash',
            close: 'fa fa-times'
        }
    });

    // CONFIRM SINGLE DELETE
    $('.page-container').on('click', '.confirm-user-delete', function (e) {
        e.preventDefault();

        var id = $(this).data('id');

        bootbox.dialog({
            closeButton: false,
            message: 'Are you sure you want to delete this user ?',
            title: 'Action confirmation',
            buttons:{
                danger: {
                    label: 'Cancel',
                    className: 'btn-cancel'
                },
                success: {
                    label: 'Continue',
                    className: 'btn-continue',
                    callback: function(){
                        $.ajax({
                            type:'post',
                            url:'delete-user.php',
                            data:{
                                'id':id
                            },
                            dataType:'json',
                            success: function(response){
                                    //
                            }
                        });
                    }
                }
            }
        });
    })
});