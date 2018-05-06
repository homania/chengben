<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Pay | Admin</title>

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

            </div>
            <!--End Left Sidebar-->
            
            <div class="col-md-9">
                <!--Profile Body-->
                <div class="profile-body">
                    <!--Service Block v3-->
                    <div class="row margin-bottom-10">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="service-block-v3 servive-block-u">
                                <i class="glyphicon glyphicon-log-out"></i>
                                <span class="service-heading">OUTSTANDING REMAIN (MONTH)</span>
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>UNPAID</small>
                                        <h4 class="counter">24,239</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>PAID</small>
                                        <h4 class="counter">132,048</h4>
                                    </div>
                                </div>
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>TOTAL PAYS</small>
                                        <h4 class="counter">156,239</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>Last Month PAYS</small>
                                        <h4 class="counter">156,048</h4>
                                    </div>
                                </div>
                                <div class="statistics">
                                <h3 class="heading-xs">Month Progress <span class="pull-right">67%</span></h3>
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
                                <i class="glyphicon glyphicon-usd"></i>
                                <span class="service-heading">TOTAL CASH</span>
                                <span class="counter">1,234,670</span>
                                
                                <div class="clearfix margin-bottom-10"></div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>12月NET</small>
                                        <h4 class="counter">120,904</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>12月 GROSS</small>
                                        <h4 class="counter">210,766</h4>
                                    </div>
                                </div>
                                
                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>1月ANTIC-NET</small>
                                        <h4 class="counter">160,344</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>1月ANTIC-GROSS</small>
                                        <h4 class="counter">230,766</h4>
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
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Payables Calendar </h2>
                            <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">View All</a>
                            
<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">Add Receive<i class="glyphicon glyphicon-plus" style="font-size:16px;margin-left:5px;"></i></a>                            
                            
<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="">Search Receive <i class="search fa fa-search search-btn pull-right" style="font-size:16px;margin-top:-6px;margin-left:5px;"></i></a>                                   
                            
                        </div>                    
					  <!--Datepicker-->
                        <form action="" id="sky-form2" class="sky-form">
                            <div id="inline-start"></div>
                        </form> 
                        <!--End Datepicker-->
                     <hr>

                    <!--Table Search v1-->
                    <div class="table-search-v1 margin-bottom-20">
                    
                        <div class="table-responsive">
                         <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                                <li><a data-toggle="tab" href="#profile">Payables Calendar</a></li>
                                <li class="active"><a data-toggle="tab" href="#passwordTab">Add/ Edit Payable</a></li>
                            </ul>
                   		</div>
 <form action="../test/php/formmail.php" method="post" name="OrderForm" id="sky-form" class="sky-form">
                        <fieldset>                  
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-search"></i>
                                    <input type="text" name="FullName" placeholder="Vendor" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="email" name="EmailAddr" placeholder="BUS ID/ TRANSACTION REF# HISTORY">
                                </label>                            
                            </section>
                        </div>
                        
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="email" name="EmailAddr" placeholder="Description i.e. Phone/ Salaries">
                                </label>   
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="email" name="EmailAddr" placeholder="Due Date">
                                </label>   
                            </section>
                         </div>
						<div class="row">
                            <section class="col col-6">
                                <label class="select">
                                    <select name="L1Cate">
                                        <option value="none" selected disabled style="display:none">Payable Type</option>
                                        <option value="">Single</option>
                                        <option value="" disabled>Recur</option>
                                        <option value="">-- Weekly </option>
                                        <option value="">-- Monthly </option>
                                        <option value="">-- Bi-Monthly </option>
                                    </select>
                                    <i></i>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="text" name="Price" placeholder="Price (NTD)">
                                </label>  
                            </section>
                         </div>
                         
                         <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="text" name="Price" placeholder="Payment Date">
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="select">
                                    <select name="L1Cate">
                                        <option value="none" selected disabled style="display:none">PaymentType</option>
                                        <option value="">CASH</option>
                                        <option value="">DIRECT DEPOSIT</option>
                                        <option value="">CREDIT CARD</option>
                                        <option value="">WAIVED</option>
                                    </select>
                                    <i></i>
                                </label>                            

                            </section>
                         </div>

                         <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="text" name="Price" placeholder="RECEIPT ISSUED NUMBER 發票/收據號碼">
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="text" name="Price" placeholder="CASH: WHO誰收 DD: ACCT#, CC: REFER#">
                                </label>                          

                            </section>
                         </div>
						<div class="row">
                                    <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Save Item</button>
                        </div>                                               
                                                  
                      </fieldset>
