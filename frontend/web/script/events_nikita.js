import {events} from './array_events.js';
import {events_categories} from './array_events_categories.js';
import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';

class App extends React.Component {
    constructor(props) {
        super(props);
        this.sorted_arr = []; //массив, с которым ведется вся работа
        this.day = 86400000; //один день в секундах, используется в вычислении разности между сегодняшней датой и датой события
        this.today = new Date(); //сегодняшняя дата
        this.categoryFilter = this.categoryFilter.bind(this); //фильтр по категориям
        this.tomorrowFilter = this.tomorrowFilter.bind(this); //фильтр проверки на завтрашние события
        this.aftTomorrowFilter = this.aftTomorrowFilter.bind(this); //фильтр проверки на события послезавтра
        this.nextWeekFilter = this.nextWeekFilter.bind(this);//фильтр проверки на события на след неделе
        this.allFilter = this.allFilter.bind(this); //все события
        this.checkOldDate = this.checkOldDate.bind(this);
        this.changeColor = this.changeColor.bind(this);
        this.handleClick = this.handleClick.bind(this);
        this.allState = false; //говно-состояние для проверки нажатия на кнопку всех туров
        this.active = 'active';
        this.state = {
          clicked: false, //состояние нажатия на любой из фильтров категорий
          date: '', //состояние, показывающее какой фильтр по датам установлен
          categoryFilter: '', //состояние, проверяющее был ли выбран какой-либо фильтр по категориям
          dateFilter: false, //состояние, проверяющее был ли выбран фильтр по датам
          activated_button: false
        };

    }
    
    
    componentDidMount(props) {
        this.today.setHours(0,0,0,0); //обнуляю время на сегодняшней дате для адекватного сравнения в фильтрах дат
        this.allFilter(props); //изначально загружаю все элементы из json в наш массив
        this.checkOldDate(props); //проверяю актуальность дат
        this.forceUpdate(); //обновляю компонент
    }
    
