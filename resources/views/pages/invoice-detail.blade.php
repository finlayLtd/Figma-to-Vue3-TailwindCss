<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CrazyRDP - Invoice #{{ $invoice_id }}</title>

        <!-- Bootstrap CSS -->
        <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/dark-theme.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/invoice.css')}}" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('assets/img/logo-href.png') }}">

        <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/8de0481deb.js" crossorigin="anonymous"></script>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <style id="mttstyle">
            #mttContainer {
                left: 0 !important;
                top: 0 !important;
                position: fixed !important;
                z-index: 100000200 !important;
                width: 1000px !important;
                margin-left: -500px !important;
                background-color: #00000000  !important;
                pointer-events: none !important;
            }
            .bootstrapiso .tooltip {
                width:auto  !important;
                height:auto  !important;
                background:transparent  !important;
                border:none !important;
                border-radius: 0px !important;
                visibility: visible  !important;
                pointer-events: none !important;
            }
            .bootstrapiso .tooltip-inner {
                font-size: 14px  !important;
                max-width: 200px  !important;
                text-align: center !important;
                backdrop-filter: blur(2px)  !important; 
                background-color: #000000b8 !important;
                color: #ffffffff !important;
                border-radius: .25rem !important;
                pointer-events: none !important;
            }
            .bootstrapiso .arrow::before {
                border-top-color: #000000b8 !important;
            }
        </style>
    </head>
<body>
    <div class="container-fluid invoice-container">
            <div class="row invoice-header">
                <div class="invoice-col">
                    <p><img src="{{asset('assets/img/crazy-rdp-logo.png')}}" title="CrazyRDP"></p>
                    <h3><strong>Invoice #{{ $invoice_id }}</strong></h3>
                    <div class="row">
                        <div class="invoice-col" style="width: 100%; display: inline;">
                            <span>Invoice Date: </span>
                            <span>
                                {{ date('l, F jS, Y', strtotime($invoice_detail['date'])) }}
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="invoice-col" style="width: 100%; display: inline;">
                            <span>Due Date: </span>
                            <span>
                                {{ date('l, F jS, Y', strtotime($invoice_detail['duedate'])) }}
                            </span>
                        </div>
                    </div>

                    
                </div>
                <div class="invoice-col text-center">
                    <div class="invoice-status">
                        <span class="{{ strtolower($invoice_detail['status']) }}">
                            {{ $invoice_detail['status'] }}
                        </span>
                    </div>
                </div>
            </div>

            <hr>
            
            <div class="row">

                <div class="invoice-col">
                    <strong>Invoiced To</strong>
                    <address class="small-text">
                        {{ Auth::user()->firstname }}&nbsp;{{ Auth::user()->lastname }}<br>
                        Address1, <br>
                        City, State/Region, Zip Code<br>
                        Country
                    </address>
                </div>
            </div>

            <br>
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Invoice Items</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td width="20%" class="text-center"><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($invoice_detail['items']['item'] as $item)
                                        <tr>
                                            <td>
                                                {{ $item['description'] }}
                                            </td>
                                            <td class="text-center">€{{ $item['amount'] }}EUR</td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td class="total-row text-right"><strong>Sub Total</strong></td>
                                        <td class="total-row text-center">€{{ $invoice_detail['subtotal'] }}EUR</td>
                                    </tr>

                                    <tr>
                                        <td class="total-row text-right"><strong>Credit</strong></td>
                                        <td class="total-row text-center">€{{ $invoice_detail['credit'] }}EUR</td>
                                    </tr>

                                    <tr>
                                        <td class="total-row text-right"><strong>Total</strong></td>
                                        <td class="total-row text-center">€{{ $invoice_detail['total'] }}EUR</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            <div class="transactions-container small-text">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Transaction Date</strong></td>
                                <td class="text-center"><strong>Gateway</strong></td>
                                <td class="text-center"><strong>Transaction ID</strong></td>
                                <td class="text-center"><strong>Amount</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                                @if(empty($invoice_detail['transactions']['transaction']))
                                    <tr style="text-align: center;"><td colspan="4">No Related Transactions Found</td></tr>
                                @else
                                    @foreach ($invoice_detail['transactions']['transaction'] as $transaction)
                                        <tr>
                                            <td class="text-center">{{ date('l, F jS, Y', strtotime($transaction['date'])) }}</td>
                                            <td class="text-center">
                                                @if($transaction['gateway'] && $transaction['gateway'] == 'cryptomusgateway')
                                                    Cryptocurrency
                                                @else Perfectmoney
                                                @endif
                                            </td>
                                            <td class="text-center"></td>
                                            <td class="text-center">€{{ $transaction['amountin'] }}EUR</td>
                                        </tr>
                                    @endforeach
                                @endif
                                

                                
                                
                                <tr>
                                    <td class="text-right" colspan="3"><strong>Balance</strong></td>
                                    <td class="text-center">€{{ $invoice_detail['balance'] }}EUR</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="pull-right btn-group btn-group-sm hidden-print">

            </div>
    </div>
    <p class="text-center hidden-print">
        <a href="{{url('/balance')}}">
            <i class="fas fa-reply"></i> 
            Back to Client Area
        </a>
    </p>
</body>
</html>