import React from 'react';
import ReactDOM from 'react-dom';
import _ from 'lodash';
import $ from 'jquery';
import {events} from './array_events.js';
import {event} from './array_event.js';

var map, markerEvent, markerEat, markerHotel;
let tourData;

var contentString = '<div id="content"></div>';
var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });
var styledMapType = new google.maps.StyledMapType(
    [
        {
            "featureType": "administrative",
            "elementType": "geometry",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "poi",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "labels.icon",
            "stylers": [
            {
                "visibility": "off"
            }
            ]
        },
        {
            "featureType": "transit",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        }
    ]
);



function InitMapTour() {
    // Create a map object and specify the DOM element for display.
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: event[2].latitude, lng: event[2].longtitude},
        scrollwheel: false,
        zoom: 18
    });

    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');

    DrawPointSight(2);

}

function DrawPointSight (id) {

    for (var key in event) {
            // if (event[key].id == id) {
                    $('.tour_map_about_place_box_title').text(event[0].name);
                    $('.tour_map_about_place_box p').text(event[0].descriptionEvent);
                var marker = new google.maps.Marker({
                
                    position: {lat: event[key].latitude, lng: event[key].longtitude},
                    map: map,
                    icon: {
                        url: "image/sport_marker.png",
                        scaledSize: new google.maps.Size(50, 50)
                    }
                });

                event[key].marker.push(marker);

                google.maps.event.addListener(marker,'click', (function(marker, name, descriptionEvent, infowindow, id){
    
                    return function() {
                    $('.tour_map_about_place_box_title').text(name);
                    $('.tour_map_about_place_box p').text(descriptionEvent);
                    infowindow.setContent(contentString);

                    infowindow.open(map, marker);
                    $('#content').text(name);
                    
                    };
                    
                })(marker, event[key].name, event[key].descriptionEvent, infowindow, event[key].id));

            // }

    }

}

function setSizeHeightTour () {
    var sizeDisplay = screen.height;
    $('div#tour_name_and_panoram').css('min-height', sizeDisplay);
    $('img.name_and_panoram_bg').css('height', sizeDisplay);
    // $('div.module_panoram iframe').css('height', sizeDisplay);

}

class BreadCrumb extends React.Component {
    render () {
        return (
            <ul>
                <li><a href="http://s2t.loc/index.php?r="> Головна </a> /</li>
                <li><a href="http://s2t.loc/index.php?r=tour%2Findex"> Тури </a> /</li>
                <li><a href="#"> {this.props.data.name} </a></li>
            </ul>
        );
    }
}

function CoverEvent (img) {
    $(".name_and_panoram_bg").attr("src", img);
}

class NameTour extends React.Component {
    render () {
        return (
            <div className="label_name_and_panoram_box">
                <div className="label_name_box">
                    <div className="label_name_circle_substrate">
                        <div className="label_name_circle">
                            <div className="label_name_title">
                                {this.props.data.name}
                            </div>
                            <div className="label_name_about">
                                <ul>
                                    <li><img src="image/icons/Rate.svg" alt="" />{this.props.data.rate}</li>
                                    <li><img src="image/icons/Route.svg" alt="" />8</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="button_panoram">
                    <div className="label_panoram_circle_substrate">
                        <div className="label_panoram_circle">
                            <img src="image/icons/Panorama.svg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        );
    }

}

class InfoTour extends React.Component {
    render () {
        return (
            <div>
                <div className="information_about_place_title">{this.props.data.name}</div>
                <div className="information_about_place_text">{this.props.data.description}</div>
            </div>
        );
    }
};

class TypesTour extends React.Component {
    // getType (props) {
    //     // const types;
    //     const typesArr = [];
    //     for (var key in props) {

    //         typesArr.push(props[key].name);        
    //     }
    //     const listTypes = typesArr.map((type, index) => <li key={index}><a href=""></a></li>);

    //     return (
    //         <ul>{listTypes}</ul>
    //     );

    // }
    render () {
        return (
            <div className="tags">
                <ul><li><a href="">{this.props.data.category.name}</a></li></ul>
            </div>
        );
        
    }
};

function getDataTour () {
    let url = window.location.href;
    let str = "id";
    let pos = 0;
    pos = url.indexOf(str, pos);
    let id = url.substring(pos+3, url.length);
    // console.log(id);
    
    $.ajax({
        url: "http://192.168.92.65/apis2d/index.php?r=tour%2Fview&id=" + id,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            tourData = data;
            setSizeHeightTour();
            CoverEvent(data.image);
            InitMapTour();
            ReactDOM.render(
                <BreadCrumb data={data}/>,
                document.getElementById('bread_crumbs')
            );
            ReactDOM.render(
                <NameTour data={data}/>,
                document.getElementById('tour_name_and_panoram_react')
            );
            ReactDOM.render(
                <InfoTour data={data}/>,
                document.getElementById('tour_about')
            );
            ReactDOM.render(
                <TypesTour data={data}/>,
                document.getElementById('tour_type')
            );
        }
    });
}

function checkElementTour () {
    if ($("div").is("#tour_map")) {
        getDataTour();
    }
}
checkElementTour();

$('.module_panoram_close').fadeOut(0);
$('.module_panoram').fadeOut(0);

$('div#tour_name_and_panoram_react').on('click', '.label_panoram_circle_substrate', function () {
    var sizeDisplay = screen.height;
    $('div.module_panoram iframe').css('height', sizeDisplay);
    $('div#sight_name_and_panoram_react .label_name_and_panoram_box').fadeOut(300);
    // $('.container_header_label').fadeOut(0);
    $('.module_panoram_close').fadeIn(0);
    $('.module_panoram').fadeIn(300);
    // alert();
});

$('.module_panoram_close').on('click', function () {
    $('div#sight_name_and_panoram_react .label_name_and_panoram_box').fadeIn(300);
    // $('.container_header_label').fadeIn(0);
    $('.module_panoram_close').fadeOut(0);
    $('.module_panoram').fadeOut(0);
    // alert();
});