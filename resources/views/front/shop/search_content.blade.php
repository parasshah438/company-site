<div class="product">
    @if (count($products) > 0)
        <ul>
            @foreach ($products as $key => $product)
                <li>
                    <a href="{{ route('shopdetail',$product->sku) }}">
                        <div class="d-flex search-product align-items-center">
                            <div class="image" style="background-image:url('{{asset('public/product/mainimage')}}/{{$product->thumbnail}}');">
                            </div>
                            <div class="w-100 overflow--hidden">
                                <div class="product-name text-truncate">
                                    {{ __($product->name) }}
                                </div>
                                <div class="clearfix">
                                    <div class="price-box float-left">
                                        <div class="product-price">₹ {{$product->price }}</div>
                                        <span class="product-price strong-600"></span>
                                    </div>
                                    {{-- <div class="stock-box float-right">
                                        @php
                                            $qty = 0;
                                            foreach (json_decode($product->variations) as $key => $variation) {
                                                $qty += $variation->qty;
                                            }
                                        @endphp
                                        @if(count(json_decode($product->variations, true)) >= 1)
                                            @if ($qty > 0)
                                                <span class="badge badge-pill bg-green">In stock</span>
                                            @else
                                                <span class="badge badge badge-pill bg-red">Out of stock</span>
                                            @endif
                                        @endif
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>

