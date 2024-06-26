<?php  
/**  
 * Template Name: CLI Interface  
 *  
 * This is the main template file for the CLI Interface theme.  
 *  
 * @package CLI_Interface_Theme  
 */  
   
  
?>  
<!DOCTYPE html>  
<html <?php language_attributes(); ?>>  
<head>  
    <meta charset="<?php bloginfo('charset'); ?>">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>  
    <link rel= "stylesheet" href= "https://fonts.googleapis.com/css?family=Noto+Sans+SC:100,300,400,500,700,900" >
    <?php wp_head(); // 加载WordPress头部信息 ?>  
</head>  
<body>   

<div id="terminal" style="padding:20px">  
  <div class="terminal-output" id="output"></div> 
  <div class="terminal-header">  
    <span class="prompt">$</span>  
    <input type="text" id="command-input" placeholder="输入命令...">  
  </div> 
</div>  

<script>  
document.addEventListener('DOMContentLoaded', (event) => {  
    // 获取输入框元素  
    const inputElement = document.getElementById('command-input');  
      
    // 确保元素存在，然后设置焦点  
    if (inputElement) {  
        inputElement.focus();  
    }  
});  
</script>  

<?php  
// 这里你可以添加一些PHP代码来初始化变量或处理页面加载时的任务  
// 但对于CLI界面的交互，大部分逻辑将在JavaScript中处理  
?>  
  
<?php wp_footer(); // 加载WordPress底部信息 ?>  
  <script src="<?php echo get_template_directory_uri(); ?>/js/cli.js"></script>  
</body>  
</html>








