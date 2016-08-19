<?php if($_GET["link"]) header("location:".base64_decode($_GET["link"]));?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<?php wp_head();?>
<link type="image/vnd.microsoft.icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" rel="shortcut icon">
<meta name="keywords" content="siinger">
<meta name="description" content="<?php bloginfo('description'); ?>">
<link href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" rel="stylesheet"/>
<!--[if lt IE 9]>
<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?1ebe8260eeabd8b66a27a409d3156375";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
<link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div id="main" class="animated fadeIn">
<div class="pjax">
<header id="header">
<div class="logo">
	<a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/favicon.ico"/><?php bloginfo('name'); ?></a>
	<p class="description"><?php bloginfo('description'); ?></p>
</div>
<div class="social-links">
	<ul>
		<?php if(get_the_author_meta('github',1)){ ?>
			<li><a href="<?php the_author_meta('github',1);?>" target="_blank"><i class="fa fa-github"></i></a></li>
		<?php };?>
		<?php if(get_the_author_meta('weibo',1)){ ?>
			<li><a href="<?php the_author_meta('weibo',1);?>" target="_blank"><i class="fa fa-weibo"></i></a></li>
		<?php };?>
		<?php if(get_the_author_meta('twitter',1)){ ?>
			<li><a href="<?php the_author_meta('twitter',1);?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<?php };?>
</ul>
</div>
</header>
<section id="slide">
<?php if ((is_single()||is_page())&&has_post_thumbnail()) { ?>
		<img src="<?php
		$full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full');
		echo $full_image_url[0];
		?>?imageView2/0/w/1560/interlace/1" /></li>
<?php } else { ?>
		<img src="https://hd.unsplash.com/uploads/14108632958755ac7f7f3/fe4a5cbf"/></li>
<?php }  ?>
</section>	
	<section class="blockGroup container">
		<?php if (is_single()||is_page()) { ?>
			<?php if (is_single()) { ?>
				<h2 itemprop="name headline" class="title"><?php the_title();?></h2>
				<div class="p_time"><i class="fa fa-sun-o"></i>&nbsp;&nbsp;<?php the_time('Y-m-d') ?><i class="fa fa-empire"></i>&nbsp;&nbsp;<?php the_category(); ?></div>				
			<?php }; ?>
			<?php setPostViews(get_the_ID()); ?>
			<article class="post single" itemscope itemtype="http://schema.org/BlogPosting">
				<?php if (have_posts()) { while (have_posts()) {
					the_post();
					the_content();
				} }; ?>
				<div class="meta">
					<p>— 于 <?php the_time('Y年m月d') ?> ，共写了 <?php echo count_words(get_the_content())?> 字；</p>
					<p>— 本文共有 <?php echo count(get_the_tags(),0);?> 个标签：<?php the_tags(); ?></p>
				</div>
			</article>
			<section class="ending">
				<?php if(get_the_author_meta('weibo')||get_the_author_meta('twitter')||get_the_author_meta('github')){ ?>
				<ul class="sns">
					<?php if(get_the_author_meta('weibo')){ ?>
					<li class="weibo"><a href="<?php the_author_meta('weibo');?>" target="_blank"><i class="fa fa-weibo"></i></a></li>
					<?php }; if(get_the_author_meta('github')){ ?>
					<li class="github"><a href="<?php the_author_meta('github');?>" target="_blank"><i class="fa fa-github"></i></a></li>
					<?php }; if(get_the_author_meta('twitter')){ ?>
						<li class="twitter"><a href="<?php the_author_meta('twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
					<?php };?>
				</ul>
				<?php };?>
				<div class="about">
					<a><?php echo get_avatar(get_the_author_email(),'80');?></a>
					<span><?php the_author_meta('description');?></span>
				</div>
			</section>        
		<?php comments_template(); }
		else { if (have_posts()):while (have_posts()): the_post() ?>
            <article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
                <h2 itemprop="name headline" class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>                
                <p><?php echo mb_strimwidth(strip_shortcodes(strip_tags(apply_filters('the_content', $post->post_content))), 0, 430,"...");?></p>
				<div class="p_time"><i class="fa fa-sun-o"></i>&nbsp;&nbsp;<?php the_time('Y-m-d') ?><i class="fa fa-empire"></i>&nbsp;&nbsp;<?php the_category(); ?></div>
            </article>
            <div class="clearer"></div>
		<?php endwhile;endif; };?>
	</section>
	<div class="clearer"></div>
	<nav class="navigator">
        <?php previous_posts_link('<i class="fa fa-angle-left"></i>') ?><?php next_posts_link('<i class="fa fa-angle-right	"></i>') ?>
	</nav>
</div>
</div>

<div class="clearer"></div>
<footer id="footer">
<section class="links_adlink">
<?php wp_nav_menu(array('theme_location' => 'header_nav', 'echo' => true)); ?>
</section>
<div class="copyright"><a target="_blank" href="http://siinger.com">Theme by Singer, </a><a target="_blank" href="http://www.wordpress.cn">Proudly published with Wordpress</a></div>
<div class="heart">念念不忘，必有回响</div>
</footer>
<script type='text/javascript' src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.min.js"></script>
<?php wp_footer();if(get_the_author_meta('my_code')) echo "<div style=\"display:none\">".get_the_author_meta('my_code')."</div>\n";
echo "<script style=\"display:none\">\nfunction index_overloaded(){\n".get_the_author_meta('ol_code')."\n}\n</script>\n"?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/prettify.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/functions.js"></script>
</body>
</html>