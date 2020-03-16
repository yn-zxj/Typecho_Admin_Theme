## Typecho后台主题——Purple

零、插件菜单面板
------

**修复：**1.修改了**menu.php**,增加一行代码，删除很多行代码！

​            2.修改了**var**→**Widget**→**Menu.php**文件！

**修改方法：** **var**→**Widget**→**Menu.php**（找到大概302行：public function output($class = 'focus', $childClass = 'focus')）

复制以下内容替换：（如果你嫌麻烦，下载github中的此文件，替换也行！）

```java
public function output()
{
    foreach ($this->_menu as $key => $node) {
        if (!$node[1] || !$key) {
            continue;
        }
		echo "<li class=\"nav-item" . ($key == $this->_currentParent ? ' ' . $class : NULL) . "\">
				<a class=\"nav-link\" data-toggle=\"collapse\" href=\"#{$node[0]}\" aria-expanded=\"false\" aria-controls=\"{$node[0]}\">
					<span class=\"menu-title\">{$node[0]}</span>
					<i class=\"menu-arrow\"></i>
					<i class=\"mdi menu-icon mdi-book-open-page-variant\"></i>
				</a>
				<div class=\"collapse\" id=\"{$node[0]}\">
					<ul class=\"nav flex-column sub-menu\">";

        $last = 0;
        foreach ($node[3] as $inKey => $inNode) {
            if (!$inNode[4]) {
                $last = $inKey;
            }
        }
        
        foreach ($node[3] as $inKey => $inNode) {
            if ($inNode[4]) {
                continue;
            }

            $classes = array();
            if ($key == $this->_currentParent && $inKey == $this->_currentChild) {
                $classes[] = $childClass;
            } else if ($inNode[6]) {
                continue;
            }

            if ($inKey == $last) {
                $classes[] = 'last';
            }

			echo "<li class=\"nav-item\"> 
					<a class=\"nav-link\" href=\"" . ($key == $this->_currentParent && $inKey == $this->_currentChild ? $this->_currentUrl : $inNode[2]) . "\">{$inNode[0]}</a>
				  </li>";
        }
        echo "</ul></div></li>";
    }
}
```


**新的问题：****1.菜单右侧图标一致；

​                   2.插件页面 **footer** 显示问题；（这些都下次修复）

此外，各位大佬去我博客贡献下ip啊！

一、主题介绍 `v1.0`
------

&emsp;&emsp;**1.为什么叫Purple?**


&emsp;&emsp;此套主题基于bootstrap-Purple 主题修改适配！之前我看过很多模板，后台主题适配过几套（都没完成，直接删除），到最后我还是最喜欢Purple的风格、布局、配色......想个名字也难，不如第一代就叫Purple（其实是因为懒，如果各位有什么好的名字，不妨留言!）

&emsp;&emsp;**2.我见过差不多的一套主题，是否存在抄袭？**


&emsp;&emsp;模板这东西，又不是自己写的，都是适配！本人申明没有抄袭任何一个模板。最开始玩Typecho时，我就因为这个模板好看，买了哪位作者的主题，结果发现适配度不高，手机端不友好。一段时间后，他开始弃用此套模板，开始适配其他。而我出于兴趣，决定自己完成这个主题。

二、主题展示
------

手机端：

![手机端自适应](http://img.bt66.cn/blog3-1.png)

电脑端：

![电脑端](http://img.bt66.cn/blog3-2.png)



> 具体见主题演示！

三、主题演示
------

后台地址：http://typecho.bt66.cn/admin

账号①：admin

密码：admin

账号②：admin666

密码：admin666

> 注：此演示站点我只开启一段时间，如果你访问不了，那么就是被我删除了！


四、下载地址
------

Typecho_Admin_Theme：[Github](https://github.com/yn-zxj/Typecho_Admin_Theme)

五、使用说明
------

&emsp;&emsp;下载本全部文件，解压至admin目录选择全部覆盖。建议新建admin目录并解压到内，重命名原admin目录，作为备份。

六、结束语
-----
&emsp;&emsp;主题交流群：1074118225

&emsp;&emsp;我的博客：http://bt66.cn/

&emsp;&emsp;本主题的适配花的时间也不算太多，假如在使用过程中发现错误或者有什么好的建议，欢迎留言或者到github提交issues。最后如果你觉得此模板还不错，不妨推荐给其他人；假如有您的打赏，那最好不过啦！ 
![](http://img.bt66.cn/blogsk.png)