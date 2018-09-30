//THE AJAX CALL for listing page

(function($){
  $(document).ready(function(){
    var is_mobile = false;

    if( $('.isthismobile').css('display')=='block') {
        is_mobile = true;
    }

    // now use is_mobile to run javascript conditionally

    if (is_mobile == true) {
        //Conditional script here
        console.log("it's a desktop");

    //Refresh listing on list star click

    $(document).on('click', '.list-main .wpulike', function (event){

      var postId = $(this).find("a").attr("data-ulike-id");

      setTimeout(function(){

        $.ajax({
          cache: false,
          timeout: 8000,
        url: wp_ajax.ajaxurl,
        type: 'POST',
        data:({
          action: 'single', id: postId  }),
        success: function( result ) {
          // var stateObj = { foo: "bar" };
          // history.pushState({postId}, "Post"+postId, "?p="+postId);
          // $('#listing_view').replaceWith(result);
          $('#listing_view').children().fadeOut(0);
          setTimeout(function(){
            $('#listing_view').css({"opacity" : "0"});
          },0);

          setTimeout(function(){
            $('#listing_view').replaceWith(result);
            $('#listing_view').animate({"opacity":"1"},0);
          },0);
        }
        });

      },0);

    });

    //Refresh list-item on listing star click

    $(document).on('click', '.right-column .wpulike', function (event){

      var postId2 = $(this).find("a").attr("data-ulike-id");
      // var postId2Matched;
      //
      // var itemsInList = $(".list-main .wpulike");
      // for(var i=0; i < itemsInList.length; i++) {
      //   // console.log(itemsInList[i].children[0].children[0].getAttribute("data-ulike-id"));
      //   var itemInList = itemsInList[i].children[0].children[0].getAttribute("data-ulike-id");
      //   if (itemInList == postId2) {
      //     postId2Matched = itemsInList[i];
      //     console.log(postId2Matched);
      //   }
      // }


      setTimeout(function(){

        $.ajax({
          cache: false,
          timeout: 8000,
        url: wp_ajax.ajaxurl,
        // type: 'POST',
        data:({
          action: 'single2', data: postId2 }),
        success: function( result ) {
          // $('#listing_view').replaceWith(result);
          $('.list').replaceWith(result);

        }
        });

      },0);

    });

      // Listing load new

    $(document).on('click', '.list-main .the_link', function (event){
      event.preventDefault();
      $(this).css({"color": "purple"})

      //Activate selection on list item

      let listArray = Array.from($('.list-item'));
      listArray.forEach(function(element){
        element.className = "list-item";
      })
      event.target.parentElement.parentElement.parentElement.className = "list-item list-item-active";

      var pageNumber = $(this).attr("href")
      var postId = pageNumber.substr(pageNumber.indexOf("=") + 1);
      $('#listing_view').children().fadeOut(500);
      var loading = '<img id="Loading_icon" src="http://localhost:8080/craigslist.wtf/wordpress/wp-content/uploads/2018/09/Loading_icon.gif">';
      $('#listing_view').append(loading);
      $.ajax({
        cache: false,
        timeout: 8000,
      url: wp_ajax.ajaxurl,
      type: 'POST',
      data:({
        action: 'single', id: postId  }),
      success: function( result ) {
        // var stateObj = { foo: "bar" };
        history.pushState({postId}, "Post"+postId, "?p="+postId);
          // $('#listing_view').replaceWith(result);
          // $('#listing_view').children().fadeOut(500);

          setTimeout(function(){
            $('#listing_view').replaceWith(result);
            $('#listing_view').css({"opacity" : "0"});
            $('#listing_view').animate({"opacity":"1"},500);
          },0);
      }

      });
    });
    }
    window.addEventListener('popstate', e => {
      if (e.state == null) {
        console.log('Back Home!');
        blank = "<h1 id=\"listing_view\"></h1>";
         $("#listing_view").replaceWith(blank);
        }

      var state = e.state.postId;
      console.log(state);
        $.ajax({
          cache: false,
          timeout: 8000,
        url: wp_ajax.ajaxurl,
        type: 'POST',
        data:({
          action: 'single', id: state  }),
        success: function( result ) {
          $('#listing_view').replaceWith(result);
        }
        });
    });
  });

})(jQuery);

//Move ACF Notice fields

jQuery(document).ready(function(){
  jQuery(".acf-button").on('click', function(){
    setTimeout(function(){
      jQuery('.acf-notice').css("display", "block");
        jQuery('.acf-form-submit').append(jQuery('.acf-notice'));
    },1000);
  })
});
