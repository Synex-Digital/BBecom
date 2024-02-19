@extends('backend.master')

@section('content')
<form class="content-main" action="{{ route('admin.order.modify') }}" method="POST">
    @csrf
    <input type="hidden"  name="id" value="{{ $order->id }}">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order detail</h2>
            <p>Details for Order ID: {{ $order->order_id }}</p>
        </div>
    </div>
    <div class="card">
        <header class="card-header">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 mb-lg-0 mb-15">
                    <span>
                        <i class="material-icons md-calendar_today"></i> <b>{{ $order->created_at->format('D, M j, Y, g:iA') }}</b>
                    </span> <br>
                    <small class="text-muted">Order ID: {{ $order->order_id }}</small>
                </div>
                <div class="col-lg-6 col-md-6 ms-auto text-md-end">
                    <select name="status" class="form-select d-inline-block mb-lg-0 mb-15 mw-200">
                        <option value="">Change {{ $order->status }}</option>-
                        {{-- <option value="pending">Pending</option> --}}
                        <option value="processing" {{ $order->status == 'processing'?'selected':'' }}>Processing</option>
                        <option value="shipping" {{ $order->status == 'shipping'?'selected':'' }}>Shipping</option>
                        <option value="return" {{ $order->status == 'return'?'selected':'' }}>Return</option>
                        <option value="cancel" {{ $order->status == 'cancel'?'selected':'' }}>cancel</option>
                        <option value="damage" {{ $order->status == 'damage'?'selected':'' }}>Damage</option>
                        <option value="delieverd" {{ $order->status == 'delieverd'?'selected':'' }}>Delieverd</option>
                    </select>
                    <button type="submit" class="btn btn-primary" name="btn" value="1">Save</button>
                    <button class="btn btn-secondary print ms-2" name="btn" value="2"><i class="icon material-icons md-print"></i></button>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="row mb-50 mt-20 order-info-wrap">
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-person"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Customer</h6>
                            <p class="mb-1">
                                {{ $order->name }} <br>
                                {{ $order->number }}<br>
                                {{ $order->email }}
                            </p>
                            {{-- <a href="#">View profile</a> --}}
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-local_shipping"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Order info</h6>
                            <p class="mb-1">
                                Pay method: Cash on delivery <br>
                                 Status: {{ $order->status }}
                            </p>
                            {{-- <a href="#">Download info</a> --}}
                        </div>
                    </article>
                </div> <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-place"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Deliver to</h6>
                            <p class="mb-1">
                                {{ $order->address }}
                            </p>
                            {{-- <a href="#">View profile</a> --}}
                        </div>
                    </article>
                </div> <!-- col// -->
            </div> <!-- row // -->
            <div class="row">
                <div class="col-lg-7">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="40%">Product</th>
                                    <th width="20%">Unit Price</th>
                                    <th width="20%">Quantity</th>
                                    <th width="20%" class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order->products as $product)
                                    <tr>
                                        <td>
                                            <a class="itemside" href="#">
                                                {{-- <div class="left">
                                                    <img src="assets/imgs/items/1.jpg" width="40" height="40" class="img-xs" alt="Item">
                                                </div> --}}
                                                <div class="info"> {{ $product->product?$product->product->name:'Unknown' }} </div>
                                            </a>
                                        </td>
                                        <td>৳ {{ $product->price }} </td>
                                        <td>৳ {{ $product->qnt }} </td>
                                        <td class="text-end">৳ {{ $product->price * $product->qnt }} </td>
                                    </tr>
                                @empty
                                    No Data Found
                                @endforelse
                                    <tr>
                                        <td colspan="4">
                                            <article class="float-end">
                                                <dl class="dlist">
                                                    <dt>Subtotal:</dt>
                                                    <dd>৳ {{ $product->price * $product->qnt }}</dd>
                                                </dl>
                                                <dl class="dlist">
                                                    <dt>Shipping cost:</dt>
                                                    <dd>৳ {{ $order->shipping?$order->shipping->price:'Unknown' }}</dd>
                                                </dl>
                                                <dl class="dlist">
                                                    <dt>Grand total:</dt>
                                                    <dd> <b class="h5">৳ {{ $order->price }}</b> </dd>
                                                </dl>
                                                <dl class="dlist">
                                                    <dt class="text-muted">Status:</dt>
                                                    <dd>
                                                        <span class="badge rounded-pill alert-success text-success">{{ $order->status }}</span>
                                                    </dd>
                                                </dl>
                                            </article>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div> <!-- table-responsive// -->
                    {{-- <a class="btn btn-primary" href="page-orders-tracking.html">View Order Tracking</a> --}}
                </div> <!-- col// -->
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <div class="box shadow-sm bg-light">
                        <h6 class="mb-15">Payment info</h6>
                        <p>Pending...</p>
                        {{-- <p>
                            <img src="assets/imgs/card-brands/2.png" class="border" height="20"> Master Card **** **** 4768 <br>
                            Business name: Grand Market LLC <br>
                            Phone: +1 (800) 555-154-52
                        </p> --}}
                    </div>
                    <div class="h-25 pt-4">
                        <div class="mb-3">
                            <label>Notes</label>
                            <textarea class="form-control" name="notes" id="notes" placeholder="Type some note">{{ $order->message }}</textarea>
                        </div>
                    </div>
                </div> <!-- col// -->
            </div>
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
</form> <!-- content-main end// -->
@endsection
