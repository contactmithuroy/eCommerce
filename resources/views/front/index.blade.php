@extends('front.layout')
@section('body')
<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            @foreach ($banners as $banner)
              <li>
                <div class="seq-model">
                  <img data-seq src="{{ asset($banner->image) }}" alt="" />
                </div>
                <div class="seq-title">
                <span data-seq>{{ $banner->offer }}</span>                
                  <h2 data-seq>{{ $banner->title }}</h2>                
                  <p data-seq>{{ $banner->description }}</p>
                  <a data-seq href="{{ $banner->title_link }}" target="_blank" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
                </div>
              </li>
            @endforeach
            <!-- single slide item -->
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              @foreach ($firstCategories as $firstCategory)
                <div class="col-md-5 no-padding">                
                    <div class="aa-promo-left">
                    <div class="aa-promo-banner">                    
                        <img src="{{ asset($firstCategory->image) }}" alt="img">                    
                        <div class="aa-prom-content">
                        <span>75% Off</span>
                        <h4><a href="{{$firstCategory->slug }}">For {{ $firstCategory->name }}</a></h4>                      
                        </div>
                    </div>
                    </div>
                </div>
              @endforeach
              
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                  <div class="aa-promo-right">
                    @foreach ($fourCategories as $category)
                        <div class="aa-single-promo-right">
                            <div class="aa-promo-banner">                      
                            <img src="{{ asset($category->image) }}" alt="img">                      
                            <div class="aa-prom-content">
                                <span>Exclusive Item</span>
                                <h4><a href="{{$category->slug }}">For {{$category->name }}</a></h4>                        
                            </div>
                            </div>
                        </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">




                <!-- start prduct navigation -->
                  <ul class="nav nav-tabs aa-products-tab">
                    @if(isset($categories[0]))
                    @foreach ($categories as $key => $category)
                      <li><a href="#cat-{{ $category->id }}" data-toggle="tab">{{ $category->name }}</a></li>
                    @endforeach
                    @endif
                  </ul>
                  <!-- Tab panes -->

                  {{-- new  --}}
                  <div class="tab-content">
                    <!-- Start men product category -->
                    @if(isset($categories[0]))
                    @foreach ($categories as $key => $category)
                      <div class="tab-pane fade {{ $key == 0 ? 'in active' : '' }}" id="cat-{{ $category->id }}">
                        @if(isset($category->products[0]))
                        <ul class="aa-product-catg">
                          <!-- start single product item -->

                          @foreach ($category->products->take(8) as $product)
                            <li>
                              <figure>
                                <a class="aa-product-img" href="{{ route('product.detail',[$product->slug]) }}"><img src="{{ asset($product->image) }}" alt="polo shirt img"></a>
                               <!-- start Add to Cart Option -->
                                <a class="aa-add-card-btn" href="javascript:void(0)" onclick="homeAddToCard('{{ $product->id }}','{{ (isset($product->attributes[0]) ? $product->attributes[0]->size->size : 0) }}','{{ (isset($product->attributes[0]) ? $product->attributes[0]->color->color : 0) }}')" ><span class="fa fa-shopping-cart"></span>Add To Cart</a>

                                <figcaption>
                                  <h4 class="aa-product-title"><a href="{{ route('product.detail',[$product->slug]) }}">{{ $product->name }}</a></h4>
                                  <span class="aa-product-price">
                                    ${{ isset($product->attributes[0]) ? $product->attributes[0]->price : 0 }}
                                  </span>
                                  <br>
                                  <span class="aa-product-price">
                                    ${{ isset($product->attributes[0]) ? $product->attributes[0]->color->color.', ' : '' }}
                                  </span>
                                  <span class="aa-product-price">
                                    {{ isset($product->attributes[0]) ? $product->attributes[0]->size->size : '' }}
                                  </span>
                                </figcaption>
                              </figure>                         
                              {{-- <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                              </div> --}}
                              <!-- product badge -->
                              <span class="aa-badge aa-sold-out" href="#">Sold Out!</span>
                            </li>
                          @endforeach              
                        </ul>
                        @endif
                      </div>
                    @endforeach
                    @endif              
                  </div>
                  <!-- quick view modal -->         
                  {{-- new  --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{ asset('front') }}/img/fashion-banner.jpg" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#discounted" data-toggle="tab">Discounted</a></li>
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#trending" data-toggle="tab">Trending</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="discounted">
                  @if(isset($discounters[0]))
                    <ul class="aa-product-catg aa-popular-slider">
                      <!-- start single product item -->
                      @foreach ($discounters as $product)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{ route('product.detail',[$product->slug]) }}"><img src="{{ asset($product->image) }}" alt="polo shirt img"></a>
                            <a class="aa-add-card-btn" href="javascript:void(0)" onclick="homeAddToCard('{{ $product->id }}','{{ (isset($product->attributes[0]) ? $product->attributes[0]->size->size : 0) }}','{{ (isset($product->attributes[0]) ? $product->attributes[0]->color->color : 0) }}')" ><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{ route('product.detail',[$product->slug]) }}">{{ $product->name }}</a></h4>
                              <span class="aa-product-price">
                                ${{ isset($product->attributes[0]) ? $product->attributes[0]->price : 0 }}  
                              </span><span class="aa-product-price"><del>
                                ${{ isset($product->attributes[0]) ? $product->attributes[0]->mrp : 0 }}  
                              </del></span>
                            </figcaption>
                          </figure>                     
                          <div class="aa-product-hvr-content">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                            <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                          </div>
                          <!-- product badge -->
                          <span class="aa-badge aa-sale" href="#">SALE!</span>
                        </li>
                      <!-- start single product item -->     
                      @endforeach                                                                    
                    </ul>
                  
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                  @endif
                </div>
                
               
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                  @if(isset($features[0]))
                 <ul class="aa-product-catg aa-featured-slider">
                  @foreach ($features as $product)
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ route('product.detail',[$product->slug]) }}"><img src="{{ asset($product->image) }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="{{ route('product.detail',[$product->slug]) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="{{ route('product.detail',[$product->slug]) }}">{{ $product->name }}</a></h4>
                          <span class="aa-product-price">
                            ${{ isset($product->attributes[0]) ? $product->attributes[0]->price: 0 }}
                          </span><span class="aa-product-price"><del>
                            ${{ isset($product->attributes[0]) ? $product->attributes[0]->mrp: 0 }}
                          </del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                     <!-- start single product item -->
                     @endforeach                                                                
                  </ul>
                 
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                  @endif
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="trending">
                  @if(isset($trendies[0]))
                  <ul class="aa-product-catg aa-latest-slider">
                    @foreach ($trendies as $product)
                    <!-- start single product item -->
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{ route('product.detail',[$product->slug]) }}"><img src="{{ asset($product->image) }}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn"href="{{ route('product.detail',[$product->slug]) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="{{ route('product.detail',[$product->slug]) }}">{{ $product->name }}</a></h4>
                          <span class="aa-product-price">
                            ${{ isset($product->attributes[0]) ? $product->attributes[0]->price : 0 }}  
                          </span><span class="aa-product-price"><del>
                            ${{ isset($product->attributes[0]) ? $product->attributes[0]->mrp : 0 }}  
                          </del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    @endforeach  
                     <!-- start single product item -->                                                                                  
                  </ul>
                   <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                   @endif
                  </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('front') }}/img/testimonial-img-2.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('front') }}/img/testimonial-img-1.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>KEVIN MEYER</p>
                    <span>CEO</span>
                    <a href="#">Alphabet</a>
                  </div>
                </div>
              </li>
               <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{ asset('front') }}/img/testimonial-img-3.jpg" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Luner</p>
                    <span>COO</span>
                    <a href="#">Kinatic Solution</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{ asset('front') }}/img/promo-banner-1.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{ asset('front') }}/img/promo-banner-3.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                     <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>         
                  </div>
                </div>
              </div>
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{ asset('front') }}/img/promo-banner-1.jpg" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
              @foreach ($brands as $brand)
              <li><a href="javascript:void(0)"><img src="{{ asset($brand->image) }}" alt="wordPress img"></a></li>
              @endforeach
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

{{-- hidden input for add to card --}}
<input type="hidden" value="1" id="product_quantity" >
<!-- this is actually confiusion part see on add to card option 
quantity get value on product_quantity id on product page so that's why we need to declear 
constant value in home page-->
<form id="frmAddCart" action="{{ route('add_to_cart.post') }}">
<input type="hidden" id="size_id"  name="size" >
<input type="hidden" id="color_id"  name="color" >
<input type="hidden" id="quantity"  name="quantity" >
<input type="hidden" id="product_id" name="product_id" >
@csrf
</form>
{{-- end hidden input --}}
@endsection