@include('admin_area.inc.header')
@include('admin_area.inc.left_menu')

<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/custom_css/admin_panel/list.css') }}">


<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="main-box clearfix">
                <div class="table-responsive">
                    <table class="table user-list">
                        <thead>
                        <tr>
                            <th><span>Title</span></th>
                            <th><span>Category</span></th>
                            <th><span>Created</span></th>
                            <th class="text-center"><span>Status</span></th>
                            <th><span>City</span></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($vacancies as $vacancy)
                            @php
                               $jobCategories = \App\Models\JobCategories::class;
                               $category = \App\Services\Helper::getTableRow($jobCategories, 'ID', $vacancy->CATEGORY_ID);
                               $user = \App\Models\User::class;
                               $company = \App\Services\Helper::getTableRow($user, 'id', $vacancy->COMPANY_ID);
                            @endphp


                            <tr>
                                <td>
                                    <a href="{{ route('admin-vacancy', ['id' => $vacancy->ID]) }}" class="user-link">{{$vacancy->NAME}}</a>
                                </td>
                                <td>{{$category->NAME}}</td>
                                <td>{{$vacancy->created_at->format('Y/m/d')}}</td>
                                @php
                                    $activeStatus = ($vacancy->ACTIVE == 1) ? 'active' : 'not active';
                                @endphp
                                <td class="text-center">
                                    <span class="label label-default">{{$activeStatus}}</span>
                                </td>
                                <td>{{ $vacancy->CITY }}</td>
                                <td style="width: 20%;">
                                    <a href="{{ route('admin-vacancy', ['id' => $vacancy->ID]) }}" class="table-link">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>

                                    <a href="{{ route('admin-delete-entity', ['entity' => 'vacancy', 'id' => $vacancy->ID]) }}"
                                       class="table-link danger">
                                        <span class="fa-stack">
                                            <i class="fa fa-square fa-stack-2x"></i>
                                            <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>

                                    @php
                                        $action = ($vacancy->ACTIVE == 1) ? 'Deactivate' : 'Activate';
                                    @endphp

                                    <a href="{{ route('admin-change-active-status',[
                                             'entity' => 'vacancy',
                                             'id' => $vacancy->ID
                                             ]) }}"
                                       class="table-link link-success">
                                        <span class="fa-stack">{{$action}}</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{--                <ul class="pagination pull-right">
                                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                                </ul>--}}
            </div>
        </div>
    </div>
</div>
@include('admin_area.inc.footer')
