<?php
/*
 Template Name: 2048 Game
*/
get_header(); ?>
<p>Join the numbers to get the 2048 tile!</p>
<div class="cover"></div>
<div class="container">
    <div class="logo">2048</div>
    <div class="scoreBar">
        <label style="position: relative; top:-13px;">Score:</label>
        <label id="score">0</label>
        <div id="addScore"></div>
    </div>
    <div id="stage"></div>
</div>
<?php get_footer(); ?>