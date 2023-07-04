<table class="table">
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
                <td>{{$order_product_info['dedicatedip']}}</td>
                <td>{{$rdns['name']}}</td>
                <td>{{$rdns['content']}}</td>						      
                <td></td>
            </tr>
            @endforeach
        @else
            <tr>
                <td>id1</td>
                <td>{{$order_product_info['dedicatedip']}}</td>
                <td>NA</td>
                <td>NA</td>						      
                <td></td>
            </tr>
        @endif
    </tbody>
</table>