/**
 * Created by _ on 10.07.2017.
 */
import React from 'react';
import ReactDOM from 'react-dom';
import $ from 'jquery';



function  Tours(){
    var selected_tour;
    var circle;/**circle id for tour**/
    var point; /**circle id for point**/
    var tour_data; /***id of circle, uniq_id unique id(id of tour)  ***/
    var point_data;
    tour_data = new Array();
    point_data = new Array();

    var self = this;

    this.set_selected_tour = function(id){
        selected_tour = id;
    };
    this.get_selected_tour = function(){
        return selected_tour;
    };

    this.get_point_data = function(){
      return point_data;
    };
    this.get_point = function(){
        return point;
    };
    /**get count of circles**/
    this.circle_length = function () {
        return circle.length;
    };

    /**create array with circle id and unique tour id**/
    this.set_tour_data = function(){
      for(var i=0; i<tour_json.length;i++){
          tour_data[i]=[2];
          tour_data[0]=i;
          tour_data[1]=tour_json[i].id;
      }
    };

    this.set_point_data = function(tour_id){
        for(var i=0; i<tour_json[tour_id].points.length;i++){
            point_data[i]=[0,0];
            point_data[i][0]=i;
            point_data[i][1]=tour_json[tour_id].points[i].id;
        }
    };

    /**create array with circle id**/
    this.create_circle = function (col) {
        self.set_tour_data();
        circle = [col];
        while(circle.length<col){
            circle.push(Math.round(Math.random()*13));
            circle = _.uniq(circle);
        }

    };

    /**render circles**/
    this.render_circle = function(){
        for (var i = 0; i < circle.length; i++){
            setProps(i,circle[i]);
            Draw_circle();
        }
    };

    this.create_point = function(chosen_id){

        self.set_point_data(chosen_id);

        point = [];
        console.log(position_json[tour_json[chosen_id].points.length-4].pos);
        for(var i=0; i<position_json[tour_json[chosen_id].points.length-4].pos.length; i++ ){
            point.push(position_json[tour_json[chosen_id].points.length-4].pos[i]);
        }
        console.log(point);
    };

    /**Sum function**/
    this.sum = function(arr){
        var result = 0;
        for(var i=0; i<arr.length; i++){
            result += arr[i];
        }
        return result;
    };

    /**Devide points length**/
    this.divide = function(chosen_id){
        return (tour_json[chosen_id].points.length)/3;
    };

    /**Random generate**/
    this.random_points = function(arr, col){
        var result = [];
        while(result.length < col){
            result.push(Math.round(Math.random()* (arr[arr.length-1]-arr[0]) )+ arr[0]);
            result = _.uniq(result);
        }
        return result.sort(sortingRule);
    };

    /**rule for sorting**/
    function sortingRule(a, b) {
        if (a > b) return 1;
        if (a < b) return -1;
    }

    /**render points**/
    this.render_points = function(chosen_id){
        for (var i = 0; i < point.length; i++){
            setPropsPoint(chosen_id, i, point[i]);
            Draw_point_circle();
        }
    };

    /**render tour**/
    this.render_tour = function(chosen_id) {
        setPropsTour(chosen_id);
        Draw_tour();

    };
    this.render_button = function(){
        Draw_return_button();
    }
}


/**End of class Tours**/



/**Create obj with information about tours**/
const props = {
    id: null,
    parent_id: null,
    src: 'image/minora.jpg',
    padding_top: null,
    width: null,
    top: null,
    left:null,
    description: "",
    tour_name: ""
};

/**Set tour circle information in obj**/
function setProps(id, parentid) {
    props.id = id;
    props.parent_id = parentid;
    props.src = tour_json[id].photoURL;    /**'image/minora.jpg';**/
    props.tour_name = tour_json[id].name;
    props.padding_top = Math.round(Math.random()*20) + 50;
    props.width = props.padding_top;
    if((props.parent_id == 4) || (props.parent_id == 8) || (props.parent_id == 13)){
        props.left =  Math.round(Math.random()*20);
    }
    else {
        props.left = Math.round(Math.random() * (100 - props.width- 5));
    }
    if ((props.parent_id >= 9)){
        props.top =  Math.round(Math.random()*15)+5;
    }else {
        props.top = Math.round(Math.random() * (100 - props.padding_top- 5 ));
    }
    if ((props.parent_id == 13)){
        props.top=0;
    }

}

