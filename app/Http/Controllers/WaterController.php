<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class WaterController extends Controller
{
    
    public function bill(Request $request){
        $customer_id = $request->session()->get('customer_id');
        $name = $request->session()->get('name');
        $phonenumber = $request->session()->get('phonenumber');
        $email = $request->session()->get('email');
        $area_resident = $request->session()->get('area_resident');
        $bill = DB::select('select bill_id, amount from bills where customer_id = ?',[$customer_id]);
        $bill_id = $bill[0]->bill_id;
        $billed = $bill[0]->amount;
        $payment = DB::select('select amount from payments where bill_id = ?',[$bill_id]); 
        $paid = $payment[0]->amount;
        $balance = $billed - $paid; 
        if(!$bill){
            return view('water.bill',['name'=>$name, 'email'=>$email, 'area_resident'=>$area_resident, 'phonenumber'=>$phonenumber, 'billed'=>0, 'paid'=>0, 'balance'=>0]);
        }
        
        else{
            
            $monthly_usage = DB::select('select janaury february, march, april, may, june, july, august, september, october, november, december from monthly_consumption where customer_id = ?',[$customer_id]);

            if($monthly_usage){
            $january = $monthly_usage[0]->janaury;
            $february = $monthly_usage[0]->february;
            $march = $monthly_usage[0]->march;
            $april = $monthly_usage[0]->april;
            $may = $monthly_usage[0]->may;
            $june = $monthly_usage[0]->june;
            $july = $monthly_usage[0]->july;
            $august = $monthly_usage[0]->august;
            $september = $monthly_usage[0]->september;
            $october = $monthly_usage[0]->october;
            $november = $monthly_usage[0]->november;
            $december = $monthly_usage[0]->december;
                  
            return view('water.bill',['name'=>$name, 'email'=>$email, 'area_resident'=>$area_resident, 'phonenumber'=>$phonenumber, 'billed'=>$billed, 'paid'=>$paid, 'balance'=>$balance, 'january'=>$january, 'february'=>$february, 'march'=>$march, 'april'=>$april, 'may'=>$may, 'june'=>$june, 'july'=>$july, 'august'=>$august, 'september'=>$september, 'october'=>$october, 'november'=>$november, 'december'=>$december]);
            }
            else{
                return view('water.bill',['name'=>$name, 'email'=>$email, 'area_resident'=>$area_resident, 'phonenumber'=>$phonenumber, 'billed'=>$billed, 'paid'=>$paid, 'balance'=>$balance]);
            }
        }
        
    }

    public function paybill(Request $request){
        $name = $request->session()->get('name');
        $email = $request->session()->get('email');
        $amount = $request->input('amount');
        $customer_id = $request->session()->get('customer_id');
        $date = date('Y-m-d H:i:s');
        $served_by = "Mr. Juky Lalama";
        $bill = DB::select('select bill_id, amount from bills where customer_id =?',[$customer_id]);
        if($bill){
            $billed = $bill[0]->amount;
            $bill_id = $bill[0]->bill_id;
            
            $paid = DB::select('select amount from payments where bill_id =?',[$bill_id]);
            if($paid){
                $paid = $paid[0]->amount;
                $balance = $billed - $paid;
                $new_payment = $paid + $amount;
                $update_payment = DB::update('update payments set amount = ? where bill_id =?',[$new_payment,$bill_id]);

                $paid = DB::select('select amount from payments where bill_id =?',[$bill_id]);
                $paid = $paid[0]->amount;
                $balance = $billed - $paid;

                $transaction = DB::insert('insert into transactions (customer_id, amount) values (?, ?)', [$customer_id, $amount]);
                
                $data = ['amount'=>$amount, 'name'=>$name,'email'=>$email, 'date'=>$date, 'served_by'=>$served_by, 'billed'=>$billed, 'paid'=>$paid, 'balance'=>$balance];
                $pdf = Pdf::loadView('water.receipt', compact('data'));
                return $pdf->stream('document.pdf');

            }
            else{
                $data = ['amount'=>$amount, 'name'=>$name,'email'=>$email, 'date'=>$date, 'served_by'=>$served_by, 'billed'=>0, 'paid'=>0, 'balance'=>0];
                $pdf = Pdf::loadView('water.receipt', compact('data'));
                return $pdf->stream('document.pdf');
                
            }
            
        }
        

    }
    public function registerget(){
       
        return view('water.register');
    }
    public function register(Request $request){
        $fname = $request->input('fname');
        $sname = $request->input('sname');
        $area_resident = $request->input('area_resident');
        $phonenumber = $request->input('phone');
        $email = $request->input('email');
        $password = $request->input('password');
        $password2 = $request->input('password2');
        $name = $fname." ".$sname;

        $select = DB::select('select email from customers where password = ? ', [$password]);
        if($select){
            return view('water.register',['message'=>"customer exists"]);
        }
        else{
            if($password == $password2){
                
                DB::insert('insert into customers (name,area_resident,phonenumber,email,password) values (?,?,?,?,?)', [$name, $area_resident, $phonenumber, $email, $password]);
            return view('water.register',['message'=>"Successfully registered"]);
            }
            else{
                return view('water.register',['message'=>"passwords do not match"]);
            }

        }
        
        
    }
    public function loginget(){
        return view('water.login');
    }
    public function login(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');
        $select = DB::select('select customer_id, name, area_resident, phonenumber, email from customers where email = ? and password = ?', [$email, $password]);
        if($select){
            $customer_id = $select[0]->customer_id;
            $name = $select[0]->name;
            $phonenumber = $select[0]->phonenumber;
            $area_resident = $select[0]->area_resident;
            $request->session()->put('customer_id', $customer_id);
            $request->session()->put('email', $email);
            $request->session()->put('password', $password);
            $request->session()->put('name', $name);
            $request->session()->put('phonenumber', $phonenumber);
            $request->session()->put('area_resident', $area_resident);
            return view('water.home',['name' => $name, 'email' => $email]);
        }
        else{
            return view('water.login',['message'=>"Invalid email or password"]);
        }

        
    }
    public function home(Request $request){
        $name = $request->session()->get('name');
        
        return view('water.home',['name' => $name]);
    }
    public function messages(Request $request){
        $name = $request->session()->get('name');
        $customer_id = $request->session()->get('customer_id');
        $select_message = DB::select('select message_type, message_text, sent_at from messages where customer_id = ?', [$customer_id]);
        return view('water.messages',['name' => $name,'messages'=>$select_message]);
    }
    public function admin(){
        $count_hindi_town = DB::select('select count(area_resident) as hindi_town from customers where area_resident = ?',['Hindi Town']); 
        $count_hindi_mashambani = DB::select('select count(area_resident) as hindi_mashambani from customers where area_resident = ?',['Hindi Mashambani']); 
        $count_ndeu = DB::select('select count(area_resident) as ndeu from customers where area_resident = ?',['Ndeu']);
        $count_sabasaba = DB::select('select count(area_resident) as sabasaba from customers where area_resident = ?',['Sabasaba']);

        $hindi_town = $count_hindi_town[0]->hindi_town;
        $hindi_mashambani = $count_hindi_mashambani[0]->hindi_mashambani;
        $ndeu = $count_ndeu[0]->ndeu;
        $sabasaba = $count_sabasaba[0]->sabasaba;
        $total_customers = $hindi_town + $hindi_mashambani + $ndeu + $sabasaba;
        
        $area_residents = DB::select('select area_resident from customers');
        $data = [];
        foreach($area_residents as $area_resident){
            $result = DB::select('select count(w.meter_reading) as meter_reading, count(b.amount) as billed, count(p.amount) as paid from waterusage w 
            join customers c on w.customer_id = c.customer_id join bills b on w.customer_id = b.customer_id
            join payments p on b.bill_id = p.bill_id
            where c.area_resident = ?;', [$area_resident->area_resident]);

            if($result){
                $balance  = $result[0]->paid  -  $result[0]->billed;
                $data[$area_resident->area_resident] = [
                    'meter_reading' => $result[0]->meter_reading,
                     'billed' => $result[0]->billed,
                     'paid' => $result[0]->paid,
                     'balance' => $balance,
                 ];

            }
            else{
                $data[$area_resident->area_resident] = [
                    'meter_reading' => 0,
                     'billed' => 0,
                     'paid' => 0,
                     'balance' => 0,
                 ];
            }

            

        }


        return view('water.admin', ['hindi_town' => $hindi_town, 'hindi_mashambani' => $hindi_mashambani,'ndeu' => $ndeu, 'sabasaba'=>$sabasaba, 'total_customers'=>$total_customers], compact('data'));
    }

    public function adminpost(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $select_admin = DB::select('select name, email, phonenumber, previledges from admins where email = ? and password = ?', [$email, $password]);
        if($select_admin){
            $name = $select_admin[0]->name;
            $email = $select_admin[0]->email;
            $phonenumber = $select_admin[0]->phonenumber;
            $previledges = $select_admin[0]->previledges;
            $request->session()->put('name', $name);
            $request->session()->put('phonenumber', $phonenumber);
            $request->session()->put('previledges', $previledges);
            
            $count_hindi_town = DB::select('select count(area_resident) as hindi_town from customers where area_resident = ?',['Hindi Town']); 
            $count_hindi_mashambani = DB::select('select count(area_resident) as hindi_mashambani from customers where area_resident = ?',['Hindi Mashambani']); 
            $count_ndeu = DB::select('select count(area_resident) as ndeu from customers where area_resident = ?',['Ndeu']);
            $count_sabasaba = DB::select('select count(area_resident) as sabasaba from customers where area_resident = ?',['Sabasaba']);

            $hindi_town = $count_hindi_town[0]->hindi_town;
            $hindi_mashambani = $count_hindi_mashambani[0]->hindi_mashambani;
            $ndeu = $count_ndeu[0]->ndeu;
            $sabasaba = $count_sabasaba[0]->sabasaba;
            $total_customers = $hindi_town + $hindi_mashambani + $ndeu + $sabasaba;
        
            $area_residents = DB::select('select area_resident from customers');
            $data = [];
            $paid = 0;
            $billed = 0;
            foreach($area_residents as $area_resident){
            $result = DB::select('select count(w.meter_reading) as meter_reading, count(b.amount) as billed, count(p.amount) as paid from waterusage w 
            join customers c on w.customer_id = c.customer_id join bills b on w.customer_id = b.customer_id
            join payments p on b.bill_id = p.bill_id
            where c.area_resident = ?;', [$area_resident->area_resident]);

            if($result){
                $paid += $result[0]->paid;
                $billed += $result[0]->billed;
                $balance  = $paid  -  $billed;
                $data[$area_resident->area_resident] = [
                    'meter_reading' => $result[0]->meter_reading,
                     'billed' => $result[0]->billed,
                     'paid' => $result[0]->paid,
                     'balance' => $balance,
                 ];

            }
            else{
                $data[$area_resident->area_resident] = [
                    'meter_reading' => 0,
                     'billed' => 0,
                     'paid' => 0,
                     'balance' => 0,
                 ];
            }
        }

        $select_payments = DB::select('select transaction_id, amount, transaction_date from transactions');

        return view('water.admin', ['hindi_town' => $hindi_town, 'hindi_mashambani' => $hindi_mashambani,'ndeu' => $ndeu, 'sabasaba'=>$sabasaba, 'total_customers'=>$total_customers, 'name'=>$name, 'email'=>$email, 'phonenumber'=>$phonenumber, 'previledges'=>$previledges, 'transactions'=>$select_payments], compact('data'));
        }

    }
}
