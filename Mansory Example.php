jQuery(".grid").masonry({
	columnWidth: '.grid-sizer',
	gutter: '.gutter-sizer',
	itemSelector: '.grid-item',
	percentPosition: true,
	isOriginLeft: false
});

.gutter-sizer {
    width: 2%;
}
.grid-sizer,
.grid-item {
    width: 23.5%;
}
.grid-item img {
    max-width: 100%;
}

wp_enqueue_script( 'masonry' );