/**Circle model for react rendering**/
function Circle_model(){
    return React.createElement("div", {key: props.id, id: props.id, className: 'circle tour'},[
        React.createElement("div",{key: 'circle_image_'+props.id ,className:'circle_image'},[
            React.createElement("img",{key:'img_'+props.id ,src: props.src}),
            React.createElement("div",{key:'circle_description_'+props.id,className:'circle_description'},[
                React.createElement("span",{key:'circle_description_text_'+props.id,className:'circle_description_text'},props.tour_name)
            ])
        ])
    ]);
}

/**Render circle**/
function Draw_circle() {
    let parent_id = 'c' + props.parent_id;
    ReactDOM.render(<Circle_model />, document.getElementById(parent_id));
    /**Call setting attribute**/
    Set_attr(props.id);
}

/**Setting attribute for rendered circles**/
function Set_attr(id){
    $('#'+id).css('padding-top', props.padding_top + '%')
        .css('width', props.width + '%')
        .css('top', props.top + '%')
        .css('left', props.left + '%');

}

/**Clear page when we click at the current circle**/
function Remove_circles() {
    $('.circle').addClass('hide');
    $('.circle').fadeOut(250, function(){$(this).remove();});

}

/**Clear page when we click at the current circle**/
function Remove_points() {
    $('.circle').addClass('hide');
    $('.circle').fadeOut(250, function(){$(this).remove();});

}

/**Create obj with information about tour point**/
const props_point = {
    id: null,
    src: 'image/minora.jpg',
    padding_top: null,
    width: null,
    top: null,
    left:null,
    description: "",
    point_name: ""
};

/**Set point information in obj**/
function setPropsPoint(chosen_id, id, parent_id){
    props_point.id = id;
    props_point.parent_id = parent_id;
    props_point.src = tour_json[chosen_id].points[id].photoURL;    /**'image/minora.jpg';**/
    props_point.point_name = tour_json[chosen_id].points[id].name;
    props_point.padding_top = 45;
    props_point.width = props_point.padding_top;
    if((props_point.parent_id == 4) || (props_point.parent_id == 8) || (props_point.parent_id == 13)){
        props_point.left =  Math.round(Math.random()*20);
    }
    else {
        props_point.left = Math.round(Math.random() * (100 - props_point.width- 5));
    }
    if ((props_point.parent_id >= 9)){
        props_point.top =  Math.round(Math.random()*10)+10;
    }else {
        props_point.top = Math.round(Math.random() * (100 - props_point.padding_top- 5 ));
    }
}

/**Point model for react rendering**/
function Point_model(){
    return React.createElement("div", {key: props_point.id, id: props_point.id, className: 'circle', name: props_point.id},[
        React.createElement("div",{key:'circle_image_'+props_point.id,className:'circle_image'},[
            React.createElement("img",{key:'img_'+props_point.id, src: props_point.src}),
            React.createElement("div",{key:'circle_description_'+props_point.id,className:'circle_description'},[
                React.createElement("span",{key:'circle_description_text_'+props_point.id,className:'circle_description_text'},props_point.point_name)
            ])
        ])
    ]);
}



/**Render point**/
function Draw_point_circle() {
    let parent_id = $('[name = t' + props_point.parent_id + ' ]').attr('id');
    ReactDOM.render(<Point_model />, document.getElementById(parent_id));
    /**Call setting attribute**/
    Set_point_attr(props_point.id);
}
/**Setting attribute for rendered circles**/
function Set_point_attr(id){
    $('#'+id).addClass('point')
        .css('cssText' , 'margin-top: ' + props_point.top + '% !important')
        .css('left','25%')
        .css('padding-top', props_point.padding_top +'%')
        .css('width', props_point.width+'%');

}


