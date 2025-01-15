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
                    <td>Name: John Doe</td>
                    <td>Email: johndoe@example.com</td>
                    <td>Phone: 123-456-7890</td>
                    <td>Previledges: All</td>
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
                    <p class="customers">Total customers: 1,234</p>
                    <p class="customers">Hindi Town: 56</p>
                    <p class="customers">Hindi Mashambani: 90</p>
                    <p class="customers">Ndeu: 34</p>
                    <p class="customers">Sabasaba: 90</p>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Payments</div>
                <div class="card-body">
                    <p class="customers">John Doe <br> Amount Ksh. 300<br>12/01/2025 09:00 am</p>
                    <p class="customers">John Doe <br> Amount Ksh. 300<br>12/01/2025 09:00 am</p>
                    <p class="customers">John Doe <br> Amount Ksh. 300<br>12/01/2025 09:00 am</p>
                    <p class="customers">John Doe <br> Amount Ksh. 300<br>12/01/2025 09:00 am</p>
                    <p class="customers">John Doe <br> Amount Ksh. 300<br>12/01/2025 09:00 am</p><hr>
                    <p class="customers">Total Debt: Ksh. 90000 <br> Total Paid: 60000  <br>Balance 30000</p>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-md-6">
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
                        <tr>
                            <td>Hindi Town</td>
                            <td>30</td>
                            <td>3000</td>
                            <td>2000</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>Hindi Mashambani</td>
                            <td>30</td>
                            <td>3000</td>
                            <td>2000</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>Ndeu</td>
                            <td>30</td>
                            <td>3000</td>
                            <td>2000</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>Sabasaba</td>
                            <td>30</td>
                            <td>3000</td>
                            <td>2000</td>
                            <td>1000</td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td>120</td>
                            <td>9000</td>
                            <td>6000</td>
                            <td>3000</td>
                        </tr>


                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
@stop