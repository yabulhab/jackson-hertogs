<style>

body {
  /* Location of the image */
  	background-image: url(wp-content/themes/mytheme/images/home.jpg);
	background-position: center top;
  	background-repeat: no-repeat;
  	background-attachment: fixed;
  	background-size: cover;
  	background-color: #464646;
}

</style>


<div id="change-header" class="transparent-header">
	<?php get_header(); ?>
</div>
<script>
	$('#change-header #brand-large').attr('src', '/wp-content/themes/mytheme/images/jhLogoWhite.png');
	$('#change-header #brand-small').attr('src', '/wp-content/themes/mytheme/images/jhLogoSmallWhite.png');
</script>

<!-- Jumbotron -->
  <?php
    if (!is_singular()) {
      ?>
    <div class="jumbotron" id="home-jumbo">
      <div class="container">
        <h2 id="nation">WE ARE A NATION OF IMMIGRANTS.</h2>
      		<div id="full-quote">
		        <p id="main-quote">"Our people come from every corner of the globe. That's what makes us special. That's what makes us unique. And through our history, we've come here in wave after wave from everywhere understanding that there was something about this place where the whole was greater than the sum of its parts."</p>
		        <p id="main-obama">-President Barack Obama, June 30, 2014</p>
		    </div>
	   </div>
    </div>
    <?php
      }
    ?>

<div class="home-section" id="our-history">
	<div class="container">
		<h3 class="home-h3">OUR HISTORY & PHILOSOPHY </h3>
		<p class="home-desc">
			Jackson & Hertogs, established in 1950, provides cutting-edge legal advice and expert representation to corporations and individuals from all the high technology sectors to financial services.  A leader in immigration law for over half a century, our firm has received top accolades from every major legal directory, including Chambers USA, Who’s Who Legal, US News & World Report, and Martindale-Hubbell.
 			<br/>
 			<br/>
			Our client portfolio ranges from large multi-national companies to recent startups and individual entrepreneurs. With our main focus being corporate immigration, we typically represent employers seeking to hire and retain foreign national personnel for professional, managerial and executive occupations. Services include the preparation and filing of various work visas (e.g., H-1B, L-1, TN, E and O-1) and “green card” applications (e.g., PERM, Outstanding Researcher, Extraordinary Ability and National Interest Waiver). We also provide guidance, development and execution of corporate immigration benefits programs. Our commitment to clients does not end with our securing a nonimmigrant visa status for an employee—we partner with our clients to help to ensure continued work authorization and continuity in the immigration process. We provide advice on compliance issues regarding E-Verify enrollment, I-9 completion and retention and LCA and PERM documentation.  In addition, we frequently represent individuals in family based visa petitions and on applications for naturalization and EB5 investor visas.
			<br/>
			<br/>
			As a corporate immigration firm representing high-tech professionals and with clients all over the world, we leverage technology to enable us to provide service in a timely and efficient manner virtually anywhere. To this end, we provide a secure database system which assists us in facilitating the exchange of real-time information with our clients. We invest in a robust network and best-in-class servers, desktops and laptops in order to ensure reliability and redundancy. We are able to share information with colleagues and clients around the globe by phone, smartphone and laptop. We have access to our systems remotely and can provide direct counsel to clients from anywhere that has Wi-Fi access.
		</p>
	</div>
</div>
<div class="home-section" id="services">
	<div class="container">
		<h3 class="home-h3">RESOURCES & SERVICES</h3>
		<p class="home-desc">Jackson & Hertogs is a corporate immigration firm that represents mid-cap, large-cap and start up companies and their employees. Our service philosophy is simple. We obtain approval of applications and petitions from immigration and labor authorities within the shortest period of time and as economically as possible. Utilizing the latest office technology and a team of highly trained personnel, our goal is to provide the shortest possible turnaround time -- without compromising the quality of our work.</p>

		<p class="home-desc">In the fast moving world of immigration, it is vital to keep abreast of the most recent court decisions, proposed regulatory and policy changes that might affect our clients' needs, as well as our ability to service those needs. We maintain a complete immigration law library, and our attorneys are active in the immigration bar and are frequent speakers in the area of immigration law and procedure.</p>

		<p class="home-desc">Although our attorneys may emphasize one or more areas of immigration law, our clients are served by, and are clients of, the entire firm. This approach, coupled with our specialization, permits us to serve the large corporation as well as families and individuals.</p>
		<div class="center-button">
			<a href="/wordpress/services
			">
				<button id="all-services-btn" class="btn btn-default orange-button">ALL SERVICES</button>
			</a>
		</div>
	</div>
