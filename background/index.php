<?
    $id = isset($_GET['seed']) ? $_GET['seed'] : 0;
    if(!$id){
        mt_srand();
        $id = mt_rand();
    }
    mt_srand($id);

    $url = 'bg.php?ps=8&seed='.$id;
?>

<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta property="og:title" content="Procedural Background">
        <meta property="og:description" content="A simple php script that outputs a small png image usable as a background">
        <meta property="og:image" content="https://ciaccodavi.de/procgen/background/bg_twitter.php?comeon">
        <meta property="og:url" content="https://ciaccodavi.de/procgen/background/">
        <meta property="og:image:width" content="1120">
        <meta property="og:image:height" content="600">
        <meta property="og:type" content="website">
        
        <meta name="twitter:title" content="Procedural Background ">
        <meta name="twitter:description" content="A simple php script that outputs a small png image usable as a background">
        <meta name="twitter:image" content="https://ciaccodavi.de/procgen/background/bg_twitter.php?comeon">
        <meta name="twitter:card" content="summary_large_image">

        <title>Procedural Background</title>
        <style type="text/css">
            @font-face {
                font-family: 'Germania';
                src: url('GermaniaOne-Regular.ttf')  format('truetype');
            }
            body{
                background: #222;padding-top: 60px;padding-bottom: 90px;
                font-family:Germania, Consolas, "Andale Mono WT", "Andale Mono", "Lucida Console", "Lucida Sans Typewriter", "DejaVu Sans Mono", "Bitstream Vera Sans Mono", "Liberation Mono", "Nimbus Mono L", Monaco, monospace;
                background-image: url(<?php echo $url; ?>);
            }
            #container{
                position: relative;
                display: block;
                border:3px double #111;
                background: #aaa;
                margin:20px auto;
               /* box-shadow: #594e3c;*/

                -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2), inset 0 0 50px rgba(0, 0, 0, 0.1);
                -moz-box-shadow: 0 0 4px rgba(0, 0, 0, 0.2), inset 0 0 50px rgba(0, 0, 0, 0.1);
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.2), inset 0 0 50px rgba(0, 0, 0, 0.1);
                padding: 0 30px;
                text-align: left;
                width: 480px;
            }
            @media screen and (max-width: 540px) {
                #container{
                    width: calc(100% - 120px);
                }
            }
            #container:before, #container:after
            {
                position: absolute;
                width: 40%;
                height: 10px;
                content: ' ';
                left: 12px;
                bottom: 12px;
                background: transparent;
                -webkit-transform: skew(-5deg) rotate(-5deg);
                -moz-transform: skew(-5deg) rotate(-5deg);
                -ms-transform: skew(-5deg) rotate(-5deg);
                -o-transform: skew(-5deg) rotate(-5deg);
                transform: skew(-5deg) rotate(-5deg);
                -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                -moz-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
                z-index: -1;
            } 

            #container:after
            {
                left: auto;
                right: 12px;
                -webkit-transform: skew(5deg) rotate(5deg);
                -moz-transform: skew(5deg) rotate(5deg);
                -ms-transform: skew(5deg) rotate(5deg);
                -o-transform: skew(5deg) rotate(5deg);
                transform: skew(5deg) rotate(5deg);
            }
            
            a{
                text-decoration: none;
                color:#273260;
            }
            a:hover{
                text-decoration: underline;
                color:#2F3B72;
            }
            a:visited{
                text-decoration: none;
                color:#392760;
            }

            p::-moz-selection {
                color:#fbb24e;
                background:#fb4435;
            }
            p::selection {
                color:#fbb24e;
                background:#fb4435;
            }
            pre {
                overflow: auto;
            }
            img{
                border: 1px solid #666;
            }
            .grey{
                color:#666;
            }
            .center{text-align: center;}
            h1{margin: 20px 0 0 0;}
        </style>
    </head>
    <body>
        <div id="container">
            <h1>Procedural Background</h1>
            <small class="grey">by <a href="https://twitter.com/ciaccodavide">ciaccodavide</a></small>
            <p>bg.php is a PHP script that act as a small png file, so that the image generated by it can be used directly in html and css.</p>
            <p>CSS:</p>
<pre>body{
    background-image: url(<?php echo $url; ?>);
}</pre>
            <p>If the seed parameter is set, the output will be always the same:</p>
            <img src="<?php echo $url; ?>">
            <!-- <small>"<?php echo $url; ?>"</small> -->
            <p>If the seed parameter is not set, a random seed will be chosen:</p>
            <img src="bg.php?ps=8">
            <!-- <small>"bg.php?ps=8"</small> -->
            <!-- <p>If the random image stops changing upon reload, it has been cached by your browser.<br>This can be avoided using a random seed during every reload, like this:</p> -->
            <?php if(isset($_GET['seed'])){ ?>
                <p><small>If you want to link this page with a random background use this link:<br><a href="https://ciaccodavi.de/procgen/background/">https://ciaccodavi.de/procgen/background/</a></small></p>
            <?php }else{ ?>
                <p><small>If you want to link this page with the current background use this link:<br><a href="https://ciaccodavi.de/procgen/background/?seed=<?php echo $id; ?>">https://ciaccodavi.de/procgen/background/?seed=<?php echo $id; ?></a></small></p>
            <?php } ?>
            <br>
            <div class="center">
                <small>
                    <a href="https://github.com/CiaccoDavide/Procgen/tree/master/background">
                    <svg version="1.1" width="16" height="16" viewBox="0 0 16 16" class="octicon octicon-mark-github" aria-hidden="true"><path fill-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
                        <span> View on GitHub </span>
                    </a>
                    </small>
            </div>
            <br>
            <br>
        </div>
    </body>
</html>
