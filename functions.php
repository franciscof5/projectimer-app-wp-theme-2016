<?php
//JUST FOR TESTS
/*function reset_configurations () {
	delete_user_meta(get_current_user_id(), "pomodoroAtivo");
}
*/

add_action('init', 'theme_scripts');

function theme_scripts() {
	wp_enqueue_script("theme-scripts", get_bloginfo("template_directory")."/theme-scripts.js");
	wp_enqueue_script("jquery-color", get_bloginfo("template_directory")."/jquery.color-2.1.2.min.js");
	//NOT TESTED wp_enqueue_script("theme-scripts", get_bloginfo("template_directory")."/bootstrap/bootstrap.js");
	//var_dump(wp_enqueue_script("sistema-pomodoros-js"));die;
}

/**/
add_filter('show_admin_bar', '__return_false'); 
/**/

add_action( 'login_form_middle', 'add_lost_password_link' );
function add_lost_password_link() {
    return '<a href="/wp-login.php?action=lostpassword">Esqueci a senha!</a>';
}

/**/
add_action('wp_logout','go_home');

function go_home(){
  wp_redirect( home_url() );
  exit();
}


/*SESSION PARA NAO PERDER DADOS DO FORMULARIO*/
add_action('init', 'myStartSession', 1);
add_action('wp_logout', 'myEndSession');
add_action('wp_login', 'myEndSession');

function myStartSession() {
    if(!session_id()) {
        session_start();
        
    }
 
}

function myEndSession() {
    session_destroy ();
}

/**/
/*add_action('after_setup_theme', 'sistema_pomodoros_setup');
function sistema_pomodoros_setup(){
    var_dump(load_theme_textdomain('sistema_pomodoros', get_template_directory() . '/languages'));die();
    //FALSE, it dont loading nothing
}*/

/*
function buddypack_add_custom_header_support() {
	define( 'HEADER_TEXTCOLOR', 'FFFFFF' );
	define( 'HEADER_IMAGE', '%s/_inc/images/darwin-sample-x.gif' ); // %s is theme dir uri
	define( 'HEADER_IMAGE_WIDTH', 1250 );
	define( 'HEADER_IMAGE_HEIGHT', 125 );

	function buddypack_header_style() { ?>
		<style type="text/css">
			#header { background-image: url(<?php header_image() ?>); }
			<?php if ( 'blank' == get_header_textcolor() ) { ?>
			#header h1, #header #desc { display: none; }
			<?php } else { ?>
			#header h1 a, #desc { color:#<?php header_textcolor() ?>; }
			<?php } ?>
		</style>
	<?php
	}

	function buddypack_admin_header_style() { ?>
		<style type="text/css">
			#headimg {
				position: relative;
				color: #fff;
				background: url(<?php header_image() ?>);
				-moz-border-radius-bottomleft: 6px;
				-webkit-border-bottom-left-radius: 6px;
				-moz-border-radius-bottomright: 6px;
				-webkit-border-bottom-right-radius: 6px;
				margin-bottom: 20px;
				height: 100px;
				padding-top: 25px;
			}

			#headimg h1{
				position: absolute;
				bottom: 15px;
				left: 15px;
				width: 44%;
				margin: 0;
				font-family: Arial, Tahoma, sans-serif;
			}
			#headimg h1 a{
				color:#<?php header_textcolor() ?>;
				text-decoration: none;
				border-bottom: none;
			}
			#headimg #desc{

				color:#<?php header_textcolor() ?>;
				font-size:1em;
				margin-top:-0.5em;
			}

			#desc {
				display: none;
			}

			<?php if ( 'blank' == get_header_textcolor() ) { ?>
			#headimg h1, #headimg #desc {
				display: none;
			}
			#headimg h1 a, #headimg #desc {
				color:#<?php echo HEADER_TEXTCOLOR ?>;
			}
			<?php } ?>
		</style>
	<?php
	}
	add_custom_image_header( 'buddypack_header_style', 'buddypack_admin_header_style' );
}*/
/**/