    checkOldDate(props) { //Проверка на прошедшие даты и их удаление
        for (var i = 0; i<this.sorted_arr.length; i++) {
            if (Date.parse(this.today)-Date.parse(this.sorted_arr[i].date.description) > 0) {
                this.sorted_arr.splice(i, 1);
                i--;
            }
        }
    } 
    changeColor(props) {
        
        
        (function ($) {
           
            $(document).ready(function(event) {
            //    console.log($(event.target).length());
                $('button').data('clicked', true);
                $(this.refs.categoryfilter).toggleClass('active');

        });
            
        })(jQuery);
        
        
        }
    handleClick(e) {
        e.preventDefault();
        console.log(e.target.classList.contains(this.active));
    }
    categoryFilter(category) {
        
        this.changeColor();
        //this.handleClick();
        
//        if ($('button').data('clicked', true)) {
//            alert();
//        }
        
        if (this.state.categoryFilter == '' && this.state.dateFilter == false) { //если фильтр выбирается впервые и фильтр дат не выбран
            console.log("1category");
            this.sorted_arr.length = 0; 
            for (var i = 0; i<events.length; i++) { //берем данные из json и заносим только те, которые соотв. нашему фильтру
                if (events[i].categories.xml.name == category) { 
                    
                    this.sorted_arr.push(events[i]);
                    
                }
            }
            this.state = {categoryFilter: category, dateFilter: false}; //устанавливаем название последней категории и тот факт, что один или более фильтров были нажаты
            console.log(this.state);
            this.forceUpdate();
        }
//        else if (this.state.categoryFilter !== '' && this.state.dateFilter == false && ($('button').data('clicked', true)) ) {
//            alert();
//            console.log('shit');
//        }
        else if (this.state.categoryFilter !== '' && this.state.dateFilter == false) { /*проверка если ранее был выбран какой-то фильтр. Суть проверки заключается в том, что
        в таком случае мы изначально не обнуляем массив, а добавляем элементы к существующим элементам массива*/
            console.log(this.state);
            console.log("2category");
            for (var i = 0; i<events.length; i++) {
                if (events[i].categories.xml.name == category) {
                    this.sorted_arr.push(events[i]);
                }
            }
            this.state = {categoryFilter: category, clicked: true, dateFilter: false}; //устанавливаем состояния
        }
        
        else if (this.state.categoryFilter !== '' && this.state.dateFilter == false) { //завтра->исторические == только исторические и завтра
            console.log(this.state);
            console.log(this.allState);
            console.log("3category");
            for (var i = 0; i<this.sorted_arr.length; i++) {
                    console.log(this.sorted_arr);
                    if (this.sorted_arr[i].categories.xml.name !== category) {
                        this.sorted_arr.splice(i, 1);
                        i--;
                    }
                }
                this.state = {categoryFilter: category, clicked: true};
            
        }
        else if (this.state.categoryFilter !== '' && this.allState == true) {
            console.log(this.state);
            console.log(this.allState);
            console.log("4category");
            for (var i = 0; i<this.sorted_arr.length; i++) {
                    console.log(this.sorted_arr);
                    if (this.sorted_arr[i].categories.xml.name !== category) {
                        this.sorted_arr.splice(i, 1);
                        i--;
                    }
                }
        }
        
        else if (this.state.dateFilter == true)  //проверяем если фильтр дат был уже вызван ранее, но фильтр категорий не был
            {
                console.log("5category");
                for (var i = 0; i<this.sorted_arr.length; i++) {
                    console.log(this.sorted_arr);
                    if (this.sorted_arr[i].categories.xml.name !== category) {
                        this.sorted_arr.splice(i, 1);
                        i--;
                    }
                }
                this.state = {categoryFilter: category, clicked: true};
            }
        
        else if (this.allState == true) { //если ранее была нажата кнопка всех событий т.к если не будет этой проверки, после выбора всех и затем категории фильтр категорий добавляет события поверх всех
            console.log("6category");
            for (var i = 0; i<this.sorted_arr.length; i++) {
                    console.log(this.sorted_arr);
                    if (this.sorted_arr[i].categories.xml.name !== category) {
                        this.sorted_arr.splice(i, 1);
                        i--;
                    }
                }
        }
        
        this.forceUpdate(); 
    }  
    tomorrowFilter(props) { //фильтрация событий по завтрашнему дню

        if(this.state.categoryFilter == '' && this.state.dateFilter == false) {  //проверяем, была ли выбрана какая-то категория до этого
            //выполняется тогда, когда вначале мы выбираем фильтрацию на завтра, а потом на послезавтра
            console.log("1tomorrow");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if ((Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) !== this.day) {
                    this.sorted_arr.splice(i, 1); //проверяем если разность между датой элемента и сегодняшним днем составляет больше чем один день в секундах и удаляем его
                    i--;
                }
         }
            this.state = {dateFilter: true};
            console.log(this.state.categoryFilter);
        }
        else if (this.state.dateFilter == true) { //если до этого был вызван фильтр по датам, но не был вызван по категориям
            console.log("2tomorrow");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                  if (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today) !== this.day) {
                    console.log("govno");
                    this.sorted_arr.splice(i, 1); //удаляем нужный элемент и смещаем индекс, чтоб не было говна
                    i--;
                }
            } 
        }
        else if (this.state.dateFilter == false){
            //выполняется тогда, когда мы не выбирали дату, а потом выбираем дату
            console.log("3tomorrow");
            //this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if (
                   (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today) !== this.day)) {
                    console.log("123");
                    this.sorted_arr.splice(i, 1); //удаляем нужный элемент и смещаем индекс, чтоб не было говна
                    i--;
                }
            } 
            this.state = {dateFilter: true};
        }
        else if (this.state.categoryFilter !== '') { //фильтр даты если категория была выбрана
            console.log("4tomorrow");
            this.allFilter(props);
            this.checkOldDate(props);
            var categoryTemp = this.state.categoryFilter;
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if ((this.sorted_arr[i].categories.xml.name !== this.state.categoryFilter) ||
                   (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today) !== this.day)) {
                    console.log("123");
                    this.sorted_arr.splice(i, 1); //удаляем нужный элемент и смещаем индекс, чтоб не было говна
                    i--;
                }
            } 
         console.log(this.state.categoryFilter);
            //this.state = {categoryFilter: categoryTemp};
        }
        
            this.state = {dateFilter: true};
            console.log(this.state.categoryFilter);
        this.forceUpdate();
    }
    aftTomorrowFilter(props) {
        
        if (this.state.categoryFilter == '') { //если фильтр категорий не был выбран, загружаем заново данные в массив
            console.log("1aft");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) { /*если разность между датой события и сегодняшним днем не равна 
                двум дням, удаляем его*/
                if ((Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) !== 2*this.day) {
                    this.sorted_arr.splice(i, 1);
                    i--;
                }
            }
            this.state = {dateFilter: true};
        }
        else if (this.state.categoryFilter !== undefined && this.state.dateFilter == true) { //выбрали категорию, выбрали другую дату, выбираем эту дату
            console.log(this.state.categoryFilter);
            console.log("2aft");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if ((this.sorted_arr[i].categories.xml.name !== this.state.categoryFilter) ||
                   (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today) !== 2*this.day)) {
                    console.log(true);
                    this.sorted_arr.splice(i, 1);
                    i--;
                }
            }
        }
        else if (this.state.dateFilter == true) {
            console.log("3aft");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today) !== 2*this.day) {
                    console.log(true);
                    this.sorted_arr.splice(i, 1);
                    i--;
                }
            }
            this.state = {dateFilter: true};
        }
        else if (this.state.categoryFilter !== ''){ //если категория уже была выбрана, и сейчас выбирается дата
            console.log(this.state.categoryFilter);
            console.log("4aft");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if ((this.sorted_arr[i].categories.xml.name !== this.state.categoryFilter) ||
                   (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today) !== 2*this.day)) {
                    console.log(true);
                    this.sorted_arr.splice(i, 1);
                    i--;
                }
            }
            this.state = {dateFilter: true};
        }
        
        this.forceUpdate();
        
    }
    nextWeekFilter(props) {
        
        if (this.state.categoryFilter == '') { //если фильтр категорий не был выбран, загружаем заново данные в массив
            console.log("1next");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) { 
                if ((Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) >=7*this.day ||       (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) <= this.day ) {
                        this.sorted_arr.splice(i, 1);
                        i--;    
                    }
            }
            this.state = {dateFilter: true};
        }
        else if (this.state.categoryFilter !== undefined && this.state.dateFilter == true) { //выбрали категорию, выбрали другую дату, выбираем эту дату
            console.log(this.state.categoryFilter);
            console.log("2next");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if ((Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) >=7*this.day ||       (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) <= this.day ||
                   (this.sorted_arr[i].categories.xml.name !== this.state.categoryFilter)) {
                        this.sorted_arr.splice(i, 1);
                        i--;    
                    }
            }
        }
        else if (this.state.dateFilter == true) {
            console.log("3next");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if ((Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) >=7*this.day ||       (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) <= this.day ) {
                        this.sorted_arr.splice(i, 1);
                        i--;    
                    }
            }
            this.state = {dateFilter: true};
        }
        else if (this.state.categoryFilter !== ''){ //если категория уже была выбрана, и сейчас выбирается дата
            console.log(this.state.categoryFilter);
            console.log("4aft");
            this.allFilter(props);
            this.checkOldDate(props);
            for (var i = 0; i<this.sorted_arr.length; i++) {
                if ((Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) >=7*this.day ||       (Date.parse(this.sorted_arr[i].date.description)-Date.parse(this.today)) <= this.day ||
                   (this.sorted_arr[i].categories.xml.name !== this.state.categoryFilter)) {
                        this.sorted_arr.splice(i, 1);
                        i--;    
                    }
            }
            this.state = {dateFilter: true};
        }
        
        
        
        this.forceUpdate();
    }
    allFilter(props){
        this.setState((props) => ({
              date: '',
              clicked: false,
              categoryFilter: '',
              dateFilter: false
            }));
        this.sorted_arr.length = 0;
         for (var i = 0; i<events.length; i++) {
                this.sorted_arr.push(events[i]);
         }
        this.checkOldDate(props);
        this.forceUpdate();
        this.allState = true;
    }

    render() {
        // console.log(this.sorted_arr);
        // export this.sorted_arr;
        return (
        <div>
        <div className = "events_filter">
            <div className = "events_filter_type">
                <ul>
                        {events_categories.map(function(events_categories, index) {
                            return (
                                <button ref="categoryfilter" className="events_button" key={index} onClick={() =>this.categoryFilter(events_categories.name)}>{events_categories.name} </button>
                            )
                        }.bind(this))}    
            
                </ul>
            </div>
        </div>
        
        <div className="events_sort">
                <div className="events_sort_type">
                        <button onClick={this.tomorrowFilter}> Завтра</button>
                        <button onClick={this.aftTomorrowFilter}> Послезавтра</button>
                        <button onClick={this.nextWeekFilter}> На след. неделе</button>
                        <button onClick={this.allFilter}> Все</button>
                </div>
            </div>

            <div className="events_filter">
        {this.sorted_arr.map(function(items, index) {
        return (
            <div className="posts">
                <div className="post">
                    
                    <div className="post_box_primary">
                        
                        <div className="post_box_midle">
    
                            <div className="post_box_main" style={{ backgroundImage: `url(${items.image})` }}>
                                
                                <div className="post_box_header">
                                    <div className="post_box_header_title">
                                        {items.name.description}
                                    </div>
                                </div>
                                <div className="post_box_body"></div>
                                <div className="footer_data_box">
                                    <div className="footer_data_circle">
                                        <p className="footer_data_day">{items.date.description.substring(3,5)}</p>
                                        <p className="footer_data_month">{items.date.month}</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        );
          
        })}
        </div>
        
        
        </div>
        )
    }
}   

$("#ev").ready(function () {
    ReactDOM.render(<App/>, document.getElementById("test"));
    
});
