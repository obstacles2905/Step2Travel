import React from 'react';
import ReactDOM from 'react-dom';
import _ from 'lodash';
import $ from 'jquery';
import {events} from './array_events.js';
import {event} from './array_event.js';

var map, markerEvent, markerEat, markerHotel;

// var cafes = [
//     {
//             // "Cafe": {
//             id: 0,
//             marker: [],
//             "type": "object",
//             "description": "Model with all cafe",
//             "properties": {
//                 "id": {
//                 "type": "0",
//                 "description": "Id of hotel",
//                 "format": "int32"
//                 },
//                 "types": {
//                 "type": "array",
//                 "description": "array of cafe types",
//                 "xml": {
//                     "name": "type",
//                     "wrapped": true
//                 },
//                 "items": {
//                     "$ref": "#/definitions/CafeType"
//                 }
//                 },
//                 "name": {
//                 "type": "Кафешечка",
//                 "minLength": 5,
//                 "maxLength": 50,
//                 "description": "Name of current cafe"
//                 },
//                 "vrcafeURL": {
//                 "type": "string",
//                 "description": "Link of virtual cafe",
//                 "default": null
//                 },
//                 "photoURL": {
//                 "type": "string",
//                 "description": "image/eat.png"
//                 },
//                 "descriptionCafe": {
//                 "type": "string",
//                 "description": "Description of cafe",
//                 "maxLength": 900
//                 },
//                 "rate": {
//                 "type": "number",
//                 "minLength": 0,
//                 "maxLength": 5,
//                 "description": "Rate of current cafe",
//                 "format": "double"
//                 },
//                 "latitude": {
//                 "type": "number",
//                 "description": 48.463631,
//                 "format": "double"
//                 },
//                 "longtitude": {
//                 "type": "number",
//                 "description": 35.050948,
//                 "format": "double"
//                 }
//             },
//             "xml": {
//                 "name": "Cafe"
//             }
//         // },
//     },
//     {
//             // "Cafe": {
//                 id: 1,
//             marker: [],
//             "type": "object",
//             "description": "Model with all cafe",
//             "properties": {
//                 "id": {
//                 "type": "1",
//                 "description": "Id of hotel",
//                 "format": "int32"
//                 },
//                 "types": {
//                 "type": "array",
//                 "description": "array of cafe types",
//                 "xml": {
//                     "name": "type",
//                     "wrapped": true
//                 },
//                 "items": {
//                     "$ref": "#/definitions/CafeType"
//                 }
//                 },
//                 "name": {
//                 "type": "Ресторанчик",
//                 "minLength": 5,
//                 "maxLength": 50,
//                 "description": "Name of current cafe"
//                 },
//                 "vrcafeURL": {
//                 "type": "string",
//                 "description": "Link of virtual cafe",
//                 "default": null
//                 },
//                 "photoURL": {
//                 "type": "string",
//                 "description": "image/eat.png"
//                 },
//                 "descriptionCafe": {
//                 "type": "string",
//                 "description": "Description of cafe",
//                 "maxLength": 900
//                 },
//                 "rate": {
//                 "type": "number",
//                 "minLength": 0,
//                 "maxLength": 5,
//                 "description": "Rate of current cafe",
//                 "format": "double"
//                 },
//                 "latitude": {
//                 "type": "number",
//                 "description": 48.463959,
//                 "format": "double"
//                 },
//                 "longtitude": {
//                 "type": "number",
//                 "description": 35.052214,
//                 "format": "double"
//                 }
//             },
//             "xml": {
//                 "name": "Cafe"
//             }
//         // },
//     }
// ];

