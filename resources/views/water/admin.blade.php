@extends('water.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('styles/admin.css') }}">
<div>
    <h1>Admin Dashboard</h1>
    <div class="card">
        <div class="card-header">Admin information</div>
        <div class="card-body">
            <table width="100%">
                <tr>
                    @if(isset($name) && isset($email) && isset($phonenumber) && isset($previledges))
                    <td>Name: {{ $name }}</td>
                    <td>Email: {{ $email }}</td>
                    <td>Phone: {{ $phonenumber }}</td>
                    <td>Previledges: {{ $previledges }}</td>
                    @else
                    <p>No details found.</p>
                    @endif
                </tr>
            </table>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Customers</div>
                <div class="card-body">
                    @if(isset( $total_customers ) && isset($hindi_town ) && isset($hindi_mashambani) && isset($ndeu) && isset($sabasaba))
                    <p class="customers">Total customers: {{ $total_customers }}</p>
                    <p class="customers">Hindi Town: {{ $hindi_town }}</p>
                    <p class="customers">Hindi Mashambani: {{ $hindi_mashambani }}</p>
                    <p class="customers">Ndeu: {{ $ndeu }}</p>
                    <p class="customers">Sabasaba: {{ $sabasaba }}</p>
                    @else
                    <p>No data found.</p>
                    @endif
                </div>
                <div class="card-footer"></div>
            </div>

            {{-- <div class="col-md-6"> --}}
                <div class="card">
                    <div class="card-header">Area Water Usage</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>Area</th>
                                <th>Water(m3)</th>
                                <th>Amount billed</th>
                                <th>Amount Paid</th>
                                <th>Balance</th>
                            </tr>
                           @if(isset($data))
                           @foreach($data as $area => $stats)
                           <tr>
                                <td>{{ $area }}</td>
                                <td>{{ $stats['meter_reading'] }}</td>
                                <td>{{ $stats['billed'] }}</td>
                                <td>{{ $stats['paid'] }}</td>
                                <td>{{ $stats['balance'] }}</td>
                           </tr>
                            @endforeach
                            @else
                            <p>No data found.</p>
                            @endif
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            {{-- </div> --}}
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Payments</div>
                <div class="card-body">
                    {{-- @if(isset($transaction)) --}}
                    @foreach ($transactions as $transaction)
                    <p class="customers">Transaction ID: {{ $transaction->transaction_id }} <br> Amount Ksh. {{ $transaction->amount }}<br>Date: {{ $transaction->transaction_date }}</p>
                    @endforeach
                    {{-- @else --}}
                    {{-- <p>No transactions found.</p> --}}
                    {{-- @endif --}}

                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        
    </div>
</div>
@stop

