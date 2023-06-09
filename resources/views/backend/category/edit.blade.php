@extends('layouts.backend.main')

@section('content')
    <div class="content-page teacher-page">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title"></h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('layouts.backend.structures._notification')

                            <div class="card-body__head d-flex">
                                <h5 class="card-title">Cập nhật danh mục</h5>
                                <a href="{{backendRouter('category.list')}}">
                                    <button type="button" class="btn btn-cyan btn-sm">Quay lại</button>
                                </a>
                            </div>

                            <div id="zero_config_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="card">
                                    <form class="form-horizontal"
                                          action="{{backendRouter('category.update', ['id' => $entity->getKey()])}}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf

                                        @include('layouts.backend.structures._error_validate')

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group row">
                                                        <label for="fname"
                                                               class="col-sm-3 text-right control-label col-form-label">Tên
                                                            category <span
                                                                    class="text-danger">(*)</span></label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control" name="name"
                                                                   value="{{ $entity->name }}"
                                                                   placeholder="Nhập tên category">
                                                        </div>
                                                    </div>

                                                    @if ($entity->getKey())
                                                        <div class="form-group row">
                                                            <label for="fname"
                                                                   class="col-sm-3 text-right control-label col-form-label">Slug
                                                                <span class="text-danger">(*)</span></label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" name="slug"
                                                                       required value="{{ $entity->slug }}"
                                                                       placeholder="Nhập slug">
                                                            </div>
                                                        </div>
                                                    @endif

                                                    <div class="form-group row">
                                                        <label for="fname"
                                                               class="col-sm-3 text-right control-label col-form-label">Danh
                                                            mục cha</label>
                                                        <div class="col-sm-8">
                                                            <div class="my-select2">
                                                                <select class="form-control" name="parent_id">
                                                                    <option value="{{ getConfig('parent_id_default') }}" {{is_null(request('parent_id')) ? 'selected' : ''}}>
                                                                        --- Vui lòng chọn ---
                                                                    </option>
                                                                    @foreach($categories as $category)
                                                                        @if ($category->level == 1)
                                                                            <option value="{{$category->id}}" {{ ((int)old('parent_id') == (int)$category->getKey()) ? ' selected' : '' }}>{{$category->name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-top">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group row">
                                                            <label for="fname"
                                                                   class="col-sm-3 text-right control-label col-form-label"></label>
                                                            <div class="col-sm-8">
                                                                <button type="submit" class="btn btn-success">Gửi đi
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
