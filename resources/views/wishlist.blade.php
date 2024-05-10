@extends('layouts.base')
@section('content')



<section class="breadcrumb-section section-b-space" style="padding-top:20px;padding-bottom:20px;">
    <ul class="circles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Wishlist</h3>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('app.index')}}">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Cart Section Start -->
{{-- <section class="cart-section section-b-space">
    <div class="container">
        @if($items->count()>0)


        <div class="row">
            <div class="col-md-12 text-center">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">total</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($items as $item)



                        <tr>
                            <td>
                                <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">
                                    <img src="{{asset('assets/images/fashion/product/front')}}/{{$item->model->image}}"
                                        class="blur-up lazyloaded" alt="">
                                </a>
                            </td>
                            <td>
                                <a
                                    href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number"
                                                    value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2>${{$item->model->regular_price}}</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>${{$item->model->regular_price}}</h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control input-number"
                                            value="1">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2 class="td-color">$18.00</h2>
                            </td>
                            <td>
                                <a href="javascript:void(0)">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="col-12 mt-md-5 mt-4">
                <div class="row">
                    <div class="col-sm-7 col-5 order-1">
                        <div class="left-side-button text-end d-flex d-block justify-content-end">
                            <a href="javascript:void(0)"
                                class="text-decoration-underline theme-color d-block text-capitalize">clear
                                all items</a>
                        </div>
                    </div>
                    <div class="col-sm-5 col-7">
                        <div class="left-side-button float-start">
                            <a href="../shop.html" class="btn btn-solid-default btn fw-bold mb-0 ms-0">
                                <i class="fas fa-arrow-left"></i> Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-checkout-section">
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6">
                        <div class="promo-section">
                            <form class="row g-3">
                                <div class="col-7">
                                    <input type="text" class="form-control" id="number" placeholder="Coupon Code">
                                </div>
                                <div class="col-5">
                                    <button class="btn btn-solid-default rounded btn">Apply Coupon</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 ">
                        <div class="checkout-button">
                            <a href="checkout" class="btn btn-solid-default btn fw-bold">
                                Check Out <i class="fas fa-arrow-right ms-1"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="cart-box">
                            <div class="cart-box-details">
                                <div class="total-details">
                                    <div class="top-details">
                                        <h3>Cart Totals</h3>
                                        <h6>Sub Total <span>$26.00</span></h6>
                                        <h6>Tax <span>$5.46</span></h6>

                                        <h6>Total <span>$31.46</span></h6>
                                    </div>
                                    <div class="bottom-details">
                                        <a href="checkout">Process Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @else

        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Your wishlist is empty !</h2>
                <h5 class="mt-">Add items to it now</h5>
                <a href="{{route('shop.index')}}" class="btn btn-warning mt-5">Shop Now</a>
            </div>
        </div>

        @endif
    </div>
</section> --}}


<!-- Cart Section Start -->
<section class="wish-list-section section-b-space">
    <div class="container">
        @if($items->count() > 0)
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table cart-table wishlist-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">availability</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>
                                <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}">
                                    <img src="{{asset('assets/images/fashion/product/front')}}/{{$item->model->image}}"
                                        class=" blur-up lazyload" alt="">
                                </a>
                            </td>
                            <td>
                                <a href="{{route('shop.product.details',['slug'=>$item->model->slug])}}"
                                    class="font-light">{{$item->model->name}}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <p>In Stock</p>
                                    </div>
                                    <div class="col">
                                        <p class="fw-bold">${{$item->model->regular_price}}</p>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">
                                            <a href="javascript:void(0)" class="icon" >
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </h2>
                                        <h2 class="td-color">
                                            <a href="cart.php" class="icon">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="fw-bold">${{$item->model->regular_price}}</p>
                            </td>
                            <td>
                                @if($item->model->stock_status == "instock")
                                <p>In Stock</p>
                                @else
                                <p>Stock Out</p>
                                @endif
                            </td>
                            <td>
                                @if($item->model->stock_status == 'instock')
                                <a href="javascript:void(0)" class="icon" onclick="moveToCart('{{$item->rowId}}')">
                                    <i class="fas fa-shopping-cart"></i>
                                
                                </a>
                                @else
                                <a href="" class="icon disabled" >
                                    <i class="fas fa-shopping-cart"></i>
                                   
                                </a>
                                @endif
                       
                                <a href="javascript:void(0)" class="icon" onclick="removeFromWishList('{{$item->rowId}}')" >
                                    <i class="fas fa-times"></i>
                                 
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-end">
                <a href="javascript:void(0)" onclick="clearWishlist()">Clear All Items</a>
            </div>
        </div>


        @else
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Your wishlist is empty ! </h2>
                <h5 class="mt-3">Add items to it now.</h5>
                <a href="{{route('shop.index')}}" class="btn btn-warning mt-5">Shop Now</a>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- Cart Section End -->

@foreach ($items as $item )

@endforeach



<form id="deleteFromWishlist" action="{{route('wishlist.remove')}}" method="POST">
    @csrf
    @method('delete')
    <input type="hidden" id="rowId" name="rowId" />
</form>

<form action="{{route('wishlist.clear')}}" method="post" id="clearWishlist">
    @csrf
    @method('delete')
   
</form>
<form action="{{route('wishlist.move.to.cart')}}" method="post" id="moveToCart">
    @csrf

    <input type="hidden" id="mrowId" name="rowId" />
   
</form>

@push('scripts')
<script>

    function removeFromWishList(rowId){
        $('#rowId').val(rowId);
       
        $('#deleteFromWishlist').submit();
    }
    function clearWishlist(){
        $('#clearWishlist').submit();
    }

    function moveToCart(rowId){
      
        $('#mrowId').val(rowId);
       
        $('#moveToCart').submit();
    }
    </script>    
@endpush


@endsection