</div>
<div class="home-section" id="the-team">
	<div class="container">
		<h3 class="home-h3">THE TEAM</h3>
		<p class="home-desc">We have successfully served the immigrant community for over 50 years by leveraging the drive, intellect, and experience of our attorneys. Our lawyers regularly contribute to major legal publications, and are regularly invited to speak before regional and national audiences. We have been recognized by clients and peers as leaders in our fields. Meet our professionals by clicking on the photos below.</p>

		<div class="row">

			<!-- EMPLOYEES -->
			<div class="col-xs-12">
				<!-- NEW EMPLOYEES -->
				<div class="foobar">
					<section class="image-grid">

				<?php
					// Sets arguments to query for only the employees posts
					$args = 'category_name=Employees';
					// Queries those posts from the db
					query_posts( $args );
				?>
				<?php if(have_posts()) : ?>
				<!-- This is the loop: -->
					<?php while(have_posts()) : the_post(); ?>

							<!-- I want one of these articles for every employee -->
						<article class="anchor image__cell is-collapsed" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="image--basic">
								<a href="#expand-jump-<?php the_ID();?>" class="">
									<?php
										// echo "the id " . the_ID();
										$id_number = get_the_ID();
										$photo_id = 'expand-jump-' . $id_number;

										if ( has_post_thumbnail() ) {
										the_post_thumbnail('full', array('class' => 'basic__img move-up'
											, 'id' => $photo_id
											));
										} else {
											echo "<img src='wp-content/themes/mytheme/images/no-photo.png' class='basic__img move-up' id=";
											echo $photo_id;
											echo ">";
										}
										echo "<h2 class='post-title'>";
										echo the_title();
										echo "</h2>";
									?>
								</a>
								<div class="arrow--up"></div>
							</div>
							<div class="image--expand">
								<a href="#close-jump-<?php the_ID(); ?>" class="expand__close"></a>
								<div class="team-desc"> <?php the_content(); ?></div>
							</div>
						</article>

					<?php endwhile; ?>

					<?php if (!is_singular()) : ?>
						<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
						<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
					<?php endif; ?>

					<?php else : ?>

						<div class="alert alert-info">
						  <strong>No content in this loop</strong>
						</div>

					<?php endif; ?>

					</section>
				</div>
				<!-- End employees loop-->


			</div>
		</div>
	</div>
</div>
<div class="home-section" id="the-latest">
	<div class="container">
		<h3 class="home-h3">THE LATEST</h3>
		<p class="home-desc">
					<div class="row">

			<?php
					// Sets arguments to query for the latest news post
					$args = 'category_name=News&posts_per_page=1';
					// Queries those posts from the db
					query_posts( $args );
				
				if(have_posts()) : 
				//This is the loop
					while(have_posts()) : the_post(); ?>
						<div class="col-xs-12 col-sm-3">
							<span class="home-news-date"><?php the_date( n.".".j.".".Y ); ?></span>
						</div>
						<div class="col-xs-12 col-sm-9">
							<a href="<?php echo get_permalink(); ?>">
								<div class="home-news-headline">
									<?php the_title(); ?>
								</div>
							</a>
						</div>
					<?php endwhile;?>
				<?php endif;?>
		</p>
		<div class="center-button"><a href="/wordpress/news"><button class="btn btn-default orange-button">NEWS ARCHIVE</button></a></div>
		</div> <!-- end row -->
	</div>
</div>

<?php get_footer(); ?>
<style>

body {
  /* Location of the image */
  	background-image: url(wp-content/themes/mytheme/images/home.jpg);
	background-position: center top;
  	background-repeat: no-repeat;
  	background-attachment: fixed;
  	background-size: cover;
  	background-color: #464646;
}

</style>