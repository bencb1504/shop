@if(!empty($products))
  @foreach($products as $product)
    @php
      $path = $product['imageDefault']['0']['path'];
      $img = asset('assets/web/images/products/').'/' . $path;
      $id = $product['id'];
    @endphp
    <div class="product">
      <article> 
        <a href="{{ route('product_detail', $id) }}">
          <img class="img-responsive" src="{{ $img }}" alt="" > 
        </a>
        @if(!empty($product['sale']))
          <span class="sale-tag">{{ $product['sale']['percent'] }} %</span>
        @endif
        @if(!$product['is_hot'])
          <span class="new-tag {{ !empty($product['sale'])? 'new-tag-custom' : '' }}">New</span>
        @endif
        <span class="tag">{{ $product['subCategory'] }}</span> 
        <a href="#." class="tittle">{{ $product['title'] }}</a> 
        <p class="rev"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> <i class="fa fa-star"></i>
          <span class="margin-left-10">5 Review(s)</span>
        </p>
        
        <div class="price">${{ round($product['price']) }} <span>$200.00</span></div>
        <a href="#." class="cart-btn"><i class="icon-basket-loaded"></i></a> </article>
    </div>
  @endforeach
@endif