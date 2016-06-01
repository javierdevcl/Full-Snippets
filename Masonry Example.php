function masonry_init() {
    jQuery(".masonry").masonry({
        columnWidth: '.grid_sizer',
        gutter: '.gutter_sizer',
        itemSelector: '.item',
        percentPosition: true,
        isOriginLeft: false
    });
}

.masonry .gutter_sizer {
    width: 2%;
}
.masonry .grid_sizer,
.masonry .item {
    width: 23.5%;
}
.masonry .item img {
    max-width: 100%;
}
