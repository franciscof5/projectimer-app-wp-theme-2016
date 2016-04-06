<!DOCTYPE html>
<html <?php//TODO:check what is -> language_attributes(); ?>>
	<!--TODO: why that? -> head profile="http://gmpg.org/xfn/11"-->
	<head>
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php echo bloginfo("title"); echo  " - "; echo bloginfo("description");//bp_page_title() ?></title>
		<?php do_action( 'bp_head' ) ?>
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css"  /> <!--TODO: verificar -> media="screen" -->
		<?php if ( function_exists( 'bp_sitewide_activity_feed_link' ) ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php _e('Site Wide Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_sitewide_activity_feed_link() ?>" />
		<?php endif; ?>
		<?php if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_user() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_displayed_user_fullname() ?> | <?php _e( 'Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_member_activity_feed_link() ?>" />
		<?php endif; ?>
		<?php if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_current_group_name() ?> | <?php _e( 'Group Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_group_activity_feed_link() ?>" />
		<?php endif; ?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', 'buddypress' ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', 'buddypress' ) ?>" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<!--link href='http://fonts.googleapis.com/css?family=Lilita+One' rel='stylesheet' type='text/css'-->
		<!-- Bootstrap (JS is on footer) -->
    	<!--link href="<?php bloginfo('stylesheet_directory'); ?>/bootstrap/bootstrap.min.css" rel="stylesheet"-->
		<?php wp_head(); ?>
	</head>

<?php //if (function_exists('mbj_notify_bar_display')) { mbj_notify_bar_display(); }?>
<?php //if (function_exists("activate_maintenance_mode")) { activate_maintenance_mode();} ?>

<body <?php body_class() ?> id="projectimer-theme">

		<?php do_action( 'bp_before_header' ) ?>
			<!--span id='linha-fundo<?php if (is_front_page()) echo "-home" ?>'></span-->
			<!--span id='linha-fundo'></span-->
		<?php //} ?>
		
		<div id="header" style="background-color:<?php echo get_user_meta(get_current_user_id(), 'background-color', true); ?>">
			<div id="header-content"></div>

				<div id="header-logo">
					<a title="Logo" href="<?php bloginfo('url'); ?>">
						<?php bloginfo("name"); ?>
					</a>
				</div>
				
				<?php if ( is_user_logged_in() ) { ?> 
					<div class="contem-icone">
						<a title="<?php _e("Focus", "sistema-pomodoros"); ?>" href="<?php bloginfo('url'); ?>/focus/" alt="Focalizador">
							<div href="" id="icone-foc">&nbsp;</div>
							<div class="icone-legenda"><?php _e("Focus", "sistema-pomodoros"); ?></div>
						</a>
					</div>
					
					<div class="contem-icone">
						<a title="<?php _e("Productivity gauges", "sistema-pomodoros"); ?>" href="<?php bloginfo('url'); ?>/coworkers/<?php  $current_user = wp_get_current_user(); echo $current_user->user_login  ?>">
							<div href="" id="icone-gauge">&nbsp;</div>
							<div class="icone-legenda"><?php _e("Productivity", "sistema-pomodoros"); ?></div>
						</a>
					</div>
					
					<div class="contem-icone">
						<a title="<?php _e("Coworkers", "sistema-pomodoros"); ?>" href="<?php bloginfo('url'); ?>/coworkers/" alt="Amigos">
							<div href="" id="icone-amigo">&nbsp;</div>
							<div class="icone-legenda"><?php _e("Coworkers", "sistema-pomodoros"); ?></div>
						</a>
					</div>
					<!--div class="contem-icone"><a title="Mural de pomodoros" href="<?php bloginfo('url'); ?>/mural/"><div href="" id="icone-mural">&nbsp;</div><div class="icone-legenda">Mural</span></a></div-->
					<!--a title="Prêmios" href="<?php bloginfo('url'); ?>/pontos/"><div href="" id="icone-pontos">&nbsp;</div></a-->
					<div class="contem-icone">
						<a title="<?php _e("Ranking", "sistema-pomodoros"); ?>" href="<?php bloginfo('url'); ?>/ranking/">
							<div href="" id="icone-rank">&nbsp;</div>
							<div class="icone-legenda"><?php _e("Ranking", "sistema-pomodoros"); ?></div>
						</a>
					</div>

					<div class="contem-icone">
						<a title="<?php _e("Calendar", "sistema-pomodoros"); ?>" href="<?php bloginfo('url'); ?>/calendar/">
							<div href="" id="icone-calend">&nbsp;</div>
							<div class="icone-legenda"><?php _e("Calendar", "sistema-pomodoros"); ?></div>
						</a>
					</div>
					<!--a title="Comunidades" href="<?php bloginfo('url'); ?>/groups/"><div href="" id="icone-balao">&nbsp;</div></a-->
				<?php } ?>
				<!--div class="contem-icone"><a title="Cronograma de entregas" href="<?php bloginfo('url'); ?>/calendar/"><div href="" id="icone-calend">&nbsp;</div><div class="icone-legenda">Entregas</div></a></div-->
				<?php  /* <div>
				$result = count_users(); echo $result['total_users']; ?>  membros <br />
				<?php $r = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts"); echo $r." pomodoros"; </div> */?> 

				<div id="header-right-buttons">
					<?php do_action('icl_language_selector'); ?>
					&nbsp;
					<?php if ( !is_user_logged_in() ) { ?> 
						<a title="<?php _e("Create an account", "sistema-pomodoros"); ?>" href="/register" class="btn btn-default" role="button"><?php _e("Register", "sistema-pomodoros"); ?></a>
						<a title="<?php _e("Login", "sistema-pomodoros"); ?>" id="login_login" tabindex="1" class="btn btn-default" role="button" href="#"><?php _e("Login", "sistema-pomodoros"); ?></a>
					<?php } else { ?> 
						<a title="<?php _e("Logout", "sistema-pomodoros"); ?>" href="<?php echo wp_logout_url(); ?>" class="btn btn-default" role="button"><?php _e("Logout", "sistema-pomodoros"); ?></a>
						<a title="<?php _e("Settings", "sistema-pomodoros"); ?>" id="settings_button" href="#" class="btn btn-default btn-img" role="button" style="padding: 1px 20px 0 20px;"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/settings-icon.png" style="margin-top:1px;" /></a>
						<!--button  title="Acessar sua conta" id="login_login" tabindex="1" />Entrar</button>
						<a title="Criar uma conta Pomodoros.com.br" href="/register"><button>Registre-se</button></a>						
					
						<button title="Configurar" id="settings_button"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/settings-icon.png" /></button>
						<a title="Desconectar-se" href="<?php echo wp_logout_url(); ?>"><button>Sair</button></a-->
					<?php } 
					//TODO: TOUR IDEIA - VOCE SABIA QUE O POMODOROS.COM.BR É FEITO COM POMODOROS.COM.BR - Aqui todos os colaboradores e fornecedores utilizam o sistema. Nós fazemos o pomodoros usando o pomodoros. Perguntamos para Francisco Matelli, programador do sistema, como era usar a ferramenta. "Do ponto de vista técnico é muito interessante, levando em conta que é uma aplicaćão na nuvem, enquanto estamos programando melhorias para a nova versão, usamos a versão antiga. Depois que a versão na nuvem é atualizada, basta atualizar o navegador e comećamos a trabalhar com a última versão do sistema. O grande segredo, e também grande dificuldade, é fazer essa transićão ser imperceptível para o usuário, não se pode perder nenhuma informaćão durante essas atualizaćões. Por isso que temos sempre duas versões do sistema rolando. Temos até uma terceira versão, porém não posso falar sobre esse projeto nesse momento."
					//<!--a title="Como usar o site Pomodoros.com.br!" href="#"><button>Tour</button></a-->
					?> 					
				</div>

		</div><!-- #header -->

		<div id="loginlogbox">
			<?php wp_login_form(); ?>
			<div style="margin-top:-10px;">
				<?php do_action( 'bp_after_sidebar_login_form' ); ?>
			</div>
		</div>

		<div id="projectimer_settingsbox">
			<span class="button_close"><a href="#">X</a></span>
			<?php do_action( 'projectimer_show_setting_box' ); ?>
		</div>

		<?php do_action( 'bp_header' ); ?>
		<?php do_action( 'bp_after_header' ); ?>
		<?php do_action( 'bp_before_container' ); ?>