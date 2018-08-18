<?php

session_start();
$cookieName = "ta.directcomm";


//============================================================================
//Cashe_lite設定
//============================================================================

//Cache_lite読み込み
require_once '/home/users/2/lolipop.jp-dp58180317/web/lib/PEAR/Cache/Lite.php';

//cache_id
$cache_id = "http://www.direct-comm.com";

//キャッシュ保存ディレクトリ、保存期限

//3時間　60 * 60 * 3
//tmpディレクトリは相対パスでないとダメ
$options = array('cacheDir' => './tmp/','lifeTime' => 60 * 60 * 3,'automaticSerialization' => 'true');

//キャッシュオブジェクト生成
$Cache_Lite = new Cache_Lite($options); //③

//if ($data = $Cache_Lite -> get($cache_id)) {
if ($data = $Cache_Lite -> get($cache_id)) {

	//echo "キャッシュがあります";
	$blist = $data;

}else{

	//echo "キャッシュはありませんでした";

// changed on 2015-11-27 $url = "http://d.hatena.ne.jp/kawa-direct/rss";
$url = "http://direct-comm.hatenablog.com/rss";
$xml =  simplexml_load_file($url) or die("p[XG[");

//var_dump($xml);

$title = array();
$link  = array();
$item = array();

$blist = "";


/*
    for($i = 0; $i<5; $i++){
		$title[$i] = (string) $xml->item[$i]->title;
		$link[$i]  = (string) $xml->item[$i]->link;
		$blist .= "<li><a href=\"".$link[$i]."\" target=\"_blank\">".$title[$i]."</a></li>";
        
	}
*/
    // added on 2015-11-27
    $i = 0;
    foreach ( $xml->channel->item as $entry ) {
		$title[$i] = $entry->title;
		$link[$i]  = $entry->link;
		$blist .= "<li><a href=\"".$link[$i]."\" target=\"_blank\">".$title[$i]."</a></li>";
        $i++;
        if ($i > 4) { break; }
    }

$data = $blist;
$Cache_Lite->save($data,$cache_id);


}// end cache








?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="utf-8">
<meta name="description" content="臨床心理士の松本がまとめている交流分析やエゴグラムについての専門サイトです。講座やセミナーも開催しています。このサイトではそのような交流分析の理解と日常生活の向上を目的としてサイトを作成しています。">
<meta name="keywords" content="交流分析,エゴグラム,講座,セミナー">
<meta name="author" content="株式会社ダイレクトコミュニケーション">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="INDEX,FOLLOW">
<title>はじめての交流分析・エゴグラムを詳しく解説 </title>
<link rel="canonical" href="http://ta.direct-comm.com/">
<link href="common/css/common.css" rel="stylesheet" media="all">
<link href="common/css/common_sp.css" rel="stylesheet" media="all">
<!--[if lt IE 9]>
<link href="common/css/common_ie8.css" rel="stylesheet" media="all">
<![endif]-->
<link href="css/default.css" rel="stylesheet" media="all">
<script src="common/js/iepngfix.js"></script>
<script src="common/js/DD_belatedPNG_0.0.8a.js"></script>
<script src="common/js/jquery.min.js"></script>
<script src="common/js/gotop.js"></script>
<script src="common/js/hover_img.js"></script>
<script src="common/js/viewport.js"></script>
<!--[if lt IE 9]>
<script src="common/js/html5.js"></script>
<![endif]-->
</head>

<body>

<a id="top"></a>

<!--wrap-->
<div id="wrap">

<!--header-->
<header id="header" class="clearfix">

<!--info_menu-->
<div id="info_menuBox">
<ul id="info_menu" class="clearfix">
<li class="info_link"><a href="/order/">研修・講演依頼</a></li>
</ul>
</div>
<!--/info_menu-->

<!--gnavi-->
<nav id="gnavi">
<div id="gnavi_l">
<div id="gnavi_r">
<ul class="clearfix">
<li id="home"><span class="here">HOME</span></li>
<li id="dvd" class="hover_img"><a href="/dvd/">通信講座</a></li>
<li id="colums" class="hover_img"><a href="/colums/">はじめての<br class="pcnone">交流分析ｺﾗﾑ</a></li>
<li id="charactor" class="hover_img"><span class="dotted_t"><a href="/charactor/">エゴグラム<br class="pcnone">無料診断</a></span></li>
<li id="teacher" class="hover_img"><span class="dotted_t"><a href="/teacher/">講師プロ<br class="pcnone">フィール</a></span></li>
<li id="info" class="hover_img"><span class="dotted_t"><a href="/contact/">お問い合わせ</a></span></li>
</ul>
</div>
</div>
</nav>
<!--//gnavi-->

<!--main_area-->
<div id="main_area">
<div id="taiken_fusen">
<img src="img/main_img.png">
</div>
</div>
<!--//main_area-->

</header>
<!--//header-->

