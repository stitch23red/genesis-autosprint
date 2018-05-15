<?php
/* Add HTML to front page only */
/*
	add_action ('genesis_before_content','wizzit_homepage_div_top');

	function wizzit_homepage_div_top() { ?>
		<div class='wizzit-homepage-top-section'>
			<div class='wizzit-homepage-top-section-slogan'>
				<h1>Easter Weekend 2020 | Two Days of Street Racing Action</h1>
				<h2>Witness the streets of Port Lincoln come alive with the sound of the most powerful, tough and exotic racing machines in the country.</h2>
			</div>

			<div>
				<div class='counter-container'>
					<div id='counter1' class='counter'>
						<span class='counter-days'>
							<h3 id='c1d'></h3>
							<h4>Days To Go</h4>
						</span>

					</div>

				</div>
			</div>


		</div>

	<?php }

	*/
	
	//Add div before post loop
	add_action('genesis_before_loop', 'wizzit_pre_loop_div');
	function wizzit_pre_loop_div() {
		include(get_stylesheet_directory() . '/inc/templates/preloop.php');
	}

  add_action ('genesis_after_content','wizzit_homepage_div_bottom');

  function wizzit_homepage_div_bottom() {
    echo '<div class=\'wizzit-homepage-bottom-section\'></div>';
  }

  genesis();
