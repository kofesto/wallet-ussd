<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

/*
 * ON LARAVEL FRAMEWORK

TASK 1 - Africastalking
Assuming you work for MTN, implement a USSD backend that let me check my
data balance assuming this fake endpoint return the user databalance
www.fakemtnendpoint.com/getdatabalance/{phonenumber}/

And assuming this is the data returned
{"dataBal":"500GB"}

Implement it in such a way that on the first screen:

You ask to enter a number to continue and display the responses below.

Something like:

1. "to check your data balance, Enter 1" Response: My Data Balance is
2. "to check your phone number, Enter 2" Response: My Phone Number is
3. "Previous" Response: Displays This is the Previous Page
4. "Next" Response: Displays This is the Next Page

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

TASK 3 - (API)
If i am to exchange 2 different currencies realtime, Eg. Naira to Dollar
or Cedis to Dollar at the prevailing exchange rate, what APIs would you
recommend to carry on this task seamlessly?

Please download Any desk application and share your presentation to me
by 12:00 noon tomorrow, 31st. August, 2022. If that time is not
convenient for you, please let me know what time you can present to me
tomorrow.

The HR Team.

 */
