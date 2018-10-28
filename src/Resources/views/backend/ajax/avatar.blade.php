@if($model->exists)

<div class="row">
    <div class="col-sm-4">
        <div class="js-ajax-loader col-sm-4" style="display: none;">
            <img src="{{ asset('uploads/ajax-loaders/ajax-loader-6.gif') }}">
        </div>
        <div class="for-main-image col-sm-12">
            @if(!empty($model->avatar))
                <img src="{{ url("{$model->avatar}") }}" class="img-bordered rounded img-thumbnail">
                <input type="hidden" name="avatar" value="{{ $model->avatar }}">
                <a class="btn btn-flat btn-xs remove-btn js-remove-image-file"
                   data-id="{{ $model->id }}"
                   data-path="{{ $path }}"
                   data-file-path="{{ $model->avatar }}"
                   data-column-name="avatar"
                >
                    <i class="icon fa-close"></i>
                </a>
            @endif
        </div>
    </div>
    <div class="col-sm-3 js-data"
         data-id="{{ $model->id }}"
         data-path="{{ $path }}"
         data-file-path="{{ $model->avatar }}"
         data-column-name="avatar">
        {{ Form::file('file', ['id'=>'image', 'style' => 'display:none;']) }}
        <label class="btn btn-sm btn-outline btn-info" for="image">Добавить фото</label>
    </div>
    <span class="col-sm-12" id="info-block" style="display: none;"></span>
</div>
@endif
