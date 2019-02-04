<?php namespace ProcessWire;

/**
 * /site/templates/_func.php
 * 
 * Example of shared functions used by template files
 *
 * This file is currently included by _init.php 
 * 
 * FUN FACT: This file is identical to the one in the NON-multi-language
 * version of this site profile (site-default). In fact, it's rare that
 * one has to think about languages when developing a multi-language 
 * site in ProcessWire. 
 *
 */

/**
 * Given a group of pages, render a simple <ul> navigation
 *
 * This is here to demonstrate an example of a simple shared function.
 * Usage is completely optional.
 *
 * @param PageArray $items
 * @return string
 *
 */
function item($item) {

if( strlen($item->video_link) > 0){

	$link = str_replace("watch?v=","embed/",$item->video_link);





	echo '<a href="'.$link.'" class="video">
	<div class="play">
<?xml version="1.0" encoding="UTF-8"?>
<svg width="39px" height="50px" viewBox="0 0 39 50" version="1.1" xmlns="http://www.w3.org/2000/svg"
    xmlns:xlink="http://www.w3.org/1999/xlink">
    <defs>
        <path d="M30.568,20.175981 L1.568,0.175981011 C1.261,-0.0350189886 0.863,-0.0570189886 0.535,0.113981011 C0.206,0.286981011 0,0.626981011 0,0.998981011 L0,40.998981 C0,41.370981 0.206,41.711981 0.535,41.884981 C0.681,41.960981 0.841,41.998981 1,41.998981 C1.199,41.998981 1.397,41.938981 1.568,41.821981 L30.568,21.821981 C30.839,21.634981 31,21.327981 31,20.998981 C31,20.669981 30.838,20.362981 30.568,20.175981 Z"
            id="path-1"></path>
        <filter x="-22.6%" y="-11.9%" width="145.2%" height="133.3%" filterUnits="objectBoundingBox"
            id="filter-2">
            <feOffset dx="0" dy="2" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
            <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1" result="shadowBlurOuter1"></feGaussianBlur>
            <feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.5 0" type="matrix"
                in="shadowBlurOuter1"></feColorMatrix>
        </filter>
    </defs>
    <g id="desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g id="9-events-3" transform="translate(-173.000000, -727.000000)" fill-rule="nonzero">
            <g id="play-button-2-copy-2" transform="translate(177.000000, 729.000000)">
                <g id="Shape">
                    <use fill="black" fill-opacity="1" filter="url(#filter-2)"
                        xlink:href="#path-1"></use>
                    <use fill="#FFFFFF" fill-rule="evenodd" xlink:href="#path-1"></use>
                </g>
            </g>
        </g>
    </g>
</svg>
</div>
	<img src="'.$item->cover_img->url.'" alt="Alt text" />
</a>';
}else{
	echo '
	<a href="'.$item->url.'" class="image">
        <img src="'.$item->url.'" alt="Alt text" />
    </a>
	';
}




};


function renderNav(PageArray $items) {

	// $out is where we store the markup we are creating in this function
	$out = '';

	// cycle through all the items
	foreach($items as $item) {

		// render markup for each navigation item as an <li>
		if($item->id == wire('page')->id) {
			// if current item is the same as the page being viewed, add a "current" class to it
			$out .= "<li class='current'>";
		} else {
			// otherwise just a regular list item
			$out .= "<li>";
		}

		// markup for the link
		$out .= "<a href='$item->url'>$item->title</a> ";
	
		// if the item has summary text, include that too
		if($item->summary) $out .= "<div class='summary'>$item->summary</div>";

		// close the list item
		$out .= "</li>";
	}

	// if output was generated above, wrap it in a <ul>
	if($out) $out = "<ul class='nav'>$out</ul>\n";

	// return the markup we generated above
	return $out;
}



/** 
 * Given a group of pages, render a <ul> navigation tree
 *
 * This is here to demonstrate an example of a more intermediate level 
 * shared function and usage is completely optional. This is very similar to
 * the renderNav() function above except that it can output more than one 
 * level of navigation (recursively) and can include other fields in the output.
 *
 * @param array|PageArray $items
 * @param int $maxDepth How many levels of navigation below current should it go?
 * @param string $fieldNames Any extra field names to display (separate multiple fields with a space)
 * @param string $class CSS class name for containing <ul>
 * @return string
 *
 */
function renderNavTree($items, $maxDepth = 0, $fieldNames = '', $class = 'nav') {

	// if we were given a single Page rather than a group of them, we'll pretend they
	// gave us a group of them (a group/array of 1)
	if($items instanceof Page) $items = array($items); 

	// $out is where we store the markup we are creating in this function
	$out = '';

	// cycle through all the items
	foreach($items as $item) {

		// markup for the list item...
		// if current item is the same as the page being viewed, add a "current" class to it
		$out .= $item->id == wire('page')->id ? "<li class='current'>" : "<li>";

		// markup for the link
		$out .= "<a href='$item->url'>$item->title</a>";

		// if there are extra field names specified, render markup for each one in a <div>
		// having a class name the same as the field name
		if($fieldNames) foreach(explode(' ', $fieldNames) as $fieldName) {
			$value = $item->get($fieldName); 
			if($value) $out .= " <div class='$fieldName'>$value</div>";
		}

		// if the item has children and we're allowed to output tree navigation (maxDepth)
		// then call this same function again for the item's children 
		if($item->hasChildren() && $maxDepth) {
			if($class == 'nav') $class = 'nav nav-tree';
			$out .= renderNavTree($item->children, $maxDepth-1, $fieldNames, $class); 
		}

		// close the list item
		$out .= "</li>";
	}

	// if output was generated above, wrap it in a <ul>
	if($out) $out = "<ul class='$class'>$out</ul>\n";

	// return the markup we generated above
	return $out; 
}

