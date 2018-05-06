<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Metrics | Admin</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="../../static/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../static/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="../../static/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="../../static/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../static/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css">
    <link rel="stylesheet" href="../../static/plugins/scrollbar/src/perfect-scrollbar.css">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="../../static/css/pages/profile.css">

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="../../static/css/themes/default.css" id="style_color">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="../../static/css/custom.css">
    
    <style>
	.morris-hover{position:absolute;z-index:1000}.morris-hover.morris-default-style{border-radius:10px;padding:6px;color:#666;background:rgba(255,255,255,0.8);border:solid 2px rgba(230,230,230,0.8);font-family:sans-serif;font-size:12px;text-align:center}.morris-hover.morris-default-style .morris-hover-row-label{font-weight:bold;margin:0.25em 0}
.morris-hover.morris-default-style .morris-hover-point{white-space:nowrap;margin:0.1em 0}

	</style>
    
</head>	

<body>


<div class="wrapper">
    <!--=== Header ===-->    
    <div class="header">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <!-- Topbar Navigation -->
                <ul class="loginbar pull-right">
                    <li>
                        <i class="fa fa-globe"></i>
                        <a>Panels</a>
                        <ul class="lenguages">
                            <li class="active">
                                <a href="unify_CB.html">Index <i class="fa fa-check"></i></a> 
                            </li>
                            <li><a href="index_customer.php">Customer</a></li>
                            <li><a href="index_vendor.php">Vendor</a></li>
                            <li><a href="index_admin.php">Admin</a></li>
                        </ul>
                    </li>
                    <li class="topbar-devider"></li>   
                    <li><a href="page_faq.html">Help</a></li>  
                    <li class="topbar-devider"></li>   
                    <li><a href="page_login.html">Login</a></li>   
                </ul>
                <!-- End Topbar Navigation -->
            </div>
        </div>
        <!-- End Topbar -->
    
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img id="logo-header" src="../../static/img/logo1-default.png" alt="Logo">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Home -->
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                                Home
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="index.html">Option 1: Default Page</a></li>
                            </ul>
                        </li>
                        <!-- End Home -->

                        <!-- Search Block -->
                        <li>
                            <i class="search fa fa-search search-btn"></i>
                            <div class="search-open">
                                <div class="input-group animated fadeInDown">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn-u" type="button">Go</button>
                                    </span>
                                </div>
                            </div>    
                        </li>
                        <!-- End Search Block -->
                    </ul>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header ===-->    

    <!--=== Profile ===-->
    <div class="profile container content">
    	<div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20" src="../../static/img/custom/NFprofile.jpg" alt="">

                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item active">
                        <a href="profile.html"><i class="fa fa-bar-chart-o"></i> Overall</a>
                    </li>

                    <li class="list-group-item list-toggle active">                   
                        <a class="accordion-toggle" href="#collapse-content-metrics" data-toggle="collapse"><i class="fa fa-cubes"></i>  Metrics 客服</a>
                        <ul id="collapse-content-metrics" class="collapse in">
                            <li>                           
                                <a href="admin_metrics.php"><i class="fa fa-cog"></i> Clicks/ Site Performance</a>
                            </li>
                            <li><a href="admin_metrics.php"><i class="fa fa-align-center"></i> Items 食品</a></li>
                            <li><a href="admin_metrics.php"><i class="fa fa-align-center"></i> Brands 品牌</a></li>
                            <li><a href="admin_metrics.php"><i class="fa fa-align-center"></i> Vendors 商業/場商</a></li>
                            <li><a href="admin_metrics.php"><i class="fa fa-align-center"></i> Members 會員</a></li>
                        </ul>
                    </li>                      

                    <li class="list-group-item list-toggle active">                   
                        <a class="accordion-toggle" href="#collapse-content-items" data-toggle="collapse"><i class="fa fa-cubes"></i> Item Mgmt 食品管理</a>
                        <ul id="collapse-content-items" class="collapse in">
                            <li>
                                <span class="badge badge-u">New</span>                            
                                <a href="admin_items.php"><i class="fa fa-cog"></i> Items 食品</a>
                            </li>
                            <li><a href="admin_items.php"><i class="fa fa-align-center"></i> Brands 品牌</a></li>
                            <li><a href="admin_items.php"><i class="fa fa-align-center"></i> Vendors 商業/場商</a></li>
                            <li><span class="badge badge-red">Later</span> <a href="admin_items.php"><i class="fa fa-align-center"></i> Vendor-Daily Budget</a></li>
                            <li><a href="admin_items.php"><i class="fa fa-align-center"></i> Members 會員</a></li>
                        </ul>
                    </li>                         
                    
                    <li class="list-group-item list-toggle active">                   
                        <a class="accordion-toggle" href="#collapse-content-cats" data-toggle="collapse"><i class="fa fa-cubes"></i>  Category Mgmt </a>
                        <ul id="collapse-content-cats" class="collapse in">
                            <li><a href="#"><i class="fa fa-cog"></i> MainPage </a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> SubCategories</a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> Items/ SearchTags</a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> Vendors SubCats 商業/場商</a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> Members 會員</a></li>
                        </ul>
                    </li>
                    
                    <li class="list-group-item list-toggle active">                   
                        <a class="accordion-toggle" href="#collapse-content-receive" data-toggle="collapse"><i class="fa fa-cubes"></i>  Accounts Receivables 快計收款</a>
                        <ul id="collapse-content-receive" class="collapse in">
                            <li><a href="admin_receive.php"><i class="fa fa-cog"></i> Due this Month </a></li>
                            <li><a href="admin_receive.php"><i class="fa fa-cog"></i> Receivables Calendar </a></li>
                            <li><a href="admin_receive.php"><i class="fa fa-align-center"></i> Receivables Entry</a></li>
                            <li><a href="admin_receive.php"><i class="fa fa-align-center"></i> Past Due/ Warn/ Schedule PickUp</a></li>
                            <li><a href="admin_receive.php"><i class="fa fa-align-center"></i> Invoice Re-Print/Email</a></li>
                            <li><a href="admin_receive.php"><i class="fa fa-align-center"></i> Vendors Acct Suspend 商業/場商</a></li>
                            <li><a href="admin_receive.php"><i class="fa fa-align-center"></i> Daily/Monthly Revenue Chart</a></li>
                        </ul>
                    </li>                        
                                     
                    <li class="list-group-item list-toggle active">                   
                        <a class="accordion-toggle" href="#collapse-content-pay" data-toggle="collapse"><i class="fa fa-cubes"></i>  Accounts Payables 快計收款</a>
                        <ul id="collapse-content-pay" class="collapse in">
                            <li><a href="admin_pay.php"><i class="fa fa-cog"></i> Payments Calendar </a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> Payment Entry (Sing/Recur)</a></li>
                            <li><span class="badge badge-red">Later</span>  <a href="#"><i class="fa fa-align-center"></i> Tax/ Insurance</a></li> 
                            <li><a href="admin_pay.php"><i class="fa fa-align-center"></i> Expense Entry</a></li>
                            <li><a href="admin_pay.php"><i class="fa fa-align-center"></i> Daily/Monthly Payables List</a></li>
                            <li><a href="admin_pay.php"><i class="fa fa-align-center"></i> Gross/ Net Profit Chart</a></li>
                            <li><a href="admin_pay.php"><i class="fa fa-align-center"></i> Outstanding Unscheduled</a></li>
                        </ul>
                    </li>  

                    <li class="list-group-item list-toggle active"><span class="badge badge-red">Later</span>            
                        <a class="accordion-toggle" href="#collapse-content-hr" data-toggle="collapse"><i class="fa fa-cubes"></i>  HR 人手管理</a>
                        <ul id="collapse-content-hr" class="collapse">
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-cog"></i> Vacation/Interview Calendar </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Vacation Request Entry </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> New Employee Entry </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Employee Lookbook </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Employee Leaving Form </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Interview Scheduling</a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> PT Scheduling TimeEntry</a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Employment Contracts/ Forms</a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> 1111, Yes123 Link</a></li>
                        </ul>
                    </li>  

                    <li class="list-group-item list-toggle active">                   
                        <a class="accordion-toggle" href="#collapse-content-mrkting" data-toggle="collapse"><i class="fa fa-cubes"></i> Marketing Documents 文件管理</a>
                        <ul id="collapse-content-mrkting" class="collapse in">
                            <li><a href="#"><i class="fa fa-cog"></i> New Vendor Intro Packet </a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> New Restaurant Sales Flier </a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> Monthly Restaurant Sales Flier </a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> Business Card Design </a></li>
                        </ul>
                    </li> 

                    <li class="list-group-item list-toggle active">                   
                        <a class="accordion-toggle" href="#collapse-content-invest" data-toggle="collapse"><i class="fa fa-cubes"></i>  Investors</a>
                        <ul id="collapse-content-invest" class="collapse in">
                            <li><a href="#"><i class="fa fa-align-center"></i> Financial Forecasts</a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> Business Plan </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Monthly Analysis .doc</a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Internal Goals & Discuss</a></li>
                        </ul>
                    </li>                     
                    
                    <li class="list-group-item list-toggle active"> <span class="badge badge-red">Later</span>               
                        <a class="accordion-toggle" href="#collapse-content-ads" data-toggle="collapse"><i class="fa fa-cubes"></i>  Advertising </a>
                        <ul id="collapse-content-ads" class="collapse">
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Marketing Calendar </a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> Google Adwords/ Adsense</a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Facebook Ads </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Partnership Ads </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> MailChimp NewsLetter(?) </a></li>
                            <li><span class="badge badge-red">Later</span><a href="#"><i class="fa fa-align-center"></i> Ad Cost/ InFlow Analysis </a></li>
                            <li><a href="#"><i class="fa fa-align-center"></i> PriceTicker Alerts </a></li>
                        </ul>
                    </li>                                                                
                </ul>   

                <!--Datepicker-->
                <form action="" id="sky-form2" class="sky-form">
                    <div id="inline-start"></div>
                </form> 
                <!--End Datepicker-->
            </div>
            <!--End Left Sidebar-->
            
            <div class="col-md-9">
                <!--Profile Body-->
                <div class="profile-body">
                    <!--Service Block v3-->
                    <div class="row margin-bottom-10">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="service-block-v3 servive-block-u">
                                <i class="icon-users"></i>
                                <span class="service-heading">Charged Clicks This Week</span>
                                <span class="counter">5,147</span>
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>Last Week</small>
                                        <h4 class="counter">1,385</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>Last Month</small>
                                        <h4 class="counter">6,048</h4>
                                    </div>
                                </div>
                                <div class="statistics">
                                <h3 class="heading-xs">Conversions <span class="pull-right">67%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 67%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="67" role="progressbar" class="progress-bar progress-bar-light">
                                        </div>
                                    </div>
                                    <small>11% less <strong>than last month</strong></small>
                                </div>            
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="service-block-v3 servive-block-blue">
                                <i class="icon-screen-desktop"></i>
                                <span class="service-heading">Visitors This Week</span>
                                <span class="counter">1,056</span>
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>Pending CC</small>
                                        <h4 class="counter">26,904</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>Pending DD</small>
                                        <h4 class="counter">124,766</h4>
                                    </div>
                                </div>
                                <div class="statistics">
                                <h3 class="heading-xs">Profitability <span class="pull-right">55%</span></h3>
                                    <div class="progress progress-u progress-xxs">
                                        <div style="width: 55%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="55" role="progressbar" class="progress-bar progress-bar-light">
                                        </div>
                                    </div>
                                    <small>15% higher <strong>than last month</strong></small>
                                </div>            
                            </div>
                        </div>
                    </div><!--/end row-->
                    <!--End Service Block v3-->

                    <hr>
                    
                    <div class="row margin-bottom-0">
                        <!--Recent Clicks-->
                        <div class="col-sm-6">
                            <div class="panel panel-profile no-bg">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-list-ul"></i>Recent Clicks</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                <div class="table-responsive">
                            <table class="table table-hover" style="font-family:Meiryo; font-size:14px;">
                                <thead>
                                    <tr>
                                        <th width="10%">Type</th>
                                        <th class="hidden-sm" width="16%">Item </th>
                                        <th width="35%"><span>IP</span></th>
                                        <th width="30%">Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">Anon</a>
                                        </td>
                                        <td > 萵苣菜 </td>
                                        <td>
                                         <a href="#"><i class="color-green fa fa-map-marker"></i> TWN </a>
                                         127.0.0.1
                                        </td>
                                        <td>
                                            Dec 12 9:49
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            <a href="#">Anon</a>
                                        </td>
                                        <td > 萵苣菜 </td>
                                        <td>
                                         <a href="#"><i class="color-green fa fa-map-marker"></i> TWN </a>
                                         127.0.0.1
                                        </td>
                                        <td>
                                            Dec 12 9:49
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Anon</a>
                                        </td>
                                        <td > 萵苣菜 </td>
                                        <td>
                                         <a href="#"><i class="color-green fa fa-map-marker"></i> TWN </a>
                                         127.0.0.1
                                        </td>
                                        <td>
                                            Dec 12 9:49
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Anon</a>
                                        </td>
                                        <td > 萵苣菜 </td>
                                        <td>
                                         <a href="#"><i class="color-green fa fa-map-marker"></i> TWN </a>
                                         127.0.0.1
                                        </td>
                                        <td>
                                            Dec 12 9:49
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Anon</a>
                                        </td>
                                        <td > 萵苣菜 </td>
                                        <td>
                                         <a href="#"><i class="color-green fa fa-map-marker"></i> TWN </a>
                                         127.0.0.1
                                        </td>
                                        <td>
                                            Dec 12 9:49
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Anon</a>
                                        </td>
                                        <td > 萵苣菜 </td>
                                        <td>
                                         <a href="#"><i class="color-green fa fa-map-marker"></i> TWN </a>
                                         127.0.0.1
                                        </td>
                                        <td>
                                            Dec 12 9:49
                                        </td>
                                    </tr>
                                    <tr><td colspan="6">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>   
                            </div>        
                        </div>
                        <!--End Recent Clicks-->

                        <!--Top Performing Items-->
                        <div class="col-sm-6 md-margin-bottom-20">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-usd"></i>Top Performing Items</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;" width="25%">Item</th>
                                        <th class="hidden-sm" width="35%">Vendor </th>
                                        <th width="10%">週</th>
                                        <th width="10%">月</th>
                                        <th width="10%">共</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">87</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">218</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">14</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">81</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">207</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">8</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">76</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">198</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">73</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">176</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">4</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">85</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">167</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">10</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">72</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">154</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr><td colspan="6">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>   
                <!--End Notification-->
                            </div>
                        <!--End Top Performing Items-->
                    </div><!--/end row-->

                    <div class="row margin-bottom-0">
                        <!--Top Performing L2Cat-->
                        <div class="col-sm-6 md-margin-bottom-20">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-usd"></i>Top Performing L2Cat</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;" width="25%">Item</th>
                                        <th class="hidden-sm" width="35%">Categories </th>
                                        <th width="10%">週</th>
                                        <th width="10%">月</th>
                                        <th width="10%">共</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">87</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">218</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">14</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">81</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">207</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">8</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">76</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">198</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">73</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">176</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">4</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">85</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">167</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">10</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">72</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">154</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr><td colspan="6">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>   
                <!--End Notification-->
                            </div>
                        <!--End Top Performing L2Cat-->

                        <!--Top Performing SearchTags-->
                        <div class="col-sm-6 md-margin-bottom-20">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-usd"></i>Top Performing SearchTags(L3)</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;" width="25%">Item</th>
                                        <th class="hidden-sm" width="35%">Categories </th>
                                        <th width="10%">週</th>
                                        <th width="10%">月</th>
                                        <th width="10%">共</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">87</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">218</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">14</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">81</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">207</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">8</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">76</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">198</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">73</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">176</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">4</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">85</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">167</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">10</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">72</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">154</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr><td colspan="6">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>   
                <!--End Notification-->
                            </div>
                        <!--End Top Performing SearchTags-->
                    </div><!--/end row-->

                    <div class="row margin-bottom-0">
                        <!--Top Performing Vendors-->
                        <div class="col-sm-6 md-margin-bottom-20">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-usd"></i>Top Performing Vendors</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;" width="25%">Item</th>
                                        <th class="hidden-sm" width="35%">Categories </th>
                                        <th width="10%">週</th>
                                        <th width="10%">月</th>
                                        <th width="10%">共</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">87</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">218</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">14</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">81</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">207</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">8</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">76</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">198</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">73</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">176</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">4</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">85</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">167</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">10</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">72</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">154</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr><td colspan="6">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>   
                <!--End Notification-->
                            </div>
                        <!--End Top Performing Vendors-->

                        <!--Top Performing Brands-->
                        <div class="col-sm-6 md-margin-bottom-20">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-usd"></i>Top Performing Brands</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;" width="25%">Item</th>
                                        <th class="hidden-sm" width="35%">Categories </th>
                                        <th width="10%">週</th>
                                        <th width="10%">月</th>
                                        <th width="10%">共</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">87</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">218</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">14</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">81</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">207</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">8</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">76</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">198</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">15</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">73</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">176</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">4</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">85</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">167</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 蔬菜類 > 葉菜類 </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">10</a>
                                        </td>
                                        <td>
                                         <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">72</a>
                                        </td>
                                        <td><a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">154</a></td>
                                        <td>&nbsp;
                           
                                        </td>
                                    </tr>
                                    <tr><td colspan="6">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>   
                <!--End Notification-->
                            </div>
                        <!--End Top Performing Brands-->
                    </div><!--/end row-->                                        
                    
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
    	<h3>7 Day Site Performance</h3>  
    </div>
  </div><!--/row-->
  <div class="row">
    <div class="col-md-12">
        <div id="area-example" style="height: 300px;"></div>
    </div>
    
    <h3>Total Visitors</h3>  
    <div class="col-md-12">
        <div id="line-example" style="height: 300px;"></div>
    </div>
    <div class="col-md-6">
    <h3>Visitors Devices</h3> 
        <div id="donut-example" style="height: 250px;"></div>
    </div>
    <div class="col-md-6">
    <h3>Returning vs New Visitors </h3>     
        <div id="bar-example" style="height: 250px;"></div>
    </div>
  </div>
</div>                    
                    


                </div>
                <!--End Profile Body-->
            </div>
        </div><!--/end row-->
    </div><!--/container-->    
    <!--=== End Profile ===-->

    <!--=== Copyright ===-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">                     
                    <p>
                        2014 &copy; Unify. ALL Rights Reserved. 
                        <a target="_blank" href="https://twitter.com/htmlstream">Htmlstream</a> | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                    </p>
                </div>
                <div class="col-md-6">  
                    <a href="index.html">
                        <img class="pull-right" id="logo-footer" src="../../static/img/logo2-default.png" alt="">
                    </a>
                </div>
            </div>
        </div> 
    </div><!--/copyright--> 
    <!--=== End Copyright ===-->
</div><!--/wrapper-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="../../static/plugins/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../../static/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../../static/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="../../static/plugins/back-to-top.js"></script>
<script type="text/javascript" src="../../static/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="../../static/plugins/counter/jquery.counterup.min.js"></script> 
<!-- Datepicker Form -->
<script src="../../static/plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js"></script>
<!-- Scrollbar -->
<script src="../../static/plugins/scrollbar/src/jquery.mousewheel.js"></script>
<script src="../../static/plugins/scrollbar/src/perfect-scrollbar.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="../../static/js/app.js"></script>
<script type="text/javascript" src="../../static/js/plugins/datepicker.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function() {
        App.init();
        App.initCounter();
        Datepicker.initDatepicker();
    });
