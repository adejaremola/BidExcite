<div class="logo">
	<a href="index.html"><h1>Blogger</h1></a>
</div>
<div class="top-menu">
	<span class="menu"> </span>
	<ul class="cl-effect-16">
		<li><a class="active" href="index.html" data-hover="HOME">Home</a></li> 
		<li><a href="about.html" data-hover="About">About</a></li>
		<li><a href="grid.html" data-hover="Grids">Grids</a></li>
		<li><a href="services.html" data-hover="Services">Services</a></li>
		<li><a href="#" data-hover="Gallery">Gallery</a></li>
		<li><a href="contact.html" data-hover="CONTACT">Contact</a></li>
	</ul>

	 	
	<ul class="side-icons">
		<li><a class="fb" href="#"></a></li>
		<li><a class="twitt" href="#"></a></li>
		<li><a class="goog" href="#"></a></li>
		<li><a class="drib" href="#"></a></li>
    </ul>
</div>



<div class="w3-card-2">
	<a class="w3-btn-block w3-blue w3-left-align" href="{{ route('create_profile') }}">{{ Auth::user()->first_name.' '.Auth::user()->last_name  }}</a>
    <a class="w3-btn-block w3-blue w3-left-align" href="#">Notifications <span class="badge">0</span></a>
    <a class="w3-btn-block w3-blue w3-left-align" href="{{ route('bids') }}">My Bids <span class="badge">0</span></a>
    
    <div class="w3-accordion">
	    <a class="w3-btn-block w3-blue w3-left-align" onclick="myFunction('deals')" href="#">
	      Deals <i class="fa fa-caret-down"></i>
	    </a>
	    <div id="deals" class="w3-accordion-content w3-white w3-card-4">
            <a class="w3-btn-block w3-blue w3-left-align" href="{{ route('deals') }}">My Deals</a>
		    <a class="w3-btn-block w3-blue w3-left-align" href="{{ route('create_deal') }}">New Deal</a>
	    </div>
	</div>

	<div class="w3-accordion">
	    <a class="w3-btn-block w3-blue w3-left-align" onclick="myFunction('news')" href="#">
	      News <i class="fa fa-caret-down"></i>
	    </a>
	    <div id="news" class="w3-accordion-content w3-white w3-card-4">
            <a class="w3-btn-block w3-blue w3-left-align" href="#">My Posts</a>
		    <a class="w3-btn-block w3-blue w3-left-align" href="#">New Post</a>
	    </div>
	</div>
</div>



				
