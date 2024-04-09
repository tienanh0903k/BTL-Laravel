<div class="col-lg-3">
    <div class="hero__categories">
        <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>All departments</span>
        </div>
        <ul>
            @foreach($categories as $cate)
                <li>{{ $cate->name }}</li>
            @endforeach
        </ul>
    </div>
</div>
