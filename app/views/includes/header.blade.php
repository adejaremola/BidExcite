<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-4">
                <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
            </div>
            <div class="col-sm-6 col-xs-8">
               <div class="social">
                    <ul class="social-share">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-skype"></i></a></li>
                    </ul>
                    <div class="search">
                        <form role="form">
                            <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                            <i class="fa fa-search"></i>
                        </form>
                   </div>
               </div>
            </div>
        </div>
    </div><!--/.container-->
</div><!--/.top-bar-->

<nav class="navbar navbar-inverse" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>
        </div>
        
        <div class="collapse navbar-collapse navbar-right">
            <ul class="nav navbar-nav">
                @if(Auth::check())
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Deals<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('my_deals', Auth::user()->id) }}">My Deals</a></li>
                        <li><a href="{{ route('create_deal') }}">New Deal</a></li>
                        <li><a href="{{ route('deals') }}">All Deals</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">Blog<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('my_blogs', Auth::user()->id) }}">My Posts</a></li>
                        <li><a href="{{ route('create_blog') }}">New Post</a></li>
                        <li><a href="{{ route('blogs') }}">All Posts</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->first_name}}<i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('create_profile', Auth::user()->id) }}">Profile</a></li>
                        <li><a href="{{ route('notifs') }}">Notifications <span class="badge">{{Auth::user()->hasNotifications()->unread()->count()}}</span></a></li>
                        <li><a href="{{ route('my_bids') }}">Bid History</a></li>
                        <li><a data-toggle="modal" href="#logOut">Log Out</a>
                        </li>
                    </ul>
                </li>
                @else
                <li><a href="{{ route('deals') }}">Deals</a></li>
                <li><a href="{{ route('blogs') }}">Blog</a></li>
                <li><a data-toggle="modal" href="#signIn">Log In</a></li>
                @endif                   
            </ul>
        </div>
    </div><!--/.container-->
</nav><!--/nav-->

<!-- Login | Register Modal -->
<div id="signIn" class="modal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="text-center">Log In | Register</h2> 
            </div>
            <div class="modal-body">
                <div class="tab-wrap">
                    <div class="parrent pull-left">
                        <ul class="nav nav-tabs nav-stacked">
                            <li class=""></li>
                            <li class="active"><a href="#tab2" data-toggle="tab" class="analistic-02">Log In</a></li>
                            <li class=""><a href="#tab3" data-toggle="tab" class="tehnical">Register</a></li>
                            <li class=""></li>
                            <li class=""></li>
                        </ul>
                    </div>

                    <div class="parrent media-body">
                        <div class="tab-content">
                            <div class="tab-pane active in" id="tab2">
                                {{ Form::open(array('route' =>  'loggedin', 'role' => 'form')) }}         
                                    <div class="form-group">
                                        <label for="email"><b>Email</b></label>
                                        <input class="form-control" type="email" placeholder="Enter your email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><b>Last Name</b></label>
                                        <input class="form-control" type="password" placeholder="Enter your last password" name="password" required>
                                    </div>    
                                    <button type="submit" class="btn btn-success"> Sign In
                                    </button>   
                                {{ Form::close() }}              
                            </div>
                            <div class="tab-pane" id="tab3">
                                {{ Form::open(array('route' => 'signedup')) }}
                                <form role="form">
                                    <div class="form-group">
                                        <label for="first_name"><b>First Name</b></label>
                                        <input class="form-control" type="text`" placeholder="Enter your first name" name="first_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="last_name"><b>Last Name</b></label>
                                        <input class="form-control" type="text`" placeholder="Enter your last name" name="last_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email"><b>Email</b></label>
                                        <input class="form-control" type="email" placeholder="Enter your email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password"><b>Password</b></label>
                                        <input class="form-control" placeholder="Enter your password" name="password" type="password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password1"><b>Re-enter Password</b></label>
                                        <input class="form-control" placeholder="Re enter your password" name="password1" type="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-success"> Register
                                    </button>
                                </form>
                                  {{ Form::close() }}
                            </div>

                        </div> <!--/.tab-content-->  
                    </div> <!--/.media-body--> 
                </div><!--/.tab-wrap-->
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- LogOut Modal -->
<div id="logOut" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding:35px 50px;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
                <h2 class="modal-title">Are You Sure You Want To Log Out?</h2>
                {{ Form::open(array('route' => 'logout')) }}
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                    <span class="glyphicon glyphicon-off"></span>
                        Log Out
                    </button>         
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

</div>
