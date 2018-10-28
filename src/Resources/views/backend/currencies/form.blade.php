{!! Form::hidden("locale", $language->locale, []) !!}

@if($model->exists)

    <div class="form-group col-md-12">

        {!! $preview !!}

    </div>

@endif

<div class="form-group col-md-12 form-material floating{{ $errors->has('name') ? ' has-danger' : '' }}" data-plugin="formMaterial">
    {{ Form::text('name', null, ['class'=>'form-control', 'required']) }}
    <label class="floating-label col-md-12">
        @lang("{$prefix}.{$type}.name")
    </label>
    @if ($errors->has('name'))
        <span class="help-block form-control-label">
            {{ $errors->first('name') }}
        </span>
    @endif
</div>

<div class="form-group col-md-12 form-material floating{{ $errors->has('url') ? ' has-danger' : '' }}" data-plugin="formMaterial">
    {{ Form::text('url', null, ['class'=>'form-control', 'required']) }}
    <label class="floating-label col-md-12">
        @lang("{$prefix}.{$type}.url")
    </label>
    @if ($errors->has('url'))
        <span class="help-block form-control-label">
            {{ $errors->first('url') }}
        </span>
    @endif
</div>

<div class="form-group col-md-12 {{ $errors->has('date') ? ' has-danger' : '' }}">
    <label class="floating-label col-md-12">
        @lang("{$prefix}.{$type}.date")
    </label>
    <div class="">
        {{ Form::text('date', $model->exists ? $model->date->format('d.m.Y') : null, ['class'=>'form-control col-md-12 date', 'required']) }}
    </div>
    @if ($errors->has('date'))
        <span class="help-block form-control-label">
            {{ $errors->first('date') }}
        </span>
    @endif
</div>

<div class="form-group col-md-12 form-material floating{{ $errors->has('announcement') ? ' has-danger' : '' }}" data-plugin="formMaterial">
    {{ Form::textarea('announcement', null, ['class'=>'form-control']) }}
    <label class="floating-label col-md-12">
        @lang("{$prefix}.{$type}.announcement")
    </label>
    @if ($errors->has('announcement'))
        <span class="help-block form-control-label">
            {{ $errors->first('announcement') }}
        </span>
    @endif
</div>

<div class="form-group col-md-12{{ $errors->has('content') ? ' has-danger' : '' }}">
    <label class="floating-label col-md-12">
        @lang("{$prefix}.{$type}.content")
    </label>
    <div class="row col-md-12">
        {{ Form::textarea('content', null, ['class'=>'form-control TinyMCE']) }}
    </div>
    @if ($errors->has('content'))
        <span class="help-block form-control-label">
            {{ $errors->first('content') }}
        </span>
    @endif
</div>

<div class="form-group col-md-12 clearfix form-material floating{{ $errors->has('is_active') ? ' has-danger' : '' }}" data-plugin="formMaterial">
    <div class="checkbox-custom row checkbox-inline checkbox-primary checkbox-lg float-left clearfix">
        <div class="col-md-12">
            {{ Form::checkbox('is_active', null, null, ['id' => 'is_active']) }}
            <label class="floating-label col-md-12" for="is_active">
                @lang("{$prefix}.{$type}.is_active")
            </label>
        </div>
    </div>
    @if ($errors->has('is_active'))
        <div class="">
            <span class="help-block form-control-label">
                {{ $errors->first('is_active') }}
            </span>
        </div>
    @endif
</div>