// var hotels = [
//     {
//         id: 0,
//         marker: [],
//       "type": "object",
//       "description": "Model with all hotel",
//       "properties": {
//         "id": {
//           "type": "integer",
//           "description": "Id of hotel",
//           "format": "int32"
//         },
//         "types": {
//           "type": "array",
//           "description": "array of hotel types",
//           "xml": {
//             "name": "types",
//             "wrapped": true
//           },
//           "items": {
//             "$ref": "#/definitions/HotelType"
//           }
//         },
//         "name": {
//           "type": "Мотель Бейтса",
//           "minLength": 5,
//           "maxLength": 50,
//           "description": "Name of current hotel"
//         },
//         "vrhotelURL": {
//           "type": "string",
//           "description": "Link of virtual hotel",
//           "default": null
//         },
//         "photoURL": {
//           "type": "string",
//           "description": "image/hotel.png"
//         },
//         "descriptionHotel": {
//           "type": "string",
//           "description": "Description of hotel",
//           "maxLength": 900
//         },
//         "rate": {
//           "type": "number",
//           "minLength": 0,
//           "maxLength": 5,
//           "description": "Rate of current hotel",
//           "format": "double"
//         },
//         "latitude": {
//           "type": "number",
//           "description": 48.464129,
//           "format": "double"
//         },
//         "longtitude": {
//           "type": "number",
//           "description": 35.051606,
//           "format": "double"
//         }
//       },
//       "xml": {
//         "name": "Hotel"
//       }
//     },
//     {
//         id: 1,
//             marker: [],
//       "type": "object",
//       "description": "Model with all hotel",
//       "properties": {
//         "id": {
//           "type": "integer",
//           "description": "Id of hotel",
//           "format": "int32"
//         },
//         "types": {
//           "type": "array",
//           "description": "array of hotel types",
//           "xml": {
//             "name": "types",
//             "wrapped": true
//           },
//           "items": {
//             "$ref": "#/definitions/HotelType"
//           }
//         },
//         "name": {
//           "type": "Спи спокойно",
//           "minLength": 5,
//           "maxLength": 50,
//           "description": "Name of current hotel"
//         },
//         "vrhotelURL": {
//           "type": "string",
//           "description": "Link of virtual hotel",
//           "default": null
//         },
//         "photoURL": {
//           "type": "string",
//           "description": "image/hotel.png"
//         },
//         "descriptionHotel": {
//           "type": "string",
//           "description": "Description of hotel",
//           "maxLength": 900
//         },
//         "rate": {
//           "type": "number",
//           "minLength": 0,
//           "maxLength": 5,
//           "description": "Rate of current hotel",
//           "format": "double"
//         },
//         "latitude": {
//           "type": "number",
//           "description": 48.463233,
//           "format": "double"
//         },
//         "longtitude": {
//           "type": "number",
//           "description": 35.053057,
//           "format": "double"
//         }
//       },
//       "xml": {
//         "name": "Hotel"
//       }
//     },
// ];

// var eventPage = [
//         {
//         "city": [
//             {
//             "id": 0,
//             "ip": "string",
//             "name": "Дніпро",
//             "descriptionCity": "string",
//             "photoURL": "string",
//             "panoramaURL": "string"
//             }
//         ],
//         "categories": [
//             {
//             "id": 0,
//             "name": "Спорт",
//             "iconURL": "string"
//             },
//             {
//             "id": 1,
//             "name": "Crossfit",
//             "iconURL": "string"
//             }
//         ],
//         "name": "Crossfit",
//         "photoURL": "image/crossfit.jpg",
//         "descriptionEvent": "Игры Кроссфит проводятся каждое лето с 2007 года. В каких именно дисциплинах проводятся соревнования, становится известно лишь за несколько часов до начала Игр. В число дисциплин включаются в том числе неожиданные элементы, которые не входят в типичный набор Кроссфит-тренировок.",
//         "date": "14 Червня",
//         "begin": "12:00",
//         "end": "15:00",
//         "address": "вулиця Магдебурзького права, 4, Дніпро, Украина, 49000",
//         "latitude": 48.463683,
//         "longtitude": 35.051688
//     }
// ];

// var marker = [];
let cafeData;

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

function InitMapCafe(lat, lng) {
    // Create a map object and specify the DOM element for display.
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: Number(lat), lng: Number(lng)},
        scrollwheel: false,
        zoom: 18
    });

    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');

}

