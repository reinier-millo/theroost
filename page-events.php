<? get_header(); ?>
<div class="left_column featured_events">
  <div class="featured_event">
    <div class="date">Saturday, May 5</div>
    <div class="time">8pm</div>
    <h4>Artist Name</h4>       
    <div class="cost">
      All Ages $10
    </div>               
    <img src="http://dummyimage.com/480x360/333333/666666&text=PHOTO" alt="TITLE">
    <a href="#/">RSVP</a>
  </div>   
  <div class="featured_event">
    <div class="date">Saturday, May 5</div>
    <div class="time">8pm</div>
    <h4>Artist Name</h4>       
    <div class="cost">
      All Ages $10
    </div>               
    <img src="http://dummyimage.com/480x360/333333/666666&text=PHOTO" alt="TITLE">
    <a href="#/">RSVP</a>
  </div>      
</div>                 

<div class="right_column">
  <h3>Upcoming Shows</h3>
  <ol class="upcoming_shows">     
    <? global $post; ?>  
    <? $events = get_posts( array( 
        'numberposts' => -1,
        'orderby' => 'meta_value',
        'meta_key' => 'event_date',
        'order' => 'ASC',
        'post_type' => 'events',
        'post_status' => 'publish'      
     )); ?>
    <? foreach($events as $post): ?>  
      <? setup_postdata($post); ?> 
      <? if(strtotime(get_field('event_date')) > time()): ?>
        <? $month = date('F', strtotime(get_field('event_date'))); ?>
        <? if($last_month != $month): ?>
          <li class="month"><h6><?= $month; ?></h6></li>
          <? $last_month = $month; ?>
        <? endif; ?>
        <li>   
          <div class="artist"><? the_title(); ?></div>
          <div class="date"><?= date('l, F j', strtotime(get_field('event_date'))); ?></div>          
          <div class="time"><? the_field('event_time'); ?></div>
        </li>                                               
      <? endif; ?>
    <? endforeach; ?>
    <? wp_reset_postdata(); ?>       
        
  </ol>
</div>

<div class="clear"></div>

<? get_footer(); ?>