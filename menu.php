<?php include 'common.php'; ?>
<?php if(!defined('__TYPECHO_ADMIN__')) exit; ?>

<script src="assets/js/misc.js"></script>
<div class="container-scroller">
	<!-- 顶部导航 -->
	<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
		<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
			<a class="navbar-brand brand-logo" href="index.php"><img src="assets/images/logo.svg" alt="logo"></a>
			<a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo-mini.svg" alt="logo"></a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-stretch">
			<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
				<span class="mdi mdi-menu"></span>
			</button>
			<div class="search-field d-none d-md-block">
				<form class="d-flex align-items-center h-100" action="#">
					<div class="input-group">
						<div class="input-group-prepend bg-transparent">
							<i class="input-group-text border-0 mdi mdi-magnify"></i>
						</div>
						<input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
					</div>
				</form>
			</div>
			<ul class="navbar-nav navbar-nav-right">
				<li class="nav-item d-none d-lg-block full-screen-link">
					<a class="nav-link">
						<i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown"
					 aria-expanded="false">
						<i class="mdi mdi-bell-outline"></i>
						<span class="count-symbol bg-danger"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
						<h6 class="p-3 mb-0">官方最新日志</h6>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item preview-item">
							<div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
								<p class="text-gray ellipsis mb-0"> <section class="latest-link">

									<div id="typecho-message">
										<ul>
											<li><?php _e('读取中...'); ?></li>
										</ul>
									</div>  
									
					            </p>
							</div>
						</a>
					</div>
				</li>
			</ul>
			<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
				<span class="mdi mdi-menu"></span>
			</button>
		</div>
	</nav>
	<!-- 主面板 -->
	<div class="container-fluid page-body-wrapper">
		<!-- 左侧栏导航 -->
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<ul class="nav">
				<li class="nav-item nav-profile">
					<a href="#" class="nav-link">
						<div class="nav-profile-image">
						<?php echo '<img src="' . Typecho_Common::gravatarUrl($user->mail, 220, 'X', 'mm', $request->isSecure()) . '" alt="' . $user->screenName . '" />'; ?>
							<span class="login-status online"></span>
						</div>
						<div class="nav-profile-text d-flex flex-column">
							<span class="font-weight-bold mb-2"><?php $user->screenName(); ?></span>
							<span class="text-secondary text-small">
							<?php
							if ($user->logged > 0) {
								$logged = new Typecho_Date($user->logged);
								_e('最后登录: %s', $logged->word());
							}
							?>
							</span>
						</div>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php $options->adminUrl('index.php'); ?>">
						<span class="menu-title">后台首页</span>
						<i class="mdi mdi-television menu-icon"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php $options->adminUrl('write-post.php'); ?>">
						<span class="menu-title">撰写文章</span>
						<i class="mdi mdi-pencil menu-icon"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#manage_content" aria-expanded="false" aria-controls="manage_content">
						<span class="menu-title">内容管理</span>
						<i class="menu-arrow"></i>
						<i class="mdi mdi-book-open-page-variant menu-icon"></i>
					</a>
					<div class="collapse" id="manage_content">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('manage-posts.php'); ?>">文章管理</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('manage-comments.php'); ?>">评论管理</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('manage-categories.php'); ?>">分类管理</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('manage-tags.php'); ?>">标签管理</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('manage-medias.php'); ?>">文件管理</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('write-page.php'); ?>">创建页面</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('manage-pages.php'); ?>">页面管理</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php $options->adminUrl('profile.php'); ?>">
						<span class="menu-title">个人中心</span>
						<i class="mdi mdi-account menu-icon"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php $options->adminUrl('options-general.php'); ?>">
						<span class="menu-title">网站信息</span>
						<i class="mdi mdi-information-outline menu-icon"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php $options->adminUrl('themes.php'); ?>">
						<span class="menu-title">外观设置</span>
						<i class="mdi mdi-folder-image menu-icon"></i>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link collapsed" data-toggle="collapse" href="#option_settings" aria-expanded="false" aria-controls="option_settings">
						<span class="menu-title">其它设置</span>
						<i class="menu-arrow"></i>
						<i class="mdi mdi-settings menu-icon"></i>
					</a>
					<div class="collapse" id="option_settings" style="">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('plugins.php'); ?>">插件管理</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('options-reading.php'); ?>">阅读设置</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('options-permalink.php'); ?>">永久链接</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('options-discussion.php'); ?>">评论设置</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('manage-users.php'); ?>">用户管理</a></li>
							<li class="nav-item"> <a class="nav-link" href="<?php $options->adminUrl('backup.php'); ?>">数据备份</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item sidebar-actions">
					<span class="nav-link">
						<a href="<?php $options->siteUrl(); ?>" class="btn btn-block btn-lg btn-gradient-primary btn-rounded">进入前台</a>
						<a href="<?php $options->logoutUrl(); ?>" class="btn btn-block btn-lg btn-gradient-primary btn-rounded">退出登录</a>
						<div class="mt-4">
							<div class="border-bottom">
							</div>
							<ul class="gradient-bullet-list mt-4">
							<?php $version = Typecho_Cookie::get('__typecho_check_version'); ?>
								<li>当前版本：<?php echo $version['current']; ?></li>
							<?php if ($version && $version['available']): ?>
								<li>官方版本：<a href="<?php echo $version['link']; ?>"><?php echo $version['latest']; ?></a></li>
							<?php endif; ?>	
							</ul>
						</div>
					</span>
				</li>
			</ul>
		</nav>
		
<script>
$(document).ready(function () {
    var ul = $('#typecho-message ul'), cache = window.sessionStorage,
        html = cache ? cache.getItem('feed') : '',
        update = cache ? cache.getItem('update') : '';

    if (!!html) {
        ul.html(html);
    } else {
        html = '';
        $.get('<?php $options->index('/action/ajax?do=feed'); ?>', function (o) {
            for (var i = 0; i < o.length; i ++) {
                var item = o[i];
                html += '<li><span>' + item.date + '</span> <a href="' + item.link + '" target="_blank">' + item.title
                    + '</a></li>';
            }

            ul.html(html);
            cache.setItem('feed', html);
        }, 'json');
    }

    function applyUpdate(update) {
        if (update.available) {
            $('<div class="update-check message error"><p>'
                + '<?php _e('您当前使用的版本是 %s'); ?>'.replace('%s', update.current) + '<br />'
                + '<strong><a href="' + update.link + '" target="_blank">'
                + '<?php _e('官方最新版本是 %s'); ?>'.replace('%s', update.latest) + '</a></strong></p></div>')
            .insertAfter('.typecho-page-title').effect('highlight');
        }
    }

    if (!!update) {
        applyUpdate($.parseJSON(update));
    } else {
        $.get('<?php $options->index('/action/ajax?do=checkVersion'); ?>', function (o, status, resp) {
            applyUpdate(o);
            cache.setItem('update', resp.responseText);
        }, 'json');
    }
});

</script>