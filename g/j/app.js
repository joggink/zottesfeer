var zottesfeer = (function (window, document, $, undefined) {
  var my = {};

  my.init = function () {
    $(document).bind('konami',function() {
      document.body.classList.add('zottesfeer');
    });
  };

  return my;
})(window, document, jQuery);

zottesfeer.init();


// $(document).ready(function(){
// });