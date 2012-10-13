var zottesfeer = (function (window, document, $, undefined) {
  var my = {};

  my.init = function () {
    var konami = new Konami();
    konami.onSuccess = function () {
      document.body.classList.add('zottesfeer');
    };
    konami.init();
  };

  return my;
})(window, document, jQuery);

zottesfeer.init();


// $(document).ready(function(){
// });