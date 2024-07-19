@extends('Layout.Client.main')
@section('content')
<div class="trending-area fix">
    <div class="container">
        <div class="trending-main">
            <!-- Trending Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending-tittle">
                        <strong>Trending now</strong>
                        <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        <div class="trending-animated">
                            <ul id="js-news" class="js-hidden">
                                @foreach ($trendingPost as $item)
                                
                                <li class="news-item"><a href="{{url('/detail/'.$item->slug)}}"><span class="color3">{{$item->category_name}}</span> {{$item->title}}</a></li>
                                @endforeach                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Top -->
                    <div class="trending-top mb-30">
                        <div class="trend-top-img">
                            <img src="{{$firstPost->thumbnail}}" alt="">
                            <div class="trend-top-cap">
                                <span>{{$firstPost->category_name}}</span>
                                <h2><a href="{{url('/detail/'.$firstPost->slug)}}">{{$firstPost->title}}</a></h2>
                            </div>
                        </div>
                    </div>
                    <!-- Trending Bottom -->
                    <div class="trending-bottom">
                        <div class="row">
                            @foreach ($threePostSecond as $item)
                            <div class="col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{$item->thumbnail}}" alt="">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="color3">{{$item->category_name}}</span>
                                        <h4><a href="{{url('/detail/'.$item->slug)}}"> {{$item->title}}</a></h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>
                <!-- Riht content -->
                <div class="col-lg-4">
                    @foreach ($fivePostRight as $item)
                    <div class="trand-right-single d-flex">
                        <div class="trand-right-img">
                            <img src="{{$item->thumbnail}}" class="img-thumbnail" alt="">
                        </div>
                        <div class="trand-right-cap">
                            <span class="color1">{{$item->category_name}}</span>
                            <h4><a href="{{url('/detail/'.$item->slug)}}">{{$item->title}}</a></h4>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trending Area End -->
<!--   Weekly-News start -->
<div class="weekly-news-area pt-50">
    <div class="container">
       <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Weekly Top News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        <div class="weekly-single">
                            <div class="weekly-img">
                                <img src="{{asset("Client/assets/img/news/weeklyNews2.jpg")}}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">Strike</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div> 
                        <div class="weekly-single">
                            <div class="weekly-img">
                                    <img src="{{asset("Client/assets/img/news/weeklyNews1.jpg")}}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">Strike</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="weekly-single">
                            <div class="weekly-img">
                                    <img src="{{asset("Client/assets/img/news/weeklyNews3.jpg")}}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">Strike</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="weekly-single">
                            <div class="weekly-img">
                                <img src="{{asset("Client/assets/img/news/weeklyNews3.jpg")}}" alt="">
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">Strike</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>           
<!-- End Weekly-News -->
<!-- Whats New Start -->
<section class="whats-news-area pt-50 pb-20">
    <div class="container">
        <div class="row">
        <div class="col-lg-8">
            <div class="row d-flex justify-content-between">
                <div class="col-lg-3 col-md-3">
                    <div class="section-tittle mb-30">
                        <h3>Whats New</h3>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="properties__button">
                        <!--Nav Button  -->                                            
                        <nav>                                                                     
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Lifestyle</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Travel</a>
                                <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Fashion</a>
                                <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Sports</a>
                                <a class="nav-item nav-link" id="nav-technology" data-toggle="tab" href="#nav-techno" role="tab" aria-controls="nav-contact" aria-selected="false">Technology</a>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Nav Card -->
                    <div class="tab-content" id="nav-tabContent">
                        <!-- card one -->
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">           
                            <div class="whats-news-caption">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews1.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews2.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews3.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews4.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card two -->
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="whats-news-caption">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews1.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews2.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews3.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews4.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Card three -->
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="whats-news-caption">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews1.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews2.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews3.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews4.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card fure -->
                        <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                            <div class="whats-news-caption">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews1.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews2.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews3.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews4.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card Five -->
                        <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                            <div class="whats-news-caption">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews1.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews2.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews3.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews4.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- card Six -->
                        <div class="tab-pane fade" id="nav-techno" role="tabpanel" aria-labelledby="nav-technology">
                            <div class="whats-news-caption">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews1.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews2.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews3.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-what-news mb-100">
                                            <div class="what-img">
                                                <img src="{{asset("Client/assets/img/news/whatNews4.jpg")}}" alt="">
                                            </div>
                                            <div class="what-cap">
                                                <span class="color1">Night party</span>
                                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End Nav Card -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <!-- Section Tittle -->
            <div class="section-tittle mb-40">
                <h3>Follow Us</h3>
            </div>
            <!-- Flow Socail -->
            <div class="single-follow mb-45">
                <div class="single-box">
                    <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                            <a href="#"><img src="{{asset("Client/assets/img/news/icon-fb.png")}}" alt=""></a>
                        </div>
                        <div class="follow-count">  
                            <span>8,045</span>
                            <p>Fans</p>
                        </div>
                    </div> 
                    <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                            <a href="#"><img src="{{asset("Client/assets/img/news/icon-tw.png")}}" alt=""></a>
                        </div>
                        <div class="follow-count">
                            <span>8,045</span>
                            <p>Fans</p>
                        </div>
                    </div>
                        <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                            <a href="#"><img src="{{asset("Client/assets/img/news/icon-ins.png")}}" alt=""></a>
                        </div>
                        <div class="follow-count">
                            <span>8,045</span>
                            <p>Fans</p>
                        </div>
                    </div>
                    <div class="follow-us d-flex align-items-center">
                        <div class="follow-social">
                            <a href="#"><img src="{{asset("Client/assets/img/news/icon-yo.png")}}" alt=""></a>
                        </div>
                        <div class="follow-count">
                            <span>8,045</span>
                            <p>Fans</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New Poster -->
            <div class="news-poster d-none d-lg-block">
                <img src="{{asset("Client/assets/img/news/news_card.jpg")}}" alt="">
            </div>
        </div>
        </div>
    </div>
