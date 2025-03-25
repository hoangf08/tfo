<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <h1>Danh sách bài viết nhóm ABC</h1>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div><?php the_excerpt(); ?></div>
                </article>
                <?php
            endwhile;
        else :
            echo '<p>Không có bài viết nào trong nhóm ABC.</p>';
        endif;
        ?>
    </main>
</div>