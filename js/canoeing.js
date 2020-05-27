var football = [{"id":"ecStrF15o-4" , "date":"2011-06-15T18:14:24.000Z "},
{"id" : "Z5hJeAENpZs","date":"2019-01-06T22:55:55.000Z"},
{"id" : "11P7YHl_yfk", "date":  "2019-02-20T23:08:44.000Z"},
{"id" : "fGiWzRrM-us", "date" : "2015-03-08T11:05:43.000Z"},
{"id":"fMyTTjKV-1U", "date": "2011-08-25T07:43:40.000Z"},
{"id":"eX2fT0z9Frc","date":"2016-05-24T10:00:02.000Z"},
{"id":"UGqiwcIDOgQ", "date":"2006-07-04T13:00:38.000Z"},
{"id":"6XPKv-8VDbw", "date" :"2015-09-27T16:52:55.000Z"},
{"id":"EyUNOMgvO_U", "date" :"2012-06-14T20:50:29.000Z"},
{"id":"sDBLapu0rsk","date":"2011-05-18T22:34:51.000Z"},
{"id":"f3XIWpEn3_Y","date":"2017-12-15T22:13:24.000Z"},
{"id":"-L9VNF36A0I","date":"2016-02-19T16:26:28.000Z"},
{"id":"MQwGpThI7dA","date":"2012-10-16T00:45:44.000Z"},
{"id":"npsCjKpTwf8","date":"2017-07-26T01:40:42.000Z"},
{"id":"GJ-XNbg4Cxs","date":"2016-07-14T11:10:08.000Z"}];

// // new_football.sort(function(a,b) {
// //     return new Date(b.date) - new Date(a.date);
// // });


// // for (var i = 0; i < new_football.length; i++) {
// //     console.log(new_football[i].id);
// // };
function randomOrder(){
    for (var i = 0; i < football.length; i ++) {
        var a = document.createElement('a');
        a.href = "https://www.youtube.com/embed/" + football[i].id;
        var img = document.createElement('img');
        img.src = "https://img.youtube.com/vi/" + football[i].id + "/2.jpg";
        img.alt = "Youtube Video";
        a.append(img);
        document.getElementById('canoeingVideoDisplay').appendChild(a);  
    };
}
randomOrder();

// function sortByDate() {
//     football.sort(function(a,b){
//         return new Date(b.date) - new Date(a.date);
//     });

//     for(var i = 0; i< football.length;i ++) {
//         console.log("test");
//         var a = document.createElement('a');
//         a.href = "https://www.youtube.com/embed/" + football[i].id;
//         var img = document.createElement('img');
//         img.src = "http://img.youtube.com/vi/" + football[i].id + "/2.jpg";
//         img.alt = "Youtube Video";
//         a.append(img);
//         document.getElementById("soccerVideoDisplay").appendChild(a);  
//     };
// };
