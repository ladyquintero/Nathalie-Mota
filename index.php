<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>

            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_format());
            endwhile;

            the_posts_pagination(array(
                'prev_text' => esc_html__('Previous', 'your-theme-textdomain'),
                'next_text' => esc_html__('Next', 'your-theme-textdomain'),
            ));

        else :
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </main>
</div>

<?php get_footer(); ?>
