<?php get_header(); ?>

<?php

$the_title = 'Our Engineers';
$terms = get_terms( 'teammembers_cat',array(
  'hide_empty' => false,
));
?>

<?php 
$password = 'dreamteam';
if(isset($_POST['password_teammembers']) && $_POST['password_teammembers'] === $password ) {
  $_SESSION['teammembers_access'] = true;
}

if($_SESSION['teammembers_access']) {

?>

<div class="sirin-teammembers">
    <div class="banner">
        <div class="container">
            <h1>
                <?php echo $the_title ?>
            </h1>
        </div>
    </div>

    <br>
    <br>
    <?php
      $all_cats_class = 'teammembers_all_categories';
      $categories = [];
      $categories[] = [
          'name' => 'All categories',
          'class' => $all_cats_class
      ];
    ?>
    <?php foreach ( $terms as $term ):?>    
    <?php 
      $categories[] = [
        'name' => $term->name,
        'class' => $term->slug,
        'slug' => $term->slug,
        'count' => 0,
      ]; 
    ?>      
    <?php endforeach; ?>
    <div class="container">
        <div class="categories cat-sort open auto-height">
            <ul>
               
            </ul>
        </div>
    </div>

    <div class="container">
      <div class="items items-iso">
          <?php
            $args = array(
                'post_type' => 'teammembers',
                'posts_per_page' => 99999,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $item_class = $all_cats_class;
            $loop = new WP_Query( $args );

            if($loop->have_posts()):
          ?>
              <?php $i=1;
              $all_team_count = 0;
              while ( $loop->have_posts() ) : $loop->the_post();?>
                  <?php
                    $all_team_count++;
                    $post_id = get_the_ID();
                    $cats = get_the_terms($post_id, 'teammembers_cat');
                    $cat_to_class = '';
                    foreach ($cats as $cat) {
                      $cat_to_class .= ' '.$cat->slug;
                      $cat_i = 0;
                      foreach ($categories as $category) {
                        if($category['slug'] === $cat->slug) {
                          $categories[$cat_i]['count'] = $categories[$cat_i]['count']+1;
                        }
                        $cat_i++;
                      }
                    }
                    $fullname = get_field('full_name');
                    $level = get_field('level');
                    $exp_years = get_field('experience');
                    $vacancy = get_field('vacancy');
                    $description = get_field('description');
                    $skills = explode(',', get_field('skills'));
                    $thumb = get_the_post_thumbnail_url($post_id, 'large');
                    $projects = get_field('projects');
                  ?>      
                  <div class="isotop-item item <?php echo $item_class.' '.$cat_to_class ?>" data-category="<?php echo $cat_to_class ?>">
                      <div class="item-content-box">
                          <div class="item-box">
                              <div class="info-box">
                                <div class="image" style="background-image: url(<?php echo $thumb ?>)">
                                </div>
                                <div class="info">
                                  <h3><?php echo $fullname ?></h3>
                                  <div class="exp">
                                    <?php echo $vacancy ?>
                                  </div>
                                  <div class="exp">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <path d="M11.25 0.833333V0H10.4167V0.833333H7.08333V0H6.25V0.833333H2.91667V0H2.08333V0.833333C0.934667 0.833333 0 1.768 0 2.91667V11.25C0 12.3987 0.934667 13.3333 2.08333 13.3333H11.25C12.3987 13.3333 13.3333 12.3987 13.3333 11.25V2.91667C13.3333 1.768 12.3987 0.833333 11.25 0.833333ZM12.5 11.25C12.5 11.9393 11.9393 12.5 11.25 12.5H2.08333C1.39407 12.5 0.833333 11.9393 0.833333 11.25V2.91667C0.833333 2.2274 1.39407 1.66667 2.08333 1.66667V2.5H2.91667V1.66667H6.25V2.5H7.08333V1.66667H10.4167V2.5H11.25V1.66667C11.9393 1.66667 12.5 2.2274 12.5 2.91667V11.25Z" fill="#404040"/>
                                      <path d="M2.9165 5.20874C3.26168 5.20874 3.5415 4.92892 3.5415 4.58374C3.5415 4.23856 3.26168 3.95874 2.9165 3.95874C2.57133 3.95874 2.2915 4.23856 2.2915 4.58374C2.2915 4.92892 2.57133 5.20874 2.9165 5.20874Z" fill="#404040"/>
                                      <path d="M5.4165 5.20874C5.76168 5.20874 6.0415 4.92892 6.0415 4.58374C6.0415 4.23856 5.76168 3.95874 5.4165 3.95874C5.07133 3.95874 4.7915 4.23856 4.7915 4.58374C4.7915 4.92892 5.07133 5.20874 5.4165 5.20874Z" fill="#404040"/>
                                      <path d="M7.9165 5.20874C8.26168 5.20874 8.5415 4.92892 8.5415 4.58374C8.5415 4.23856 8.26168 3.95874 7.9165 3.95874C7.57133 3.95874 7.2915 4.23856 7.2915 4.58374C7.2915 4.92892 7.57133 5.20874 7.9165 5.20874Z" fill="#404040"/>
                                      <path d="M10.4165 5.20874C10.7617 5.20874 11.0415 4.92892 11.0415 4.58374C11.0415 4.23856 10.7617 3.95874 10.4165 3.95874C10.0713 3.95874 9.7915 4.23856 9.7915 4.58374C9.7915 4.92892 10.0713 5.20874 10.4165 5.20874Z" fill="#404040"/>
                                      <path d="M2.9165 7.70874C3.26168 7.70874 3.5415 7.42892 3.5415 7.08374C3.5415 6.73856 3.26168 6.45874 2.9165 6.45874C2.57133 6.45874 2.2915 6.73856 2.2915 7.08374C2.2915 7.42892 2.57133 7.70874 2.9165 7.70874Z" fill="#404040"/>
                                      <path d="M5.4165 7.70874C5.76168 7.70874 6.0415 7.42892 6.0415 7.08374C6.0415 6.73856 5.76168 6.45874 5.4165 6.45874C5.07133 6.45874 4.7915 6.73856 4.7915 7.08374C4.7915 7.42892 5.07133 7.70874 5.4165 7.70874Z" fill="#404040"/>
                                      <path d="M7.9165 7.70874C8.26168 7.70874 8.5415 7.42892 8.5415 7.08374C8.5415 6.73856 8.26168 6.45874 7.9165 6.45874C7.57133 6.45874 7.2915 6.73856 7.2915 7.08374C7.2915 7.42892 7.57133 7.70874 7.9165 7.70874Z" fill="#404040"/>
                                      <path d="M10.4165 7.70874C10.7617 7.70874 11.0415 7.42892 11.0415 7.08374C11.0415 6.73856 10.7617 6.45874 10.4165 6.45874C10.0713 6.45874 9.7915 6.73856 9.7915 7.08374C9.7915 7.42892 10.0713 7.70874 10.4165 7.70874Z" fill="#404040"/>
                                      <path d="M2.9165 10.2087C3.26168 10.2087 3.5415 9.92892 3.5415 9.58374C3.5415 9.23856 3.26168 8.95874 2.9165 8.95874C2.57133 8.95874 2.2915 9.23856 2.2915 9.58374C2.2915 9.92892 2.57133 10.2087 2.9165 10.2087Z" fill="#404040"/>
                                      <path d="M5.4165 10.2087C5.76168 10.2087 6.0415 9.92892 6.0415 9.58374C6.0415 9.23856 5.76168 8.95874 5.4165 8.95874C5.07133 8.95874 4.7915 9.23856 4.7915 9.58374C4.7915 9.92892 5.07133 10.2087 5.4165 10.2087Z" fill="#404040"/>
                                      <path d="M7.9165 10.2087C8.26168 10.2087 8.5415 9.92892 8.5415 9.58374C8.5415 9.23856 8.26168 8.95874 7.9165 8.95874C7.57133 8.95874 7.2915 9.23856 7.2915 9.58374C7.2915 9.92892 7.57133 10.2087 7.9165 10.2087Z" fill="#404040"/>
                                    </svg>

                                    Exp <span><?php echo $exp_years ?></span><strong><?php echo $exp_years > 1 ? ' years' : ' year' ?></strong>
                                  </div>
                                  <div class="description">
                                    <?php echo $description ?>
                                  </div>
                                  <div class="level">
                                    <?php echo $level ?>
                                  </div>
                                </div>
                              </div>
                              <div class="skills">
                                <ul>
                                  <?php foreach($skills as $skill): ?>
                                  <li>
                                    <?php echo $skill ?>
                                  </li>
                                  <?php endforeach; ?>
                                </ul>
                              </div>
                              <div class="projects">
                                <?php if($projects && count($projects) > 0): ?>
                                <ul>  
                                  <li>Projects</li>
                                  <?php foreach($projects as $project): ?>
                                  <li>
                                    <?php if($project['project_link']): ?>
                                    <a href="<?php echo $project['project_link'] ?>"><?php echo $project['project_name'] ?></a>
                                    <?php else: ?>
                                    <?php echo $project['project_name'] ?>
                                    <?php endif; ?>
                                  </li>
                                  <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                              </div>                                 
                          </div>
                      </div>
                  </div>
              <?php $i++; endwhile;?>
          <?php endif;?>
          <?php wp_reset_postdata(); ?>
      </div>
    </div>
    <?php 
      $categories[0]['count'] = $all_team_count;
    ?>
    <input type="hidden" value='<?php echo json_encode($categories); ?>' name='categories' id='all_teammembers_categories' />

<?php } else { ?>
  <div class="protected">
    <form method="post" action="">
      <h3>Enter password to see it's page</h3>
      <br/>
      <input type="password" placeholder="Enter password" value="" name="password_teammembers" />
      <br />
      <br />
      <button class="btn btn-green" type="submit">Go</button>
    </form>
  </div>
  <style>
    .protected h3 {
      width: 100%;
      text-align: center;

    }
    .protected {
      height: 250px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
    }
    .protected form {
      text-align: center;
    }
    .protected input {
      padding: 10px;
    }
    .protected button {
      padding-left: 20px;
      padding-right: 20px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
<?php } ?>

<?php get_footer(); ?>