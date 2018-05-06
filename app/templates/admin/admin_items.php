<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>Items | Admin</title>

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
                    
                    <!--Table Search v1-->
                    <div class="table-search-v1 margin-bottom-20">
                    
                        <div class="table-responsive">
                         <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                   <li class="active"><a data-toggle="tab" href="#passwordTab">Price Ticker <i class="fa fa-arrow-down"></i><i class="fa fa-arrow-up"></i></a></li>
                            </ul>
                   		</div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    	<th width="10%">Vendor</th>
                                        <th style="white-space:nowrap;" width="10%">Item</th>
                                        <th class="hidden-sm" width="8%">Price </th>
                                        <th width="100">Timestamp</th>
                                        <th> Clicks </th>
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
                                         89<i class="fa fa-arrow-down color-green"></i>2
                                        </td>
                                        <td>
											Jan 08 15:42
                                        </td>
                                        <td style="text-align:center"> 8</td>
                                    </tr>
                                   <tr>
                                        <td>
                                            <a href="#">EverGREEN</a>
                                        </td>
                                        <td > 萵苣菜2 </td>
                                        <td>
                                         97<i class="fa fa-arrow-up color-red"></i>2
                                        </td>
                                        <td>
											Jan 07 20:03
                                        </td>
                                        <td style="text-align:center"> 5 </td>
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
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>New Items</h2>

							<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">View Recent</a>
                           
                            <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">Add Item<i class="glyphicon glyphicon-plus" style="font-size:16px;margin-left:5px;"></i></a>
            				
                            <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="">Search Items <i class="search fa fa-search search-btn pull-right" style="font-size:16px;margin-top:-6px;margin-left:5px;"></i></a>                
                             
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">Image</th>
                                        <th width="35%">About</th>
                                        <th> Other </th>
                                        <th width="15%">Status</th>
                                        <th width="20%">Search Terms</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="D:/ChengBen/HTML/assets/img/food/SandwichHam.jpg" alt="">
                                        </td>
                                        <td>
                                            <h3><a href="#">富統三明治火腿</a></h3>
                                            <p>Delicious Ham from FuTong Industries</p>
                                            <small class="hex">Submitted by 富統食品股份有限公司 on Feb 28, 2015</small>
                                        </td>
                                        <td>
                                        <span>品牌: 富統</span>
                                        <span>價格: 65元/包</span>
                                        <span>重兩: 185g</span>
                                        </td>
                                        <td>
                                            <span class="label label-success" onClick="javascript:location.href='D:/Nutrifresh/NF2/chengben_vendor.php'" style="cursor:pointer;margin-top:10px;">Pending</span>
                                            <div style="text-align:center; margin-top:5px;"><i class="glyphicon glyphicon-ok-circle color-green" style="font-size:30px;cursor:pointer;"></i>
                                             <i class="glyphicon glyphicon-remove-circle color-red" style="font-size:30px;cursor:pointer;"></i></div>
                                        </td>
                                        <td><i class="fa fa-pencil color-green"></i> Edit +ADD More.<br>
                                            火腿, 富桶, 三明治
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        	<div style="height:60px;width:60px;overflow:hidden;margin-left:20px;">
                                            <img src="http://www.bread.com.tw/skin/frontend/default/respond/images/xlogo.png.pagespeed.ic.qxHG-VIW1j.png" alt="" style="width:auto">
                                            </div>
                                        </td>
                                        <td>
                                            <h3><a href="#">福利麵包食品有限公司</a></h3>
                                            <p>Breads, Pastries, Tortillas, et al.</p>
                                            <small class="hex">Joined March 2, 2014</small>
                                        </td>
                                        <td></td>
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
                                        <td></td>
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
                                        <td></td>
                                        <td>
                                            <span class="label label-danger">Cancelled</span>
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

                    <hr>                                        



                    <!--Table Search v1-->
                    <div class="table-search-v1 margin-bottom-20">
                    
                        <div class="table-responsive">
                         <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#profile"> Item Approvals <span class="glyphicon glyphicon-check"></span></a></li>
                                <li><a data-toggle="tab" href="#passwordTab">View Search Edit <span class="glyphicon glyphicon-search"></span></a></li>
                                <li><a data-toggle="tab" href="#passwordTab">Add <span class="glyphicon glyphicon-plus"></span> </a></li>
                            </ul>
                   		</div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;" width="8%">Name</th>
                                        <th> Vendor </th>
                                        <th class="hidden-sm" width="20%">Desc</th>
                                        <th>Keywords</th>
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
                                        <td></td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;"> 萵苣菜, 生菜</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-u-red btn-block btn-u-xs"><i class="fa fa-sort-amount-desc margin-right-5"></i> Pending</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td></td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">萵苣菜, 生菜</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-dark btn-u-xs"><i class="icon-graph margin-right-5"></i> High</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td></td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">萵苣菜, 生菜</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-aqua btn-u-xs"><i class="fa fa-level-down margin-right-5"></i> Low</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td></td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">萵苣菜, 生菜</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-yellow btn-u-xs"><i class="fa fa-arrows-v margin-right-5"></i> Middle</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td></td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">萵苣菜, 生菜</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-green btn-u-xs"><i class="fa fa-level-up margin-right-5"></i> High</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td></td>
                                        <td >蔬菜類 > 葉菜類</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">萵苣菜, 生菜</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-blue btn-u-xs"><i class="icon-graph margin-right-5"></i> Stabile</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"> <i class="fa fa-cog"></i> 改寫 </span>
                           
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

                    <!--Table Search v1-->
                    <div class="table-search-v1 margin-bottom-20">
                    
                        <div class="table-responsive">
                         <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                                <li><a data-toggle="tab" href="#profile">Items Dashboard</a></li>
                                <li class="active"><a data-toggle="tab" href="#passwordTab">Add Item</a></li>
                            </ul>
                   		</div>
 <form action="../test/php/formmail.php" method="post" name="OrderForm" id="sky-form" class="sky-form">
                        <fieldset>                  
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-user"></i>
                                    <input type="text" name="FullName" placeholder="食品名字" required>
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="email" name="EmailAddr" placeholder="Description">
                                </label>                            
                            </section>
                        </div>
                        
                        <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="email" name="EmailAddr" placeholder="Brand">
                                </label>   
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="email" name="EmailAddr" placeholder="SearchTags (AutoGen) (java +/-)">
                                </label>   
                            </section>
                         </div>
						<div class="row">
                            <section class="col col-6">
                                <label class="select">
                                    <select name="L1Cate">
                                        <option value="none" selected disabled style="display:none">ItemType</option>
                                        <option value="">Veges 蔬菜類</option>
                                        <option value="">Meats 肉類</option>
                                        <option value="">Frozen 冷凍</option>
                                        <option value="">Dry Goods 炸貨</option>
                                        <option value="">Sauce 醬料</option>
                                        <option value="">Refrigerated 冷場</option>
                                        <option value="">Beverage/ Liquid 飲料</option>
                                        <option value="">Spirits 酒類</option>
                                        <option value="">Bread 麵包</option>
                                        <option value="">Cutlery 餐具</option>
                                        <option value="">Pack 包裝</option>
                                        <option value="">Delivery 外送類</option>
                                        <option value="">Marketing 行消</option>
                                        <option value="">Office 班公用</option>
                                        <option value="">Accounting 快計/POS</option>
                                        <option value="">Water/Elect 水電</option>
                                        <option value="">Sanitation 清潔</option>
                                        <option value="">* New Category ..</option>
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
                                    <input type="text" name="Price" placeholder="Weight">
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="select">
                                    <select name="L1Cate">
                                        <option value="none" selected disabled style="display:none">UnitType</option>
                                        <option value="">gram (g)</option>
                                        <option value="">Kilogram (KG)</option>
                                        <option value="">台斤</option>
                                        <option value="">ml</option>
                                        <option value="">cc</option>
                                        <option value="">Litre</option>
                                        <option value="">pound(lb)</option>
                                        <option value="">day (日)</option>
                                        <option value="">month(月)</option>
                                        <option value="">year(年)</option>

                                    </select>
                                    <i></i>
                                </label>                            

                            </section>
                         </div>

                         <div class="row">
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="text" name="Price" placeholder="Upload Image">
                                </label>
                            </section>
                            <section class="col col-6">
                                <label class="input">
                                    <i class="icon-append fa fa-envelope"></i>
                                    <input type="text" name="Price" placeholder="Website URL">
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
                    <!--Profile Blog-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>New Registered Users Restaurants </h2>
                            <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">View All</a>
                            
