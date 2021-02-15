function logcheck(owner) {
  function getCookie(cook) {
      var allcook = document.cookie
      var cookarr = allcook.split(';')
      for(var i = 0; i < cookarr.length; i++) {
          var icook = cookarr[i].split('=')
          if (icook[0] == cook) {
              return icook[1]
          }
      }
  }
  var logged = getCookie('logged');
  if (logged != owner) {
      window.location.replace("login.php")
  }
}