</form>
                            
                            
                        </div>    
                    </div>
                    <!--End Table Search v1--> 

                    <hr>


                    <!--Table Search v1-->
                    <div class="table-search-v1 margin-bottom-20">
                    
                        <div class="table-responsive">
                         <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#profile">Vendors Payable</a></li>
                                <li><a data-toggle="tab" href="#passwordTab">Add Item</a></li>
                            </ul>
                   		</div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;" width="15%">Vendor</th>
                                        <th class="hidden-sm" width="10%">總共金額</th>
                                        <th>原本付款日期</th>
                                        <th width="10%">付款方案</th>
                                        <th width="100">Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#" style="font-family:Meiryo; font-size:14px;">Flordia Bakery</a>
                                        </td>
                                        <td> <a href="#" style="font-family:Meiryo; font-size:14px;">
                                             20583NT </a></td>
                                        <td>
                                             <span style="font-family:Meiryo; font-size:14px;">1月20日</span>
                                        </td>
                                        <td>
                                            <span style="font-family:Meiryo; font-size:14px;">CASH </span>
                                        </td>
                                        <td><button class="btn-u btn-u-red btn-block btn-u-xs"><i class="fa fa-sort-amount-desc margin-right-5"></i> Pending</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-print"></i> Invoice </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-envelope"></i> Email </span>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-ban"></i> Suspend </span>
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td ><a href="#" style="font-family:Meiryo; font-size:14px;">
                                             20583NT </a></td></td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT</p>
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
                                            <a href="#">Steve Salary</a>
                                        </td>
                                        <td ><a href="#" style="font-family:Meiryo; font-size:14px;">
                                             50000NT </a></td></td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT</p>
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
                                        <td ><a href="#" style="font-family:Meiryo; font-size:14px;">
                                             20583NT </a></td></td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT</p>
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
                                        <td ><a href="#" style="font-family:Meiryo; font-size:14px;">
                                             20583NT </a></td></td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT</p>
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
                                        <td ><a href="#" style="font-family:Meiryo; font-size:14px;">
                                             20583NT </a></td></td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT</p>
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

                    <!--Table Search v2-->
                    <div class="table-search-v2 margin-bottom-20">
                       <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>Outstanding Payable</h2>
                            <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">View All</a>
                            
<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">Add Receive<i class="glyphicon glyphicon-plus" style="font-size:16px;margin-left:5px;"></i></a>                            
                            
<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="">Search Receive <i class="search fa fa-search search-btn pull-right" style="font-size:16px;margin-top:-6px;margin-left:5px;"></i></a>                                   
                            
                        </div>   
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Vendor</th>
                                        <th>About</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img1.jpg" alt="">
                                        </td>
                                        <td class="td-width">
                                            <h3><a href="#">Jason Bourne - Salary</a></h3>
                                            <p>BALANCE: 20,583NT CASH</p>
                                            <small class="hex">Due Date January 20th, 2016 (16 days past due)</small>
                                        </td>
                                        <td>
                                            <span class="label label-success">History</span>
                                        </td>
                                        <td>
						   <span style="color:#666666;margin-right:5px;"> <i class="fa fa-print"></i> Invoice </span>
                           <span style="color:#666666;margin-right:5px;"><i class="fa fa-envelope"></i> Email </span>
                           <span style="color:#666666;margin-right:5px;"><i class="fa fa-ban"></i> Suspend </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="assets/img/testimonials/img2.jpg" alt="">
                                        </td>
                                        <td>
                                            <h3><a href="#">CHT - Landline</a></h3>
                                            <p>BALANCE: 3,583NT CASH</p>
                                            <small class="hex">Due Date January 20th, 2016 (4 days past due)</small>
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