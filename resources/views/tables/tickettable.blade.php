@auth
    @if(in_array('tickets', Auth::user()->permissions))
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
                        <td class="successful-cell"><span>{{$ticket['status']}}</span></td>
                    </tr>
                @endforeach		
            @endif	    					    					    
        </tbody>
    </table>
    @else
        @include('component.no-permission')
    @endif
@endauth