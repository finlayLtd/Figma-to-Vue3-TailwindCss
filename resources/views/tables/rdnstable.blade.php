<table class="table" id="rdns-records">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">IP address</th>
            <th scope="col">Name</th>
            <th scope="col">Domain</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if(count($rdnslist))
            @foreach($rdnslist as $rdns)
            <tr>
                <td>{{$rdns['id']}}</td>
                <td>{{$rdns['ip']}}</td>
                <td>{{$rdns['name']}}</td>
                <td>{{$rdns['content']}}</td>						      
                <td onclick="deleteRdns({{ $rdns['id'] }})"><i class="fa fa-trash-can" style="color:red;cursor: pointer;"></i></td>
            </tr>
            @endforeach
        @else
            <tr>
                <td>id1</td>
                @if(isset($order_product_info['dedicatedip'])) <td>{{$order_product_info['dedicatedip']}}</td>
                @else <td>{{$ip}}</td>
                @endif
                <td>NA</td>
                <td>NA</td>						      
                <td></td>
            </tr>
        @endif
    </tbody>
</table>