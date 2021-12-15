<?php
$trans_faq_title = get_field('faq_title');

$trams_faq_button = get_field('faq_button');
?>

<?php if( have_rows('trams_faq_question_row')): ?>
	<section class="frequentlyasked-questions ">
		<div class="container">
			<div class="">
				
				<?php if(!empty($trans_faq_title)):?>
				<div class="frequentlyasked_questions__row__title">
					<h2><?php echo $trans_faq_title;?></h2>
				</div>
				<?php endif;?>
				
				<div class="frequentlyasked_questions__row__wrapper">
					<div class="accordion" id="accordionExample">
						<?php $cnt=0;?>
						<?php while ( have_rows('trams_faq_question_row')): the_row(); ?>
					   <div class="card <?php echo $cnt==0? 'active':'';?>">
					   	  <div class="card-header" id="heading<?php echo $cnt;?>">
				                <h2 class="mb-0">
				                    <a href="javascript:void(0)"  class="btn btn-link <?php echo $cnt==0? 'active':'';?>"" data-toggle="collapse" data-target="#collapse<?php echo $cnt;?>">	 <?php echo get_sub_field('faq_question');?></a>									
				                </h2>
				            </div>
				           <div id="collapse<?php echo $cnt;?>" class="collapse <?php echo $cnt==0? 'show':'';?> " aria-labelledby="heading<?php echo $cnt;?>" data-parent="#accordionExample">
			                <div class="card-body">
			                    <p> <?php echo get_sub_field('faq_answer');?></p>
			                </div>
			          	  </div>
					 
					  </div>
				<?php $cnt++; ?>
				<?php endwhile; ?>	  
					</div>
				</div>
	
				<?php if($trams_faq_button):?>

					<div class="frequentlyasked_questions__row__button">
						<div class="button">
							<a href="<?php echo esc_url($trams_faq_button['url']); ?>" target="<?php echo $trams_faq_button['target'];?>" title="<?php echo esc_attr($trams_faq_button['title'])?>">
								<?php echo $trams_faq_button['title'];?>
							</a>
						</div>
					</div>

				<?php endif;?>
				
			</div>
		</div>
</section>
<?php else :
    // no rows found
endif;

