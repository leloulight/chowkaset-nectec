<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Carbon;
use Redirect;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Profiles;
use Response;

class Profile extends Controller
{
     public function ProfileUser($userid){
       $statusCode = 200;
       $userProfile = DB::table('users')
       ->leftjoin('profiles','profiles.user_id','=','users.id')
       ->leftjoin('prefixs','prefixs.prefix_id','=','profiles.prefix')
       ->leftjoin('typeusers','users.typeuser_id','=','typeusers.tu_id')
       ->leftjoin('province','profiles.user_province_code','=','province.PROVINCE_ID')
       ->leftjoin('amphur','profiles.user_aumphur_code','=','amphur.AMPHUR_ID')
       ->leftjoin('district','profiles.user_district_code','=','district.DISTRICT_ID')
       ->leftjoin('farmercommunities','farmercommunities.fmcm_id','=','profiles.fmcm_id')
       ->select('prefixs.prefix_name', 'users.id', 'profiles.fname', 'profiles.lname',
        'profiles.address', 'typeusers.tu_name','profiles.card_id','users.member_id'
        ,'farmercommunities.fmcm_name','profiles.pf_id')
       ->where('users.id','=',$userid)->get();
       $phone = DB::table('contacts')->where('tyct_type','=','1')->where('pf_id','=',$userProfile[0]->pf_id)->get();
       $email = DB::table('contacts')->where('tyct_type','=','2')->where('pf_id','=',$userProfile[0]->pf_id)->get();
       if($userProfile){
               $response = [
                 'status'  => '1',
                 'data' => $userProfile,
                 'phone'=> $phone,
                 'email'=> $email
               ];
           }else{
               $response = [
                 'status'  => '0',
                 'message' => 'No Data!'
               ];
           }
       return Response::json($response, $statusCode);
     }
     public function getCreateProfile(){
        $user_id = Auth::user()->id;
        $profile = Profiles::where('user_id','=',$user_id)->first();
        if(!$profile){
            return view('auth.create_profile');
        }else{
            return Redirect::to('/auth/changeprofile');
        }
     }
     public function postCreateProfile(Request $request){
       if($request->input('optcommu')==0){
         $community_edit = '';
       }else{
         $community_edit = $request->input('farmercomunity');
       }
        $newprofile = new Profiles;
        $newprofile->user_id = Auth::user()->id;
        $newprofile->prefix = $request->input('prefix_id');
        $newprofile->fname = $request->input('fname');
        $newprofile->lname = $request->input('lname');
        $newprofile->card_id = $request->input('card_id');
        $newprofile->fmcm_id = $community_edit;
        $newprofile->user_province_code = $request->input('province');
        $newprofile->user_aumphur_code = $request->input('aumphur');
        $newprofile->user_district_code = $request->input('district');
        $newprofile->address = $request->input('address');
        $newprofile->birthday = '0000-00-00';
        $newprofile->save();
        DB::table('contacts')->insert(
            ['ct_detail' =>  $request->input('phone'), 'tyct_type' => '1','pf_id'=>$newprofile->pf_id]
        );
        DB::table('contacts')->insert(
            ['ct_detail' =>  $request->input('email'), 'tyct_type' => '2','pf_id'=>$newprofile->pf_id]
        );
        DB::table('contacts')->insert(
            ['ct_detail' =>  $request->input('facebook'), 'tyct_type' => '3','pf_id'=>$newprofile->pf_id]
        );

        return Redirect::to('/home');
     }
     public function officerPostCreateProfile(Request $request){
       //สร้าง username password
       $userid = rand();
       $usernameRS = substr($userid,0,6);
       $passwordRS = str_random(6);
       $password = Hash::make($passwordRS);
       $userCheck = DB::table('users')->where('member_id','=','FM'.$usernameRS)->get();
       if($userCheck){
         $userid = rand();
         $usernameRS = substr($userid,0,6);
         $RegisterData = User::create([
             'member_id' => 'FM'.$usernameRS,
             'password' => $password,
             'typemember_id' => '1',
             'typeuser_id' => $request->input('typeuser_profile'),
             'name' => $request->input('fname')+' '+$request->input('lname'),
             'email' => $passwordRS,
             'picture' => 'assets/img/user.jpg',
         ]);
       }else{
         $RegisterData = User::create([
             'member_id' => 'FM'.$usernameRS,
             'password' => $password,
             'typemember_id' => '1',
             'typeuser_id' => $request->input('typeuser_profile'),
             'name' => $request->input('fname').' '.$request->input('lname'),
             'email' => $passwordRS,
             'picture' => 'assets/img/user.jpg',
         ]);
       }
       if($request->input('optcommu')==0){
         $community_edit = '';
       }else{
         $community_edit = $request->input('farmercomunity');
       }
        $newprofile = new Profiles;
        $newprofile->user_id = $RegisterData->id;
        $newprofile->prefix = $request->input('prefix_id');
        $newprofile->fname = $request->input('fname');
        $newprofile->lname = $request->input('lname');
        $newprofile->card_id = $request->input('card_id');
        $newprofile->fmcm_id = $community_edit;
        $newprofile->user_province_code = $request->input('province');
        $newprofile->user_aumphur_code = $request->input('aumphur');
        $newprofile->user_district_code = $request->input('district');
        $newprofile->address = $request->input('address');
        $newprofile->birthday = '0000-00-00';
        $newprofile->save();
        DB::table('contacts')->insert(
            ['ct_detail' =>  $request->input('phone'), 'tyct_type' => '1','pf_id'=>$newprofile->pf_id]
        );
        DB::table('contacts')->insert(
            ['ct_detail' =>  $request->input('email'), 'tyct_type' => '2','pf_id'=>$newprofile->pf_id]
        );
        DB::table('contacts')->insert(
            ['ct_detail' =>  $request->input('facebook'), 'tyct_type' => '3','pf_id'=>$newprofile->pf_id]
        );
        return Redirect::to('/officer');
     }

