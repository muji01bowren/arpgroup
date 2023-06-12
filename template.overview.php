<?php
  /*
    Template Name: Overview
  */

  get_header();

  global $post;
  setup_postdata( $post );
    echo is_page_template();
?>
<style>
    /******DEFAULTS******/ /*

associative array
$numbers: (3 "three") (4 "four");

@each $i in $numbers {
  .thismustbeahash{nth($i,2)}-thismustbehash{nth($i,1)} {
    !* CSS styles *!
  }


  example
  .three-3 {
    CSS styles
  }

  .four-4 {
     CSS styles
  }


}*/
    /******DEFAULTS******/
    /******padding******/
    /******Font Sizes******/
    /******Colors******/
    /******Background Colors******/
    /******Font Sizes******/
    /******Line Height******/
    body {
        background-color: #FFFFFF;
    }

    .companies {
        display: block;
    }
    .companies .col-12 {
        color: azure;
        margin-top: 5vh;
        background-color: #085895 !important;
        font-family: "Poppins", sans-serif;
        text-transform: uppercase;
        font-weight: 800;
        padding: 0.5rem;
    }
    .companies div.column {
        position: relative;
    }
    .companies #ent-logo {
        position: absolute;
        top: 2px;
        height: 300px;
        width: 100%;
        background-size: cover;
        z-index: 99999;
    }
    .companies .col-5 {
        background-image: url(/img/ARPC.jpeg);
        background-size: cover;
        background-repeat: no-repeat;
    }
    .companies .col-6 {
        padding: 1.5vh;
        border: 1px solid black;
        text-transform: capitalize;
        font-weight: 600;
    }
    .companies img.card-img-top {
        border: 0.1rem solid black;
        border-radius: 0%;
    }
    .companies div.card {
        border: 0;
        border-radius: 0%;
    }
    .companies .card-img-overlay {
        border-radius: 0%;
        border: 1px solid black;
    }
    .companies #lastdiv {
        margin-top: 0;
        background-color: #ffffff !important;
        height: 15vh;
        border: 1px solid black;
    }
    .companies .col-12.bg-primary {
        padding: 25px 20px;
    }

    .three-column .card {
        border: none;
        margin-bottom: 18px;
    }
    .three-column .card img {
        margin-bottom: 15px;
        border: none;
        border-radius: 0;
    }
    .three-column .card-title {
        color: #FFFFFF;
    }
    .three-column .btn, .three-column .--bs-btn-border-radius {
        border-radius: 0;
    }
    .three-column .card-body {
        margin-bottom: 18px;
    }
    .three-column .card-body > * {
        /*text-transform: uppercase;*/
    }
    .three-column .d-grid .btn, .three-column .card-body {
        padding: 25px 20px;
    }

</style>

<!--BEGIN: container-->
<div class="arp-groups-associates arp-container">
    <div class="groups-associates-content-area">
        <div class="content-container">
          <?php the_content(); ?>
        </div>
        <?php
          $groups = get_field( 'groups__associations', $post->ID );

          if( !empty( $groups ) ) {
              foreach( $groups as $g ) {
                if( $g['link'] == '' || $g['link'] == '#' ) {?>
                  <a target="_blank" href="#" onclick="return false" style="background-image: url('<?php echo $g['logo']['url']; ?>')"></a>
                <?php } else { ?>
                  <a target="_blank" href="<?php echo $g['link']; ?>" style="background-image: url('<?php echo $g['logo']['url']; ?>')"></a>
                <?php } 

              }
          }
        ?>

        <div class="clear-fix"></div>
        <a href="<?php echo get_bloginfo('url'); ?>/contact/" class="btn primary">CONTACT US</a>
    </div>
</div>



<!--new code start-->
<div class="container three-column">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body bg-primary">
                    <h5 class="card-title">Building and construction</h5>
                    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                </div>
                <!--<br>-->
                <img src="<?php bloginfo('template_url'); ?>/public/img/ARPC.jpeg" class="card-img-bottom" alt="...">
                <!--<br>-->
                <div class="d-grid gap-2">
                    <a href="<?php bloginfo('template_url'); ?>/public/Companies/Building-andConstruction-page.html" class="btn btn-dark" type="button">find out more</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body bg-success">
                    <h5 class="card-title">Property development</h5>
                    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                </div>
                <!--<br>-->
                <img src="<?php bloginfo('template_url'); ?>/public/img/Propdev.jpeg" class="card-img-bottom" alt="...">
                <!--<br>-->
                <div class="d-grid gap-2">
                    <button class="btn btn-dark" type="button">find out more</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card">
                <div class="card-body bg-warning">
                    <h5 class="card-title">Building and plan materials</h5>
                    <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
                    <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
                </div>
                <!--<br>-->
                <img src="<?php bloginfo('template_url'); ?>/public/img/ARPH.jpeg" class="card-img-bottom" alt="...">
                <!--<br>-->
                <div class="d-grid gap-2">
                    <button class="btn btn-dark" type="button">find out more</button>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
        <script rel="script" src="/src/javascript/setup.js"></script>
    </div>
</div>
<!--new code end-->

<?php get_footer();  ?>
