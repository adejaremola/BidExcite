@extends('layouts.default')

@section('content')
<ul class="error">
	@foreach($errors->all() as $message)
		<li>{{ $message }}</li>
	@endforeach
</ul>

<section id="blog" class="container">
    <div class="center">
        <h2>{{ $for == 'my_posts' ? 'My Blogs':'Blogs' }}</h2>
        <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
    </div>

    @if($for == 'a_post')
    <div class="blog"7
        <dpxv class="row">
            <div class="col-md-8">
                <div class="blog-item">
                    <img class="img-responsive img-blog" src="{{ '/'.$a_news->pic_url }}" width="100%" alt="" />
                    <div class="row">  
                            <div class="col-xs-12 col-sm-2 text-center">
                                <div class="entry-meta">
                                    <span id="publish_date">07  NOV</span>
                                    <span><i class="fa fa-user"></i> <a href="#"> {{ $a_news->getUser->first_name.' '.$a_news->getUser->first_name}}</a></span>
                                    <span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">{{ count($a_news->getComments) }} Comments</a></span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-10 blog-content">
                                <h2>{{ $a_news->title }}</h2>
                                <p>{{ $a_news->content }}</p>

                                <div class="post-tags">
                                    <strong>Tag:</strong> <a href="#">Cool</a> / <a href="#">Creative</a> / <a href="#">Dubttstep</a>
                                </div>

                            </div>
                        </div>
                </div><!--/.blog-item-->
                    
                <div class="media reply_section">
                    <div class="pull-left post_reply text-center">
                            <a href="#"><img src="" class="img-circle" alt="{{ $a_news->getUser->first_name }}" /></a>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                            </ul>
                        </div>
                    <div class="media-body post_reply_content">
                            <h3>{{ $a_news->getUser->first_name.' '.$a_news->getUser->first_name }}</h3>
                            <p><strong>Web:</strong> <a href="http://www.shapebootstrap.net">www.sci.ng</a></p>
                        </div>
                </div> 
                    
                <div id="contact-page clearfix">
                    <div class="status alert alert-success" style="display: none"></div>
                    <div class="message_heading">
                        <h1 id="comments_title">{{Count($a_news->getComments)}} Comments</h1>
                    </div>
                    {{ Form::model($comment, array('method' => 'post', 'url' => 'comments/'.$comment->id, 'class' => 'form-horizontal')) }}
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-danger"><span class="glyphicon glyphicon-off"></span>Comment</button>
                          <div class="col-sm-10">
                            {{ Form::text('content', '', ['id' => 'content', 'class' => 'form-control', 'required' => 'true']) }}
                            {{ Form::number('news_id', $a_news->id, ['class' => 'sr-only form-control']) }}
                          </div>
                        </div>
                    {{ Form::close() }} 
                    
                </div><!--/#contact-page-->
                @foreach($a_news->getComments->reverse() as $comment)
                <div class="media comment_section">
                    <div class="media-body post_reply_comments">
                        <h3>{{ $comment->getUser->first_name }}</h3>
                        <h4>{{ $comment->getUser->updated_at }}</h4>
                        <p>{{ $comment->content }}</p>
                        <a href="#">Reply</a>
                    </div>
                </div> 
                @endforeach
                

            </div><!--/.col-md-8-->

            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form">
                            <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                    </form>
                </div><!--/.search-->
                
                <div class="widget categories">
                    <h3>Recent Comments</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>                     
                </div><!--/.recent comments-->
                 

                <div class="widget categories">
                    <h3>Categories</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <li><a href="#">Computers <span class="badge">04</span></a></li>
                                <li><a href="#">Smartphone <span class="badge">10</span></a></li>
                                <li><a href="#">Gedgets <span class="badge">06</span></a></li>
                                <li><a href="#">Technology <span class="badge">25</span></a></li>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.categories-->
                
                <div class="widget archieve">
                    <h3>Archieve</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="blog_archieve">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2013 <span class="pull-right">(97)</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2013 <span class="pull-right">(32)</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2013 <span class="pull-right">(19)</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2013 <span class="pull-right">(08)</a></li>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.archieve-->
                
                <div class="widget tags">
                    <h3>Tag Cloud</h3>
                    <ul class="tag-cloud">
                        <li><a class="btn btn-xs btn-primary" href="#">Apple</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Barcelona</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Office</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Ipod</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Stock</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Race</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">London</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Football</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Porche</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Gadgets</a></li>
                    </ul>
                </div><!--/.tags-->
                
                <div class="widget blog_gallery">
                    <h3>Our Gallery</h3>
                    <ul class="sidebar-gallery">
                        <li><a href="#"><img src="images/blog/gallery1.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery2.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery3.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery4.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery5.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery6.png" alt="" /></a></li>
                    </ul>
                </div><!--/.blog_gallery-->
                    
                
            </aside>     
        </div><!--/.row-->
    </div>
    @else
    <div class="blog">
        <div class="row">
            <div class="col-md-{{$for=='all_posts'?'8':'8 col-md-offset-2' }}">
                <div class="blog-item">
                @for($count = 0; $count < 2; $count++)
	                @if($count == 0)
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 text-center">
                            <div class="entry-meta">
                                <span id="publish_date">07  NOV</span>
                                <span><i class="fa fa-user"></i> <a href="#">{{ $first_news->getUser->first_name.' '.$first_news->getUser->last_name }}</a></span>
                                <span><i class="fa fa-comment"></i>{{ count($first_news->getComments) }} Comments</span>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-10 blog-content">
                            <a href="#"><img class="img-responsive img-blog" src="{{ '/'.$first_news->pic_url }}" width="100%" alt="" /></a>
                            <h2><a href="{{ route('a_news', $first_news->id) }}">{{ $first_news->title }}</a></h2>
                            <h3>{{ $first_news->content }}</h3>
                            <a class="btn btn-primary readmore" href="{{ route('a_news', $first_news->id) }}">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    @else 
                    <div class="row" style="margin-top: 15px;">
		                <div class="features">
                        @if(isset($other_news))
		                	@foreach($other_news as $a_news)
			                <div class="col-md-4 wow fadeInDown">
			                    <div class="clients-comments text-center">
			                        <img src="{{ '/'.$a_news->pic_url }}" class="img-circle" alt="">
			                        <h3>{{ $a_news->title }}</h3>
			                        <h4><span>-{{ $a_news->getUser->first_name }} /</span>  {{ $a_news->getUser->email }}</h4>
			                    </div>
			                </div>
			                @endforeach
                        @endif
		                </div>
		            </div><!--/.row--> 
                    @endif   
                @endfor    
                </div><!--/.blog-item-->
            </div><!--/.col-md-8-->
            @if($for == 'all_posts')
            <aside class="col-md-4">
                <div class="widget search">
                    <form role="form">
                            <input type="text" class="form-control search_box" autocomplete="off" placeholder="Search Here">
                    </form>
                </div><!--/.search-->
                
                <div class="widget categories">
                    <h3>Recent Comments</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>
                            <div class="single_comments">
                                <img src="images/blog/avatar3.png" alt=""  />
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </p>
                                <div class="entry-meta small muted">
                                    <span>By <a href="#">Alex</a></span <span>On <a href="#">Creative</a></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>                     
                </div><!--/.recent comments-->
                 

                <div class="widget categories">
                    <h3>Categories</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="blog_category">
                                <li><a href="#">Computers <span class="badge">04</span></a></li>
                                <li><a href="#">Smartphone <span class="badge">10</span></a></li>
                                <li><a href="#">Gedgets <span class="badge">06</span></a></li>
                                <li><a href="#">Technology <span class="badge">25</span></a></li>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.categories-->
                
                <div class="widget archieve">
                    <h3>Archieve</h3>
                    <div class="row">
                        <div class="col-sm-12">
                            <ul class="blog_archieve">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> December 2013 <span class="pull-right">(97)</span></a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> November 2013 <span class="pull-right">(32)</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> October 2013 <span class="pull-right">(19)</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> September 2013 <span class="pull-right">(08)</a></li>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.archieve-->
                
                <div class="widget tags">
                    <h3>Tag Cloud</h3>
                    <ul class="tag-cloud">
                        <li><a class="btn btn-xs btn-primary" href="#">Apple</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Barcelona</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Office</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Ipod</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Stock</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Race</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">London</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Football</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Porche</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Gadgets</a></li>
                    </ul>
                </div><!--/.tags-->
                
                <div class="widget blog_gallery">
                    <h3>Our Gallery</h3>
                    <ul class="sidebar-gallery">
                        <li><a href="#"><img src="images/blog/gallery1.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery2.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery3.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery4.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery5.png" alt="" /></a></li>
                        <li><a href="#"><img src="images/blog/gallery6.png" alt="" /></a></li>
                    </ul>
                </div><!--/.blog_gallery-->
            </aside>  
            @endif
        </div><!--/.row-->
    </div>
    @endif
</section><!--/#blog-->



@stop


