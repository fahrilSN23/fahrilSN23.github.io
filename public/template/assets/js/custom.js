/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// $(document).ready(function(){
//     $('ul li a').click(function(){
//         $('li a').removeClass("active");
//         $(this).addClass("active");
//     });
// });

var path = location.pathname.split('/')
var url = location.origin + '/' + path[1] + '/' + path[2]

$('ul.sidebar-menu li a').each(function() {
    if ($(this).attr('href').indexOf(url) !== -1) {
        $(this).parent().addClass('active').parent().parent('li').addClass('active')
    }
});

$(document).ready(function(){
    $("#form-input").css("display","none");
    $(".jenis_menu").click(function(){
        if ($("input[name='jenis_menu']:checked").val() == "sub" ) {
            $("#form-input").slideDown("fast");
        } else {
            $("#form-input").slideUp("fast");
            document.getElementById("sub_menu").value = "";
        }
    });
    
    $("#form-input-halaman").css("display","none");
    $("#form-input-kategori").css("display","none");
    $("#form-input-playlist").css("display","none");
    $(".sumber_menu").click(function(){
    if ($("input[name='sumber_menu']:checked").val() == "link" ) {
        $("#form-input-link").slideDown("fast");
        $("#form-input-halaman").slideUp("fast");
        $("#form-input-kategori").slideUp("fast");
        $("#form-input-playlist").slideUp("fast");
        document.getElementById("halaman_input").value = "";
        document.getElementById("kategori_input").value = "";
        document.getElementById("playlist_input").value = "";
    } else if ($("input[name='sumber_menu']:checked").val() == "halaman" ) {
        $("#form-input-halaman").slideDown("fast");
        $("#form-input-link").slideUp("fast");
        $("#form-input-kategori").slideUp("fast");
        $("#form-input-playlist").slideUp("fast");
        document.getElementById("link_input").value = "";
        document.getElementById("kategori_input").value = "";
        document.getElementById("playlist_input").value = "";
    } else if ($("input[name='sumber_menu']:checked").val() == "kategori" ) {
        $("#form-input-kategori").slideDown("fast");
        $("#form-input-link").slideUp("fast");
        $("#form-input-halaman").slideUp("fast");
        $("#form-input-playlist").slideUp("fast");
        document.getElementById("link_input").value = "";
        document.getElementById("halaman_input").value = "";
        document.getElementById("playlist_input").value = "";
    } else {
        $("#form-input-playlist").slideDown("fast");
        $("#form-input-link").slideUp("fast");
        $("#form-input-halaman").slideUp("fast");
        $("#form-input-kategori").slideUp("fast");
        document.getElementById("link_input").value = "";
        document.getElementById("halaman_input").value = "";
        document.getElementById("kategori_input").value = "";
    }
    });
});