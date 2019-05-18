<?php
	if (!session_id()) @session_start();
	require_once '../php/formr/class.formr.php';
	require_once '../php/FlashMessages.php';
	require '../php/PHPMailer/PHPMailerAutoload.php';
	$form = new Formr();
	$form->required = 'prenom,nom,email';
	$msg = new \Plasticbrain\FlashMessages\FlashMessages();

	if ($form->submit()) {
		$admin_email = "isabelle.simon@forodhanihouse.com";
		$first_name = $form->post('prenom');
		$last_name = $form->post('nom');
		$email = $form->post('email','Email','valid_email');
		$telephone = $form->post('telephone');
		$message = $form->post('commentaire');

		$adults = $form->post('adultes', "Number of Adults", 'integer|greater_than[0]');
		$infants = $form->post('enfants', "Number of Children", 'integer');
		$arrival = $form->post('date_arrivee');
		$departure = $form->post('date_depart');
		if ($arrival != "") {
			$arrival = date('d/m/Y', $arrival);
		}		
		if ($departure != "") {
			$departure = date('d/m/Y', $departure);
		}

		if (!$form->errors()) {
			$to      = $email;
			$subject =  'Reservation by ' . $first_name . " " . $last_name;
			$message =  'First Name: ' . $first_name . "\r\n" .
			            'Last Name: ' . $last_name . "\r\n" .
			            'Email: ' . $email . "\r\n" .
			            'Telephone: ' . $telephone . "\r\n" .
			            'Adults: ' . $adults . "\r\n" .
			            'Children: ' . $infants . "\r\n" .
			            'Arrival: ' . $arrival . "\r\n" .
			            'Departure: ' . $departure . "\r\n" .
			            "Message: \r\n" .
			            $message;

			if ($form->post('store66') == "") {
				$mail = new PHPMailer;
				// $mail->IsSMTP();
				$mail->AddReplyTo($email, $first_name . " " . $last_name);
				$mail->SetFrom($admin_email);
				$mail->AddAddress($admin_email);
				$mail->Subject = $subject;
				$mail->Body = $message;
				$mail->Send();	
				$msg->success('Nous avons reçu votre réservation.');
			}			
			header('Location: '.$_SERVER['PHP_SELF']);
			exit;
		} 
	}
?>
<!DOCTYPE html>
<html lang="fr" class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Réservez votre séjour - Forodhani House</title>

	<link href="/assets/favicon.ico" type="image/x-icon" rel="icon"><link href="/assets/favicon.ico" type="image/x-icon" rel="shortcut icon"><meta name="robots" content="index,follow,all"><meta name="description" content=""><meta name="keywords" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">

	
	<link rel="stylesheet" type="text/css" href="/assets/owl.carousel.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="/assets/A.pikaday-package.css,q1423157385.pagespeed.cf.ftYionlt_a.css" media="all">
	<link rel="stylesheet" type="text/css" href="/assets/A.pikaday-responsive.css,q1423157385.pagespeed.cf.QP8LVJOtxm.css" media="all">
	<link rel="stylesheet" type="text/css" href="/assets/A.main.css,q1435908689.pagespeed.cf.1uj6cO9sud.css" media="all">

		<script type="text/javascript" async="" src="http://www.google-analytics.com/ga.js"></script><script type="text/javascript" src="/assets/modernizr.js.pagespeed.jm.jGkDgcABGh.js"></script>

		<!--[if lt IE 9]>
		<script type="text/javascript" src="/bower_components/respond/src/respond.js"></script>
		<![endif]-->

		<link rel="icon" href="/assets/favicon.png" type="image/png">
		<link rel="shortcut icon" href="/assets/favicon.ico" type="image/x-icon">

	</head>

	<body id="reservation" class="index langFr">

		
		<header class="block-header" role="banner">
			<div class="inner">
				
