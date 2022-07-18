<div class="searchBlog col-12">
    <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
        <input type="text" value="" name="s" id="s" placeholder="Buscar..." />
        <input type="hidden" name="search-type" value="blog" />
        <input name="submit" type="submit" class="btnEnviar" value="⚲" />
    </form>
</div>

<div class="categorias col-12">
    <h2>Categorias</h2>
    <?php
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC'
    );
    $categories = get_categories($args);
    echo "<ul>";
    foreach ($categories as $category) {
        echo '<li><a href="' . get_category_link($category->term_id) . '" title="' . sprintf(__("Ver postagens em %s"), $category->name) . '" ' . '>' . $category->name . ' (' . $category->count . ')</a> </li>';
    }
    echo "</ul>"; ?>
</div>