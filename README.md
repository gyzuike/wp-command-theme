## 2024.6.14 更新
`js/cli.js`中添加绑定更多按键的例子，以帮助和我一样看到javascript的就头疼的朋友们。
为方便阅读，在这里也添加说明下：

找到以下内容
````javascript
// 处理命令  
function processCommand(command) {  
  switch (command) {  
    case 'list':  // 在这里修改命令，比如修改成'/l'等等  
      displayArticleList();  
      break;  
    default:  
      const articleId = parseInt(command, 10);  
      if (!isNaN(articleId) && articles.some((a) => a.id === articleId)) {  
        displayArticleContent(articleId);  
      } else {  
        outputElement.textContent += `\n错误：无效的命令或文章ID\n`;  
      }  
  }  
}  
````
在`break`和`default`之间添加
````javascript
      添加新的相应事件
      case '/b':    //绑定命令，可以有符号
      window.open('https://www.gotodomain.com', '_blank'); // 这个是在新窗口或标签页中打开链接，也可以添加自己的
      break;  
````

字体改为思源黑体（本来加这个字体是尝试看能不能显示`biangbiang面`的biang字，结果没成功。不过字体本身挺好看的，就没改回去，而是以引用googleapi的方式加入了）
![](https://pic53.photophoto.cn/20191220/0017029563619022_b.jpg)
----
输入`list`列出文章列表，输入对应数字阅读文章内容
可以支持图片

![](https://dev.shuyuzi.com/wp-content/uploads/2024/05/微信截图_20240516135246-1-300x181.jpg)

但是因为能力和时间有限，只能做到最简单的文章列表和内容显示，内容显示还有问题：每个换行间距过大，不知道怎么修改。
这个主题及其不完善，甚至连翻页功能都没有，functions.php估计也是一堆错误。
我这边能做的只有这么多，如果谁喜欢这个主题，请自行拿去修改
