var zottesfeer = (function (window, document, $, undefined) {
  var my = {};

  my.init = function () {
    $(document).bind('konami',function() {
      document.body.classList.add('zottesfeer');
      var tune = document.body.querySelectorAll('audio')[0];
      tune.play();
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
