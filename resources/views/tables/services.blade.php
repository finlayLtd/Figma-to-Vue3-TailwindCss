<h3 class="col-md-3 sub-title pt-2">My Products & Services</h3>
<div class="col-md-9 d-flex justify-content-end pe-0 flex-wrap list-flex-nav">
    <ul class="nav nav-pills four-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0 flex-nowrap" id="pills-tab" role="tablist">
        @foreach($states as $state)
        <li class="nav-item" role="presentation">
            @if($state != 'Active') <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$state}}" type="button" role="tab" aria-controls="pills-{{$state}}" aria-selected="true">{{$state}}</button>
            @else <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$state}}" type="button" role="tab" aria-controls="pills-{{$state}}" aria-selected="true">{{$state}}</button>
            @endif
        </li>
        @endforeach
    </ul>
</div>