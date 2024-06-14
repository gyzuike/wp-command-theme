// WordPress REST API URL  
const wpRestApiUrl = 'https://yourdomain/wp-json/wp/v2/posts';  
  
// 初始文章列表（将从API获取后替换）  
let articles = [];  
  
// DOM元素  
const promptElement = document.querySelector('.prompt'); // 假设这个元素用于显示提示信息  
const inputElement = document.getElementById('command-input'); // 输入框  
const outputElement = document.getElementById('output'); // 输出框  
  
// 从WordPress REST API获取文章列表  
async function fetchArticlesFromWp() {  
  try {  
    const response = await fetch(wpRestApiUrl);  
    if (!response.ok) {  
      throw new Error('Failed to fetch articles');  
    }  
    const articlesData = await response.json();  
    articles = articlesData; // 更新全局的文章列表  
    displayArticleList(); // 显示文章列表  
  } catch (error) {  
    console.error('Error fetching articles:', error);  
    outputElement.textContent += `\n错误：无法获取文章列表\n`;  
  }  
}  
  
// 显示文章列表  
function displayArticleList() {  
  const list = articles.map((article) => `${article.id}. ${article.title.rendered}`).join('\n');  
  outputElement.textContent = `<span style="color:#0f0">欢迎使用命令行网页！</span>\n<span style="color:yellow">输入 'list' 查看文章列表。\n输入文章ID查看特定文章内容。\n例如：输入 1 查看第一篇文章。</span>\n\n${list}\n`;  
}  
  
// 显示文章内容  
function displayArticleContent(articleId) {  
  // 清理之前的内容  
  outputElement.innerHTML = ''; // 使用innerHTML或textContent，根据你的需求  
  
  const article = articles.find((a) => a.id === parseInt(articleId, 10));  
  if (article) {  
    // 使用innerHTML来插入HTML内容  
    outputElement.innerHTML += `<h3>标题：${article.title.rendered}</h3><br/><div>${article.content.rendered}</div>\n`;  
  } else {  
    outputElement.textContent += '\n错误：找不到该文章\n';  
  }  
}
  
// 处理命令  
function processCommand(command) {  
  switch (command) {  
    case 'list':  // 在这里修改命令，比如修改成'/l'等等  
      displayArticleList();  
      break;  

//  添加新的相应事件
//  case '/b':    //绑定命令，可以有符号
//  window.open('https://www.gotodomain.com', '_blank'); // 这个是在新窗口或标签页中打开链接，也可以添加自己的
//  break;  

    default:  
      const articleId = parseInt(command, 10);  
      if (!isNaN(articleId) && articles.some((a) => a.id === articleId)) {  
        displayArticleContent(articleId);  
      } else {  
        outputElement.textContent += `\n错误：无效的命令或文章ID\n`;  
      }  
  }  
}  
  
// 监听输入框的Enter键事件  
inputElement.addEventListener('keydown', function(event) {  
  if (event.key === 'Enter') {  
    const command = inputElement.value.trim();  
    inputElement.value = ''; // 清空输入框  
    processCommand(command);  
    // 将焦点移回输入框，以便用户可以直接输入下一个命令  
    inputElement.focus();  
  }  
});  
  
// 初始加载时获取文章列表  
fetchArticlesFromWp();