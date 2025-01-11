@extends('water.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('styles/register.css') }}">
<form>
    @csrf
    <table width="100%">
        <tr>
            <td>
                <label for="fname">First Name</label><br>
                <input type="text" id="fname" class="form-control" name="fname" placeholder="e.g John" required><br>
            </td>
            <td>
                <label for="sname">Second Name</label><br>
                <input type="text" id="sname" class="form-control" name="sname" placeholder="e.g Doe" required><br>
            </td>
        </tr>
    </table>
    <label for="area">Area of resident</label><br>
    <select class="form-control" id="area" name="area" required>
        <option value="Hindi Town">Hindi Town</option>
        <option value="Hindi Mashambani">Hindi Mashambani</option>
        <option value="Jua kali">Jua kali</option>
        <option value="Sabasaba">Sabasaba</option>
        <option value="Ndeu">Ndeu</option>
        <option value="Kiongoni">Kiongoni</option>
    </select><br>
    <label for="phone">Phone Number</label><br>
    <input type="text" id="phone" class="form-control" name="phone" placeholder="e.g 0797655727" required><br>
    <label for="email">Email</label><br>
    <input type="email" id="email" class="form-control" name="email" placeholder="e.g john@example.com" required><br>
    <label for="password">Password</label><br>
    <input type="password" id="password" class="form-control" name="password" placeholder="enter your password" required><br>
    <label for="password">Confirm Password</label><br>
    <input type="password" id="password" class="form-control" name="password2" placeholder="enter your password" required><br>
    <button type="submit" class="btn btn-custom">Register</button>
</form>
@stop