<div class="container">
	<div class="row">

		<h1 class="logo">
			<a href="/fr" title="Revenir à la page d&#39;accueil du site"><img src="/assets/logo-header.png" alt="Revenir à la page d&#39;accueil du site"></a>			<span class="site-name">Forodhani House</span>
		</h1>

		<nav class="navigation" role="navigation">

			<div id="menu_default" class="menu tree hover"><ul class="level_0"><li class="li_level_0 activites first"><a href="/fr/activities.html" class="a_level_0 link_activites"><span>Activités</span></a></li><li class="li_level_0 la_maison"><a href="/fr/la-maison.html" class="a_level_0 link_la_maison"><span>La maison</span></a></li><li class="li_level_0 l_archipel"><a href="/fr/l-archipel.html" class="a_level_0 link_l_archipel"><span>L’archipel</span></a></li><li class="li_level_0 contact active"><a href="/fr/contact.php" class="a_level_0 link_contact" title="Contact - rubrique active"><span>Contact</span></a></li><li class="li_level_0 informations"><a href="/fr/informations.html" class="a_level_0 link_informations"><span>Informations</span></a></li><li class="li_level_0 on_en_parle last"><a href="/fr/en-parle.html" class="a_level_0 link_on_en_parle"><span>On en parle</span></a></li></ul></div>
			<a href="javascript:void(0);" class="toggleNav" id="toggleNav" title="Ouvrir la navigation"><span><img src="/assets/main-nav-toggle.png" alt="Navigation"></span></a>

		</nav>

	</div>
</div>			</div>
		</header>

		

<div class="block-carousel singleItem noInfo">

	<div class="container">
		<div class="row">

			<div class="wrapper">
				<div class="viewport">

					<ul id="big-carousel" class="owl-carousel">
						<li class="item item-0"><img src="/assets/reservation_1.jpg" alt=""></li>
					</ul>
				</div>
			</div>

			<div id="big-carousel-controls" class="controls">

				<a href="javascript:void(0);" class="control prev" title="Voir l&#39;image précédente">
					<span><img src="/assets/carousel-nav-previous.png" alt="Image précédente"></span>
				</a>
				<a href="javascript:void(0);" class="control next" title="Voir l&#39;image suivante">
					<span><img src="/assets/carousel-nav-next.png" alt="Image suivante"></span>
				</a>

				<a href="javascript:void(0);" class="control info" title="Plus d&#39;informations sur cette image">
					<span><img src="/assets/carousel-nav-info.png" alt="Informations"></span>
				</a>
				<a href="javascript:void(0);" class="control infoclose" title="Ne plus voir l&#39;information sur cette image">
					<span><img src="/assets/carousel-nav-info-close.png" alt="Fermer l&#39;information"></span>
				</a>

				<a href="javascript:void(0);" class="control pause" title="Mettre le carrousel en pause" style="display: none;">
					<span><img src="/assets/carousel-nav-pause.png" alt="Pause"></span>
				</a>
				<a href="javascript:void(0);" class="control play" title="Mettre le carrousel en Lecture" style="display: inline;">
					<span><img src="/assets/carousel-nav-play.png" alt="Lecture"></span>
				</a>

			</div>

			<div id="big-carousel-caption" class="caption"></div>

		</div>
	</div>

