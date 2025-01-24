<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>payment receipt</title>
</head>
<body>
    <div>
        <img src="./images/tech.png"  alt="logo" style="width:100px; height:100px;margin-left:45%; margin-right: 45%; border-radius: 50%;"/><hr>
        <p>Contact: +254 797655727  Email:watersupply@gmail.com Website:www.watersupply.com</p><hr>
    </div>

    <h4>Name: {{ $data["name"] }}</h4>
    <h4>Email: {{ $data["email"]}} </h4>
    <h4>Time: {{ $data["date"]}}</h4>
    <table width="100%" border="2">
        <tr>
            <td>Service</td>
            <td>Amount Billed</td>
            <td>Amount Paid</td>
            <td>Balance</td>
        </tr>
        <tr>
            <td>Pay bill</td>
            <td>Ksh. {{ $data["billed"] }}</td>
            <td>Ksh. {{ $data["paid"]}}</td>
            <td>Ksh. {{ $data["balance"]}}</td>
        </tr>
    </table>
    <p><i>Thank you!</i></p>
    <p><i>Served by {{ $data["served_by"]}}</i></p>

    <footer>
        <hr>
        <p><i>supplying water for life for everyone</i></p>
    </footer>
    
</body>
</html>