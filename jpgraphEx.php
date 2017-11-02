<?php
    include("src/jpgraph.php");
    include("src/jpgraph_line.php");
/*     //header('content-type:image/png;charset=utf-8');//设置内容类型
    
    $datay = array(160,180,203,289,405,488,489,408,299,166,187,105);//定义数组
    $graph = new Graph(600,300,"zuto");//创建画布
    $graph->SetScale("textlin");
    $graph->yaxis->scale->SetGrace(20);
    $graph->SetShadow();//创建画布阴影
    //设置统计画所在画布的位置，左边距40，右边距30，上边距30，下边距40，单位为像素
    $graph->img->SetMargin(40,30,30,40);
    $bplot = new BarPlot($datay);//创建一个矩形的对象
    $bplot->SetFillColor("orange");//设置柱形图的颜色
    $bplot->value->Show();//设置显示数字
    $bplot->value->SetFormat("%d");//数值格式化
    $graph->Add($bplot);//将柱形图添加到图像中
    $graph->SetMarginColor("lightblue");//设置画布背景色为淡蓝色
    $graph->title->Set(iconv("UTF-8","GB2312//IGNORE","销量统计"));//创建标题
    $a=array("1月","2月","3月","4月","5月","6月","7月","8月","9月","10月","11月","12月");
    $graph->xaxis->SetTickLabels($a);//设置X轴
    /* $graph->title->SetFont(FF_SIMSUN);//设置标题的字体
    $graph->xaxis->SetFont(FF_SIMSUN);//设置X轴的字体 
    $graph->Stroke();//输出图像 */
    $data = array(19 , 23 , 34 ,36, 50 , 60 , 65, 70 , 78); //模拟数据
    $graph = new Graph($width = 400 , $height = 300); //创建新的Graph对象
    $graph->SetScale("textlin"); //设置刻度模式
    $graph->img->SetMargin(30 , 30 , 80 , 30) ; //设置图表边界
    $graph->title->Set(iconv("UTF-8","GB2312//IGNORE","简体中文 繁體中文 test")) ; //设置图表标题
    $graph->title->SetFont(FF_SIMSUN,FS_BOLD); // 设置中文字体
    $graph->title->SetFont(FF_CHINESE,FS_BOLD);
    $lineplot = new LinePlot($data); //创建新的LinePlot对象
    $lineplot->SetLegend(iconv("UTF-8","GB2312//IGNORE","数据1"));//设置图例文字
    $graph->subtitle->SetFont(FF_SIMSUN);
    $graph->subsubtitle->SetFont(FF_SIMSUN);
    $lineplot->SetColor("red"); //设置曲线颜色
    $graph->Add($lineplot); //在统计图上绘制曲线
    $data2 = array(20 ,30 ,45 , 23 , 45 , 69 , 60 , 79 , 80);
    $lineplot = new LinePlot($data2); //创建新的LinePlot对象
    $lineplot->SetLegend(iconv("UTF-8","GB2312//IGNORE","数据2"));//设置图例文字
    $lineplot->SetColor("blue"); //设置曲线颜色
    $graph->Add($lineplot); //在统计图上绘制曲线
    $graph->Stroke() ; //输出图像*/
?>

    