</div>
		<main class="block-main" role="main">

			
				<div class="page-content">

					<div class="container">
						<div class="row">

							<div class="column column-3 main">

								
								
								
	<div class="block-form block-booking">

		<h2 class="page-title level-2"><span>Réservez</span></h2>

		<div class="intro">

			<?php
				if ($msg->hasMessages($msg::SUCCESS)) {
				  $msg->display();
				}
			?>

			<?php
				echo $form->messages();
			?>

			<p>Pour vérifier des disponibilités et réserver vos vacances, remplissez s’il vous plaît les champs ci-dessous et cliquez sur « envoyer » pour nous adresser votre message. Nous vous répondrons rapidement et vous recevrons à Lamu très bientôt !</p>

			<p class="required-fields">Les champs suivis d'un <span title="astérisque" class="asterisque">*</span> sont obligatoires.</p>

		</div>

		<form action="" id="reservation" class="form" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
			<fieldset class="fieldset">

				<legend class="page-title level-3"><span>Vos coordonnées</span></legend>

				<div class="fields">

					<div class="input text">
						<label for="ReservationPrenom">Prénom <span class="required" title="Ce champ est requis">*</span></label><input name="prenom" type="text" placeholder="Prénom" id="ReservationPrenom" required>											</div>

					<div class="input text">
						<label for="ReservationNom">Nom <span class="required" title="Ce champ est requis">*</span></label><input name="nom" type="text" placeholder="Nom" id="ReservationNom" required>											</div>

					<div class="input text">
						<label for="ReservationEmail">E-mail <span class="required" title="Ce champ est requis">*</span></label><input name="email" type="email" placeholder="E-mail" id="ReservationEmail" required>											</div>

					<div class="input text">
						<label for="ReservationTelephone">Téléphone</label><input name="telephone" type="text" placeholder="Téléphone" id="ReservationTelephone">					</div>

				</div>

			</fieldset>

			<fieldset class="fieldset">

				<legend class="page-title level-3"><span>Votre séjour</span></legend>

				<div class="fields">

					<div class="input text">
						<label for="ReservationAdultes">Adultes</label><input name="adultes" type="number" min="1" placeholder="Adultes" id="ReservationAdultes">											</div>

					<div class="input text">
						<label for="ReservationEnfants">Enfants</label><input name="enfants" type="number" min="0" placeholder="Enfants" id="ReservationEnfants">											</div>

					<div class="input text">
						<label for="ReservationDateArrivee">Arrivée</label><span class="pikaday-container"><input name="date_arrivee" type="hidden" placeholder="JJ/MM/AAAA" class="datepicker" id="ReservationDateArrivee"></span>											</div>

					<div class="input text">
						<label for="ReservationDateDepart">Départ</label><span class="pikaday-container"><input name="date_depart" type="hidden" placeholder="JJ/MM/AAAA" class="datepicker" id="ReservationDateDepart"></span>											</div>

					<div class="input textarea">
						<label for="ReservationCommentaire">Commentaire</label><textarea name="commentaire" cols="30" rows="6" id="ReservationCommentaire"></textarea>											</div>

					<input type="hidden" name="store66" />
				</div>

			</fieldset>

			<div class="validate">

				<a href="/fr/reservation.php" class="btn link cancel">annuler</a>
				<div class="submit"><input title="Adresser votre réservation" class="btn md" type="submit" value="Envoyer"></div>
			</div>

		</form>
	</div>
							</div>

							
<aside class="column column-1 aside">

	<div class="isBlock type-1 block-hot">
		<div class="outer">
			<div class="inner">

				<div class="page-title title level-3"><span>What's hot</span></div>

				<p>
					Ici c’est idéal pour se détendre, se reposer… siestes, mer, voiliers, soleil… mais il y a aussi des festivals, des courses de dhows spectaculaires… La culture est bien vivante à Lamu.
				</p>

										<p class="action"><a href="/fr/informations.html#1" class="btn sm"><span>Agenda</span></a></p>
				
			</div>
		</div>
	</div>

	<div class="isBlock type-2 block-contact">
		<div class="outer">
			<div class="inner">

				<div class="page-title title level-3"><span>Contact</span></div>

				<p>
					Besoin d’informations ?<br>
					Un conseil, de l’aide, les disponibilités ?<br>
					Envie de réserver ?<br>
					N’hésitez pas à nous solliciter !
				</p>

				<p class="action"><a href="/fr/contact.php" class="btn md"><span>Contactez-nous</span></a></p>

			</div>
		</div>
	</div>

	<div class="isBlock type-4 block-social">
		<div class="outer">
			<div class="inner">

				<div class="page-title title level-3"><span>Suivez-nous</span></div>

				

          <ul class="social-links">

              <li class="item item-1 facebook">
                  <a data-target="external" href="https://www.facebook.com/forodhanihouselamu" title="Aller sur Facebook (nouvelle fenêtre)"><span><img src="/assets/icon-social-facebook-01.png" alt="Facebook"></span></a>
              </li>

              <li class="item item-2 twitter">
                  <a data-target="external" href="https://twitter.com/ForodhaniHouse" title="Aller sur Twitter (nouvelle fenêtre)"><span><img src="/assets/icon-social-twitter-01.png" alt="Twitter"></span></a>
              </li>

              <li class="item item-3 google">
                  <a data-target="external" href="https://plus.google.com/113247796797259521159/posts" title="Aller sur Google+ (nouvelle fenêtre)"><span><img src="/assets/icon-social-google-01.png" alt="Google"></span></a>
              </li>

              <li class="item item-4 tripadvisor">
                  <a data-target="external" href="http://www.tripadvisor.fr/VacationRentalReview-g294208-d4886610-Forodhani_House_on_Shela_Beach_in_Lamu_Kenya-Lamu_Island_Coast_Province.html" title="Aller sur TripAdvisor (nouvelle fenêtre)"><span><img src="/assets/icon-social-tripadvisor-01.png" alt="TripAdvisor"></span></a>
              </li>

              <li class="item item-5 youtube">
                  <a data-target="external" href="https://www.youtube.com/user/lamuforodhani" title="Aller sur YouTube (nouvelle fenêtre)"><span><img src="/assets/icon-social-youtube-01.png" alt="YouTube"></span></a>
              </li>

              <li class="item item-5 instagram">
                  <a data-target="external" href="https://instagram.com/forodhanihouselamu/" title="Aller sur Instagram (nouvelle fenêtre)"><span><img src="/assets/icon-social-instagram-01.png" alt="Instagram"></span></a>
              </li>

          </ul>
			</div>
		</div>
	</div>

