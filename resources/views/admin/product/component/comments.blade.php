<div class="flex-row-fluid ml-lg-8">
    <div class="card card-custom gutter-b example example-compact">

        <div class="card-header">
            <h3 class="card-title">{{__('cp.comments')}}</h3>
            <button type="button" class="btn btn-sm btn-danger mt-5 mb-5" href="#deleteAll" role="button"
                    data-toggle="modal">
                <i class="flaticon-delete"></i>
                <span>{{__('cp.delete')}}</span>
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-hover tableWithSearch" id="tableWithSearch">
                <thead>
                <tr>
                    <th class="wd-1p no-sort">
                        <div class="checkbox-inline">
                            <label class="checkbox">
                                <input type="checkbox" name="checkAll"/>
                                <span></span></label>
                        </div>
                    </th>
                    <th class="wd-5p"> {{ucwords(__('user'))}}</th>
                    <th class="wd-5p"> {{ucwords(__('description'))}}</th>
                    <th class="wd-10p"> {{ucwords(__('created'))}}</th>
                    <th class="wd-10p"> {{ucwords(__('updated'))}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($item->productComments as $one)
                    <tr class="odd gradeX" id="tr-{{$one->id}}">
                        <td class="v-align-middle wd-5p">
                            <div class="checkbox-inline">
                                <label class="checkbox">
                                    <input type="checkbox" value="{{$one->id}}" class="checkboxes"
                                           name="chkBox"/>
                                    <span></span></label>
                            </div>
                        </td>
                        <td class="v-align-middle wd-25p">@php
                                $username=  \App\Models\User::where('id',$one->user_id)->first()->user_name;
                            @endphp
                            {{$username}}</td>
                        <td class="v-align-middle wd-25p">{{$one->description}}</td>
                        <td class="v-align-middle wd-10p">{{$one->created_at->format('Y-m-d') ?? ''}}</td>
                        <td class="v-align-middle wd-10p">{{$one->updated_at->format('Y-m-d') ?? ''}}</td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

