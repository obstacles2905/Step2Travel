import React from 'react';
import ReactDOM from 'react-dom';
import _ from 'lodash';
import $ from 'jquery';
import {events} from './array_events.js';
import {event} from './array_event.js';

var map, markerEvent, markerEat, markerHotel;

var cafes = [
    {
            // "Cafe": {
            id: 0,
            marker: [],
            "type": "object",
            "description": "Model with all cafe",
            "properties": {
                "id": {
                "type": "0",
                "description": "Id of hotel",
                "format": "int32"
                },
                "types": {
                "type": "array",
                "description": "array of cafe types",
                "xml": {
                    "name": "type",
                    "wrapped": true
                },
                "items": {
                    "$ref": "#/definitions/CafeType"
                }
                },
                "name": {
                "type": "Кафешечка",
                "minLength": 5,
                "maxLength": 50,
                "description": "Name of current cafe"
                },
                "vrcafeURL": {
                "type": "string",
                "description": "Link of virtual cafe",
                "default": null
                },
                "photoURL": {
                "type": "string",
                "description": "/image/eat.png"
                },
                "descriptionCafe": {
                "type": "string",
                "description": "Description of cafe",
                "maxLength": 900
                },
                "rate": {
                "type": "number",
                "minLength": 0,
                "maxLength": 5,
                "description": "Rate of current cafe",
                "format": "double"
                },
                "latitude": {
                "type": "number",
                "description": 48.463631,
                "format": "double"
                },
                "longtitude": {
                "type": "number",
                "description": 35.050948,
                "format": "double"
                }
            },
            "xml": {
                "name": "Cafe"
            }
        // },
    },
    {
            // "Cafe": {
                id: 1,
            marker: [],
            "type": "object",
            "description": "Model with all cafe",
            "properties": {
                "id": {
                "type": "1",
                "description": "Id of hotel",
                "format": "int32"
                },
                "types": {
                "type": "array",
                "description": "array of cafe types",
                "xml": {
                    "name": "type",
                    "wrapped": true
                },
                "items": {
                    "$ref": "#/definitions/CafeType"
                }
                },
                "name": {
                "type": "Ресторанчик",
                "minLength": 5,
                "maxLength": 50,
                "description": "Name of current cafe"
                },
                "vrcafeURL": {
                "type": "string",
                "description": "Link of virtual cafe",
                "default": null
                },
                "photoURL": {
                "type": "string",
                "description": "/image/eat.png"
                },
                "descriptionCafe": {
                "type": "string",
                "description": "Description of cafe",
                "maxLength": 900
                },
                "rate": {
                "type": "number",
                "minLength": 0,
                "maxLength": 5,
                "description": "Rate of current cafe",
                "format": "double"
                },
                "latitude": {
                "type": "number",
                "description": 48.463959,
                "format": "double"
                },
                "longtitude": {
                "type": "number",
                "description": 35.052214,
                "format": "double"
                }
            },
            "xml": {
                "name": "Cafe"
            }
        // },
    }
];

var hotels = [
    {
        id: 0,
        marker: [],
      "type": "object",
      "description": "Model with all hotel",
      "properties": {
        "id": {
          "type": "integer",
          "description": "Id of hotel",
          "format": "int32"
        },
        "types": {
          "type": "array",
          "description": "array of hotel types",
          "xml": {
            "name": "types",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/HotelType"
          }
        },
        "name": {
          "type": "Мотель Бейтса",
          "minLength": 5,
          "maxLength": 50,
          "description": "Name of current hotel"
        },
        "vrhotelURL": {
          "type": "string",
          "description": "Link of virtual hotel",
          "default": null
        },
        "photoURL": {
          "type": "string",
          "description": "/image/hotel.png"
        },
        "descriptionHotel": {
          "type": "string",
          "description": "Description of hotel",
          "maxLength": 900
        },
        "rate": {
          "type": "number",
          "minLength": 0,
          "maxLength": 5,
          "description": "Rate of current hotel",
          "format": "double"
        },
        "latitude": {
          "type": "number",
          "description": 48.464129,
          "format": "double"
        },
        "longtitude": {
          "type": "number",
          "description": 35.051606,
          "format": "double"
        }
      },
      "xml": {
        "name": "Hotel"
      }
    },
    {
        id: 1,
            marker: [],
      "type": "object",
      "description": "Model with all hotel",
      "properties": {
        "id": {
          "type": "integer",
          "description": "Id of hotel",
          "format": "int32"
        },
        "types": {
          "type": "array",
          "description": "array of hotel types",
          "xml": {
            "name": "types",
            "wrapped": true
          },
          "items": {
            "$ref": "#/definitions/HotelType"
          }
        },
        "name": {
          "type": "Спи спокойно",
          "minLength": 5,
          "maxLength": 50,
          "description": "Name of current hotel"
        },
        "vrhotelURL": {
          "type": "string",
          "description": "Link of virtual hotel",
          "default": null
        },
        "photoURL": {
          "type": "string",
          "description": "/image/hotel.png"
        },
        "descriptionHotel": {
          "type": "string",
          "description": "Description of hotel",
          "maxLength": 900
        },
        "rate": {
          "type": "number",
          "minLength": 0,
          "maxLength": 5,
          "description": "Rate of current hotel",
          "format": "double"
        },
        "latitude": {
          "type": "number",
          "description": 48.463233,
          "format": "double"
        },
        "longtitude": {
          "type": "number",
          "description": 35.053057,
          "format": "double"
        }
      },
      "xml": {
        "name": "Hotel"
      }
    },
];

let sightData;

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



