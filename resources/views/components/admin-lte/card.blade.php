@props([
    'total' => 150,
    'label' => 'New Orders',
    'link' => '#',
    'icon' => 'ion ion-bag',
    'bg_color' => 'bg-info',
])


<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box {{ $bg_color }}">
        <div class="inner">
            <h3>{{ $total }}</h3>

            <p>{{ $label }}</p>
        </div>
        <div class="icon">
            <i class="{{ $icon }}"></i>
        </div>
        <a href="{{ $link }}" class="small-box-footer">@lang('messages.more_info') <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