<!--pan-->
<div id="pan" class="pcnone"><span>HOME&nbsp;＞&nbsp;<h1 id="target">交流分析,エゴグラム</h1></span></div>


<!--//pan-->


<!--contents-->
<div id="contents" class="clearfix">


<!--leftmenu-->
<div id="leftmenu">
<div id="leftmenu_b">
<div id="leftmenu_in">
<div class="top_midashi"><img src="img/hajimeni_midashi.gif" alt="交流分析ってなんだろう" class="wid100"></div>
<div class="pcnone"><img src="img/sp_hajimeni_midashi.gif" class="wid100"></div>

<!--intro-->
<div id="intro">
<p class="mt10">当サイトは臨床心理士の松本、社会心理学が専門の川島がまとめている交流分析についての専門サイトです。実際に直接学べる講座も開催しております♪</p>
<h2 class="bold font12 ml10 mt10">１．交流分析とは</h2>
<p>交流分析とは、アメリカの精神科医エリック・バーン（E.Berne）が考案した理論体系で、1950年代から発達してきた心理療法のひとつです。交流分析は自分自身のことや、人と人との間で何が起こっているのかを知りたい人に役立ちます。<br><br>
* <span>周りの目が気になり、嫌われるのが怖い
* 他人の行動が気になってしまい、イライラしてしまう
* 周りの言うことに流されやすく自分の意見を言えない
* 優しさが過ぎておせっかいになってしまう
* 物事を理論的に考えるのが苦手で計画を立てられない</span><br><br>
これらの問題を抱えている状態では、人と関わることが億劫になってしまうかもしれません。<br><br>
そして。人間関係がうまく行かないと、気疲れして独りでいる時間が多くなり、孤独な生活に陥ってしまうかもしれません。<br />また仕事であれば、周りとの人間関係がうまく行かず、営業成績が上がらなかったり、上司からの評価をもらえないこともあるでしょう。</p>
<p class="mt15"><span class="bold">2．人間関係の原理を学ぼう</span></p>
<p>では私達はどうして人間関係において様々な悩みを抱えてしまうのでしょうか？交流分析ではこれらの問題について心のあり方を理解し、改善していくことを目的としています。<br /><br />
 例えば自身をよく知るための方法としては、エゴグラムの作成が挙げられます。 エゴグラムとは、50問近い質問に回答することで自分の5性格を分析していく方法です。  具体的に人には5つの面(自我)があるといわれています。このエゴグラムは自己分析の方法として良く使われています。本講座においてもエゴグラムを活用して、自己理解を深めていきます。<br><br>
 
人間の心がどのような構造になっているかは心理学の世界では学者によって意見が分かれていますが、交流分析の考え方は一般の方でも分かりやすく、日常生活に活かしやすいといえます。このサイトではそのような交流分析の理解と日常生活の向上を目的としてサイトを作成しています。<br />
<br />交流分析の知識が皆さんの生活の幸せに繋がるように講師一同頑張っていきます！また、セミナーを通して学べるコースも用意しています。「エゴグラムについてもっと知りたい」「講座で直接学びたい」という人もお待ちしております。何かわからないことなどありましたら気軽にお問い合わせください（＾＾）</p>
<p class="align_right mt15">講師　松本、川島</p>
</div>
<!-- end intro -->

</div>
</div>
</div>
<!--//leftmenu-->

<!--mainmenu-->
<div id="top_mainmenu">

<!--mainmenu_b-->
<div class="mainmenu_b">
<div class="top_midashi"><img src="img/midashi_colum.gif" alt="人間関係改善コラム" class="wid100"></div>
<div class="pcnone"><img src="img/sp_midashi_colum.gif" class="wid100"></div>

<!--mainmenu_in-->
<div class="mainmenu_in">

<p>人間関係の力をつければ、仕事、恋愛、友人関係と幅広く効果があります。交流分析は心の問題や人間関係を考える上でとても役に立つ理論です。「エゴグラムって何？」「交流分析ってどんなの？」はじめての方はまずは気軽にコラムを読んでみて下さいね（＾＾）</p>
<p class="mt15"><h3><span class="bold">・エゴグラム(自分と他人の性格を知ろう!)</span></h3>
  
<ul class="mainmenu_navi">
<li><a href="colums/egogram_001.html">入門１　交流分析ってなんだろう</a></li>
<li><a href="colums/egogram_002.php">入門２　自我状態とは？</a></li>
<li><a href="colums/egogram_003.html">入門３　エゴグラムの見方</a></li>
<li><a href="colums/egogram_004.html">入門４　エゴグラムの見方　発展</a></li>
<li><a href="colums/egogram_005.html">入門５　偏見と思い込み</a></li>
</ul><br>
エゴグラムによって性格や人間関係のあり方を知ることができます。エゴグラムは性格傾向を知るためによく使われていて、信頼性の高いものです。講座でもエゴグラムを使用した自己理解を深めていきます。<br>
人の性格は十人十色です。学校であれ職場であれ、そこに所属している人数の数だけ異なった自我状態のパターンが存在します。そういった環境の中で上手に適応していくには、自分自身の自我状態パターンだけでなく、自分がよく関わる人の自我状態パターンも把握しておく必要があります。</p>

