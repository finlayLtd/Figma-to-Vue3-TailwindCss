<h3 class="sub-title">Choose a Datacenter region</h3>
@if(count($products))
    @foreach($product_group as $key=>$group)
        <div class="row">
            <div class="image-wrapper mb-2">
                @if($key == 2) <img src="assets/img/flag-nl.png" alt="" />  
                @else <img src="assets/img/flag-en.png" alt="" />  
                @endif
                {{$group}}
            </div>
            <hr/>
            @foreach($products as $prodcut)
                @if($prodcut['gid'] == $key)
                    <div class="col-md-3 m-1 mb-4">
                        <div class="card-item data-region-card ">
                            <div class="server-name mb-4">
                                <span class="name">{{$prodcut['name']}}</span>
                            </div>

                            <div class="server-price mb-4">
                                <span class="price">€{{$prodcut['pricing']['EUR']['monthly']}}<span class="month">/ month</span></span>
                            </div>

                            <div class="">
                            <ul class="server-features">
                                <li><img src="assets/img/cpu.png" alt="">{{$prodcut['server_info'][0]}}</li>
                                <li><img src="assets/img/ram.png" alt="">{{$prodcut['server_info'][1]}}</li>
                                <li><img src="assets/img/hard-disk.png" alt="">{{$prodcut['server_info'][2]}}</li>
                                <li><img src="assets/img/speedometer.png" alt="">{{$prodcut['server_info'][3]}}</li>
                                <li><img src="assets/img/cable.png" alt="">{{$prodcut['server_info'][4]}}</li>
                            </ul>                    
                            </div>
                            <div class="more-details-wrapper mt-3">
                                <div class="more-details-content">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ullam repellendus aspernatur placeat rem, molestiae veritatis porro, facilis quo, repudiandae odio quia debitis iste nemo assumenda omnis? Quo, dignissimos, ducimus!</p>
                                </div>
                                <a class="btn btn-light btn-chevron d-lg-block hover-light-dark toggle-more-detail">More Details</a>	
                            </div>                   
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>	
@endif