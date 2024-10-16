<div class="slider-option">
    <div class="slider-numeric">
        <div>
            {{$slot}}
            <input type="number" min="{{$min}}" max="{{$max}}" name="{{$name}}[]" data-name="{{$name}}" class="from-filter" value="{{$min}}">
        </div>
        <span>-</span>
        <div>
            {{$slot}}
            <input type="number" min="{{$min}}" max="{{$max}}" name="{{$name}}[]" data-name="{{$name}}" class="to-filter" value="{{$max}}">
        </div>
    </div>
    <div class="slider">
        <div class="rail"></div>
        <div class="range"></div>
        <div class="from"></div>
        <div class="to"></div>
    </div>
</div>