/**Create obj with information about tour point**/
const props_tour = {
    id: '',
    src: 'image/minora.jpg',
    padding_top: null,
    width: null,
    top: null,
    left:null,
    description: "",
    point_name: "",
    link:"http://s2travel.loc/index.php?r=",
    rate: null,
    point_count: null
};

/**Set tour information in obj**/
function setPropsTour(chosen_id){
    props_tour.id = 'tour_circle';
    props_tour.src = tour_json[chosen_id].photoURL;    /**'image/minora.jpg';**/
    props_tour.tour_name = tour_json[chosen_id].name;
    props_tour.padding_top = 85;
    props_tour.width = props_tour.padding_top;
    props_tour.rate = tour_json[chosen_id].rate;
    props_tour.point_count = tour_json[chosen_id].points.length;
}

/**Tour model for react rendering**/
function Tour_model(){
    return React.createElement("div", {key:props_tour.id, id: props_tour.id, className: 'circle',name: 'tmain'},[
        React.createElement("div",{key:'circle_image_'+props_tour.id,className:'circle_image'},[
            React.createElement("img",{key:'img_'+props_tour.id,src: props_tour.src}),
            React.createElement("div",{key:'circle_description_'+props_tour.id,className:'circle_description'},[
                React.createElement("span",{key:'circle_description_text_'+props.id,className:'circle_description_text'},props_tour.tour_name),
            ]),
            React.createElement("span",{key:'tour_rate_'+props_tour.id,className:'tour_rate'},'Rate: ' + props_tour.rate),
            React.createElement("span",{key:'point_count_'+props_tour.id,className:'point_count'},'Count: ' + props_tour.point_count),
            React.createElement("a",{key:'more_button_'+props_tour.id,className:'more_button'}, [
                React.createElement("span",{key:'more_'+props.id},'Детальніше')
            ])
        ])
    ]);
}

/**Render tour**/
function Draw_tour() {
    //let parent_id = 'cmain';
    ReactDOM.render(<Tour_model />, document.getElementById('cmain'));
    /**Call setting attribute**/
    Set_tour_attr(props_tour.id);
}

/**Setting attribute for rendered circles**/
function Set_tour_attr(id){
    $('#'+id).css('padding-top', props_tour.padding_top +'%')
        .css('width', props_tour.width +'%')
        .css('top', '0%')
        .css('left', '0%');

}

/**Model of main circle**/
const Main_circle_model =(<a id="main_link"><div className="circle"><span className="main_circle_content">Переглянути усі тури</span></div></a>);

/**Render main circle**/
function Draw_main_circle(){
    ReactDOM.render(Main_circle_model , document.getElementById("cmain"));
}

/**Model of button that return to all tours**/
const Button_model = (<div id="button_block"><a id="to_tours" className="tour_button"><span>До усіх турів</span></a></div>);

/**Render return button**/
function Draw_return_button(){
    ReactDOM.render(Button_model , document.getElementById("for_button"));
 }
