import React from 'react';
import ReactDOM from 'react-dom';
import _ from 'lodash';
import $ from 'jquery';
import {Post} from './post_component.js';
// import {events} from './array_events.js';
// import {event} from './array_event.js';

let numberPage = 1;
let countRecords = 9,
countRecordsOnPage = 1,
allRecords;
let pageNow = 1;
let paginationStruct = [];
let listPagination;
let countPage;
let sizePagesPagin = 3;
let threeDots =
                <li className="pagination_three_dots">
                    <div className="pagination_button">
                        <p><span>...</span></p>
                    </div>
                </li>
            ;
let arrayPagination = [];
let listsPost;
export class Pagination extends React.Component {
    constructor () {
        super();
        this.state = {
            buttonPage: []
        };
        
        this.nextPage = this.nextPage.bind(this);
        this.prevPage = this.prevPage.bind(this);
        this.firstPage = this.firstPage.bind(this);
        this.lastPage = this.lastPage.bind(this);
        this.clickPage = this.clickPage.bind(this);
        
    }

    createArr () {
        arrayPagination = this.props.data;     
    }

    buttonForPages () {
        
        let start = 1, end = 0;
        this.state.buttonPage = [];
        allRecords = this.props.data.length;
        paginationStruct = [];

        for (let i = 0; i <= this.props.data.length; i++) {

            if (countRecordsOnPage == countRecords) {
                
                paginationStruct.push({
                    numberPage: numberPage,
                    startPage: start,
                    endPage: start + countRecords - 1
                });
                start = start + countRecords;
                this.state.buttonPage.push(numberPage);
                numberPage++;
                allRecords = allRecords - countRecordsOnPage;
                
                countRecordsOnPage = 0;

                if (allRecords == 0) {
                    break;
                }
                

            } else if ((allRecords <= countRecords) && (allRecords != 0)) {

                    this.state.buttonPage.push(numberPage);
                    paginationStruct.push({
                        numberPage: numberPage,
                        startPage: start,
                        endPage: start + countRecords - 1
                    });
                    break;
                }
            countRecordsOnPage++;
              
        }

        numberPage = 1;
        countRecordsOnPage = 0;
        allRecords = this.props.data.length;

        this.drawButton();
        
    }

    clickPage (index) {
        if ((index != 0) && (index != this.state.buttonPage.length-1)) {
            if ($("#pagination ul li#"+index).next().attr("id") == "next_page") {
                sizePagesPagin++;
            } else if ($("#pagination ul li#"+index).prev().attr("id") == "prev_page") {
                sizePagesPagin--;
            }
        }
        this.setState(listPagination.splice(sizePagesPagin, this.state.buttonPage.length));
        return (
            {listPagination}
        );
    }

    nextPage () {
        if (pageNow >= 3) {
            if ((sizePagesPagin < this.state.buttonPage.length)) {
                
                sizePagesPagin++;   
                this.setState(listPagination.splice(sizePagesPagin, this.state.buttonPage.length));
                return (
                    {listPagination}
                );
                
            }
        }
    }
    
    prevPage () {
        if (pageNow < this.state.buttonPage.length-1) {
            if ((sizePagesPagin >= 3) && (sizePagesPagin != 3)) {

                sizePagesPagin--;
                this.setState(listPagination.splice(sizePagesPagin, this.state.buttonPage.length));
                return (
                    {listPagination}
                );
            }
        }
        
    }

    firstPage () {
        sizePagesPagin = 3;   
        this.setState(listPagination.splice(sizePagesPagin, this.state.buttonPage.length));
        
        return (
            {listPagination}
        );
    }

    lastPage () {
        sizePagesPagin = this.state.buttonPage.length;   
        this.setState(listPagination.splice(sizePagesPagin, this.state.buttonPage.length));
        return (
            {listPagination}
        );
    }

    drawButton () {

        listPagination = this.state.buttonPage.map((list, index) => 
            <li key={index} id={index} onClick={this.clickPage.bind(null, index)}>
                <div className="pagination_button">
                    <p><span>{list}</span></p>
                </div>
            </li>
        );    
        listPagination.splice(sizePagesPagin, this.state.buttonPage.length);
        listPagination.splice(0, sizePagesPagin-3);
    }
    
