<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Interpreters Service Network | Translation Jobs</title>
	@include('admin._partials.assets')
</head>
<body class="body">
	@include('admin._partials.header')
	<div class="central">
		<div class="tagline">
	    	<h1>The free service for clients and translators</h1>
	    	<h2>Looking for translators or translation work?</h2>
		</div>
	  	<div class="entry">
	    	<div class="hover-tile-outer first_login">
			  <div class="hover-tile-container">
			    <div class="hover-tile hover-tile-visible">
			      Login
			    </div>
			    <div class="hover-tile hover-tile-hidden">
			      <h4>Login</h4>
			      <p>Come on in</p>
			    </div>
			  </div>
			</div>
			<div class="hover-tile-outer first_signup">
			  <div class="hover-tile-container">
			    <div class="hover-tile hover-tile-visible">
			      Signup
			    </div>
			    <div class="hover-tile hover-tile-hidden">
			      <h4>Signup</h4>
			      <p>Let's get you started.</p>
			    </div>
			  </div>
			</div>
	  	</div>

	  	<div class="loader row">
		    <figure class="frontmain">
		      	<img class="ccard" src="../images/ccard.png">
		      	<figcaption class="">Join the fastest growing network for translation jobs in the UK.</figcaption>
		    </figure>
	    	@yield('main')
	  	</div>
  	</div>
  	@include('admin._partials.footer')
</body>
</html>