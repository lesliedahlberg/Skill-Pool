angular.module('verify', []).controller('verifyCtrl', function($scope, $http) {
  $scope.success = false;
  var get = QueryString();//window.location.href //creates associative array of $_GET
//  alert(get.email + " " + get.hash);
  var url = "api/verify_registration.php?email=" + get['email'] + "&hash=" + get['hash'];

  $scope.processVerification = function(){
    $http.get(url)
    .success(function (response) {
      if(response.success == true){
        $scope.success = response.success;
      }else {
        $scope.success = response.success;
      }
    });
  }
});
/*
function getUrlParameters(b) { //Made by Google (?)
    var c = typeof b === "undefined";
    if (a !== h && c) return a;
    for (var d = {}, b = b || k[B][vb], e = b[p]("?"), f = b[p]("#"), b = (f === -1 ? b[Ya](e + 1) : [b[Ya](e + 1, f - e - 1), "&", b[Ya](f + 1)][K](""))[z]("&"), e = i.dd ? ia : unescape, f = 0, g = b[w]; f < g; ++f) {
        var l = b[f][p]("=");
        if (l !== -1) {
            var q = b[f][I](0, l),
                l = b[f][I](l + 1),
                l = l[Ca](/\+/g, " ");
            try {
                d[q] = e(l)
            } catch (A) {}
        }
    }
    c && (a = d);
    return d
}
*/
  function QueryString () {
  // This function is anonymous, is executed immediately and
  // the return value is assigned to QueryString!
  var query_string = {};
  var query = window.location.search.substring(1);
  var vars = query.split("&");
  for (var i=0;i<vars.length;i++) {
    var pair = vars[i].split("=");
        // If first entry with this name
    if (typeof query_string[pair[0]] === "undefined") {
      query_string[pair[0]] = decodeURIComponent(pair[1]);
        // If second entry with this name
    } else if (typeof query_string[pair[0]] === "string") {
      var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
      query_string[pair[0]] = arr;
        // If third or later entry with this name
    } else {
      query_string[pair[0]].push(decodeURIComponent(pair[1]));
    }
  }
    return query_string;
}();