function InitMapSight(lat, lng) {
    // Create a map object and specify the DOM element for display.
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: Number(lat), lng: Number(lng)},
        scrollwheel: false,
        zoom: 18
    });

    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');

    DrawPointSight(lat, lng, sightData.name, sightData.id);
    DrawPointsPlaceNear(cafes);
    DrawPointsPlaceNear(hotels);

}

function DrawPointSight (lat, lng, name, id) {

    var marker = new google.maps.Marker({
    
        position: {lat: Number(lat), lng: Number(lng)},
        map: map,
        icon: {
            url: "/image/sport_marker.png",
            scaledSize: new google.maps.Size(50, 50)
        }
    });

    // sightData[key].marker.push(marker);

    google.maps.event.addListener(marker,'click', (function(marker, name, infowindow, id){

        return function() {
        infowindow.setContent(contentString);

        infowindow.open(map, marker);
        $('#content').text(name);
        
        };
    })(marker, name, infowindow, id));


}

function DrawPointsPlaceNear (arr) {

    for (var key in arr) {

            var marker = new google.maps.Marker({
                
                position: {lat: arr[key].properties.latitude.description, lng: arr[key].properties.longtitude.description},
                map: map,
                icon: {
                    url: arr[key].properties.photoURL.description,
                    scaledSize: new google.maps.Size(30, 30)
                }
            });

            arr[key].marker.push(marker);

            google.maps.event.addListener(marker,'click', (function(marker, name, infowindow, id){

                return function() {
                infowindow.setContent(contentString);

                infowindow.open(map, marker);
                $('#content').text(name);
                
                };
            })(marker, arr[key].properties.name.type, infowindow, arr[key].id));   
    }
    
}

function DeletePointsPlaceNear (arr) {
    for (var key in arr) {
        for (var keyMarker in arr[key].marker) {
            arr[key].marker[keyMarker].setMap(null); 
        }  
    }
}

var colorButtonEat = true, colorButtonHotel = true;

$("li#whereEat").on("click", function () {
    
    if (colorButtonEat == false) {
        DrawPointsPlaceNear(cafes);
        $(".sight_map_button_foot").css("background-color", "rgb(105, 43, 118)");
        colorButtonEat = true;
    } else {
        DeletePointsPlaceNear(cafes);
        $(".sight_map_button_foot").css("background-color", "rgb(165, 165, 165)");
        colorButtonEat = false;
    }
    
});

$("li#whereSleep").on("click", function () {
    if (colorButtonHotel == false) {
        DrawPointsPlaceNear(hotels);
        $(".sight_map_button_house").css("background-color", "rgb(50, 217, 174)");
        colorButtonHotel = true;
    } else {
        DeletePointsPlaceNear(hotels);
        $(".sight_map_button_house").css("background-color", "rgb(165, 165, 165)");
        colorButtonHotel = false
    }
});

function setSizeHeightSight () {
    var sizeDisplay = screen.height;
    $('div#sight_name_and_panoram').css('min-height', sizeDisplay);
    $('img.name_and_panoram_bg').css('height', sizeDisplay);
}

class BreadCrumb extends React.Component {
    render () {
        return (
            <ul>
                <li><a href="http://s2t.loc/index.php?r="> Головна </a> /</li>
                <li><a href="http://s2t.loc/index.php?r=map%2Findex"> Карта </a> /</li>
                <li><a href="#"> {this.props.data.name} </a></li>
            </ul>
        );
    }
}

function CoverEvent (img) {
    $(".name_and_panoram_bg").attr("src", img);
}

class NameSight extends React.Component {
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
                                    <li><img src="/image/icons/Rate.svg" alt="" />{this.props.data.rate}</li>
                                    <li><img src="/image/icons/Route.svg" alt="" />8</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="button_panoram">
                    <div className="label_panoram_circle_substrate">
                        <div className="label_panoram_circle">
                            <img src="/image/icons/Panorama.svg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        );
    }

}

class InfoSight extends React.Component {
    render () {
        return (
            <div>
                <div className="information_about_place_title">{this.props.data.name}</div>
                <div className="information_about_place_text">{this.props.data.descriptionPoint}</div>
            </div>
        );
    }
};

class TypesSight extends React.Component {
    render () {
        return (
            <div className="tags">
                <ul><li><a href="">{this.props.data.category.name}</a></li></ul>
            </div>
        );
        
    }
};

function getDataSight () {
    let url = window.location.href;
    let str = "id";
    let pos = 0;
    pos = url.indexOf(str, pos);
    let id = url.substring(pos+3, url.length);
    // console.log(id);
    
    $.ajax({
        url: "http://192.168.92.65/apis2d/index.php?r=point%2Fview&id=" + id,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            sightData = data;
            setSizeHeightSight();
            CoverEvent(data.image);
            InitMapSight(data.latitude, data.longtitude);
            ReactDOM.render(
                <BreadCrumb data={data}/>,
                document.getElementById('bread_crumbs')
            );
            ReactDOM.render(
                <NameSight data={data}/>,
                document.getElementById('sight_name_and_panoram_react')
            );
            ReactDOM.render(
                <InfoSight data={data}/>,
                document.getElementById('sight_about')
            );
            ReactDOM.render(
                <TypesSight  data={data}/>,
                document.getElementById('sight_types')
            );
        }
    });
}

function checkElementSight () {
    if ($("div").is("#sight_map")) {
        getDataSight();
    }
}
checkElementSight();

$('.module_panoram_close').fadeOut(0);
$('.module_panoram').fadeOut(0);

$('div#sight_name_and_panoram_react').on('click', '.label_panoram_circle_substrate', function () {
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