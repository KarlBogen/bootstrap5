<?php
/* ------------------------------------------------------------
	Module "Bootstrap 5 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

if (isset($_GET["language"])) $lang = $_GET["language"];
if (isset($_GET["bs5_tpl"])) $bs5_tpl = $_GET["bs5_tpl"];
$css_path = $bs5_tpl . '/css/';
$js_path = $bs5_tpl . '/javascript/';
$css_file = 'includes/bs5_template_manager/css/bootstrap.min.css';
if (file_exists($css_file))	$time = filemtime($css_file);

?>

<!doctype html>
<html lang="de">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv=”Pragma” content=”no-cache”>
	<meta http-equiv=”Expires” content=”0″>
	<meta http-equiv=”CACHE-CONTROL” content=”no-cache”>

	<title>Starter Template for Bootstrap</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo $css_path; ?>admindemo/bootstrap.min.css<?php echo '?' . $time; ?>" rel="stylesheet">
	<link href="<?php echo $css_path; ?>bs5_awesome.min.css" rel="stylesheet">
	<link href="<?php echo $css_path; ?>bs5.css<?php echo '?' . $time; ?>" rel="stylesheet">

	<style>
		body {
			overflow: hidden;
		}
/*
		#main.navbar-nav>li.kk-mega {
			position: static;
		}

		.dropdown-menu.kk-mega ul {
			display: inherit;
			list-style: outside none none;
			padding: 0;
		}

		.kk-mega>li>a:hover {
			text-decoration: none;
		}

		ul.dropdown-menu.kk-mega {
			left: -2px !important;
			padding: 8px;
			right: -2px !important;
			width: auto;
		}

		li.kk-mega.level2 {
			margin-bottom: 30px;
		}

		li.kk-mega.level2>a {
			font-weight: bold;
		}

		.kk-mega>li>a {
			clear: both;
			display: block;
			font-weight: 400;
			line-height: 1.42857;
			padding: 3px 20px;
			white-space: nowrap;
		}

		.kk-mega>li {
			list-style: outside none none;
		}

		#main li.dropdown ul.dropdown-menu.kk-mega {
			display: -webkit-flex;
			-webkit-flex-wrap: wrap;
			display: flex;
			flex-wrap: wrap;
			top: auto;
			opacity: 0;
			visibility: hidden;
			-webkit-transition: all .5s ease-in-out;
			-moz-transition: all .5s ease-in-out;
			-o-transition: all .5s ease-in-out;
			-ms-transition: all 5.s ease-in-out;
			transition: all .5s ease-in-out;
		}

		#main li.dropdown:hover ul.dropdown-menu.kk-mega {
			opacity: 1;
			visibility: visible;
			-webkit-transition: all .5s ease-in-out;
			-moz-transition: all .5s ease-in-out;
			-o-transition: all .5s ease-in-out;
			-ms-transition: all 5.s ease-in-out;
			transition: all .5s ease-in-out;
		}

		li.kk-mega.level3>a:before {
			content: "\203A\00a0";
		}

		li.kk-mega.level4>a:before {
			content: "\203A\203A\00a0";
		}

		li.kk-mega.level5>a:before {
			content: "\203A\203A\203A\00a0";
		}

*/
	</style>
</head>

