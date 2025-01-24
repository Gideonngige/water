@extends('water.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('styles/bill.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<div class="bill">
    <div class="card">
        <div class="card-header">
            <h3>Bill</h3>
        </div>
        <div class="card-body">
           <div class="row">
            <div class="col-md-6">
                <h4>Your details</h4>
                @if(isset($name) && @isset($email) && @isset($phonenumber) && @isset($area_resident))
                <p>Name: <strong class="details">{{ $name }}</strong></p>
                <p>Email: <strong class="details">{{ $email }}</strong></p>
                <p>Phone: <strong class="details">{{ $phonenumber }}</strong></p>
                <p>Address: <strong class="details">{{ $area_resident }}</strong></p>
                <button class="btn btn-custom">Change details</button>
                @else
                <p>No details found.</p>
                @endif
            </div>
            <div class="col-md-6">
                <h4>Your Bills</h4>
                @if(isset($billed) && isset($paid) && isset($balance))
                <p>Total billed: <strong class="details">{{ $billed }}</strong></p>
                <p>Paid: <strong class="details">{{ $paid }}</strong></p>
                <p>Balance: <strong class="details">{{ $balance }}</strong></p>
                @else
                <p>No bills found.</p>
                @endif
                <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#paybill">Pay bill</button>
            </div>
           </div>
        </div>
        <div class="card-footer">
            <p><i>check your details if are correct</i></p>
        </div>
    </div>
    <div class="card">
        <div class="card-header"><h4>Water Consuption</h4></div>
        <div class="card-body">
            <canvas id="myChart" style="width:100%;height:450px;"></canvas>

        </div>
        <div class="card-footer">
            <table width="100%">
                <tr>
                    <td><i>Total Units: 30m3</i></td>
                    <td><i>Total Bill: Ksh. 90000</i></td>
                    <td><i>Bonus: 2m3</i></td>
                </tr>
            </table>
        </div>
    </div>

</div>

<script>
    const xValues = ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov', 'dec'];
    const yValues = [7,8,8,9,9,9,10,11,14,14,15,10];
    
    new Chart("myChart", {
      type: "line",
      data: {
        labels: xValues,
        datasets: [{
          fill: false,
          lineTension: 0,
          backgroundColor: "rgba(0,0,255,1.0)",
          borderColor: "rgba(0,0,255,0.1)",
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        scales: {
          yAxes: [{ticks: {min: 6, max:16}}],
        }
      }
    });
    </script>
@stop

<!-- The Modal -->
<div class="modal" id="paybill">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Pay Bill</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action={{ route('paybill')}}>
            @csrf
            <label>Amount(ksh)</label><br>
            <input type="number" class="form-control" id="amount" name="amount" required><br>
            <button type="submit" class="btn btn-custom">Pay</button>
          </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>