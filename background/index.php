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
            
            p a{
                text-decoration: none;
                color:#3557fb;
            }
            p a:hover{
                text-decoration: underline;
                color:#6781fc;
            }
            p a:visited{
                text-decoration: none;
                color:#7635fb;
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
        </style>
    </head>
    <body>
        <div id="container">
            <h1>Procedural Wallpaper</h1>
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
                <p><small>If you want to link this page with a random background use this link:<br><a href="https://ciaccodavi.de/procgen/reddit/wallpaper/">https://ciaccodavi.de/procgen/reddit/wallpaper/</a></small></p>
            <?php }else{ ?>
                <p><small>If you want to link this page with the current background use this link:<br><a href="https://ciaccodavi.de/procgen/reddit/wallpaper/?seed=<?php echo $id; ?>">https://ciaccodavi.de/procgen/reddit/wallpaper/?seed=<?php echo $id; ?></a></small></p>
            <?php } ?>
            <br>
        </div>
    </body>
</html>
