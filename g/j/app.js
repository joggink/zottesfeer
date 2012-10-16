var zottesfeer = (function (window, document, $, undefined) {
  var my = {};

  my.init = function () {
    $(document).bind('konami',function() {
      document.body.classList.add('zottesfeer');
      var tune = document.body.querySelectorAll('audio')[0];
      tune.play();
    });
  };

  return my;
})(window, document, jQuery);

zottesfeer.init();