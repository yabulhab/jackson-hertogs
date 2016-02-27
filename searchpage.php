<div class="white-header">
<?php get_header(); ?>
</div>

<style>
body { background-color: white); }
</style>

		<div class="basic-page">
			<div class="jumbotron bump" id="page-jumbo">
				<div class="container">
					<style> #page-jumbo { background-image: url('../wp-content/themes/mytheme/images/searchResults.jpg'); }
					</style>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><h2 class="basic-jumbo-header">SEARCH RESULTS</h2></a>

				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="home-desc col-xs-12">

						<!-- <a href="" title="<?php the_title_attribute(); ?>"> -->
							<h2 class="basic">Search Results:</h2>
						<!-- </a> -->
 						<div class="basic-page-content">
 							<?php
	 							$the_search = $_GET['search-terms'];
	 							$terms = explode(' ', $the_search);
	 							$args = array(
									"s" => $terms[0]
							);
							$query = new WP_Query( $args );

 							$results = $query->get_posts();
 							// echo "<pre>";
 							// var_dump($results);
 							// echo "</pre>";
 							foreach($results as $result){ ?>

								<div class="related-resources-links">
									<a href="<?php echo $result->guid?>">
										<?php echo $result->post_title; ?>
									</a>
								</div>
							    <hr class="newsArchiveLine">

 							<?php
 							}
 							 ?>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php get_footer(); ?>