    render () {
        return (
            <div>
                 {this.createArr()} 
                 {this.buttonForPages()} 
                <ul>
                    <li onClick={this.firstPage} id="to_first_page">
                        <div className="pagination_button">
                            <p><span>{`<<`}</span></p>
                        </div>
                    </li>
                    <li onClick={this.prevPage} id="prev_page">
                        <div className="pagination_button">
                            <p><span>{`<`}</span></p>
                        </div>
                    </li> 
                    {listPagination}
                    <li onClick={this.nextPage}  id="next_page">
                        <div className="pagination_button">
                            <p><span>{`>`}</span></p>
                        </div>
                    </li>
                    <li onClick={this.lastPage} id="to_last_page">
                        <div className="pagination_button">
                            <p><span>{`>>`}</span></p>
                        </div>
                    </li> 
                </ul>
                
            </div>
            
        );

    }
    
}

$("#pagination").on("click", "li", function () {
    
    let symbol = $(this).text();

    if (symbol == ">") {
        if (pageNow != paginationStruct.length) {
            pageNow++;
            openPage(pageNow);

            selectedPage(pageNow);
            dissableButton(pageNow);
        }
        
    } else if (symbol == "<") {
        
        if (pageNow != 1) {
            pageNow--;
            openPage(pageNow);
            selectedPage(pageNow);
            dissableButton(pageNow);
        }
        
    } else if (symbol == ">>") {
        pageNow = paginationStruct.length;
        openPage(pageNow);

        $("#pagination").bind( 'DOMSubtreeModified',function(){
            $('#pagination ul li p').removeClass('pagination_active');
            $('#pagination ul li#' + (pageNow-1) + ' p').addClass('pagination_active');
        });
        selectedPage(pageNow);
        dissableButton(pageNow);

    } else if (symbol == "<<") {
        pageNow = 1;
        openPage(pageNow);
        $("#pagination").bind( 'DOMSubtreeModified',function(){
            $('#pagination ul li p').removeClass('pagination_active');
            $('#pagination ul li#' + (pageNow-1) + ' p').addClass('pagination_active');
        });
        selectedPage(pageNow);
        dissableButton(pageNow);
    } else {
        openPage(symbol);
        selectedPage(symbol);
        dissableButton(symbol);
    }


});
 
function openPage (page) {
    
    let pageStart, pageEnd;
    pageNow = page;

    for (let key in paginationStruct) {
        if (paginationStruct[key].numberPage == page) {
            pageStart = paginationStruct[key].startPage;
            pageEnd = paginationStruct[key].endPage;
            
        }
    }

    let arrPosts = [];
    for (let key in arrayPagination) {
        if ((key >= (pageStart-1)) && (key <= (pageEnd-1))) {
            arrPosts.push(arrayPagination[key]);
        }
    }

    ReactDOM.render(<Post data={arrPosts}/>, document.getElementById("post"));
    
}

function selectedPage (page) {
    $('#pagination ul li p').removeClass('pagination_active');
    $('#pagination ul li#' + (page-1) + ' p').addClass('pagination_active');    
}

function dissableButton (page) {
    if (page == 1) {
        $("#to_last_page, #next_page").removeClass("pagination_button_disable");
        $("#to_first_page, #prev_page").addClass("pagination_button_disable");
    } else if (page == paginationStruct.length) {
        $("#to_first_page, #prev_page").removeClass("pagination_button_disable");
        $("#to_last_page, #next_page").addClass("pagination_button_disable");
    } else {
        $("#to_last_page, #next_page").removeClass("pagination_button_disable");
        $("#to_first_page, #prev_page").removeClass("pagination_button_disable");
    }
}

export function checkPagination (arr) {
    if ($("div").is("#pagination")) {
        pageNow = 1;
        sizePagesPagin = 3;
        ReactDOM.render(<Pagination data={arr}/>, document.getElementById("pagination"));
        // console.log(arr);
        openPage(pageNow);
        selectedPage(pageNow);
        dissableButton(pageNow);
    }
}

