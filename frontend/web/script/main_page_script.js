import React from 'react';
import ReactDOM from 'react-dom';
import _ from 'lodash';
import $ from 'jquery';
import {events} from './array_events.js';
import {event} from './array_event.js';


function setSizeHeight () {
    var sizeDisplay = screen.height;
    $('#container_header, #container_manual, #container_promo, #container_panorams_tour, #container_events').css('min-height', sizeDisplay);
}

setSizeHeight();

function whatPage () {
    
    if (true == ($("div").is("#container_header"))) {
        $('#menu').css({
            'position': 'fixed'
        });
        $('#menu').css({
            'background': 'rgba(1, 111, 138, 0)',
            'padding-top': '7%'
        });
        $('.menu_logo').css({
            'top': '18.5%'
        });

        $('.menu_left').css({
            'top' : '48%'
        });

        $('.menu_right').css({
            'top' : '40%'
        });

        $(window).scroll( function () {
            var heightTop = $('div#menu').offset().top;

            if (heightTop >= 150) {
                $('#menu').css({
                    'background': 'linear-gradient(to left, #009db4, #01dadc)',
                    'padding-top': '4%'
                });
                $('.menu_logo').css({
                    'top': '13%'
                });

                $('.menu_left').css({
                    'top' : '36%'
                });

                $('.menu_right').css({
                    'top' : '25%'
                });

            } else {
                $('#menu').css({
                    'background': 'rgba(1, 111, 138, 0)',
                    'padding-top': '7%'
                });
                $('.menu_logo').css({
                    'top': '25%'
                });

                $('.menu_left').css({
                    'top' : '48%'
                });

                $('.menu_right').css({
                    'top' : '40%'
                });
            }
        });
    }   
}

whatPage();

$('.container_header_close_panoram').fadeOut(0);
$('.container_header_panoram').fadeOut(0);

$('.container_header_circle_substrate').on('click', function () {
    $('.container_header_image').fadeOut(300);
    $('.container_header_label').fadeOut(0);
    $('.container_header_close_panoram').fadeIn(0);
    $('.container_header_panoram').fadeIn(300);
});

$('.container_header_close_panoram').on('click', function () {
    $('.container_header_image').fadeIn(300);
    $('.container_header_label').fadeIn(0);
    $('.container_header_close_panoram').fadeOut(0);
    $('.container_header_panoram').fadeOut(0);
});


function getDataMainPage () {
    let siteMain = [];
    $.ajax({
        url: 'http://192.168.92.65/apis2d/index.php?r=site%2Fmain',
        dataType: 'json',
        success: function (data) {
            // siteMain = data;
            // console.log(siteMain);
            setDataMain(data);
        }
    });

    $.ajax({
        url: 'http://192.168.92.65/apis2d/index.php?r=site%2Fcity',
        dataType: 'json',
        success: function (data) {
            // siteCity = data;
            // console.log(siteCity);
            //   console.log(siteCity.panorama);
              
            //   $("#forPanorama").attr("src", siteCity.panorama);
              onLoad(data.panorama);
              setDataCity(data);
        }
    });

    
}



getDataMainPage();

function setDataMain (arr) {
    // console.log(arr);
    // $("#container_header .container_header_label_title").text(arr.introText);
    $("#container_header .container_header_label_text").text(arr.introText);
    $("#container_promo .container_promo_video").html('<iframe src="'+arr.videoURL+'" frameborder="0" allowfullscreen></iframe>');
    $("#container_promo .container_promo_info p").html(arr.videoText);
}

function setDataCity (arr) {
    // console.log(arr);
    $("#container_manual .container_manual_title").text(arr.name);
    $("#container_manual .container_manual_text").text(arr.descriptionCity);
    // $("#container_promo .container_promo_video iframe").attr("src", arr.videoURL);
    
    
}

// var vrView;

// All the scenes for the experience

// var a = $('#panoramImage').attr('src'); //Метод для парсинга картинки и получения её ссылки

// function onLoad(img) {
//     // var a = $('#forPanorama').attr('src');
//     // console.log(a);
//   vrView = new VRView.Player('#vrview', {
//     width: '100%',
//     height: 480,
//     image: img,
//     is_stereo: false,
//     is_autopan_off: true
//   });

//   // vrView.on('ready', onVRViewReady);
//   // vrView.on('modechange', onModeChange);
//   // vrView.on('error', onVRViewError);
// //   console.log(img);
// //   console.log($("#vrview iframe").attr("src", img));
// }

// window.addEventListener('load', onLoad);


