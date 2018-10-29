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

            <div class="panel-heading">
                <h3 class="panel-title">@yield('title')</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive" @if($models->isEmpty())style="text-align: center;"@endif>
                    @if($models->isNotEmpty())
                        <table class="table table-bordered" data-role="content" data-plugin="selectable" data-row-selectable="true">
                            <thead class="bg-blue-grey-100">
                            <tr>
                                <th style="width: 50px;">
                                    <div style="text-align: center;">
                                        ID
                                    </div>
                                </th>
                                <th>
                                    <div style="text-align: center;">
                                        @lang("currency::{$prefix}.{$type}.name")
                                    </div>
                                </th>
                                <th>
                                    <div style="text-align: center;">
                                        @lang("currency::{$prefix}.{$type}.icon")
                                    </div>
                                </th>
                                <th>
                                    <div style="text-align: center;">
                                        @lang("currency::{$prefix}.{$type}.ratio")
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($models as $key => $model)
                                <tr>
                                    <td>
                                        <div style="text-align: center;">
                                            {{ $model->id }}
                                        </div>
                                    </td>
                                    <td style="vertical-align: middle;">
                                        {{ $model->name }}
                                    </td>
                                    <td style="vertical-align: middle;">
                                        <div style="text-align: center;">
                                            {{ $model->icon }}
                                        </div>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        {{ $model->ratio }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        @if($models->isNotEmpty())
                            {{ $models->links('backend.pagination.pagination') }}
                        @endif
                        {{ Form::close() }}
                    @else
                        @lang("{$prefix}.general.nothing")
                    @endif
                </div>
            </div>
        </div>
    </div>

    @include('backend.modals.remove')

@endsection

@push('styles')@endpush

@push('scripts')@endpush