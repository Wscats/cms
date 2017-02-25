<div class="page__hd">
	<h1 class="page__title"><?php echo $this->session->userdata('username');?>已登陆</h1>
	<a href='<?php echo site_url("login/logout");?>' class="page__desc">退出登陆</a>
</div>
<style>
	.page__hd {
		padding: 40px;
	}
	
	.page__desc {
		margin-top: 5px;
		color: #888;
		text-align: left;
		font-size: 14px;
	}
	
	.page__title {
		text-align: left;
		font-size: 20px;
		font-weight: 400;
	}
</style>