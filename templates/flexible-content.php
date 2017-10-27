<div class="flexible-content">
	<?php
	if( have_rows('flexible_content') ):
		$i = 0;
		$first = true;
		while ( have_rows('flexible_content') ) : the_row();
			if( get_row_layout() == 'text' ): ?>
				<div class="<?php echo ($first) ? 'first' : ''; ?>">
					<?php the_sub_field('text'); ?>
					<?php $first = false; ?>
				</div>
			<?php elseif( get_row_layout() == 'quote' ):  ?>
				<div class="quote">
					<blockquote><?php the_sub_field('quote'); ?></blockquote>
					<figure><?php the_sub_field('quote_author'); ?></figure>
				</div>
			<?php elseif( get_row_layout() == 'image' ): ?>
				<?php $full = (get_sub_field('is_full_screen')) ? 'full-screen' : ''; ?>
				<div class="image <?php echo $full; ?>">
					<img src="<?php echo get_sub_field('image')['url']; ?>">
				</div>
			<?php elseif( get_row_layout() == 'callout' ): ?>
				<div class="callout">
					<?php the_sub_field('callout'); ?>
				</div>
			<?php elseif( get_row_layout() == 'faqs' ): ?>
				<h3 class="faq-title"><?php the_sub_field('title'); ?></h3>
				<?php if( have_rows('faq_item') ): ?>
					<div id="accordion" class="faq" role="tablist" aria-multiselectable="true">
						<?php $i = 1; ?>
						<?php while ( have_rows('faq_item') ) : the_row(); ?>
							<div class="card">
								<div class="card-header" role="tab" id="headingOne">
									<h5 class="mb-0">
										<a <?php echo ($i > 1) ? 'class="collapsed"' : ''; ?> data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="<?php echo($i == 1) ? 'true' : 'false'; ?>" aria-controls="collapse<?php echo $i; ?>">
											<?php the_sub_field('question'); ?>
											<?php echo svg('arrow-down'); ?>
										</a>
									</h5>
								</div>
								<div id="collapse<?php echo $i; ?>" class="collapse <?php echo ($i == 1) ? 'show' : ''; ?>" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
									<div class="card-block">
										<?php the_sub_field('answer'); ?>
									</div>
								</div>
							</div>
							<?php $i ++; ?>
						<?php endwhile; ?>
					</div>
				<?php endif;
			endif;
			$i ++;
		endwhile;
	endif; ?>
</div>
