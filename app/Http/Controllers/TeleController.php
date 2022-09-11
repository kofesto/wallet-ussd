<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AfricasTalking\SDK\AfricasTalking;

class TeleController extends Controller
{
    protected $username = 'sandbox';  // use 'sandbox' for development in the test environment
    protected $apiKey   = 'b5997844f7adeccae720f5da969f93006f6e6cd8004c1d5335209a0ca0618038';  //use your sandbox app API key for development in the test environment
    //public $AT  = new AfricasTalking($username, $apiKey);
    protected $AT;
    public function __construct()
    {
        //$this->AT = new AfricasTalking();
    }
    //$sms  = $AT->sms();  //sms service
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function ussd(Request $request)
    {
        //url http://localhost:8000/api/ussd
        $text=$request->input('text');
        $session_id = $request->input('sessionId');
        $phone_number = $request->input('phoneNumber');
        $service_code = $request->input('serviceCode');
        $network_code = $request->input('networkCode');
        $level = explode("*", $text);
        /*
         1. "to check your data balance, Enter 1" Response: My Data Balance is
         2. "to check your phone number, Enter 2" Response: My Phone Number is
         3. "Previous" Response: Displays This is the Previous Page
         4. "Next" Response: Displays This is the Next Page
        */
        if($text == ""){
            $response  = "CON Check balance \n";
            $response .= "1. To check your data balance, Enter 1 \n";
            $response .= "2. To check your phone number, Enter 2\n";
            $response .= "3. Next";
        }else if(isset($level[0]) && $level[0] == 1 && !isset($level[1])){
            $data_balance = "300GB";
            $response  ="END Your Data Bal: \n";
            $response .= $data_balance;
        }else if(isset($level[0]) && $level[0] == 2 && !isset($level[1])){
            $response = "END Your Phone Number is \n";
            $response = $phone_number;
        }
        header('Content-type: text/plain');
        return $response;
    }
    public function wallet(Request $request)
    {
        //url http://localhost:8000/api/account
        $text=$request->input('text');
        $session_id = $request->input('sessionId');
        $phone_number = $request->input('phoneNumber');
        $service_code = $request->input('serviceCode');
        $network_code = $request->input('networkCode');
        $level = explode("*", $text);
        /*
        TASK 2 - Africastalking
        Using the same Africastalking API, create this algorithm and implement
        this menu. Then you test your implementation for me on Africastalking
        Simulator.

        The task is to create a reward program or a friend to also sign up and
        earn a 10% reward and credited to the wallet balance from an amount of
        N10,000.00.

        USSD Menu
        1. Refer a Friend (REWARD PROGRAM)
        2. Wallet Balance
        3. Blank Page
        4. Previous
        5. Next

        Step 1: Inserts the phone number of the friend. An SMS is sent to the
        friend with this message "Hello World"
        Step 2: When i select Menu 3 it should take me to the blank page. When i
        select previous, it should take me back to the Wallet balance page, when
        i select next it should tale me to another blank page.
         */
        if($text == ""){
            $response  = "CON welcome to mobile money Africa \n";
            $response .= "1. Refer a Friend, Enter 1 \n";
            $response .= "2. Wallet Balance, Enter 2\n";
            $response .= "3. Blank Page \n";
            $response .= "4. Previous \n";
            $response .= "3. Next";
        } else if(isset($level[0]) && $level[0] ==1 && !isset($level[1])){
            $response  = "Enter your friend phone number";
        }
    }
}

/*
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class USSD extends Controller
{
    public static function session(Request $request)
    {
        //$request->all();
        $text=$request->input('text');
        $session_id = $request->input('sessionId');
        $phone_number = $request->input('phoneNumber');
        $service_code = $request->input('serviceCode');
        $network_code = $request->input('networkCode');
        $level = explode("*", $text);
        //if (isset($text)) {

        if ( $text == "" ) {
            $response="CON Welcome John Doe\n";
            $response .= "1. Account Bal\n";
            $response .= "2. Transfer \n";
            $response .= "3. Airtime Recharge \n";
            $response .= "0. Exit";
        }
        if(isset($level[0]) && $level[0] == 1 && !isset($level[1]))
        {
            $response="END Your account Bal: \n";
            $response .=" #50,000.00 \n";
        }
        if(isset($level[0]) && $level[0] == 2 && !isset($level[1]))
        {
            $response="CON Select Bank \n";
            $response .="1. GTB\n";
            $response .="2. First Bank \n";
            $response .="3. Access Bank \n";
            $response .="4. FCMB \n";
            $response .= "0. back";
        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1]) && !isset($level[2]))
        {
            $response="CON enter Acct. No.\n";

        }
        if(isset($level[0]) && $level[0] == 2  && isset($level[1])  && isset($level[2]))
        {

            $response="END Transaction Successful \n";
            $response .="thanks for patronage \n";

        }
            header('Content-type: text/plain');
            echo $response;
        //}
    }
}
 */