</aside>
						</div>
					</div>

				</div>

			
		</main>

		<footer class="block-footer" role="contentinfo">
			<div class="inner">

				

<div class="container">
	<div class="row">

		<div class="column column-5">

			<div class="wrapper">

				<div class="block block-1">
					<p class="copyright">
						Forodhani House, Shella Beach, Lamu, Kenya.
						<span>Copyright 2017 - Tout droits réservés / All right reserved.</span>
					</p>
				</div>

				<div class="block block-2">
					<div id="menu_footer" class="menu tree hover"><ul class="level_0"><li class="li_level_0 remerciements first"><a href="/fr/remerciements.html" class="a_level_0 link_remerciements"><span>Remerciements</span></a></li><li class="li_level_0 mentions_legales"><a href="/fr/mentions-legales.html" class="a_level_0 link_mentions_legales"><span>Mentions légales</span></a></li><li class="li_level_0 contact last"><a href="/fr/contact.php" class="a_level_0 link_contact"><span>Contact</span></a></li></ul></div>				</div>

			</div>

		</div>

	</div>
</div>
			</div>
		</footer>

		<div class="fixed-buttons">

			<a href="/fr/reservation.php" class="book" title="Faire une réservation"><span><img src="/assets/btn-book-bg-fr.png" alt="Réservez"></span></a>

			<ul class="languages">

				
				<li class="lang francais active">
					<a href="/fr/reservation.php" title="Français">fr</a>				</li>

			
				<li class="lang english">
					<a href="/reservation.php" title="English">en</a>				</li>

			
		</ul>

	</div>

	
	<script type="text/javascript" src="/assets/lib.js,q1434119458.pagespeed.jm.s335Z-N0fH.js"></script>
	<script type="text/javascript" src="/assets/script.js"></script>

				<script type="text/javascript">var _gaq=_gaq||[];_gaq.push(['_setAccount','UA-21426855-1']);_gaq.push(['_trackPageview']);(function(){var ga=document.createElement('script');ga.type='text/javascript';ga.async=true;ga.src=('https:'==document.location.protocol?'https://ssl':'http://www')+'.google-analytics.com/ga.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})();</script>
				
<script aria-hidden="true" type="application/x-lastpass" id="hiddenlpsubmitdiv" style="display: none;"></script><script>try{(function() { for(var lastpass_iter=0; lastpass_iter < document.forms.length; lastpass_iter++){ var lastpass_f = document.forms[lastpass_iter]; if(typeof(lastpass_f.lpsubmitorig2)=="undefined"){ lastpass_f.lpsubmitorig2 = lastpass_f.submit; if (typeof(lastpass_f.lpsubmitorig2)=='object'){ continue;}lastpass_f.submit = function(){ var form=this; var customEvent = document.createEvent("Event"); customEvent.initEvent("lpCustomEvent", true, true); var d = document.getElementById("hiddenlpsubmitdiv"); if (d) {for(var i = 0; i < document.forms.length; i++){ if(document.forms[i]==form){ if (typeof(d.innerText) != 'undefined') { d.innerText=i.toString(); } else { d.textContent=i.toString(); } } } d.dispatchEvent(customEvent); }form.lpsubmitorig2(); } } }})()}catch(e){}</script></body></html>