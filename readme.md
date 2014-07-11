#higrid嗨网 专业版 

**中文PHP在线图表**, Copyright (C) http://higrid.net   


- 网址：<http://higrid.net/>
- 文档：<http://higrid.net/docs/code/higridpro-quick-install.md>
- api：<http://higrid.net/docs/higridapi/>
- 在线演示：<http://higrid.higrid.net>


## 目录结构为:

<pre>
|   .gitignore
|   autodeploy.php //自动部署到higrid.higrid.net
|   changelog.md //每次主要更新
|   chart.php //嗨图例子入口文件
|   CONTRIBUTING.md //期待共同参与
|   example.php //嗨网例子入口文件
|   higridsql.sql //!!!!!演示数据库，请导入
|   index.php
|   readme.md
|   
+---chart //本文件夹中为嗨图例子
|       areabasic.php
|       config.php //数据库设置文件！！！！！必须修改
|       .....php
|       
+---config
|       functions.php //index.php所用的部分函数，仅为higrid展示首页所用
|       hichart_demo.csv //hichart演示数据
|       higrid_demo.csv  //higrid演示数据
|       markdownextra.php //markdown解释
|       
+---example //本文件夹为嗨网演示
|       autocomplete_toolbar.php
|       treeloadallexpanded.php
|       config.php //数据库设置文件！！！！！必须修改
|       config_tree.php //数据库设置文件！！！！！必须修改
|       ...
|       
\---higrid //higrid核心程序文件夹
    |   hgAutocomplete.php
    |   hgCalendar.php
    |   hgChart.php
    |   hgcommon.php
    |   hgGrid.php
    |   hgGridPdo.php
    |   hgTreeGrid.php
    |   HiGrid.php
    |   HiGrid_chart.php
    |   HiGrid_tree.php
    |   
    \---scopbin //加密文件
            911006.php
</pre>
dos命令：`tree E:\github\github_higrid /f /a >list.txt`

##安装

1. 将下载的**higrid.版本代码.tar.gz**解压缩
1. 新建数据库,将`higridsql.sql`导入数据库
1. 打开`example/config.php`设置数据库参数;同样设置`example/config_tree.php`;`chart/config.php`,也可以合并成一个^_^
1. 将解压缩后的全部文件上传到服务器,任意目录都可
1. 浏览器中打开该目录`index.php`查看效果
1. 增加其他表格或图形只需模仿**example/chart**文件夹中的`php`文件修改相应参数即可