function Remove_button(){
   /* $('div.block').children("#to_tours").remove();*/
   $('#button_block').remove();
}
/**Position JSON**/
var position_json = [{pos:[1, 3, 5,7]},{pos:[1,3,5,7,8]},{pos:[0,1,3,5,7,8]},{pos:[0,1,3,4,5,7,8]},{pos:[0,1,3,4,5,7,8,9]},{pos:[0,1,2,3,4,5,6,7,8]},{pos:[0,1,2,3,4,5,6,7,8,9]}];
/**TEST JSON**/
var tour_json =  [  {"id":"20", "name":"0 tour", "photoURL":"image/minora.jpg", "descriptionTour":"info 1", "rate":"4", "points":
                        [
                            {"id":"1488", "name":"0_1 point", "photoURL":"image/circle.jpg"},
                            {"id":"1411", "name":"0_2 point", "photoURL":"image/avrora.jpg"},
                            {"id":"1493", "name":"0_3 point", "photoURL":"image/carousel.jpg"},
                            {"id":"1417", "name":"0_4 point", "photoURL":"image/hotel.jpg"}
                        ]
                    },
    {"id":"21", "name":"1 tour", "photoURL":"image/minora.jpg", "descriptionTour":"info 1", "rate":"4.5", "points":
        [
            {"id":"1588", "name":"1_1 point", "photoURL":"image/minora.jpg"},
            {"id":"1511", "name":"1_2 point", "photoURL":"image/minora.jpg"},
            {"id":"1593", "name":"1_3 point", "photoURL":"image/minora.jpg"},
            {"id":"1517", "name":"1_4 point", "photoURL":"image/minora.jpg"},
            {"id":"1519", "name":"1_5 point", "photoURL":"image/minora.jpg"},
        ]
    },
    {"id":"22", "name":"2 tour", "photoURL":"image/minora.jpg", "descriptionTour":"info 1", "rate":"4.9", "points":
        [
            {"id":"1688", "name":"2_1 point", "photoURL":"image/minora.jpg"},
            {"id":"1611", "name":"2_2 point", "photoURL":"image/minora.jpg"},
            {"id":"1693", "name":"2_3 point", "photoURL":"image/minora.jpg"},
            {"id":"1617", "name":"2_4 point", "photoURL":"image/minora.jpg"},
            {"id":"1619", "name":"2_5 point", "photoURL":"image/minora.jpg"},
            {"id":"1615", "name":"2_6 point", "photoURL":"image/minora.jpg"},
        ]
    },
    {"id":"23", "name":"3 tour", "photoURL":"image/minora.jpg", "descriptionTour":"info 1", "rate":"5", "points":
        [
            {"id":"1788", "name":"3_1 point", "photoURL":"image/minora.jpg"},
            {"id":"1711", "name":"3_2 point", "photoURL":"image/minora.jpg"},
            {"id":"1793", "name":"3_3 point", "photoURL":"image/minora.jpg"},
            {"id":"1717", "name":"3_4 point", "photoURL":"image/minora.jpg"},
            {"id":"1719", "name":"3_5 point", "photoURL":"image/minora.jpg"},
            {"id":"1715", "name":"3_6 point", "photoURL":"image/minora.jpg"},
            {"id":"1716", "name":"3_7 point", "photoURL":"image/minora.jpg"},
        ]
    },
    {"id":"24", "name":"4 tour", "photoURL":"image/minora.jpg", "descriptionTour":"info 1", "rate":"4", "points":
        [
            {"id":"1888", "name":"4_1 point", "photoURL":"image/minora.jpg"},
            {"id":"1811", "name":"4_2 point", "photoURL":"image/minora.jpg"},
            {"id":"1893", "name":"4_3 point", "photoURL":"image/minora.jpg"},
            {"id":"1817", "name":"4_4 point", "photoURL":"image/minora.jpg"},
            {"id":"1819", "name":"4_5 point", "photoURL":"image/minora.jpg"},
            {"id":"1815", "name":"4_6 point", "photoURL":"image/minora.jpg"},
            {"id":"1816", "name":"4_7 point", "photoURL":"image/minora.jpg"},
            {"id":"1820", "name":"4_8 point", "photoURL":"image/minora.jpg"},
        ]
    },
    {"id":"25", "name":"5 tour", "photoURL":"image/minora.jpg", "descriptionTour":"info 1", "rate":"3", "points":
        [
            {"id":"1988", "name":"5_1 point", "photoURL":"image/minora.jpg"},
            {"id":"1911", "name":"5_2 point", "photoURL":"image/minora.jpg"},
            {"id":"1993", "name":"5_3 point", "photoURL":"image/minora.jpg"},
            {"id":"1917", "name":"5_4 point", "photoURL":"image/minora.jpg"},
            {"id":"1919", "name":"5_5 point", "photoURL":"image/minora.jpg"},
            {"id":"1915", "name":"5_6 point", "photoURL":"image/minora.jpg"},
            {"id":"1916", "name":"5_7 point", "photoURL":"image/minora.jpg"},
            {"id":"1920", "name":"5_8 point", "photoURL":"image/minora.jpg"},
            {"id":"1921", "name":"5_9 point", "photoURL":"image/minora.jpg"},
        ]
    },
    {"id":"26", "name":"6 tour", "photoURL":"image/minora.jpg", "descriptionTour":"info 1", "rate":"3.5", "points":
        [
            {"id":"2088", "name":"6_1 point", "phoroURL":"image/minora.jpg"},
            {"id":"2011", "name":"6_2 point", "phoroURL":"image/minora.jpg"},
            {"id":"2093", "name":"6_3 point", "phoroURL":"image/minora.jpg"},
            {"id":"2017", "name":"6_4 point", "phoroURL":"image/minora.jpg"},
            {"id":"2019", "name":"6_5 point", "phoroURL":"image/minora.jpg"},
            {"id":"2015", "name":"6_6 point", "phoroURL":"image/minora.jpg"},
            {"id":"2016", "name":"6_7 point", "phoroURL":"image/minora.jpg"},
            {"id":"2020", "name":"6_8 point", "phoroURL":"image/minora.jpg"},
            {"id":"2021", "name":"6_9 point", "phoroURL":"image/minora.jpg"},
            {"id":"2022", "name":"6_10 point", "phoroURL":"image/minora.jpg"},
        ]
    }
];

