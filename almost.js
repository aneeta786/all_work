$('.slidess li:first-child').click(function() {
 var data_atttr =   $(this).attr('data-position');
    $('.right').click();
    if(data_atttr == '0'){
    }
    //}
    });
    $('.slidess li:last-child').click(function(e) {
    e.preventDefault();
 var data_atttr =   $(this).attr('data-position');
    if(data_atttr == '5'){
      //$('.left')[0].click();
$('.left').click();
        //jQuery('.left').trigger("click");
    }
    });
    $('.slidess li:nth-child(4n)').click(function() {
 var data_atttr =   $(this).attr('data-position');
    $('.right').click();
    //}
    });
    $('.slidess li:nth-child(3n)').click(function() {
 var data_atttr =   $(this).attr('data-position');
    $('.left').click();
    //}
    });


    /**********anchor tag*******************/
    $('.wpml-ls-slot-56 a').click(function(){
    var hrefs = $(this).attr('href');
       window.location = hrefs;
    // window.location.replace(+href);
    // or alert($(this).hash();
  });
});


/**************************/


if(jQuery("input[name='privacy_flag[]']").is(':checked')){
    alert("sd");
      jQuery('input[name="take-reply[]"]').attr('checked',false);
    jQuery(".ap-pro-display-multiple1").css("display", "none");
   }"

if(jQuery("input[name='privacy_flag[]']").is(':checked')){
    alert("sd");
      jQuery('input[name="take-reply[]"]').attr('checked',false);
    jQuery(".ap-pro-display-multiple1").css("display", "none");
   }

   /***************************/

   var url = window.location.href;
var index = url.indexOf("#");
if (index !== -1)
{
    var hash = url.substring(index + 1);
if(hash){
var finds = jQuery( ".elementor-shortcode" ).find( ".es_subscription_message" );
if(finds){
  setTimeout(() => {
  jQuery(location).attr('href', 'https://privateacquire.com/registration/');
 }, 6000);
}else{
console.log("no");
}
}
}


/***************************/
var url = window.location.href;
  var index = url.indexOf("#");
  if (index !== -1)
  {
    var hash = url.substring(index + 1);
    setTimeout(() => {
      jQuery("#"+hash).click();
    }, 1000);
  }


  /**********************/
  if (window.location.href.indexOf('?') > -1) {
    var results =  getParameterByName('product_cat');
    console.log(results);
    jQuery('ul.shopify-scroll-content li').each(function(){
        var data_val = jQuery(this).children('a').attr('data-val');
         if(data_val == results){
$(".in_val").append("" + results + "");
         }
    });
}
  if( results == null ){
        $(".in_val").append("Select Collections");
      }