</script>
<script>
    jQuery(document).ready(function ($) {
        "use strict";
        $('.contentHolder').perfectScrollbar();
    });
</script>

<script type="text/javascript">
$.getScript('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',function(){
$.getScript('http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js',function(){

  Morris.Area({
    element: 'area-example',
    data: [
      { y: '2010', a: 100, b: 90 },
      { y: '2011', a: 75,  b: 65 },
      { y: '2012', a: 50,  b: 40 },
      { y: '2013', a: 75,  b: 65 },
      { y: '2014', a: 50,  b: 40 },
      { y: '2015', a: 75,  b: 65 },
      { y: '2016', a: 100, b: 90 }
    ],
    xkey: 'y',
    ykeys: ['a', 'b'],
    labels: ['2016', '2015']
  });
  
  Morris.Line({
        element: 'line-example',
        data: [
          {year: '2012', value: 230},
          {year: '2013', value: 250},
          {year: '2014', value: 320},
          {year: '2015', value: 450},
          {year: '2016', value: 650}
        ],
        xkey: 'year',
        ykeys: ['value'],
        labels: ['Value']
      });
      
      Morris.Donut({
        element: 'donut-example',
        data: [
         {label: "Mobile/Tab", value: 15},
         {label: "Desktop", value: 50},
         {label: "Notebook", value: 35}
        ]
      });
      
      Morris.Bar({
         element: 'bar-example',
         data: [
            {y: 'Jan 2014', a: 100, b: 90},
            {y: 'Feb 2014', a: 75,  b: 65},
            {y: 'Mar 2014', a: 50,  b: 40},
            {y: 'Apr 2014', a: 75,  b: 65},
            {y: 'May 2014', a: 50,  b: 40},
            {y: 'Jun 2014', a: 75,  b: 65}
         ],
         xkey: 'y',
         ykeys: ['a', 'b'],
         labels: ['Visitors', 'Conversions']
      });
  
});
});
</script>
<!--[if lt IE 9]>
    <script src="../../static/plugins/respond.js"></script>
    <script src="../../static/plugins/html5shiv.js"></script>
<![endif]-->

</body>
</html>	
