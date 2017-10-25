'use strict';
import React from 'react';
import ReactDOM from 'react-dom';
import ReactCSSTransitionGroup from 'react-addons-css-transition-group';
import {events} from './array_events.js';
import $ from "jquery";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }



var Carousel = function (_React$Component) {
    _inherits(Carousel, _React$Component);

    function Carousel(props) {
        _classCallCheck(this, Carousel);

        var _this = _possibleConstructorReturn(this, _React$Component.call(this, props));

        _this.state = {
            items: _this.props.items,
            active: _this.props.active,
            direction: ''
        };
        _this.rightClick = _this.moveRight.bind(_this);
        _this.leftClick = _this.moveLeft.bind(_this);
        _this.inactiveButton = _this.inactiveButton.bind(_this);
        return _this;

    }
   
    

    Carousel.prototype.generateItems = function generateItems() {
        var items = [];
        var level;
        for (var i = this.state.active -1; i < this.state.active + 2; i++) {
            var index = i;
            if (i < 0) {
                index = this.state.items.length + i;
            } else if (i >= this.state.items.length) {
                index = i % this.state.items.length;
            }
            level = this.state.active - i;
            items.push(React.createElement(Item, {key: index, 
                                                  id: this.state.items[index].id.description, 
                                                  level: level, 
                                                  name: this.state.items[index].name.description, 
                                                  month: this.state.items[index].date.month, 
                                                  date: this.state.items[index].date.description.substring(3,5)})); 
        }
        return items;
    };
    Carousel.prototype.inactiveButton = function inactiveButton() { //сделать кнопку инактивной на 2 секунды хз почему не работает
          $('#arrow_right').click(function(){
         
          });
    };
    
        // Ajax request
        
    Carousel.prototype.moveLeft = function moveLeft() {
        
      Carousel.prototype.inactiveButton();
        
        setTimeout(function(){
           document.getElementById("arrow_right").disabled = true; 
        },1000);
        var newActive = this.state.active;
        newActive--;
        this.setState({
            active: newActive < 0 ? this.state.items.length -1 : newActive,
            direction: 'left'
        });        
    };

    Carousel.prototype.moveRight = function moveRight() {
        var newActive = this.state.active;
        this.setState({
            active: (newActive + 1) % this.state.items.length,
            direction: 'right'
        });
        console.log(direction);
    };

    Carousel.prototype.render = function render() {
        return React.createElement(
            'div',
            { id: 'carousel', className: 'noselect' },
            
            React.createElement(
                'div',
                {id:"arrow_left", className: 'arrow_left', onClick: this.leftClick },
                React.createElement('img', { src:'image/icons/Arrow.svg' })
            ),
            React.createElement(
                'div',
                {id: 'arrow_right', className: 'arrow_right', onClick: this.rightClick },
                React.createElement('img', { src:'image/icons/Arrow.svg'})
            ),
            React.createElement(
                'div', {className: 'container_events_line'},
                React.createElement('img', {src:'image/dots.png'})
            ),
            React.createElement(
                ReactCSSTransitionGroup,
                {
                    transitionName: this.state.direction },
                this.generateItems()
            )    
            
        );
    };
    

    return Carousel;
}(React.Component);

var Item = function (_React$Component2) {
    _inherits(Item, _React$Component2);

    function Item(props) {
        _classCallCheck(this, Item);

        var _this2 = _possibleConstructorReturn(this, _React$Component2.call(this, props));

        _this2.state = {
            level: _this2.props.level
        };
        console.log(this.props.level);
        return _this2;
    }
    
    Item.prototype.render = function render() {
        var className = 'item level' + this.props.level;
        return React.createElement(
            'div',
            { className: className , onClick: this.leftClick}, [
                React.createElement('div', {className: 'container_events_circle_info'} , [
                    React.createElement('div', {className:'container_events_circle_date'}, this.props.date, ' ', this.props.month),
                    React.createElement('div', {className:'container_events_circle_data'}, this.props.name),
                    React.createElement('a', {className:'container_events_circle_button', href:'#'}, 'Детальніше')
                ]),
                React.createElement('div', {className: 'container_events_circle_midle'}),
                React.createElement('div', {className: 'container_events_circle_image'}, [
                    React.createElement('img', {src: 'image/minora.jpg'})
                ])
            ]
            
        );
       
    };
    
    return Item;
     
}(React.Component);

 
ReactDOM.render(React.createElement(Carousel, { items: events, active: 0 }), document.getElementById('container_events_circle_box'));