/*
add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
	//is_author() if (!is_admin() ) { - if(!current_user_can('administrator')) { if ($user_level < 5) {
	get_currentuserinfo();
	if(!current_user_can('administrator')) {
		remove_menu_page('link-manager.php');
		remove_menu_page('themes.php');
		remove_menu_page('index.php');
		remove_menu_page('tools.php');
		remove_menu_page('profile.php');
		remove_menu_page('upload.php');
		remove_menu_page('post.php');
		remove_menu_page('post-new.php');
		remove_menu_page('edit-comments.php');
		remove_menu_page('admin.php');
		remove_menu_page('edit-comments.php');
		remove_submenu_page( 'edit.php', 'post-new.php' );
		remove_submenu_page( 'tools.php', 'wp-cumulus.php' );
		
		 remove_meta_box('linktargetdiv', 'link', 'normal');
		  remove_meta_box('linkxfndiv', 'link', 'normal');
		  remove_meta_box('linkadvanceddiv', 'link', 'normal');
		  remove_meta_box('postexcerpt', 'post', 'normal');
		  remove_meta_box('trackbacksdiv', 'post', 'normal');
		  remove_meta_box('commentstatusdiv', 'post', 'normal');
		  remove_meta_box('postcustom', 'post', 'normal');
		  remove_meta_box('commentstatusdiv', 'post', 'normal');
		  remove_meta_box('commentsdiv', 'post', 'normal');
		  remove_meta_box('revisionsdiv', 'post', 'normal');
		  remove_meta_box('authordiv', 'post', 'normal');
		  remove_meta_box('sqpt-meta-tags', 'post', 'normal');
		  remove_meta_box('submitdiv', 'post', 'normal');
		  remove_meta_box('avhec_catgroupdiv', 'post', 'normal');
		  remove_meta_box('categorydiv', 'post', 'normal');
	}
}

function edit_admin_menus() {  
    global $menu;  
    $menu[5][0] = 'Pomodoros'; // Change Posts to Pomodoros
}  
add_action( 'admin_menu', 'edit_admin_menus' ); */


