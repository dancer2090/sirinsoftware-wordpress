/*
 * Facebook
 */
window.fbAsyncInit = function(){
FB.init({
    appId: '568884659983035', status: true, cookie: true, xfbml: true }); 
};
(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if(d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; 
    js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
function postToFeed(title, desc, url, image){
	//var obj = {method: 'feed',link: url, picture: 'http://www.url.com/images/'+image,name: title,description: desc};
	var obj = {method: 'feed',link: url};
	function callback(response){}
	FB.ui(obj, callback);
}
(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.async=true; js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&#038;appId=568884659983035";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	// ]]>


/*
 * LinkedIn
 */
function onLinkedInLoad() {
    IN.Event.on(IN, "auth", shareContent);
  }

// Handle the successful return from the API call
function onSuccess(data) {
  console.log(data);
}

// Handle an error response from the API call
function onError(error) {
  console.log(error);
}

// Use the API call wrapper to share content on LinkedIn
function shareContent() {
      
  // Build the JSON payload containing the content to be shared
  var payload = { 
    "comment": "Check out developer.linkedin.com! http://linkd.in/1FC2PyG", 
    "visibility": { 
      "code": "anyone"
    } 
  };

  IN.API.Raw("/people/~/shares?format=json")
    .method("POST")
    .body(JSON.stringify(payload))
    .result(onSuccess)
    .error(onError);
}
