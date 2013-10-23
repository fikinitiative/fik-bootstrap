<form action="<?php echo home_url( '/' ); ?>" method="get"  class=" form-search form-inline" role="form">
  <fieldset>
  <div class="form-group">
    <label class="sr-only" for="search"><?php _e("Search","fikstores"); ?></label>
    <input type="search" class="form-control" id="search" placeholder="<?php _e("Search","fikstores"); ?>" value="<?php the_search_query(); ?>" >
  </div>
  <button type="submit" class="btn btn-search"><?php _e("Search","fikstores"); ?></button>
  </fieldset>
</form>