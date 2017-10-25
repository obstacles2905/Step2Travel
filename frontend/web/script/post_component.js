import React from 'react';

export class Post extends React.Component {
    showPosts () {
        let listsPost = this.props.data.map((list, index) => 
            <div className="post" key={index}>
                <div className="post_box_primary">
                    <div className="post_box_midle">
                        <div className="post_box_main" style={{ backgroundImage: `url(${list.image})` }}>
                            <div className="post_box_header">
                                <div className="post_box_header_title">
                                    {/* <a href={'/index.php?r=event%2Fevent&id=' + list.id}>{list.name}</a> */}
                                    <a href={list._links.self.href}>{list.name}</a>
                                    {console.log(list._links.self.href)}
                                </div>
                                <div className="post_box_header_time">
                                    <p>{list.begin+' : '+list.end}</p>
                                </div>
                            </div>
                            <div className="post_box_body"></div>
                            <div className="footer_data_box">
                                {(function checkDateArr() {
                                    if (list.date != undefined) {
                                        console.log(list.date);
                                        return (
                                            <div className="footer_data_circle">
                                                <p className="footer_data_day">{list.date.substring(3,5)}</p> 
                                                <p className="footer_data_month">{list.month}</p>
                                            </div>
                                        );
                                }
                                }())}
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );

        return (<div>{listsPost}</div>);
    }
    render () {
        return (
            <div className="posts">{this.showPosts()}</div>
        );
    }
}