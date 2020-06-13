@inject('categories', 'App\Category')
@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-edit text-primary"></i> Edit Product
        </h1>
    </div>
    <div class="row justify-content-center pt-2 pb-4">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <form method="POST"
                  action="{{ url('product/' . $product->id) }}"
                  enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group row pb-4">
                    @foreach($product->images()->limit(3)->get() as $image)
                        <div class="col-4 text-center">
                            <img class="img-profile img-thumbnail shadow"
                             style="height: 100px;"
                             src="{{ $image->url }}">
                        </div>
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="name"
                           class="col-sm-4 col-form-label">
                        Name. <span class="text-danger" title="required">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input id="name"
                               name="name"
                               placeholder="Product Name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ $product->name }}"
                               type="text">
                        @error('name')
                        <span class="invalid-feedback"
                              role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="brand"
                           class="col-sm-4 col-form-label">
                        Brand
                    </label>
                    <div class="col-sm-8">
                        <input id="brand"
                               name="brand"
                               placeholder="Product brand"
                               class="form-control  @error('brand') is-invalid @enderror"
                               value="{{ $product->brand  }}"
                               type="text">
                        @error('brand')
                        <span class="invalid-feedback"
                              role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="category_id"
                           class="col-sm-4 col-form-label">
                        Category. <span class="text-danger" title="required">*</span>
                    </label>
                    <div class="col-sm-8">
                        <select id="category_id"
                                name="category_id"
                                placeholder="Product category"
                                class="form-control  @error('category_id') is-invalid @enderror">
                            @if(old('category_id') AND $category = $categories->where('id', old('category_id'))->first())
                                <option value="{{ $category->id }}">
                                    {{ $category->name  }}
                                </option>
                            @else
                                <option value="{{ $product->category->id }}">
                                    {{ $product->category->name  }}
                                </option>
                            @endif
                            @foreach($categories::all() as $category)
                                @if(old('category_id') != $category->id AND $product->category->id != $category->id)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name  }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="invalid-feedback"
                              role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Price"
                           class="col-sm-4 col-form-label">
                        Price. <span class="text-danger" title="required">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input id="price"
                               name="price"
                               placeholder="Product price"
                               class="form-control @error('price') is-invalid @enderror"
                               value="{{ number_format($product->price, 2)  }}"
                               step=".01">
                        @error('price')
                        <span class="invalid-feedback"
                              role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description"
                           class="col-sm-4 col-form-label">
                        Description. <span class="text-danger" title="required">*</span>
                    </label>
                    <div class="col-sm-8">
                            <textarea id="description"
                                      name="description"
                                      cols="40"
                                      rows="4"
                                      class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback"
                              role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8 text-right">
                        <button name="submit"
                                type="button"
                                class="btn btn-danger"
                                data-toggle="modal"
                                data-target="#delete-product-{{ $product->id }}">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                        <button name="submit" type="submit" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </div>
                </div>
            </form>
            <!-- Delete product model-->
            @include('components.dashboard.product.delete', ['product' => $product])
        </div>
    </div>
@endsection
