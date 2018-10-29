@if($object->exists)
<div class="col-md-4">
    <div class="nav-tabs-horizontal col-md-12" data-plugin="tubs">
        <div class="col-md-9">
        <div class="tab-content" style="padding-top: 20px; padding-bottom: 10px;">
            @foreach($currencies as $key => $item)
            <div class="tab-pane @if($item->alias === $alias){{ 'active' }}@endif" id="{{ $item->alias }}" role="tabpanel">
                <div class="row">
                    <div class="col-md-8">{{ optional($item->pivot)->price }}</div>
                    <div class="col-md-4">{{ $item->icon }}</div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
        <div style="padding-top: 10px;">
            <button type="button" class="col-md-3 btn btn-sm btn-icon btn-dark btn-outline" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon fa-wrench" aria-hidden="true"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-bullet">
                <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                    @foreach($currencies as $key => $item)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link @if($item->alias === $alias){{ 'active' }}@endif" data-toggle="tab" href="#{{ $item->alias }}" role="tab">{{ $item->icon }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
@endif