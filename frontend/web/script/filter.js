import React from 'react';
import ReactDOM from 'react-dom';
import _ from 'lodash';
import $ from 'jquery';
// import {events} from './array_events.js';
// import {event} from './array_event.js';
// import {Filter} from './filter_component';
import {Post, Pagination, checkPagination} from './pagination';
import {CategoriesTour, TourTypes} from './tours';

let conditionFilter = [], filterArr = [], allPosts=[], dateAttr = "allPost", typeTour = [];

export class Filter extends React.Component {
    showCategory () {
        let listCategory = this.props.data.map((category, index) =>
            <li key={index} className="events_button">
                <a href="#">{category.name}</a>
            </li>
        );

        return listCategory;
    }
    render () {
        return (
            <div className="events_filter_type">
                <ul>
                        {this.showCategory()}  
                </ul>
            </div>
        );
    }
}

class FilterDate extends React.Component {
    render () {
        return (
            <div className="events_sort_type">
                <ul>
                    <li id="allPost">Всі</li>
                    <li id="today">Сьогодні</li>
                    <li id="tomorrow">Завтра</li>
                    <li id="duringWeek">Протягом тиждня</li>
                </ul>
            </div>
        );
    }
}

function formatDate(tomorrow, week) {
    let day, month, year, date;
    date = new Date();
    if (tomorrow != undefined) {
        day = tomorrow;
    } else {
        day = date.getDate();
        if (day < 10) day = '0' + day;
    }
    
    if (week != undefined) {
        day = week;
    } else {
        month = date.getMonth() + 1;
        if (month < 10) month = '0' + month;
    }
    

    year = date.getFullYear() % 100;
    if (year < 10) year = '0' + year;

    return month + '/' + day + '/20' + year;
}

function sortRate () {
    // alert();
    if (filterArr.length == 0) {
        allPosts = _.orderBy(allPosts, [function (arr) {return arr.rate}], ['desc']);
        console.log(allPosts);
        checkPagination(allPosts);
    } else {
        filterArr = _.orderBy(filterArr, [function (arr) {return arr.rate}]);
        console.log(filterArr);
        checkPagination(filterArr);
    }
}

function sortDate () {
    // alert();
    if (filterArr.length == 0) {
        allPosts = _.orderBy(allPosts, [function (arr) {return arr.id}], ['desc']);
        console.log(allPosts);
        checkPagination(allPosts);
    } else {
        filterArr = _.orderBy(filterArr, [function (arr) {return arr.id}]);
        console.log(filterArr);
        checkPagination(filterArr);
    }
}

export function getDataPoints (typePoint = 'point') {
    // alert(typePoint);
    $.ajax({
        url: 'http://192.168.92.65/apis2d/index.php?r='+typePoint+'%2Fall',
        dataType: 'json',
        success: function (data) {
            
            // checkPagination(data);
            // filterDate(allPosts, dateAttr);
            // filterPoints(data, "Індустріальні");
            filterArr =[];
            allPosts = data;
            sortRate();
            console.log(allPosts);
            
        }
    });
    $.ajax({
        url: 'http://192.168.92.65/apis2d/index.php?r='+typePoint+'%2Fcategories',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            ReactDOM.render(<Filter data={data} />, document.getElementById('filter'));
            // ReactDOM.render(<FilterDate />, document.getElementById('filterDate'));
        }
    });
}

export function getDataTours () {
    $.ajax({
        url: 'http://192.168.92.65/apis2d/index.php?r=tour%2Fcategories',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // getDataPoints(typePoint);
            ReactDOM.render(<CategoriesTour data={data} />, document.getElementById("filters_tours"));
            // checkPagination(data);
        }
    });
    $.ajax({
        url: 'http://192.168.92.65/apis2d/index.php?r=tour%2Ftypes',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            ReactDOM.render(<TourTypes data={data} />, document.getElementById("filter_tour_type"));
        }
    });

    $.ajax({
        url: 'http://192.168.92.65/apis2d/index.php?r=tour%2Fall',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            allPosts = data;
            checkPagination(data);
        }
    });
}

$("#filter").on("click", "li", function () {
    let category = $(this).text();
        // alert();
        
        if ($(this).is(".active")) {
            $(this).removeClass("active");
            filterTypeDel(filterArr, category);
        } else {
            $(this).addClass("active");
            filterType(allPosts, category); 
            console.log(allPosts);           
        }
    
    
});

$("#filterDate").on("click", "li", function () {
    dateAttr = $(this).attr("id");

    if ($(this).is(".active")) {
        $(this).removeClass("active");
        $(".events_sort_type #allPost").addClass("active");
        dateAttr = "allPost";
            if (filterArr.length == 0) {
                filterDate(allPosts, dateAttr);
            } else {
                filterDate(filterArr, dateAttr);
            }       
    } else {
        
        $(this).addClass("active");
        $(".events_sort_type li").removeClass("active");
        $(this).addClass("active");
        if (filterArr.length == 0) {
            filterDate(allPosts, dateAttr);
        } else {
            filterDate(filterArr, dateAttr);
        }
    }
});

// console.log($(".sort_type_checkbox input").prop("checked"));

function filterType (arr, condition) {
    let newFilter = [];
    console.log(arr);
    newFilter = _.filter(arr, function (arr) {
        return arr.category.name == condition;
    });
    console.log(newFilter);
    filterArr = filterArr.concat(newFilter);
    // filterArr = _.sortBy(filterArr, [function (arr) {return arr.id}]);
    console.log(filterArr);
    if (typeTour.length == 0) {
        if (filterArr.length == 0) {
            filterDate(allPosts, dateAttr);
        } else {
            filterDate(filterArr, dateAttr);
        }
    } else {
        checkPagination(filterArr);  
    }
    
}

