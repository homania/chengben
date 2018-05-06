<!--Left Sidebar-->
<div class="col-md-3 md-margin-bottom-40">
    <img class="img-responsive profile-img margin-bottom-20" src="http://caribla.com/wp-content/uploads/2014/09/0007__0028_Sysco_with_tag_TM.jpg" alt="" width=100% style="max-width:270px">

    <ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
        <li class="list-group-item active" style="background:#717984;">
            <a href="/ivendor/"><i class="fa fa-bar-chart-o"></i> Overall</a>
            <ul id="collapse-content-metrics" class="collapse in">
                {% set nav_list = [
                     ('javascript:void(0);', 'metrics', 'fa fa-user', 'Metrics 分析', '<span class="badge badge-red">INC</span>'),
                     ('/itemdashboard/', 'items', 'fa fa-group', 'Items Mgmt 食品管理 [OUT]', '<span class="badge badge-u">OK!</span>'),
                     ('/vendor/27/1', 'viewpage', 'fa fa-comments', 'View My Page [OUT]', '<span class="badge badge-u">OK!</span>'),
                     ('/vendor_pay/', 'vpay', 'fa fa-comments', 'Account Payments', '<span class="badge badge-u">OK!</span>'),
                     ('/vendor_settings/', 'vsettings', 'fa fa-cog', 'Account Settings', '<span class="badge badge-u">OK!</span>'),
                     ('/vendor_clicks/', 'vclicks', 'fa fa-cog', 'Clicks History', '<span class="badge badge-u">OK!</span>'),
                     ('javascript:void(0);', 'vorders', 'fa fa-cog', 'Customer Orders/ Inquiries', '<span class="badge badge-red">INC</span>'),
                     ('javascript:void(0);', 'vfeedback', 'fa fa-cog', 'Customer Reviews/ Feedback', '<span class="badge badge-red">INC</span>'),
                      ] -%}{% include 'admin/vactive.py' %}    
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
