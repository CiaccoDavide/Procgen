<?php
    $id = isset($_GET['seed']) ? $_GET['seed'] : 0;
    // if seed is not set in the url use a random one!
    if(!$id) mt_srand();
    else mt_srand($id);
    
    // get pixel size (resolution multiplier) default is x1
    $pixel_size = isset($_GET['ps']) ? $_GET['ps'] : 1;
    // logo size
    // $width = 640/$pixel_size;
    // $height = 480/$pixel_size;

    $width = $mat_w = mt_rand(3, 10);
    $height = $mat_h = mt_rand(3, 10);

    // create the "canvas"
    $img = imagecreatetruecolor($width, $height);
    
    // pattern design will have pixel size x1 or x2
    $mod_size = !mt_rand(0, 4) ? 2 : 1; // one on four can have mod_size = 2
    
    $col_min = 90;// min color value
    $col_max = 240;// max color value

    // color palette generation
    $colors = [];
    // starting colors
    $num_of_generators = mt_rand(2, 4);
    // final palette size
    $num_of_colors = mt_rand(3, 6);
    while ($num_of_colors <= $num_of_generators) $num_of_colors = mt_rand(3, 6);

    $palette = imagecreatetruecolor($num_of_generators, 1);
    // generate starting colors
    for ($c=0; $c < $num_of_generators; $c++)
        imagesetpixel( $palette, $c, 0, imagecolorallocate($palette, mt_rand($col_min, $col_max) / ($c/2 + 1), mt_rand($col_min, $col_max) / ($c/2 + 1), mt_rand($col_min, $col_max) / ($c/2 + 1)) );

    $palette = imagescale($palette, 100 * $num_of_generators, 1,  IMG_BILINEAR_FIXED);
    $palette = imagescale($palette, $num_of_colors, 1, IMG_BILINEAR_FIXED);

    for ($c=0; $c < $num_of_colors; $c++)
        $colors[] = imagecolorat($palette, $c, 0);


    // backround color
    imagefilledrectangle($img, 0, 0, $width, $height, $colors[0]);


    // pattern matrix, max: 10*10 (x*y)
    $pattern_matrix = array(
        0 => array(0,0,0,0,0,0,0,0,0,0),
        1 => array(0,0,0,0,0,0,0,0,0,0),
        2 => array(0,0,0,0,0,0,0,0,0,0),
        3 => array(0,0,0,0,0,0,0,0,0,0),
        4 => array(0,0,0,0,0,0,0,0,0,0),
        5 => array(0,0,0,0,0,0,0,0,0,0),
        6 => array(0,0,0,0,0,0,0,0,0,0),
        7 => array(0,0,0,0,0,0,0,0,0,0),
        8 => array(0,0,0,0,0,0,0,0,0,0),
        9 => array(0,0,0,0,0,0,0,0,0,0),
    );

    $mirror_horizontal = mt_rand(0, 1);
    $mirror_vertical = mt_rand(0, 1);
    $pixel_mirrored = false;

    // generate the pattern matrix
    for( $px = 0; $px < $mat_w; $px++ )
    {
        for( $py = 0; $py < $mat_h; $py++ )
        {
            $pixel_mirrored = false;

            if( $mirror_horizontal && $py > $mat_h / 2 )
            {
                $pixel_mirrored = true;
                $pattern_matrix[$px][$py] = $pattern_matrix[$px][$mat_h - $py];
            }

            if( $mirror_vertical && $px > $mat_w / 2 )
            {
                $pixel_mirrored = true;
                $pattern_matrix[$px][$py] = $pattern_matrix[$mat_w - $px][$py];
            }

            $rand_col =  mt_rand(0, $num_of_colors-1);
            if( !$pixel_mirrored && $rand_col > 0)
            {
                $pattern_matrix[$px][$py] = $rand_col;
            }
        }
    }

    // apply mask
    for( $x = 0; $x < $width; $x++ )
    {
        for( $y = 0; $y < $height; $y++ )
        {
            $pattern_value = $pattern_matrix[($x/$mod_size)%$mat_w][($y/$mod_size)%$mat_h];
            if($pattern_value > 0) imagesetpixel( $img, $x, $y, $colors[$pattern_value]);
        }
    }

    // apply resolution multiplier (pixel size)
    $img = imagescale($img, $width * $pixel_size, $height * $pixel_size, IMG_NEAREST_NEIGHBOUR);

    // set content header: this file will not load like a normal html page, it will output a png file
    header("Content-type: image/png");
    // output image
    imagepng($img);
    // destroy images
    imagedestroy($img);
    imagedestroy($palette);
