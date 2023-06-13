@auth
    @if(in_array('tickets', Auth::user()->permissions))
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Ticket No</th>
            <th scope="col">Title</th>
            <th scope="col">Priority</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <!-- <th scope="col" class="text-center">View Invoice</th> -->
        </tr>
        </thead>
        <tbody>
            @if(empty($tickets))
                <tr>
                    <td colspan="5" style="text-align: center;">
                    <h5 style="margin-top: 20px;">No tickets to display</h5>
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
                        <!-- <td class="text-center">
                            <a href="#"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a>
                        </td> -->
                    </tr>
                @endforeach		
            @endif	    					    					    
        </tbody>
    </table>
    @else
        @include('component.no-permission')
    @endif
@endauth