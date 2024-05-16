<?php  
/**  
 * Theme Name: CLI-Style Theme  
 * Theme URI: http://example.com/cli-style-theme/  
 * Author: Your Name  
 * Author URI: http://example.com/  
 * Description: A CLI-style WordPress theme  
 * Version: 1.0.0  
 * License: GNU General Public License v2 or later  
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html  
 * Text Domain: cli-style-theme  
 */  
  
// 注册主题支持的特性  
function cli_style_theme_setup() {  
    // 可以在这里添加对特色图片、小工具等的支持  
    // add_theme_support('post-thumbnails');  
    // ...  
}  
add_action('after_setup_theme', 'cli_style_theme_setup');  
  
// 加载主题样式和脚本  
function cli_style_theme_enqueue_scripts() {  
    wp_enqueue_style('cli-style-theme-style', get_template_directory_uri() . '/style.css');  
    wp_enqueue_script('cli-style-theme-script', get_template_directory_uri() . '/js/cli.js', array(), null, true);  
  
    // 本地化脚本，以便在JavaScript中使用WordPress数据  
    // wp_localize_script('cli-style-theme-script', 'cliThemeData', array(  
    //     'ajax_url' => admin_url('admin-ajax.php'),  
    //     // ... 其他数据  
    // ));  
}  
add_action('wp_enqueue_scripts', 'cli_style_theme_enqueue_scripts');  
  
// AJAX处理函数示例  
function cli_style_theme_ajax_handler() {  
    // 检查请求是否来自AJAX调用  
    if (!defined('DOING_AJAX')) {  
        wp_die('Direct access not allowed');  
    }  
  
    // 假设我们获取用户输入的文章ID  
    // 这里只是一个示例，你需要从`$_POST`或`$_REQUEST`中获取实际的值  
    $post_id = isset($_POST['post_id']) ? absint($_POST['post_id']) : 0;  
  
    // 验证$post_id是否有效，并执行相应的操作  
    if ($post_id) {  
        // 假设我们只是简单地返回文章标题  
        $post = get_post($post_id);  
        if ($post) {  
            echo $post->post_title;  
        } else {  
            echo 'Post not found.';  
        }  
    } else {  
        echo 'Invalid post ID.';  
    }  
  
    // 终止AJAX请求并返回响应  
    wp_die();  
}  
add_action('wp_ajax_cli_style_theme_action', 'cli_style_theme_ajax_handler');  
add_action('wp_ajax_nopriv_cli_style_theme_action', 'cli_style_theme_ajax_handler');  
  
// 其他可能的函数和钩子...  
// ...