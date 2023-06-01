<table class="table">
    <thead>
    <tr>
        <th scope="col">Ticket No</th>
        <th scope="col">Title</th>
        <th scope="col">Priority</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col" class="text-center">View Invoice</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tickets as $ticket)
        <tr>
            <td><a href="{{ url('/ticket-detail/' . $ticket['id']) }}">#{{$ticket['tid']}}</a></td>
            <td>{{$ticket['subject']}}</std>
            <td class="refund-request">{{$ticket['priority']}}</td>
            <td class="date-cell">{{$ticket['date']}}</td>
            <td class="successful-cell"><span>{{$ticket['status']}}</span></td>
            <td class="text-center">
                <a href="#"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a>
            </td>
        </tr>
    @endforeach			    					    					    
    </tbody>
</table>