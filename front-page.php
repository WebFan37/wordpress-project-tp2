<?php get_header(); ?>

<!-- <h1>FRONT-PAGE TEST</h1> -->

    <div id="entete" class="global">
        <header class="entete_header">
            <h1><?php echo get_bloginfo("name") ?></h1>
            <h2><?php echo get_bloginfo("description") ?></h2>
            <!-- <h3>Conception d'interface et développement web</h3> -->
        </header>
        
        <!--ICI POUR LA VAGUE-->
        <?php get_template_part('composants-gabarit/vague'); ?>
         
    </div>
    <div id="accueil" class="global">
        <section>
            <h2>DESTINATIONS POPULAIRES</h2> 
            <div class="destinations">
                <?php if(have_posts()):
                    while(have_posts()): the_post(); ?>

                    <div class="carte">
                        <h2><?php the_title(); ?></h2>
                        <p><?php echo wp_trim_words(get_the_content()); ?></p>
                        <?php the_category(); ?>
                        <a href="<?php the_permalink(); ?>">SAVOIR PLUS</a>
                    </div> 
                
                    <?php endwhile ?>
                <?php endif ?>
            </div>
        </section>
        
    </div>
    <div id="evenement" class="global diagonal">
       <section>
            <h2>CATÉGORIES</h2>
            <div class="categories">
            <?php if(have_posts()):
                    while(have_posts()): the_post(); ?>

                    <div class="carte-categorie">
                        <p><?php the_category() ?></p>
                    </div> 
                
                    <?php endwhile ?>
                <?php endif ?>
            </div>

       </section>
    
        
       
    </div>
    <div id="galerie" class="global diagonal">
        <section>
            <h2>Galerie</h2>
        <p>La page galerie vous offre une vue globale sur les photos le plus incroyable dans le voyage ! Apprécie les ! Ne manquer pas les évenements !

        </p>

        <?php
        // Récupérer toutes les catégories
        $categories = get_categories();

        // Parcourir chaque catégorie
        foreach ($categories as $category) {
            // Récupérer les informations de la catégorie
            $cat_name = $category->name;
            $cat_description = wp_trim_words($category->description,10);
            $cat_link = get_category_link($category->term_id);
            $cat_count = $category->count;

            // Afficher les informations de la catégorie
            echo '<div class = "destinations">';
            echo '<div class = carte>';
            echo '<h2>' . $cat_name . '</h2>';
            echo '<p>' . $cat_description . '</p>';
            echo '<p> Nombre article ' .$cat_count. '</p>';
            echo '<p><a href="' . $cat_link . '">Voir tous les articles de cette catégorie</a></p>';
            echo '</div>';
            echo '</div>';
            

            // Réinitialiser la requête
            wp_reset_postdata();
        }
?>

       
        </section>
        
    </div>

    <?php get_footer(); ?>
  