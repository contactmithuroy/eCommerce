
 
  /* ----------------------------------------------------------- */
  /*  13. CHANGE PHOTO DEPEND ON COLOR
  /* ----------------------------------------------------------- */      

  function change_product_color_image(img,color){
    $('#color_id').val(color);
    jQuery('.simpleLens-big-image-container').html('<a data-lens-image="'+img+'" class="simpleLens-lens-image"><img src="'+img+'" class="simpleLens-big-image"></a>');
  
  }
    /* ----------------------------------------------------------- */
  /*  13. SHOW COLOR RELATED ON SIZE
  /* ----------------------------------------------------------- */      

  function showColor(size)
  {
    //  alert(size);
    $('#size_id').val(size);
    $('.product_color_hide').hide();
    $('.size_'+size).show();
    $('.size_link').css('border','1px solid #ddd');
    $('#size_'+size).css('border','1px solid red');
  }

    /* ----------------------------------------------------------- */
  /*  13.Home Page ADD TO CARD OPERATION ON PRODUCT PAGE
  /* ----------------------------------------------------------- */      
    function homeAddToCard(id,size,color){
       $('#size_id').val(size);
        $('#color_id').val(color);
        //call addd to card function again
        addToCard(id,size,color)
    }

    /* ----------------------------------------------------------- */
  /*  13. ADD TO CARD OPERATION ON PRODUCT PAGE
  /* ----------------------------------------------------------- */      
  function addToCard(id,size_str_id,color_str_id){
    var size_id = $('#size_id').val();
    var color_id = $('#color_id').val();
  
    if(size_str_id == 0 && color_str_id == 0){
      size_id = 'no';
      color_id = 'no';
   
    }
    if(size_id == '' && size_id != 'no'){
      $('#add_to_card_massage').html('<div class="alert alert-danger myMargin" role="alert">Select your size please!</div>');
    }else if(color_id == '' && color_id != 'no' ){
      $('#add_to_card_massage').html('<div class="alert alert-danger myMargin" role="alert">Select your color please!</div>');
    }else{
      
      $('#product_id').val(id);
      $('#quantity').val($('#product_quantity').val());
      console.log($('#frmAddCart').serialize());
  
      $.ajax({
          type:"POST",
          url:$('#frmAddCart').attr('action'),
          data:$('#frmAddCart').serialize(),  
          success: function(response){
              console.log(response);  
              $('#add_to_card_massage').html('<div class="alert alert-success myMargin" role="alert">'+response.massage+'!</div>');
          }
      });
  
    }
  }
  /* ----------------------------------------------------------- */
  /*  13. Update Cart Items Quantity
  /* ----------------------------------------------------------- */
  function update_quantity(product_id,size,color,productAtt_id,pice){
    $('#size_id').val(size);
    $('#color_id').val(color);
    $('#product_id').val(product_id);
    var quantity = $('#quantity_'+product_id+productAtt_id).val();
    $('#product_quantity').val(quantity);
    // call to add to function
    addToCard(product_id,size,color)
    // change total price
    $('#total_price_'+product_id+productAtt_id).html(pice*quantity);
    console.log(product_id);
    console.log('#quantity_'+product_id+productAtt_id);

    // quantity_{{ $cart_product->id }}{{ isset($cart_product->productAtt_id) ? $cart_product->productAtt_id :0

  }
    /* ----------------------------------------------------------- */
  /*  13. Cart Items Delete
  /* ----------------------------------------------------------- */      
 function remove_cart_item(id){
   $('#cart_item_'+id).remove();
   console.log(id); 

   $.ajax({
    type:"POST",
    url:"{{ route('item.delete') }}",
    data:{
      cart_id:id,
    },
    success: function(response){
      console.log(response);  
      $('#responses_massage').html('<div class="alert alert-success myMargin" role="alert">'+response.massage+'!</div>'); 
  }
   });
 }