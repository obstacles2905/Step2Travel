import React from 'react';

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

