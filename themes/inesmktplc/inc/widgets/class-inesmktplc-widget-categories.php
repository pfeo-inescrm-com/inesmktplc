<?php

class Inesmktplc_Widget_Categories extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'inesmktplc-widget-categories',
            'description' => 'Ines Marketplace show Categories',
        );
        parent::__construct('inesmktplc-widget-categories', 'Marketplace Categories', $widget_ops);
    }


    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        $args = array(
            'before_widget' => '<div class="sidebar-card card--category">',
            'before_title'  => '<a class="card-title" href="#collapse-'. $this->id .'" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse1">',
            'after_title'   => '</a>',
            'after_widget'  => '</div>'
        );

        // outputs the content of the widget
        static $first_dropdown = true;

        $title = !empty($instance['title']) ? $instance['title'] : __('Categories');

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $c = !empty($instance['count']) ? '1' : '0';
        // $h = !empty($instance['hierarchical']) ? '1' : '0';
        // $d = !empty($instance['dropdown']) ? '1' : '0';
        
        echo $args['before_widget'];

        if ($title) {
            echo $args['before_title'] . '<h4>' . $title . '<span class="lnr lnr-chevron-down"></span></h4>' . $args['after_title'];
        }



        $cat_args = array(
            'orderby'       => 'name',
            'order'         => 'asc',
            'hide_empty'    => 'false',
            'show_count'    => $c,
            //'hierarchical'  => '0', // no hierarchy by default
        );
        ?>

    <div class="collapsible-content collapse show" id="collapse-<?php echo $this->id; ?>">
        <ul class="card-content">

<?php 

$product_categories = get_terms( 'product_cat', $cat_args );

if (!empty($product_categories)) {

    foreach ($product_categories as $key => $category) {
        echo '<li>';
        echo '<a href="'.get_term_link($category).'" ><span class="lnr lnr-chevron-right"></span>';
        echo $category->name;
        if ($c) {
            echo '<span class="item-count">';
            echo $category->count;
            echo '</span>';
        }
        echo '</a>';
        echo '</li>';
    };
}
?>
        </ul>
    </div>

    <?php
    echo $args['after_widget'];
}


/**
 * Outputs the options form on admin
 *
 * @param array $instance The widget options
 */
public function form($instance)
{
    // outputs the options form on admin
    //Defaults
    $default_title  =  array('title' => __('Categories', 'inesmktplc'));
    $instance       = wp_parse_args((array)$instance, $default_title);
    $count          = isset($instance['count']) ? (bool)$instance['count'] : false;
    // $hierarchical   = isset($instance['hierarchical']) ? (bool)$instance['hierarchical'] : false;
    // $dropdown       = isset($instance['dropdown']) ? (bool)$instance['dropdown'] : false;
    ?>

    <p>
        <label 
            for="<?php echo $this->get_field_id('title'); ?>">
            <?php _e('Title:', 'inesmktplc'); ?>
        </label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('title'); ?>"
            name="<?php echo $this->get_field_name('title'); ?>"
            type="text"
            value="<?php echo esc_attr($instance['title']); ?>" 
        />
    </p>

    <p>
        <!-- <input
                type="checkbox"
                class="checkbox"
                id="<?php //echo $this->get_field_id('dropdown'); ?>"
                name="<?php //echo $this->get_field_name('dropdown'); ?>"
                <?php //checked($dropdown); ?>
            />
            <label
                for="<?php //echo $this->get_field_id('dropdown'); ?>">
                <?php //_e('Display as dropdown', 'inesmktplc'); ?>
            </label>
            <br /> -->
        <input 
            type="checkbox"
            class="checkbox"
            id="<?php echo $this->get_field_id('count'); ?>"
            name="<?php echo $this->get_field_name('count'); ?>"
            <?php checked($count); ?>
        />
        <label 
            for="<?php echo $this->get_field_id('count'); ?>">
            <?php _e('Show post counts', 'inesmktplc'); ?>
        </label>
        <!-- <br />
        <input
            type="checkbox"
            class="checkbox"
            id="<?php // echo $this->get_field_id('hierarchical'); ?>"
            name="<?php // echo $this->get_field_name('hierarchical'); ?>"
            <?php // checked($hierarchical); ?>
        />
        <label
            for="<?php // echo $this->get_field_id('hierarchical'); ?>">
            <?php // _e('Show hierarchy', 'inesmktplc'); ?>
        </label> -->
    </p>

<?php
}

/**
 * Processing widget options on save
 *
 * @param array $new_instance The new options
 * @param array $old_instance The previous options
 *
 * @return array
 */
public function update($new_instance, $old_instance)
{
    // processes widget options to be saved
    $instance                 = $old_instance;
    $instance['title']        = sanitize_text_field($new_instance['title']);
    $instance['count']        = !empty($new_instance['count']) ? 1 : 0;
    $instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;
    // $instance['dropdown']     = !empty($new_instance['dropdown']) ? 1 : 0;

    return $instance;
}
}
