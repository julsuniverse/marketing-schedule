<?php
$total_notifications = 1;
$company_counter = 1;
$custom_count = 1;
$email_accounts_counter = 1;
$review_ipaddress_results_counter = 1;
$marketing_sites_counter = 1;
$reviews_counter = 1;
$reports_counter = 1;
$backup_counter = 1;
$restore_counter = 1;

$baseUrl = "https://review.wwwebdesignstudios.com/lmms/";
?>
<nav class="navbar" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a style="padding:10px;" class="navbar-brand" href="#"><img src="/images/logo.png" height="32px"></a>
    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li>
            <a href="#">Dashboard</a>
        </li>

        <li>
            <a href="#">Notifications &nbsp;<span class="badge"><?php echo $total_notifications;?></span></a>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Add New &nbsp;  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ $baseUrl }}company.php?page=add"><i class="fa fa-building fa-fw"></i> Company</a>
                </li>
                <li><a href="{{ $baseUrl }}users.php?page=add_users" ><i class="fa fa-users fa-fw"></i> Add User</a>
                </li>
                <li><a href="{{ $baseUrl }}email-accounts.php?page=add_emails" ><i class="fa fa-user fa-fw"></i> Email Account</a>
                </li>
                <li><a href="{{ $baseUrl }}marketing-sites.php?page=add_marketing_sites"><i class="fa fa-globe fa-fw"></i> Marketing Site</a>
                </li>
                <li><a href="{{ $baseUrl }}add-company-review.php"><i class="fa fa-edit fa-fw"></i> Review</a>
                </li>
                <li><a href="{{ $baseUrl }}reminder.php?page=add_reminders"><i class="fa fa-bell fa-fw"></i> Reminder</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ $baseUrl }}messages.php?page=add_message"><i class="fa fa-comment-o fa-fw"></i> Add Message</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                My Account &nbsp;  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ $baseUrl }}my-employees.php?page=list_emails"><i class="fa fa-user-secret fa-fw"></i> My Employees</a>
                </li>
                <li><a href="{{ $baseUrl }}my-profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
                </li>
                <li><a href="{{ $baseUrl }}changepassword.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                </li>
            </ul>
        </li>
        <li style="border-left: 1px solid #dfdfdf;">
            <a href="{{ $baseUrl }}logout.php" class="text-danger"><i class="fa fa-sign-out fa-fw"></i></a>
        </li>
    </ul>

    <div class="sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bell fa-fw"></i> Reminders<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ $baseUrl }}reminder.php?page=add_reminders">Add Reminders</a> </li>
                        <li><a href="{{ $baseUrl }}reminder.php?page=list_reminders">View Reminders</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-building-o fa-fw"></i> Company<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ $baseUrl }}company.php?page=add">Add Company</a> </li>
                        <li><a href="@if($company_counter > 0) {{ $baseUrl }}company.php?page=list_companies" @endif >View Companies</a></li>
                        <li><a href="@if($company_counter > 0) {{ $baseUrl }}company.php?page=list_archived_companies" @endif >Archived Companies</a></li>
                        <li style="border-top:1px solid #eee;"><a href="{{ $baseUrl }}company.php?page=add_social_site_name">Add Review Site Name</a> </li>
                        <li><a href="@if($company_counter > 0) {{ $baseUrl }}company.php?page=list_social_site_name"@endif >View Review Site Name</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}company.php?page=list_offices">&nbsp;</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}company.php?page=add_office">&nbsp;</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}company.php?page=list_domain">&nbsp;</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}company.php?page=add_domain">&nbsp;</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}csv.php">&nbsp;</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}todo.php">&nbsp;</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}marketing.php">&nbsp;</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}send-sms.php">&nbsp;</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-share-alt fa-fw"></i> SMS / Email Campaigns <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ $baseUrl }}marketing-campaigns.php?page=dashboard">Company's Status</a> </li>
                        <li style="border-top:1px solid #eee;"><a href="{{ $baseUrl }}levels.php?page=add_levels">Add New Level</a> </li>
                        <li><a href="{{ $baseUrl }}levels.php?page=list_levels">View Levels</a> </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-comment-o fa-fw"></i> Messages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ $baseUrl }}messages.php?page=custom_message">Custom Request  Message <span class="badge"><?php echo $custom_count;?></span></a> </li>
                        <li><a href="{{ $baseUrl }}messages.php?page=add_message">Add Message</a> </li>
                        <li><a href="{{ $baseUrl }}messages.php?page=list_message">View Message</a> </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ $baseUrl }}users.php?page=add_users">Add Users</a> </li>
                        <li><a href="{{ $baseUrl }}users.php?page=list_users">View Users</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-share-square-o fa-fw"></i> Social Profile<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="@if($company_counter > 0) {{ $baseUrl }}social-profile.php?page=list_companies @endif">View Social Profiles</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}social-profile.php?page=list_profile">&nbsp;</a> </li>
                        <li style="display:none"><a href="{{ $baseUrl }}social-profile.php?page=add_profile">&nbsp;</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-envelope-o fa-fw"></i> Email Accounts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ $baseUrl }}email-accounts.php?page=add_emails">Add Email Accounts</a> </li>
                        <li><a href="@if($email_accounts_counter > 0) {{ $baseUrl }}email-accounts.php?page=list_emails @endif" >View Email Accounts</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user-secret fa-fw"></i> Blocked IPs<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="@if($review_ipaddress_results_counter > 0) {{ $baseUrl }}blocked-ips.php?page=list_blocked_ips @else # @endif">View Blocked IPs &nbsp; <span class="badge"><?php echo $review_ipaddress_results_counter;?></span></a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-globe fa-fw"></i> Marketing Sites<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ $baseUrl }}marketing-sites.php?page=add_marketing_sites">Add Marketing Site</a> </li>
                        <li><a href="@if($marketing_sites_counter > 0) {{ $baseUrl }}marketing-sites.php?page=list_marketing_sites @endif">View Marketing Sites</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i> Manage Reviews<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{ $baseUrl }}add-company-review.php">Add Reviews</a> </li>
                        <li><a href="@if($reviews_counter > 0) {{ $baseUrl }}company-review.php @endif">View Reviews</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Generate Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="@if($reports_counter > 0) {{ $baseUrl }}company-report.php @endif">Company Report</a></li>
                        <li><a href="{{ $baseUrl }}review-report.php">Review Report</a></li>
                        <li><a href="{{ $baseUrl }}email-report.php">Email Report</a></li>
                        <li><a href="{{ $baseUrl }}marketing-report.php">Marketing Report</a></li>
                        <li><a href="#">IP Address Report</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-database fa-fw"></i> Backup<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="@if($backup_counter > 0) {{ $baseUrl }}manualbackup.php @endif">Manual Backup</a></li>
                        <li><a href="@if($restore_counter > 0) {{ $baseUrl }}restore.php @endif">Restore</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ $baseUrl }}logout.php" class="text-danger"><i class="fa fa-sign-out fa-fw"></i> LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>