<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sample email</title>
    <link rel="stylesheet" href="{{ asset('styles/mail.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Welcome to G-Tech Caravan!</h1>
            </div>
            <div class="card-body">
                <h4>{{$subject}}</h4>
                <img src="{{ $message->embed(public_path('/images/kickoff.png')) }}" alt="kickoff" class="card-image" width="100%">
                <p>{{$msg}}</p>
            </div>
            <div class="card-footer">
                <p><i>Thank you, we are proud of you to be part of our caravan!</i></p>
            </div>
        </div>
    </div>
</body>
</html>