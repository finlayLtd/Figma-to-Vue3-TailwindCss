<div class="row mb-3 mb-lg-5 pe-0">
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
</div>
<div class="tab-content opt-padding" id="pills-tabContent">
    @foreach($states as $state)
        @if($state == 'Active') <div class="tab-pane fade show active" id="pills-{{$state}}" role="tabpanel" aria-labelledby="pills-{{$state}}-tab">
        @else <div class="tab-pane fade" id="pills-{{$state}}" role="tabpanel" aria-labelledby="pills-{{$state}}-tab">
        @endif
            <div class="row mb-5">
                @if(count($state_order))
                @foreach($state_order[$state] as $order)
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <div class="card-item p-4 mb-4">
                            <div class="server-list-item">
                                <div class="server-list-item-wrapper">
                                    <div class="image-wrapper">
                                        <img src="assets/img/{{ $order['sys_log'] }}-logo.png" alt=""> 
                                    </div>
                                    <div class="list-item-detail">
                                        <h2 class="list-name">
                                            {{$order['name']}}
                                        </h2>
                                        <h3 class="detail">
                                            {{$order['configoptions']['configoption'][1]['value']}}
                                        </h3>
                                        <div class="server-list-options">
                                            <div class="options-toggle">

                                            </div>
                                            <div class="options-toggle-dropdown">
                                                <ul>
                                                    <li><a href="{{ url('/overview/' . $order['orderid']) }}">Launch Control Panel</a></li>
                                                    <li><a href="#">View Invoices</a></li>
                                                </ul>
                                            </div>                    			
                                        </div>                    			
                                    </div>
                                </div>
                            </div>
                            <div class="server-list-item">
                                <div class="server-list-item-wrapper">
                                    <div class="image-wrapper">
                                        <img class="dark-img-filter" src="assets/img/cloud-connection.png" alt="">                    			
                                    </div>
                                    <div class="list-item-detail">
                                        <h2 class="list-name">
                                            {{$order['dedicatedip']}}
                                        </h2>
                                        <h3 class="detail">
                                            Created at {{$order['regdate']}}
                                        </h3>                    			
                                    </div>
                                    <div class="server-list-options">
                                        @if($state == 'Active')
                                            <button class="active-badge"><span class="active-dot"></span>Active</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="server-list-item">
                                <div class="server-list-item-wrapper">
                                    <div class="image-wrapper">
                                        <img src="assets/img/{{$order['flag']}}.png" alt="">                    			
                                    </div>
                                    <div class="list-item-detail">
                                        <h2 class="list-name">
                                            {{$order['groupname']}}
                                        </h2>
                                        <h3 class="detail">
                                            Hostname: {{$order['domain']}}
                                        </h3>                    			
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    @if($state == 'Active')
                    <h5 style="margin-top: 20px; text-align: center;">You don’t have an active product yet</h5>
                    @endif
                @endif
            </div>
        </div>	
    @endforeach
</div>