<?php
$total_notifications = 0;
$company_counter = 5;
$custom_count = 3;
$email_accounts_counter = 0;
$review_ipaddress_results_counter = 5;
$marketing_sites_counter = 5;
$reviews_counter = 10;
$reports_counter = 0;
$backup_counter = 0;
$restore_counter = 0;
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
                <li><a href="company.php?page=add"><i class="fa fa-building fa-fw"></i> Company</a>
                </li>
                <li><a href="users.php?page=add_users" ><i class="fa fa-users fa-fw"></i> Add User</a>
                </li>
                <li><a href="email-accounts.php?page=add_emails" ><i class="fa fa-user fa-fw"></i> Email Account</a>
                </li>
                <li><a href="marketing-sites.php?page=add_marketing_sites"><i class="fa fa-globe fa-fw"></i> Marketing Site</a>
                </li>
                <li><a href="add-company-review.php"><i class="fa fa-edit fa-fw"></i> Review</a>
                </li>
                <li><a href="reminder.php?page=add_reminders"><i class="fa fa-bell fa-fw"></i> Reminder</a>
                </li>
                <li class="divider"></li>
                <li><a href="messages.php?page=add_message"><i class="fa fa-comment-o fa-fw"></i> Add Message</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                My Account &nbsp;  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="my-employees.php?page=list_emails"><i class="fa fa-user-secret fa-fw"></i> My Employees</a>
                </li>
                <li><a href="my-profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
                </li>
                <li><a href="changepassword.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                </li>
            </ul>
        </li>
        <li style="border-left: 1px solid #dfdfdf;">
            <a href="logout.php" class="text-danger"><i class="fa fa-sign-out fa-fw"></i></a>
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
                        <li><a href="reminder.php?page=add_reminders">Add Reminders</a> </li>
                        <li><a href="reminder.php?page=list_reminders">View Reminders</a> </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-building-o fa-fw"></i> Company<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="company.php?page=add">Add Company</a> </li>
                        <li><a <?php if($company_counter > 0){ echo 'href="company.php?page=list_companies"';}?> >View Companies</a></li>
                        <li><a <?php if($company_counter > 0){ echo 'href="company.php?page=list_archived_companies"';}?> >Archived Companies</a></li>
                        <li style="border-top:1px solid #eee;"><a href="company.php?page=add_social_site_name">Add Review Site Name</a> </li>
                        <li><a <?php if($company_counter > 0){ echo 'href="company.php?page=list_social_site_name"';}?> >View Review Site Name</a> </li>
                        <li style="display:none"><a href="company.php?page=list_offices">&nbsp;</a> </li>
                        <li style="display:none"><a href="company.php?page=add_office">&nbsp;</a> </li>
                        <li style="display:none"><a href="company.php?page=list_domain">&nbsp;</a> </li>
                        <li style="display:none"><a href="company.php?page=add_domain">&nbsp;</a> </li>
                        <li style="display:none"><a href="csv.php">&nbsp;</a> </li>
                        <li style="display:none"><a href="todo.php">&nbsp;</a> </li>
                        <li style="display:none"><a href="marketing.php">&nbsp;</a> </li>
                        <li style="display:none"><a href="send-sms.php">&nbsp;</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-share-alt fa-fw"></i> SMS / Email Campaigns <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="marketing-campaigns.php?page=dashboard">Company's Status</a> </li>
                        <li style="border-top:1px solid #eee;"><a href="levels.php?page=add_levels">Add New Level</a> </li>
                        <li><a href="levels.php?page=list_levels">View Levels</a> </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-comment-o fa-fw"></i> Messages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="messages.php?page=custom_message">Custom Request  Message <span class="badge"><?php echo $custom_count;?></span></a> </li>
                        <li><a href="messages.php?page=add_message">Add Message</a> </li>
                        <li><a href="messages.php?page=list_message">View Message</a> </li>
                    </ul>
                </li>


                <li>
                    <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="users.php?page=add_users">Add Users</a> </li>
                        <li><a href="users.php?page=list_users">View Users</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-share-square-o fa-fw"></i> Social Profile<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a <?php if($company_counter > 0){ echo 'href="social-profile.php?page=list_companies"';}?> >View Social Profiles</a> </li>
                        <li style="display:none"><a href="social-profile.php?page=list_profile">&nbsp;</a> </li>
                        <li style="display:none"><a href="social-profile.php?page=add_profile">&nbsp;</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-envelope-o fa-fw"></i> Email Accounts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="email-accounts.php?page=add_emails">Add Email Accounts</a> </li>
                        <li><a <?php if($email_accounts_counter > 0){ echo 'href="email-accounts.php?page=list_emails"';} ?> >View Email Accounts</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-user-secret fa-fw"></i> Blocked IPs<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a <?php if($review_ipaddress_results_counter > 0){ echo 'href="blocked-ips.php?page=list_blocked_ips"';}else{echo 'href="#"';}?> >View Blocked IPs &nbsp; <span class="badge"><?php echo $review_ipaddress_results_counter;?></span></a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-globe fa-fw"></i> Marketing Sites<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="marketing-sites.php?page=add_marketing_sites">Add Marketing Site</a> </li>
                        <li><a <?php if($marketing_sites_counter > 0){ echo 'href="marketing-sites.php?page=list_marketing_sites"';}?> >View Marketing Sites</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-edit fa-fw"></i> Manage Reviews<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="add-company-review.php">Add Reviews</a> </li>
                        <li><a <?php if($reviews_counter > 0){ echo 'href="company-review.php"';}?> >View Reviews</a> </li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Generate Reports<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a <?php if($reports_counter > 0){ echo 'href="company-report.php"';}?> >Company Report</a></li>
                        <li><a href="review-report.php">Review Report</a></li>
                        <li><a href="email-report.php">Email Report</a></li>
                        <li><a href="marketing-report.php">Marketing Report</a></li>
                        <li><a href="#">IP Address Report</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-database fa-fw"></i> Backup<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a <?php if($backup_counter > 0){ echo 'href="manualbackup.php"';}?> >Manual Backup</a></li>
                        <li><a <?php if($restore_counter > 0){ echo 'href="restore.php"';}?> >Restore</a></li>
                    </ul>
                </li>

                <li>
                    <a href="logout.php" class="text-danger"><i class="fa fa-sign-out fa-fw"></i> LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>