function Canvas_delete_line(){
    $('#lines').remove();
}
/**create line between points**/
function Create_line(){

   for(var i = 0; i < tour.get_point().length;i++){

        var el1 = $(".block").find('#'+i);
        var el2;
        if(i<tour.get_point().length-1){
            el2 = $(".block").find('#'+(i+1));
        }else{el2=$(".block").find('#tour_circle');}

        //console.log("el1;"+i+";el2:"+(i+1));

        var parent = $('#container_panorams_tour');
        if((el1.offset().top-el2.offset().top)!= 0){
            var x1 = Math.round(el1.offset().left + parseInt(el1.css('width'))/4);
            var x2 = Math.round(el2.offset().left + parseInt(el1.css('width'))/4);
        }
        else{
            var x1 = Math.round(el1.offset().left + parseInt(el1.css('width'))/2);
            var x2 = Math.round(el2.offset().left + parseInt(el1.css('width'))/2);
        }
        var y1 = (el1.offset().top - parent.offset().top + parseInt(el1.css('padding-top'))/2);
        var y2 = (el2.offset().top - parent.offset().top + parseInt(el1.css('padding-top'))/2);
        var top, left;
        var height = "5px";
       if(x1 > x2){left = x2;}else{left = x1;}
       if(y1 > y2){top = y2;}else{top = y1;}
       var width = Math.sqrt(Math.pow((x1-x2),2)+Math.pow((y1 - y2),2));
       top = top + Math.sqrt(Math.pow(width,2)/4 - Math.pow((x1 - x2),2)/4);
       //var l1 = el1.offset().top - parent.offset().top + parseInt(el1.css('padding-top'));
      // var l2 = el2.offset().top - parent.offset().top + parseInt(el2.css('padding-top'));
       //left = left - Math.sqrt(Math.pow(width,2)/8 - Math.pow((l1-l2),2)/8);
        $('<div>').attr({'id':'connect_point'+i,'class':'connect_point'}).css({'top':top ,'left':left,'width':width,'height':height}).appendTo('#container_panorams_tour');


        var alpha = Math.round(Math.atan(Math.abs(y1-y2)/Math.abs(x1-x2))*57.2958);
        if((y1 >= y2)){alpha = -1*alpha;}
        if((x1>=x2)){alpha = -1*alpha;}
        var alpha1 = Math.abs(alpha);
        console.log(alpha);
       /* if(alpha1 > 180){
            console.log(el1+' angle: '+alpha1);
            alpha1 = alpha1 - 180;
            //alert(alpha1);
            left = left - width/(2*Math.cos(alpha1));
        }*/
        //left = left - width/(2*Math.cos(alpha));
        $('#connect_point'+i).css({
            '-webkit-transform': 'rotate(' + alpha + 'deg)',
            '-moz-transform': 'rotate(' + alpha + 'deg)',
            '-ms-transform': 'rotate(' + alpha + 'deg)',
            '-o-transform': 'rotate(' + alpha + 'deg)',
            'transform': 'rotate(' + alpha + 'deg)',
            'zoom': 1
        }, 1);
        //console.log(Math.round(parseInt($('#connect_point'+i).css('width'))));
        for(var j=0;j< Math.round(parseInt($('#connect_point'+i).css('width'))/10);j++){
            $('<div>').attr({'class':'connect_circle'}).appendTo($('#connect_point'+i));
        }
    }
}
if($('#lines') != 'undefined'){
    $(window).on('resize', function(){
        Canvas_delete_line();
        Canvas_create_line();
    });
}
function Delete_line(){
    $('.connect_point').remove();
}

