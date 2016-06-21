<select name="<?php echo $field_name; ?>">
  
  <?php if (isset($value['items'])): ?>
  	<?php  $query = $value['items']; ?>
  	<?php if ($query->have_posts()): while($query->have_posts()): $query->the_post(); ?>

	<?php $selected = ($saved_value == get_the_ID()) ? 'selected="selected"' : $saved_value; ?>
		<option value="<?php echo $query->post->ID ?>" <?php echo $selected; ?> ><?php the_title(); ?></option>
	<?php endwhile; endif; ?>
	<?php wp_reset_postdata(); ?>

  <?php endif ?>

  <?php if (isset($value['array'])): ?>

  	<?php $items = $value['array']; ?>

  	<?php foreach ($items as $key => $value): ?>
  		<?php $selected = ($saved_value == $key) ? 'selected="selected"' : ''; ?>
			<option value="<?php echo $key; ?>" <?php echo $selected; ?> ><?php echo $value; ?></option>
  	<?php endforeach ?>

  <?php endif ?>
  
  


</select>
