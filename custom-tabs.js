$(document).ready(function(){
        $('.tab-a').click(function(){
          $(".tab").removeClass('tab-active');
          $(".tab[data-id='"+$(this).attr('data-id')+"']").addClass("tab-active");
          $(".tab-a").removeClass('active-a');
          $(this).parent().find(".tab-a").addClass('active-a');
  });

   $(".order-list ol a").click(function(){
          $(this).addClass("tag_red");
          $(".reset_filter").click(function(event){
            event.preventDefault();
            $(".order-list ol a").removeClass("tag_red");
            $(".order-list ol a").removeClass("actives");
            $(".order-list ol a").removeClass("current");
          });
        });
   jQuery(".close").click(function(){
    jQuery(".sorted-section").css("display","none");
  });
   jQuery(".yourtermname").click(function(){
      jQuery(".sorted-section").addClass("openterm");
    });
   jQuery(".reset_filter").click(function(){
        jQuery(".openterm").css("display" , "none");
        $(".order-list ol a").removeClass("actives");
        $(".order-list ol a").removeClass("current");
        jQuery(".grid-with-text").remove();
      });
});

/***************************************** */
function term_ajax_get(termID) {
            $(".order-list ol a").on('click', function() {
            jQuery(this).addClass("actives");
            var ref_this = $(".tab-active").attr('data-id');
            var dataID = new Array();
                $('.order-list ol .actives').each(function() {
                     var  clickdataid =  $(this).attr("dataid") ; 
                     dataID.push($(this).attr("dataid"));
                      var myJsonString = JSON.stringify(dataID);
                      console.log(myJsonString);
                  });
                  $(".tab-menu ul li a").on('click', function() {
                      $(".order-list ol a").removeClass("current");
                      $(".order-list ol a").removeClass("actives");
                      $(".order-list ol a").removeClass("tag_red");
                      jQuery(".openterm").css("display" , "none");
                  });
                  jQuery(".order-list ol a.ajax").removeClass("current");
                       jQuery(".order-list ol a.ajax").addClass("current"); 
                       jQuery("body").addClass("show-loader");
                             jQuery.ajax({
                              type: 'POST',
                              url    : my_ajax_object.ajax_url,
                              processData: true,
                              data: {"action": "filter_texonomy",texonomies:ref_this, term:dataID },
                              success: function(response) {
                              jQuery(".sorted-section").css("display", "block");
                              jQuery("#category-post-content").html(response);
                              jQuery("body").removeClass("show-loader");
                              return false;
                            }
                            });
                           });
          } 