<body>
	<?php
	if ($lang == 'de') {
	?>
		<div id="container" class="border border-dark">
			<div id="top" class="top border-bottom border-light-subtle d-none d-sm-block py-2">
				<div class="d-flex justify-content-around w-100 py-3">
					<div class="text-nowrap"><i class="fa fa-user-group fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Beratung +49 00 00 / 00 00 00</div>
					<div class="text-nowrap d-none d-sm-block"><i class="fa fa-truck-fast fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Schnelle Lieferung</div>
					<div class="text-nowrap d-none d-md-block"><i class="fa fa-truck fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Kostenloser Versand - ab 50€</div>
					<div class="text-nowrap d-none d-lg-block"><i class="fa fa-rotate-left fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;30 Tage R&uuml;ckgaberecht</div>
				</div>
			</div>
			<div id="container1" class="container-xxl">
				<div id="logobar" class="row text-center text-md-start py-3">
					<a class="nav-logo col-12 col-md-3" href="#" title="Startseite • Testfirma">
						<img src="includes/bs5_template_manager/assets/img/logo_head.png" alt="Testfirma" width="235" height="75" class="img-fluid"></a>
					<div class="logos col-12 col-md-9 position-relative">
						<div class="row justify-content-end">
							<div class="search col-12 col-lg-8 position-relative">
								<form id="quick_find" action="#" method="get" class="box-search m-2">
									<div class="input-group">
										<select name="categories_id" class="form-select bg-body-tertiary" aria-label="Alle Kategorien" id="cat_search">
											<option value="" selected="selected">Alle</option>
											<option value="1">Testkategorie 1</option>
											<option value="2">Testkategorie 2</option>
											<option value="3">Testkategorie 3</option>
										</select>
										<input type="hidden" name="inc_subcat" value="1">
										<input type="text" name="keywords" placeholder="Suchen" id="inputString" class="form-control" aria-label="search keywords" maxlength="30" autocomplete="off">
										<button class="btn btn-outline-secondary text-secondary-emphasis search_button" id="inputStringSubmit" type="submit" title="Suchen"><span class="mx-3">Suchen</span></button>
									</div>
								</form>
							</div>
							<div class="suggestionsBox card" id="suggestions" style="display:none;">
								<div class="card-body px-2">
									<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
								</div>
							</div>
							<div class="nav col-12 justify-content-around justify-content-sm-end align-items-end">
								<div class="nav-item home">
									<a class="text-center nav-link" title="Startseite" href="#"><span class="icon"><i class="fa fa-house fa-lg"></i></span><span class="d-block small">Startseite</span></a>
								</div>
								<div class="nav-item">
									<button id="setbtn" class="text-center nav-link" title="Einstellungen" data-bs-toggle="offcanvas" data-bs-target="#settings" aria-controls="settings"><span class="icon"><i class="fa fa-gear fa-lg"></i></span><span class="d-block small">Einstellungen</span></button>
								</div>
								<div class="nav-item">
									<button id="login" class="text-center nav-link" title="Mein Konto" data-bs-toggle="offcanvas" data-bs-target="#account" aria-controls="account"><span class="icon"><i class="fa fa-user fa-lg"></i></span><span class="d-block small">Mein Konto</span></button>
								</div>
								<div class="nav-item wishlist text-center">
									<button id="toggle_wishlist" data-bs-toggle="offcanvas" data-bs-target="#canvas_wish" aria-controls="canvas_wish" class="nav-link" title="Merkzettel"><span class="icon"><i class="fa fa-heart fa-lg fa-fw" aria-hidden="true"></i></span><span class="d-block small">Merkzettel</span></button>
								</div>
								<div class="nav-item cart text-center">
									<button id="toggle_cart" data-bs-toggle="offcanvas" data-bs-target="#canvas_cart" aria-controls="canvas_cart" class="nav-link" title="Warenkorb"><span class="icon"><i class="fa fa-cart-shopping fa-lg fa-fw" aria-hidden="true"></i></span><span class="d-block small">Warenkorb</span></button>
								</div>
								<div class="nav-item">
									<button id="mmopener" class="text-center nav-link" title="Responsive Menü"><span class="icon"><i class="fa fa-bars fa-lg"></i></span><span class="d-block small">Menü</span></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<nav id="nav_container" class="container-fluid border-top border-bottom mb-3">
				<div id="navbar" class="container-xxl top2 navbar navbar-expand">
					<ul id="main" class="navbar-nav d-flex flex-wrap me-auto">
						<li class="nav-item home">
							<a class="nav-link" href="#" aria-label="home"><span class="fa fa-house fa-lg"></span></a>
						</li>
						<li id="li1" class="level1 nav-item kk-mega">
							<a class="nav-link" href="#" title="Testkategorie 1">Testkategorie 1</a>
						</li>
						<li id="li2" class="level1 active parent hassub dropdown nav-item kk-mega">
							<a class="nav-link active parent dropdown-toggle" href="#/" data-href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Testkategorie 2">Testkategorie 2 (aktiv)</a>
							<div class="row row-cols-3 dropdown-menu p-2 kk-mega">
								<div class="overview border-bottom w-100 pb-2 mb-2">
									<a class="btn btn-outline-secondary" href="#" title="Testkategorie 2">
										<span class="small">Alles anzeigen aus
										</span><strong>  Testkategorie 2</strong>
										<i class="fa fa-circle-right ms-3"></i></a>
								</div>
								<ul class="navbar-nav flex-column col" data-level="2">
									<li id="li5" class="level2 hassub nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.1"> Testkategorie 2.1</a>
									</li>
									<li id="li8" class="level3 nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.1.1">› Testkategorie 2.1.1</a>
									</li>
									<li id="li9" class="level3 hassub nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.1.2">› Testkategorie 2.1.2</a>
									</li>
									<li class="morecats my-2">
										<a href=""><span class="more">mehr anzeigen ...</span></a>
									</li>
									<li id="li24" class="level4 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.1.2.1">›› Testkategorie 2.1.2.1</a>
									</li>
									<li id="li25" class="level4 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.1.2.2">›› Testkategorie 2.1.2.2</a>
									</li>
								</ul>
								<ul class="navbar-nav flex-column col" data-level="2">
									<li id="li6" class="level2 hassub nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.2"> Testkategorie 2.2</a>
									</li>
									<li id="li10" class="level3 nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.2.1">› Testkategorie 2.2.1</a>
									</li>
									<li id="li11" class="level3 Selected active hassub nav-item kk-mega">
										<a class="nav-link py-1 Selected active" href="#" title="Testkategorie 2.2.2">› Testkategorie 2.2.2 (aktiv)</a>
									</li>
									<li class="morecats my-2">
										<a href=""><span class="more">mehr anzeigen ...</span></a>
									</li>
									<li id="li13" class="level4 hassub nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.2.2.1">›› Testkategorie 2.2.2.1</a>
									</li>
									<li id="li19" class="level5 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.2.2.1.1">››› Testkategorie 2.2.2.1.1</a>
									</li>
									<li id="li21" class="level5 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.2.2.1.2">››› Testkategorie 2.2.2.1.2</a>
									</li>
									<li id="li14" class="level4 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.2.2.2">›› Testkategorie 2.2.2.2</a>
									</li>
									<li id="li12" class="level3 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.2.3">› Testkategorie 2.2.3</a>
									</li>
								</ul>
								<ul class="navbar-nav flex-column col" data-level="2">
									<li id="li7" class="level2 nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.3"> Testkategorie 2.3</a>
									</li>
								</ul>
								<ul class="navbar-nav flex-column col" data-level="2">
									<li id="li26" class="level2 nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testkategorie 2.4"> Testkategorie 2.4</a>
									</li>
								</ul>
							</div>
						</li>
						<li id="li3" class="level1 nav-item kk-mega">
							<a class="nav-link" href="#" title="Testkategorie 3">Testkategorie 3</a>
						</li>
					</ul>
				</div>
			</nav>

			<div id="container2" class="container-xxl mb-4">
				<nav class="breadcrumb border-bottom" aria-label="breadcrumb">
					<ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
						<li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
							<a class="link-secondary" itemprop="item" href="#"><span itemprop="name">Startseite&nbsp;</span></a><meta itemprop="position" content="1">
						</li>
						<li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
							<a class="link-secondary" itemprop="item" href="#"><span itemprop="name">Katalog&nbsp;</span></a><meta itemprop="position" content="2">
						</li>
						<li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
							<meta itemprop="item" content="#"><span class="current" itemprop="name">Testkategorie 2</span><meta itemprop="position" content="3">
						</li>
					</ol>
				</nav>
				<div class="box_greeting homesite mb-5">
					<h1 class="border-bottom">Willkommen</h1>
					<div class="greeting_text">Herzlich willkommen <span class="greetUser">Gast!</span> Möchten Sie sich <a href="#">anmelden</a>? Oder wollen Sie ein <a href="#">Kundenkonto</a> eröffnen?<br><br>
						Dies ist die Standardinstallation der <span style="color:#B0347E;">mod</span><span style="color:#6D6D6D;">ified eCommerce Shopsoftware</span>. Alle dargestellten Produkte dienen zur Demonstration der Funktionsweise. Wenn Sie Produkte bestellen, so werden diese weder ausgeliefert, noch in Rechnung gestellt.<br>
						Der hier dargestellte Text kann im Adminbereich unter <b>Content Manager</b> - Eintrag Index bearbeitet werden.
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-6 mb-2">

						<div id="subcats" class="navbar">
							<div class="w-100 navbar-brand">Kategorien</div>
							<ul class="navbar-nav flex-column border-top w-100">
								<li class="level1 Selected active nav-item border-bottom">
									<a class="nav-link Selected active" href="#" title="Testkategorie 1">Testkategorie 1</a>
								</li>
								<li class="level1 hassub nav-item border-bottom">
									<a class="nav-link hstack" href="#" title="Testkategorie 2">Testkategorie 2<span class="fa fa-chevron-down ms-auto"></span></a>
								</li>
								<li class="level1 nav-item border-bottom">
									<a class="nav-link" href="#" title="Testkategorie 3">Testkategorie 3</a>
								</li>
							</ul>
						</div>
						<div class="box_login list-group list-group-flush my-4">
							<h5 class="list-group-item">Willkommen zurück!</h5>
							<div class="list-group-item">
								<div class="mb-2">
									<label for="email" class="form-label small">E-Mail-Adresse:</label>
									<input type="email" name="email_address" id="email" class="form-control" aria-label="email" autocomplete="email">
								</div>
								<div class="mb-3">
									<label for="pw" class="form-label small">Passwort:</label>
									<div class="input-group">
										<input type="password" name="password" id="pw" class="form-control" aria-label="password">
										<button class="togglePw btn btn-outline-secondary fa fa-eye px-3" type="button" aria-label="Passwort anzeigen"></button>
									</div>
								</div>
								<div class="d-grid mb-3">
									<button class="btn btn-secondary" type="submit" title="Anmelden"><span class="fa fa-arrow-right-to-bracket"></span><span class="mx-3">Anmelden</span></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 mb-2">
						<div class="mb-3">
							<button type="button" class="btn btn-primary btn-block my-1" data-bs-toggle="modal" data-bs-target="#modal">Modalbox &ouml;ffnen</button>
							<button type="button" class="btn btn-primary m-1">Primary</button>
							<button type="button" class="btn btn-secondary m-1">Secondary</button>
							<button type="button" class="btn btn-success m-1">Success</button>
							<button type="button" class="btn btn-danger m-1">Danger</button>
							<button type="button" class="btn btn-warning m-1">Warning</button>
							<button type="button" class="btn btn-info m-1">Info</button>
							<button type="button" class="btn btn-light m-1">Light</button>
							<button type="button" class="btn btn-dark m-1">Dark</button>
							<button type="button" class="btn btn-link m-1">Link</button>
							<button type="button" class="btn btn-outline-primary m-1">Outline-Primary</button>
							<button type="button" class="btn btn-outline-secondary m-1">Secondary</button>
							<button type="button" class="btn btn-outline-success m-1">Success</button>
							<button type="button" class="btn btn-outline-danger m-1">Danger</button>
							<button type="button" class="btn btn-outline-warning m-1">Warning</button>
							<button type="button" class="btn btn-outline-info m-1">Info</button>
							<button type="button" class="btn btn-outline-light m-1">Light</button>
							<button type="button" class="btn btn-outline-dark m-1">Dark</button>
						</div>
						<div class="card">
							<div class="card-body pb-2">
								<h4>List-Group innerhalb einer Card</h4>
							</div>
							<div class="list-group list-group-flush">
								<div class="list-group-item">
									<span class="float-end">
										<a href="#"><span class="btn btn-express btn-outline-secondary btn-sm"><span class="fa fa-cart-plus"></span></span></a>
										<a href="#"><span class="btn btn-incart btn-secondary btn-sm"><span class="fa fa-cart-shopping"></span></span></a>
									</span>
									<strong><a href="#">20.03.2019</a> / Bestell-Nr.: 48</strong><br />
									<strong>Betrag: </strong> 295,00 EUR<br />
									<strong>Status: </strong>Offen<br />
								</div>
							</div>
							<div class="card-body">
								<p><a href="#">Alle Bestellungen anzeigen</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="filter_pagination_bar my-3">
					<div id="filterBar" class="filter_bar card bg-custom p-2 mb-2 clearfix">
						<div class="sort_bar row row-cols-auto g-2 clearfix">
							<div class="col">
								<select class="form-select" name="filter_id" aria-label="Hersteller">
									<option value="" selected="selected">Alle Hersteller</option>
									<option value="1">Hersteller 1</option>
									<option value="2">Hersteller 2</option>
									<option value="3">Hersteller 3</option>
								</select>
							</div>
							<div class="col">
								<select class="form-select" name="filter_sort" aria-label="Sortierung">
									<option value="" selected="selected">Sortieren nach ...</option>
									<option value="1">A bis Z</option>
									<option value="2">Z bis A</option>
									<option value="3">Preis aufsteigend</option>
									<option value="4">Preis absteigend</option>
								</select>
							</div>
							<div class="col">
								<select class="form-select" name="filter_set" onchange="" aria-label="Artikel pro Seite">
									<option value="" selected="selected">Artikel pro Seite</option>
									<option value="3">3 Artikel pro Seite</option>
									<option value="12">12 Artikel pro Seite</option>
									<option value="999999">Alle Artikel anzeigen</option>
								</select>
							</div>
							<div class="view-buttons col ms-auto">
								<a class="view_box btn btn-outline-secondary disabled" tabindex="-1" href="#" title="Boxansicht"><span class="fa fa-table-cells"></span></a>&nbsp;&nbsp;
								<a class="view_list btn btn-outline-secondary" href="#" title="Listenansicht"><span class="fa fa-table-list"></span></a>
							</div>
						</div>
					</div>
					<div class="pag_top">
						<nav class="d-flex flex-wrap justify-content-around justify-content-sm-between gap-2 my-3" aria-label="Seitennavigation">
							<div class="count text-nowrap align-self-center">
								<span class="small">Zeige <strong>1</strong> bis <strong>12</strong> (von insgesamt <strong>12</strong> Artikeln)</span>
							</div>
							<div class="d-flex flex-wrap">
								<div class="pagination mb-0">
									<span class="page-item active" aria-current="page"><span class="page-link">1</span></span>
									<span class="page-item"><span class="page-link">2</span></span>
									<span class="page-item"><span class="page-link">3</span></span>
								</div>
								<div class="pagination lt_scroll ms-1 mb-0">
									<span class="page-item"><a class="page-link listing_topscroll" href="#/" title="Zum ersten Artikel scrollen"><i class="fa fa-arrow-up"></i></a></span>
								</div>
								<div class="pagination lb_scroll ms-1 mb-0">
									<span class="page-item"><a class="page-link listing_bottomscroll" href="#/" title="Zum letzten Artikel scrollen"><i class="fa fa-arrow-down"></i></a></span>
								</div>
							</div>
						</nav>
					</div>
				</div>
				<div id="bs5_BsCarousel" class="box_best_sellers mb-5">
					<div class="d-flex justify-content-between border-bottom mb-3">
						<div class="h2">Bestseller</div>
					</div>
					<div class="visually-hidden">Es folgt ein Produktslider - navigieren Sie mit der Tab-Taste zu den einzelnen Artikeln.</div>
					<div id="bsCarousel" class="resCarousel position-relative w-100 it5 ResSlid5" data-items="1-2-3-4-5" data-slide="5" data-speed="900" data-value="0">
						<button type="button" class="resBtn btn btn-light leftRs" tabindex="-1"><i class="fa fa-fw fa-angle-left"></i><span class="visually-hidden">zurück</span></button>
						<div class="resCarousel-inner py-1" tabindex="-1">
							<div class="item">
								<div class="card focus-ring h-100" tabindex="0" aria-label="Testartikel 84">
									<div class="card-body pb-2 flex-fill d-flex flex-column text-center">
										<div class="ribbon bg-success text-white shadow-sm">Neu</div>
										<div class="lb_image w-100 img_container mx-auto">
											<div class="prod_image mb-auto">
												<img class="img-fluid" src="includes/bs5_template_manager/assets/img/1_0.jpg" alt="Testartikel 84" title="Testartikel 84">
											</div>
										</div>
										<div class="lb_title fs-5 text-secondary-emphasis mt-2 mb-0  line-clamp lc-2">Testartikel 84</div>
									</div>
									<div class="p-1 text-center">
										<div class="lb_ratings mb-3 small">
											<span class="ratings"><span class="fas empty-stars"></span><span class="fas full-stars" style="width:0%"></span><span class="text-secondary-emphasis">&nbsp;(0<span class="visually-hidden">&nbsp;Bewertungen</span>)</span></span>
										</div>
										<div class="lb_buttons mb-2">
											<a class="btn btn-cart btn-outline-secondary btn-sm" aria-label="buy now" tabindex="-1" href="#"><span title="1 x 'Testartikel 84' bestellen"><span class="fa fa-cart-shopping"></span></span></a>&nbsp;&nbsp;
											<a class="btn btn-wish btn-outline-info btn-sm" href="#" title="Auf den Merkzettel" tabindex="-1"><i class="fa fa fa-heart"></i></a>&nbsp;&nbsp;
											<a class="stretched-link btn btn-info btn-sm" href="#"><i class="fa fa-eye"></i> Details</a>
										</div>
									</div>
									<div class="card-footer">
										<div class="lb_shipping small mb-1">
											<i class="fa fa-truck-fast me-2"></i>Lieferzeit:
											<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">3-4 Tage</a>
										</div>
										<div class="lb_stock mb-2 small">
											<span class="traffic d-flex align-items-center" title="wenige auf Lager">Bestand:&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill bg-warning">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;</span>
										</div>
										<div class="lb_price text-end mb-1">
											<div class="standard_price fs-5">
												<span class="value_price">13,09 EUR</span>
											</div>
										</div>
										<div class="lb_tax text-end text-secondary-emphasis small mb-1">
											<span class="small">inkl. 19 % MwSt.</span> zzgl.<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Versandkosten</a>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card focus-ring h-100" tabindex="0" aria-label="Testartikel 13">
									<div class="card-body pb-2 flex-fill d-flex flex-column text-center">
										<div class="ribbon bg-danger text-white shadow-sm">Angebot</div>
										<div class="lb_image w-100 img_container mx-auto">
											<div class="prod_image mb-auto">
												<img class="img-fluid" src="includes/bs5_template_manager/assets/img/2_0.jpg" alt="Testartikel 13" title="Testartikel 13">
											</div>
										</div>
										<div class="lb_title fs-5 text-secondary-emphasis mt-2 mb-0  line-clamp lc-2">Testartikel 13</div>
									</div>
									<div class="p-1 text-center">
										<div class="lb_ratings mb-3 small">
											<a class="bs5_avg_container link-secondary" href="#" tabindex="-1" data-pid="13" data-class="list" title="Bewertung nach vergebenen Sternen"><span class="visually-hidden">Bewertung: 4 von 5 Sternen!</span><span class="ratings"><span class="fas empty-stars"></span><span class="fas full-stars" style="width: 80%"></span></span>&nbsp;(1<span class="visually-hidden">&nbsp;Bewertungen</span>)<i class="fa fa-chevron-down ms-1"></i></a>
										</div>
										<div class="lb_buttons mb-2">
											<a class="btn btn-cart btn-outline-secondary btn-sm" aria-label="buy now" tabindex="-1" href="#"><span title="1 x 'Testartikel 13' bestellen"><span class="fa fa-cart-shopping"></span></span></a>&nbsp;&nbsp;
											<a class="btn btn-wish btn-outline-info btn-sm" href="#" title="Auf den Merkzettel" tabindex="-1"><i class="fa fa fa-heart"></i></a>&nbsp;&nbsp;
											<a class="stretched-link btn btn-info btn-sm" href="#"><i class="fa fa-eye"></i> Details</a>
										</div>
									</div>
									<div class="card-footer">
										<div class="lb_shipping small mb-1">
											<i class="fa fa-truck-fast me-2"></i>Lieferzeit:<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="" data-bs-toggle="modal" data-bs-target="#modal">3-4 Tage</a>
										</div>
										<div class="lb_stock mb-2 small">
											<span class="traffic d-flex align-items-center" title="nicht auf Lager">Bestand:&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill bg-danger">&nbsp;</span>&nbsp;</span>
										</div>
										<div class="lb_price text-end mb-1">
											<div class="new_price fs-5 text-danger">
												<span class="small_price">Sonderpreis</span><span class="value_price">117,81 EUR</span><span class="special_percent bg-danger shadow text-white">19%</span>
											</div>
										</div>
										<div class="lb_tax text-end text-secondary-emphasis small mb-1">
											<span class="small">inkl. 19 % MwSt.</span> zzgl.<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Versandkosten</a>
										</div>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="card focus-ring h-100" tabindex="0" aria-label="Testartikel 1 mit Attributen">
									<div class="card-body pb-2 flex-fill d-flex flex-column text-center">
										<div class="ribbon bg-primary text-white shadow-sm">Top</div>
										<div class="lb_image w-100 img_container mx-auto">
											<div class="prod_image mb-auto">
												<img class="img-fluid" src="includes/bs5_template_manager/assets/img/3_0.jpg" alt="Testartikel 1 mit Attributen" title="Testartikel 1 mit Attributen">
											</div>
										</div>
										<div class="lb_title fs-5 text-secondary-emphasis mt-2 mb-0  line-clamp lc-2">Testartikel 1 mit Attributen</div>
									</div>
									<div class="p-1 text-center">
										<div class="lb_ratings mb-3 small">
											<a class="bs5_avg_container link-secondary" href="#" tabindex="-1" data-pid="1" data-class="list" title="Bewertung nach vergebenen Sternen"><span class="visually-hidden">Bewertung: 2.5 von 5 Sternen!</span><span class="ratings"><span class="fas empty-stars"></span><span class="fas full-stars" style="width: 50%"></span></span>&nbsp;(2<span class="visually-hidden">&nbsp;Bewertungen</span>)<i class="fa fa-chevron-down ms-1"></i></a>
										</div>
										<div class="lb_buttons mb-2">
											<a class="btn btn-cart btn-outline-secondary btn-sm" aria-label="buy now" tabindex="-1" href="#"><span title="1 x 'Testartikel 1 mit Attributen' bestellen"><span class="fa fa-cart-shopping"></span></span></a>&nbsp;&nbsp;
											<a class="btn btn-wish btn-outline-info btn-sm" href="#" title="Auf den Merkzettel" tabindex="-1"><i class="fa fa fa-heart"></i></a>&nbsp;&nbsp;
											<a class="stretched-link btn btn-info btn-sm" href="#"><i class="fa fa-eye"></i> Details</a>
										</div>
									</div>
									<div class="card-footer">
										<div class="lb_shipping small mb-1">
											<i class="fa fa-truck-fast me-2"></i>Lieferzeit:<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">3-4 Tage</a>
										</div>
										<div class="lb_stock mb-2 small">
											<span class="traffic d-flex align-items-center" title="auf Lager">Bestand:&nbsp;<span class="border border-secondary badge rounded-pill bg-success">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;</span>
										</div>
										<div class="lb_price text-end mb-1">
											<div class="standard_price fs-5">
												<span class="small_price"> ab	</span><span class="value_price">145,18 EUR</span>
											</div>
											<div class="lb_vpe text-secondary-emphasis small">145,18 EUR pro kg</div>
										</div>
										<div class="lb_tax text-end text-secondary-emphasis small mb-1">
											<span class="small">inkl. 19 % MwSt.</span> zzgl.<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Versandkosten</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button type="button" class="resBtn btn btn-light rightRs" tabindex="-1">
							<i class="fa fa-fw fa-angle-right"></i><span class="visually-hidden">vor</span>
						</button>
					</div>
				</div>
				<div id="content">
					<div id="product_info" itemscope="" itemtype="http://schema.org/Product">
						<form id="cart_quantity" action="#" method="post">
							<div id="product_details" class="clearfix">
								<div class="pd_title col-md-6 float-md-end ps-md-2 mb-4">
									<div class="position-relative mb-3">
										<div class="pd_manu" itemprop="brand" itemscope="" itemtype="https://schema.org/Brand">
											<a class="link-body-emphasis" title="Hersteller 1" href="#"><span itemprop="name">Hersteller 1</span></a>
										</div>
										<h1 class="h3 my-3 bg-h manu_image_p" itemprop="name">Testartikel 90</h1>
										<div class="pd_manu_image position-absolute top-0 end-0">
											<a class="d-inline-block" title="Hersteller 1" href="#">
												<img class="img-fluid" src="includes/bs5_template_manager/assets/img/1_h.jpg" alt="Hersteller 1"></a>
										</div>
									</div>
									<div class="pd_inforow small mb-3" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
										<div class="d-inline">
											<a class="bs5_avg_container link-secondary" href="#" data-pid="90" data-class="prod" title="Bewertung nach vergebenen Sternen"><span class="visually-hidden">Bewertung: 3.3 von 5 Sternen!</span><span class="ratings"><span class="fas empty-stars"></span><span class="fas full-stars" style="width:66%"></span></span>&nbsp;(3<span class="visually-hidden">&nbsp;Bewertungen</span>)<i class="fa fa-chevron-down ms-1"></i></a>
										</div>
										<meta itemprop="ratingValue" content="3">
										<meta itemprop="bestRating" content="5">
										<meta itemprop="ratingCount" content="3">
									</div>
									<div class="mb-3">
										<div class="small mb-1"><strong>Art.Nr.:</strong><span itemprop="sku">5689</span></div>
										<div class="small mb-1"><strong>GTIN/EAN:</strong><span itemprop="gtin6">124164</span></div>
										<div class="small mb-1"><strong>HAN:</strong> 2743829</div>
									</div>
									<div class="small mb-1">
										<span class="traffic d-flex align-items-center" title="auf Lager"><strong>Bestand:&nbsp;</strong><span class="border border-secondary badge rounded-pill bg-success">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;</span>
									</div>
									<div class="pd_shippingrow">
										<i class="fa fa-truck-fast me-2"></i><span class="small"><strong>Lieferzeit:</strong><a rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">3-4 Tage</a></span>
									</div>
								</div>
								<div class="pd_imagebox col-md-6 float-md-start pe-md-2 mb-4">
									<div>
										<div id="ImgCarousel" class="resCarousel position-relative w-100 it1 ResSlid0" data-items="1-1-1-1-1" data-slide="1" data-speed="900" aria-label="Bilderkarusell" data-value="0">
											<div class="visually-hidden">Wenn mehr als ein Produktbild exitiert, können Sie die "Zurück-" und "Vor-Button" nutzen, um zwischen den Bildern zu navigieren. Zum Vergrößern klicken Sie auf das Bild.
											</div>
											<button type="button" class="resBtn btn btn-light leftRs"><i class="fa fa-fw fa-angle-left"></i><span class="visually-hidden">zurück</span></button>
											<div id="pd_viewer" class="resCarousel-inner" tabindex="-1">
												<div class="item text-center">
													<img class="zoomimg img-thumbnail" itemprop="image" src="includes/bs5_template_manager/assets/img/4_0.jpg" alt="Testartikel 90" title="Testartikel 90">
												</div>
												<div class="item text-center">
													<img class="zoomimg img-thumbnail" itemprop="image" src="includes/bs5_template_manager/assets/img/1_0.jpg" alt="Testartikel 90" title="Testartikel 90">
												</div>
												<div class="item text-center">
													<img class="zoomimg img-thumbnail" itemprop="image" src="includes/bs5_template_manager/assets/img/2_0.jpg" alt="Testartikel 90" title="Testartikel 90">
												</div>
												<div class="item text-center">
													<img class="zoomimg img-thumbnail" itemprop="image" src="includes/bs5_template_manager/assets/img/3_0.jpg" alt="Testartikel 90" title="Testartikel 90">
												</div>
											</div>
											<button type="button" class="resBtn btn btn-light rightRs"><i class="fa fa-fw fa-angle-right"></i><span class="visually-hidden">vor</span></button>
										</div>
									</div>
									<div class="pd_more_images my-3">
										<div class="row">
											<div class="col-4 col-sm-3 col-lg-2 mb-2">
												<a role="button" href="#/" class="swap d-inline-block" tabindex="-1" data-goto="0" aria-describedby="zoomtext"><img class="img-fluid img-thumbnail" src="includes/bs5_template_manager/assets/img/4_0.jpg" alt="Testartikel 90" title="Testartikel 90"></a>
											</div>
											<div class="col-4 col-sm-3 col-lg-2 mb-2">
												<a role="button" href="#/" class="swap d-inline-block" tabindex="-1" data-goto="1" aria-describedby="zoomtext"><img class="img-fluid img-thumbnail" src="includes/bs5_template_manager/assets/img/1_0.jpg" alt="Testartikel 90" title="Testartikel 90"></a>
											</div>
											<div class="col-4 col-sm-3 col-lg-2 mb-2">
												<a role="button" href="#/" class="swap d-inline-block" tabindex="-1" data-goto="2" aria-describedby="zoomtext"><img class="img-fluid img-thumbnail" src="includes/bs5_template_manager/assets/img/2_0.jpg" alt="Testartikel 90" title="Testartikel 90"></a>
											</div>
											<div class="col-4 col-sm-3 col-lg-2 mb-2">
												<a role="button" href="#/" class="swap d-inline-block" tabindex="-1" data-goto="3" aria-describedby="zoomtext"><img class="img-fluid img-thumbnail" src="includes/bs5_template_manager/assets/img/3_0.jpg" alt="Testartikel 90" title="Testartikel 90"></a>
											</div>
										</div>
									</div>
									<div id="zoomtext" class="small text-secondary-emphasis mb-5">Für eine größere Ansicht klicken Sie auf das Bild!
									</div>
								</div>
								<div class="pd_content col-md-6 float-md-end ps-md-2 mb-4">
									<div class="pd_offer" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
										<meta itemprop="url" content="https://testseite.local/mod300_2/product_info.php?products_id=90">
										<meta itemprop="priceCurrency" content="EUR">
										<meta itemprop="availability" content="http://schema.org/InStock">
										<meta itemprop="mpn" content="2743829">
										<meta itemprop="itemCondition" content="http://schema.org/NewCondition">
										<div class="pd_price my-3 py-2 border-info border-top border-bottom text-end" aria-label="Preisangaben">
											<div id="pd_puprice" class="mb-2">
												<div class="standard_price fs-4"><span class="value_price">13,09 EUR</span></div>
												<meta itemprop="price" content="13.09">
											</div>
											<div class="pd_tax text-secondary-emphasis small mb-1">inkl. 19 % MwSt. zzgl.<a rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Versandkosten</a></div>
										</div>
									</div>
									<div class="my-3 py-2 border-bottom">
										<div class="row">
											<div class="col-5 col-xl-3 mb-3 mx-auto">
												<div class="input-group">
													<button id="btn_minus" class="btn btn-outline-secondary" type="button" aria-label="Anzahl minus"><i class="fa fa-minus"></i></button>
													<input type="tel" id="qty_input" class="form-control text-center" aria-label="Anzahl" name="products_qty" value="1" size="3">
													<input type="hidden" name="products_id" value="90">
													<button id="btn_plus" class="btn btn-outline-secondary" type="button" aria-label="Anzahl plus"><i class="fa fa-plus"></i></button>
												</div>
											</div>
											<div class="col-sm-7 col-xl-9 d-grid gap-2">
												<button class="btn btn-cart btn-success" type="submit" title="In den Warenkorb"><span class="fa fa-cart-shopping"></span><span class="mx-3">In den Warenkorb</span></button>
												<button class="btn btn-wish btn-outline-secondary" name="wishlist" type="submit" title="Auf den Merkzettel"><span class="fa fa-heart"></span><span class="mx-3">Auf den Merkzettel</span></button>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 mb-2">
											<a class="iframe btn btn-sm btn-outline-primary btn-block" title="Billiger gesehen?" href="#" data-src="#" data-bs-toggle="modal" data-bs-target="#modal"><span><span class="fa fa-envelope me-2"></span><span>Billiger gesehen?</span></span></a>
										</div>
										<div class="col-sm-6 mb-2">
											<a class="iframe btn btn-sm btn-outline-primary btn-block" title="Frage zum Artikel" href="#" data-src="#" data-bs-toggle="modal" data-bs-target="#modal"><span><span class="fa fa-envelope me-2"></span><span>Frage zum Artikel</span></span></a>
										</div>
										<div class="col-sm-6 mb-2">
											<a class="iframe btn btn-outline-primary btn-sm btn-block" target="_blank" rel="nofollow" href="#" title="Artikeldatenblatt drucken" data-src="#" data-bs-toggle="modal" data-bs-target="#modal"><span class="fa fa-print me-2"></span>Artikeldatenblatt drucken</a>
										</div>
									</div>
								</div>
							</div>
						</form>
						<div id="horizontalTab" class="card clearfix mb-5">
							<div class="card-header">
								<ul id="bs_tabs" class="nav nav-pills card-header-pills" role="tablist" aria-orientation="horizontal">
									<li class="nav-item" role="presentation">
										<button class="nav-link active" id="prod_desc_tab" data-bs-target="#prod_desc" role="tab" aria-controls="prod_desc" data-bs-toggle="pill" aria-selected="true">Produktbeschreibung
										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="prod_reviews_tab" data-bs-target="#prod_reviews" role="tab" aria-controls="prod_reviews" data-bs-toggle="pill" aria-selected="false" tabindex="-1">Rezensionen
											<span class="badge text-bg-secondary ms-2">3
											</span>
										</button>
									</li>
								</ul>
							</div>
							<div class="tab-content card-body">
								<div role="tabpanel" class="tab-pane fade active show" id="prod_desc" aria-labelledby="prod_desc_tab" tabindex="0">
									<h2 class="h3 detailbox">Produktbeschreibung</h2>
									<div itemprop="description">Lorem ipsum dolor sit amet consectetuer et nibh et sed lacus. Porttitor Phasellus Curabitur felis nonummy sed mus semper at semper habitasse. Et dolor eros dolor est turpis id ipsum ullamcorper elit Ut. Vitae Maecenas turpis lorem tempor leo congue Mauris Suspendisse adipiscing Phasellus. Nullam velit nunc condimentum sed lacinia tellus enim platea tempus quam. Eros Cum nibh Maecenas elit Aenean iaculis vitae non venenatis consequat. Nunc.
									</div>
									<p class="small mt-4">Diesen Artikel haben wir am 09.11.2023 in unseren Katalog aufgenommen.
									</p>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="prod_reviews" aria-labelledby="prod_reviews_tab" tabindex="0">
									<div class="products_reviews">
										<h2 class="h3 detailbox">Kundenrezensionen<span class="badge text-bg-secondary fs-6 ms-3">3</span></h2>
										<div class="my-3">
											<a target="_blank" href="#" title="Information" class="btn btn-outline-secondary btn-sm iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Informationen zur Echtheit der Kundenbewertungen</a>
										</div>
										<div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-2">
											<div class="col col-md-auto text-center px-4 mw-100">
												<div class="fs-5 py-2 border-bottom">Durchschnittliche Bewertung: 3</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="border-top">
								<div class="productnavigator">
									<div class="p-3 text-center">
										<span class="visually-hidden">Artikelnavigation innerhalb dieser Kategorie</span>
										<p class="small">Artikel&nbsp;<strong>1&nbsp;von&nbsp;5</strong>&nbsp;in dieser Kategorie</p>
										<div class="d-flex justify-content-around">
											<div><span class="text-secondary-emphasis"><span class="fa fa-backward-fast"></span><span class="d-none d-md-block">Erster</span></span></div>
											<div><span class="text-secondary-emphasis"><span class="fa fa-backward"></span><span class="d-none d-md-block">vorheriger</span></span></div>
											<div><a class="d-inline-block" href="#" title="Übersicht"><span class="fa fa-list"></span><span class="d-none d-md-block">Übersicht</span></a></div>
											<div><a class="d-inline-block" href="#" title="nächster"><span class="fa fa-forward"></span><span class="d-none d-md-block">nächster</span></a></div>
											<div><a class="d-inline-block" href="#" title="Letzter"><span class="fa fa-forward-fast"></span><span class="d-none d-md-block">Letzter</span></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="layout_footer" class="container-fluid bg-none border-top border-light-subtle py-4">
				<div class="container-xxl navbar">
					<div id="layout_footer_inner" class="row">
						<div class="col-lg-3 col-md-6 mb-3">
							<div class="box-contact">
								<div class="box-heading w-100 navbar-brand border-bottom mb-2">Kontakt</div>
								<div class="box_sub">Demoshop modified eCommerce Shopsoftware<br>Musterstr. 123<br>12345 Musterstadt<br><br>Telefon: 01234 56789<br>Mail: demo@modified-shop.org</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-2">
							<div class="config box">
								<div class="box-heading w-100 navbar-brand border-bottom mb-2">Mehr &uuml;ber...</div>
								<ul class="navbar-nav flex-column">
									<li class="nav-item level1"><a class="nav-link" href="#" title="Zahlung &amp; Versand"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Zahlung &amp; Versand</a></li>
									<li class="nav-item level1 active activeparent"><a class="nav-link" href="#" title="Privatsphäre und Datenschutz"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Privatsphäre und Datenschutz (aktiver Link)</a></li>
									<li class="nav-item level1"><a class="nav-link" href="#" title="Unsere AGB"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Unsere AGB</a></li>
									<li class="nav-item level1"><a class="nav-link" href="#" title="Impressum"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Impressum</a></li>
									<li class="nav-item level1"><a class="nav-link" href="#" title="Kontakt"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Kontakt</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-2">
							<div class="config box">
								<div class="box-heading w-100 navbar-brand border-bottom mb-2">Informationen</div>
								<ul class="navbar-nav flex-column">
									<li class="nav-item level1"><a class="nav-link" href="#" title="Widerrufsrecht &amp; Widerrufsformular"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Widerrufsrecht &amp; Widerrufsformular</a></li>
									<li class="nav-item level1 active activeparent"><a class="nav-link" href="#" title="Lieferzeit"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Lieferzeit (aktiver Link)</a></li>
									<li class="nav-item level1"><a class="nav-link" href="#" title="Sitemap"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Sitemap</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-2">
							<div class="config box">
								<div class="box-heading w-100 navbar-brand border-bottom mb-2">Zahlungsmethoden</div>
								<p class="box_sub text-secondary small">Die Box kann unter /boxes/box_miscellaneous.html ver&auml;ndert werden.</p>
							</div>
						</div>
					</div>
					<div class="mod_copyright mx-auto small pb-5">Modified2 &copy; <?php echo date("Y"); ?> | Template &copy; <?php echo date("Y"); ?> by Karl</div>
				</div>
			</div>
			<div id="modal" class="modal modal-xl fade" tabindex="-1" aria-labelledby="title" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 id="title" class="modal-title up mx-auto">Information</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Schließen"></button>
						</div>
						<div class="modal-body">
							<h1>Lieferzeit</h1>
							Die Frist für die Lieferung beginnt bei Zahlung per Vorkasse am Tag nach Erteilung des Zahlungsauftrags an das überweisende Kreditinstitut bzw. bei anderen Zahlungsarten am Tag nach Vertragsschluss zu laufen und endet mit dem Ablauf des letzten Tages der Frist. Fällt der letzte Tag der Frist auf einen Samstag, Sonntag oder einen am Lieferort staatlich anerkannten allgemeinen Feiertag, so tritt an die Stelle eines solchen Tages der nächste Werktag.
						</div>
						<div class="modal-footer">
							<button class="btn btn-dark btn-sm" data-bs-dismiss="modal" type="button" title="Schließen">Schließen</button>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php
	} else {
	?>
		<div id="container" class="border border-dark">
			<div id="top" class="top border-bottom border-light-subtle d-none d-sm-block py-2">
				<div class="d-flex justify-content-around w-100 py-3">
					<div class="text-nowrap"><i class="fa fa-user-group fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Consultation +49 00 00 / 00 00 00</div>
					<div class="text-nowrap d-none d-sm-block"><i class="fa fa-truck-fast fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Fast delivery</div>
					<div class="text-nowrap d-none d-md-block"><i class="fa fa-truck fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;Free Shipping - from 50€</div>
					<div class="text-nowrap d-none d-lg-block"><i class="fa fa-rotate-left fa-lg" aria-hidden="true"></i>&nbsp;&nbsp;30 Days return policy</div>
				</div>
			</div>
			<div id="container1" class="container-xxl">
				<div id="logobar" class="row text-center text-md-start py-3">
					<a class="nav-logo col-12 col-md-3" href="#" title="Startseite • Testfirma">
						<img src="includes/bs5_template_manager/assets/img/logo_head.png" alt="Testfirma" width="235" height="75" class="img-fluid"></a>
					<div class="logos col-12 col-md-9 position-relative">
						<div class="row justify-content-end">
							<div class="search col-12 col-lg-8 position-relative">
								<form id="quick_find" action="#" method="get" class="box-search m-2">
									<div class="input-group">
										<select name="categories_id" class="form-select bg-body-tertiary" aria-label="Alle Kategorien" id="cat_search">
											<option value="" selected="selected">All</option>
											<option value="1">Testcategory 1</option>
											<option value="2">Testcategory 2</option>
											<option value="3">Testcategory 3</option>
										</select>
										<input type="hidden" name="inc_subcat" value="1">
										<input type="text" name="keywords" placeholder="Search" id="inputString" class="form-control" aria-label="search keywords" maxlength="30" autocomplete="off">
										<button class="btn btn-outline-secondary text-secondary-emphasis search_button" id="inputStringSubmit" type="submit" title="Search"><span class="mx-3">Search</span></button>
									</div>
								</form>
							</div>
							<div class="suggestionsBox card" id="suggestions" style="display:none;">
								<div class="card-body px-2">
									<div class="suggestionList" id="autoSuggestionsList">&nbsp;</div>
								</div>
							</div>
							<div class="nav col-12 justify-content-around justify-content-sm-end align-items-end">
								<div class="nav-item home">
									<a class="text-center nav-link" title="Startseite" href="#"><span class="icon"><i class="fa fa-house fa-lg"></i></span><span class="d-block small">Startseite</span></a>
								</div>
								<div class="nav-item">
									<button id="setbtn" class="text-center nav-link" title="Settings" data-bs-toggle="offcanvas" data-bs-target="#settings" aria-controls="settings"><span class="icon"><i class="fa fa-gear fa-lg"></i></span><span class="d-block small">Settings</span></button>
								</div>
								<div class="nav-item">
									<button id="login" class="text-center nav-link" title="Your account" data-bs-toggle="offcanvas" data-bs-target="#account" aria-controls="account"><span class="icon"><i class="fa fa-user fa-lg"></i></span><span class="d-block small">Your account</span></button>
								</div>
								<div class="nav-item wishlist text-center">
									<button id="toggle_wishlist" data-bs-toggle="offcanvas" data-bs-target="#canvas_wish" aria-controls="canvas_wish" class="nav-link" title="Wishlist"><span class="icon"><i class="fa fa-heart fa-lg fa-fw" aria-hidden="true"></i></span><span class="d-block small">Wishlist</span></button>
								</div>
								<div class="nav-item cart text-center">
									<button id="toggle_cart" data-bs-toggle="offcanvas" data-bs-target="#canvas_cart" aria-controls="canvas_cart" class="nav-link" title="Shopping cart"><span class="icon"><i class="fa fa-cart-shopping fa-lg fa-fw" aria-hidden="true"></i></span><span class="d-block small">Shopping cart</span></button>
								</div>
								<div class="nav-item">
									<button id="mmopener" class="text-center nav-link" title="Responsive Menu"><span class="icon"><i class="fa fa-bars fa-lg"></i></span><span class="d-block small">Menu</span></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<nav id="nav_container" class="container-fluid border-top border-bottom mb-3">
				<div id="navbar" class="container-xxl top2 navbar navbar-expand">
					<ul id="main" class="navbar-nav d-flex flex-wrap me-auto">
						<li class="nav-item home">
							<a class="nav-link" href="#" aria-label="home"><span class="fa fa-house fa-lg"></span></a>
						</li>
						<li id="li1" class="level1 nav-item kk-mega">
							<a class="nav-link" href="#" title="Testcategory 1">Testcategory 1</a>
						</li>
						<li id="li2" class="level1 active parent hassub dropdown nav-item kk-mega">
							<a class="nav-link active parent dropdown-toggle" href="#/" data-href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Testcategory 2">Testcategory 2 (active)</a>
							<div class="row row-cols-3 dropdown-menu p-2 kk-mega">
								<div class="overview border-bottom w-100 pb-2 mb-2">
									<a class="btn btn-outline-secondary" href="#" title="Testcategory 2">
										<span class="small">Show all of
										</span><strong>Testcategory 2</strong>
										<i class="fa fa-circle-right ms-3"></i></a>
								</div>
								<ul class="navbar-nav flex-column col" data-level="2">
									<li id="li5" class="level2 hassub nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testcategory 2.1"> Testcategory 2.1</a>
									</li>
									<li id="li8" class="level3 nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testcategory 2.1.1">› Testcategory 2.1.1</a>
									</li>
									<li id="li9" class="level3 hassub nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testcategory 2.1.2">› Testcategory 2.1.2</a>
									</li>
									<li class="morecats my-2">
										<a href=""><span class="more">show more ...</span></a>
									</li>
									<li id="li24" class="level4 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testcategory 2.1.2.1">›› Testcategory 2.1.2.1</a>
									</li>
									<li id="li25" class="level4 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testcategory 2.1.2.2">›› Testcategory 2.1.2.2</a>
									</li>
								</ul>
								<ul class="navbar-nav flex-column col" data-level="2">
									<li id="li6" class="level2 hassub nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testcategory 2.2"> Testcategory 2.2</a>
									</li>
									<li id="li10" class="level3 nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testcategory 2.2.1">› Testcategory 2.2.1</a>
									</li>
									<li id="li11" class="level3 Selected active hassub nav-item kk-mega">
										<a class="nav-link py-1 Selected active" href="#" title="Testcategory 2.2.2">› Testcategory 2.2.2 (active)</a>
									</li>
									<li class="morecats my-2">
										<a href=""><span class="more">show more ...</span></a>
									</li>
									<li id="li13" class="level4 hassub nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testcategory 2.2.2.1">›› Testcategory 2.2.2.1</a>
									</li>
									<li id="li19" class="level5 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testcategory 2.2.2.1.1">››› Testcategory 2.2.2.1.1</a>
									</li>
									<li id="li21" class="level5 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testcategory 2.2.2.1.2">››› Testcategory 2.2.2.1.2</a>
									</li>
									<li id="li14" class="level4 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testcategorie 2.2.2.2">›› Testcategorie 2.2.2.2</a>
									</li>
									<li id="li12" class="level3 nav-item kk-mega d-none">
										<a class="nav-link py-1" href="#" title="Testcategorie 2.2.3">› Testcategorie 2.2.3</a>
									</li>
								</ul>
								<ul class="navbar-nav flex-column col" data-level="2">
									<li id="li7" class="level2 nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testcategory 2.3"> Testcategory 2.3</a>
									</li>
								</ul>
								<ul class="navbar-nav flex-column col" data-level="2">
									<li id="li26" class="level2 nav-item kk-mega">
										<a class="nav-link py-1" href="#" title="Testcategory 2.4"> Testcategory 2.4</a>
									</li>
								</ul>
							</div>
						</li>
						<li id="li3" class="level1 nav-item kk-mega">
							<a class="nav-link" href="#" title="Testcategory 3">Testcategory 3</a>
						</li>
					</ul>
				</div>
			</nav>

			<div id="container2" class="container-xxl mb-4">
				<nav class="breadcrumb border-bottom" aria-label="breadcrumb">
					<ol class="breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
						<li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
							<a class="link-secondary" itemprop="item" href="#"><span itemprop="name">Home&nbsp;</span></a><meta itemprop="position" content="1">
						</li>
						<li class="breadcrumb-item" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
							<a class="link-secondary" itemprop="item" href="#"><span itemprop="name">Catalog&nbsp;</span></a><meta itemprop="position" content="2">
						</li>
						<li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
							<meta itemprop="item" content="#"><span class="current" itemprop="name">Testcategory 2</span><meta itemprop="position" content="3">
						</li>
					</ol>
				</nav>
				<div class="box_greeting homesite mb-5">
					<h1 class="border-bottom">Welcome</h1>
					<div class="greeting_text">Welcome visitor! Would you like to login? Or would you like to create a new account?<br>
						This is the default installation of modified eCommerce Shopsoftware. All products shown are for demonstrational purposes. If you order products, they will be not be delivered nor billed.<br><br>
						The text shown here may be edited in the admin area under Content Manager - entry Index.
					</div>
				</div>
				<div class="row clearfix">
					<div class="col-6 mb-2">
						<div id="subcats" class="navbar">
							<div class="w-100 navbar-brand">Categories</div>
							<ul class="navbar-nav flex-column border-top w-100">
								<li class="level1 Selected active nav-item border-bottom">
									<a class="nav-link Selected active" href="#" title="Testcategory 1">Testcategory 1</a>
								</li>
								<li class="level1 hassub nav-item border-bottom">
									<a class="nav-link hstack" href="#" title="Testcategory 2">Testcategory 2<span class="fa fa-chevron-down ms-auto"></span></a>
								</li>
								<li class="level1 nav-item border-bottom">
									<a class="nav-link" href="#" title="Testcategory 3">Testcategory 3</a>
								</li>
							</ul>
						</div>
						<div class="box_login list-group list-group-flush my-4">
							<h5 class="list-group-item">Welcome back!</h5>
							<div class="list-group-item">
								<div class="mb-2">
									<label for="email" class="form-label small">E-mail address:</label>
									<input type="email" name="email_address" id="email" class="form-control" aria-label="email" autocomplete="email">
								</div>
								<div class="mb-3">
									<label for="pw" class="form-label small">Password:</label>
									<div class="input-group">
										<input type="password" name="password" id="pw" class="form-control" aria-label="password">
										<button class="togglePw btn btn-outline-secondary fa fa-eye px-3" type="button" aria-label="Show password"></button>
									</div>
								</div>
								<div class="d-grid mb-3">
									<button class="btn btn-secondary" type="submit" title="Login"><span class="fa fa-arrow-right-to-bracket"></span><span class="mx-3">Login</span></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-6 mb-2">
						<div class="mb-3">
							<button type="button" class="btn btn-primary btn-block my-1" data-bs-toggle="modal" data-bs-target="#modal">Open modalbox</button>
							<button type="button" class="btn btn-primary m-1">Primary</button>
							<button type="button" class="btn btn-secondary m-1">Secondary</button>
							<button type="button" class="btn btn-success m-1">Success</button>
							<button type="button" class="btn btn-danger m-1">Danger</button>
							<button type="button" class="btn btn-warning m-1">Warning</button>
							<button type="button" class="btn btn-info m-1">Info</button>
							<button type="button" class="btn btn-light m-1">Light</button>
							<button type="button" class="btn btn-dark m-1">Dark</button>
							<button type="button" class="btn btn-link m-1">Link</button>
							<button type="button" class="btn btn-outline-primary m-1">Outline-Primary</button>
							<button type="button" class="btn btn-outline-secondary m-1">Secondary</button>
							<button type="button" class="btn btn-outline-success m-1">Success</button>
							<button type="button" class="btn btn-outline-danger m-1">Danger</button>
							<button type="button" class="btn btn-outline-warning m-1">Warning</button>
							<button type="button" class="btn btn-outline-info m-1">Info</button>
							<button type="button" class="btn btn-outline-light m-1">Light</button>
							<button type="button" class="btn btn-outline-dark m-1">Dark</button>
						</div>
						<div class="card">
							<div class="card-body pb-2">
								<h4>List-Group inside a Card</h4>
							</div>
							<div class="list-group list-group-flush">
								<div class="list-group-item">
									<span class="float-end">
										<a href="#"><span class="btn btn-express btn-outline-secondary btn-sm"><span class="fa fa-cart-plus"></span></span></a>
										<a href="#"><span class="btn btn-incart btn-secondary btn-sm"><span class="fa fa-cart-shopping"></span></span></a>
									</span>
									<strong><a href="#">20/03/2019</a> / Order-No.: 48</strong><br />
									<strong>Betrag: </strong> 295.00 EUR<br />
									<strong>Status: </strong>Open<br />
								</div>
							</div>
							<div class="card-body">
								<p><a href="#">Show all orders</a></p>
							</div>
						</div>
					</div>
				</div>
				<div class="filter_pagination_bar my-3">
					<div id="filterBar" class="filter_bar card bg-custom p-2 mb-2 clearfix">
						<div class="sort_bar row row-cols-auto g-2 clearfix">
							<div class="col">
								<select class="form-select" name="filter_id">
									<option value="" selected="selected">All manufacturers</option>
									<option value="21">MODIFIED</option>
								</select>
							</div>
							<div class="col">
								<select class="form-select" name="filter_sort">
									<option value="" selected="selected">Sort by ...</option>
									<option value="1">A to Z</option>
									<option value="2">Z to A</option>
									<option value="3">Price in ascending order</option>
									<option value="4">Price in descending order</option>
									<option value="5">Newest products first</option>
									<option value="6">Oldest products first</option>
									<option value="7">Most selling products</option>
								</select>
							</div>
							<div class="col">
								<select class="form-select" name="filter_set">
									<option value="" selected="selected">Items per page</option>
									<option value="3">3 Items per page</option>
									<option value="12">12 Items per page</option>
									<option value="27">27 Items per page</option>
									<option value="999999">Show all items</option>
								</select>
							</div>
							<div class="view-buttons col ms-auto">
								<a class="view_box btn btn-outline-secondary disabled" tabindex="-1" href="#" title="Box"><span class="fa fa-table-cells"></span></a>&nbsp;&nbsp;
								<a class="view_list btn btn-outline-secondary" href="#" title="List"><span class="fa fa-table-list"></span></a>
							</div>
						</div>
					</div>
					<div class="pag_top">
						<nav class="d-flex flex-wrap justify-content-around justify-content-sm-between gap-2 my-3" aria-label="Seitennavigation">
							<div class="count text-nowrap align-self-center">
								<span class="small">Zeige <strong>1</strong> bis <strong>12</strong> (von insgesamt <strong>12</strong> Artikeln)</span>
							</div>
							<div class="d-flex flex-wrap">
								<div class="pagination mb-0">
									<span class="page-item active" aria-current="page"><span class="page-link">1</span></span>
									<span class="page-item"><span class="page-link">2</span></span>
									<span class="page-item"><span class="page-link">3</span></span>
								</div>
								<div class="pagination lt_scroll ms-1 mb-0">
									<span class="page-item"><a class="page-link listing_topscroll" href="#/" title="Zum ersten Artikel scrollen"><i class="fa fa-arrow-up"></i></a></span>
								</div>
								<div class="pagination lb_scroll ms-1 mb-0">
									<span class="page-item"><a class="page-link listing_bottomscroll" href="#/" title="Zum letzten Artikel scrollen"><i class="fa fa-arrow-down"></i></a></span>
								</div>
							</div>
						</nav>
					</div>
				</div>
				<div id="bsCarousel" class="resCarousel position-relative w-100 it5 ResSlid5" data-items="1-2-3-4-5" data-slide="5" data-speed="900" data-value="0">
					<button type="button" class="resBtn btn btn-light leftRs" tabindex="-1"><i class="fa fa-fw fa-angle-left"></i><span class="visually-hidden">back</span></button>
					<div class="resCarousel-inner py-1" tabindex="-1">
						<div class="item">
							<div class="card focus-ring h-100" tabindex="0" aria-label="Testarticle 84">
								<div class="card-body pb-2 flex-fill d-flex flex-column text-center">
									<div class="ribbon bg-success text-white shadow-sm">New</div>
									<div class="lb_image w-100 img_container mx-auto">
										<div class="prod_image mb-auto">
											<img class="img-fluid" src="includes/bs5_template_manager/assets/img/1_0.jpg" alt="Testarticle 84" title="Testarticle 84">
										</div>
									</div>
									<div class="lb_title fs-5 text-secondary-emphasis mt-2 mb-0  line-clamp lc-2">Testarticle 84</div>
								</div>
								<div class="p-1 text-center">
									<div class="lb_ratings mb-3 small">
										<span class="ratings"><span class="fas empty-stars"></span><span class="fas full-stars" style="width:0%"></span><span class="text-secondary-emphasis">&nbsp;(0<span class="visually-hidden">&nbsp;Reviews</span>)</span></span>
									</div>
									<div class="lb_buttons mb-2">
										<a class="btn btn-cart btn-outline-secondary btn-sm" aria-label="buy now" tabindex="-1" href="#"><span title="1 x 'Testarticle 84' order"><span class="fa fa-cart-shopping"></span></span></a>&nbsp;&nbsp;
										<a class="btn btn-wish btn-outline-info btn-sm" href="#" title="Add to wishlist" tabindex="-1"><i class="fa fa fa-heart"></i></a>&nbsp;&nbsp;
										<a class="stretched-link btn btn-info btn-sm" href="#"><i class="fa fa-eye"></i> Details</a>
									</div>
								</div>
								<div class="card-footer">
									<div class="lb_shipping small mb-1">
										<i class="fa fa-truck-fast me-2"></i>Delivery time:
										<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">3-4 Days</a>
									</div>
									<div class="lb_stock mb-2 small">
										<span class="traffic d-flex align-items-center" title="">Stock:&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill bg-warning">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;</span>
									</div>
									<div class="lb_price text-end mb-1">
										<div class="standard_price fs-5">
											<span class="value_price">13,09 EUR</span>
										</div>
									</div>
									<div class="lb_tax text-end text-secondary-emphasis small mb-1">
										<span class="small">19 % VAT incl.</span> zzgl.<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Shipping costs</a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card focus-ring h-100" tabindex="0" aria-label="Testarticle 13">
								<div class="card-body pb-2 flex-fill d-flex flex-column text-center">
									<div class="ribbon bg-danger text-white shadow-sm">Sale</div>
									<div class="lb_image w-100 img_container mx-auto">
										<div class="prod_image mb-auto">
											<img class="img-fluid" src="includes/bs5_template_manager/assets/img/2_0.jpg" alt="Testarticle 13" title="Testarticle 13">
										</div>
									</div>
									<div class="lb_title fs-5 text-secondary-emphasis mt-2 mb-0  line-clamp lc-2">Testarticle 13</div>
								</div>
								<div class="p-1 text-center">
									<div class="lb_ratings mb-3 small">
										<a class="bs5_avg_container link-secondary" href="#" tabindex="-1" data-pid="13" data-class="list" title="Ratings"><span class="visually-hidden">Rating: 4 of 5 Stars!</span><span class="ratings"><span class="fas empty-stars"></span><span class="fas full-stars" style="width: 80%"></span></span>&nbsp;(1<span class="visually-hidden">&nbsp;Reviews</span>)<i class="fa fa-chevron-down ms-1"></i></a>
									</div>
									<div class="lb_buttons mb-2">
										<a class="btn btn-cart btn-outline-secondary btn-sm" aria-label="buy now" tabindex="-1" href="#"><span title="1 x 'Testarticle 13' order"><span class="fa fa-cart-shopping"></span></span></a>&nbsp;&nbsp;
										<a class="btn btn-wish btn-outline-info btn-sm" href="#" title="Add to wishlist" tabindex="-1"><i class="fa fa fa-heart"></i></a>&nbsp;&nbsp;
										<a class="stretched-link btn btn-info btn-sm" href="#"><i class="fa fa-eye"></i> Details</a>
									</div>
								</div>
								<div class="card-footer">
									<div class="lb_shipping small mb-1">
										<i class="fa fa-truck-fast me-2"></i>Delivery time:<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="" data-bs-toggle="modal" data-bs-target="#modal">3-4 Days</a>
									</div>
									<div class="lb_stock mb-2 small">
										<span class="traffic d-flex align-items-center" title="no Stock">Stock:&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill bg-danger">&nbsp;</span>&nbsp;</span>
									</div>
									<div class="lb_price text-end mb-1">
										<div class="new_price fs-5 text-danger">
											<span class="small_price">Specialprice</span><span class="value_price">117,81 EUR</span><span class="special_percent bg-danger shadow text-white">19%</span>
										</div>
									</div>
									<div class="lb_tax text-end text-secondary-emphasis small mb-1">
										<span class="small">19 % VAT incl.</span> zzgl.<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Shipping costs</a>
									</div>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="card focus-ring h-100" tabindex="0" aria-label="Testarticle 1">
								<div class="card-body pb-2 flex-fill d-flex flex-column text-center">
									<div class="ribbon bg-primary text-white shadow-sm">Top</div>
									<div class="lb_image w-100 img_container mx-auto">
										<div class="prod_image mb-auto">
											<img class="img-fluid" src="includes/bs5_template_manager/assets/img/3_0.jpg" alt="Testarticle 1" title="Testarticle 1">
										</div>
									</div>
									<div class="lb_title fs-5 text-secondary-emphasis mt-2 mb-0  line-clamp lc-2">Testarticle 1</div>
								</div>
								<div class="p-1 text-center">
									<div class="lb_ratings mb-3 small">
										<a class="bs5_avg_container link-secondary" href="#" tabindex="-1" data-pid="1" data-class="list" title="Rating"><span class="visually-hidden">Rating: 2.5 of 5 Stars!</span><span class="ratings"><span class="fas empty-stars"></span><span class="fas full-stars" style="width: 50%"></span></span>&nbsp;(2<span class="visually-hidden">&nbsp;Reviews</span>)<i class="fa fa-chevron-down ms-1"></i></a>
									</div>
									<div class="lb_buttons mb-2">
										<a class="btn btn-cart btn-outline-secondary btn-sm" aria-label="buy now" tabindex="-1" href="#"><span title="1 x 'Testarticle 1' order"><span class="fa fa-cart-shopping"></span></span></a>&nbsp;&nbsp;
										<a class="btn btn-wish btn-outline-info btn-sm" href="#" title="Add to wishlist" tabindex="-1"><i class="fa fa fa-heart"></i></a>&nbsp;&nbsp;
										<a class="stretched-link btn btn-info btn-sm" href="#"><i class="fa fa-eye"></i> Details</a>
									</div>
								</div>
								<div class="card-footer">
									<div class="lb_shipping small mb-1">
										<i class="fa fa-truck-fast me-2"></i>Delivery time:<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">3-4 Days</a>
									</div>
									<div class="lb_stock mb-2 small">
										<span class="traffic d-flex align-items-center" title="at stock">Stock:&nbsp;<span class="border border-secondary badge rounded-pill bg-success">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;</span>
									</div>
									<div class="lb_price text-end mb-1">
										<div class="standard_price fs-5">
											<span class="small_price"> from	</span><span class="value_price">145,18 EUR</span>
										</div>
										<div class="lb_vpe text-secondary-emphasis small">145,18 EUR per kg</div>
									</div>
									<div class="lb_tax text-end text-secondary-emphasis small mb-1">
										<span class="small">19 % VAT incl.</span> zzgl.<a tabindex="-1" rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Shipping costs</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button type="button" class="resBtn btn btn-light rightRs" tabindex="-1">
						<i class="fa fa-fw fa-angle-right"></i><span class="visually-hidden">forward</span>
					</button>
				</div>
				<div id="content" class="my-3">
					<div id="product_info" itemscope="" itemtype="http://schema.org/Product">
						<form id="cart_quantity" action="#" method="post">
							<div id="product_details" class="clearfix">
								<div class="pd_title col-md-6 float-md-end ps-md-2 mb-4">
									<div class="position-relative mb-3">
										<div class="pd_manu" itemprop="brand" itemscope="" itemtype="https://schema.org/Brand">
											<a class="link-body-emphasis" title="Manufacturer 1" href="#"><span itemprop="name">Manufacturer 1</span></a>
										</div>
										<h1 class="h3 my-3 bg-h manu_image_p" itemprop="name">Testarticle 90</h1>
										<div class="pd_manu_image position-absolute top-0 end-0">
											<a class="d-inline-block" title="Manufacturer 1" href="#">
												<img class="img-fluid" src="includes/bs5_template_manager/assets/img/1_h.jpg" alt="Manufacturer 1"></a>
										</div>
									</div>
									<div class="pd_inforow small mb-3" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
										<div class="d-inline">
											<a class="bs5_avg_container link-secondary" href="#" data-pid="90" data-class="prod" title="Rating"><span class="visually-hidden">Rating: 3.3 of 5 Stars!</span><span class="ratings"><span class="fas empty-stars"></span><span class="fas full-stars" style="width:66%"></span></span>&nbsp;(3<span class="visually-hidden">&nbsp;Revies</span>)<i class="fa fa-chevron-down ms-1"></i></a>
										</div>
										<meta itemprop="ratingValue" content="3">
										<meta itemprop="bestRating" content="5">
										<meta itemprop="ratingCount" content="3">
									</div>
									<div class="mb-3">
										<div class="small mb-1"><strong>Art.No.:</strong><span itemprop="sku">5689</span></div>
										<div class="small mb-1"><strong>GTIN/EAN:</strong><span itemprop="gtin6">124164</span></div>
										<div class="small mb-1"><strong>HAN:</strong> 2743829</div>
									</div>
									<div class="small mb-1">
										<span class="traffic d-flex align-items-center" title="on stock"><strong>Stock:&nbsp;</strong><span class="border border-secondary badge rounded-pill bg-success">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;<span class="border border-secondary badge rounded-pill">&nbsp;</span>&nbsp;</span>
									</div>
									<div class="pd_shippingrow">
										<i class="fa fa-truck-fast me-2"></i><span class="small"><strong>Delivery time:</strong><a rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">3-4 Days</a></span>
									</div>
								</div>
								<div class="pd_imagebox col-md-6 float-md-start pe-md-2 mb-4">
									<div>
										<div id="ImgCarousel" class="resCarousel position-relative w-100 it1 ResSlid0" data-items="1-1-1-1-1" data-slide="1" data-speed="900" aria-label="Bilderkarusell" data-value="0">
											<button type="button" class="resBtn btn btn-light leftRs"><i class="fa fa-fw fa-angle-left"></i><span class="visually-hidden">back</span></button>
											<div id="pd_viewer" class="resCarousel-inner" tabindex="-1">
												<div class="item text-center">
													<img class="zoomimg img-thumbnail" itemprop="image" src="includes/bs5_template_manager/assets/img/4_0.jpg" alt="Testarticle 90" title="Testarticle 90">
												</div>
												<div class="item text-center">
													<img class="zoomimg img-thumbnail" itemprop="image" src="includes/bs5_template_manager/assets/img/1_0.jpg" alt="Testarticle 90" title="Testarticle 90">
												</div>
												<div class="item text-center">
													<img class="zoomimg img-thumbnail" itemprop="image" src="includes/bs5_template_manager/assets/img/2_0.jpg" alt="Testarticle 90" title="Testarticle 90">
												</div>
												<div class="item text-center">
													<img class="zoomimg img-thumbnail" itemprop="image" src="includes/bs5_template_manager/assets/img/3_0.jpg" alt="Testarticle 90" title="Testarticle 90">
												</div>
											</div>
											<button type="button" class="resBtn btn btn-light rightRs"><i class="fa fa-fw fa-angle-right"></i><span class="visually-hidden">forward</span></button>
										</div>
									</div>
									<div class="pd_more_images my-3">
										<div class="row">
											<div class="col-4 col-sm-3 col-lg-2 mb-2">
												<a role="button" href="#/" class="swap d-inline-block" tabindex="-1" data-goto="0" aria-describedby="zoomtext"><img class="img-fluid img-thumbnail" src="includes/bs5_template_manager/assets/img/4_0.jpg" alt="Testarticle 90" title="Testarticle 90"></a>
											</div>
											<div class="col-4 col-sm-3 col-lg-2 mb-2">
												<a role="button" href="#/" class="swap d-inline-block" tabindex="-1" data-goto="1" aria-describedby="zoomtext"><img class="img-fluid img-thumbnail" src="includes/bs5_template_manager/assets/img/1_0.jpg" alt="Testarticle 90" title="Testarticle 90"></a>
											</div>
											<div class="col-4 col-sm-3 col-lg-2 mb-2">
												<a role="button" href="#/" class="swap d-inline-block" tabindex="-1" data-goto="2" aria-describedby="zoomtext"><img class="img-fluid img-thumbnail" src="includes/bs5_template_manager/assets/img/2_0.jpg" alt="Testarticle 90" title="Testarticle 90"></a>
											</div>
											<div class="col-4 col-sm-3 col-lg-2 mb-2">
												<a role="button" href="#/" class="swap d-inline-block" tabindex="-1" data-goto="3" aria-describedby="zoomtext"><img class="img-fluid img-thumbnail" src="includes/bs5_template_manager/assets/img/3_0.jpg" alt="Testarticle 90" title="Testarticle 90"></a>
											</div>
										</div>
									</div>
									<div id="zoomtext" class="small text-secondary-emphasis mb-5">For a larger view click on the image!
									</div>
								</div>
								<div class="pd_content col-md-6 float-md-end ps-md-2 mb-4">
									<div class="pd_offer" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
										<meta itemprop="url" content="https://testseite.local/mod300_2/product_info.php?products_id=90">
										<meta itemprop="priceCurrency" content="EUR">
										<meta itemprop="availability" content="http://schema.org/InStock">
										<meta itemprop="mpn" content="2743829">
										<meta itemprop="itemCondition" content="http://schema.org/NewCondition">
										<div class="pd_price my-3 py-2 border-info border-top border-bottom text-end" aria-label="Price">
											<div id="pd_puprice" class="mb-2">
												<div class="standard_price fs-4"><span class="value_price">13,09 EUR</span></div>
												<meta itemprop="price" content="13.09">
											</div>
											<div class="pd_tax text-secondary-emphasis small mb-1">19 % VAT incl. excl. <a rel="nofollow" target="_blank" href="#" title="Information" class="iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Shipping costs</a></div>
										</div>
									</div>
									<div class="my-3 py-2 border-bottom">
										<div class="row">
											<div class="col-5 col-xl-3 mb-3 mx-auto">
												<div class="input-group">
													<button id="btn_minus" class="btn btn-outline-secondary" type="button" aria-label="Quantity minus"><i class="fa fa-minus"></i></button>
													<input type="tel" id="qty_input" class="form-control text-center" aria-label="Quantity" name="products_qty" value="1" size="3">
													<input type="hidden" name="products_id" value="90">
													<button id="btn_plus" class="btn btn-outline-secondary" type="button" aria-label="Quantity plus"><i class="fa fa-plus"></i></button>
												</div>
											</div>
											<div class="col-sm-7 col-xl-9 d-grid gap-2">
												<button class="btn btn-cart btn-success" type="submit" title="Add to cart"><span class="fa fa-cart-shopping"></span><span class="mx-3">Add to cart</span></button>
												<button class="btn btn-wish btn-outline-secondary" name="wishlist" type="submit" title="Add to wishlist"><span class="fa fa-heart"></span><span class="mx-3">Add to wishlist</span></button>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 mb-2">
											<a class="iframe btn btn-sm btn-outline-primary btn-block" title="More cheaply seen?" href="#" data-src="#" data-bs-toggle="modal" data-bs-target="#modal"><span><span class="fa fa-envelope me-2"></span><span>More cheaply seen?</span></span></a>
										</div>
										<div class="col-sm-6 mb-2">
											<a class="iframe btn btn-sm btn-outline-primary btn-block" title="Question to article" href="#" data-src="#" data-bs-toggle="modal" data-bs-target="#modal"><span><span class="fa fa-envelope me-2"></span><span>Question to article</span></span></a>
										</div>
										<div class="col-sm-6 mb-2">
											<a class="iframe btn btn-outline-primary btn-sm btn-block" target="_blank" rel="nofollow" href="#" title="Print datasheet" data-src="#" data-bs-toggle="modal" data-bs-target="#modal"><span class="fa fa-print me-2"></span>Print datasheet</a>
										</div>
									</div>
								</div>
							</div>
						</form>
						<div id="horizontalTab" class="card clearfix mb-5">
							<div class="card-header">
								<ul id="bs_tabs" class="nav nav-pills card-header-pills" role="tablist" aria-orientation="horizontal">
									<li class="nav-item" role="presentation">
										<button class="nav-link active" id="prod_desc_tab" data-bs-target="#prod_desc" role="tab" aria-controls="prod_desc" data-bs-toggle="pill" aria-selected="true">Products description
										</button>
									</li>
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="prod_reviews_tab" data-bs-target="#prod_reviews" role="tab" aria-controls="prod_reviews" data-bs-toggle="pill" aria-selected="false" tabindex="-1">Reviews
											<span class="badge text-bg-secondary ms-2">3
											</span>
										</button>
									</li>
								</ul>
							</div>
							<div class="tab-content card-body">
								<div role="tabpanel" class="tab-pane fade active show" id="prod_desc" aria-labelledby="prod_desc_tab" tabindex="0">
									<h2 class="h3 detailbox">Products description</h2>
									<div itemprop="description">Lorem ipsum dolor sit amet consectetuer et nibh et sed lacus. Porttitor Phasellus Curabitur felis nonummy sed mus semper at semper habitasse. Et dolor eros dolor est turpis id ipsum ullamcorper elit Ut. Vitae Maecenas turpis lorem tempor leo congue Mauris Suspendisse adipiscing Phasellus. Nullam velit nunc condimentum sed lacinia tellus enim platea tempus quam. Eros Cum nibh Maecenas elit Aenean iaculis vitae non venenatis consequat. Nunc.
									</div>
									<p class="small mt-4">This Product was added to our catalogue on 09/11/2023.
									</p>
								</div>
								<div role="tabpanel" class="tab-pane fade" id="prod_reviews" aria-labelledby="prod_reviews_tab" tabindex="0">
									<div class="products_reviews">
										<h2 class="h3 detailbox">Reviews<span class="badge text-bg-secondary fs-6 ms-3">3</span></h2>
										<div class="my-3">
											<a target="_blank" href="#" title="Information" class="btn btn-outline-secondary btn-sm iframe" data-src="#" data-bs-toggle="modal" data-bs-target="#modal">Information on the authenticity of customer reviews</a>
										</div>
										<div class="d-flex flex-wrap flex-md-nowrap justify-content-center gap-2">
											<div class="col col-md-auto text-center px-4 mw-100">
												<div class="fs-5 py-2 border-bottom">Average rating: 3</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="border-top">
								<div class="productnavigator">
									<div class="p-3 text-center">
										<span class="visually-hidden">Productsnavigation inside the category</span>
										<p class="small">Product&nbsp;<strong>1&nbsp;of&nbsp;5</strong>&nbsp;in this category</p>
										<div class="d-flex justify-content-around">
											<div><span class="text-secondary-emphasis"><span class="fa fa-backward-fast"></span><span class="d-none d-md-block">first</span></span></div>
											<div><span class="text-secondary-emphasis"><span class="fa fa-backward"></span><span class="d-none d-md-block">back</span></span></div>
											<div><a class="d-inline-block" href="#" title="Übersicht"><span class="fa fa-list"></span><span class="d-none d-md-block">Overview</span></a></div>
											<div><a class="d-inline-block" href="#" title="nächster"><span class="fa fa-forward"></span><span class="d-none d-md-block">next</span></a></div>
											<div><a class="d-inline-block" href="#" title="Letzter"><span class="fa fa-forward-fast"></span><span class="d-none d-md-block">last</span></a></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="layout_footer" class="container-fluid bg-none border-top border-light-subtle py-4">
				<div class="container-xxl navbar">
					<div id="layout_footer_inner" class="row">
						<div class="col-lg-3 col-md-6 mb-3">
							<div class="box-contact">
								<div class="box-heading w-100 navbar-brand border-bottom mb-2">Contact</div>
								<div class="box_sub">Demoshop modified eCommerce Shopsoftware<br>Musterstr. 123<br>12345 Musterstadt<br><br>Tel: 01234 56789<br>Mail: demo@modified-shop.org</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-2">
							<div class="box-cont">
								<div class="box-heading w-100 navbar-brand border-bottom mb-2">More about...</div>
									<ul class="navbar-nav flex-column">
										<li class="nav-item level1"><a class="nav-link" href="#" title="Payment &amp; Shipping"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Payment &amp; Shipping</a></li>
										<li class="nav-item level1"><a class="nav-link" href="#" title="Privacy Notice"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Privacy Notice</a></li>
										<li class="nav-item level1"><a class="nav-link" href="#" title="Conditions of Use"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Conditions of Use</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-2">
							<div class="box-info">
								<div class="box-heading w-100 navbar-brand border-bottom mb-2">Information</div>
									<ul class="navbar-nav flex-column">
										<li class="nav-item level1"><a class="nav-link" href="https://testseite.local/mod300_2/shop_content.php?coID=8" title="Sitemap"><span class="fa fa-chevron-right"></span>&nbsp;&nbsp;Sitemap</a></li>
									</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 mb-2">
							<div class="config box">
								<div class="box-heading w-100 navbar-brand border-bottom mb-2">Payment methods</div>
								<p class="box_sub text-secondary small">The box can be changed in /boxes/box_miscellaneous.html.</p>
							</div>
						</div>
					</div>
					<div class="mod_copyright mx-auto small pb-5">Modified2 &copy; <?php echo date("Y"); ?> | Template &copy; <?php echo date("Y"); ?> by Karl</div>
				</div>
			</div>
			<div id="modal" class="modal modal-xl fade" tabindex="-1" aria-labelledby="title" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 id="title" class="modal-title up mx-auto">Information</h4>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<h1>Delivery time</h1>
							The deadline for delivery begins when paying in advance on the day after the payment order to the remitting bank or for other payments on the day to run after the conclusion and ends with the expiry of...
						</div>
						<div class="modal-footer">
							<button class="btn btn-dark btn-sm" data-bs-dismiss="modal" type="button" title="Close">Close</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	?>
	<div class="copyright">
		<a href="#" rel="nofollow noopener">
			<span class="cop_magenta">mod</span><span class="cop_grey">ified eCommerce Shopsoftware © 2009-<?php echo date("Y"); ?></span>
		</a>
	</div>
	<script src="<?php echo $js_path; ?>jquery.min.js"></script>
	<script src="<?php echo $js_path; ?>bootstrap.bundle.min.js"></script>
	<script>
		$(document).ready(function() {
			// Passwort anzeigen
			$(".togglePw").on("click", function() {
				$(this).toggleClass("fa-eye fa-eye-slash");
				var input = $(this).siblings("input");
				if (input.attr("type") == "password") {
					input.attr("type", "text");
				} else {
					input.attr("type", "password");
				}
			});
      window.parent.load_theme_classes();
		});
	</script>
</body>

</html>