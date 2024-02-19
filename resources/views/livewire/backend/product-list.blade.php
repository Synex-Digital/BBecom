<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Product List </h2>
            {{-- <p>Here Your All Catego.</p> --}}
        </div>
        <div>
            <input type="text" placeholder="Search order ID" class="form-control" wire:model.live="search">
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control" wire:model.live="search">
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Category</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Draft</option>
                    </select>
                </div>
            </div>
        </header> <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Product Name</th>
                            {{-- <th scope="col">Category Name</th> --}}
                            <th scope="col">Image</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Status</th>
                            <th scope="col">Market Status</th>
                            <th scope="col" class="text-end"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($requests as $key => $request)
                            <tr>
                                <td><b>{{ $request->name }}</b></td>
                                {{-- <td><b>{{ $request->category ? $request->category->category_name : 'Unknow' }}</b></td> --}}
                                <td>
                                    @if ($request->images != null)
                                        @foreach ($request->images as $img)
                                            <img class="rounded" style="width: 30px; height: 30px;"
                                                src="{{ asset('files/product/' . $img->image) }}" alt="">
                                        @endforeach
                                    @endif
                                </td>
                                <td><b> <span>৳</span> {{ $request->price }} </b></td>
                                <td>
                                    <span
                                        class="badge bg-info text-dark">{{ $request->stock_status == 1 ? 'In Stock' : 'Out of Stock' }}</span>
                                </td>
                                <td>
                                    <span
                                        class="badge bg-success text-dark">{{ $request->status == 1 ? 'Active' : 'Draft' }}</span>
                                </td>

                                <td>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Feature</label>
                                        <input class="form-check-input" wire:click="featured({{ $request->id }})"
                                            type="checkbox" id="flexSwitchCheckDefault"
                                            {{ $request->featured == 1 ? 'checked' : '' }}>
                                    </div><br>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Popular</label>
                                        <input class="form-check-input" wire:click="popular({{ $request->id }})"
                                            type="checkbox" id="flexSwitchCheckDefault"
                                            {{ $request->popular == 1 ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('product.edit', $request->id) }}" class="badge p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M2 12c0 1.64.425 2.191 1.275 3.296C4.972 17.5 7.818 20 12 20c4.182 0 7.028-2.5 8.725-4.704C21.575 14.192 22 13.639 22 12c0-1.64-.425-2.191-1.275-3.296C19.028 6.5 16.182 4 12 4C7.818 4 4.972 6.5 3.275 8.704C2.425 9.81 2 10.361 2 12"
                                                opacity=".5" />
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M8.25 12a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0m1.5 0a2.25 2.25 0 1 1 4.5 0a2.25 2.25 0 0 1-4.5 0"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                    <a href="" class="rounded font-sm p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m12 18l4-4l-1.4-1.4l-1.6 1.6V10h-2v4.2l-1.6-1.6L8 14zM5 8v11h14V8zm0 13q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25zm6.6 7.5" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- table-responsive //end -->
        </div> <!-- card-body end// -->
    </div> <!-- card end// -->
    <div class="pagination-area mt-15 mb-50">

    </div>
</section>
