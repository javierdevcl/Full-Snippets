GO TO: http://vst.mn/selectordie/

.sod_select .sod_label {
    padding-right:0;
}
.select_st,
.sod_select .sod_option {
    font-size: 28px;
    font-weight: normal;
    width: 100%;
    padding: 14px 22px;
    text-align: right;
    border: none;
    background: url(images/bg-input-r.png) no-repeat;
    background-size: 100% 100%;
    cursor: pointer;
}
.sod_select.focus {
    box-shadow: none;
}
.sod_select:before,
.sod_select:after {
    display: none;
}
.sod_select .sod_list_wrapper {
    width: 100%;
    margin: 0;
    border: none;
}
.sod_select.open .sod_list_wrapper {
    top: 42px;
    background: url(images/bg-input-select-dropdown.png) no-repeat;
    background-size: 100% 100%;
}
.sod_select .sod_option.selected,
.sod_select .sod_option.active,
.sod_select .sod_option {
    background: none;
    opacity:1;
    cursor: pointer;
}