@extends('frontend.layout') 
@section('title') 
Search 
@endsection
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li><a href="#">Library</a></li>
    <li class="active">Data</li>
</ol>
@endsection
@section('content')
<div class="col-sm-8">
    <!--product detail-->
    <div class="shop-detail">
        <div class="col-sm-4">
            <i class="fa fa-user" style="font-size: 20px"></i> Tola Phone Shop 339
        </div>
        <div class="col-sm-8">
            <img src="{{Config::get('app.url')}}/upload/banner/banner728.png" alt="" style="width:100%" />
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="shop-detail">

        <div class="clear"></div>
    </div>

    <div class="category-tab shop-details-tab">
        <!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#pdetail" data-toggle="tab">Detail:</a></li>
                <li><a href="#specification" data-toggle="tab">Specification</a></li>
                <li><a href="#reviews" data-toggle="tab">Contact</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="pdetail">
                <div class="col-sm-12">
                    <h2 class="titles">Girls Pink T Shirt arrived in store</h2>
                    <div class="blog-post-area">
                    <div class="post-meta">
                        <ul>
                            <li><i class="fa fa-user"></i> Mac Doe</li>
                            <li><i class="fa fa-clock-o"></i> 1:33 pm</li>
                            <li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
                        </ul>
                        <span>
                            <i class="fa fa-tags"></i> Electronic
                            <i class="fa fa-map-marker"></i> Phnom Penh, Mode: <b>New</b>
                        </span>
                    </div>
                    </div>
                    <div class="meta">
                        Location  : Phnom Penh    Main Category  :  Electronic     Sell Place  :  HomeShop    Mode  :  New Arrival      Address  :   http://www.phsarnetwork.com/dara          Post Date   :  2/jan/2013 
                    </div>
                    <div class="row">
                        <!--product describe-->

                        <div class="col-xs-12 col-md-8">
                            <div class="pro-detail">
                                <p>Carousels in WordPress just got a thousand times better. carouFredSel takes the awesome power of the carouFredSel jQuery plugin and integrates it into WordPress so you can create unlimited carousels in your WordPress site without touching any code. Simply upload your images, drag and drop re-order them, add some captions and you’re good to go.</p>
                                <h3>Simple or Advanced Configuration</h3>
                                <p>carouFredSel comes with three configurations modes, “Basic” mode where you can choose some of our built in layout styles and keep things uber simple, “Advanced” mode or “Super User” mode where you can literally edit the configuration like you would when using the jQuery plugin for ultimate control and flexibility.</p>
                                <h3>500px, Flickr &#038; Instagram Integration</h3>
                                <p>Sometimes you don’t want to upload images manually, you would rather pull them from your favorite image service. carouFredSel integrates with 500px, Flickr &#038; Instagram so you can automatically pull your latest mug shots from Instagram, get images from Flickr tagged “beach”, see your friends latest 500px shots, etc. You get the idea.</p>
                            </div>
                        </div>
                        <!--end product describe-->

                        <!--product image list-->
                        <div class="col-xs-6 col-md-4">
                            <!-- Insert to your webpage where you want to display the carousel -->
                            <div id="amazingcarousel-container-1">
                                <div id="amazingcarousel-1" style="display:block;position:relative;width:100%;max-width:240px;margin:0px auto 0px;">
                                    <div class="amazingcarousel-list-container">
                                        <ul class="amazingcarousel-list">
                                            <li class="amazingcarousel-item">
                                                <div class="amazingcarousel-item-container">
                                                    <div class="amazingcarousel-image">
                                                        <a href="{{Config::get('app.url')}}/frontend/images/blog/blog-one.jpg" title="746C2338412E4D5486B0BD6E2C8E7B13"  class="html5lightbox" data-group="amazingcarousel-1"><img src="{{Config::get('app.url')}}/frontend/images/home/product1.jpg"  alt="746C2338412E4D5486B0BD6E2C8E7B13" /></a>
                                                        <div class="amazingcarousel-text">
                                                            <div class="amazingcarousel-text-bg"></div>
                                                            <div class="amazingcarousel-title">746C2338412E4D5486B0BD6E2C8E7B13</div>
                                                        </div>
                                                    </div>                    </div>
                                            </li>
                                            <li class="amazingcarousel-item">
                                                <div class="amazingcarousel-item-container">
                                                    <div class="amazingcarousel-image">
                                                        <a href="{{Config::get('app.url')}}/frontend/images/blog/blog-two.jpg" title="746C2338412E4D5486B0BD6E2C8E7B13"  class="html5lightbox" data-group="amazingcarousel-1"><img src="{{Config::get('app.url')}}/frontend/images/home/product2.jpg"  alt="746C2338412E4D5486B0BD6E2C8E7B13" /></a>
                                                        <div class="amazingcarousel-text">
                                                            <div class="amazingcarousel-text-bg"></div>
                                                            <div class="amazingcarousel-title">746C2338412E4D5486B0BD6E2C8E7B13</div>
                                                        </div>
                                                    </div>                    </div>
                                            </li>
                                            <li class="amazingcarousel-item">
                                                <div class="amazingcarousel-item-container">
                                                    <div class="amazingcarousel-image">
                                                        <a href="{{Config::get('app.url')}}/frontend/images/blog/blog-three.jpg" title="3593f75"  class="html5lightbox" data-group="amazingcarousel-1"><img src="{{Config::get('app.url')}}/frontend/images/home/product3.jpg"  alt="3593f75" /></a>
                                                        <div class="amazingcarousel-text">
                                                            <div class="amazingcarousel-text-bg"></div>
                                                            <div class="amazingcarousel-title">3593f75</div>
                                                        </div>
                                                    </div>                    </div>
                                            </li>
                                        </ul>
                                        <div class="amazingcarousel-prev"></div>
                                        <div class="amazingcarousel-next"></div>
                                    </div>
                                    <div class="amazingcarousel-nav"></div>
                                    <div class="amazingcarousel-engine"><a href="http://amazingcarousel.com">jQuery Image Scroller</a></div>
                                </div>
                            </div>
                            <!-- End of body section HTML codes -->
                        </div>
                        <!-- end product image list-->
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="specification">
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{Config::get('app.url')}}/frontend/images/home/gallery4.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{Config::get('app.url')}}/frontend/images/home/gallery3.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{Config::get('app.url')}}/frontend/images/home/gallery2.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{Config::get('app.url')}}/frontend/images/home/gallery1.jpg" alt="" />
                                <h2>$56</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="reviews">
                <div class="col-sm-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name">
                            <input type="email" placeholder="Email Address">
                        </span>
                        <textarea name=""></textarea>
                        <b>Rating: </b> <img src="images/product-details/rating.png" alt="">
                        <button type="button" class="btn btn-default pull-right">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end product detail-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">recommended items</h2>

        <div id="recommended-item-carousel" class="carousel slide"
             data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('app.url')}}/frontend/images/home/recommend1.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('app.url')}}/frontend/images/home/recommend3.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{Config::get('app.url')}}/frontend/images/home/recommend2.jpg" alt="" />
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left recommended-item-control"
               href="#recommended-item-carousel" data-slide="prev"> <i
                    class="fa fa-angle-left"></i>
            </a> <a class="right recommended-item-control"
                    href="#recommended-item-carousel" data-slide="next"> <i
                    class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->
    <div class="shop-details-tab">
        <img src="{{Config::get('app.url')}}/upload/banner/banner728.png" alt="" style="width:100%" />
    </div>
</div>
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/amazingcarousel.js"></script>
<link rel="stylesheet" type="text/css" href="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.css">
<script src="{{Config::get('app.url')}}/frontend/js/carouselengine/initcarousel-1.js"></script>
@endsection
