@if($object->exists)
    <div class="currencies">
        <div class="currencies__tabs">
            @foreach($currencies as $key => $item)
                <div class="currencies__tab @if($item->alias === $alias){{ 'active' }}@endif">
                    <div class="currencies__toggle">
                        {{ optional($item->pivot)->price }} {{ $item->icon }}
                    </div>
                </div>
            @endforeach
        </div>
        <ul class="currencies__menu">
            @foreach($currencies as $key => $item)
                <li class="currencies__item @if($item->alias === $alias){{ 'active' }}@endif" onclick="">
                    {{ $item->icon }}
                </li>
            @endforeach
        </ul>
    </div>
@endif