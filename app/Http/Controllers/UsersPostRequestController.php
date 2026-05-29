<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class UsersPostRequestController extends Controller
{
    // register
    public function Register(){
        try{
        
        $name=trim(request('first_name')).' '.trim(request('last_name'));
        $name=ucwords(strtolower($name));
        $username=str_replace('-','_',request('username'));
        $username=trim(strtolower(str_replace([' ','@'],'',$username)));
        $email=trim(strtolower(str_replace(' ','',strtolower(request('email')))));
        $phone=request('phone');
        $password=request('password');
        $confirm_password=request('confirm_password');
        $general=json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}');
        $welcome_bonus=$general->welcome_bonus;
  

         // sanitize phone number
        if(str::startsWith($phone,'234')){
            $phone=Str::replaceFirst('234','',$phone);
        }
        if(str::startsWith($phone,'0')){
            $phone=Str::replaceFirst('0','',$phone);
        }
        $phone='0'.$phone;

        // make sure its valid phone number
        if(strlen($phone) != 11){
            return response()->json([
                'message' => 'Please enter a valid phone number',
                'status' => 'error'
            ]);
        }
    // make sure email dies not exists
       if(DB::table('users')->where('email',$email)->exists()){
        return response()->json([
            'message' => 'Email already exists on our server',
            'status' => 'error'
        ]);
       }
    //    make sure username does not exist
    if(DB::table('users')->where('username',$username)->exists()){
    return response()->json([
        'message' => 'Username already exists on our server',
        'status' => 'error'
    ]);
    }
    //    make sure phone number does not exists
    if(DB::table('users')->where('phone',$phone)->exists()){
        return response()->json([
            'message' => 'Phone number already exists on our server',
            'status' => 'error'
        ]);
    }
    // make sure password and confirm password are the same
    if(!Hash::check($password,Hash::make($confirm_password))){
        return response()->json([
        'message' => 'Password & confirm password must match',
        'status' => 'error'
        ]);
          
    }
    
   DB::transaction(function() use($username,$phone,$name,$general,$email,$welcome_bonus,$password){
    // insert into db
    DB::table('users')->insert([
        'uniqid' => GenerateID(),
        'type' => 'user',
        'username' => $username,
        'phone' => $phone,
        'name' => $name,
        'ref' => DB::table('users')->where('uniqid',request('ref'))->first()->username ?? null,
        'email' => $email,
        'package' => 'Free Plan',
        'main_balance' => $welcome_bonus,
        'password' => Hash::make($password),
        'updated' => Carbon::now(),
        'date' => Carbon::now(),
        'last_spin' => Carbon::yesterday()
    ]);
    // insert into trx
    if($welcome_bonus > 0){
     DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => DB::table('users')->where('email',$email)->first()->id,
    'title' => 'Sign up Bonus',
    'class' => 'credit',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M11.8611 2.39057C12.8495 1.73163 14.1336 1.71797 15.1358 2.35573L19.291 4.99994H20.9998C21.5521 4.99994 21.9998 5.44766 21.9998 5.99994V14.9999C21.9998 15.5522 21.5521 15.9999 20.9998 15.9999H19.4801C19.5396 16.9472 19.0933 17.9102 18.1955 18.4489L13.1021 21.505C12.4591 21.8907 11.6609 21.8817 11.0314 21.4974C10.3311 22.1167 9.2531 22.1849 8.47104 21.5704L3.33028 17.5312C2.56387 16.9291 2.37006 15.9003 2.76579 15.0847C2.28248 14.7057 2 14.1254 2 13.5109V6C2 5.44772 2.44772 5 3 5H7.94693L11.8611 2.39057ZM4.17264 13.6452L4.86467 13.0397C6.09488 11.9632 7.96042 12.0698 9.06001 13.2794L11.7622 16.2518C12.6317 17.2083 12.7903 18.6135 12.1579 19.739L17.1665 16.7339C17.4479 16.5651 17.5497 16.2276 17.4448 15.9433L13.0177 9.74551C12.769 9.39736 12.3264 9.24598 11.9166 9.36892L9.43135 10.1145C8.37425 10.4316 7.22838 10.1427 6.44799 9.36235L6.15522 9.06958C5.58721 8.50157 5.44032 7.69318 5.67935 7H4V13.5109L4.17264 13.6452ZM14.0621 4.04306C13.728 3.83047 13.3 3.83502 12.9705 4.05467L7.56943 7.65537L7.8622 7.94814C8.12233 8.20827 8.50429 8.30456 8.85666 8.19885L11.3419 7.45327C12.5713 7.08445 13.8992 7.53859 14.6452 8.58303L18.5144 13.9999H19.9998V6.99994H19.291C18.9106 6.99994 18.5381 6.89148 18.2172 6.68727L14.0621 4.04306ZM6.18168 14.5448L4.56593 15.9586L9.70669 19.9978L10.4106 18.7659C10.6256 18.3897 10.5738 17.9178 10.2823 17.5971L7.58013 14.6247C7.2136 14.2215 6.59175 14.186 6.18168 14.5448Z"></path></svg>',
    'type' => 'welcome_bonus',
    'amount' => $welcome_bonus,
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'main_balance',

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => 0,
        'after' => $welcome_bonus
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    }
    if(DB::table('users')->where('uniqid',request('ref'))->exists()){
        $ref=DB::table('users')->where('uniqid',request('ref'))->first();
         if($general->referral_commission > 0){
            DB::table('users')->where('id',$ref->id)->increment('affiliate_balance',$general->referral_commission);
     DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => $ref->id,
    'title' => 'Referral Earning',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"></path></svg>',
    'class' => 'credit',
    'type' => 'referral_commission',
    'amount' => $general->referral_commission,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'referral_balance',

    ]),
    'data' => json_encode([
        'Downline' => ucfirst($username)
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => $ref->affiliate_balance,
        'after' => $ref->affiliate_balance + $general->referral_commission
    ],
    'primary_wallet' => collect(Wallets())->where('key','affiliate_balance')->first()->name,
    'type' => 'referral_commission',
    'downline' => $username
    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
        }
    }
   });
    return response()->json([
        'message' => 'Registration successfull,redirecting...',
        'status' => 'success'
    ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Internal server error,please try again later',
                'status' => 'error'
            ]);
        }
       
    }

    // login
    public function Login(){
         $username=str_replace('-','_',request('id'));
        $username=trim(strtolower(str_replace([' ','@'],'',$username)));
        $password=request('password');
       
        if(!DB::table('users')->where('username',$username)->exists()){
            return response()->json([
                'message' => 'User not found',
                'status' => 'error'
            ]);
        }
        $user=DB::table('users')->where('username',$username)->first();
        if(!Hash::check($password,$user->password)){
            return response()->json([
                'message' => 'Invalid account password',
                'status' => 'error'
            ]);
        }
        if($user->status == 'banned'){
            return response()->json([
                'message' => 'User account has been banned,please contact admin',
                'status' => 'error'
            ]);
        }

        Auth::guard('users')->loginUsingId($user->id,true);
        return response()->json([
            'message' => 'Login successful,redirecting...',
            'status' => 'success'
        ]);
    }

    // social settings
    public function SocialSettings(){
        $facebook=request('facebook') == '' ? null : request('facebook');
        $tiktok=request('tiktok') == '' ? null : request('tiktok');
        $instagram=request('instagram') == '' ? null : request('instagram');
        $twitter=request('twitter') == '' ? null : request('twitter');
        $whatsapp=request('whatsapp') == '' ? null : request('whatsapp');
        $telegram=request('telegram') == '' ? null : request('telegram');
        if($whatsapp && strlen($whatsapp) != 11){
            return response()->json([
                'message' => 'Enter a valid 11 digit phone number',
                'status' => 'error'
            ]);
        }
        $socials=[
             'facebook' => $facebook ?? null,
            'tiktok' => $tiktok ?? null,
            'instagram' => $instagram ?? null,
            'twitter' => $twitter ?? null,
            'whatsapp' => $whatsapp ?? null,
            'telegram' => $telegram ?? null
        ];
        

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'socials' => json_encode($socials)
        ]);
        return response()->json([
    'message' => 'Social settings updated successfully',
    'status' => 'success'
        ]);
    }

    // payout settings
    public function PayoutSettings(){
        $bank_name=request('bank_name');
        $account_number=request('account_number');
        $account_name=request('account_name');
        if(strlen(trim($account_number)) !== 10){
            return response()->json([
                'message' => 'Please enter a 10 digits account number',
                'status' => 'error'
            ]);
        }
        $bank=[
            'account_number' => trim($account_number),
            'bank_name' => $bank_name,
            'account_name' => $account_name
        ];
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'bank' => json_encode($bank)
        ]);
        return response()->json([
            'message' => 'Payout settings updated successfully',
            'status' => 'success'
        ]);
    }

    // update profile
    public function UpdateProfile(){
        $photo=GenerateID().'.'.request()->file('photo')->getClientOriginalExtension();
        $photo=strtolower($photo);
        if(request()->file('photo')->move(public_path('photos/users'),$photo)){
            DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                'photo' => $photo,
                'updated' => Carbon::now()
            ]);
            return response()->json([
                'message' => 'Profile photo updated successfully',
                'status' => 'success'
            ]);
        }
    }

    // update password
    public function UpdatePassword(){
        $current=request('current');
        $new=request('new');
        $confirm=request('confirm');
        if(!Hash::check($current,Auth::guard('users')->user()->password)){
            return response()->json([
                'message' => 'Invalid currrent password',
                'status' => 'error'
            ]);
        }
        if(!Hash::check($confirm,Hash::make($new))){
            return response()->json([
                'message' => 'New password and confirm password must be the same',
                'status' => 'error'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'password' => Hash::make($new),
            'updated' => Carbon::now()
        ]);
        return response()->json([
            'message' => 'Account password updated successfully',
            'status' => 'success'
        ]);
    }
    // post task
    public function PostTask(){
        $id=GenerateID();
        $link='<a target="_blank" href="'.request('link').'" class="c-primary w-fit">Visit Link</a>';
        $type=request('type');
        $type=DB::table('task_categories')->where('id',$type)->first();
         $limit=$type->members;
        $cost=$type->cost * $type->members;
        if($cost > Auth::guard('users')->user()->deposit_balance){
            return response()->json([
                'message' => 'Insufficient balance, add funds to your account to continue posting ads',
                'status' => 'error'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
            'deposit_balance' => DB::raw('deposit_balance - '.$cost.''),
            'updated' => Carbon::now()
        ]);
        DB::table('transactions')->insert([
    'uniqid' => $id,
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Ads Posting',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.598 16 9.39893 8H7.39893L5.39893 13 5.39795 13.002 4.19897 16H6.35303L6.75293 15H10.043L10.443 16H12.598ZM7.552 13 8.39893 10.8851 9.24402 13H7.552ZM17 8H19V16H16C14.3431 16 13 14.6569 13 13 13 11.3431 14.3431 10 16 10H17V8ZM16 12C15.4478 12 15 12.4478 15 13 15 13.5522 15.4478 14 16 14H17V12H16ZM21 3H3C2.44775 3 2 3.44775 2 4V20C2 20.5522 2.44775 21 3 21H21C21.5522 21 22 20.5522 22 20V4C22 3.44775 21.5522 3 21 3ZM4 19V5H20V19H4Z"></path></svg>',
    'class' => 'debit',
    'type' => 'ads_posting',
    'amount' => $cost,
    'wallet' => json_encode([
        'from' => 'deposit_balance',
        'to' => 'admin',

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->deposit_balance,
        'after' => Auth::guard('users')->user()->deposit_balance - $cost
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
    'data' => json_encode([
   'Task link' => $link,
   'Task type' => $type->name,
   'members needed' => $type->members,
   'platform' => $type->platform
    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    if(request()->hasFile('banner')){
        $name=time().'.'.request()->file('banner')->getClientOriginalExtension();
        request()->file('banner')->move(public_path('tasks/banners'),$name);
    }
    DB::table('tasks')->insert([
        'uniqid' => GenerateID(),
        'user_id' => Auth::guard('users')->user()->id,
        'type' => json_encode($type),
         'limit' => $limit,
        'proofs' => 0,
        'link' => request('link'),
        'caption' => request('caption') ?? null,
        'banner' => $name ?? null,
        'status' => 'active',
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
        return response()->json([
            'link' => url('users/transaction/receipt?id=').DB::table('transactions')->where('uniqid',$id)->where('user_id',Auth::guard('users')->user()->id)->first()->id,
            'message' => 'Ad posted successfully',
            'status' => 'success'
        ]);
    }

    // recharge
    public function Recharge(){
        $id=GenerateID();
        $amount=request('amount');
        $name=time().'.'.request()->file('receipt')->getClientOriginalExtension();
        $bank=json_decode(DB::table('settings')->where('key','bank_settings')->first()->value ?? '{}');
        if(request()->file('receipt')->move(public_path('receipt'),$name)){
            $receipt=asset('receipt/'.$name.'');
            $proof='<a target="_blank" href="'.$receipt.'" class="c-primary w-fit">View proof</a>';
       DB::table('transactions')->insert([
    'uniqid' => $id,
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Wallet funding',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M22.0049 6.99979H23.0049V16.9998H22.0049V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V6.99979ZM20.0049 16.9998H14.0049C11.2435 16.9998 9.00488 14.7612 9.00488 11.9998C9.00488 9.23836 11.2435 6.99979 14.0049 6.99979H20.0049V4.99979H4.00488V18.9998H20.0049V16.9998ZM21.0049 14.9998V8.99979H14.0049C12.348 8.99979 11.0049 10.3429 11.0049 11.9998C11.0049 13.6566 12.348 14.9998 14.0049 14.9998H21.0049ZM14.0049 10.9998H17.0049V12.9998H14.0049V10.9998Z"></path></svg>',
    'class' => 'credit',
    'type' => 'deposit',
    'amount' => $amount,
    'wallet' => json_encode([
         'from' => [
            'method' => 'bank',
            'account_number' => null,
            'bank_name' => null,
            'account_name' => null,
            'receipt' => $receipt
        ],
        'to' => 'deposit_balance',
       

    ]),
    'json' => json_encode([
    'balance' => [
        'before' => 10000,
        'after' => 16000
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
     'data' => json_encode([
    'gateway' => 'Manual',
    'Payment proof' => $proof,
    'account number' => $bank->account_number,
    'bank name' => $bank->bank_name,
    'account name' => $bank->account_name
    ]),
    'status' => 'pending',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    return response()->json([
        'message' => 'Deposit requesrt submitted successfully',
        'status' => 'success',
        'url' => url('users/transaction/receipt?id=').DB::table('transactions')->where('uniqid',$id)->where('user_id',Auth::guard('users')->user()->id)->first()->id
    ]);
        }

        return response()->json([
            'message' => 'Internal server error,please try again',
            'status' => 'error'
        ]);
       

    }

    // complete task
    public function CompleteTask(){
     
            $task=DB::table('tasks')->where('id',request('id'))->first();
            $reward=json_decode($task->type)->earning;
            $status='pending';
            $message='Task Completed successfully,awaiting review';
            $proof=' <a class="c-primary no-select no-u w-fit">No Screenshot attached</a>';
            if(DB::table('task_proofs')->where('user_id',Auth::guard('users')->user()->id)->where('task->id',request('id'))->exists()){
                return response()->json([
                    'message' => 'You have already performed this task before',
                    'status' => 'error'
                ]);
            }

            if($task->proofs >= $task->limit){
                return response()->json([
                    'message' => 'Task already completed',
                    'status' => 'success'
                ]);
            }

            if(request()->hasFile('screenshot')){
                $name=strtolower(GenerateID()).'.'.request()->file('screenshot')->getClientOriginalExtension();
                request()->file('screenshot')->move(public_path('tasks/proofs'),$name);
                $proof=' <a href="'.asset('tasks/proofs/'.$name.'').'" target="_blank" class="c-primary no-select w-fit">
                        View Screenshot
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M228,104a12,12,0,0,1-24,0V69l-59.51,59.51a12,12,0,0,1-17-17L187,52H152a12,12,0,0,1,0-24h64a12,12,0,0,1,12,12Zm-44,24a12,12,0,0,0-12,12v64H52V84h64a12,12,0,0,0,0-24H48A20,20,0,0,0,28,80V208a20,20,0,0,0,20,20H176a20,20,0,0,0,20-20V140A12,12,0,0,0,184,128Z"></path></svg>

                    </a>';
            }
            if(config('settings.task_reward') != 'review'){
                $status='approved';
                $message='Task Completed successfully and reward granted success';
                DB::transaction(function() use($task,$reward){
     DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
                        'main_balance' => DB::raw('main_balance + '.$reward.''),
                        'updated' => Carbon::now()
                ]);
               
                 DB::table('transactions')->insert([
                         'uniqid' => GenerateID(),
                'user_id' => Auth::guard('users')->user()->id,
                'title' => 'Completed daily task',
                'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 4H5V20H19V4ZM3 2.9918C3 2.44405 3.44749 2 3.9985 2H19.9997C20.5519 2 20.9996 2.44772 20.9997 3L21 20.9925C21 21.5489 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918ZM11.2929 13.1213L15.5355 8.87868L16.9497 10.2929L11.2929 15.9497L7.40381 12.0607L8.81802 10.6464L11.2929 13.1213Z"></path></svg>',
                'class' => 'credit',
                'type' => 'task_reward',
                'amount' => $reward,
                'fee' => 0,
               'wallet' => json_encode([
                'from' => 'Task',
                'to' => 'main_balance',

                ]),
                'data' => json_encode([
                    'Task Performed' => json_decode($task->type)->name
                ]),
                'json' => json_encode([
                'balance' => [
                'before' => Auth::guard('users')->user()->main_balance,
                'after' => Auth::guard('users')->user()->main_balance + $reward 
                ],
                'primary_wallet' => 'Main Wallet'

            ]),
    
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
                });
               
            }

            DB::transaction(function() use($task,$proof,$status){
            DB::table('tasks')->where('id',request('id'))->update([
                'proofs' => DB::raw('proofs + 1')
            ]);
            DB::table('task_proofs')->insert([
                'uniqid' => GenerateID(),
                'user_id' => Auth::guard('users')->user()->id,
                'task' => json_encode($task),
                'proofs' => json_encode([
                    'Screenshot' => $proof
                ]),
                'status' => $status,
                'updated' => Carbon::now(),
                'date' => Carbon::now() 
            ]);
            });
            
            return response()->json([
                'message' => $message,
                'status' => 'success'
            ]);




    }

    // withdrawal
    public function Withdrawal(){
      
        $amount=request('amount');
        $wallet=request('wallet');
        $uniqid=GenerateID();
        $settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}');
        $fee=($settings->withdrawal->fee * $amount)/100;
        $bank=json_decode(Auth::guard('users')->user()->bank ?? '{}');
        $portal=$settings->withdrawal->{$wallet}->portal;
        $minimum=$settings->withdrawal->{$wallet}->minimum;
        $maximum=$settings->withdrawal->{$wallet}->maximum;
        $wallet_name=collect(Wallets())->where('key',$wallet)->first()->name;
        $count=$settings->withdrawal->count;
      
        if(Auth::guard('users')->user()->status == 'banned'){
            return response()->json([
                'message' => 'You account has been banned',
                'status' => 'error'
            ]);
        }
   
        if(DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','withdrawal')->whereDate('date',Carbon::today())->count() >= $count){
            return response()->json([
                'message' => 'You can only withdraw up to '.number_format($count).' times daily',
                'status' => 'error'
            ]);
        }

         if(empty($bank)){
            return response()->json([
                'message' => 'Please Link your withdrawal account to place withdrawal',
                'status' => 'error'
            ]);
        }

        if($amount > Auth::guard('users')->user()->{$wallet}){
                return response()->json([
                    'message' => 'Insufficient balance',
                    'status' => 'error'
                ]);
        }

        if($amount < $minimum){
            return response()->json([
                'message' => 'Minimum withdrawal for '.$wallet_name.' is '.Auth::guard('users')->user()->currency.number_format($minimum,2),
                'status' => 'info'
            ]);
        }
        if($amount > $maximum){
            return response()->json([
                'message' => 'Maximum withdrawal for '.$wallet_name.' is '.Auth::guard('users')->user()->currency.number_format($maximum,2),
                'status' => 'info'
            ]);
        }
        if($portal == 'off'){
            return response()->json([
                'message' => ''.$wallet.' Withdrawal portal is currently off',
                'status' => 'info'
            ]);
        }

        DB::table('users')->where('id',Auth::guard('users')->user()->id)->decrement($wallet,$amount);
           DB::table('transactions')->insert([
    'uniqid' => $uniqid,
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Withdrawal to '.$bank->bank_name.'',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979ZM20.0049 10.9998H4.00488V18.9998H20.0049V10.9998ZM20.0049 8.99979V4.99979H4.00488V8.99979H20.0049ZM14.0049 14.9998H18.0049V16.9998H14.0049V14.9998Z"></path></svg>',
    'class' => 'debit',
    'type' => 'withdrawal',
    'amount' => $amount - $fee,
    'fee' => $fee,
    'wallet' => json_encode([
        'from' => 'main_balance',
        'to' => [
            'method' => 'bank',
            'account_number' => $bank->account_number,
            'bank_name' => $bank->bank_name,
            'account_name' => $bank->account_name
        ],

    ]),
    'data' => json_encode([
        'Withdrawal Amount' => Auth::guard('users')->user()->currency.number_format($amount,2),
        'To receive' => Auth::guard('users')->user()->currency.number_format($amount - $fee,2),
        'Fee' => Auth::guard('users')->user()->currency.number_format($fee,2),
        'Account Number' => $bank->account_number,
        'Bank Name' => $bank->bank_name,
        'Account Name' => $bank->account_name,
        'wallet' => collect(Wallets())->where('key',$wallet)->first()->name
    ]),
    'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->{$wallet},
        'after' => Auth::guard('users')->user()->{$wallet} - $amount
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'pending',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    $receipt_id=DB::table('transactions')->where('uniqid',$uniqid)->where('user_id',Auth::guard('users')->user()->id)->first()->id;

    return response()->json([
        'message' => 'Withdrawal placed successfully,awaiting processing',
        'status' => 'success',
        'url' => url('users/transaction/receipt?id='.$receipt_id.'')
    ]);

    }

    // upgrade account
    public function UpgradeAccount(){
        $settings=json_decode(DB::table('settings')->where('key','upgrade_settings')->first()->value ?? '{}');
        if($settings->upgrade->fee > Auth::guard('users')->user()->deposit_balance){
            return response()->json([
                'message' => 'Insufficient balance,kindly fund your account',
                'status' => 'error'
            ]);
        }
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->decrement('deposit_balance',$settings->upgrade->fee);
        DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Account Upgrade',
    'class' => 'debit',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.48 22 2 17.52 2 12C2 6.48 6.48 2 12 2ZM12 20C16.42 20 20 16.42 20 12C20 7.58 16.42 4 12 4C7.58 4 4 7.58 4 12C4 16.42 7.58 20 12 20ZM13 12V16H11V12H8L12 8L16 12H13Z"></path></svg>',
     'type' => 'account_upgrade',
    'amount' => $settings->upgrade->fee,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'deposit_balance',
        'to' => 'none',

    ]),
    'data' => json_encode([
        'Upgrade Plan' => $settings->upgrade->name
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->deposit_balance,
        'after' => Auth::guard('users')->user()->deposit_balance - $settings->upgrade->fee
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$settings->upgrade->cashback);
    if($settings->upgrade->cashback != 0){
         DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Upgrade Cashback',
    'class' => 'credit',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12.0004 16C14.2095 16 16.0004 14.2091 16.0004 12 16.0004 9.79086 14.2095 8 12.0004 8 9.79123 8 8.00037 9.79086 8.00037 12 8.00037 14.2091 9.79123 16 12.0004 16ZM21.0049 4.00293H3.00488C2.4526 4.00293 2.00488 4.45064 2.00488 5.00293V19.0029C2.00488 19.5552 2.4526 20.0029 3.00488 20.0029H21.0049C21.5572 20.0029 22.0049 19.5552 22.0049 19.0029V5.00293C22.0049 4.45064 21.5572 4.00293 21.0049 4.00293ZM4.00488 15.6463V8.35371C5.13065 8.017 6.01836 7.12892 6.35455 6.00293H17.6462C17.9833 7.13193 18.8748 8.02175 20.0049 8.3564V15.6436C18.8729 15.9788 17.9802 16.8711 17.6444 18.0029H6.3563C6.02144 16.8742 5.13261 15.9836 4.00488 15.6463Z"></path></svg>',
     'type' => 'upgrade_cashback',
    'amount' => $settings->upgrade->cashback,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'none',
        'to' => 'main_balance',

    ]),
    'data' => json_encode([
        'Upgrade Plan' => $settings->upgrade->name
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->main_balance,
        'after' => Auth::guard('users')->user()->main_balance + $settings->upgrade->cashback
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    }

    DB::table('users')->where('id',Auth::guard('users')->user()->id)->update([
        'upgraded' => 'yes',
        'package' => $settings->upgrade->name
    ]);

    return response()->json([
        'message' => 'Account upgraded success',
        'status' => 'success'
    ]);
    }

    // redeem gift code
    public function RedeemGiftCode(){
       $code=DB::table('gift_codes')->where('code',request('code'));
       if(!$code->exists()){
        return response()->json([
            'message' => 'Invalid gift code',
            'status' => 'warning'
        ]);
       }

       $code=$code->first();
        if(DB::table('redeemed_gift_codes')->where('gift_code->code',request('code'))->exists()){
            return response()->json([
                'message' => 'Gift code have already been redeemed by you',
                'status' => 'error'
            ]);
        }

       if($code->redeemed >= $code->limit){
        return response()->json([
            'message' => 'Gift code have been fully redeemed',
            'status' => 'info'
        ]);
       }
    DB::table('redeemed_gift_codes')->insert([
        'uniqid' => GenerateID(),
        'user_id' => Auth::guard('users')->user()->id,
        'gift_code' => json_encode($code),
        'status' => 'success',
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
       DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$code->value);
      DB::table('gift_codes')->where('id',$code->id)->increment('redeemed');
      $receipt_id=GenerateID();
       DB::table('transactions')->insert([
    'uniqid' => $receipt_id,
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Redeemed gift code "'.request('code').'"',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M15.0049 2.00281C17.214 2.00281 19.0049 3.79367 19.0049 6.00281C19.0049 6.73184 18.8098 7.41532 18.4691 8.00392L23.0049 8.00281V10.0028H21.0049V20.0028C21.0049 20.5551 20.5572 21.0028 20.0049 21.0028H4.00488C3.4526 21.0028 3.00488 20.5551 3.00488 20.0028V10.0028H1.00488V8.00281L5.54065 8.00392C5.19992 7.41532 5.00488 6.73184 5.00488 6.00281C5.00488 3.79367 6.79574 2.00281 9.00488 2.00281C10.2001 2.00281 11.2729 2.52702 12.0058 3.35807C12.7369 2.52702 13.8097 2.00281 15.0049 2.00281ZM11.0049 10.0028H5.00488V19.0028H11.0049V10.0028ZM19.0049 10.0028H13.0049V19.0028H19.0049V10.0028ZM9.00488 4.00281C7.90031 4.00281 7.00488 4.89824 7.00488 6.00281C7.00488 7.05717 7.82076 7.92097 8.85562 7.99732L9.00488 8.00281H11.0049V6.00281C11.0049 5.00116 10.2686 4.1715 9.30766 4.02558L9.15415 4.00829L9.00488 4.00281ZM15.0049 4.00281C13.9505 4.00281 13.0867 4.81869 13.0104 5.85355L13.0049 6.00281V8.00281H15.0049C16.0592 8.00281 16.923 7.18693 16.9994 6.15207L17.0049 6.00281C17.0049 4.89824 16.1095 4.00281 15.0049 4.00281Z"></path></svg>',
    'class' => 'credit',
    'type' => 'gift_code',
    'amount' => $code->value,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'main_balance',

    ]),
    'data' => json_encode([
        'Gift code' => $code->code
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->main_balance,
        'after' => Auth::guard('users')->user()->main_balance + $code->value
    ],
    'primary_wallet' => 'Main Wallet',
    'gift_code' => json_encode($code),
    'gift_code_id' => $code->id

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);

    return response()->json([
        'message' => 'Gift code redeemed successfully',
        'status' => 'success',
        'url' => url('users/transaction/receipt?id=').DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('uniqid',$receipt_id)->first()->id

            ]);

       


    }

    // daily spin
    public function DailySpin(){
        $amount=request('amount');
        $amount=str_replace('₦','',$amount);
        if(is_numeric($amount)){
           DB::table('users')->where('id',Auth::guard('users')->user()->id)->increment('main_balance',$amount,[
            'last_spin' => Carbon::now()
           ]);
             DB::table('transactions')->insert([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Spin wheel',
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6 9C4.34315 9 3 10.3431 3 12C3 13.6569 4.34315 15 6 15C7.65685 15 9 13.6569 9 12C9 11.3629 8.8025 10.7748 8.46538 10.29C7.92183 9.50831 7.02019 9 6 9ZM1 12C1 9.23858 3.23858 7 6 7C7.21392 7 8.32661 7.43307 9.19203 8.1515C9.91366 7.44003 10.905 7 12 7C13.095 7 14.0863 7.44003 14.808 8.1515C15.6734 7.43307 16.7861 7 18 7C20.7614 7 23 9.23858 23 12C23 14.7614 20.7614 17 18 17C15.2386 17 13 14.7614 13 12C13 11.1835 13.1964 10.411 13.5445 9.72905C13.177 9.28296 12.6209 9 12 9C11.3791 9 10.823 9.28296 10.4555 9.72905C10.8036 10.411 11 11.1835 11 12C11 14.7614 8.76142 17 6 17C3.23858 17 1 14.7614 1 12ZM18 9C16.9798 9 16.0782 9.50831 15.5346 10.29C15.1975 10.7748 15 11.3629 15 12C15 13.6569 16.3431 15 18 15C19.6569 15 21 13.6569 21 12C21 10.3431 19.6569 9 18 9Z"></path></svg>',
    'class' => 'credit',
    'type' => 'daily_spin',
    'amount' => $amount,
    'fee' => 0,
    'wallet' => json_encode([
        'from' => 'admin',
        'to' => 'main_balance',

    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->main_balance,
        'after' => Auth::guard('users')->user()->main_balance + $amount
    ],
    'primary_wallet' => 'Main Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
        }
       
    }

    // purchase product
    public function PurchaseProduct(){
        $product=DB::table('products')->where('id',request('id'))->first();
        if(Auth::guard('users')->user()->deposit_balance < $product->price){
            return response()->json([
                'message' => 'Insufficient balance,kindly fund your account to purchase item',
                'status' => 'error' 
            ]);
        }
    $id=DB::transaction(function() use($product){
        DB::table('users')->where('id',Auth::guard('users')->user()->id)->decrement('deposit_balance',$product->price);
        $id= DB::table('transactions')->insertGetId([
    'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Purchased product in Marketplace',
    'class' => 'debit',
    'type' => 'marketplace',
    'amount' => $product->price,
    'fee' => 0,
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z"></path></svg>',
    'wallet' => json_encode([
        'from' => 'deposit_balance',
        'to' => 'admin',

    ]),
    'data' => json_encode([
        'Product' => $product->name,
        'Product Category' => $product->category,
        'Product Location' => $product->location.' State',
        'Delivery Address' => request('delivery_address'),
        'Delivery State' => request('delivery_state').' State'
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->deposit_balance,
        'after' => Auth::guard('users')->user()->deposit_balance + $product->price
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
    ]);
    DB::table('purchased_products')->insert([
        'uniqid' => GenerateID(),
        'user_id' => Auth::guard('users')->user()->id,
        'product' => json_encode($product),
        'delivery_address' => request('delivery_address'),
        'delivery_state' => request('delivery_state'),
        'status' => json_encode([
            'buyer' => 'not received',
            'seller' => 'not delivered'
        ]),
        'updated' => Carbon::now(),
        'date' => Carbon::now()
    ]);
    DB::table('products')->where('id',$product->id)->update([
        'status' => 'purchased'
        ]);
    return $id;
    });
    return response()->json([
        'message' => 'Item purchased successfully,awaiting delivery',
        'status' => 'success',
        'receipt' => url('users/transaction/receipt?id='.$id.'')
    ]);
    }

    // confirm delivery
    public function ConfirmDelivery(){
        DB::table('purchased_products')->where('id',request('id'))->update([
            'status->buyer' => 'received'
        ]);
        return response()->json([
            'message' => 'Item marked as received successfully',
            'status' => 'success'
        ]);
    }

    // purchase airtime
    public function PurchaseAirtime(){
        $number=request('number');
        $amount=request('amount');
        $settings=json_decode(DB::table('settings')->where('key','general_settings')->first()->value ?? '{}');
        $network=json_decode(request('network'));
        $network_id=$network->id;
        $network_name=$network->name;
        $request_id=GenerateID();
        $settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}');
        if($settings->vtu->portal == 'off'){
            return response()->json([
                'message' => 'VTU portal is currently off',
                'status' => 'error'
            ]);
        }
      if(Auth::guard('users')->user()->deposit_balance <  ($amount + ($settings->vtu_fee * $amount)/100)){
        return response()->json([
            'message' => 'Insufficient balance, kindly fund your account to continue',
            'status' => 'error'
        ]);
      }
      
     $response=Http::withToken(env('CLUBKONNECT_API_KEY'))->get('https://www.nellobytesystems.com/APIAirtimeV1.asp',[
        'UserID' => env('CLUBKONNECT_USER_ID'),
        'APIKey' => env('CLUBKONNECT_API_KEY'),
        'MobileNetwork' => $network_id,
        'Amount' => $amount,
        'MobileNumber' => $number,
        'RequestID' => $request_id,
        'CallBackURL' => url('clubkonnect/vtu/prrocess')
     ]);

      if($response->successful()){
        $amount=$amount + ($settings->vtu_fee * $amount)/100;
        $data=$response->json();
        $status=$data['status'];
        if($status == 'ORDER_RECEIVED'){
            $trx=DB::transaction(function() use($status,$amount,$number,$network_name,$settings){
                    DB::table('users')->where('id',Auth::guard('users')->user()->id)->decrement('deposit_balance',$amount);
                    $receipt_id=DB::table('transactions')->insertGetId([
                         'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Bought Airtime',
    'class' => 'debit',
    'type' => 'vtu',
    'amount' => $amount,
    'fee' => ($settings->vtu_fee * $amount)/100,
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M9.36556 10.6821C10.302 12.3288 11.6712 13.698 13.3179 14.6344L14.2024 13.3961C14.4965 12.9845 15.0516 12.8573 15.4956 13.0998C16.9024 13.8683 18.4571 14.3353 20.0789 14.4637C20.599 14.5049 21 14.9389 21 15.4606V19.9234C21 20.4361 20.6122 20.8657 20.1022 20.9181C19.5723 20.9726 19.0377 21 18.5 21C9.93959 21 3 14.0604 3 5.5C3 4.96227 3.02742 4.42771 3.08189 3.89776C3.1343 3.38775 3.56394 3 4.07665 3H8.53942C9.0611 3 9.49513 3.40104 9.5363 3.92109C9.66467 5.54288 10.1317 7.09764 10.9002 8.50444C11.1427 8.9484 11.0155 9.50354 10.6039 9.79757L9.36556 10.6821ZM6.84425 10.0252L8.7442 8.66809C8.20547 7.50514 7.83628 6.27183 7.64727 5H5.00907C5.00303 5.16632 5 5.333 5 5.5C5 12.9558 11.0442 19 18.5 19C18.667 19 18.8337 18.997 19 18.9909V16.3527C17.7282 16.1637 16.4949 15.7945 15.3319 15.2558L13.9748 17.1558C13.4258 16.9425 12.8956 16.6915 12.3874 16.4061L12.3293 16.373C10.3697 15.2587 8.74134 13.6303 7.627 11.6707L7.59394 11.6126C7.30849 11.1044 7.05754 10.5742 6.84425 10.0252Z"></path></svg>',
     'wallet' => json_encode([
        'from' => 'deposit_balance',
        'to' => 'admin',

    ]),
    'data' => json_encode([
        'Phone Number' => $number,
        'Mobile Network' => $network_name,
        
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->deposit_balance,
        'after' => Auth::guard('users')->user()->deposit_balance + $amount
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
                    ]);
                    return $receipt_id;
            });
             return response()->json([
                'message' => 'Airtime Topup successfull',
                'status' => 'success',
                'receipt' => url('users/transaction/receipt?id='.$trx.'')
             ]);
        }
       
        
      }
      return response()->json([
        'message' => 'Internal server error,please try again later',
        'status' => 'error'
      ]);
    }

     // purchase data
    public function PurchaseData(){
        $number=request('number');
        $amount=request('amount');
        $network=json_decode(request('network'));
        $network_id=$network->id;
        $network_name=$network->name;
        $request_id=GenerateID();
        $plan=request('plan');
        $settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}');
        if($settings->vtu->portal == 'off'){
            return response()->json([
                'message' => 'VTU portal is currently off',
                'status' => 'error'
            ]);
        }
      if(Auth::guard('users')->user()->deposit_balance < $amount){
        return response()->json([
            'message' => 'Insufficient balance, kindly fund your account to continue',
            'status' => 'error'
        ]);
      }
      
     $response=Http::withToken(env('CLUBKONNECT_API_KEY'))->get('https://www.nellobytesystems.com/APIDatabundleV1.asp',[
        'UserID' => env('CLUBKONNECT_USER_ID'),
        'APIKey' => env('CLUBKONNECT_API_KEY'),
        'MobileNetwork' => $network_id,
        'DataPlan' => $plan,
        'MobileNumber' => $number,
        'RequestID' => $request_id,
        'CallBackURL' => url('clubkonnect/vtu/prrocess')
     ]);

      if($response->successful()){
        $data=$response->json();
        $status=$data['status'];
        if($status == 'ORDER_RECEIVED'){
            $trx=DB::transaction(function() use($status,$amount,$number,$network_name){
                    DB::table('users')->where('id',Auth::guard('users')->user()->id)->decrement('deposit_balance',$amount);
                    $receipt_id=DB::table('transactions')->insertGetId([
                         'uniqid' => GenerateID(),
    'user_id' => Auth::guard('users')->user()->id,
    'title' => 'Bought Data Bundle',
    'class' => 'debit',
    'type' => 'vtu',
    'amount' => $amount,
    'fee' => 0,
    'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M0.689453 6.99659C3.78027 4.49704 7.71526 3 11.9999 3C16.2845 3 20.2195 4.49704 23.3104 6.99659L22.0536 8.55252C19.3062 6.3307 15.8085 5 11.9999 5C8.19133 5 4.69356 6.3307 1.94617 8.55252L0.689453 6.99659ZM3.83124 10.8864C6.0635 9.08119 8.90544 8 11.9999 8C15.0944 8 17.9363 9.08119 20.1686 10.8864L18.9118 12.4424C17.023 10.9149 14.6183 10 11.9999 10C9.38151 10 6.97679 10.9149 5.08796 12.4424L3.83124 10.8864ZM6.97304 14.7763C8.34673 13.6653 10.0956 13 11.9999 13C13.9042 13 15.6531 13.6653 17.0268 14.7763L15.7701 16.3322C14.7398 15.499 13.4281 15 11.9999 15C10.5717 15 9.26002 15.499 8.22975 16.3322L6.97304 14.7763ZM10.1148 18.6661C10.63 18.2495 11.2858 18 11.9999 18C12.714 18 13.3698 18.2495 13.885 18.6661L11.9999 21L10.1148 18.6661Z"></path></svg>',
    'wallet' => json_encode([
        'from' => 'deposit_balance',
        'to' => 'admin',

    ]),
    'data' => json_encode([
        'Phone Number' => $number,
        'Mobile Network' => $network_name,
        'Data Plan' => request('plan_name')
        
    ]),
     'json' => json_encode([
    'balance' => [
        'before' => Auth::guard('users')->user()->deposit_balance,
        'after' => Auth::guard('users')->user()->deposit_balance + $amount
    ],
    'primary_wallet' => 'Deposit Wallet'

    ]),
    'status' => 'success',
    'updated' => Carbon::now(),
    'date' => Carbon::now()
                    ]);
                    return $receipt_id;
            });
             return response()->json([
                'message' => 'Data Topup successfull',
                'status' => 'success',
                'receipt' => url('users/transaction/receipt?id='.$trx.'')
             ]);
        }
       
        
      }
      return response()->json([
        'message' => 'Internal server error,please try again later',
        'status' => 'error'
      ]);
    }

    // send code
    public function SendCode(){
         try{
            $user=DB::table('users')->where('email',request('email'));
            if(!$user->exists()){
                  return  response()->json([
                        'message' => 'User not found',
                        'status' => 'error'
                    ]);
            }
            $user=$user->first();

            if($user->status != 'active'){
                return response()->json([
                    'message' => 'Inactive user',
                    'status' => 'error'
                ]);
            }

            if(!DB::table('otps')->where('email',request('email'))->where('purpose','Forgot Password')->where('date','>=',Carbon::now()->subMinutes(30))->where('status','active')->exists()){
              $otp=rand(100000,999999);
        
     Mail::send('users.test',[
        'otp' => $otp,
        'name' => ucfirst(explode(' ',$user->name)[0])
     ],function($message) use($user){
    $message->to($user->email)->subject('Forgot Password Token');
  });
  DB::transaction(function() use($otp){
        DB::table('otps')->insert([
            'email' => request('email'),
            'otp' => $otp,
            'purpose' => 'Forgot Password',
            'status' => 'active',
            'updated' => Carbon::now(),
            'date' => Carbon::now()
        ]);
  });
            }

            
      
  
    return response()->json([
        'message' => 'OTP code sent successfully',
        'status' => 'success',
        'email' => request('email')
    ]);
    }catch(\Exception $e){
        return response()->json([
            'message' => 'Could not send OTP code, please try again later',
            'status' => 'info'
        ]);
    }
      
    }
    
    public function VerifyCode(){
        try{
            $code=request('code');
            if(strlen($code) != 6){
                return response()->json([
                    'message' => 'Please enter a valid 6-digit code',
                    'status' => 'error'
                ]);
            }

            $otp=DB::table('otps')->where('otp',$code)->where('email',request('email'));
            if(!$otp->exists()){
                return response()->json([
                    'message' => 'Invalid OTP code',
                    'status' => 'error'
                ]);
            }
                $otp=$otp->first();
            if($otp->status != 'active'){
                return response()->json([
                    'message' => 'Inactive OTP code',
                    'status' => 'error'
                ]);
            }

            return response()->json([
                'message' => 'OTP verified successfully',
                'status' => 'success',
                'email' => request('email'),
                'otp' => $code
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Internal server error, please try again'
            ]);
        }
    }

    // reset password
    public function ResetPassword(){
        try{
           
          if(!DB::table('otps')->where('otp',request('otp'))->where('email',request('email'))->where('status','active')->where('date','>',Carbon::now()->subMinutes(30))->exists()){
                    return response()->json([
                        'message' => 'Invalid session',
                        'status' => 'error'
                    ]);
          }
          if(!Hash::check(request('confirm'),Hash::make(request('password')))){
                        return response()->json([
                            'message' => 'New password and confirm password must match',
                            'status' => 'error'
                        ]);
          }
         DB::transaction(function(){
                    DB::table('users')->where('email',request('email'))->update([
                        'password' => Hash::make(request('password')),
                        'updated' =>Carbon::now()
                    ]);
                    DB::table('otps')->where('email',request('email'))->where('otp',request('otp'))->update([
                        'status' => 'used',
                        'updated' => Carbon::now()
                    ]);
         });

         return response()->json([
            'message' => 'Account password updated successfully',
            'status' => 'success'
         ]);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Internal server error, please try again later',
                'status' => 'error'
            ]);
        }
    }
}