function filterTypeDel (arr, condition) {
    filterArr = _.reject(arr, function (arr) {
        return arr.category.name == condition;
    });
    console.log(filterArr);
    if (filterArr.length == 0) {
        if (typeTour.length == 0) {
            checkPagination(allPosts);
        } else {
            checkPagination(typeTour);
        }
    } else {
        // alert();
        checkPagination(filterArr);
    }
}

function filterTypeTour (arr, condition) {
    let newFilter = [];
    console.log(arr);
    newFilter = _.filter(arr, function (arr) {
        return arr.type.name == condition;
    });
    console.log(newFilter);
    typeTour = typeTour.concat(newFilter);
    // typeTour = _.sortBy(typeTour, [function (arr) {return arr.id}]);
    checkPagination(typeTour);
    // console.log(typeTour);
}

function filterTypeTourDel (condition) {
    typeTour = _.reject(typeTour, function (typeTour) {
        return typeTour.type.name == condition;
    });
    // console.log(typeTour.length);
    if (typeTour.length == 0) {
        // checkPagination(allPosts);
        if (filterArr.length == 0) {
            filterDate(allPosts, dateAttr);
        } else {
            filterDate(filterArr, dateAttr);
        }
    } else {
        checkPagination(typeTour);
    }
    
    // console.log(typeTour);
}

function filterDate (arr, dateAttr) {
    let dateFilter = [];
    let date = new Date();
    if (dateAttr == "today") {
        date = formatDate();
        dateFilter = _.filter(arr, function (arr) {
            return arr.date == date;
        });
    } else if (dateAttr == "tomorrow") {
        let tomorrow = new Date();
        tomorrow.setDate(date.getDate() + 1);
        date = formatDate(tomorrow.getDate());

        dateFilter = _.filter(arr, function (arr) {
            return arr.date == date;
        });

    } else if (dateAttr == "duringWeek") {
        let week = new Date();
        week.setDate(date.getDate() + 6);
        date = formatDate(week.getDate());

        dateFilter = _.filter(arr, function (arr) {
            return arr.date <= date;
        });
    } else if (dateAttr == "allPost") {
        dateFilter = arr;
        $(".events_sort_type #allPost").addClass("active");
    }

    checkPagination(dateFilter);
    
}

function check_page_events () {

    if ($("div").is("#events_marker")) {
        $.ajax({
            url: 'http://192.168.92.65/apis2d/index.php?r=event%2Fall',
            dataType: 'json',
            success: function (data) {
                allPosts = data;
                // allPosts = sortRate();
                checkPagination(allPosts);
                filterDate(allPosts, dateAttr);
            }
        });
        
        $.ajax({
            url: 'http://192.168.92.65/apis2d/index.php?r=event%2Fcategories',
            dataType: 'json',
            success: function (data) {
                ReactDOM.render(<Filter data={data} />, document.getElementById('filter'));
                ReactDOM.render(<FilterDate />, document.getElementById('filterDate'));
            }
        });
    }
    
}

check_page_events();

$("#map_sort_sightseeing").on("click", "li div", function () {
    $("#map_sort_sightseeing div").removeClass("sort_checkbox_active");
    console.log($(this).attr("class"));
    $(this).toggleClass("sort_checkbox_active");
    // console.log($(this).attr("id"));
    let sortType = $(this).attr("id");
    if (sortType == "rate") {
        sortRate();
    } else if (sortType == "new") {
        sortDate();
    }
    // sortRate();
});

$("#filters_tours").on('click', 'li', function () {
    // alert();
    let type = $(this).text();
    // alert(type);
    // $("#filters_tours .filter_active").removeClass();
    if ($(this).is(".filter_active")) {
        $(this).removeClass("filter_active");
        filterTypeDel(filterArr, type); 
    } else {
        $(this).addClass("filter_active");
        if (typeTour.length == 0) {
            filterType(allPosts, type);
        } else {
            filterType(typeTour, type);
        }
         
    }
    
    // $("#filter li").removeClass("active");
    // check_page_map(type);
});

$("#filter_tour_type").on('click', 'li', function () {
    // alert();
    // console.log(allPosts);
    let type = $(this).text();
    // alert(type);
    // $("#filters_tours .filter_active").removeClass();
    if ($(this).is(".filter_active")) {
        $(this).removeClass("filter_active");
        if (filterArr.length == 0) {
            filterTypeTourDel(type);
        } else {
            filterTypeTourDel(type);
        }
        // filterTypeDel(filterArr, type); 
    } else {
        $(this).addClass("filter_active");
        if (filterArr.length == 0) {
            filterTypeTour(allPosts, type);
        } else {
            filterTypeTour(filterArr, type);
        }
         
    }
    
    // $("#filter li").removeClass("active");
    // check_page_map(type);
});

$("#sort").on("click", "li div", function () {
    // alert();
    $("#sort div").removeClass("sort_checkbox_active");
    // console.log($(this).attr("class"));
    $(this).toggleClass("sort_checkbox_active");
    let sortType = $(this).attr("id");
    if (sortType == "rate") {
        sortRate();
    } else if (sortType == "new") {
        sortDate();
    }
    // // console.log($(this).attr("id"));
    // let sortType = $(this).attr("id");
    // if (sortType == "rate") {
    //     sortRate();
    // } else if (sortType == "new") {
    //     sortDate();
    // }
    // sortRate();
});

