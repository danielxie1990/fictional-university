<?php 
  get_header(); 
  pageBanner(array(
      'title' => 'Our Campuses',
      'subtitle' => 'We have serveral conveniently located campuses.'
  ));
  ?>

<div class="container container--narrow page-section">
    <div class="acf-map">
        <?php 

        while(have_posts()) {
          the_post(); 
          $mapLoaction = get_field('map_loaction');
          print_r($mapLoaction);
          ?>

        <div class="marker" data-lat="<?php echo $mapLoaction['lat']; ?>" data-lng="<?php echo $mapLoaction['lng']; ?>"></div>


        <?php }

          echo paginate_links()

       ?>

    </div>

</div>



<?php get_footer();

 ?>