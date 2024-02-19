<form action="{{ route('csv.download') }}" method="POST" class="content-main">
    @csrf
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order List </h2>
            <p>Lorem ipsum dolor sit amet.</p>
        </div>
        <div>
            <input type="text" wire:model.live="search"  placeholder="Search order ID" class="form-control bg-white">
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" wire:model.live="search" placeholder="Search..." class="form-control">
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select" wire:model.live="status">
                        <option value="">Status</option>
                        <option value="pending" {{ $status == 'pending'?'selected':'' }}>Pending</option>
                        <option value="processing" {{ $status == 'processing'?'selected':'' }}>Processing</option>
                        <option value="shipping" {{ $status == 'shipping'?'selected':'' }}>Shipping</option>
                        <option value="return" {{ $status == 'return'?'selected':'' }}>Return</option>
                        <option value="cancel" {{ $status == 'cancel'?'selected':'' }}>cancel</option>
                        <option value="damage" {{ $status == 'damage'?'selected':'' }}>Damage</option>
                        <option value="delieverd" {{ $status == 'delieverd'?'selected':'' }}>Delieverd</option>
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <button type="submit" class="btn btn-primary">CSV</button>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Number</th>
                            <th scope="col">Total</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col" class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <input class="form-check-input" name="status[]" type="checkbox" value="{{ $order->id }}" wire:model="check">
                                </td>
                                <td><b>
                                    {{ $order->name }} <br>
                                   <span style="font-size: 12px; font-size: 10px; font-weight: 800;">#{{ $order->order_id }}</span>
                                </b></td>
                                <td>{{ $order->number }}</td>
                                <td>৳ {{ $order->price }}</td>
                                <td><span class="badge rounded-pill alert-warning">{{ $order->status }}</span></td>
                                <td>{{ $order->created_at->format('D M y') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.order.view',$order->id) }}" class="btn btn-md rounded font-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- table-responsive //end -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    <div class="pagination-area mt-15 mb-50">
        <nav aria-label="Page navigation example">
            {{ $orders->links('livewire::bootstrap') }}
        </nav>
    </div>
</form> <!-- content-main end// -->
