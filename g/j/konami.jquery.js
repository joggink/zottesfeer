(function($) {
  var kcode = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65];
  var entered = [];
  for (var i = 0; i < kcode.length; i++) {
    entered.push(NaN);
  }

  $(document).keyup(
    function(a) {
      entered.push(a.keyCode);
      entered = entered.slice(1);

      for (var i = 0; i < kcode.length; i++) {
        if (kcode[i] != entered[i]) {
          return;
        }
      }
      $(document).trigger('konami');
    }
  );
})(jQuery);