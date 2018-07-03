<?php 
use App\Http\Controllers\ini_controller;
use Illuminate\Support\Facades\DB;
use App\Maintab;
use App\Subtab;
use App\Subertab;
use App\Settings;

// I know the way out!
// We have to check current route rather than url.
$route = Route::current()->getName();
//$url=basename($_SERVER['REQUEST_URI']);//Note needed anymore

##CHECK IF IT EXISTS AT THE FIRST LEVEL
if(Subertab::select('sub_tab_id', 'suber_tab_name')->where('suber_tab_named_route',$route)->exists())
{
$query = Subertab::select('sub_tab_id', 'suber_tab_name')->where('suber_tab_named_route',$route)->get();
    foreach($query as $r)
    {
        $URL_THIRD_LEVEL_SUB_TAB_ID = $r -> sub_tab_id;
		$URL_THIRD_LEVEL_NAME = $r -> suber_tab_name;
    }

    //Since it exists at the third level, we can get the 2nd Level Name and ID
    if(Subtab::select('main_tab_id', 'sub_tab_name')->where('sub_tab_id',$URL_THIRD_LEVEL_SUB_TAB_ID)->exists())
    {
    $query = Subtab::select('main_tab_id', 'sub_tab_name')->where('sub_tab_id',$URL_THIRD_LEVEL_SUB_TAB_ID)->get();
        foreach($query as $r)
        {
            $URL_SECOND_LEVEL_MAIN_TAB_ID = $r -> main_tab_id;
            $URL_SECOND_LEVEL_NAME = $r -> sub_tab_name;
        }
    }

    //Now we can get the Main Tab Name
    if(Maintab::select('main_tab_name','main_tab_id')->where('main_tab_id',$URL_SECOND_LEVEL_MAIN_TAB_ID)->exists())
    {
    $query = Maintab::select('main_tab_id','main_tab_name')->where('main_tab_id',$URL_SECOND_LEVEL_MAIN_TAB_ID)->get();
        foreach($query as $r)
        {
            $URL_FIRST_LEVEL_NAME = $r -> main_tab_name;
            $URL_FIRST_LEVEL_ID = $r -> main_tab_id;
        }
    }


}
else //It doesn't exist,so check subtab i.e 2nd Level
{
        if(Subtab::select('main_tab_id', 'sub_tab_name')->where('sub_tab_named_route',$route)->exists())
        {
        $query = Subtab::select('main_tab_id', 'sub_tab_name')->where('sub_tab_named_route',$route)->get();
            foreach($query as $r)
            {
                $URL_SECOND_LEVEL_MAIN_TAB_ID = $r -> main_tab_id;
                $URL_SECOND_LEVEL_NAME = $r -> sub_tab_name;
            }

            //Now we can get the Main Tab Name

           if(Maintab::select('main_tab_name','main_tab_id')->where('main_tab_id',$URL_SECOND_LEVEL_MAIN_TAB_ID)->exists())
            {
            $query = Maintab::select('main_tab_id','main_tab_name')->where('main_tab_id',$URL_SECOND_LEVEL_MAIN_TAB_ID)->get();
                foreach($query as $r)
                {
                    $URL_FIRST_LEVEL_NAME = $r -> main_tab_name;
                    $URL_FIRST_LEVEL_ID = $r -> main_tab_id;
                }
            }
        }
}


$c_name=Settings::select('value')->where('name','company_name')->get(0);
$company_name=$c_name[0]->value;

$rights=Auth::user()->rights;
$subrights=Auth::user()->subrights;
$suberrights=Auth::user()->suberrights;

$staff_f=Auth::user()->staff->first_name;
$staff_l=Auth::user()->staff->last_name;
$staff_pic=Auth::user()->staff->pics;
//$staff_role_name_ini=Auth::user()->staff->role->role_name;

