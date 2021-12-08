<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
          integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
          table,
          th,
          td {
               border: 1px solid black;
          }
     </style>



</head>



<body>
     <button id="btnBack"> back </button>
     <div id="main">
          <table>
               <thead>
                    <tr>
                         <th>ID</th>
                         <th>Title</th>
                         <th>Detail</th>
                    </tr>
               </thead>
               <tbody id="tblPost">
               </tbody>
          </table>
     </div>
     <div id="detail">
          <table>
               <thead id="tdetail">

               </thead>
               <tbody id="tblDetails">
               </tbody>
          </table>
     </div>

     <div id="detailComment">
          <table>
               <thead id="tcomment">

               </thead>
               <tbody id="tblcomment">
               </tbody>
          </table>
     </div>

</body>
<script>

     function showDetails(id) {
          $("#main").hide();
          $("#detail").show();
          // console.log(id);
          var url = "https://jsonplaceholder.typicode.com/posts/" + id
          $.getJSON(url)
               .done((data) => {
                    console.log(data);
                    var line_t = "<tr>";
                    line_t += "<th>id</th>"
                    line_t += "<th>Title</th>"
                    line_t += "<th>Detail</th>"
                    line_t += "</tr>";
                    $("#tdetail").append(line_t);
                    var line = "<tr id='detailROW'";
                    line += "><td>" + data.id + "</td>"
                    line += "<td><b>" + data.title + "</b><br/>"
                    line += data.body + "</td>"
                    line += "<td>" + data.userId + "</td>"
                    line += "</tr>";
                    $("#tblDetails").append(line);
               })
               .fail((xhr, err, status) => {
               })
     }
     function LoadPosts() {
          var url = "https://jsonplaceholder.typicode.com/posts"
          $.getJSON(url)
               .done((data) => {
                    $.each(data, (k, item) => {
                         // console.log(item);
                         var line = "<tr>";
                         line += "<td>" + item.id + "</td>"
                         line += "<td><b>" + item.title + "</b><br/>"
                         line += item.body + "</td>"
                         line += "<td id='link'><button id='link' onClick='showDetails(" + item.id + ");'>Link</button></td>"
                         line += "<td id='Comment'><button id='comment' onClick='loadPostsComent(" + item.id + ");'>comment</button></td>"
                         line += "</tr>";
                         $("#tblPost").append(line);
                    });
                    $("#main").show();
               })
               .fail((xhr, err, status) => {
               })
     }

     function loadPostsComent(id) {
          $("#main").hide();
          $("#detail").show();
          var url = "https://jsonplaceholder.typicode.com/comments/" + id
          $.getJSON(url)
               .done((data) => {
                    console.log(data);
                    var line_C = "<tr>";
                    line_C += "<th>id</th>"
                    line_C += "<th>name</th>"
                    line_C += "<th>email</th>"
                    line_C += "<th>body</th>"
                    line_C += "</tr>";
                    $("#tcomment").append(line_C);
                    var line = "<tr> id='comentRoll'";
                    line += "><td>" + data.id + "</td>"
                    line += "<td>" + data.name + "<br/>"
                    line += "<td>" + data.email + "</td>"
                    line += "<td>" + data.body + "</td>"
                    line += "</tr>"
                    $("#tblcomment").append(line);
               })

               .fail((xhr, err, status) => {

               })

     }


     $(() => {
          LoadPosts();
          $("#detail").hide();
          $("#btnBack").click(() => {
               $("#main").show();
               $("#detail").hide();
               location.reload();


          });

     })
</script>

</html>
