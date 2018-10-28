@extends('backend.layout.app')

@section('title'){{ $titleEdit }}@endsection

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

            <div class="panel-body">

                <ul class="nav nav-tabs nav-tabs-line">
                    @foreach($languages as $key => $item)
                        <li class="nav-item">
                            <a class="nav-link @if($item->id === $language->id) active @endif" href="{{ route("{$type}.edit", [str_singular($type) => $model]) }}?locale={{ $item->locale }}">
                                {{ $item->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>

            </div>

            {!! Form::model($model, ['url' => route("{$type}.update", [str_singular($type) => $model->id]), 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
            <div class="panel-heading">
                <h3 class="panel-title">@yield('title')</h3>
                <div class="page-header-actions">
                    <a href="{{ route("{$type}.index") }}" class="btn btn-sm btn-outline btn-warning" data-toggle="tooltip" data-original-title="@lang("{$prefix}.general.back")">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        @lang("{$prefix}.general.back")
                    </a>
                    <button type="submit" class="btn btn-sm btn-outline btn-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @lang("{$prefix}.general.save")
                    </button>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">

                    @include("{$prefix}.{$viewPath}.form")

                </div><!-- /.box-body -->
            </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection

@push('styles')@endpush

@push('scripts')@endpush