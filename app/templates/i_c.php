<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>CB_Customer</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ url_for('static', filename='plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url_for('static', filename='css/style2.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ url_for('static', filename='plugins/line-icons/line-icons.css') }}">
    <link rel="stylesheet" href="{{ url_for('static', filename='plugins/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url_for('static', filename='plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css') }}">
    <link rel="stylesheet" href="{{ url_for('static', filename='plugins/scrollbar/src/perfect-scrollbar.css') }}">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="{{ url_for('static', filename='css/pages/profile.css') }}">

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="{{ url_for('static', filename='css/themes/default.css" id="style_color') }}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ url_for('static', filename='css/custom.css') }}">
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
                <div class="navbar-header" style="margin-left:80px;">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img id="logo-header" src="../static/img/logo2.png" alt="Logo">
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
                <img class="img-responsive profile-img margin-bottom-20" src="https://scontent-tpe1-1.xx.fbcdn.net/hphotos-xlp1/v/t1.0-9/12360089_1625813294348861_2650950302680945333_n.jpg?oh=8b93aea815ffec0b2858cc58e07f7da3&oe=57068F3E" alt="" width=100% style="max-width:270px">

                <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
                    <li class="list-group-item active">
                        <a href="#"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
                    </li>
                 	<li class="list-group-item">
                        <a href="customer_settings.php"><i class="fa fa-cog"></i> Account Settings</a>
                    </li>
                    <li class="list-group-item">
                        <a href="#"><i class="fa fa-group"></i> * Analytics (paid/future)</a>
                    </li>                     
                    <li class="list-group-item">
                        <a href="D:/Nutrifresh/NF2/chengben.php"><i class="fa fa-history"></i> Back</a>
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
                    
                    <div class="row margin-bottom-0">
                        <!--Recent Clicks-->
                        <div class="col-sm-6">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-list-ul"></i>Popular Searches</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                <div class="table-responsive">
                            <table class="table table-hover" style="font-family:Meiryo; font-size:14px;">

                                <tbody>
                                    <tr>
                                        <td width="25%">
                                            <a href="#">Powdered Spices </a>
                                        </td>
                                        <td width="25%"> <a href="#"> Dried Herbs </a></td>
                                        <td width="25%">
                                         <a href="#">Oil </a>
                                        </td>
                                        <td width="25%">
                                            <a href="#">Vinegar</a>
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            <a href="#">Ham & Turkey</a>
                                        </td>
                                        <td > <a href="#">Pre-Prepared </a> </td>
                                        <td>
                                         <a href="#"> Salsa  </a>
                                        </td>
                                        <td>
                                            <a href="#">Beer</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Cooking Wine</a>
                                        </td>
                                        <td > <a href="#">Paper Meal Box </a> </td>
                                        <td>
                                         <a href="#">Delivery Bags </a>
                                        </td>
                                        <td>
                                           <a href="#">Printing </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">POS Services</a>
                                        </td>
                                        <td > <a href="#">Credit Card Processors </a></td>
                                        <td>
                                         <a href="#"> 水電 </a>
                                        </td>
                                        <td>
                                            <a href="#">Roach Killing </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Garbage</a>
                                        </td>
                                        <td > <a href="#">Cleaning </a> </td>
                                        <td>
                                         <a href="#"> Frozen Vegetables</a>
                                        </td>
                                        <td>
                                            <a href="#">Beef </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">Eggs</a>
                                        </td>
                                        <td > <a href="#">Pastas </a></td>
                                        <td>
                                         <a href="#">Nuts</a>
                                        </td>
                                        <td>
                                            <a href="#">Rice</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>   
                            </div>        
                        </div>
                        <!--End Recent Clicks-->

                        <!--Popular/New/Ad Items-->
                        <div class="col-sm-6 panel-profile" style="background-color:#FFF";>
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-usd"></i>Popular Items</h2>
                                    <a href="#"><i class="fa fa-cog pull-right"></i></a>
                                </div>
                                
                                  <div class="comment">
                                        <img src="D:\ChengBen\HTML\assets\img\food\SandwichHam.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong>Taylor Lee<small class="pull-right"> 25m</small></strong> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <ul class="list-inline comment-list">
                                                <li><i class="fa fa-heart"></i> <a href="#">23</a></li>
                                                <li><i class="fa fa-comments"></i> <a href="#">5</a></li>
                                            </ul>
                                        </div>    
                                    </div>
                                    
                                    <div class="profile-blog">
                                        <img class="rounded-x" src="D:\ChengBen\HTML\assets\img\food\SandwichHam.jpg" alt="">
                                        <div class="name-location">
                                            <div style="font-family:Meiryo;color:#72c02c;font-size:18px;">美味火腿</div>
                                            <span><i class="fa fa-map-marker"></i>Donec non dignissim eros. Mauris faucibus turpis volutpat sagittis rhoncus. Pellentesque et rhoncus sapien, sed ullamcorper justo.</span>
                                        </div>
                                    </div>    <hr style="margin-top:0px;margin-bottom:10px;">
                                    
                                    
                                  <div class="comment">
                                        <img src="D:\ChengBen\HTML\assets\img\food\SandwichHam.jpg" alt="">
                                        <div class="overflow-h">
                                            <strong>Taylor Lee<small class="pull-right"> 25m</small></strong> 
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                            <ul class="list-inline comment-list">
                                                <li><i class="fa fa-heart"></i> <a href="#">23</a></li>
                                                <li><i class="fa fa-comments"></i> <a href="#">5</a></li>
                                            </ul>
                                        </div>    
                                    </div>                                                                                                         
                                
                <!--End Notification-->
                            </div>
                        </div>
                        <!--Popular/New/Ad Items-->
                    </div><!--/end row-->
                    
                    
                    <!--Watchlist-->
                    <div class="table-search-v1 margin-bottom-20">
                    
                        <div class="table-responsive">
                         <div class="tab-v1">
                            <ul class="nav nav-justified nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#profile">Watchlist</a></li>
                            </ul>
                   		</div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th style="white-space:nowrap;">SearchTerm</th>
                                        <th class="hidden-sm" width="20%">Vendor</th>
                                        <th>Brand</th>
                                        <th>Price <i class="fa fa-arrow-down"></i><i class="fa fa-arrow-up"></i></th>
                                        <th>Last Update </th>
                                        <th width="100">Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td > 富統食品股份有限公司 </td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-u-red btn-block btn-u-xs"><i class="fa fa-sort-amount-desc margin-right-5"></i> Pending</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                   <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >統食品份有限公司</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-dark btn-u-xs"><i class="icon-graph margin-right-5"></i> High</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >食統股份有限富公司品</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-aqua btn-u-xs"><i class="fa fa-level-down margin-right-5"></i> Low</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >股份有限公司富統食品</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-yellow btn-u-xs"><i class="fa fa-arrows-v margin-right-5"></i> Middle</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >品股富統食限公司份有</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-green btn-u-xs"><i class="fa fa-level-up margin-right-5"></i> High</button></td>
                                        <td>
                           <span style="color:#666666;float:left;margin-right:5px;"><i class="fa fa-times"></i> 刪除 </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#">萵苣菜</a>
                                        </td>
                                        <td >公司富統食份有限品股</td>
                                        <td>
                                             <a href="#" class="display-b" style="font-family:Meiryo; font-size:14px;">HomeGrown</a>
                                        </td>
                                        <td>
                                            <p style="font-family:Meiryo; font-size:14px;">98NT / 台斤</p>
                                        </td>
                                        <td><button class="btn-u btn-block btn-u-blue btn-u-xs"><i class="icon-graph margin-right-5"></i> Stabile</button></td>
                                        <td>
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

                    <!--Profile Blog-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-tasks"></i>New Items (link)</h2>
                            <a href="profile_users.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="profile-blog blog-border">
                                        <img class="rounded-x" src="http://www.finefoodspecialist.co.uk/media/catalog/product/cache/1/image/370x/9df78eab33525d08d6e5fb8d27136e95/a/1/a1_steak_sauce.jpg" alt="">
                                        <div class="name-location">
                                            <strong>A1 Steak Sauce [38oz]</strong>
                                            <span><i class="fa fa-map-marker"></i><a href="#"> BBQ醬, 西式, 醬料 </span>
                                        </div>
                                        <div class="clearfix margin-bottom-20"></div>    
                                        <p>A.1. Steak Sauce 283g, Large Bottle - Kraft Foods</p>
                                        <hr>
                                        <ul class="list-inline share-list">
                                            <li><i class="fa fa-bell"></i><a href="#">addded 12 Hours Ago</a></li>
                                            <li><i class="fa fa-group"></i><a href="#">ShenSong Foods</a></li>
                                        </ul>
                                    </div>
                                </div>        

                                <div class="col-sm-6">
                                    <div class="profile-blog blog-border">
                                        <img class="rounded-x" src="http://www.finefoodspecialist.co.uk/media/catalog/product/cache/1/image/370x/9df78eab33525d08d6e5fb8d27136e95/p/u/pumpkin_pie_filling_100_natural_-_libby_s.jpg" alt="">
                                        <div class="name-location">
                                            <strong>Libby's Pumpkin Pie Filling 425g</strong>
                                            <span><i class="fa fa-map-marker"></i><a href="#">Moscow,</a> <a href="#">Russia</a></span>
                                        </div>
                                        <div class="clearfix margin-bottom-20"></div>    
                                        <p>Pumpkin Pie Filling, Libby's 100% Natural, 425g</p>
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
                            <a href="profile_users.html" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">View All</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Vendor Image</th>
                                        <th class="hidden-sm">About</th>
                                        <th>Status</th>
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
                                            <span class="label label-success" onClick="javascript:location.href='D:/Nutrifresh/NF2/chengben_vendor.php'" style="cursor:pointer">ItemList</span>
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
<script type="text/javascript" src="{{ url_for('static', filename='plugins/jquery-1.10.2.min.js') }}"></script>
<script type="text/javascript" src="{{ url_for('static', filename='plugins/jquery-migrate-1.2.1.min.js') }}"></script>
<script type="text/javascript" src="{{ url_for('static', filename='plugins/bootstrap/js/bootstrap.min.js') }}"></script> 
<!-- JS Implementing Plugins -->
<script type="text/javascript" src="{{ url_for('static', filename='plugins/back-to-top.js') }}"></script>
<script type="text/javascript" src="{{ url_for('static', filename='plugins/counter/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ url_for('static', filename='plugins/counter/jquery.counterup.min.js') }}"></script> 
<!-- Datepicker Form -->
<script src="{{ url_for('static', filename='plugins/sky-forms/version-2.0.1/js/jquery-ui.min.js') }}"></script>
<!-- Scrollbar -->
<script src="{{ url_for('static', filename='plugins/scrollbar/src/jquery.mousewheel.js') }}"></script>
<script src="{{ url_for('static', filename='plugins/scrollbar/src/perfect-scrollbar.js') }}"></script>
<!-- JS Page Level -->           
<script type="text/javascript" src="{{ url_for('static', filename='js/app.js') }}"></script>
<script type="text/javascript" src="{{ url_for('static', filename='js/plugins/datepicker.js') }}"></script>
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
    <script src="{{ url_for('static', filename='plugins/respond.js') }}"></script>
    <script src="{{ url_for('static', filename='plugins/html5shiv.js') }}"></script>
<![endif]-->

</body>
</html>	
