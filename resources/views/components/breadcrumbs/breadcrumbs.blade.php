<ul class="breadcrumbs">
    <li class="breadcrumbs_item"><a href="#">Главная</a></li>
    <li class="breadcrumbs_item"><a href="#">{{ $crumb_level2 }}</a></li>
    @isset($crumb_level3)
    <li class="breadcrumbs_item"><a href="#">{{ $crumb_level3 }}</a></li>
        @endisset
</ul>
