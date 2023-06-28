@auth
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">

            <div class="row mb-5">
                @if(empty($tickets))
                    <h5 style="margin-top: 20px;">{{ __('messages.no_ticket') }}</h5>
                @else
                    @foreach ($tickets as $ticket)
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="card-item p-4 mb-4 support-item flex-column ">

                            <div class="d-flex justify-content-between support-item-header">
                                <a href="{{ url('/ticket-detail/' . $ticket['id']) }}">
                                    <div class="support-item-title">
                                        <img class="me-2" src="assets/img/support.svg" alt=""><span style="color:rgba(23, 30, 38, 0.5);">{{ __('messages.Ticket') }}#{{$ticket['tid']}}</span>
                                    </div>
                                    <h3 class="detail" style="margin-top: 10px;">
                                        {{ __('messages.Opened_at') }} : {{ \Carbon\Carbon::parse($ticket['date'])->format('Y-m-d') }}
                                    </h3>
                                    <h3 class="detail" style="margin-top: 5px;">
                                        {{ __('messages.Last_reply_at') }} : {{ \Carbon\Carbon::parse($ticket['lastreply'])->format('Y-m-d') }}
                                    </h3>
                                </a>
                                <div class="support-item-status">
                                    @switch($ticket['status'])
                                        @case('Answered')
                                            <div class="successful-cell"><span class="fs-15 color-in-work">{{$ticket['status']}}</span></div>
                                            @break
                                        @case('Closed')
                                            <div class="cancelled-cell"><span class="fs-15 color-in-work">{{$ticket['status']}}</span></div>
                                            @break
                                        @default
                                            <div class="in-progress-cell"><span class="fs-15 color-in-work">{{$ticket['status']}}</span></div>
                                    @endswitch
                                </div>
                            </div>

                            <div class="support-item-detail">
                                
                                <p class="fs-15 mb-0">{{$ticket['subject']}}</p>
                            </div>

                        </div>
                    </div>
                    @endforeach
                @endif
                
            </div>

        </div>
        @foreach ($status as $statu)
        <div class="tab-pane fade" id="pills-{{implode('-',explode(' ',$statu['title']))}}" role="tabpanel" aria-labelledby="pills-{{implode('-',explode(' ',$statu['title']))}}-tab">
            <div class="row mb-5">
                @foreach ($tickets as $ticket)
                    @if($ticket['status']==$statu['title'])
                    <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                        <div class="card-item p-4 mb-4 support-item flex-column ">

                            <div class="d-flex justify-content-between support-item-header">
                                <a href="{{ url('/ticket-detail/' . $ticket['id']) }}">
                                    <div class="support-item-title">
                                        <img class="me-2" src="assets/img/support.svg" alt=""><span style="color:rgba(23, 30, 38, 0.5);">{{ __('messages.Ticket') }}#{{$ticket['tid']}}</span>
                                    </div>
                                    <h3 class="detail" style="margin-top: 10px;">
                                        {{ __('messages.Opened_at') }} : {{ \Carbon\Carbon::parse($ticket['date'])->format('Y-m-d') }}
                                    </h3>
                                    <h3 class="detail" style="margin-top: 5px;">
                                        {{ __('messages.Last_reply_at') }} : {{ \Carbon\Carbon::parse($ticket['lastreply'])->format('Y-m-d') }}
                                    </h3>
                                </a>
                                <div class="support-item-status">
                                    @switch($ticket['status'])
                                        @case('Answered')
                                            <div class="successful-cell"><span class="fs-15 color-in-work">{{$ticket['status']}}</span></div>
                                            @break
                                        @case('Closed')
                                            <div class="cancelled-cell"><span class="fs-15 color-in-work">{{$ticket['status']}}</span></div>
                                            @break
                                        @default
                                            <div class="in-progress-cell"><span class="fs-15 color-in-work">{{$ticket['status']}}</span></div>
                                    @endswitch
                                </div>
                            </div>

                            <div class="support-item-detail">
                                <p class="fs-15 mb-0">{{$ticket['subject']}}</p>
                            </div>

                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
@endauth