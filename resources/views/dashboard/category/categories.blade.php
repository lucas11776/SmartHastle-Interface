@extends('layouts.dashboard')
@inject('categories', App\Category)
@section('content')
    <!-- Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">
            <i class="fas fa-list text-primary"></i> Categories
        </h1>
    </div>
    <div class="row justify-content-center pt-4 pb-4">
        <div class="col-sm-8 col-md-6 col-lx-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center active">
                    <span class="font-weight-bolder">
                        Categories.
                    </span>
                    <div class="dropdown">
                        <button class="btn btn-circle btn-light"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">
                            <span class="fas fa-plus-circle"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right"
                             style="min-width: 350px;"
                             aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-item">
                                <div class="input-group">
                                    <input type="text"
                                           class="form-control"
                                           placeholder="Add Category Category...">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">
                                            <i class="fas fa-plus-square"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @foreach($categories::all() as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <div class="dropdown">
                            <button class="btn btn-circle btn-primary"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                <span class="fas fa-edit"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right"
                                 style="min-width: 350px;"
                                 aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-item">
                                    <div class="input-group">
                                        <input type="text"
                                               class="form-control"
                                               placeholder="{{ $category->name }} to ..."
                                               value="{{ $category->name }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <button class="btn btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