function DrawPoint (latitude, longtitude, name, id) {
    console.log("latitude " + latitude + " longtitude " + longtitude + " name " + name + " id " + id);
    // for (var key in event) {
    //         if (event[key].id == id) {
                var marker = new google.maps.Marker({
                
                    position: {lat: parseFloat(latitude), lng: parseFloat(longtitude)},
                    map: map,
                    icon: {
                        url: "image/sport_marker.png",
                        scaledSize: new google.maps.Size(100, 100)
                    }
                });

                // marker.push(marker);

                google.maps.event.addListener(marker,'click', (function(marker, name, infowindow, id){
    
                    return function() {
                    infowindow.setContent(contentString);

                    infowindow.open(map, marker);
                    $('#content').text(name);
                    
                    };
                })(marker, name, infowindow, id));

    //         }

    // }

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

// var colorButtonEat = true, colorButtonHotel = true;

// $("li#whereEat").on("click", function () {
    
//     if (colorButtonEat == false) {
//         DrawPointsPlaceNear(cafes);
//         $(".cafe_map_button_foot").css("background-color", "rgb(105, 43, 118)");
//         colorButtonEat = true;
//     } else {
//         DeletePointsPlaceNear(cafes);
//         $(".cafe_map_button_foot").css("background-color", "rgb(165, 165, 165)");
//         colorButtonEat = false;
//     }
    
// });

// $("li#whereSleep").on("click", function () {
//     if (colorButtonHotel == false) {
//         DrawPointsPlaceNear(hotels);
//         $(".cafe_map_button_house").css("background-color", "rgb(50, 217, 174)");
//         colorButtonHotel = true;
//     } else {
//         DeletePointsPlaceNear(hotels);
//         $(".cafe_map_button_house").css("background-color", "rgb(165, 165, 165)");
//         colorButtonHotel = false
//     }
// });

class BreadCrumb extends React.Component {
    render () {
        return (
            <ul>
                <li><a href="http://s2t.loc/index.php?r="> Головна </a> /</li>
                <li><a href="http://s2t.loc/index.php?r=map%2Findex"> Ресторан </a> /</li>
                <li><a href="#"> {this.props.data.name} </a></li>
            </ul>
        );
    }
}


function CoverCafe (img) {
    $("#sight_name_and_panoram").css("background-image", "url("+img+")");
}

// CoverCafe();

// var NameEvent = React.createClass(
class NameCafe extends React.Component {
    render () {
        return (
            <div className="label_name_and_panoram_box">
                <div className="label_name_box">
                    <div className="label_name_circle_substrate">
                        <div className="label_name_circle">
                            <div className="label_name_title">
                                {this.props.data.name}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

class InfoCafe extends React.Component {
    render () {
        return (
            <div>
                <div className="information_about_place_title">{this.props.data.name}</div>
                <div className="information_about_place_text">{this.props.data.descriptionCafe}</div> 
            </div>
        );
    }
};

class TypesCafe extends React.Component {
    getType () {
        // const types;
        console.log(this.props.data);
        const typesArr = [];
        for (var key in this.props.data.category.name) {
            console.log(this.props.data.category.name[key]);
            typesArr.push(props[key].name);        
        }
        const listTypes = typesArr.map((type, index) => <li key={index}><a href="">{type}</a></li>);

        return (
            <ul>{listTypes}</ul>
        );

    }
    render () {
        return (
            <div className="tags">
                <ul><li><a href="">{this.props.data.category.name}</a></li></ul>
                 {/* {this.getType()}  */}
            </div>
        );
        
    }
};

function getDataCafe () {
    let url = window.location.href;
    let str = "id";
    let pos = 0;
    pos = url.indexOf(str, pos);
    let id = url.substring(pos+3, url.length);
    // console.log(id);
    
    $.ajax({
        url: "http://192.168.92.65/apis2d/index.php?r=cafe%2Fview&id=" + id,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // $("#test").attr("src", data.image);
            // ReactDOM.render(<Filter data={data} />, document.getElementById('filter'));
            // ReactDOM.render(<Post data={data}/>, document.getElementById('post'));
            // checkPagination(data);
            cafeData = data;
            // CoverCafe(data.image);
            InitMapCafe(data.latitude, data.longtitude);
            DrawPoint(data.latitude, data.longtitude, data.name, data.id);
            ReactDOM.render(
                <BreadCrumb data={data}/>,
                document.getElementById('bread_crumbs')
            );
            ReactDOM.render(
                <NameCafe data={data}/>,
                document.getElementById('cafe_name_and_panoram')
            );
            ReactDOM.render(
                <InfoCafe data={data}/>,
                document.getElementById('cafe_about')
            );
            ReactDOM.render(
                <TypesCafe data={data}/>,
                document.getElementById('cafe_types')
            );
        }
    });
}

function checkElementCafe () {
    if ($("div").is("#cafe_marker")) {
        // setSizeHeight();
        getDataCafe();
        
    }
}
checkElementCafe();