/*
function save_progress () {
	//http://codex.wordpress.org/Function_Reference/get_current_user_id
	//http://codex.wordpress.org/Function_Reference/get_currentuserinfo
	
	//global $wpdb; // this is how you get access to the database
	//$foi = $wpdb->insert( "wp_usermeta", array( 'umeta_id' => 'NULL', 'user_id' => 2, 'meta_key' => "pomodoro_completed", 'meta_value' => "delete teste" ));	
	
	//$mysqldate = date('Y-m-d H:i:s', $phpdate);
	//$phpdate = strtotime($mysqldate);
	//$foi1 = add_user_meta(get_current_user_id(), "point_date", date("Y-m-d H:i:s"));
	//$foi2 = add_user_meta(get_current_user_id(), "point_desc", $_POST['descri']);
	
	//DONT NEED SECONDS $pomo_completed = date("Y-m-d H:i:s")."|".$_POST['descri'];
	$pomo_completed = date("Y-m-d H:i")."|".$_POST['descri'];
	$save_progress = add_user_meta(get_current_user_id(), "pomodoro_completed", $pomo_completed);
	if($save_progress) {
		echo "true";
	} else {
		echo "false";
	}
	
	$tagsinput = explode(" ", $_POST['post_tags']);
	
	$my_post = array(
		'post_title' => $_POST['post_titulo'],
		'post_content' => $_POST['post_descri'],
		'post_status' => $_POST['post_priv'],
		'post_category' => array(1, $_POST['post_cat']),
		'post_author' => $current_user->ID,
		'tags_input' => array($_POST['post_tags'])
		//'post_category' => array(0)
	);
	wp_insert_post( $my_post );
	
	die(); 
	//$whatever = $_POST['whatever'];
	//$whatever += 10;
	//echo $whatever;
	
	/*$save_query = $wpdb->insert( $wpdb->usermeta, array(
            'option_name',
            'new_option_key',
            'option_value' => 'New Option Value',
            'autoload' => 'yes' )
        );*/
	//$myrows = $wpdb->get_row("SELECT user_nicename FROM wp_users WHERE id=2");
        //$mylink = $wpdb->get_row("SELECT * FROM $wpdb->links WHERE link_id = 8");
	//$mylink = $wpdb->get_row("SELECT * FROM wp_links WHERE link_id = 8");
	
	/*
	FUNCIONA DESCOMENTA ACIMA

	$mylink = $wpdb->query("SELECT * FROM wp_users WHERE ID=20 ");
	//$mylink = $wpdb->get_row("SELECT * FROM wp_users");
	echo $mylink; // prints "10"
	//echo $mylink['link_id']; // prints "10"
	//echo " -> fechado";
	*/
	
	// this is required to return a proper result	
	//$date = date('Y-m-d H:i:s'); 

	/*$save_query = $wpdb->insert( $wpdb->usermeta, array(
		    'option_name',
		    'new_option_key',
		    'option_value' => 'New Option Value',
		    'autoload' => 'yes' )
		    );
	
	if($save_query)
	echo "Pomodoro salvado com sucesso";
	else
	echo "Erro ao salvar pomodoro! Você está conectado a internet?";
	//echo "<script>alert('Pomodoro salvado com sucesso')</script>";
	//echo "Pomodoro salvado com sucesso";
	//}

	//add_action('wp_ajax_my_action', 'my_action_callback');
	//	echo  "php ready";
}
add_action('wp_ajax_save_progress', 'save_progress');
add_action('wp_ajax_nopriv_save_progress', 'save_progress');

//
//update_user_meta(get_current_user_id(), "pomodoroAtivo", 9823);
//echo delete_user_meta(get_current_user_id(), "pomodoroAtivo");
//echo get_user_meta(get_current_user_id(), "pomodoroAtivo", true); 
function load_pomo () {
	//checa se já existe um rascunho, caso não cria o primeiro
	$pomodoroAtivo = get_user_meta(get_current_user_id(), "pomodoroAtivo", true);
	
	if($pomodoroAtivo=="") {
		
		//If there is no active post, look for any type of post, for the current user
		$args = array(
			'author' => get_current_user_id(),
			'posts_per_page' => 1
		);
		$any_post = get_posts($args);
		

		//$res = get_post($pomodoroAtivo);
		//var_dump($res);
		if (count($any_post)==0) {
			echo "É a sua primeira visita? Configurei uma tarefa como exemplo abaixo! $^$ Organizar ambiente$^$ projeto-organizacao$^$ Organizar mesa e gaveta, arquivar papéis do ano passado. Nessa área você pode escrever mais detalhes da tarefa. Uma curiosidade, organizar o ambiente é a tarefa número 1 de quem usa o Pomodoros.com.br pela primeira vez $^$ ".date("Y-m-d H:i:s")."$^$ $^$ $^$ ";
			//echo "É a sua primeira visita? Vou configurar um pomodoro como exemplo"
			//echo "Houve um problema ao carregar seu pomodoro ativo! É sua primeira visita? $^$ $^$ $^$ $^$ ";
			//O $^$ é o separador, para (FALA DA FOCA, TITULO, PROJETO, DESCRICAO)
			
		} else {
			foreach ($any_post as $post) {
				echo "Carreguei sua última tarefa, basta acionar o botão FOCAR! e arregaçar as mangas."."$^$ ".$post->post_title."$^$ ".$tags[0]->name."$^$ ".$post->post_content."$^$ ".$post->post_date."$^$ ".$post->post_status."$^$ ".$post->ID."$^$ ".$secs;
			}
		}
	} else {
		//O cara já tem um pomodoroAtivo, só carregar	
		//$res = get_posts($args);
		$post = get_post($pomodoroAtivo);
		$tags = wp_get_post_tags($post->ID);

		//$focusTime = get_user_meta(get_current_user_id(), "focusTime", true);
		/*$start_date = new DateTime(get_the_time('Y-m-d H:i:s'));
		$since_start = $start_date->diff(new DateTime($post->post_date_gmt));
		echo $since_start;
		echo $secs = $since_start->days * 24 * 60;
		$secs += $since_start->h * 60;
		$secs += $since_start->i * 60;
		//$secs += $since_start->s;
		//$secs = $focusTime-$secs;
		//echo $secs;
		
		//if($post->post_status=="pending") {
		$post->post_date;
		//echo " i ".date("Y-m-d H:i:s");//, strtotime('+25 minutes')
		$timeFirst  = strtotime($post->post_date);
		//echo " i ";
		$timeSecond = strtotime(date("Y-m-d H:i:s"));
		
		//echo " S:";
		$secs = ($timeSecond - $timeFirst);

		//$date = new DateTime( $post->post_date_gmt );
		//$date2 = new DateTime( "2014-01-13 04:29:10" );
		//echo " s2:".$diffInSeconds = $date2->getTimestamp() - $date->getTimestamp();
		//$secs = 1000;
		//} 
		echo "Carreguei sua última tarefa, basta acionar o botão FOCAR! e arregaçar as mangas."."$^$ ".$post->post_title."$^$ ".$tags[0]->name."$^$ ".$post->post_content."$^$ ".$post->post_date."$^$ ".$post->post_status."$^$ ".$post->ID."$^$ ".$secs;
		//}
	}

	//} else {
	//	//O cara ainda não tem pomodoroAtivo
	//	echo "É a sua primeira visita? Configurei uma tarefa como exemplo abaixo! $^$ Organizar ambiente$^$ projeto-organizacao$^$ Organizar mesa e gaveta, arquivar papéis do ano passado. Nessa área você pode escrever mais detalhes da tarefa. Uma curiosidade, organizar o ambiente é a tarefa número 1 de quem usa o Pomodoros.com.br pela primeira vez $^$ ";
	//}/
	//echo "META[pomodoativo]:".$reqweasdasd.get_current_user_id();
}
add_action('wp_ajax_load_pomo', 'load_pomo');
add_action('wp_ajax_nopriv_load_pomo', 'load_pomo');
//date_default_timezone_set("Europe/London");
//date_default_timezone_set("Brazil/East");

//
function update_pomo () {
	//echo "update_pomo";
	$tagsinput = explode(" ", $_POST['post_tags']);
	//$pomodoroAtivo = get_user_meta(get_current_user_id(), "pomodoroAtivo", true);
	$agora = date("Y-m-d H:i:s");
	/*$my_post = array(
		'post_title' => $_POST['post_titulo'],
		'post_content' => $_POST['post_descri'],
		'post_category' => array(1, $_POST['post_cat']),
		'post_author' => get_current_user_id(),
		'tags_input' => array($_POST['post_tags']),
		'post_status' => "draft",
		'edit_date' => true
		//'post_date' => $agora
		//'post_date' => $_POST["post_data"]
		//'post_category' => array(0)
	);//
	
	//echo ':::'.$_POST['post_pomodoro_rolando'];
	
	if($_POST['ignora_data']) {
		echo "com o pomodoro rolando. ";
		/*$my_post["post_status"] => "pending"; //gambiarra, está sobrescrevendo os pendings
		$my_post["post_data"] => $_POST["post_data"];
		$my_post["edit_date"] => true;//*
		//$my_post["post_date"] => false;
		$my_post = array(
			'post_title' => $_POST['post_titulo'],
			'post_content' => $_POST['post_descri'],
			'post_category' => array(1, $_POST['post_cat']),
			'post_author' => get_current_user_id(),
			'tags_input' => array($_POST['post_tags']),
			'post_status' => "pending",
			'edit_date' => true,
			//'post_date' => $agora
			'post_date' => $_POST["post_data"]
			//'post_category' => array(0)
		);
		//array_push($my_post, array('post_date' => $_POST["post_data"]));
	} else {
		echo "com o relógio parado. ";
		$my_post = array(
			'post_title' => $_POST['post_titulo'],
			'post_content' => $_POST['post_descri'],
			'post_category' => array(1, $_POST['post_cat']),
			'post_author' => get_current_user_id(),
			'tags_input' => array($_POST['post_tags']),
			'post_status' => "draft",
			'edit_date' => true,
			'post_date' => $agora
			//'post_date' => $_POST["post_data"]
			//'post_category' => array(0)
		);
		//$my_post["post_data"] => $agora;
		//array_push($my_post, array('post_date' => $agora));
	}
	if($_POST["post_status"]!="") {
		$my_post["post_status"] = $_POST["post_status"];
	}
	//var_dump($my_post);
	/*$my_post["edit_date"] => true;
	$my_post["post_data"] => $dataX;*/
	
	/*if($_POST["post_status"]) {
		$dataPomodoroSeraCompletado = date("Y-m-d H:i:s");//, strtotime('+25 minutes')
		echo $dataPomodoroSeraCompletado;//die;
		//If the pomodoro is being activated or deactivated
		//$my_post["post_status"] => "future";
		$my_post["post_date_gmt"] => $dataPomodoroSeraCompletado;
		$my_post["post_status"] => "pending";
		//$my_post["post_status"] => "future";
	} else {
		$my_post["post_status"] => "draft";
	}//*
	//$my_post->edit_date = true;
	//var_dump($my_post);
	//echo $_POST['post_id'];die;
	$pomodoroAtivo = get_user_meta(get_current_user_id(), "pomodoroAtivo", true);

	if($pomodoroAtivo=="") {
		//Não tem pomodoro ativo
		$save_progress = wp_insert_post( $my_post );
		update_user_meta(get_current_user_id(), "pomodoroAtivo", $save_progress);
		$pomodoroAtivo = $save_progress;
		echo "Salvando pela primeira vez.";
	} else {
		//Atualiza o pomodoro ativo
		$my_post["ID"] = $pomodoroAtivo;
		$save_progress = wp_update_post( $my_post );
		echo "Atualizando seu pomodoro ativo.";
		//SO USADA PARA TESTES
		//update_user_meta(get_current_user_id(), "pomodoroAtivo", $save_progress);
	}

	//RETORNANDO VALORES
	/*if($_POST["post_status"]!="") {
		echo "$^$ ".$_POST["post_status"];
	} else {
		echo "$^$ draft";
	}//*
	$post_atual_pega_data = get_post($pomodoroAtivo);
	echo "$^$ ".$post_atual_pega_data->post_status."$^$ ".$post_atual_pega_data->post_date;
	/*if($save_progress) {
		echo " Inseriu item";
	} else {
		echo " Não inseriu";
	}//*
	
}
add_action('wp_ajax_update_pomo', 'update_pomo');
add_action('wp_ajax_nopriv_update_pomo', 'update_pomo');

//

function save_modelnow () {
	if(isset($_POST['post_para_deletar'])) {
		wp_delete_post($_POST['post_para_deletar']);
		//echo "Arriba amigos";
	} else {
		$tagsinput = explode(" ", $_POST['post_tags']);	
		$my_post = array(
			'post_title' => $_POST['post_titulo'],
			'post_content' => $_POST['post_descri'],
			'post_status' => "pending",
			'post_author' => $current_user->ID,
			'tags_input' => array($_POST['post_tags'])
		);
		$idofpost = wp_insert_post( $my_post );
		echo $idofpost;
		die();
	}
}
add_action('wp_ajax_save_modelnow', 'save_modelnow');
add_action('wp_ajax_nopriv_save_modelnow', 'save_modelnow');

/**/

	/*register_sidebar( array(
		'name' => __( 'pomodoros'),
		'id' => 'pomodoros',
		'description' => __( 'Sidebar pomodoros'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'geral'),
		'id' => 'geral',
		'description' => __( 'Sidebar geral'),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/




?>