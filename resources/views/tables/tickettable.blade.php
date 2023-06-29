@auth
    @if(in_array('tickets', Auth::user()->permissions))
    <div class="d-flex pe-0 flex-wrap mb-2" style="justify-content: space-between;">
        <div class="sort-servers order-2 order-md-1" style="display: inline-block;">
            <div id="toggleButton_3" class="sort-item-active btn-chevron chevron-dark" style="width: 160px;" onclick="toggleSortingItems_3()">
                <span>{{ __('messages.Sort_by') }}...</span>
            </div>
            <div class="sorting-items_3" style="display: none;">
                <ul>
                    <li class="touch-item" onclick="sortByTicket_dashboard('date', 'desc')">{{ __('messages.Opened-latest') }}</li>
                    <li class="touch-item" onclick="sortByTicket_dashboard('date', 'asc')">{{ __('messages.Opened-oldest') }}</li>
                    <li class="touch-item" onclick="sortByTicket_dashboard('lastreply', 'desc')">{{ __('messages.Last-Reply-latest') }}</li>
                    <li class="touch-item" onclick="sortByTicket_dashboard('lastreply', 'asc')">{{ __('messages.Last-Reply-oldest') }}</li>
                </ul>
            </div>
        </div>

        <ul class="nav nav-pills mb-3 mb-md-0 order-1 order-md-2 mb-lg-0" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all" aria-selected="true">All</button>
            </li>
            @foreach ($status as $statu)
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-{{implode('-',explode(' ',$statu['title']))}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{implode('-',explode(' ',$statu['title']))}}" type="button" role="tab" aria-controls="pills-in-work" aria-selected="false">{{$statu['title']}}</button>
            </li>
            @endforeach
        </ul>
    </div>

    

    <div class="w-100 support-table  mb-4">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                <div class="row mb-5">
                    @if(empty($tickets))
                        <h5 style="margin-top: 20px;">{{ __('messages.no_ticket') }}</h5>
                    @else
                    <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('messages.Ticket_No') }}</th>
                                <th scope="col">{{ __('messages.Title') }}</th>
                                <th scope="col">{{ __('messages.Priority') }}</th>
                                <th scope="col">{{ __('messages.Date') }}</th>
                                <th scope="col">{{ __('messages.Status') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(empty($tickets))
                                    <tr>
                                        <td colspan="5" style="text-align: center;">
                                        <h5 style="margin-top: 20px;">{{ __('messages.no_ticket') }}</h5>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($tickets as $ticket)
                                        <tr>
                                            <td><a href="{{ url('/ticket-detail/' . $ticket['id']) }}">#{{$ticket['tid']}}</a></td>
                                            <td>{{$ticket['subject']}}</std>
                                            <td class="refund-request">{{$ticket['priority']}}</td>
                                            <td class="date-cell">{{$ticket['date']}}</td>
                                            @switch($ticket['status'])
                                                @case('Answered')
                                                    <td class="successful-cell"><span>{{$ticket['status']}}</span></td>
                                                    @break
                                                @case('Closed')
                                                    <td class="cancelled-cell"><span>{{$ticket['status']}}</span></td>
                                                    @break
                                                @default
                                                    <td class="in-progress-cell"><span>{{$ticket['status']}}</span></td>
                                            @endswitch
                                        </tr>
                                    @endforeach		
                                @endif	    					    					    
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
            @foreach ($status as $statu)
            <div class="tab-pane fade" id="pills-{{implode('-',explode(' ',$statu['title']))}}" role="tabpanel" aria-labelledby="pills-{{implode('-',explode(' ',$statu['title']))}}-tab">
                <div class="row mb-5">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">{{ __('messages.Ticket_No') }}</th>
                                <th scope="col">{{ __('messages.Title') }}</th>
                                <th scope="col">{{ __('messages.Priority') }}</th>
                                <th scope="col">{{ __('messages.Date') }}</th>
                                <th scope="col">{{ __('messages.Status') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(empty($tickets))
                                    <tr>
                                        <td colspan="5" style="text-align: center;">
                                        <h5 style="margin-top: 20px;">{{ __('messages.no_ticket') }}</h5>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($tickets as $ticket)
                                        @if($ticket['status']==$statu['title'])
                                        <tr>
                                            <td><a href="{{ url('/ticket-detail/' . $ticket['id']) }}">#{{$ticket['tid']}}</a></td>
                                            <td>{{$ticket['subject']}}</std>
                                            <td class="refund-request">{{$ticket['priority']}}</td>
                                            <td class="date-cell">{{$ticket['date']}}</td>
                                            @switch($ticket['status'])
                                                @case('Answered')
                                                    <td class="successful-cell"><span>{{$ticket['status']}}</span></td>
                                                    @break
                                                @case('Closed')
                                                    <td class="cancelled-cell"><span>{{$ticket['status']}}</span></td>
                                                    @break
                                                @default
                                                    <td class="in-progress-cell"><span>{{$ticket['status']}}</span></td>
                                            @endswitch
                                        </tr>
                                        @endif
                                    @endforeach		
                                @endif	    					    					    
                            </tbody>
                        </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    
    

    
    @else
        @include('component.no-permission')
    @endif
@endauth