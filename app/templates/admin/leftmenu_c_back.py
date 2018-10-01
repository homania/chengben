<!--Left Sidebar-->
<div class="col-md-3 md-margin-bottom-40">
    <img class="img-responsive profile-img margin-bottom-20" src="https://www.thesun.co.uk/wp-content/uploads/2017/02/nintchdbpict000177708607.jpg" alt="" width=100% style="max-width:270px">

    <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
        {% set nav_list = [
             ('/customer/', 'dashboard', 'fa fa-bar-chart-o', 'Dashboard', ''),
             ('/customer_settings/', 'settings', 'fa fa-cog', 'Account Settings', '<span class="badge badge-u">OK!</span>'),
             ('javascript:void(0);', 'analytics', 'fa fa-group', 'Analytics', '<span class="badge badge-red">INC</span>'),
             ('/receipt/', 'expense', 'fa fa-group', 'Expense Tracking', '<span class="badge badge-u">OK!</span>'),
             ('javascript:void(0);', 'articles', 'fa fa-group', 'Cost Saving Articles', '<span class="badge badge-red">INC</span>'),
             ('/booking/', 'booking', 'fa fa-group', 'Table Booking', '<span class="badge badge-u">OK!</span>'),
             ('/hr_scheduling/', 'scheduling', 'fa fa-group', 'Employee Scheduling (HR)', '<span class="badge badge-u">OK!</span>'),
             ('/customer_watchlist/', 'watchlist', 'fa fa-align-center', '會員Watchlist', '<span class="badge badge-u">OK!</span>'),
             ('/', 'back', 'fa fa-history', 'Back', ''),
              ] -%}{% include 'admin/active_c.html' %}    
        <li class="list-group-item active">
            <a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i> Dashboard</a>
        </li>
            <li class="list-group-item"> <span class="badge badge-u">OK!</span>
            <a href="/customer_settings/"><i class="fa fa-cog"></i> Account Settings</a>
        </li>
        <li class="list-group-item"> <span class="badge badge-red">INC</span>
            <a href="javascript:void(0);"><i class="fa fa-group"></i> * Analytics (paid/future)</a>
        </li>
        <li class="list-group-item"><span class="badge badge-u">OK!</span>
            <a href="/receipt/"><i class="fa fa-group"></i> Expense Tracking</a>
        </li>
        <li class="list-group-item"> <span class="badge badge-red">INC</span>
            <a href="javascript:void(0);"><i class="fa fa-group"></i> Cost Saving Articles</a>
        </li>
        <li class="list-group-item"> <span class="badge badge-u">OK!</span>
            <a href="/booking/"><i class="fa fa-group"></i> Table Booking</a>
        </li>
        <li class="list-group-item"> <span class="badge badge-u">OK!</span>
            <a href="/hr_scheduling/"><i class="fa fa-group"></i> Employee Scheduling (HR)</a>
        </li>  
        <li class="list-group-item">
            <a href="/"><i class="fa fa-history"></i> Back</a>
        </li>                                                                                   
    </ul>   

    <!--Datepicker-->
    <form action="" id="sky-form2" class="sky-form">
        <div id="inline-start"></div>
    </form> 
    <!--End Datepicker-->
</div>
<!--End Left Sidebar-->
