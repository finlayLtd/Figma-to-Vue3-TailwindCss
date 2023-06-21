@auth
    <div class="tab-content" id="pills-tabContent">

        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="w-100 mb-5 support-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('messages.Invoice') }}</th>
                            <th scope="col">{{ __('messages.Amount') }}</th>
                            <th scope="col">{{ __('messages.Invoice_Date') }}</th>
                            <th scope="col">{{ __('messages.Due_Date') }}</th>
                            <th scope="col">{{ __('messages.Status') }}</th>
                            <th scope="col" class="text-center">{{ __('messages.View_Invoice') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if(empty($invoices))
                            <tr>
                                <td colspan="6" style="text-align: center;">
                                    <h5 style="margin-top: 20px;">{{ __('messages.no_invoice') }}</h5>
                                </td>
                            </tr>
                        @else
                            @foreach($invoices as $invoice)
                            <tr>
                                <td>INV-{{ $invoice['id'] }}</td>
                                <td>{{ $invoice['currencyprefix'] }}{{ $invoice['total'] }}</td>
                                <td class="date-cell">{{ $invoice['date'] }}</td>
                                <td class="date-cell">{{ $invoice['duedate'] }}</td>
                                @if($invoice['status'] == 'Paid')
                                <td class="successful-cell">
                                    <span>
                                        {{ $invoice['status'] }}
                                    </span>
                                </td>
                                @elseif($invoice['status'] == 'Unpaid')
                                <td class="cancelled-cell">
                                    <span>
                                        {{ $invoice['status'] }}
                                    </span>
                                </td>
                                @else
                                <td class="in-progress-cell">
                                    <span>
                                        {{ $invoice['status'] }}
                                    </span>
                                </td>
                                @endif
                                <td class="text-center">
                                    <a onclick="openInvoiceWindow({{ $invoice['id'] }})" target="_blank">
                                        <img src="assets/img/eye-open.svg" class="icon-password view-invoice">
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-paid" role="tabpanel" aria-labelledby="pills-paid-tab">
            <div class="w-100 mb-5 support-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('messages.Invoice') }}</th>
                            <th scope="col">{{ __('messages.Amount') }}</th>
                            <th scope="col">{{ __('messages.Invoice_Date') }}</th>
                            <th scope="col">{{ __('messages.Due_Date') }}</th>
                            <th scope="col">{{ __('messages.Status') }}</th>
                            <th scope="col" class="text-center">{{ __('messages.View_Invoice') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                        @if($invoice['status'] == 'Paid')
                        <tr>
                            <td>INV-{{ $invoice['id'] }}</td>
                            <td>{{ $invoice['currencyprefix'] }}{{ $invoice['total'] }}</td>
                            <td class="date-cell">{{ $invoice['date'] }}</td>
                            <td class="date-cell">{{ $invoice['duedate'] }}</td>
                            @if($invoice['status'] == 'Paid')
                            <td class="successful-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @elseif($invoice['status'] == 'Unpaid')
                            <td class="cancelled-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @else
                            <td class="in-progress-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @endif
                            <td class="text-center"><a onclick="openInvoiceWindow({{ $invoice['id'] }})" target="_blank"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-unpaid" role="tabpanel" aria-labelledby="pills-unpaid-tab">
            <div class="w-100 mb-5 support-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('messages.Invoice') }}</th>
                            <th scope="col">{{ __('messages.Amount') }}</th>
                            <th scope="col">{{ __('messages.Invoice_Date') }}</th>
                            <th scope="col">{{ __('messages.Due_Date') }}</th>
                            <th scope="col">{{ __('messages.Status') }}</th>
                            <th scope="col" class="text-center">{{ __('messages.View_Invoice') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                        @if($invoice['status'] == 'Unpaid')
                        <tr>
                            <td>INV-{{ $invoice['id'] }}</td>
                            <td>{{ $invoice['currencyprefix'] }}{{ $invoice['total'] }}</td>
                            <td class="date-cell">{{ $invoice['date'] }}</td>
                            <td class="date-cell">{{ $invoice['duedate'] }}</td>
                            @if($invoice['status'] == 'Paid')
                            <td class="successful-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @elseif($invoice['status'] == 'Unpaid')
                            <td class="cancelled-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @else
                            <td class="in-progress-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @endif
                            <td class="text-center"><a onclick="openInvoiceWindow({{ $invoice['id'] }})" target="_blank"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="tab-pane fade" id="pills-cancelled" role="tabpanel" aria-labelledby="pills-cancelled-tab">
            <div class="w-100 mb-5 support-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('messages.Invoice') }}</th>
                            <th scope="col">{{ __('messages.Amount') }}</th>
                            <th scope="col">{{ __('messages.Invoice_Date') }}</th>
                            <th scope="col">{{ __('messages.Due_Date') }}</th>
                            <th scope="col">{{ __('messages.Status') }}</th>
                            <th scope="col" class="text-center">{{ __('messages.View_Invoice') }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                        @if($invoice['status'] == 'Cancelled')
                        <tr>
                            <td>INV-{{ $invoice['id'] }}</td>
                            <td>{{ $invoice['currencyprefix'] }}{{ $invoice['total'] }}</td>
                            <td class="date-cell">{{ $invoice['date'] }}</td>
                            <td class="date-cell">{{ $invoice['duedate'] }}</td>
                            @if($invoice['status'] == 'Paid')
                            <td class="successful-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @elseif($invoice['status'] == 'Unpaid')
                            <td class="cancelled-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @else
                            <td class="in-progress-cell">
                                <span>
                                    {{ $invoice['status'] }}
                                </span>
                            </td>
                            @endif
                            <td class="text-center"><a onclick="openInvoiceWindow({{ $invoice['id'] }})" target="_blank"><img src="assets/img/eye-open.svg" class="icon-password view-invoice"></a></td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endauth