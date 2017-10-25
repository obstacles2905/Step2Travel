import React from 'react';
import ReactDOM from 'react-dom';
import _ from 'lodash';
import $ from 'jquery';
import {Filter, getDataPoints, getDataTours} from './filter';
import {Post, Pagination, checkPagination} from './pagination';
import {SightseeingSort} from './sightseeing';

export class CategoriesTour extends React.Component {
    showCategories () {
        let listCategory = this.props.data.map((category, index) =>
            <li key={index}>
                {/* <a href=""> */}
                    <div className="filters_tours_main_type_logo">
                        <img src={category.icon} alt="" />
                    </div>
                    <p>{category.name}</p>
                {/* </a> */}
            </li>
        );

        return listCategory;
    }
    
    render () {
        return (
            <ul className="filters_tours_main_type">
                {this.showCategories()}
            </ul>
        );
    }
}

export class TourTypes extends React.Component {
    showTypes () {
        let listCategory = this.props.data.map((category, index) =>
            <li key={index}>
                <div className="filters_tours_main_type_logo">
                    <img src={category.image} alt="" />
                </div>
                <p>{category.name}</p>
            </li>
        );

        return listCategory;
    }
    
    render () {
        return (
            <ul className="filters_tours_type">
                {this.showTypes()}
            </ul>
        );
    }
}

function check_page_tour () {
    
    if ($("div").is("#tour_marker")) {
        getDataTours();       
        ReactDOM.render(<SightseeingSort/>, document.getElementById("sort"));   
    }
};
    
check_page_tour();

