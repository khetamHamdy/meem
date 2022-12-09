@extends('layout.adminLayout')
@section('title') {{ucwords(__('cp.admins'))}}
@endsection
@section('css')

@endsection
@section('content')



    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <div class="d-flex align-items-baseline mr-5">
                        <h3>{{ucwords(__('cp.admins'))}}</h3>
                    </div>
                </div>
                <!--end::Info-->
                <!--begin::Toolbar-->


                <div>
                    <div class="btn-group mb-2 m-md-3 mt-md-0 ml-2 ">
                        <button type="button" class="btn btn-secondary" href="#activation" role="button"  data-toggle="modal">
                            <i class="icon-xl la la-check"></i>
                            <span>{{__('cp.activation')}}</span>
                        </button>
                        <button type="button" class="btn btn-secondary" href="#cancel_activation" role="button"  data-toggle="modal">
                            <i class="icon-xl la la-ban"></i>
                            <span>{{__('cp.cancel_activation')}}</span>
                        </button>
                        <button type="button" class="btn btn-secondary" href="#deleteAll" role="button" data-toggle="modal">
                            <i class="flaticon-delete"></i>
                            <span>{{__('cp.delete')}}</span>
                        </button>
                    </div>
                    <a href="{{url(getLocal().'/admin/admins/create')}}" class="btn btn-secondary  mr-2 btn-success">
                        <i class="icon-xl la la-plus"></i>
                        <span>{{__('cp.add')}}</span>
                    </a>
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
                <div class="gutter-b example example-compact">

                    <div class="contentTabel">
                        <button  type="button" class="btn btn-secondar btn--filter mr-2"><i class="icon-xl la la-sliders-h"></i>{{__('cp.filter')}}</button>
                        <div class="container box-filter-collapse" >
                            <div class="card" >
                                <form class="form-horizontal" method="get" action="{{url(getLocal().'/admin/admins')}}">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">{{__('cp.name')}}</label>
                                                <input type="text" value="{{request('name')?request('name'):''}}" class="form-control" name="name" placeholder="{{__('cp.name')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">{{__('cp.email')}}</label>
                                                <input type="text" class="form-control" value="{{request('email')?request('email'):''}}" name="email" placeholder="{{__('cp.email')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="control-label">{{__('cp.mobile')}}</label>
                                                <input value="{{request('mobile')?request('mobile'):''}}" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  type="text" class="form-control" name="mobile" placeholder="{{__('cp.mobile')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn sbold btn-default btnSearch">{{__('cp.search')}}
                                                <i class="fa fa-search"></i>
                                            </button>

                                            <a href="{{url(app()->getLocale().'/admin/admins')}}" type="submit" class="btn sbold btn-default btnRest">{{__('cp.reset')}}
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-header d-flex flex-column flex-sm-row align-items-sm-start justify-content-sm-between">
                            <div>


                            </div>

                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover tableWithSearch" id="tableWithSearch">
                                <thead>
                                <tr>
                                    <th class="wd-1p no-sort">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" name="checkAll" />
                                                <span></span></label>
                                        </div>
                                    </th>

                                <!--{{--                                                        <th class="wd-5p"> {{ucwords(__('cp.image'))}}</th>--}}-->
                                    <th class="wd-25p"> {{ucwords(__('cp.name'))}}</th>
                                    <th class="wd-25p"> {{ucwords(__('cp.email'))}}</th>
                                    <th class="wd-25p"> {{ucwords(__('cp.mobile'))}}</th>
                                    <th class="wd-10p"> {{ucwords(__('cp.status'))}}</th>
                                    <th class="wd-10p"> {{ucwords(__('cp.created_date'))}}</th>
                                    <th class="wd-15p"> {{ucwords(__('cp.action'))}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($items as $one)
                                    <tr class="odd gradeX" id="tr-{{$one->id}}">
                                        <td class="v-align-middle wd-5p">
                                            <div class="checkbox-inline">
                                                <label class="checkbox">
                                                    <input type="checkbox" value="{{$one->id}}" class="checkboxes" name="chkBox" />
                                                    <span></span></label>
                                            </div>
                                        </td>

                                        {{--                                                    <td class="v-align-middle wd-5p"><img src="{{$one->logo}}" width="50px" height="50px"></td>--}}

                                        <td class="v-align-middle wd-25p">{{$one->name}}</td>
                                        <td class="v-align-middle wd-25p">{{$one->email}}</td>
                                        <td class="v-align-middle wd-25p">{{$one->mobile}}</td>
                                        <td class="v-align-middle wd-10p" > <span id="label-{{$one->id}}" class="badge badge-pill badge-{{($one->status == "active")
                                            ? "info" : "danger"}}" id="label-{{$one->id}}">

                                            {{__('cp.'.$one->status)}}
                                        </span>
                                        </td>

                                        <td class="v-align-middle wd-10p">{{$one->created_at->format('Y-m-d')}}</td>

                                        <td class="v-align-middle wd-15p optionAddHours">
                                            <a href="{{url(getLocal().'/admin/admins/'.$one->id.'/edit')}}"
                                               class="btn btn-sm btn-clean btn-icon" title="{{__('cp.edit')}}">
                                                <i class="la la-edit"></i>
                                            </a>
                                            <a href="{{url(getLocal().'/admin/admins/'.$one->id.'/edit_password')}}" class="btn btn-sm btn-clean btn-icon" title="{{__('cp.Change_Password')}}">
                                                <i class="la la-key"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @empty

                                @endforelse


                                </tbody>
                            </table>
{{--                            {{$items->appends($_GET)->links("pagination::bootstrap-4") }}--}}
                        </div>


                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

@endsection
@section('js')

@endsection

@section('script')

@endsection