/**Create instance of class Tour**/
var tour = new Tours();



/**Call method that generate random circle position**/
tour.create_circle(tour_json.length);

/**Call circle rendering**/
tour.render_circle();
Draw_main_circle();

/**Circle click**/
$("div.block").on('click','.tour',function (){
    Remove_circles();
    var chosen_id = $(this).attr('id');
    tour.set_selected_tour(chosen_id);
    tour.create_point(chosen_id);
    setTimeout(function(){
        tour.render_points(chosen_id);
        tour.render_tour(chosen_id);
        tour.render_button();
        //Create_line();
        Canvas_create_line();
    },1000);


});

/**Click button to  return to all tours**/
$('div#container_panorams_tour').on('click',"#to_tours",function(){
    Remove_points();
    //Delete_line();
    Canvas_delete_line();
    Remove_button();
    tour.create_circle(tour_json.length);
    setTimeout(function () {
        tour.render_circle();
        Draw_main_circle();
    },1000);

});

/**Swap point when point click**/
$("div.item").on('click', ".point", function(){
    var selected_id = $(this).attr('name');
    var tour_circle = $("#tour_circle");
    var tour_rate = $('.tour_rate');
    var point_count = $('.point_count');

    if(!(tour_circle.is('.animation'))){
        tour_circle.addClass('animation');
        if(tour_circle.attr('name')==='tmain'){
        tour_circle.fadeOut(10,function () {
            tour_circle.find('.circle_description_text').text(tour_json[tour.get_selected_tour()].points[selected_id].name);
            tour_circle.find('img').attr('src',tour_json[tour.get_selected_tour()].points[selected_id].photoURL);
            tour_circle.fadeIn(10);

        });
        $(this).fadeOut(10,function (){
            $(this).find('.circle_description_text').text(tour_json[tour.get_selected_tour()].name);
            $(this).find('img').attr('src', tour_json[tour.get_selected_tour()].photoURL);
            $(this).fadeIn(10);
        });

        tour_circle.attr('name', selected_id);
        $(this).attr('name', 'tmain');


        tour_rate.hide();
        point_count.hide();

    }
        else{
        if($(this).attr('name')==='tmain'){
            $(this).fadeOut(10,function(){
                $(this).find('.circle_description_text').text(tour_json[tour.get_selected_tour()].points[tour_circle.attr('name')].name);
                $(this).find('img').attr('src', tour_json[tour.get_selected_tour()].points[tour_circle.attr('name')].photoURL);
                $(this).fadeIn(10);
                $(this).attr('name',tour_circle.attr('name'));
                $(this).attr('display','block');
            });
            tour_circle.fadeOut(10,function(){
                tour_circle.find('.circle_description_text').text(tour_json[tour.get_selected_tour()].name);
                tour_circle.find('img').attr('src',tour_json[tour.get_selected_tour()].photoURL);
                tour_circle.fadeIn(10);
                tour_circle.attr('name','tmain');
            });



            tour_rate.show();
            point_count.show();
        }
        else{
            $("div[name*='tmain']").fadeOut(10, function () {
                $("div[name*='tmain']").find('.circle_description_text').text(tour_json[tour.get_selected_tour()].points[tour_circle.attr('name')].name);
                $("div[name*='tmain']").find('img').attr('src',tour_json[tour.get_selected_tour()].points[tour_circle.attr('name')].photoURL);
                $("div[name*='tmain']").fadeIn(10);
                $("div[name*='tmain']").attr('name',tour_circle.attr('name'));

            });
            $(this).fadeOut(10, function(){
                $(this).find('.circle_description_text').text(tour_json[tour.get_selected_tour()].name);
                $(this).find('img').attr('src',tour_json[tour.get_selected_tour()].photoURL);
                $(this).fadeIn(10);
                $(this).attr('name', 'tmain');
            });
            tour_circle.fadeOut(10, function () {
                tour_circle.find('.circle_description_text').text(tour_json[tour.get_selected_tour()].points[selected_id].name);
                tour_circle.find('img').attr('src',tour_json[tour.get_selected_tour()].points[selected_id].photoURL);
                tour_circle.fadeIn(10);
                tour_circle.attr('name',selected_id);
            });


            tour_rate.hide();
            point_count.hide();
        }
    }
        tour_circle.removeClass('animation');
    }


});


