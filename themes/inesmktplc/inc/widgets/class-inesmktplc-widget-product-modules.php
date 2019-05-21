<?php

class Inesmktplc_Widget_Product_Modules extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'inesmktplc-widget-product-modules',
            'description' => 'Ines Marketplace show Product Modules',
        );
        parent::__construct('inesmktplc-widget-product-modules', 'Marketplace Modules', $widget_ops);
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
            'before_title'  => '<a class="card-title" href="#collapse-' . $this->id . '" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse1">',
            'after_title'   => '</a>',
            'after_widget'  => '</div>'
        );

        // outputs the content of the widget
        static $first_dropdown = true;

        $title = !empty($instance['title']) ? $instance['title'] : __('Modules');

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $c = !empty($instance['count']) ? '1' : '0';

        echo $args['before_widget'];

        if ($title) {
            echo $args['before_title'] . '<h4>' . $title . '<span class="lnr lnr-chevron-down"></span></h4>' . $args['after_title'];
        }



        $mod_args = array(
            'orderby'       => 'name',
            'order'         => 'asc',
            'hide_empty'    => 'false',
            'show_count'    => $c,
        );
        ?>

    <div class="collapsible-content collapse show" id="collapse-<?php echo $this->id; ?>">
        <ul class="card-content">

            <?php
            $mod_attr_term = get_terms('pa_modules', $mod_args);

            if (!empty($mod_attr_term)) {
                foreach ($mod_attr_term as $term) {
                    //echo "<li>" . $term->name . '--' . $term->count . "</li>";
                    echo '<li>';
                    echo '<a href="' . $term->slug . '" ><span class="lnr lnr-chevron-right"></span>';
                    echo $term->name;
                    if ($c) {
                        echo '<span class="item-count">';
                        echo $term->count;
                        echo '</span>';
                    }
                    echo '</a>';
                    echo '</li>';
                }
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
    ?>

    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>">
            <?php _e('Title:', 'inesmktplc'); ?>
        </label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
    </p>

    <p>
        <input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" <?php checked($count); ?> />
        <label for="<?php echo $this->get_field_id('count'); ?>">
            <?php _e('Show post counts', 'inesmktplc'); ?>
        </label>
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

    return $instance;
}
}
