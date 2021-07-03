@extends('front.layout')
@section('body')
  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{asset($product->image)}}" class="simpleLens-lens-image"><img src="{{asset($product->image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          {{-- @foreach ($product->attributes as $item)
                            <a data-big-image="{{asset($item->image_attribute)}}" data-lens-image="{{asset($item->image_attribute)}} class="simpleLens-thumbnail-wrapper" href="#">
                                <img src="{{asset($item->image_attribute)}}">
                            </a>  
                          @endforeach --}}
                          <a data-big-image="{{asset('front')}}/img/view-slider/medium/polo-shirt-1.png" data-lens-image="{{asset('front')}}/img/view-slider/large/polo-shirt-1.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{asset('front')}}/img/view-slider/thumbnail/polo-shirt-1.png">
                          </a>                                    
                        
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{ $product->name }}</h3>
                    <div class="aa-price-block">
                        <span class="aa-product-price">
                            <del>
                                ${{ isset($product->attributes[0]) ? $product->attributes[0]->mrp : 0 }}
                            </del>
                            
                        </span>
                        
                        <span class="aa-product-view-price">
                            &nbsp;&nbsp; ${{ isset($product->attributes[0]) ? $product->attributes[0]->price : 0 }}
                        </span>
                        <p class="aa-product-avilability">
                          Avilability: @if( (isset($product->attributes[0]) ? $product->attributes[0]->quantity : 0) != 0 ) 
                            <span>In stock</span>
                          @else
                            <span> No stock</span> 
                          @endif 
                        </p>
                    </div>
                    <p>Model: <a href="javascript:void(0)">{{ $product->model}}</a></p>
                    <p>{!! $product->short_description !!}</p>
                    @if(isset($product->attributes[0]->size))
                        <h4>Size</h4>
                        <div class="aa-prod-view-size">
                            @foreach ($product->attributes as $item)
                            <a href="javascript:void(0)">{{ $item->size->size }}</a>
                            @endforeach
                        </div>
                    @endif
                    @if(isset($product->attributes[0]->color))
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                        @foreach ($product->attributes as $item)
                        <a href="javascript:void(0)" class="aa-color-{{ strtolower($item->color->color) }}"></a>
                        @endforeach
                    </div>
                    @endif
                    {{-- <h4>Color</h4>
                    <div class="aa-color-tag">
                      <a href="#" class="aa-color-green"></a>
                      <a href="#" class="aa-color-yellow"></a>
                      <a href="#" class="aa-color-pink"></a>                      
                      <a href="#" class="aa-color-black"></a>
                      <a href="#" class="aa-color-white"></a>                      
                    </div> --}}
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                        Dalivary: <a href="#">Arround {{ $product->lead_time}} days</a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#tecnical_description" data-toggle="tab">Tecnical Description</a></li>
                <li><a href="#warranty" data-toggle="tab">Warranty</a></li>
                <li><a href="#review" data-toggle="tab">Reviews</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                    {!! $product->description !!}
                </div>

                <div class="tab-pane fade" id="tecnical_description">
                    {!! $product->technical_specification !!}
                </div>

                <div class="tab-pane fade" id="warranty">
                    <p>{{ $product->warranty }}</p>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="{{asset('front')}}/img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="{{asset('front')}}/img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach ($related as $product)
                <li>
                    <figure>
                      <a class="aa-product-img" href="{{ route('product.detail',[$product->slug]) }}"><img src="{{asset($product->image)}}" alt="polo shirt img"></a>
                      <a class="aa-add-card-btn"href="{{ route('product.detail',[$product->slug]) }}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                       <figcaption>
                        <h4 class="aa-product-title"><a href="{{ route('product.detail',[$product->slug]) }}">{{ $product->name }}</a></h4>
                        <span class="aa-product-price">
                            ${{ isset($product->attributes[0]) ? $product->attributes[0]->price : 0 }}
                        </span>
                        <span class="aa-product-price">
                            <del>
                                ${{ isset($product->attributes[0]) ? $product->attributes[0]->mrp : 0 }}
                            </del>
                        </span>
                        <br>
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
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                @endforeach
                
                 <!-- start single product item -->
                                   
                 
              </ul>
              <!-- quick view modal -->                  
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">                      
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">                              
                          <div class="aa-product-view-slider">                                
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                  <div class="simpleLens-big-image-container">
                                      <a class="simpleLens-lens-image" data-lens-image="{{asset('front')}}/img/view-slider/large/polo-shirt-1.png">
                                          <img src="{{asset('front')}}/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                      </a>
                                  </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="{{asset('front')}}/img/view-slider/large/polo-shirt-1.png"
                                     data-big-image="{{asset('front')}}/img/view-slider/medium/polo-shirt-1.png">
                                      <img src="{{asset('front')}}/img/view-slider/thumbnail/polo-shirt-1.png">
                                  </a>                                    
                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="{{asset('front')}}/img/view-slider/large/polo-shirt-3.png"
                                     data-big-image="{{asset('front')}}/img/view-slider/medium/polo-shirt-3.png">
                                      <img src="{{asset('front')}}/img/view-slider/thumbnail/polo-shirt-3.png">
                                  </a>

                                  <a href="#" class="simpleLens-thumbnail-wrapper"
                                     data-lens-image="{{asset('front')}}/img/view-slider/large/polo-shirt-4.png"
                                     data-big-image="{{asset('front')}}/img/view-slider/medium/polo-shirt-4.png">
                                      <img src="{{asset('front')}}/img/view-slider/thumbnail/polo-shirt-4.png">
                                  </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                        
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div>
              <!-- / quick view modal -->   
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->

@endsection