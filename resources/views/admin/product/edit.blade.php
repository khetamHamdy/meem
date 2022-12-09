@extends('layout.adminLayout')
@section('title')
    {{ucwords(__('cp.product'))}}
@endsection
@section('css')

    <style>
        a:link {
            text-decoration: none;
        }
    </style>

@endsection
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline mr-5">
                        <h3>{{__('cp.edit')}} {{@$item->name}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->
                <div class="d-flex align-items-center">
                    <a href="{{url(getLocal().'/admin/product')}}"
                       class="btn btn-secondary  mr-2">{{__('cp.cancel')}}</a>
                    <button id="submitButton" class="btn btn-success ">{{__('cp.save')}}</button>
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <form method="post" action="{{url(app()->getLocale().'/admin/product/'.$item->id)}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}
                        <div class="card-header">
                            <h3 class="card-title">{{__('cp.main_info')}}</h3>
                        </div>
                        <div class="row col-sm-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.price')}}</label>
                                            <input type="number" class="form-control form-control-solid"
                                                   name="price" value="{{$item->price}}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.title')}}</label>
                                            <input type="text" class="form-control form-control-solid"
                                                   name="title" value="{{$item->title}}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>{{__('cp.description')}}</label>
                                            <textarea class="form-control ckEditor-y"
                                                      name="description"
                                                      id="order" rows="4" required>{!! $item->description!!}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> {{__('cp.type')}}</label>
                                            <select class="form-control select2" id="roles" name="type"
                                                    required>
                                                @foreach($type as $key => $val)
                                                    <option
                                                        value="{{$key}}" {{$item->type==$key?'selected':''}}>{{$val}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('type'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('type') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> {{__('cp.status')}}</label>
                                            <select class="form-control select2" id="role3" name="status"
                                                    required>
                                                @foreach($status as $key => $val)
                                                    <option
                                                        value="{{$key}}" {{$item->status==$key?'selected':''}}>{{$val}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('status'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label> {{__('cp.category')}}</label>
                                            <select class="form-control select2" id="role" name="category_id[]"
                                                    multiple="multiple" required>
                                                {{--                                                @foreach($item->productCategoies as $one)--}}
                                                {{--                                                    <option value="{{$one->category_id}}"--}}
                                                {{--                                                        {{ $one->category_id ?'selected':''}}>--}}
                                                {{--                                                        {{$one->category_id}}</option>--}}
                                                {{--                                                @endforeach--}}

                                                @foreach($categories as $categoryItem)
                                                    <option
                                                        value="{{$categoryItem->id}}"
                                                        {{ (in_array($categoryItem->id, old('category_id', [])) || $item->categories->contains($categoryItem->id)) ? 'selected' : '' }}>
                                                        {{$categoryItem->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                        </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body col-md-12">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{__('cp.image')}}</label>
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_image').click()"
                                             style="cursor:pointer">
                                            <img src="{{asset('uploads/product/'.$item->image)}}" id="editImage" alt="">
                                        </div>
                                        <div class="btn red"
                                             onclick="document.getElementById('edit_image').click()">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <input type="file" class="form-control" name="image"
                                               id="edit_image" value="{{$item->image}}"
                                               style="display:none">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label
                                            class="col-xl-3 col-lg-3 col-form-label">{{__('multiple image')}} </label>
                                        <div class="col-lg-9 col-xl-9">
                                            <input
                                                class="form-control form-control-solid form-control-lg"
                                                name="images[]" type="file" multiple
                                                value="{{ $item->images }}"/>
                                        </div>
                                        <table class="table table-hover tableWithSearch" id="tableWithSearch">
                                            @foreach($item->productImages as $one)

                                                <tr class="prod_image_tr">
                                                    <td class="v-align-middle wd-25p">
                                                        <img src="{{asset($one->image)}}"
                                                             style="height:50px ; width: 200px ; margin: 1rem">
                                                    </td>
                                                    <td class="v-align-middle wd-25p">
                                                        <button type="button"
                                                                class="deleteProductImageBtn btn btn-danger btn-sm text-white"
                                                                value="{{$one->id}}">Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit" id="submitForm" style="display:none"></button>

                    </form>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

@endsection
@section('js')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });
        $(document).on('click', '#submitButton', function () {
            // $('#submitButton').addClass('spinner spinner-white spinner-left');
            $('#submitForm').click();
        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/super-build/ckeditor.js"></script>
    <script>
        @include('admin.settings.editor_script')
    </script>
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function () {

            $(document).on('click', '.deleteProductImageBtn', function () {
                var product_image_id = $(this).val();
                var this_click = $(this);
                alert(product_image_id)
                $.ajax({
                    type: "GET",
                    url: "/admin/" + "product-image/" + product_image_id + "/delete",
                    success: function (response) {
                        alert(response.message);
                        this_click.closest('.prod_image_tr').remove();
                    }
                })
            });
        })
    </script>
@endsection
