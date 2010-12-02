<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({appId: 'your app id', status: true, cookie: true,
             xfbml: true});
  };
  (function() {
    var e = document.createElement('script'); e.async = true;
    e.src = document.location.protocol +
      '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);
  }());
  FB.api(
  {
    method: 'fql.query',
    query: 'SELECT name FROM user WHERE uid=5526183'
  },
  function(response) {
    alert('Name is ' + response[0].name);
  }
);
</script>


</html>