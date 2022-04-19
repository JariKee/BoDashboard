const button = document.getElementById("js--menu");

const navigation = document.getElementById("js--nav");

const body = document.getElementById("js--body");

const rangeValue = document.getElementById("js--rangeValue");
const slider = document.getElementById("js--slider");

const buttonminus = document.getElementById("js--button1");
const buttonplus = document.getElementById("js--button2");


const clockContain = document.getElementById("clockContainer");

/* slider buttons */

buttonminus.onclick = function(){
    slider.value -= 1;
    rangeValue.innerText = slider.value + "℃";
}

buttonplus.onclick = function(){
    slider.value = parseInt(slider.value) + 1;
    rangeValue.innerText = slider.value + "℃";
}

button.onclick = function() {
    navigation.style.visibility = "visible";
    body.style.overflow = "hidden";
    navigation.style.opacity = 1;
    clockContain.style.visibility = "hidden";
}

// navigation Close button

function closeNav() {
    document.getElementById("js--nav").style.visibility = "hidden";
    navigation.style.opacity = 0;
    body.style.overflow = "visible";
    clockContain.style.visibility = "visible";
}

/* SLIDER */

slider.value = "16";
rangeValue.innerText = slider.value + "℃";

slider.oninput = function(){
    rangeValue.innerText = slider.value + "℃";
}

/* Diagram */

var ctx = document.getElementById('myChart')

var stars = [1672, 1305, 1826, 1469, 2019, 1613, 1753];
var frameworks = ['Maandag', 'Dinsdag', 'Woensdag','Donderdag', 'Vrijdag', 'Zaterdag', 'Zondag'];

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: frameworks,
        datasets: [{
            label: 'verbruik in KWH',
            data: stars,
            data: stars, backgroundColor: 
            ["rgba(1, 1, 1, 0.2)", 
            "rgba(1, 1, 1, 0.2)",
            "rgba(1, 1, 1, 0.2)", 
            "rgba(1, 1, 1, 0.2)", 
            "rgba(1,1, 1, 0.2)" ],

            borderColor:
            [  "rgba(54, 162, 235, 1)", 
            "rgba(54, 162, 235, 1)", 
            "rgba(54, 162, 235, 1)", 
            "rgba(54, 162, 235, 1)",
            "rgba(54, 162, 235, 1)", 
        ],  borderWidth: 1,
            fontsize:
            [
            ]
        }]
    },
}) 

/* Diagram 2 */

var ctx = document.getElementById('myChart2')

var stars = [152, 209, 178, 188, 232, 183, 142];
var frameworks = ['Maandag', 'Dinsdag', 'Woensdag','Donderdag', 'Vrijdag', 'Zaterdag', 'Zondag'];

var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: frameworks,
        datasets: [{
            label: 'Waterverbruik in M³',
            data: stars,
            data: stars, backgroundColor: 
            ["rgba(1, 1, 1, 0.2)", 
            "rgba(1, 1, 1, 0.2)",
            "rgba(1, 1, 1, 0.2)", 
            "rgba(1, 1, 1, 0.2)", 
            "rgba(1,1, 1, 0.2)" ],

            borderColor:
            [  "rgba(54, 162, 235, 1)", 
            "rgba(54, 162, 235, 1)", 
            "rgba(54, 162, 235, 1)", 
            "rgba(54, 162, 235, 1)",
            "rgba(54, 162, 235, 1)",
        ],  borderWidth: 1,
            fontsize:
            [
            ]
        }]
    },
})

/* Klok */

setInterval(() => {
    d = new Date(); //object of date()
    hr = d.getHours();
    min = d.getMinutes();
    sec = d.getSeconds();
    hr_rotation = 30 * hr + min / 2; //converting current time
    min_rotation = 6 * min;
    sec_rotation = 6 * sec;
  
    hour.style.transform = `rotate(${hr_rotation}deg)`;
    minute.style.transform = `rotate(${min_rotation}deg)`;
    second.style.transform = `rotate(${sec_rotation}deg)`;
}, 1000);


// weather 

var inputval = document.querySelector('#cityinput')
var btn = document.querySelector('#add');
var city = document.querySelector('#cityoutput')
var descrip = document.querySelector('#description')
var temp = document.querySelector('#temp')
var wind = document.querySelector('#wind')

 
apik = "3045dd712ffe6e702e3245525ac7fa38"

//kelvin to celcious. 1 Kelvin is equal to -272.15 Celsius.

function convertion(val){
    return (val - 273).toFixed(2)
}
//Now we have to collect all the information with the help of fetch method

    btn.addEventListener('click', function(){

//This is the api link from where all the information will be collected

fetch('https://api.openweathermap.org/data/2.5/weather?q='+inputval.value+'&appid='+apik)
.then(res => res.json())

//.then(data => console.log(data))
.then(data => {

//Now you need to collect the necessary information with the API link. Now I will collect that information and store it in different constants.

var nameval = data['name']
var descrip = data['weather']['0']['description']
var tempature = data['main']['temp']
var wndspd = data['wind']['speed']

//Now with the help of innerHTML you have to make arrangements to display all the information in the webpage.

city.innerHTML=`Weather of <span>${nameval}<span>`
temp.innerHTML = `Temperature: <span>${ convertion(tempature)} C</span>`
description.innerHTML = `Sky Conditions: <span>${descrip}<span>`
wind.innerHTML = `Wind Speed: <span>${wndspd} km/h<span>`

})

//Now the condition must be added that what if you do not input anything in the input box.

.catch(err => alert('You entered Wrong city name'))
})
