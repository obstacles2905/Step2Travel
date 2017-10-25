import React from 'react';
import ReactDOM from 'react-dom';
import _ from 'lodash';
import $ from 'jquery';
import {Filter, getDataPoints} from './filter';
import {Post, Pagination, checkPagination} from './pagination';

class SightseeingType extends React.Component {
    
    render () {
        return (
            <ul className="map_filters_sightseeing_main_type">
                <li  id="point" className="sightseeing_active">
                    {/* <a href=""> */}
                        <div className="map_filter_sightseeing_main_type_logo">
                            <img src="image/icons/See_sign.svg" alt="" />
                        </div>
                        <p>Визначні місця</p>
                    {/* </a> */}
                </li>
                <li id="cafe">
                    {/* <a href=""> */}
                        <div className="map_filter_sightseeing_main_type_logo">
                            <img src="image/icons/Eat.svg" alt="" />
                        </div>
                        <p>Ресторани</p>
                    {/* </a> */}
                </li>
                <li  id="hotel">
                    {/* <a href=""> */}
                        <div className="map_filter_sightseeing_main_type_logo">
                            <img src="image/icons/Sleep.svg" alt="" />
                        </div>
                        <p>Готелі</p>
                    {/* </a> */}
                </li>
            </ul>
        );
    }
}

export class SightseeingSort extends React.Component {
    render () {
        return (
            <div className="sort">
                <form>
                    <ul className="sort_type">
                        <li>Сортувати за: </li>
                        <li className="sort_type_checkbox"> <div className="sort_checkbox sort_checkbox_active" id="rate"></div> <p>Рейтингом</p></li>
                        <li className="sort_type_checkbox"> <div className="sort_checkbox" id="new"></div> <p>Новизною</p></li>
                    </ul>
                </form>
            </div>  
        );
    }
}

function check_page_map (typePoint = 'point') {

    if ($("div").is("#map_marker")) {
        // alert(typePoint);
        // if () : ?
        
        // $.ajax({
        //     url: 'http://192.168.92.65/apis2d/index.php?r='+typePoint+'%2Fall',
        //     dataType: 'json',
        //     success: function (data) {
        //         console.log(data);
                getDataPoints(typePoint);
        //     }
        // });
        ReactDOM.render(<SightseeingType/>, document.getElementById("sightseeing_type"));
        ReactDOM.render(<SightseeingSort/>, document.getElementById("map_sort_sightseeing"));
        
        // getDataFromServer(typePoint);
    }
};

check_page_map();

$("#sightseeing_type li").on('click', function () {
    let type = $(this).attr("id");
    // alert(type);
    $("#sightseeing_type .sightseeing_active").removeClass();
    $(this).addClass("sightseeing_active");
    $("#filter li").removeClass("active");
    check_page_map(type);
});
