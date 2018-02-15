$( function() {
// Start Main Function

    // Start Draggable Coupons
    $("#sortablelist tr").draggable();
    var sourceElement;
    $(".connectedSortable tr:not(.ui-state-disabled)").draggable({
        helper: 'clone',
        revert: 'invalid',
        start: function (event, ui) {
            $(this).css('opacity', '.5');
            //NEW
            sourceElement = $(this).closest('table').attr('data-id');
        },
        stop: function (event, ui) {
            $(this).css('opacity', '1');
        }
    });

    //Droppable Container with database update via ajax
    $(".project.connectedSortable").droppable({
        drop: function (event, ui) {
            $(ui.draggable).appendTo(this);
            alert($(ui.draggable).text() + ' will be added' + ' to ' + $(this).attr('data-project') + '.');
            $(ui.draggable).val($(this).attr('data-id'));   
            $("#coupon-form form").append('<input id="id" class="couponid" type="hidden" name="id" value="'+$('.project .ui-draggable td').attr('data-coupon-id')+'"><input class="projectid" type="hidden" id="project_id" name="project_id" value="'+$(this).attr('data-project-id')+'">'); 

            var url = "/coupons/"+$(ui.draggable).attr('data-coupon-id');
            var formData = {
                couponid: $(ui.draggable).attr('data-coupon-id'), 
                projectid: $('.projectid').val(),
            }

                  console.log(formData);    

            $.ajax({
            type: "POST",
            url: url,
             beforeSend: function (xhr) {
            var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
            },
            data: {'id' : $(ui.draggable).attr('data-coupon-id'), 'project_id' :  $('.projectid').val()},
            success: function( data ) {
                 $('#coupon-form form .couponid').remove();
                 $('#coupon-form form .projectid').remove();
                 return data;
                }

            });
            return false;
        }

    });
    // End Draggable Coupons

    // Start Followed Project

    $(".follow").click(function(){
        var formData = {
                memberid:  $('.memberid').val(), 
                projectid: $('.projectid').val(),
            }
                  console.log(formData); 

        var data = "<button class='join unfollow' type='submit'>Following</button>";
        $(".project-input").hide().html(data).fadeIn('fast');

        $.ajax({
            type: "POST",
             url: "follow",
             beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
            },
            data: {'member' : $('.memberid').val(), 'project' :  $('.projectid').val()},
            success: function( data ) {
                 return data;
                }

            });
            /** Reload Script **/
            function load_js()
                {
                    var head= document.getElementsByTagName('head')[0];
                    var script= document.createElement('script');
                    script.type= 'text/javascript';
                    script.src= '../js/ajax-crud.js';
                    head.appendChild(script);
                }
            load_js();
            /** End Reload Script **/
            return false;
        });
    // End Followed Project

    // Start to Unfollow Project
    $(".unfollow").click(function(){
            var formData = {
                memberid:  $('.memberid').val(), 
                projectid: $('.projectid').val(),
            }
                  console.log(formData); 
        var data = "<button class='join follow' type='submit'>Follow Project</button>";
        $(".project-input").hide().html(data).fadeIn('fast');
            $.ajax({
            type: "POST",
             url: "unfollow",
             beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
            },
            data: {'member' : $('.memberid').val(), 'project' :  $('.projectid').val()},
            success: function( data ) {
                 return data;
                }

            });
            /** Reload Script **/
            function load_js()
                {
                    var head= document.getElementsByTagName('head')[0];
                    var script= document.createElement('script');
                    script.type= 'text/javascript';
                    script.src= '../js/ajax-crud.js';
                    head.appendChild(script);
                }
            load_js();
            /** End Reload Script **/
            return false;
        });
        // End to Unfollow Project
    
    // Open Modal Dialog    
    $('.gift').click(function () {
        $('#myModal').modal('show');
        return false;
    });

    // Dropdownlist
    $(".dropdownlist dt a").on('click', function() {
  $(".dropdownlist dd ul").slideToggle('fast');
});

$(".dropdownlist dd ul li a").on('click', function() {
  $(".dropdownlist dd ul").hide();
});

function getSelectedValue(id) {
  return $("#" + id).find("dt a span.value").html();
}

$(document).bind('click', function(e) {
  var $clicked = $(e.target);
  if (!$clicked.parents().hasClass("dropdownlist")) $(".dropdownlist dd ul").hide();
});

$('.mutliSelect input[type="checkbox"]').on('click', function() {

  var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
    title = $(this).val() + ",";

  if ($(this).is(':checked')) {
    var html = '<span title="' + title + '">' + title + '</span>';
    $('.multiSel').append(html);
    $(".hida").hide();
  } else {
    $('span[title="' + title + '"]').remove();
    var ret = $(".hida");
    $('.dropdownlist dt a').append(ret);

  }
});

// Selectable

$(".modal .selection #couponlist").bind("mousedown", function(e) {
  e.metaKey = true;
}).selectable();

$(".modal .selection #couponlist").selectable({
    selected: function (event, ui) {
        if ($(ui.selected).hasClass('selectedfilter')) {
            $(ui.selected).removeClass('selectedfilter');
            $(ui.selected).removeClass('ui-selected');
            // do unselected stuff
        } else {            
            $(ui.selected).addClass('selectedfilter');
            // do selected stuff
        }
    },
    unselected: function (event, ui) {
        $(ui.unselected).removeClass('selectedfilter');
    }
});

// Modal Multiple Selection

$(".modal .modalbtn.select").click(function(){
        var formData = {
                memberid:  $('.memberid').val(), 
                projectid: $('.projectid').val(),
            }
                  console.log(formData); 

        var data = "<button class='join unfollow' type='submit'>Following</button>";
        $(".project-input").hide().html(data).fadeIn('fast');

        $.ajax({
            type: "POST",
             url: "follow",
             beforeSend: function (xhr) {
                var token = $('meta[name="csrf-token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
            },
            data: {'member' : $('.memberid').val(), 'project' :  $('.projectid').val()},
            success: function( data ) {
                 return data;
                }

            });
            /** Reload Script **/
            function load_js()
                {
                    var head= document.getElementsByTagName('head')[0];
                    var script= document.createElement('script');
                    script.type= 'text/javascript';
                    script.src= '../js/ajax-crud.js';
                    head.appendChild(script);
                }
            load_js();
            /** End Reload Script **/
            return false;
        });
    
// End Main Function
});