<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">Add Member<i class="glyphicon glyphicon-plus" style="font-size:16px;margin-left:5px;"></i></a>                            
                            
<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="">Search Members <i class="search fa fa-search search-btn pull-right" style="font-size:16px;margin-top:-6px;margin-left:5px;"></i></a>                                   
                            
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



                    <!--Table Search v2-->
                    
                    <div class="table-search-v2 margin-bottom-20">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>New Partners</h2>

							<a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">View All</a>
                           
                            <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="margin-left:20px;">Add Vendor<i class="glyphicon glyphicon-plus" style="font-size:16px;margin-left:5px;"></i></a>
            				
                            <a href="#" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right" style="">Search Vendors <i class="search fa fa-search search-btn pull-right" style="font-size:16px;margin-top:-6px;margin-left:5px;"></i></a>                
                             
                        </div>
                    
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Vendor Image</th>
                                        <th class="hidden-sm">About</th>
                                        <th width="15%">Status</th>
                                        <th>Contacts</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="rounded-x" src="D:\ChengBen\HTML\assets\img\food\FuTong.jpg" alt="">
                                        </td>
                                        <td class="td-width">
                                            <h3><a href="#">富統食品股份有限公司</a></h3>
                                            <p>Item Specialities (Item Search Terms)</p>
                                            <small class="hex">Joined February 28, 2014</small>
                                        </td>
                                        <td>
                                            <span class="label label-success" onClick="javascript:location.href='D:/Nutrifresh/NF2/chengben_vendor.php'" style="cursor:pointer;margin-top:10px;">Pending</span>
                                            <div style="text-align:center; margin-top:5px;"><i class="glyphicon glyphicon-ok-circle color-green" style="font-size:30px;cursor:pointer;"></i>
                                             <i class="glyphicon glyphicon-remove-circle color-red" style="font-size:30px;cursor:pointer;"></i></div>
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
                                        	<div style="height:60px;width:60px;overflow:hidden;margin-left:20px;">
                                            <img src="http://www.bread.com.tw/skin/frontend/default/respond/images/xlogo.png.pagespeed.ic.qxHG-VIW1j.png" alt="" style="width:auto">
                                            </div>
                                        </td>
                                        <td>
                                            <h3><a href="#">福利麵包食品有限公司</a></h3>
                                            <p>Breads, Pastries, Tortillas, et al.</p>
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
                                            <span class="label label-danger">Cancelled</span>
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