# Procedural Background

A simple php script that outputs a small png image then used as a background

If a seed is not set, the background image will be randomized upon every reload!

![](https://raw.githubusercontent.com/CiaccoDavide/Procgen/master/background/img/example.png)

[Live demo](https://ciaccodavi.de/procgen/background) 


##### Update: added color palette generation

I tried to generate palettes of color in a fast way:
 
1) randomly set two parameters: the number of starting colors [2,3,4] and the number of the final palette's colors [3,4,5,6] (the final colors must be more than the starting ones)

2) generate random starting colors

3) an image 1 pixel tall and wide as the number of starting colors is created, and filled with those colors

4) that image is then stretched with a bilinear filter and then shrinked back until it has the number of the final palette's color as its width

5) now each pixel of the palette has a color that can be used in the final image and should be a bit more pleasant!

##### Example of palette generation from 3 to 5 colors:
![](https://raw.githubusercontent.com/CiaccoDavide/Procgen/master/background/img/palette.png)