function Canvas_create_line(){
    var parent = $('#container_panorams_tour');
    var h =3*parseInt($('div.block').css('height'))+'';
    $('<canvas id="lines" width="'+parent.css('width')+'" height="'+h+'"></canvas>').appendTo(parent);

    var x1=0,y1=0,x2=0,y2=0;
    for(var i = 0; i < tour.get_point().length;i++) {
        var canvas = document.getElementById('lines');
        var el1 = $(".block").find('#'+i);
        if(i<(tour.get_point().length-1)){
            var el2 = $(".block").find('#'+(i+1));
        }else{
            var el2 = $(".block").find('#tour_circle');
        }

        if(i==0){
            x1 = Math.round(el1.offset().left + parseInt(el1.css('width'))/2 );
            y1 = Math.round(el1.offset().top - parent.offset().top +parseInt(el2.css('padding-top'))/2);
        }else{
            x1 = x2;
            y1 = y2;
        }
        x2 = Math.round(el2.offset().left + parseInt(el2.css('width'))/2 );
        y2 = Math.round(el2.offset().top - parent.offset().top +parseInt(el2.css('padding-top'))/2);
        var k=0,len =0, b=0;
        k = (y1 - y2)/(x1 - x2);
        b = y1 - k*x1;
        len = Math.sqrt(Math.pow(x1-x2,2)+Math.pow(y1-y2,2));
        if (canvas.getContext) {
            var ctx = canvas.getContext('2d');
            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.fillStyle = "#00b3ee";
            ctx.strokeStyle = "#00b3ee";
            ctx.fill();
            ctx.arc(x1,y1,1.5,0,2*Math.PI);
            if (((Math.abs(x1 - x2) < Math.abs(y1 - y2)))&&(Math.abs(x1 - x2)<100)){
                for(var j=1; j < len/10; j++){
                    if(y1<=y2){y1 = y1 + 10;}else{y1 = y1 - 10;}
                    x1 = x1;
                    ctx.moveTo(x1, y1);
                    ctx.arc(x1,y1,1.5,0,2*Math.PI);
                    ctx.fillStyle = "#00b3ee";
                    ctx.strokeStyle = "#00b3ee";
                    ctx.fill();
                }
            }else{
                for(var j=1; j < len/10; j++){
                    if(x1<=x2){x1 = x1 + 10;}else{x1 = x1 - 10;}
                    y1 = k*x1+b;
                    ctx.moveTo(x1, y1);
                    ctx.arc(x1,y1,1.5,0,2*Math.PI);
                    ctx.fillStyle = "#00b3ee";
                    ctx.strokeStyle = "#00b3ee";
                    ctx.fill();
                }
            }
            ctx.moveTo(x2, y2);
            ctx.arc(x2,y2,1.5,0,2*Math.PI);
            ctx.fillStyle = "#00b3ee";
            ctx.strokeStyle = "#00b3ee";
            ctx.fill();
            ctx.stroke();
        }
    }

}


if($('body').is('#tour_page')){
    /**Create instance of class Tour**/
    var tour = new Tours();

    /**Call method that generate random circle position**/
    tour.create_circle(tour_json.length);

    /**Call circle rendering**/
    tour.render_circle();
    Draw_main_circle();


}

$.ajax({
    url: 'http://192.168.92.65/apis2d/index.php?r=tour%2Fall',
    dataType:'json',
    success: function(data){
       console.log(data);
    }
    });