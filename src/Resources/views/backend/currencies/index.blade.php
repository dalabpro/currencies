@extends('backend.layout.app')

@section('title'){{ $titleIndex }}@endsection

@push('header')

    <div class="page-header page-header-bordered">
        <h1 class="page-title">@yield('title')</h1>
        <ol class="breadcrumb">
            {!! $breadcrumbs !!}
        </ol>
    </div>

@endpush

@section('content')

    <div class="page-content">
        <div class="panel">

            {{--<div class="panel-heading">--}}
                {{--<h3 class="panel-title">@yield('title')</h3>--}}
                {{--<div class="page-header-actions">--}}
                    {{--@can('delete', $model)--}}
                        {{--<button type="button" class="btn btn-sm btn-outline btn-danger modal-trigger destroy-btn js-delete-items" data-toggle="modal" data-target="#remove">--}}
                            {{--<i class="fa fa-trash" aria-hidden="true"></i>--}}
                            {{--@lang("{$prefix}.general.delete")--}}
                        {{--</button>--}}
                    {{--@endcan--}}

                    {{--{!! Form::open([--}}
                                        {{--'method'=>'post',--}}
                                        {{--'url' => route("{$type}.languages"),--}}
                                        {{--'style' => 'display:inline'--}}
                                    {{--]) !!}--}}
                    {{--{!! Form::button('<i class="fa fa-plus" aria-hidden="true"></i>' . trans("{$prefix}.general.create_languages"), array(--}}
                            {{--'type' => 'submit',--}}
                            {{--'class' => 'btn btn-sm btn-outline btn-info',--}}
                            {{--'title' => trans("{$prefix}.general.create_languages"),--}}
                            {{--'onclick'=>'return confirm("Вы уверены, что хотите добавить языки?")'--}}
                    {{--)) !!}--}}
                    {{--{!! Form::close() !!}--}}

                    {{--@can('create', $model)--}}
                        {{--<a href="{{ route($type . '.create') }}" class="btn btn-sm btn-outline btn-success" data-toggle="tooltip" data-original-title="@lang("{$prefix}.general.create")">--}}
                            {{--<i class="fa fa-plus" aria-hidden="true"></i>--}}
                            {{--@lang("{$prefix}.general.create")--}}
                        {{--</a>--}}
                    {{--@endcan--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--<div class="table-responsive" @if($models->isEmpty())style="text-align: center;"@endif>--}}
                    {{--@if($models->isNotEmpty())--}}
                        {{--{!! Form::open(['url' => route("{$type}.destroy"), 'method' => 'DELETE', 'id' => 'delete-form']) !!}--}}
                        {{--<table class="table table-bordered" data-role="content" data-plugin="selectable" data-row-selectable="true">--}}
                            {{--<thead class="bg-blue-grey-100">--}}
                            {{--<tr>--}}
                                {{--<th style="width: 50px;">--}}
                                    {{--<span class="checkbox-custom checkbox-primary">--}}
                                      {{--<input class="selectable-all" id="master-check" type="checkbox">--}}
                                      {{--<label></label>--}}
                                    {{--</span>--}}
                                {{--</th>--}}
                                {{--<th>--}}
                                    {{--<div style="text-align: center;">--}}
                                        {{--@lang("{$prefix}.{$type}.name")--}}
                                    {{--</div>--}}
                                {{--</th>--}}
                                {{--<th>--}}
                                    {{--<div style="text-align: center;">--}}
                                        {{--@lang("{$prefix}.{$type}.is_active")--}}
                                    {{--</div>--}}
                                {{--</th>--}}
                                {{--<th style="width: 150px;">--}}
                                    {{--<div style="text-align: center;">--}}
                                        {{--@lang("{$prefix}.general.action")--}}
                                    {{--</div>--}}
                                {{--</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--@foreach($models as $key => $model)--}}
                                {{--<tr>--}}
                                    {{--<td style="vertical-align: middle;">--}}
                                    {{--<span class="checkbox-custom checkbox-primary">--}}
                                      {{--<input id="user_{{ $model->id }}" value="{{ $model->id }}" name="ids[]" class="selectable-item js-select-items" type="checkbox">--}}
                                      {{--<label for="user_{{ $model->id }}"></label>--}}
                                    {{--</span>--}}
                                    {{--</td>--}}
                                    {{--<td style="vertical-align: middle;">--}}
                                        {{--{{ $model->name }}--}}
                                    {{--</td>--}}
                                    {{--<td style="vertical-align: middle;">--}}
                                        {{--@if($model->is_active)--}}
                                            {{--@lang("{$prefix}.general.yes")--}}
                                        {{--@else--}}
                                            {{--@lang("{$prefix}.general.no")--}}
                                        {{--@endif--}}
                                    {{--</td>--}}
                                    {{--<td style="text-align: center; vertical-align: middle;">--}}
                                        {{--<div class="page-header-actions" style="top: inherit; right: 47px;">--}}

                                            {{--@can('update', $model)--}}

                                                {{--<div class="btn-group" data-toggle="tooltip" data-original-title="@lang("{$prefix}.general.update")">--}}

                                                    {{--<button type="button" class="btn btn-sm btn-icon btn-warning btn-outline" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                        {{--<i class="icon fa-wrench" aria-hidden="true"></i>--}}
                                                    {{--</button>--}}
                                                    {{--<div class="dropdown-menu dropdown-menu-right dropdown-menu-bullet">--}}
                                                        {{--@foreach($languages as $key => $item)--}}
                                                            {{--<a class="dropdown-item @if($item->id === $language->id){{ 'active' }}@endif" href="{{ route("{$type}.edit", ['user' => $model->id]) }}?locale={{ $item->locale }}">{{ $item->native }}</a>--}}
                                                        {{--@endforeach--}}
                                                    {{--</div>--}}

                                                {{--</div>--}}

                                            {{--@endcan--}}

                                            {{--@can('delete', $model)--}}
                                                {{--<a href="" class="btn btn-sm btn-icon btn-warning btn-round btn-outline btn-danger js-delete-item" data-toggle="tooltip" data-original-title="@lang("{$prefix}.general.delete")">--}}
                                                    {{--<i class="icon fa-trash" aria-hidden="true"></i>--}}
                                                {{--</a>--}}
                                            {{--@endcan--}}

                                        {{--</div>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}
                        {{--</table>--}}
                        {{--@if($models->isNotEmpty())--}}
                            {{--{{ $models->links('backend.pagination.pagination') }}--}}
                        {{--@endif--}}
                        {{--{{ Form::close() }}--}}
                    {{--@else--}}
                        {{--@lang("{$prefix}.general.nothing")--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>

    @include('backend.modals.remove')

@endsection

@push('styles')@endpush

@push('scripts')@endpush