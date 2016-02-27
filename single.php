<?php
/*
Template Name: Single
*/
?>
<div class="white-header">
<?php get_header(); ?>
</div>
<style>
body { background-color: white); }
</style>

<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
<div class="basic-page" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="jumbotron bump" id="page-jumbo">
		<div class="container">

	<style> #page-jumbo { background-image: url('<?php
				$cats = get_the_category();
				$cat_name = $cats[0]->name;
				if( $cat_name == "News" ){
					$post_thumbnail_id = get_post_thumbnail_id( 2, "full" );
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
					echo $post_thumbnail_url;
				} else {
					$post_thumbnail_id = get_post_thumbnail_id();
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
					echo $post_thumbnail_url;
				}
		?>'); }
	</style>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h2 class="basic-jumbo-header">

				<?php
					$cats = get_the_category();
					$cat_name = $cats[0]->name;
					if( $cat_name == "News" ){
						echo "News";
					} else {
					 	the_title();
					}
				?>
			</h2></a>

		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="home-desc col-xs-12">
				<?php if(!is_page('News')){ ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h2 class="basic"><?php the_title(); ?></h2></a>
				<?php } ?>
				<div class="featured-news-date">
					 <?php the_date( n.".".j.".".Y ); ?>
				</div>
	 			<div class="basic-page-content">
	 				<?php the_content(); ?>
	 			</div>
			</div>
		</div>
	</div> <!-- End single container-->
	<?php endwhile; ?>
<?php endif; ?>
<!-- End First News Item -->
	<!-- <div class="basic-page"> -->

	<div class="archive-header-bar"><div class="container">MORE NEWS</div></div>
		<?php
			// Dispaly the archive:
			wp_reset_postdata();

			function posts_by_year() {
			  // array to use for results
			  $years = array();

			  // get posts from WP
		      $news_archive1 = array(
								    'numberposts' => -1,
								    'orderby' => 'post_date',
								    'order' => 'ASC',
								    'post_type' => 'post',
								    'post_status' => 'publish',
								    'category_name' => 'News'
								  );
			  $posts = get_posts($news_archive1);

			  // loop through posts, populating $years arrays
			  foreach($posts as $post) {
			    $years[date('Y', strtotime($post->post_date))][] = $post;
			  }

			  // reverse sort by year
			  krsort($years);

			  return $years;
		} ?>
	<!-- <div class="basic-page"> -->
		<div class="container">
			<div class="row">
				<div class="home-desc col-xs-12">
					<div class="basic-page-content">
					<?php foreach(posts_by_year() as $year => $posts) : ?>

						<div class="newsArchiveHeader">
							<span>
							  	<?php echo $year; ?>
							  	<img class="pull-right indicator" src="../../../../wp-content/themes/mytheme/images/down-arrow.png" data-swap="../../../../wp-content/themes/mytheme/images/x-button.png">
								<hr class="newsArchiveLine">
							</span>
						</div>
						<div class="newsArchiveContent">
							<ul class ="newsArchUl">
							    <?php foreach($posts as $post) : setup_postdata($post); ?>
							    <div class="row">
           						 	<li class="newsArchiveListItem">
							   		 <p class="newsArchDate col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"><?php the_date(F." ".j)?></p>
							        <a href="<?php the_permalink(); ?>"><p class="newsArchTitle col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12"><?php the_title(); ?></p></a>
							      </li>
							  	</div>
							    <?php endforeach; ?>
							</ul>
		 				</div>
							<?php endforeach;

							wp_reset_postdata();

    					?>

					</div>
				</div>
			</div>
		</div>
	</div>
    <script type="text/javascript" src="../../../../wp-content/themes/mytheme/js/jackson.js"></script>



<?php get_footer(); ?>

