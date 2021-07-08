@extends('front.layout')
@section('cart','cart')
@section('body')


 <!-- Cart view section -->
 <section id="cart-view">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="cart-view-area">
          <div class="cart-view-table">
            <form action="">
              <div class="table-responsive">
                 <table class="table">
                   <thead>
                     <tr>
                       
                       <th>Image</th>
                       <th>Product</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Total</th>
                       <th>Remove</th>
                     </tr>
                   </thead>
                   <tbody>
                     @foreach ($cart_products as $cart_product)
                     <tr id="cart_item_{{ $cart_product->id }}">
                      <td><a href="/product/{{ isset($cart_product->products[0]) ? $cart_product->products[0]->slug : '' }}"><img src="{{asset($cart_product->products[0]->image)}}" alt="img"></a></td>
                      <td><a class="aa-cart-title" href="/product/{{ isset($cart_product->products[0]) ? $cart_product->products[0]->slug : '' }}">{{ isset($cart_product->products[0]) ? $cart_product->products[0]->name : '' }}</a>
                       @if (isset($cart_product->attributes[0]->size))
                           <br>Size: {{ $cart_product->attributes[0]->size->size }}
                       @endif
                       @if (isset($cart_product->attributes[0]->color))
                           <br>Size: {{ $cart_product->attributes[0]->color->color }}
                       @endif
                      
                      </td>

                      <td>{{ isset($cart_product->attributes[0]) ? $cart_product->attributes[0]->price : 0 }}</td>

                      <td><input id="quantity_{{ $cart_product->product_id }}{{ isset($cart_product->productAtt_id) ? $cart_product->productAtt_id :0 }}"
                        class="aa-cart-quantity" style="width: 75px"
                        onchange="update_quantity('{{ $cart_product->product_id }}','{{ isset($cart_product->attributes[0]->size) ? $cart_product->attributes[0]->size->size : 0  }}','{{ isset($cart_product->attributes[0]->color) ? $cart_product->attributes[0]->color->color : 0  }}','{{ isset($cart_product->productAtt_id) ? $cart_product->productAtt_id :0 }}','{{ isset($cart_product->attributes[0]) ? $cart_product->attributes[0]->price : 0 }}')"
                        type="number" 
                        value="{{ $cart_product->quantity }}">
                      </td>
                       {{-- totla price --}}
                      <td id="total_price_{{ $cart_product->product_id }}{{ isset($cart_product->productAtt_id) ? $cart_product->productAtt_id :0 }}">
                        @php
                            echo ((isset($cart_product->attributes[0]) ? $cart_product->attributes[0]->price : 0 ) * ($cart_product->quantity));
                        @endphp
                      </td>
                      {{-- <form action="{{ route('item.delete') }}" id="delete_item">@csrf</form> --}}
                      <td><a class="remove" href="javascript:void(0)" id="cart_no_{{ $cart_product->id }}" onclick="remove_cart_item('{{ $cart_product->id }}','{{ $cart_product->product_id }}','{{ isset($cart_product->attributes[0]->size) ? $cart_product->attributes[0]->size->size : 0  }}','{{ isset($cart_product->attributes[0]->color) ? $cart_product->attributes[0]->color->color : 0  }}')"><fa class="fa fa-close"></fa></a></td>
                    </tr>
                     @endforeach
                     <div id="responses_massage"></div>
                     <tr>
                       <td colspan="6" class="aa-cart-view-bottom">
                         <div class="aa-cart-coupon">
                           <input class="aa-coupon-code" type="text" placeholder="Coupon">
                           <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                         </div>
                         <input class="aa-cart-view-btn" type="button" value="Checkout">
                       </td>
                     </tr>
                     </tbody>
                 </table>
               </div>
            </form>
            <!-- Cart Total view -->
            <div class="cart-view-total">
              <h4>Cart Totals</h4>
              <table class="aa-totals-table">
                <tbody>
                  <tr>
                    <th>Subtotal</th>
                    <td>$450</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td>$450</td>
                  </tr>
                </tbody>
              </table>
              <a href="#" class="aa-cart-view-btn">Proced to Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->
{{-- hidden input for add to card --}}
<input type="hidden" value="1" id="product_quantity" >
constant value in home page-->
<form id="frmAddCart" action="{{ route('add_to_cart.post') }}">
<input type="hidden" id="size_id"  name="size" >
<input type="hidden" id="color_id"  name="color" >
<input type="hidden" id="quantity"  name="quantity" >
<input type="hidden" id="product_id" name="product_id" >
@csrf
</form>
@endsection
@section('style')
   <style>
      .myMargin{
        margin-top:10px;
    }
   </style>
@endsection
@section('script')
  <script>


  </script>  
@endsection