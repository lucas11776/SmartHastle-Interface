@inject('categories', 'App\Category')
@extends('layouts.dashboard')
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-cloud-upload-alt text-primary"></i> Upload
        </h1>
    </div>
    <div class="row justify-content-center pt-2 pb-4">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <form method="POST"
                  action="{{ url('product') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    @if($categories::count() == 0)
                        <div class="offset-sm-4 col-sm-8">
                            <div class="alert alert-info p-1 pl-2 pr-2">
                            <span class="font-weight-light small">
                                <i class="fas fa-info-circle"></i>
                                Please create a category to be able to upload a product.
                            </span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="image"
                           class="col-sm-4 col-form-label">
                        Picture. <span class="text-danger" title="required">*</span>
                    </label>
                    <div class="col-sm-8">
                        <input type="file"
                               class="form-control-file @error('image') is-invalid @enderror"
                               id="image"
                               name="image">
                        @error('image')
                        <span class="invalid-feedback"
                              role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
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
                               value="{{ old('name') }}"
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
                               value="{{ old('brand') }}"
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
                            @if($categories::count() == 0)
                                <option>Create a category to upload product.</option>
                            @else
                                @if(old('category_id') AND $category = $categories->where('id', old('category_id'))->first())
                                    <option value="{{ $category->id }}">
                                        {{ $category->name  }}
                                    </option>
                                @endif
                                    @foreach($categories::all() as $category)
                                        @if($category->id != old('category_id'))
                                            <option value="{{ $category->id }}">
                                                {{ $category->name  }}
                                            </option>
                                        @endif
                                @endforeach
                            @endif
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
                               value="{{ old('price') }}"
                               type="number">
                        @error('price')
                        <span class="invalid-feedback"
                              role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="discount"
                           class="col-sm-4 col-form-label">
                        Discount.
                    </label>
                    <div class="col-sm-8">
                        <input id="discount"
                               name="discount"
                               placeholder="Product discount"
                               class="form-control  @error('discount') is-invalid @enderror"
                               value="{{ old('discount') }}"
                               type="text">
                        @error('discount')
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
                                      class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
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
                        <button name="submit" type="submit" class="btn btn-primary">
                            <i class="fas fa-upload"></i> Upload
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
