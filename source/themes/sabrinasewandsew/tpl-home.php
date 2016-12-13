<?php 
/*
Template Name: Home
*/  

get_header(); ?>

    <div class="parallax-window hidden-xs hidden-sm" id="styles" data-parallax="scroll" data-image-src="<?php bloginfo('template_directory'); ?>/content/images/styles-image.jpg" data-positionY="500" naturalWidth="1100" naturalHeight="957"></div>
<?php
// Grab the content of the subpages
$about = array(
  'post_type' => 'page',
  'pagename' => 'about'
);

$aboutPage = new WP_Query( $about );

// Display each subpage in its own section
if ($aboutPage->have_posts()) :
  while ( $aboutPage->have_posts() ) : $aboutPage->the_post(); 
    $subhead = get_post_meta( $post->ID, 'page-subhead' ); ?>
    <!-- About -->
    <section id="aboutMe">
      <div class="col-xs-12">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </div>
    </section>
<?php endwhile;
endif; wp_reset_query(); ?>
    <div class="divider col-xs-12"></div>
    <section id="bts">
      <div class="col-xs-12">
        <h1>Portfolio</h1><a class="instagram-link" href="//www.instagram.com/sabrinasewsew/" title="Follow Sabrina Sew &amp; Sew on Instagram for more behind the scenes photos of fashion design and seamstress work in Austin, Texas" target="_blank"> <i class="fa fa-instagram fa-fw"></i>Follow me on Instagram for more  </a>
      </div>
      <div class="col-xs-12">
        <h2> <em>The Royal Decent</em><br><small>by Danni Ordonez, Nico Nico Nordström, Michi Lafary</small></h2>
      </div>
      <div class="col-xs-12" id="gallery">
        <div class="row">
          <div class="gallery-image col-xs-12 col-md-4"><a href="http://www.theroyaldescent.com/" target="_blank"><img class="img-responsive" src="<?php bloginfo('template_directory'); ?>/content/gallery/marie02.jpg" alt=""></a></div>
          <div class="gallery-image col-xs-12 col-md-4"><a href="http://www.theroyaldescent.com/" target="_blank"><img class="img-responsive featured" src="<?php bloginfo('template_directory'); ?>/content/gallery/mariecover.jpg" alt=""></a></div>
          <div class="gallery-image col-xs-12 col-md-4"><a href="http://www.theroyaldescent.com/" target="_blank"><img class="img-responsive landscape" src="<?php bloginfo('template_directory'); ?>/content/gallery/marie07.jpg" alt=""></a><a href="http://www.theroyaldescent.com/" target="_blank"><img class="img-responsive landscape" src="<?php bloginfo('template_directory'); ?>/content/gallery/marie06.jpg" alt=""></a></div>
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <h3>About</h3>
        <p>This editorial was a labor of love by 3 creatives driven by fashion and art . This project took about 2 years of blood, sweat, and tears - proving to ourselves that we could produce the art that our hearts longed to make and could only dream of. This was the first of many projects together learning and growing along the way. We were inspired by the life and legacy of Marie Antoinette, but rather than shooting just a timepiece we decided to add modern and whimsical elements. We built props, costumes, and sets by hand on a shoe string budget - Often begging and borrowing resources from friends, strangers, and boutiques. We all worked together as a team to collaborate on everything from the most major of scenes to the most minute of details. Because of this project we dyed a horse pink (safely of course), shot in mansions, made a ridiculous amount of cakes, and formed lifelong friendships.</p>
        <p>More at:</p>
        <ul>
          <li><a href="http://www.theroyaldescent.com/" target="_blank">The Royal Decent </a>(official site)</li>
          <li><a href="http://niconordstrom.tumblr.com/post/152317029559/the-queens-chambers-behind-the-scenes">Nico Nordström Photography</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-6">
        <h3>Credits</h3>
        <ul>
          <li> <strong>Creative Director: </strong>Danni Ordonez, Nico Nico Nordström, Michi Lafary</li>
          <li> <strong>Concept: </strong>Danni Ordonez, Michi Lafary</li>
          <li> <strong>Photographer: </strong>Nico Nordstrom</li>
          <li> <strong>Fashion Stylist: </strong>Danni Ordóñez Styling</li>
          <li> <strong>Wig Maker &amp; Hair Stylist: </strong>Michi Lafary</li>
          <li> <strong>Mua / Wig &amp; Hair Assistance: </strong>Sarah Contey</li>
          <li> <strong>Models: </strong>Samantha Gloor, Santiago Anaya Model Page, Austin Warner, Tiffany Desirai , Adam Carmichael , Christine Breanne Tadlock, Tony Redmer, Brittney Denson, Mackenzie Block, Lora Overton</li>
          <li> <strong>Set: </strong>Nico Nordstrom, Danni Ordonez, Ryan Blair</li>
          <li> <strong>Wardrobe Assistance: </strong>Sabrina Loyless</li>
          <li> <strong>Textile construction: </strong>Sabrina Loyless</li>
          <li> <strong>Home Design: </strong>Benny Daneshjou </li>
          <li> <strong>Wig &amp; Hair Assistance Assistance: </strong>Emilie Litzell Hair Stylist, Shreeda J. Shreeda J Tailor</li>
          <li> <strong>BTS Videographer: </strong>Clinton Sterling Mynier</li>
          <li> <strong>Women’s Wear Designers: </strong>Sally Daneshjou Collection, Chasity Sereal</li>
          <li> <strong>Menswear Designer / Men's Styling Assistance: </strong>Ross Bennett</li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-6">
        <iframe class="center-block" src="//www.youtube.com/embed/y3YGigDuRv8?rel=0" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="col-xs-12 col-md-6">
        <iframe class="center-block" src="//www.youtube.com/embed/TC9YF9Wlue8?rel=0" frameborder="0" allowfullscreen></iframe>
      </div>
    </section>
    <div class="divider col-xs-12"></div>
    <section id="testimonials">
      <h1 class="col-xs-12">Testimonails From Happy Clients</h1>
      <div class="col-md-6">
        <blockquote>
          <p> <em>When my wife Amy and I decided to get married, we automatically thought of asking Sabrina to make our dresses. Not just because she is our friend, but because of her extraordinary talent. Though the task of creating two custom wedding dresses was quite large, our confidence in her never wavered. She's a total pro. We couldn't be more pleased. Thank you so much, Sabrina!</em></p>
          <footer>Becca and Amy Brennan-Luna, March 2016</footer>
        </blockquote>
      </div>
      <div class="col-md-6">
        <blockquote>
          <p><em>Recently my best friend got married and asked me to be her matron of honor. She requested that I pick from a selection of dresses from a website that had very lovely options at an affordable price.</em></p>
          <p> <em>Each order from that site is custom-made for size and with that, not returnable. When I received the dress it was ill-fitting, with bust of the garment sitting in the wrong place. I knew I needed an alteration and more than the typical hem or “take-in a size”. I asked Sabrina to help me with this dilemma and she agreed to work her seamstress magic on this dress. We brainstormed through a couple of  fittings the changes I would like to be made and came up with some new ideas to fix the bust.</em></p>
          <p><em>She worked wonderful seamstress magic and I ended up with a finished garment that looked like a whole new dress. It fit to perfection. She upped the lovely level to gorgeous. My bestie bride was very happy with the results. I could not have asked for a better experience.</em></p>
          <p><em>Thank you, Sabrina!!</em></p>
          <footer>Candace Guadarrama, March 2016</footer>
        </blockquote>
      </div>
    </section>
    <div class="divider col-xs-12"></div>
    <section id="contact">
      <h1 class="col-xs-12">Contact Sabrina Sew & Sew</h1>
      <div class="col-md-3 col-xs-6 text-center"><a href="mailto:sabrinasewandsew@gmail.com" target="_blank"><i class="fa fa-fw fa-envelope-o center-block"></i>Send a Message</a></div>
      <div class="col-md-3 col-xs-6 text-center"><a href="//facebook.com/sabrinasewandsew" target="_blank"><i class="fa fa-fw fa-facebook center-block"></i>Follow me on Facebook</a></div>
      <div class="col-md-3 col-xs-6 text-center"><a href="//twitter.com/sabrinasewsew" target="_blank"><i class="fa fa-fw fa-twitter center-block"></i>Follow me on Twitter</a></div>
      <div class="col-md-3 col-xs-6 text-center"><a href="//instagram.com/sabrinasewsew" target="_blank"><i class="fa fa-fw fa-instagram center-block"></i>Follow me on Instagram</a></div>
    </section>
<?php get_footer(); ?>