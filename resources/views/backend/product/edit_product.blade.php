@extends('backend.master')
@section('content')
    <section class="content-main">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <form action="{{ route('product.update', $request->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12">
                    <div class="content-header">
                        <h5 class="content-title">{{ $request->name }}</h5>
                        <div>
                            <a href="{{ route('product.index') }}" name="btn"
                                class="btn btn-md rounded font-sm hover-up">Back</a>
                            <button type="submit" name="btn" value="0"
                                class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button>
                            <button type="submit" name="btn" value="1"
                                class="btn btn-md rounded font-sm hover-up">Update</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="row">
                        {{-- Left --}}
                        <div class="col-md-8">
                            {{-- Basic --}}
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h4>Basic</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="product_name" class="form-label">Select A Category</label>
                                                    <select class="form-select" name="category_id">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" @if ($request->category) {{ $request->category->id == $category->id ? 'selected' : '' }} @endif>
                                                                {{ $category->category_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="product_name" class="form-label">Product Name </label>
                                                    <input type="text" placeholder="Entire Name" class="form-control"
                                                        name="product_name" value="{{ $request->name }}">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <label for="product_name" class="form-label">Short Description</label>
                                                    <textarea class="form-control" name="short_description" id="" cols="30" rows="10"
                                                        placeholder="Short details"> {{ $request->short_description }}</textarea>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <label for="product_name" class="form-label">Description</label>
                                                    <textarea id="summernote" class="form-control" name="description" id="" cols="30" rows="10"
                                                        placeholder="Short details">{{ $request->description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- card end// -->
                            </div>

                            {{-- SEO --}}
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>SEO Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="product_name" class="form-label">SEO Titile</label>
                                                    <input type="text" placeholder="Entire Email" class="form-control"
                                                        name="seo_title" value="{{ $request->seo_title }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <label for="product_name" class="form-label">SEO Tags</label>
                                                    <input type="text" placeholder="Entire Tags"
                                                        value="{{ $request->seo_tags }}" class="form-control"
                                                        name="seo_tags">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-4">
                                                    <label for="product_name" class="form-label">SEO Description</label>
                                                    <textarea class="form-control" name="seo_description" id="" cols="30" rows="10">{{ $request->seo_description }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        {{-- Right --}}
                        <div class="col-md-4">
                            {{-- Pricing --}}
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4>Pricing / Features</h4>
                                </div>
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Product Price</label>
                                            <input type="number" placeholder="0.00" class="form-control"
                                                value="{{ $request->price }}" name="price">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Discount %</label>
                                            <input type="number" placeholder="0%" class="form-control"
                                                value="{{ $request->discount }}" name="discount">
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Stock Status</label>
                                        <select class="form-select" name="stock_status">
                                            <option value="1" {{ $request->stock_status == 1 ? 'selected' : '' }}>In
                                                Stock</option>
                                            <option value="0" {{ $request->stock_status == 0 ? 'selected' : '' }}>Out
                                                of
                                                Stock</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="col-12">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Services</label>

                                            <div class="mt-2">
                                                @if ($request->services)
                                                    @foreach ($request->services as $service)
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="service[]" type="checkbox"
                                                                value="{{ $service->id }}" id="{{ $service->id }}">
                                                            <label class="form-check-label" style="font-size: 10.5px"
                                                                for="{{ $service->id }}">
                                                                {{ $service->message }} </label>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            {{-- Media --}}
                            @livewire('backend.product-image', ['product_id' => $request->id])

                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4>Video</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <iframe width="100%" src="https://www.youtube.com/embed/{{ $request->link }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Video Link</label>
                                        <input type="text" placeholder="https://" value="{{ $request->link }}"
                                            class="form-control" name="link">
                                    </div>
                                </div>
                            </div>

                        </div>
                        {{-- <div class="card mb-4">
                    <div class="card-header">
                        <h6>Basic</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $request->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Select A Category</label>
                                        <select class="form-select" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"> {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Product Name</label>
                                        <input type="text" placeholder="Entire Name" class="form-control"
                                            name="product_name" value="{{ $request->product_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">SEO Titile</label>
                                        <input type="text" placeholder="Entire Email" class="form-control"
                                            name="seo_title" value="{{ $request->seo_title }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">SEO Tags</label>
                                        <input type="text" placeholder="Entire Tags" class="form-control" name="seo_tags"
                                            value="{{ $request->seo_tags }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">SEO Description</label>
                                        <textarea class="form-control" name="seo_description" id="" cols="30" rows="10">{{ $request->seo_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Product Description</label>
                                        <textarea class="form-control" name="product_description" id="" cols="30" rows="10">{{ $request->product_description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Product Image</label>
                                        <input type="file" class="form-control" name="product_image">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label"></label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label"></label>
                                        <button type="submit"
                                            class="btn btn-light rounded font-sm mr-5 text-body hover-up">+ Admin</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> <!-- card end// --> --}}
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('#summernote').summernote({
                    placeholder: 'Description',
                    tabsize: 2,
                    height: 300
                });
            });
        });
    </script>
@endsection
