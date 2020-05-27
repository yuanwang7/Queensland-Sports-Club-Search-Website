var cricket = ["95Ia6yBcnXI","HqUl4nwlT4k","AFEZzf9_EHk","1RDjveN5taQ","1aXe_q0vUEg","HNXhdo5j914", "nEHAdJ1Zuo0",
"boHfs7nopHc","WUODHf0IT5U","jjpTcHwjFuI","xH4QKIBCh2M","Kwu1yIC-ssg","AqtpNkMvj5Y", "Nl4o0kx8n54","2--eJKM15NY",
"UjUPS70ZEG0"];

for (var i = 0; i < cricket.length; i ++) {
    var a = document.createElement('a');
    a.href = "https://www.youtube.com/embed/" + cricket[i];
    var img = document.createElement('img');
    img.src = "https://img.youtube.com/vi/" + cricket[i] + "/2.jpg";
    img.alt = "Youtube Video";
    a.append(img);
    document.getElementById('cricketVideoDisplay').appendChild(a);
}