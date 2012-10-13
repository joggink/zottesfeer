var zottesfeer = (function (window, document, $, undefined) {
  var my = {};

  my.init = function () {
    $(document).bind('konami',function() {
      document.body.classList.add('zottesfeer');
    });

    $(window).load(function(){
    	$('.feedthehorse')
    		.fadeIn('fast')
	    	.masonry({
	    		itemSelector: 'li',
				animationOptions: {
					duration: 400
				}
	    	});
    })

  };

  return my;
})(window, document, jQuery);

zottesfeer.init();


// $(document).ready(function(){
// });