    public function getChangeprofile(){
    	try {
    		$IdUser = Auth::user()->id;
    		$userProfile = User::find($IdUser);
            $profile = DB::table('profiles')->where('user_id','=',$userProfile->id)->get();
            $phone = DB::table('contacts')->where('tyct_type','=','1')->where('pf_id','=',$profile[0]->pf_id)->get();
            $email = DB::table('contacts')->where('tyct_type','=','2')->where('pf_id','=',$profile[0]->pf_id)->get();
            $facebook = DB::table('contacts')->where('tyct_type','=','3')->where('pf_id','=',$profile[0]->pf_id)->get();
    		return view('auth.profile',compact('profile','phone','email','facebook'));
    	} catch (Exception $e) {
    		return Redirect::to('/home');
    	}
    }
    public function postChangeprofile(Request $request){
      if($request->input('optcommu')==0){
        $community_edit = '';
      }else{
        $community_edit = $request->input('farmercomunity');
      }
    	   $profile = DB::table('profiles')->where('pf_id', $request->input('form_id'))
            ->update(['fname' => $request->input('fname'),'lname' => $request->input('lname'),
            'address' => $request->input('address'),'card_id' => $request->input('card_id'),
            'user_province_code' => $request->input('province'),
            'user_aumphur_code' => $request->input('aumphur'),
            'user_district_code' => $request->input('district'),
            'fmcm_id'=>$community_edit,
            'updated_at'=> Carbon\Carbon::now()
            ]);

           $phone = DB::table('contacts')->where('ct_id',$request->input('phone_id'))->update([
                'ct_detail'=>$request->input('phone')
            ]);
           $email = DB::table('contacts')->where('ct_id',$request->input('email_id'))->update([
                'ct_detail'=>$request->input('email')
            ]);
            $facebook = DB::table('contacts')->where('ct_id',$request->input('facebook_id'))->update([
                'ct_detail'=>$request->input('facebook')
            ]);
        return Redirect::to('/home');
    }
}
