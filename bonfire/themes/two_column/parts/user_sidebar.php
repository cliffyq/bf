
<div class="well sidebar-nav">
	<ul class="nav nav-list">
		<li class="nav-header">HOME</li>
		<li
		<?php echo strpos($this->uri->uri_string(),'user/user_user/video_charts')===false ? '' : 'class="active"' ?>>
			<a
			href="<?php echo site_url('/user/user_user/video_charts') ?>"
			id="sidebar-charts">Video</a>
		</li>


		<li class="nav-header">USER</li>
		<li
		<?php echo   $this->uri->uri_string() == 'video/company/upload_video' ? 'class="active"' : '' ?>>
			<a href="<?php echo site_url('/user/user_user/video_charts') ?>"
			id="sidebar-new-meida">Subscriptions</a>
		</li>

		<li
		<?php echo   $this->uri->uri_string() == 'video/company/video_manager' ? 'class="active"' : '' ?>>
			<a href="<?php echo site_url('/user/user_user/video_charts') ?>"
			id="sidebar-video-manager">Viewed History</a>
		</li>

		<li
		<?php echo   $this->uri->uri_string() == 'video/company/video_manager' ? 'class="active"' : '' ?>>
			<a href="<?php echo site_url('/user/user_user/video_charts') ?>"
			id="sidebar-video-manager">Rating History</a>
		</li>

		<li
		<?php echo   $this->uri->uri_string() == 'video/company/video_manager' ? 'class="active"' : '' ?>>
			<a href="<?php echo site_url('/user/user_user/video_charts') ?>"
			id="sidebar-video-manager">Purchase History</a>
		</li>

		<li
		<?php echo   $this->uri->uri_string() == 'video/company/video_manager' ? 'class="active"' : '' ?>>
			<a href="<?php echo site_url('/user/user_user/video_charts') ?>"
			id="sidebar-video-manager">Bank Account</a>
		</li>

		<li
		<?php echo   $this->uri->uri_string() == 'video/company/video_manager' ? 'class="active"' : '' ?>>
			<a href="<?php echo site_url('/user/user_user/video_charts') ?>"
			id="sidebar-video-manager">Wish List</a>
		</li>

		<li class="nav-header">INCENTIVES</li>
		<li
		<?php echo $this->uri->uri_string()== 'incentive/company/create' ? 'class="active"' : '' ?>>
			<a href="<?php echo site_url('/user/user_user/video_charts') ?>"
			id="sidebar-new-incentive">View Incentives</a>
		</li>

		<li><a class="nav-image"
			href="<?php echo site_url('user/show_random_video') ?>"> <img
				src="http://localhost/bf/bonfire/themes/two_column/images/logo_v1.png">
		</a>
		</li>


	</ul>
</div>
<!--/.well -->
