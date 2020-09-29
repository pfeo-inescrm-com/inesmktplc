<?php
/**
 * 
 * necesito saber que tipo de filtros quieren
 * hay que hacer el ajax
 * ver este artículo
 * https://rudrastyh.com/wordpress/ajax-post-filters.html
 * bajé un plugin para ver ejemplos de código también
 * 
 * 
 */

class Inesmktplc_Widget_Filter_Products_Checkbox extends WP_Widget
{

    /**
     * Sets up the widgets name etc
     */
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'inesmktplc-widget-filter-products-checkbox',
            'description' => 'Ines Marketplace filter products with checkboxes',
        );
        parent::__construct('inesmktplc-widget-filter-products-checkbox', 'Marketplace Filter Products with checkboxes', $widget_ops);
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
            'before_widget' => '<div class="sidebar-card card--filter">',
            'before_title'  => '<a class="card-title" href="#collapse-'. $this->id .'" role="button" data-toggle="collapse" aria-expanded="true" aria-controls="collapse1">',
            'after_title'   => '</a>',
            'after_widget'  => '</div>'
        );

        // outputs the content of the widget
        static $first_dropdown = true;

        $title = !empty($instance['title']) ? $instance['title'] : __('Filter Products', 'inesmktplc');

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        
        echo $args['before_widget'];

        if ($title) {
            echo $args['before_title'] . '<h4>' . $title . '<span class="lnr lnr-chevron-down"></span></h4>' . $args['after_title'];
        }



        $cat_args = array(
            'orderby'       => 'name',
            'order'         => 'asc',
            'hide_empty'    => 'false',
            // 'show_count'    => $c,
            //'hierarchical'  => '0', // no hierarchy by default
        );
        ?>

    <div class="collapsible-content collapse show" id="collapse-<?php echo $this->id; ?>">
        <ul class="card-content">

<?php 

$product_categories = get_terms( 'product_cat', $cat_args );

if (!empty($product_categories)) {

    foreach ($product_categories as $key => $category) {
        echo '<div class="custom-checkbox2">';
        echo '<input type="checkbox" id="chkb-'. $key .'" class="" name="filter_opt">';
        echo '<label for="chkb-'. $key .'">';
        echo '<span class="circle"></span>';
        echo $category->name;
        echo '</label>';
        echo '</div>';
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
    $default_title  =  array('title' => __('Filter Products', 'inesmktplc'));
    $instance       = wp_parse_args((array)$instance, $default_title);
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

    <p>&nbsp;</p>

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

    return $instance;
}
}
