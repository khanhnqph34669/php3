@extends('Layout.Client.main')
@section('title', 'Detail Post')
@section('content')
     <!-- About US Start -->
     <div class="about-area">
        <div class="container">
                <!-- Hot Aimated News Tittle-->
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
                        <!-- Trending Tittle -->
                        <div class="container">
                        <div class="about-right mb-90">
                            <div class="about-img">
                                <img src="{{ \Storage::url($post->thumbnail) }}" alt="">
                            </div>
                            <div class="section-tittle mb-30 pt-30">
                                <h3>{{$post->title}}</h3>
                            </div>
                            <div class="about-prea">
                                {!! $post->content !!}
                            </div> 
                            <div class="social-share pt-30">
                                <div class="section-tittle">
                                    <h3 class="mr-20">Share:</h3>
                                    <ul>
                                        <li><a href="#"><img src="{{asset("Client/assets/img/news/icon-ins.png")}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset("Client/assets/img/news/icon-fb.png")}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset("Client/assets/img/news/icon-tw.png")}}" alt=""></a></li>
                                        <li><a href="#"><img src="{{asset("Client/assets/img/news/icon-yo.png")}}" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- From -->
                        <div class="row">
                            <div class="col-lg-8">
                                <form class="form-contact contact_form mb-80" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control error" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control error" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                    </div>
                                </form>
                            </div>
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
    </div>
    <!-- About US End -->
@endsection