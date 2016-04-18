jQuery(window).load(function(){
	jQuery(".scroll_container").mCustomScrollbar();
});

.scroll_container {
    overflow: hidden;
    max-height: 400px;
    padding: 0;
}





function horizontal_scroll_init() {
    jQuery(".horizontal_scroll").mCustomScrollbar({
        axis:"x",
        theme:"light-3",
        keyboard: true,
        snapAmount: 20,
        scrollButtons:{enable:true},
        advanced:{autoExpandHorizontalScroll:true},
    });
}

.horizontal_scroll {
    overflow: auto;
    width: 100%;\
	direction: rtl;
}

.mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCSB_scrollTools_vertical.mCSB_scrollTools_onDrag_expand .mCSB_dragger_bar {
    background-color: red !important;
}