if($rights=="*")
{
		foreach(Maintab::all() as $m)
		{
			$main_tab_id[]=	$m->main_tab_id;
			$main_tab_name[]=$m->main_tab_name;
			$main_tab_icons[]=$m->icon;
		}

	
		foreach(Subtab::all() as $m)
		{
			$sub_tab_id[] =	$m->sub_tab_id;
			$main_sub_tab_id[]=$m->main_tab_id;
			$sub_tab_name[]=$m->sub_tab_name;
			$sub_tab_url[]=$m->sub_tab_url;
            $sub_tab_named_route[]=$m->sub_tab_named_route;
		}

		foreach(Subertab::all() as $m)
		{
			$suber_tab_id[] =	$m->suber_tab_id;
			$suber_tab_sub_id[]=$m->sub_tab_id;
			$suber_tab_name[]=$m->suber_tab_name;
			$suber_tab_url[]=$m->suber_tab_url;
			$suber_tab_named_route[]=$m->suber_tab_named_route;
		}

}
else
{
    foreach(Maintab::find(explode(",",$rights)) as $m)
    {
        $main_tab_id[]=	$m->main_tab_id;
        $main_tab_name[]=$m->main_tab_name;
        $main_tab_icons[]=$m->icon;
    }

    
    foreach(Subtab::find(explode(",",$subrights)) as $m)
    {
        $sub_tab_id[] =	$m->sub_tab_id;
        $main_sub_tab_id[]=$m->main_tab_id;
        $sub_tab_name[]=$m->sub_tab_name;
        $sub_tab_url[]=$m->sub_tab_url;
        $sub_tab_named_route[]=$m->sub_tab_named_route;
    }

    
    foreach(Subertab::find(explode(",",$suberrights)) as $m)
    {
        $suber_tab_id[] =	$m->suber_tab_id;
        $suber_tab_sub_id[]=$m->sub_tab_id;
        $suber_tab_name[]=$m->suber_tab_name;
        $suber_tab_url[]=$m->suber_tab_url;
		$suber_tab_named_route[]=$m->suber_tab_named_route;
    }
    
}

?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- End CSRF Token -->

    <title>Management System</title>
    <!-- start: GOOGLE FONTS -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <!-- end: GOOGLE FONTS -->

    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="{{asset('_vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/themify-icons/themify-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/perfect-scrollbar/perfect-scrollbar.min.css')}}" >
    <link rel="stylesheet" href="{{asset('_vendor/switchery/switchery.min.css')}}">
    <link rel="stylesheet" href="{{asset('_vendor/pace/pace.css')}}" >
    <link rel="stylesheet" href="{{asset('_vendor/sweetalert/sweet-alert.css')}}">
    <!-- end: MAIN CSS -->
	
	<!-- favicon-->
	<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon" />
	<!--/favicon -->

    <!-- start: CLIP-TWO CSS -->
    <link rel="stylesheet" href="{{asset('styles.css')}}">
    <link rel="stylesheet" href="{{asset('plugins.css')}}">
    <link rel="stylesheet" href="{{asset('themes/theme-1.css')}}" >
    <!-- end: CLIP-TWO CSS -->

    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    @yield('required_css')
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->

</head>
<body>
        <div id="app">



                <!-- sidebar -->
                <div class="sidebar app-aside" id="sidebar">
                    <div class="sidebar-container perfect-scrollbar">
                        <nav class="links cl-effect-16" style="padding: 0px !important; margin: 0 !important">
                            <!-- start: MAIN NAVIGATION MENU -->
                            <div class="navbar-title">
                                <span class="text-primary text-bold">Main Navigation</span>
                            </div>
                          @include('inc.lefty')
                            <!-- end: MAIN NAVIGATION MENU -->
                                                
                        </nav>
                    </div>
                </div>
                <!-- / sidebar -->
                <div class="app-content">
                    <!-- start: TOP NAVBAR -->
                    @include("inc.top")
                    <!-- end: TOP NAVBAR -->
                    <div class="main-content" >
                        <div class="wrap-content container" id="container">
                            @include('inc.basic_notys')
                            <!-- start: DASHBOARD TITLE -->
                            @include("inc.menu_name")				
                            <!-- end: DASHBOARD TITLE -->

                           
                            <div class="container-fluid container-fullw bg-white">
                                    @yield('content')
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- start: FOOTER -->
                <footer>
                    <div class="footer-inner">
                        <div class="pull-left">
                            &copy; <span class="current-year"></span><span class="text-bold text-uppercase"> <?php echo $company_name ?></span>. <span>All rights reserved</span>
                        </div>
                        <div class="pull-right">
                            <span class="go-top"><i class="ti-angle-up"></i></span>
                        </div>
                    </div>
                </footer>



                        
                    </div>

                <!-- end: SETTINGS -->

  


<!-- start: MAIN JAVASCRIPTS -->
<script src="{{asset('_vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('_vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('_vendor/modernizr/modernizr.js')}}"></script>)
<script src="{{asset('_vendor/jquery-cookie/jquery.cookie.js')}}"></script>
<script src="{{asset('_vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('_vendor/switchery/switchery.min.js')}}"></script>
<script src="{{asset('_vendor/pace/pace.min.js')}}"></script>
<script src="{{asset('_vendor/jquery.blockUI.js')}}"></script>
<script src="{{asset('_vendor/sweetalert/sweet-alert.min.js')}}"></script>
<!-- end: MAIN JAVASCRIPTS -->

<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
@yield('required_js')
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

@yield('additional_js')


</body>
</html>