<p><h3 class="mt15"><span class="bold">・ストローク(日常で使う言葉をプラスにしよう)</span></h3>
  <ul class="mainmenu_navi">
  <li><A href="colums/stroke_001.html">1.心の栄養素-存在を認める言葉</A></li>
  <li><A href="colums/stroke_002.html">2.マイナスでも求めてしまう人間</A></li>
  <li><A href="colums/stroke_003.html">3.プラスのストロークでプラスの人間関係</A></li>
  <li><A href="colums/stroke_004.html">4.5つのストロークで生活を豊かに</A></li>
</ul>
<br>
「ストローク」というのは私たちのココロを支える大切な栄養素です。そういった意味ではからだを支える栄養素とは車の両輪のようなものなのかもしれません。交流分析の中でも基礎的な概念であるストロークについて学んでみましょう！
<br><br>
<a href="http://ta.direct-comm.com/colums/">もっとコラムを読んでみたい方はこちらへ&gt;&gt;</a></p>
</div>
<!--//mainmenu_in-->
</div>
<!--//mainmenu_b-->


<!--mainmenu_b-->
<div class="mainmenu_b">
<div class="mt10"><img src="img/midashi_blog.gif" alt="講師川島ブログ" class="wid100"></div>

<!--mainmenu_in-->
<div class="mainmenu_in">
<ul class="mainmenu_navi">
<?=$blist?>
</ul>

<!--<div data-plugins-type="mixi-favorite" data-service-key="49c46f5ef4202154042b71b1dc95d5428bd40341" data-size="medium" data-href="" data-show-faces="true" data-show-count="true" data-show-comment="true" data-width=""></div><script>(function(d) {var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//static.mixi.jp/js/plugins.js#lang=ja';d.getElementsByTagName('head')[0].appendChild(s);})(document);</script>-->

</div>
<!--//mainmenu_in-->
</div>
<!--//mainmenu_b-->

</div>
<!--//leftmenu-->


<!--sidemenu-->
<div id="sidemenu">
<div class="top_midashi"><img src="img/top_side_menu_bg_t.gif"></div>
<div id="sidemenu_b">
<div id="sidemenu_in">

<div class="align_center"><a href="/dvd/" class="hover_img"><img src="common/img/side_menu/btn_dvd.jpg" alt="交流分析通信講座" class="mt10" /></a></div>

<p class="mt15"><span class="bold orange">【12月に販売予定】</span>交流分析をわかりやすく学ぶには書面の上で 学ぶだけでなく、実際に講座を受けることで理解が進んでいきます。 臨床心理士松本が分かりやすく交流分析の基本についてお伝えしています。<br />心の問題を改善したい、人間関係を良くしたい、交流分析をもっと知りたいという方におススメです。</p>

<!--<div class="align_center"><a href="/short_course/index.html" class="hover_img"><img src="common/img/side_menu/btn_course.jpg" alt="交流分析講座"></a></div>

<p class="mt15">大学院卒の交流分析の専門講師、臨床心理士の松本が開催している講座です。 直接しっかり学びたい方は講座で是非お待ちしています。講座後のお茶会なども楽しんでいます（＾＾）</p>-->
<div class="mt5 align_center"><img src="common/img/side_menu/line.gif" class="wid100"></div>
<div class="mt20 align_center"><a href="/order/" class="hover_img"><img src="common/img/side_menu/btn_order.jpg" alt="研修・講演依頼"></a></div>
  
</div>
</div>
</div>
<!--//sidemenu-->

</div>
<!-- end contents -->

<div id="footer_text" class="mt15">
<h4 class="font12">交流分析,エゴグラム</h4>
<p><a href="http://www.ethnomath.org/" target="_blank" rel="nofollow">会話術・初対面・話題</a> <br />
会話の練習をしたい方は姉妹サイトの会話術サイトへ♪講座で初対面、話題力がつきます</p>
</div>

<!--footer-->
<footer id="footer">
<div id="pagetop"><a href="#top"><img src="common/img/footer/pagetop_off.gif" onMouseOver="this.src='common/img/footer/pagetop_on.gif'" onMouseOut="this.src='common/img/footer/pagetop_off.gif'"></a></div>
<address>Copyright&copy;2006-2015&nbsp;Direct&nbsp;Communication&nbsp;co.,Inc.<br class="pcnone">All&nbsp;Rights&nbsp;Reserved.</address>
</footer>

<!-- sp_bnr_pagetop -->
<div id="page-top" class="opac"><a href="#top"><img src="common/img/footer/sp_footer_pagetop.png" class="pcnone"></a></div>
<!--//sp_bnr_pagetop-->
<!--//footer-->


</div>
<!--//wrap-->

<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31134686-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</body>
</html>
