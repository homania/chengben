<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>CB_Admin</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css">
    <link rel="stylesheet" href="assets/plugins/scrollbar/src/perfect-scrollbar.css">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="assets/css/pages/profile.css">

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="assets/css/themes/default.css" id="style_color">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="assets/css/custom.css">
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
                        <img id="logo-header" src="assets/img/logo1-default.png" alt="Logo">
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
                <img class="img-responsive profile-img margin-bottom-20" src="assets/img/custom/NFprofile.jpg" alt="">

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
                                <span class="service-heading">Clicks This Week</span>
                                <span class="counter">1,147</span>
                                
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
                                <span class="service-heading">REMAINING BUDGET</span>
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
                        </div>
                        <!--End Top Performing Items-->
                    </div><!--/end row-->
                    

                    <hr>
                    <!--Table Search v1-->
                    <div class="table-search-v1 margin-bottom-20">
                    
                        <div class="table-responsive">
                         <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                  <li><a data-toggle="tab" href="#profile"> New Items <i class="fa fa-list-ul"></i></a></li>
                   <li class="active"><a data-toggle="tab" href="#passwordTab">Price Ticker <i class="fa fa-arrow-down"></i><i class="fa fa-arrow-up"></i></a></li>
                   <li><a data-toggle="tab" href="#clicks">Top Performing <i class="fa fa-usd"></i></a></li>
                            </ul>
                   		</div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    	<th>Name</th>
                                        <th style="white-space:nowrap;" width="15%">Item</th>
                                        <th class="hidden-sm" width="5%">Old Price </th>
                                        <th width="5%">New Price</th>
                                        <th width="5%">Your Price</th>
                                        <th width="100">Type</th>
                                        <th width="50%"> Space</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">EverGREEN</a>
                                        </td>
                                        <td > 萵苣菜 </td>
                                        <td>
                                         91NT
                                        </td>
                                        <td>
                                         89NT
                                        </td>
                                        <td>90NT</td>
                                        <td>
											Permanent
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            <a href="#">EverGREEN</a>
                                        </td>
                                        <td > 萵苣菜 </td>
                                        <td>
                                         91NT
                                        </td>
                                        <td>
                                         89NT
                                        </td>
                                        <td>90NT</td>
                                        <td>
											Promotion
                                        </td>
                                    </tr>
                                    <tr><td colspan="6">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!--End Table Search v1-->

                    <hr>                                        



                    <!--Table Search v1-->
                    <div class="table-search-v1 margin-bottom-20">
                    
                        <div class="table-responsive">
                         <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#profile">Items Dashboard</a></li>
                                <li><a data-toggle="tab" href="#passwordTab">Add Item</a></li>
                            </ul>
                   		</div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;" width="15%">Name</th>
                                        <th class="hidden-sm" width="20%">Category Path</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th width="100">Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-u-red btn-block btn-u-xs"><i class="fa fa-sort-amount-desc margin-right-5"></i> Pending</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-ban"></i> 停用 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-dark btn-u-xs"><i class="icon-graph margin-right-5"></i> High</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-ban"></i> 停用 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-aqua btn-u-xs"><i class="fa fa-level-down margin-right-5"></i> Low</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-ban"></i> 停用 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-yellow btn-u-xs"><i class="fa fa-arrows-v margin-right-5"></i> Middle</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-ban"></i> 停用 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-green btn-u-xs"><i class="fa fa-level-up margin-right-5"></i> High</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-ban"></i> 停用 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-blue btn-u-xs"><i class="icon-graph margin-right-5"></i> Stabile</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-ban"></i> 停用 </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr><td colspan="6">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                                    </td></tr>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!--End Table Search v1-->

                    <hr>
                    <!--Profile Blog-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>New Customers (link)</h2>
                            <a href="profile_users.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="profile-blog blog-border">
                                        <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                                        <div class="name-location">
                                            <strong>Mikel Andrews</strong>
                                            <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                        </div>
                                        <div class="clearfix margin-bottom-20"></div>    
                                        <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                        <hr>
                                        <ul class="list-inline share-list">
                                            <li><i class="fa fa-bell"></i><a href="#">12 Notifications</a></li>
                                            <li><i class="fa fa-group"></i><a href="#">54 Followers</a></li>
                                            <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                        </ul>
                                    </div>
                                </div>        

                                <div class="col-sm-6">
                                    <div class="profile-blog blog-border">
                                        <img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
                                        <div class="name-location">
                                            <strong>Natasha Kolnikova</strong>
                                            <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                        </div>
                                        <div class="clearfix margin-bottom-20"></div>    
                                        <p>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</p>
                                        <hr>
                                        <ul class="list-inline share-list">
                                            <li><i class="fa fa-bell"></i><a href="#">37 Notifications</a></li>
                                            <li><i class="fa fa-group"></i><a href="#">46 Followers</a></li>
                                            <li><i class="fa fa-twitter"></i><a href="#">Retweet</a></li>
                                        </ul>
                                    </div> 
                                </div>    
                            </div>
                        </div>        
                    </div><!--/end row-->   
                    <!--End Profile Blog-->

                    <hr>                    

                    <div class="row">
                        <!--Alert-->
                        <div class="col-sm-7 sm-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-send"></i> Alarm Notification</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                <div id="scrollbar3" class="panel-body contentHolder">
                                    <div class="alert-blocks alert-blocks-pending alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong class="color-yellow">Pending... <small class="pull-right"><em>Just now</em></small></strong> 
                                            <p>Your friend request has been sent.</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-blocks-success alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong class="color-green">Accepted. <small class="pull-right"><em>7 hours ago</em></small></strong> 
                                            <p>Your friend request has been accepted.</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-blocks-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <i class="icon-custom rounded-x icon-bg-blue fa fa-bolt"></i>
                                        <div class="overflow-h">
                                            <strong class="color-blue">Info <small class="pull-right"><em>2 days ago</em></small></strong> 
                                            <p>Your friend request has been denied :)</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-blocks-error alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <img class="rounded-x" src="assets/img/testimonials/img6.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong class="color-red">Denied! <small class="pull-right"><em>2 days ago</em></small></strong> 
                                            <p>Your friend request has been denied.</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <i class="icon-custom rounded-x icon-bg-dark fa fa-magic"></i>
                                        <div class="overflow-h">
                                            <strong class="color-dark">Default <small class="pull-right"><em>Just now</em></small></strong> 
                                            <p><strong>Adam Johnson's</strong> friend request pending..</p>
                                        </div>    
                                    </div>
                                    <div class="alert-blocks alert-blocks-pending alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        <i class="icon-custom rounded-x icon-bg-yellow fa fa-info"></i>
                                        <div class="overflow-h">
                                            <strong class="color-yellow">Pending <small class="pull-right"><em>Just now</em></small></strong> 
                                            <p><strong>Adam Johnson's</strong> friend request pending..</p>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End Alert-->
                        
                        <div class="col-sm-5">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments-o"></i> Discussions</h2>
                                    <a href="profile_comments.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
                                </div>
                                <div id="scrollbar4" class="panel-body contentHolder">
                                    <div class="comment">
                                        <img src="assets/img/testimonials/img6.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong>Taylor Lee<small class="pull-right"> 25m</small></strong> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <ul class="list-inline comment-list">
                                                <li><i class="fa fa-heart"></i> <a href="#">23</a></li>
                                                <li><i class="fa fa-comments"></i> <a href="#">5</a></li>
                                            </ul>
                                        </div>    
                                    </div>
                                    <div class="comment">
                                        <img src="assets/img/testimonials/img2.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong>Miranda Clarsson<small class="pull-right"> 44m</small></strong> 
                                            <p>Donec cursus, orci non posuere luctus, risus massa luctus nisi, sit amet cursus leo massa id arcu. Nunc tincidunt magna sit amet sapien congue.</p>
                                            <ul class="list-inline comment-list">
                                                <li><i class="fa fa-heart"></i> <a href="#">23</a></li>
                                                <li><i class="fa fa-comments"></i> <a href="#">5</a></li>
                                            </ul>
                                        </div>    
                                    </div>
                                    <div class="comment">
                                        <img src="assets/img/testimonials/img4.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong>Natasha Kolnikova<small class="pull-right"> 7h</small></strong> 
                                            <p>Suspendisse est est, sollicitudin eget auctor et, pharetra eu sapien. Mauris mollis libero ac auctor iaculis.</p>
                                            <ul class="list-inline comment-list">
                                                <li><i class="fa fa-heart"></i> <a href="#">23</a></li>
                                                <li><i class="fa fa-comments"></i> <a href="#">5</a></li>
                                            </ul>
                                        </div>    
                                    </div>
                                    <div class="comment">
                                        <img src="assets/img/testimonials/img1.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong>Mikel Andrews<small class="pull-right"> 15h</small></strong> 
                                            <p>Nam ut dolor cursus nibh aliquet bibendum in eget risus.</p>
                                            <ul class="list-inline comment-list">
                                                <li><i class="fa fa-heart"></i> <a href="#">20</a></li>
                                                <li><i class="fa fa-comments"></i> <a href="#">5</a></li>
                                            </ul>
                                        </div>    
                                    </div>
                                    <div class="comment">
                                        <img src="assets/img/testimonials/img7.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong>Edward Rooster<small class="pull-right"> 1d</small></strong> 
                                            <p>Nam ut dolor cursus nibh aliquet bibendum in eget risus. Mauris mollis libero ac auctor iaculis.</p>
                                            <ul class="list-inline comment-list">
                                                <li><i class="fa fa-heart"></i> <a href="#">23</a></li>
                                                <li><i class="fa fa-comments"></i> <a href="#">5</a></li>
                                            </ul>
                                        </div>    
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div><!--/end row-->        

                    <hr>

                    <!--Table Search v2-->
                    <div class="table-search-v2 margin-bottom-20">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>User Image</th>
                                        <th class="hidden-sm">About</th>
                                        <th>Status</th>
                                        <th>Contacts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                                        </td>
                                        <td class="td-width">
                                            <h3><a href="#">Sed nec elit arcu</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <small class="hex">Joined February 28, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-success">Success</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#">info@example.com</a></span>
                                            <span><a href="#">www.htmlstream.com</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
                                        </td>
                                        <td>
                                            <h3><a href="#">Donec at aliquam est, a mattis mauris</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <small class="hex">Joined March 2, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-info"> Pending</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#">info@example.com</a></span>
                                            <span><a href="#">www.htmlstream.com</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img3.jpg" alt="">
                                        </td>
                                        <td>
                                            <h3><a href="#">Pellentesque semper tempus vehicula</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <small class="hex">Joined March 3, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-warning">Expiring</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#">info@example.com</a></span>
                                            <span><a href="#">www.htmlstream.com</a></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img4.jpg" alt="">
                                        </td>
                                        <td>
                                            <h3><a href="#">Alesuada fames ac turpis egestas</a></h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id commodo lacus. Fusce non malesuada ante. Donec vel arcu.</p>
                                            <small class="hex">Joined March 4, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-danger">Error!</span>
                                        </td>
                                        <td>
                                            <ul class="list-inline s-icons">
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Facebook" href="#">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Twitter" href="#">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Dropbox" href="#">
                                                    <i class="fa fa-dropbox"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-placement="top" data-toggle="tooltip" class="tooltips" data-original-title="Linkedin" href="#">
                                                        <i class="fa fa-linkedin"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                            <span><a href="#">info@example.com</a></span>
                                            <span><a href="#">www.htmlstream.com</a></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>    
                    </div>
                    <!--End Table Search v2-->
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
                        <img class="pull-right" id="logo-footer" src="assets/img/logo2-default.png" alt="">
                    </a>
                </div>
            </div>
        </div> 
    </div><!--/copyright--> 
    <!--=== End Copyright ===-->
</div><!--/wrapper-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="assets/plugins/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="assets/plugins/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="assets/plugins/back-to-top.js"></script>
<script type="text/javascript" src="assets/plugins/counter/waypoints.min.js"></script>
<script type="text/javascript" src="assets/plugins/counter/jquery.counterup.min.js"></script> 
<!-- Datepicker Form -->
<script src="assets/plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js"></script>
<!-- Scrollbar -->
<script src="assets/plugins/scrollbar/src/jquery.mousewheel.js"></script>
<script src="assets/plugins/scrollbar/src/perfect-scrollbar.js"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="assets/js/app.js"></script>
<script type="text/javascript" src="assets/js/plugins/datepicker.js"></script>
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
<!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
<![endif]-->

</body>
</html>	