</section>
<!-- Whats New End -->
<!--   Weekly2-News start -->
<div class="weekly2-news-area  weekly2-pading gray-bg">
    <div class="container">
        <div class="weekly2-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Weekly Top News</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="weekly2-news-active dot-style d-flex dot-style">
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="{{asset("Client/assets/img/news/weekly2News1.jpg")}}" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Corporate</span>
                                <p>25 Jan 2020</p>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div> 
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="{{asset("Client/assets/img/news/weekly2News2.jpg")}}" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Event night</span>
                                <p>25 Jan 2020</p>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div> 
                        <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="{{asset("Client/assets/img/news/weekly2News3.jpg")}}" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Corporate</span>
                                <p>25 Jan 2020</p>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                         <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="{{asset("Client/assets/img/news/weekly2News4.jpg")}}" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Event time</span>
                                <p>25 Jan 2020</p>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div> 
                         <div class="weekly2-single">
                            <div class="weekly2-img">
                                <img src="{{asset("Client/assets/img/news/weekly2News4.jpg")}}" alt="">
                            </div>
                            <div class="weekly2-caption">
                                <span class="color1">Corporate</span>
                                <p>25 Jan 2020</p>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>           
<!-- End Weekly-News -->
<!-- Start Youtube -->
<div class="youtube-area video-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="video-items-active">
                    <div class="video-items text-center">
                        <iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-items text-center">
                        <iframe  src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="video-items text-center">
                        <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    </div>
                    <div class="video-items text-center">
                        <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                     
                    </div>
                    <div class="video-items text-center">
                        <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="video-info">
            <div class="row">
                <div class="col-lg-6">
                    <div class="video-caption">
                        <div class="top-caption">
                            <span class="color1">Politics</span>
                        </div>
                        <div class="bottom-caption">
                            <h2>Welcome To The Best Model Winner Contest At Look of the year</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod ipsum dolor sit lorem ipsum dolor sit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="testmonial-nav text-center">
                        <div class="single-video">
                            <iframe  src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div>
                        <div class="single-video">
                            <iframe  src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div>
                        <div class="single-video">
                            <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div>
                        <div class="single-video">
                            <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div>
                        <div class="single-video">
                            <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="video-intro">
                                <h4>Welcotme To The Best Model Winner Contest</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- End Start youtube -->
<!--  Recent Articles start -->
<div class="recent-articles">
    <div class="container">
       <div class="recent-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Recent Articles</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="recent-active dot-style d-flex dot-style">
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{asset("Client/assets/img/news/recent1.jpg")}}" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{asset("Client/assets/img/news/recent2.jpg")}}" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{asset("Client/assets/img/news/recent3.jpg")}}" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                        <div class="single-recent mb-100">
                            <div class="what-img">
                                <img src="{{asset("Client/assets/img/news/recent2.jpg")}}" alt="">
                            </div>
                            <div class="what-cap">
                                <span class="color1">Night party</span>
                                <h4><a href="#">Welcome To The Best Model  Winner Contest</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>           
<!--Recent Articles End -->
<!--Start pagination -->
<div class="pagination-area pb-45 text-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="single-wrap d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                          <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow roted"></span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                          <li class="page-item"><a class="page-link" href="#"><span class="flaticon-arrow right-arrow"></span></a></li>
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection